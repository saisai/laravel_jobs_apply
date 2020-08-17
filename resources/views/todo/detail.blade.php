@extends('master')
@section('main')
    

      <div class="form-group">
         {{ $data->description }}
      </div>      
      <a href='{{ url('list-todolist') }}' class="btn btn-default">Back</a>



    
    @stop

@section('row')
asdf
@stop