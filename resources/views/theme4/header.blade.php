<?php
$setting = DB::table('setting')->where('id', '=', '1')->first();
$cate = DB::table('categories')->where('status', 1)->orderBy('sort', 'ASC')->orderBy('id', 'DESC')->get();
foreach ($cate as $k => $v) {
    $cate[$k]->subcategories = DB::table('sub_categories')->where('category_id', $v->id)->get();
}
$header_menu = DB::table('pages')->where('menu_type', '=', 'header')->where('status','=','1')->orderBy('position', 'asc')->get();
?>
<!-- Theme4 Header - Clean single bar -->
<header class="t4-header-wrap">
	<!-- One main bar: logo + nav + search + cart -->
	<div class="nav t4-topbar" style="display:none;"></div>
	<div class="sticky-header t4-main-header" id="sticky-header">
		<div class="header t4-header-inner">
			<div class="container">
				<div class="inside-header t4-header-row">
					<div class="header-logo t4-logo">
						<a href="{{ url('/') }}"><img src="{{ env('APP_URL') }}{{ isset($setting) && $setting ? $setting->logo : '' }}" alt="{{ $setting->site_title ?? 'Logo' }}" /></a>
					</div>

					<nav class="t4-nav-center">
						<a href="{{ url('/') }}" class="t4-nav-link">Home</a>
						<a href="{{ url('/shop') }}" class="t4-nav-link">Shop</a>
						<button type="button" id="openMenuDesktop" class="t4-nav-link t4-nav-cat-btn"><i class="fa-solid fa-layer-group"></i> Categories</button>
						@foreach($header_menu as $v)
							<a href="{{ $v->route ? ($v->route == '/' ? url('/') : url('').'/'.$v->route) : url('/').'/'.$v->slug }}" class="t4-nav-link">{{ $v->name }}</a>
						@endforeach
					</nav>

					<div class="t4-header-right">
						<form action="{{ url('/search') }}" method="GET" id="searchForm" class="t4-search-form">
							<i class="fa-solid fa-magnifying-glass t4-search-icon"></i>
							<input type="text" name="q" placeholder="Search products..." value="{{ request('q') }}" id="searchInput" class="t4-search-input">
							<button type="submit" class="t4-search-icon-btn" aria-label="Search">Search</button>
						</form>
						<a href="#" class="openCart t4-cart-link" aria-label="Cart">
							<i class="fa-solid fa-cart-shopping"></i>
							<span class="cart-count">{{ Session::has('cart') ? App\Helpers\Cart::qty() : 0 }}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Offer strip -->
	<div class="t4-offer-line">
		<div class="container">
			<p><i class="fa-solid fa-truck-fast"></i> {{ isset($setting->welcome_message) && !empty($setting->welcome_message) ? $setting->welcome_message : 'Free delivery on orders over Rs. 5000' }}</p>
			<div class="t4-offer-links">
				@if(isset($setting->whatsapp) && !empty($setting->whatsapp))
					<a href="https://wa.me/{{ $setting->whatsapp }}" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
				@endif
				@if(isset($setting->track_order_link) && !empty($setting->track_order_link) && $setting->track_order_link != '#')
					<a href="{{ $setting->track_order_link }}" target="_blank"><i class="fa-solid fa-location-dot"></i> Track Order</a>
				@endif
			</div>
		</div>
	</div>

	<!-- Mobile -->
	<div class="nav-mob hidden-nav" id="hidden-nav"></div>
	<div class="sticky-header-mob" id="sticky-header-mob">
		<div class="mob-header t4-mob-header">
			<div class="container">
				<div class="inside-mob-header t4-mob-row">
					<div class="header-mob-menu"><i id="openMenuMobile" class="fa-solid fa-bars" aria-label="Menu"></i></div>
					<div class="header-mob-logo t4-mob-logo">
						<a href="{{ url('/') }}"><img src="{{ env('IMG_URL') }}{{ isset($setting) && $setting ? $setting->logo : '' }}" alt="Logo" /></a>
					</div>
					<div class="header-mob-cart">
						<a href="#" class="openCart" aria-label="Cart"><i class="fa-solid fa-cart-shopping"></i><span class="cart-count">{{ Session::has('cart') ? App\Helpers\Cart::qty() : 0 }}</span></a>
					</div>
					<div class="header-mob-search" id="openMobileSearch" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile search modal -->
	<div id="mobileSearchModal" class="mobile-search-modal">
		<div class="mobile-search-content t4-search-modal">
			<div class="mobile-search-header t4-search-modal-header">
				<h3>Search</h3>
				<span id="closeMobileSearch" class="close-mobile-search">&times;</span>
			</div>
			<div class="mobile-search-body">
				<form action="{{ url('/search') }}" method="GET" id="mobileSearchForm">
					<div class="mobile-search-wrapper t4-search-box">
						<input type="text" name="q" id="mobileSearchInput" placeholder="Search..." autocomplete="off">
						<button type="submit" class="t4-search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
					</div>
					<div id="mobileSearchResults" class="mobile-search-results"></div>
				</form>
			</div>
		</div>
		<div id="mobileSearchOverlay" class="mobile-search-overlay"></div>
	</div>

	<!-- Cart sidebar -->
	<div id="cartSidebar" class="cart-sidebar t4-cart-drawer">
		<div class="cart-header t4-cart-header">
			<h3><i class="fa-solid fa-cart-shopping"></i> Cart</h3>
			<span id="closeCart" class="t4-close-btn">&times;</span>
		</div>
		<div class="cart-content">
			@if(Session::has('cart') && App\Helpers\Cart::qty() > 0)
				<p>{{ App\Helpers\Cart::qty() }} item(s)</p>
			@else
				<div class="t4-cart-empty">
					<i class="fa-solid fa-cart-shopping"></i>
					<p>Your cart is empty</p>
					<button type="button" onclick="window.location.href='{{ url('/') }}'" class="t4-btn-primary">Shop Now</button>
				</div>
			@endif
		</div>
	</div>
	<div id="cartOverlay" class="t4-overlay"></div>

	<!-- Categories sidebar -->
	<div id="sidebar" class="sidebar t4-sidebar">
		<div class="sidebar-header t4-sidebar-header">
			<h3>Categories</h3>
			<span id="closeMenu" class="t4-close-btn">&times;</span>
		</div>
		<ul class="t4-sidebar-list">
			<li><a href="{{ url('/shop') }}" class="t4-sidebar-link">Shop All</a></li>
			@foreach($cate as $v)
			<li class="has-submenu t4-cat-item">
				<a href="{{ url('/') }}/{{ $v->slug }}" class="category-link t4-sidebar-link">{{ $v->name }}</a>
				@if(isset($v->subcategories) && count($v->subcategories) > 0)
					<i class="fa-solid fa-chevron-down toggle-submenu"></i>
					<ul class="submenu t4-submenu">
						@foreach($v->subcategories as $sub)
						<li><a href="{{ url('/') }}/{{ $sub->slug }}">{{ $sub->name }}</a></li>
						@endforeach
					</ul>
				@endif
			</li>
			@endforeach
		</ul>
	</div>
	<div id="overlay" class="t4-overlay"></div>
</header>
