@extends('master')
@section('main')


        {!! Form::open(array('url' => 'edit-detail', 'role'=>'form')) !!}
        <div class="form-group">
            {!! Form::hidden('deail_id', $data[0]->detail_id ) !!}
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $data[0]->email }}">
            <label for="exampleInputEmail1">Qualification</label>
            {!! Form::textarea('qualification', $data[0]->qualification , array('class' => 'ckeditor form-control')) !!}
            <label for="exampleInputEmail1">Responsibility</label>
            {!! Form::textarea('responsibility', $data[0]->responsibility, array('class' => 'ckeditor form-control')) !!}
            <label for="exampleInputEmail1">CompanyInfo</label>
            {!! Form::textarea('companyinfo', $data[0]->companyInfo, array('class' => 'ckeditor form-control')) !!}
            <label for="exampleInputEmail1">Salary</label>
            <input type="text" name="salary" class="form-control" id="salary" value="{{ $data[0]->salary }}" >
			<br />
            <label for="exampleInputEmail1">Apply For</label>
            <select name="apply_for_id"  autocomplete="off">
                <?php foreach($applyFor as $apply): ?>
                    <?php if($apply->id == $data[0]->apply_for_id): ?>
                        <option value={{ $apply->id }} selected='selected'>{{ $apply->title }}</option>
        <?php else:?>
                        <option value={{ $apply->id }}  >{{ $apply->title }}</option>
        <?php endif;?>
                <?php endforeach;?>
            </select>
						<br />
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        {!! Form::close() !!}
   
@stop

@section('row')

@stop