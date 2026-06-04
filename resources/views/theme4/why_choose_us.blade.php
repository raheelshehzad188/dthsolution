{{-- Theme4: Why Choose Us strip - dynamic site title --}}
<div class="theme4-section theme4-why-choose">
	<div class="container">
		<div class="theme4-card theme4-why-inner">
			<div class="theme4-why-grid">
				<div class="theme4-why-item">
					<div class="theme4-why-icon"><i class="fa-solid fa-truck-fast"></i></div>
					<h4>Free Delivery</h4>
					<p>On orders over Rs. 5000 across Pakistan</p>
				</div>
				<div class="theme4-why-item">
					<div class="theme4-why-icon"><i class="fa-solid fa-lock"></i></div>
					<h4>Secure Payment</h4>
					<p>100% secure &amp; encrypted checkout</p>
				</div>
				<div class="theme4-why-item">
					<div class="theme4-why-icon"><i class="fa-solid fa-headset"></i></div>
					<h4>Support</h4>
					<p>Dedicated support for {{ isset($setting->site_title) ? $setting->site_title : 'you' }}</p>
				</div>
				<div class="theme4-why-item">
					<div class="theme4-why-icon"><i class="fa-solid fa-rotate-left"></i></div>
					<h4>Easy Returns</h4>
					<p>Hassle-free return policy</p>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
.theme4-why-choose { padding: 16px 0; }
.theme4-why-inner { padding: 28px 24px !important; }
.theme4-why-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 24px;
	text-align: center;
}
.theme4-why-item h4 { font-size: 15px; margin-bottom: 6px; color: var(--primary-color); font-weight: 700; }
.theme4-why-item p { font-size: 13px; color: #555; margin: 0; }
.theme4-why-icon {
	width: 52px; height: 52px;
	margin: 0 auto 12px;
	background: var(--navbar-color);
	color: #fff;
	border-radius: 14px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 22px;
}
@media (max-width: 992px) {
	.theme4-why-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
	.theme4-why-grid { grid-template-columns: 1fr; }
}
</style>
