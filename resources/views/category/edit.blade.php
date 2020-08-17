@extends('master')
@section('main')

       @if(Session::has('success'))
			<div class="alert alert-info text-center">{{ Session::get('success') }}</div>
			@endif

      {!! Form::open(array('url' => 'save-edit-category', 'role'=>'form')) !!}
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
				{!! Form::text('title', $data[0]->name, array('class'=>'form-control')) !!}
        <input type="hidden" name="id" class="form-control" value={!! $data[0]->term_id !!} >        

      </div>
      <button type="submit" class="btn btn-default">Edit</button>
		{!! Form::close() !!}     
	
@stop

@section('row')
asdf
@stop