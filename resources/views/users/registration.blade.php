@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">User Registration Form</li>
</ol>
<h4 class="page-title">USERS</h4>

<!-- Basic with panel-->
<div class="block-area" id="basic">
    <h3 class="block-title">User Registration Form</h3>
    <div class="tile p-15">
        {!! Form::open(['url' => 'users', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"registrationForm" ]) !!}
            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-10">
                  {!! Form::text('Fname',NULL,['class' => 'form-control input-sm','id' => 'Fname']) !!}
                  @if ($errors->has('Fname')) <p class="help-block red">*{{ $errors->first('Fname') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surname', 'Surname', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-10">
                  {!! Form::text('Sname',NULL,['class' => 'form-control input-sm','id' => 'Sname']) !!}
                  @if ($errors->has('Sname')) <p class="help-block red">*{{ $errors->first('Sname') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Cell Number', 'Cell Number', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-10">
                  {!! Form::text('Cell1',NULL,['class' => 'form-control input-sm','id' => 'Cell1']) !!}
                  @if ($errors->has('Cell1')) <p class="help-block red">*{{ $errors->first('Cell1') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Email', 'Email', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-10">
                  {!! Form::text('Email',NULL,['class' => 'form-control input-sm','Email']) !!}
                  @if ($errors->has('Email')) <p class="help-block red">*{{ $errors->first('Email') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Workplace Position/Title', 'Workplace Position/Title', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-10">
                  {!! Form::select('Position',$selectPositions,0,['class' => 'form-control input-sm' ,'id' => 'Position']) !!}
                  @if ($errors->has('Position')) <p class="help-block red">*{{ $errors->first('Position') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('Province', 'Province', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-10">
                {!! Form::select('Province',$selectProvinces,0,['class' => 'form-control' ,'id' => 'Province']) !!}
                @if ($errors->has('Province')) <p class="help-block red">*{{ $errors->first('Province') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('Port', 'Port', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-10">
                {!! Form::select('District',$selectDistricts,0,['class' => 'form-control input-sm' ,'id' => 'District']) !!}
                @if ($errors->has('district')) <p class="help-block red">*{{ $errors->first('district') }}</p> @endif
              </div>
           </div>

            <div class="form-group">
                {!! Form::label('Precinct', 'Precinct', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-10">
                {!! Form::select('Municipality',$selectMunicipalities,0,['class' => 'form-control input-sm' ,'name' => 'Municipality[]','multiple' => 'multiple','id' => 'Municipality']) !!}
                @if ($errors->has('Municipality')) <p class="help-block red">*{{ $errors->first('Municipality') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('Business Unit', 'Business Unit', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-10">
                {!! Form::select('Department',$selectDepartments,0,['class' => 'form-control' ,'id' => 'department']) !!}
                @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button type="submit" id='submitMemberForm' class="btn btn-info btn-sm m-t-10">SUBMIT FORM</button>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('footer')
<script>
   $(document).ready(function() {

      $("#Province").change(function(){

        $.get("{{ url('/api/dropdown/districts/province')}}",
        { option: $(this).val()},
        function(data) {
        $('#District').empty();
        $('#municipality').empty();
        $('#District').removeAttr('disabled');
        $('#District').append("<option value='0'>Select one</option>");
        $('#Municipality').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#District').append("<option value="+ key +">" + element + "</option>");
        });
        });

   })

    $("#District").change(function(){
        $.get("{{ url('/api/dropdown/municipalities/district')}}",
        { option: $(this).val() },
        function(data) {
        $('#Municipality').empty();
        $('#Municipality').removeAttr('disabled');
        $('#Municipality').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#Municipality').append("<option value="+ key +">" + element + "</option>");
        });
        });
    });

  })

</script>
@endsection
