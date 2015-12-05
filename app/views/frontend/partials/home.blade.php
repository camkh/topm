@extends('frontend.layout') 
@section('title')
	@if(Config::get('app.url') == 'http://www.allkun.com/')
   	ALLKUN.COM
   	@elseif(Config::get('app.url') == 'http://www.roeung.com/')
   	ROEUNG.COM
   	@elseif(Config::get('app.url') == 'http://www.sruol9.com/')
   	SRUOL9.COM
   	@elseif(Config::get('app.url') == 'http://www.khmermovies.co/')
   	KHMERMOIVES.COM
   	@elseif(Config::get('app.url') == 'http://www.mkhmer.co/')
  	MKHMER.CO
   	@elseif(Config::get('app.url') == 'http://www.m-khmer.com/')
   	M-KHMER.COM
   	@else
   	TOPKHMERSONG.COM
   	@endif
@endsection
@section('description')KHMER SONG @endsection
@section('content')
<script type="text/javascript">
	var pageType = 'home';
</script>
{{HTML::script('frontend/plugin/feature/js/jquery.easing-1.3.js')}}
{{HTML::script('frontend/plugin/feature/js/jquery_005.js')}}
{{HTML::script('frontend/plugin/feature/js/jquery_004.js')}}
{{HTML::script('frontend/plugin/feature/js/efects.js')}}
{{HTML::style('frontend/plugin/feature/css/slideshow.css')}}
	@include('frontend.partials.tvlink')
	<div id="ad_1" class="contentAd"></div>


	<div id="getMusic">
		
	</div>
	<div id="getVideoResult1"><div class="loadPlaylist"></div></div>
	<div id="getVideoResult6"></div>
	<div id="getVideoResult2"></div>
	<div id="getVideoResult3"></div>
	<div id="getVideoResult4"></div>
	<div id="getVideoResult5"></div>
	
	<input type="hidden" id="readyLoad" value="0"/>
	<center><a class="btn btn-danger btn-lg" href="{{Config::get('app.url')}}search/label" role="button" style="margin-top: 10px"><span class="icos-plus"></span> View all</a></center>
<script>
	var dataLoad = 0;
	jQuery(document).ready(function(){
		sectionHome(1,'image');
	});
</script>
@endsection