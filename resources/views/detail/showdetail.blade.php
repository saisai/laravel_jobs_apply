@extends('master')
@section('main')

    

      {!! Form::open(array('url' => 'edit_detail_data', 'role'=>'form')) !!}
	  <table class="table">
		<tr><td>Email address</td><td>{{ $email }}</td></tr>
		<tr><td>Qualification</td><td>{!! $qualification !!}</td></tr>
		<tr><td>Responsibility</td><td>{!! $responsibility !!}</td></tr>
		<tr><td>CompanyInfo</td><td>{!! $companyInfo !!}</td></tr>
		<tr><td>Salary</td><td>{{ $salary }}</td></tr>
		<tr><td>Apply For</td><td>{!! $titles !!}</td></tr>
	  </table>      
      <a href='{{ url('list') }}' class="btn btn-default">Back</a>
  {!! Form::close() !!}
   

@stop

@section('row')

@stop