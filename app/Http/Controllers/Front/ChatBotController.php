<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Product;
use App\Models\Order;

class ChatBotController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Product Search
    |--------------------------------------------------------------------------
    */

    /*
|--------------------------------------------------------------------------
| Add To Cart
|--------------------------------------------------------------------------
*/
public function addToCart(
    Request $request
) {

    $request->validate(array(

        'product_id' =>
            'required',

        'quantity' =>
            'required|integer|min:1'
    ));

    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */
    $product =
        Product::where(
            'id',
            $request->product_id
        )
        ->first();

    if (empty($product)) {

        return response()->json(array(

            'success' => false,

            'message' =>
                'Product not found'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Return
    |--------------------------------------------------------------------------
    */
    return response()->json(array(

        'success' => true,

        'message' =>
            'Product added to cart successfully',

        'product' => array(

            'id' =>
                $product->id,

            'name' =>
                $product->product_name,

            'price' =>
                $product->selling_price
        )
    ));
}


    public function productSearch(
        Request $request
    ) {

        $keyword =
            $request->keyword;

        $max_price =
            $request->max_price;

        $min_price =
            $request->min_price;

        $brand =
            $request->brand;

        $category_id =
            $request->category_id;

        $query =
            Product::query();

        /*
        |--------------------------------------------------------------------------
        | Active Products
        |--------------------------------------------------------------------------
        */
        $query->where(
            'status',
            1
        );

        /*
        |--------------------------------------------------------------------------
        | Stock
        |--------------------------------------------------------------------------
        */
        $query->where(
            'product_quantity',
            '>',
            0
        );

        /*
        |--------------------------------------------------------------------------
        | Keyword Search
        |--------------------------------------------------------------------------
        */
        if (!empty($keyword)) {

            $query->where(function ($q) use ($keyword) {

                $q->where(
                    'product_name',
                    'LIKE',
                    '%' . $keyword . '%'
                )

                ->orWhere(
                    'short_discriiption',
                    'LIKE',
                    '%' . $keyword . '%'
                )

                ->orWhere(
                    'product_details',
                    'LIKE',
                    '%' . $keyword . '%'
                )

                ->orWhere(
                    'tags',
                    'LIKE',
                    '%' . $keyword . '%'
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Brand
        |--------------------------------------------------------------------------
        */
        if (!empty($brand)) {

            $query->where(
                'brand',
                $brand
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */
        if (!empty($category_id)) {

            $query->where(
                'category_id',
                $category_id
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Price
        |--------------------------------------------------------------------------
        */
        if (!empty($min_price)) {

            $query->whereRaw(
                'CAST(selling_price AS DECIMAL(10,2)) >= ?',
                [$min_price]
            );
        }

        if (!empty($max_price)) {

            $query->whereRaw(
                'CAST(selling_price AS DECIMAL(10,2)) <= ?',
                [$max_price]
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */
        $products =
            $query
                ->select(
                    'id',
                    'product_name',
                    'slug',
                    'selling_price',
                    'discount_price',
                    'product_quantity',
                    'short_discriiption',
                    'image_one',
                    'brand'
                )
                ->limit(10)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */
        return response()->json(array(

            'success' => true,

            'count' =>
                $products->count(),

            'products' =>
                $products

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Get Product
    |--------------------------------------------------------------------------
    */
    public function getProduct(
        Request $request
    ) {

        $product =
            Product::where(
                'id',
                $request->product_id
            )
            ->first();

        return response()->json(array(

            'success' =>
                !empty($product),

            'product' =>
                $product

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Related Products
    |--------------------------------------------------------------------------
    */
    public function relatedProducts(
        Request $request
    ) {

        $products =
            Product::where(
                'category_id',
                $request->category_id
            )
            ->where(
                'status',
                1
            )
            ->limit(10)
            ->get();

        return response()->json(array(

            'success' => true,

            'products' => $products

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Place Order
    |--------------------------------------------------------------------------
    */
    public function placeOrder(
        Request $request
    ) {

        $request->validate(array(

            'customer_name' =>
                'required',

            'phone' =>
                'required',

            'address' =>
                'required',

            'payment_method' =>
                'required'
        ));

        $order =
            Order::create(array(

                'customer_name' =>
                    $request->customer_name,

                'phone' =>
                    $request->phone,

                'address' =>
                    $request->address,

                'payment_method' =>
                    $request->payment_method

            ));

        return response()->json(array(

            'success' => true,

            'order_id' =>
                $order->id,

            'message' =>
                'Order placed successfully'

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Track Order
    |--------------------------------------------------------------------------
    */
    public function trackOrder(
        Request $request
    ) {

        $order =
            Order::where(
                'id',
                $request->order_id
            )
            ->first();

        return response()->json(array(

            'success' =>
                !empty($order),

            'order' =>
                $order

        ));
    }
}