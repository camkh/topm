@extends('frontend.layout')
@section('content')
<script type="text/javascript">
	var pageType = 'label';
</script>
<div class="element-videos">
	<!-- header -->
	<div class="panel panel-colorful msHeader searchLabel" style="margin:0">
		<div class="media-left">
			<div class="largthumb">
				<div class="thumb-big">				
				<span class="icon"></span>
				</span>
				<span class="play-button-pause" style="display:none"><span class="icon"></span></span>
				<div class="imageByLabel" id="imageByLabel">
				<img alt="Sample Image" class="img-by-label" src="@if(!empty($detail->image)){{$detail->image}}@endif&h=175&w=175" width="175" height="175"/>
				</div>
				</div>
			</div>
		</div>
		<div class="media-body pad-lft" style="overflow: visible">			
			<p class="text-muted mar-no">
			<span class="badge badge badge-info totalSongs" id="totalSongs"> Tracks</span>
			</p>
			<p class="text-muted mar-no" id="topExtraMenu">
				<button id="dLabel" type="button" class="btn btn-rounded btn-danger">ss</button>
			</p>
			<div class="clear"></div>
			<p class="text-muted mar-no btnHeader">
				<button onclick="loadding();addCurrentList();" id="addCurrentList" data-add="1" class="btn btn-default btn-icon btn-circle"><span class="icosg-plus1"></span></button>
				<button onclick="songdetail(&quot;http://www.topkhmersong.com/search/label/P%20--%20Sunday?&amp;max-results=50&amp;PageNo=1&quot;,&quot;P -- Sunday&quot;,&quot;http://1.bp.blogspot.com/-SpkUlcF6PIo/VZqj_kMeJ3I/AAAAAAAAKbU/XedB1Gfc5yw/s150-c/sunday.jpg&quot;);" class="btn btn-default btn-icon btn-circle"><span class="icosg-share2"></span></button>
				<button onclick="songcomment(&quot;http://www.topkhmersong.com/search/label/P%20--%20Sunday?&amp;max-results=50&amp;PageNo=1&quot;);" class="btn btn-default btn-icon btn-circle"><span class="icosg-comments"></span></button>
				<button class="btn btn-default btn-icon btn-circle"><span class="icosg-heart1"></span></button>
			</p>
		</div>
	</div>
	<!-- end header -->

	<div id="SongWrapper">

	@include('frontend.partials.tvlink')
</div>
@endsection