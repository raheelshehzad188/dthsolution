{{-- Theme4: Newsletter CTA banner - same form action as footer --}}
<div class="theme4-section theme4-newsletter-banner">
	<div class="container">
		<div class="theme4-newsletter-card">
			<div class="theme4-newsletter-inner">
				<h3>Stay Updated</h3>
				<p>Get the latest offers and new arrivals. No spam.</p>
				<form class="form-newsletter theme4-newsletter-form" action="{{ url('/subcribe_newsletter') }}" method="post">
					{{ csrf_field() }}
					<input type="email" name="email" placeholder="Enter your email" required>
					<button type="submit" class="theme4-newsletter-btn" aria-label="Subscribe">
						<i class="fa-solid fa-arrow-right"></i> Subscribe
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
<style>
.theme4-newsletter-banner { padding: 20px 0; }
.theme4-newsletter-card {
	background: linear-gradient(135deg, var(--primary-color) 0%, var(--btn-color) 100%);
	border-radius: 20px;
	padding: 32px;
	box-shadow: 0 8px 28px rgba(0,0,0,0.12);
}
.theme4-newsletter-inner { max-width: 560px; margin: 0 auto; text-align: center; }
.theme4-newsletter-inner h3 { color: #fff; font-size: 22px; margin-bottom: 8px; }
.theme4-newsletter-inner p { color: rgba(255,255,255,0.9); font-size: 14px; margin-bottom: 20px; }
.theme4-newsletter-form {
	display: flex;
	gap: 10px;
	flex-wrap: wrap;
	justify-content: center;
}
.theme4-newsletter-form input {
	flex: 1;
	min-width: 200px;
	padding: 12px 18px;
	border: none;
	border-radius: 12px;
	font-size: 15px;
}
.theme4-newsletter-btn {
	background: var(--navbar-color);
	color: #fff;
	border: none;
	padding: 12px 24px;
	border-radius: 12px;
	font-weight: 600;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
	gap: 8px;
}
.theme4-newsletter-btn:hover { opacity: 0.95; color: #fff; }
</style>
