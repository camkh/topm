@extends('backend/layout') @section('title') Create @endsection
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="{{URL::to('admin/dashboard')}}">Dashboard</a></li>
	<li><a href="{{URL::to('admin/advertisements')}}">Advertisement</a></li>
	<li>Create</li>
</ul>
@endsection @section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<i class="icon-calendar"></i>
				<h3 class="panel-title">Client Information</h3>
			</div>
			<script>
			$(function() {
				var availableTags = ["{{$clients}}"];
				$( "#search_by_name" ).autocomplete({
					source: availableTags
				});

				var availableAdminUsers = ["{{$adminUsers}}"];
				$( "#incharger" ).autocomplete({
					source: availableAdminUsers
				});
			});
			</script>
			<div class="panel-body">
				{{Form::open(array('url'=>'admin/create-advertisement','enctype'=>'multipart/form-data','file' => true))}}
					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::radio('membership', '0', true)}} <label for="membership">None Member</label>
						{{Form::radio('membership', '1', false)}} <label for="membership">Member</label>
					</div>

					{{ Form::hidden('user_id', '', array('id' => 'user_id')) }}
					<div class="form-group col-md-6 col-sm-12 col-xs-6 search-by-name">
						{{Form::text('search_username',null, array('class' =>
						'form-control','placeholder'=>'Search by Name', 'id' => 'search_by_name'))}}
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('username',null, array('class' =>
						'form-control','placeholder'=>'Name', 'id' => 'username'))}}
						<span class="class-error">{{$errors->first('username')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('address',null, array('class' =>
						'form-control','placeholder'=>'Address', 'id' => 'address'))}}
						<span class="class-error">{{$errors->first('address')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('email',null, array('class' =>
						'form-control','placeholder'=>'Email', 'id' => 'email'))}}
						<span class="class-error">{{$errors->first('email')}}</span>
					</div>

					<div class="form-group col-md-6 col-sm-12 col-xs-6">
						{{Form::text('phone',null, array('class' =>
						'form-control','placeholder'=>'Phone Number', 'id' => 'phone_number'))}}
						<span class="class-error">{{$errors->first('phone')}}</span>
					</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-------->
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#advertisement" data-toggle="tab">Advertisement Information</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="advertisement">
					@include('backend.modules.advertisement.add-advertisement')
				</div>
			</div>
		</div>
	</div>
</div>
@include('backend.modules.advertisement.add-to-page')
@endsection
