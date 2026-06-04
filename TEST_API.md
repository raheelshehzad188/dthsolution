# Product API Test Links

## API Endpoint
`GET /api/product/{pid}`

## Test URLs

### Local Development (Port 8002)
```
http://localhost:8002/api/product/1
http://localhost:8002/api/product/2
http://localhost:8002/api/product/3
```

### Live Server
```
https://ayan.shoppingeasy.pk/api/product/1
https://ayan.shoppingeasy.pk/api/product/2
https://ayan.shoppingeasy.pk/api/product/3
```

## Usage in Import Code

Replace this line in your import.php:
```php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://openteleshop.pk/import.php?pid=' . $pid,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
]);
```

With:
```php
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://ayan.shoppingeasy.pk/api/product/' . $pid,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
]);
```

## Response Format

The API returns JSON in the same format as openteleshop.pk/import.php:

```json
{
    "id": 1,
    "name": "Product Name",
    "slug": "product-name",
    "price": 1000,
    "regular_price": 1200,
    "sale_price": 1000,
    "stock_quantity": 50,
    "short_description": "Short description",
    "description": "Full description",
    "categories": [
        {
            "id": 1,
            "name": "Category Name",
            "slug": "category-name"
        }
    ],
    "brand_name": "Brand Name",
    "brand": {
        "id": 1,
        "name": "Brand Name",
        "slug": "brand-name"
    },
    "images": {
        "featured": "https://ayan.shoppingeasy.pk/storage/public/products/image.jpg",
        "gallery": [
            "https://ayan.shoppingeasy.pk/storage/public/products/images/img1.jpg",
            "https://ayan.shoppingeasy.pk/storage/public/products/images/img2.jpg"
        ]
    },
    "reviews": {
        "comments": [
            {
                "author": "Customer Name",
                "content": "Great product!",
                "rating": 5,
                "date": "2024-01-01 12:00:00"
            }
        ]
    },
    "tags": [
        {
            "name": "Tag 1",
            "slug": "tag-1"
        }
    ],
    "status": 1,
    "sku": "SKU123",
    "created_at": "2024-01-01 12:00:00",
    "updated_at": "2024-01-01 12:00:00"
}
```

## Testing

1. Open browser and go to: `http://localhost:8002/api/product/1`
2. You should see JSON response
3. Replace `1` with any product ID to test different products

