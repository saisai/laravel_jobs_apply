@extends('master')
@section('main')
      @if(Session::has('success'))
			<div class="alert alert-info text-center">{{ Session::get('success') }}</div>
		@endif
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Title </th>
          <th>Category </th>
          <th>Created at</th>


        </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
        @foreach ($data as $list)
        <tr>
          
        <td>{{ $i }}</td>
        
        <td><a href="{{ url('view-post/' . $list->id) }}" target='_blank'>{{ $list->post_title  }}</a></td>
				<td>{{ $list->name }}</td>
				<td>{{ $list->created_at }}</td>
				<td><a href="{{ url('view-post/'. $list->id) }}">View</a></td>
				<td><a href="{{ url('edit-go-post/'. $list->id) }}">Edit</a></td>
				<td><a href="{{ url('delete-post/'.$list->id) }}">Delete</a></td>
        </tr>
        <?php $i++ ;?>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      
      {{-- $data->links() --}}
      
    </div>

@stop

@section('row')
asdf
@stop
