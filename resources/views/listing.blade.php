@extends('master')
@section('main')

          <div id="sendingMail"></div>
          @if(Session::has('success'))
          <!-- <div class="alert alert-info text-center">{{ Session::get('success') }}</div> -->
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
					
					<tr>                    
					<td>{!! $i !!}</td>
					<td><a href="{{ $job->link }}" target="_blank">{{ $job->title  }}</a></td>
					<td>{{ $job->apply_times  }}</td>
                    @if ( $job->tb_detail_id == 0)
					<td colspan="3">
					{!! Form::open(array('method' => 'post', 'url' => 'show-form-detail')) !!}
                    {!! Form::hidden('link',  $job->link  ) !!}
                    {!! Form::hidden('tb_apply_id',  $job->id  ) !!}
                    {!! Form::submit('Add', array('id'=> $i, 'class' => 'btn btn-default')) !!}
					{!! Form::close() !!}
                    </td>
                    @endif
                    @if ( $job->tb_detail_id > 0)
                    <td>
                        {!! Form::open(array('method' => 'post', 'url' => 'show-edit-detail')) !!}
                        {!! Form::hidden('id',  $job->id  ) !!}
                        {!! Form::submit('Edit', array('id'=> $i, 'class' => 'btn btn-default')) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>

                    {!! Form::open(array('method' => 'post', 'url' => 'detail-list')) !!}
                    {!! Form::hidden('id',  $job->tb_detail_id  ) !!}
                    {!! Form::submit('View', array('id'=> $i, 'class' => 'btn btn-default')) !!}
                    {!! Form::close() !!}

					</td>

                    <td>
                    {!! Form::open(array('method' => 'post' )) !!}
										

                    {!! Form::hidden('tb_apply_id',  $job->id, array("id" => "tb_apply_id_".$i) ) !!}
                    {!! Form::hidden('detail_id',  $job->tb_detail_id, array('id' => 'detail_id_'.$i)  ) !!}

                    {!! Form::submit('Fire Me!', array('id'=> $i, 'class' => 'btn btn-default classSendMail')) !!}
                    {!! Form::close() !!}
                    </td>
                    @endif
                    <td>
                        {!! Form::open(array('method' => 'post', 'url' => 'delete-list')) !!}
                        {!! Form::hidden('id',  $job->id  ) !!}
                        {!! Form::submit('Delete', array('id'=> $i, 'class' => 'btn btn-default')) !!}
                        {!! Form::close() !!}
                    </td>
					</tr>

					<?php $i++; ?>
					@endforeach
				</tbody>
				
			</table>
            <div class="text-center">
						<?php /* {!! $result !!}  */ ?>
              </div>

@stop

@section('row')

@stop