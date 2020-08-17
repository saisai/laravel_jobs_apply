@extends('master')
@section('main')
          @if(Session::has('success'))
          <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
          @endif
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
                    {!! Form::open(array('method' => 'post')) !!}
					<tr>                    
					<td>
						<?php
						if(app('request')->input('page') == 1)
						{
							echo $i;
						}else
						{
							echo app('request')->input('page') * 100 + $i;
						}
						?>
					</td>
					<td><a href="{{ $job->link }}" target="_blank">{{ $job->title  }}</a></td>
					<td>
                        {{ $job->time  }}
                        {!! Form::hidden('title',  $job->title, array('id'=>'title'.$i) ) !!}
                        {!! Form::hidden('link', $job->link, array('id'=>'link'.$i)  )  !!}
                        {!! Form::hidden('from_which_website', Request::path(), array('id'=>'from_which_website'.$i))  !!}
                    </td>
					<td>
					@if (Auth::check())
					{!! Form::submit('click Me!', array('id'=> $i, 'class' => 'btn btn-default formJobsDb')) !!}
					@endif
					{!! Form::close() !!}
					</td>
					</tr>

					<?php $i++; ?>
					@endforeach
				</tbody>
				
			</table>
             <div class="text-center">
						{!! $result !!}
              </div>
@stop

@section('row')

@stop