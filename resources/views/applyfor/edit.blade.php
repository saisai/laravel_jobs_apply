@extends('master')
@section('main')


      @if(Session::has('success'))
			<div class="alert alert-info text-center">{!! Session::get('success') !!}</div>
			@endif

      {!! Form::open(array('url' => 'save-edit-apply-for', 'role'=>'form')) !!}
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
				{!! Form::text('title', $data->title, array('class'=>'form-control')) !!}        
        <input type="hidden" name="id" class="form-control" value={!! $data->id !!} >        

      </div>
      <button type="submit" class="btn btn-default">Submit</button>
		{!! Form::close() !!}




@stop

@section('row')

@stop