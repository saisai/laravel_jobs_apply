@extends('master')
@section('main')


		@if(Session::has('success'))
			<div class="alert alert-info text-center">{!! Session::get('success') !!}</div>
		@endif
	  
      {!! Form::open(array('role'=>'form')) !!}
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" id="title" name="title" class="form-control"  >        

      </div>
      <button type="submit" class="btn btn-default applyFor">Submit</button>
	  
	{!! Form::close() !!}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


@stop

@section('row')

@stop