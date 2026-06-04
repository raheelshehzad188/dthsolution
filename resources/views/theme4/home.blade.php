
@extends($layout)
<?php
	use App\Models\Catagorie;
	use App\Models\Subcatagorie;
	use App\Models\Childcatagorie;
	use App\Models\Admins\Product;
	use App\Models\Gallerie;
	use Illuminate\Support\Facades\Session;
	use App\Models\Admins\Setting;
	use App\Models\Admins\Rating;
	use App\Models\Admins\Slider;
?>
  @section('content')
<?php $setting = DB::table('setting')
   ->where('id', '=', '1')
   ->first();
?>



      @include('theme4/slider')
      @include('theme4/cats')
      @include('theme4/why_choose_us')
      @include('theme4/photos')
      @include('theme4/featured_categories')
      @include('theme4/newsletter_banner')
      
      




     @endsection