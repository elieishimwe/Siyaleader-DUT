@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">Registration Form</li>
</ol>
<h4 class="page-title">USERS</h4>

<!-- Basic with panel-->
<div class="block-area" id="basic">
    <h3 class="block-title">Registration Form</h3>
    <div class="tile p-15">
        {!! Form::open(['url' => 'users', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"registrationForm" ]) !!}

            <div class="form-group">
                {!! Form::label('User Type', 'User Type', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::select('role',$selectRoles,0,['class' => 'form-control input-sm' ,'id' => 'role']) !!}
                  @if ($errors->has('role')) <p class="help-block red">*{{ $errors->first('role') }}</p> @endif
              </div>
            </div>


            <div class="form-group">
                {!! Form::label('Title', 'Title', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::select('title',['Mr' => 'Mr','Mrs' => 'Mrs','Miss' => 'Miss','Ms' => 'Ms'],0,['class' => 'form-control' ,'id' => 'title']) !!}
                  @if ($errors->has('surname')) <p class="help-block red">*{{ $errors->first('surname') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('First Name', 'First Name', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name']) !!}
                  @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Surname', 'Surname', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('surname',NULL,['class' => 'form-control input-sm','id' => 'surname']) !!}
                  @if ($errors->has('surname')) <p class="help-block red">*{{ $errors->first('surname') }}</p> @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ID No', 'ID No', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('id_number',NULL,['class' => 'form-control input-sm','id' => 'id_number']) !!}
                  @if ($errors->has('id_number')) <p class="help-block red">*{{ $errors->first('id_number') }}</p> @endif
                </div>
            </div>
            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">

            <div class="form-group">
                {!! Form::label('Cell Number', 'Cell Number', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('cellphone',NULL,['class' => 'form-control input-sm','id' => 'cellphone']) !!}
                  @if ($errors->has('Cellphone')) <p class="help-block red">*{{ $errors->first('Cellphone') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Alternative Cell Number', 'Alternative Cell Number', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('alt_cellphone',NULL,['class' => 'form-control input-sm','id' => 'alt_cellphone']) !!}
                  @if ($errors->has('alt_cellphone')) <p class="help-block red">*{{ $errors->first('alt_cellphone') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Email', 'Email', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('email',NULL,['class' => 'form-control input-sm','email']) !!}
                  @if ($errors->has('email')) <p class="help-block red">*{{ $errors->first('email') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Alternative Email', 'Alternative Email', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::text('alt_email',NULL,['class' => 'form-control input-sm','alt_email']) !!}
                  @if ($errors->has('alt_email')) <p class="help-block red">*{{ $errors->first('alt_email') }}</p> @endif
              </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">


            <div class="form-group">
              {!! Form::label('Province', 'Province', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('province',$selectProvinces,0,['class' => 'form-control' ,'id' => 'province']) !!}
                @if ($errors->has('province')) <p class="help-block red">*{{ $errors->first('province') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('District', 'District', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('district',$selectDistricts,0,['class' => 'form-control input-sm' ,'id' => 'district']) !!}
                @if ($errors->has('district')) <p class="help-block red">*{{ $errors->first('district') }}</p> @endif
              </div>
           </div>

            <div class="form-group">
                {!! Form::label('Municipality', 'Municipality', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('municipality',$selectMunicipalities,0,['class' => 'form-control input-sm' ,'name' => 'municipality','id' => 'municipality']) !!}
                @if ($errors->has('municipality')) <p class="help-block red">*{{ $errors->first('municipality') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Ward', 'Ward', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('ward',$selectWards,0,['class' => 'form-control input-sm' ,'name' => 'ward','id' => 'ward']) !!}
                @if ($errors->has('ward')) <p class="help-block red">*{{ $errors->first('ward') }}</p> @endif
              </div>
            </div>

            <hr class="whiter m-t-20">
            <hr class="whiter m-b-20">

            <div class="form-group">
                {!! Form::label('Department', 'Department', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::select('department',$selectDepartments,0,['class' => 'form-control input-sm' ,'id' => 'department']) !!}
                  @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                {!! Form::label('Position', 'Position', array('class' => 'col-md-2 control-label')) !!}
                <div class="col-md-6">
                  {!! Form::select('position',$selectPositions,0,['class' => 'form-control input-sm' ,'id' => 'position']) !!}
                  @if ($errors->has('position')) <p class="help-block red">*{{ $errors->first('position') }}</p> @endif
              </div>
            </div>



            <div class="form-group">
              {!! Form::label('Business Unit', 'Business Unit', array('class' => 'col-md-2 control-label')) !!}
              <div class="col-md-6">
                {!! Form::select('Department',$selectDepartments,0,['class' => 'form-control' ,'id' => 'department']) !!}
                @if ($errors->has('department')) <p class="help-block red">*{{ $errors->first('department') }}</p> @endif
              </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-6">
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

      $("#province").change(function(){

        $.get("{{ url('/api/dropdown/districts/province')}}",
        { option: $(this).val()},
        function(data) {
        $('#district').empty();
        $('#municipality').empty();
        $('#ward').empty();
        $('#district').removeAttr('disabled');
        $('#district').append("<option value='0'>Select one</option>");
        $('#municipality').append("<option value='0'>Select one</option>");
        $('#ward').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#district').append("<option value="+ key +">" + element + "</option>");
        });
        });

   })

    $("#district").change(function(){
        $.get("{{ url('/api/dropdown/municipalities/district')}}",
        { option: $(this).val() },
        function(data) {
        $('#municipality').empty();
        $('#municipality').removeAttr('disabled');
        $('#municipality').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#municipality').append("<option value="+ key +">" + element + "</option>");
        });
        });
    });

    $("#municipality").change(function(){
        $.get("{{ url('/api/dropdown/wards/municipality')}}",
        { option: $(this).val() },
        function(data) {
        $('#ward').empty();
        $('#ward').removeAttr('disabled');
        $('#ward').append("<option value='0'>Select one</option>");
        $.each(data, function(key, element) {
        $('#ward').append("<option value="+ key +">" + element + "</option>");
        });
        });
    });

  })

</script>
@endsection
