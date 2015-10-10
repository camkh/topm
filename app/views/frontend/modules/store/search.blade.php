<?php
date_default_timezone_set ( 'Asia/Phnom_Penh' );
$currentDate = date ( 'Y-m-d' );

$userClass = new User ();
$userData = $userClass->getUser($dataStore->user_id);
$currentUserType =$userData->result->account_type;
if(!empty($dataStore->sto_url)) {
	$userHome = @Config::get('app.url').$dataStore->sto_url;
} else {
	$userHome = @Config::get('app.url').'store-'.$dataStore->id;
}
function rm($article, $char) {
	$article = preg_replace ( "/<img[^>]+\>/i", "(image) ", $article );
	if (strlen ( $article ) > $char) {
		return substr ( $article, 0, $char ) . '...';
	} else
		return $article;
}
?>
@extends('frontend.modules.store.layout.layout')
@section('title')
	Home
@endsection
@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="{{Config::get('app.url')}}">Home</a></li>
		<li><a href="#">Library</a></li>
		<li class="active">Data</li>
	</ol>
@endsection
@section('content')
<div class="col-sm-8">
	<div class="features_items">
		<!-- ============Slider end here========= -->
		<div class="features_items">
			<div class="category-tab lastest-post">
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li><strong>The latest products</strong>  &nbsp;&nbsp;&nbsp; &frasl;</li>
						<li>Products : <span class="number-display">25</span></li>
						<li>Stores :<span class="number-display">25</span></li>
						<li>Market :<span class="number-display">25</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-12" style="padding:0;">
            @if(count($dataProduct)>0)
                <?php $i=1;?>
                @foreach($dataProduct as $product)
                @if ($i % 4 == 1)
                    <div class="row">
                @endif
     			<div class="col-sm-3">
    				<div class="product-image-wrapper">
    					<div class="single-products">
    						<div class="productinfo text-center">
    							<a href="{{$userHome}}/my/detail/{{$product->id}}">
                                    @if($product->thumbnail)
									{{HTML::image("image/phpthumb/$product->thumbnail?p=product&amp;h=150&amp;w=150",$product->title,array('class'
						=> 'img-rounded','width'=>'150'))}}
									@else 
									{{HTML::image("image/phpthumb/No_image_available.jpg?p=1&amp;h=150&amp;w=150",$product->title,array('class'
						=> 'img-rounded','width'=>'150'))}}
						@endif
    							</a>
    							<?php $readmore = @rm ( $product->title, 30 );?>
    							<h2>{{$readmore}}</h2>
    							<p>{{$product->price}} $</p>
    							<a href="{{$userHome}}/my/detail/{{$product->id}}">View Details</a>
    						</div>
    						<img src="{{Config::get('app.url')}}/frontend/images/home/sale.png" class="new" alt="" />
    					</div>
    				</div>
    			</div>
                @if ($i % 4 == 0)
                    </div>
                @endif
                <?php $i++;?>             
                @endforeach
                @if ($i % 4 != 1)
                    </div>
                @endif
            @else
            <div class="col-sm-12">
                <h2>{{trans('product.user_product_not_found')}}</h2>
            </div>
            @endif
		</div>
	</div>
    {{$dataProduct->links()}}
</div>
@endsection
@section('left')
	@if (! empty ( $toolView ))
		@foreach ( $toolView as $tool )
			@if($tool->type == 'tool_memeber_status' && $tool->status == 1)
				@include('frontend.modules.store.partials.slidebar.memeber_status')
			@endif
		@endforeach
	@endif
@endsection
@section('right')

@if (! empty ( $toolView ))
	@foreach ( $toolView as $tool )
		@if($tool->type == 'tool_visitor_info' && $tool->status == 1)
		@include('frontend.modules.store.partials.slidebar.tool_visitor')
		@endif
	@endforeach
@endif


@if(!empty($banner))
    @foreach($banner as $ban)
        @if($ban->ban_position == 'rs')
            @if($ban->ban_enddate >= $currentDate)
<a class="banner-link" href="{{@$ban->ban_link}}" target="_blank"><img
	src="{{Config::get('app.url')}}upload/user-banner/{{$ban->ban_image}}"
	style="width: 100%;" /></a>
@endif @endif @endforeach @endif @endsection