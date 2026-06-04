<title>{{ isset($meta->title)?$meta->title:'' }}</title>
    <meta name="description" content="{{ (isset($meta->description)?$meta->description:'') }}" />
    <meta name="keywords" content="{{ (isset($meta->keywords)?$meta->keywords:'') }}" />
<link rel="canonical" href="{{url('/'.$product[0]->slug)}}" />  
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="Product" />
<meta property="og:title" content="{{ isset($meta->title)?$meta->title:'' }}" />
<meta property="og:description" content="{{ (isset($meta->description)?$meta->description:'') }}" />
<meta property="og:url" content="{{url('/'.$product[0]->slug)}}" />
<meta property="og:site_name" content="{{ $meta->title ?? 'Quicknow.pk' }}" />
<meta property="og:image" content="{{ url($product[0]->image_one) }}" />

@php
    // Get site settings
    $siteSettings = App\Models\Admins\Setting::where(['id'=>'1'])->first();
    $siteUrl = url('/');
    $siteName = $siteSettings->site_title ?? 'Quicknow.pk';
    $siteLogo = isset($siteSettings->logo1) ? url($siteSettings->logo1) : $siteUrl . '/images/logo.png';
    
    // Product data
    $prod = isset($product[0]) ? $product[0] : (isset($item) ? $item : null);
    if (!$prod) {
        // Product not available, skip schema generation
        $schema = null;
    } else {
    
    $productUrl = $siteUrl . '/' . $prod->slug;
    $productName = $prod->product_name ?? '';
    $productImage = !empty($prod->image_one) ? url($prod->image_one) : '';
    $productDescription = isset($prod->short_discriiption) ? strip_tags($prod->short_discriiption) : (isset($meta->description) ? $meta->description : '');
    $productSku = $prod->sku ?? $prod->product_code ?? '';
    $productPrice = isset($prod->discount_price) && $prod->discount_price > 0 ? $prod->discount_price : ($prod->selling_price ?? 0);
    $originalPrice = $prod->selling_price ?? 0;
    $availability = (isset($prod->product_quantity) && $prod->product_quantity > 0) ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock';
    
    // Brand data
    $brandName = isset($brand) && $brand ? $brand->name : '';
    
    // Category data
    $categoryName = isset($cate) && $cate ? $cate->name : '';
    $categorySlug = isset($cate) && $cate ? $cate->slug : '';
    $subCategoryName = isset($sub_cat) && $sub_cat ? $sub_cat->name : '';
    $subCategorySlug = isset($sub_cat) && $sub_cat ? $sub_cat->slug : '';
    
    // Build breadcrumb items
    $breadcrumbItems = [
        ['name' => 'Home', 'url' => $siteUrl, 'position' => 1]
    ];
    $position = 2;
    if ($categoryName && $categorySlug) {
        $breadcrumbItems[] = ['name' => $categoryName, 'url' => $siteUrl . '/' . $categorySlug, 'position' => $position++];
    }
    if ($subCategoryName && $subCategorySlug) {
        $breadcrumbItems[] = ['name' => $subCategoryName, 'url' => $siteUrl . '/' . $subCategorySlug, 'position' => $position++];
    }
    $breadcrumbItems[] = ['name' => $productName, 'url' => '', 'position' => $position];
    
    // Rating and Reviews data
    $reviews = [];
    $totalRating = 0;
    $ratingCount = isset($rcount) ? $rcount : 0;
    $avgRating = 0;
    
    if (isset($rating) && $rating->count() > 0) {
        $sum = 0;
        foreach ($rating as $rev) {
            if (isset($rev->rate) && isset($rev->name) && isset($rev->review)) {
                $reviews[] = [
                    'ratingValue' => (int)$rev->rate,
                    'author' => $rev->name ?? 'Anonymous',
                    'reviewBody' => strip_tags($rev->review ?? '')
                ];
                $sum += (int)$rev->rate;
            }
        }
        if (count($reviews) > 0) {
            $avgRating = round($sum / count($reviews), 1);
            $ratingCount = count($reviews);
        }
    } else {
        // Calculate from database if rating collection not available
        $dbReviews = DB::table('rating')->where('status', '1')->where('pid', $prod->id)->get();
        if ($dbReviews->count() > 0) {
            $sum = 0;
            foreach ($dbReviews as $rev) {
                if (isset($rev->rate) && isset($rev->name) && isset($rev->review)) {
                    $reviews[] = [
                        'ratingValue' => (int)$rev->rate,
                        'author' => $rev->name ?? 'Anonymous',
                        'reviewBody' => strip_tags($rev->review ?? '')
                    ];
                    $sum += (int)$rev->rate;
                }
            }
            if (count($reviews) > 0) {
                $avgRating = round($sum / count($reviews), 1);
                $ratingCount = count($reviews);
            }
        }
    }
    
    // Limit reviews to first 5 for schema
    $reviews = array_slice($reviews, 0, 5);
    
    // Build sameAs array
    $sameAs = [];
    if (isset($siteSettings->facebook) && $siteSettings->facebook) {
        $sameAs[] = $siteSettings->facebook;
    }
    if (isset($siteSettings->instagram) && $siteSettings->instagram) {
        $sameAs[] = $siteSettings->instagram;
    }
    
    // Build schema array
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'WebSite',
                '@id' => $siteUrl . '/#website',
                'url' => $siteUrl . '/',
                'name' => $siteName . ' Online Web Store',
                'potentialAction' => [
                    '@type' => 'SearchAction',
                    'target' => $siteUrl . '/?s={search_term_string}',
                    'query-input' => 'required name=search_term_string'
                ]
            ],
            [
                '@type' => 'Organization',
                '@id' => $siteUrl . '/#organization',
                'name' => $siteName . ' Online Web Store',
                'url' => $siteUrl . '/',
                'logo' => $siteLogo,
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => $productUrl . '#breadcrumb',
                'itemListElement' => []
            ],
            [
                '@type' => 'Product',
                '@id' => $productUrl . '#product',
                'name' => $productName,
                'description' => $productDescription,
                'offers' => [
                    '@type' => 'Offer',
                    'url' => $productUrl,
                    'priceCurrency' => 'PKR',
                    'price' => (string)$productPrice,
                    'priceValidUntil' => date('Y-12-31', strtotime('+1 year')),
                    'itemCondition' => 'https://schema.org/NewCondition',
                    'availability' => $availability,
                    'seller' => [
                        '@type' => 'Organization',
                        'name' => $siteName . ' Online Web Store'
                    ]
                ]
            ]
        ]
    ];
    
    // Add sameAs if available
    if (count($sameAs) > 0) {
        $schema['@graph'][1]['sameAs'] = $sameAs;
    }
    
    // Build breadcrumb items
    foreach ($breadcrumbItems as $breadcrumbItem) {
        $item = [
            '@type' => 'ListItem',
            'position' => $breadcrumbItem['position'],
            'name' => $breadcrumbItem['name']
        ];
        if (!empty($breadcrumbItem['url'])) {
            $item['item'] = $breadcrumbItem['url'];
        }
        $schema['@graph'][2]['itemListElement'][] = $item;
    }
    
    // Add product image if available
    if ($productImage) {
        $schema['@graph'][3]['image'] = [$productImage];
    }
    
    // Add SKU if available
    if ($productSku) {
        $schema['@graph'][3]['sku'] = $productSku;
    }
    
    // Add brand if available
    if ($brandName) {
        $schema['@graph'][3]['brand'] = [
            '@type' => 'Brand',
            'name' => $brandName
        ];
    }
    
    // Add category if available
    if ($categoryName) {
        $schema['@graph'][3]['category'] = $categoryName;
    }
    
    // Add aggregate rating if available
    if ($avgRating > 0 && $ratingCount > 0) {
        $schema['@graph'][3]['aggregateRating'] = [
            '@type' => 'AggregateRating',
            'ratingValue' => (string)$avgRating,
            'reviewCount' => (string)$ratingCount
        ];
    }
    
    // Add reviews if available
    if (count($reviews) > 0) {
        $schemaReviews = [];
        foreach ($reviews as $rev) {
            $schemaReviews[] = [
                '@type' => 'Review',
                'reviewRating' => [
                    '@type' => 'Rating',
                    'ratingValue' => (string)$rev['ratingValue'],
                    'bestRating' => '5'
                ],
                'author' => [
                    '@type' => 'Person',
                    'name' => $rev['author']
                ],
                'reviewBody' => $rev['reviewBody']
            ];
        }
        $schema['@graph'][3]['review'] = $schemaReviews;
    }
    }
@endphp

@if(isset($schema) && $schema)
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endif