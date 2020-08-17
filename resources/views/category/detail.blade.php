@extends('master')
@section('main')

		{!! Form::open(array('url' => 'edit_detail_data', 'role'=>'form')) !!}
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label><br />
        {!! $data[0]->name !!}<br />
        <label for="exampleInputEmail1">Description</label><br />
         {!! $data[0]->description !!}<br />
      </div>      
      <a href='{{ url('list-category') }}' class="btn btn-default">Back</a>
  {!! Form::close() !!}
	
@stop

@section('row')
asdf
@stop

