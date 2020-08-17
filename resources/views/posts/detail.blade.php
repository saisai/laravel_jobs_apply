@extends('master')
@section('main')
    
    
  
      <div class="form-group">        
         {{ $data->post_content }}<br />
      </div>      
      <a href='{{ url('list-post') }}' class="btn btn-default">Back</a>
      <a href="{{ url('edit-go-post/'. $data->id) }}" class="btn btn-default">Edit</a>
  


    
 @stop

@section('row')
asdf
@stop