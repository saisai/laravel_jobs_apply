@extends('master')
@section('main')
 
		
		@if(Session::has('success'))
			<div class="alert alert-info text-center">{{ Session::get('success') }}</div>
		@endif		
		
      <div class="container">
         {!! Form::open(array('id'=>'upload_form', 'role'=>'form', 'files' => true)) !!}
      <div class="form-group">
		<!--
        <label for="exampleInputEmail1">Title</label>
        {!! Form::text('title', Input::old('title'), array('class' => 'form-control', 'id' => 'title')) !!}   
		-->
		<label for="exampleInputEmail1">Apply For</label>
		<?php $apply_for= array(); ?>
		@foreach ($applyFor as $apply)
		<?php $apply_for[$apply->id] = $apply->title; ?>
		@endforeach
		{!! Form::select('applyFor', $apply_for, null, array('id'=>'applyFor', 'class'=>'form-control')) !!}		
		<br />
        <label for="exampleInputEmail1">File</label>
        {!! Form::file('fileinput',  array('id' => 'fileinput', 'class'=>'form-control')) !!}
	
      </div>
      <button type="submit" class="btn btn-default uploadClick">Submit</button>
   {!! Form::close() !!}
	   </div>
		<div id="res_message"></div>
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
	
		
@stop

@section('row')

@stop