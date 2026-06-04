<?php
$setting = DB::table('setting')->where('id', '=', '1')->first();
$header_menu = DB::table('pages')->where('menu_type', '=', 'quick_links')->where('status','=','1')->orderBy('position', 'asc')->get();
?>
<!-- Theme4 Footer -->
<footer class="t4-footer-wrap">
	<!-- Mobile bottom nav -->
	<div class="bottom-bar t4-bottom-bar">
		<a href="{{ url('/') }}" class="bar-item t4-bar-item"><i class="fa-solid fa-house"></i><span>Home</span></a>
		<a href="{{ url('/shop') }}" class="bar-item t4-bar-item"><i class="fa-solid fa-store"></i><span>Shop</span></a>
		<div class="bar-item search-btn open-mobile-search-btn t4-bar-item"><i class="fa-solid fa-magnifying-glass"></i><span>Search</span></div>
	</div>

	<div class="footer t4-footer">
		<div class="footer-border t4-footer-top">
			<div class="container">
				<div class="inside-footer t4-footer-grid">
					<!-- Brand -->
					<div class="footer-image-section t4-footer-brand">
						<a href="{{ url('/') }}" class="t4-footer-logo-link">
							<img src="{{ env('IMG_URL') }}{{ $setting->wlogo ?? '' }}" alt="{{ $setting->site_title ?? 'Logo' }}" />
						</a>
						<p class="t4-footer-tagline">Quality products, fast delivery across Pakistan.</p>
						<div class="t4-social">
							@if(!empty($setting->youtube))<a href="{{ $setting->youtube }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>@endif
							@if(!empty($setting->facebook))<a href="{{ $setting->facebook }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>@endif
							@if(!empty($setting->instagram))<a href="{{ $setting->instagram }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>@endif
							@if(!empty($setting->twitter))<a href="{{ $setting->twitter }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>@endif
							@if(!empty($setting->tiktok))<a href="{{ $setting->tiktok }}" target="_blank" rel="noopener" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>@endif
							@if(!empty($setting->pinterest))<a href="{{ $setting->pinterest }}" target="_blank" rel="noopener" aria-label="Pinterest"><i class="fa-brands fa-pinterest"></i></a>@endif
						</div>
					</div>

					<!-- Quick Links -->
					<div class="sec-one t4-footer-links">
						<h3 class="t4-footer-title">Quick Links</h3>
						<nav class="in-s-one t4-links-list">
							@foreach($header_menu as $v)
							<a href="{{ $v->route ? ($v->route == '/' ? url('/') : url('').'/'.$v->route) : url('/').'/'.$v->slug }}" class="t4-footer-link">{{ $v->name }}</a>
							@endforeach
						</nav>
					</div>

					<!-- Newsletter -->
					<div class="footer-sign-up t4-footer-newsletter">
						<h4 class="t4-newsletter-title">Newsletter</h4>
						<p class="t4-newsletter-desc">Subscribe for new arrivals and exclusive offers.</p>
						<form class="form-newsletter" id="subscribe-form" action="{{ url('/subcribe_newsletter') }}" method="post">
							{{ csrf_field() }}
							<div class="form-wraper t4-newsletter-form">
								<input type="email" name="email" placeholder="Enter your email" required class="t4-newsletter-input">
								<button type="submit" class="subscribe-button t4-newsletter-btn" aria-label="Subscribe"><i class="fa-solid fa-arrow-right"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom t4-footer-bottom">
			<div class="container">
				<div class="inside-footer-bottom t4-footer-bottom-inner">
					<p class="t4-copyright">© {{ date('Y') }} <a href="{{ url('/') }}">{{ $setting->site_title ?? 'Store' }}</a>. All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</footer>
