@extends('master')
@section('main')
    <div class="jumbotron">
      <div class="container">

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;?>
					@foreach ($result as $job)
					
					<tr>                    
					<td>{!! $i !!}</td>
					<td><a href="{{ $job->link }}" target="_blank">{{ $job->title  }}</a></td>
					<td>{{ $job->time  }}</td>
					<td>
					{!! Form::open(array('method' => 'post')) !!}
					{!! Form::submit('click Me!', array('id'=> $i, 'class' => 'btn btn-default formJobsDb')) !!}
					{!! Form::close() !!}
					</td>
					</tr>

					<?php $i++; ?>
					@endforeach
				</tbody>
				
			</table>			
						{!! $result !!}
			</div>
			<!--

        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
			-->
    </div>
@stop

@section('row')

@stop