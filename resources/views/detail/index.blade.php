@extends('master')
@section('main')


        {!! Form::open(array('id'=>'addDetail','role'=>'form')) !!}
        <div class="form-group">
			
            {!! Form::hidden('link', $link) !!}
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            <label for="exampleInputEmail1">Qualification</label>
			{!! Form::textarea('qualification', Input::old('qualification'), array('class' => 'ckeditor form-control')) !!}
			<!--
			<textarea name="qualification" class="materialize-textarea ckeditor form-control"></textarea>
			-->
            <label for="exampleInputEmail1">Responsibility</label>
			{!! Form::textarea('responsibility', Input::old('responsibility'), array('class' => 'ckeditor form-control')) !!}
			<!--
			<textarea name="responsibility" class="materialize-textarea ckeditor form-control"></textarea>
            -->
            <label for="exampleInputEmail1">CompanyInfo</label>
			{!! Form::textarea('companyinfo', Input::old('companyinfo'), array('class' => 'ckeditor form-control')) !!}
			<!--
			<textarea name="companyinfo" class="materialize-textarea ckeditor form-control"></textarea>
            -->
            <label for="exampleInputEmail1">Salary</label>
            <input type="text" name="salary" class="form-control" id="salary" >
			
            <label for="exampleInputEmail1">Apply For</label>
            <?php $apply_for= array(); ?>
            @foreach ($applyFor as $apply)
            <?php $apply_for[$apply->id] = $apply->title; ?>
            @endforeach
            {!! Form::select('applyFor', $apply_for, null, array('id'=>'applyFor')) !!}


            {!! Form::hidden('link', $link ) !!}
            {!! Form::hidden('tb_apply_id', $tb_apply_id ) !!}
        
            
        </div>
		<button type="submit" class="btn btn-default clickAddDetail">Submit</button>
        {!! Form::close() !!}
		<div class="alert alert-danger print-error-msg" style="display:none">
			<ul></ul>
		</div>
    
@stop

@section('row')

@stop