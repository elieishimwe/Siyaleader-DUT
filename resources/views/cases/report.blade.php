<!-- Modal Default -->
<div class="modal modalCaseReport" id="modalCaseReport" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close"  id="closeCaseReportModal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id='depTitle'>Edit Case details</h4>
            </div>
            <div class="row">
              <div class="col-md-6">

              </div>
               <div class="col-md-6">


              </div>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'escalateCase', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"caseReportCaseForm" ]) !!}
                {!! Form::hidden('caseID',NULL,['id' => 'caseID']) !!}


                <div class="form-group">
                    {!! Form::label('Search Field', 'Search Field', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('hsecellphone',NULL,['class' => 'form-control input-sm','id' => 'hsecellphone']) !!}

                  </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Hse Cell Number', 'Hse Cell Number', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('cellphone',NULL,['class' => 'form-control input-sm','id' => 'cellphone','disabled']) !!}
                      @if ($errors->has('cellphone')) <p class="help-block red">*{{ $errors->first('cellphone') }}</p> @endif
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('Hse Holder Name', 'Hse Holder Name', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('name',NULL,['class' => 'form-control input-sm','id' => 'name','disabled']) !!}
                      @if ($errors->has('name')) <p class="help-block red">*{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Hse Holder Surname', 'Hse Holder Surname', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('surname',NULL,['class' => 'form-control input-sm','id' => 'surname','disabled']) !!}
                      @if ($errors->has('surname')) <p class="help-block red">*{{ $errors->first('surname') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Hse Holder ID Number', 'Hse Holder ID Number', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('id_number',NULL,['class' => 'form-control input-sm','id' => 'id_number']) !!}
                      @if ($errors->has('id_number')) <p class="help-block red">*{{ $errors->first('id_number') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Preferred Language', 'Preferred Language', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                    {!! Form::select('language',$selectLanguages,0,['class' => 'form-control' ,'id' => 'language','disabled']) !!}
                    @if ($errors->has('language')) <p class="help-block red">*{{ $errors->first('language') }}</p> @endif
                  </div>
                </div>



                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">

                 <div class="form-group">
                  {!! Form::label('Province', 'Province', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                    {!! Form::select('province',$selectProvinces,0,['class' => 'form-control' ,'id' => 'province','disabled']) !!}
                    @if ($errors->has('province')) <p class="help-block red">*{{ $errors->first('province') }}</p> @endif
                  </div>
                </div>

                 <div class="form-group">
                    {!! Form::label('Hse Number', 'Hse Number', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('hsenumber',NULL,['class' => 'form-control input-sm','id' => 'hsenumber','disabled']) !!}
                      @if ($errors->has('hsenumber')) <p class="help-block red">*{{ $errors->first('hsenumber') }}</p> @endif
                    </div>
                </div>

                <div class="form-group">
                  {!! Form::label('District', 'District', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                    {!! Form::select('district',$selectDistricts,0,['class' => 'form-control input-sm' ,'id' => 'district','disabled']) !!}
                    @if ($errors->has('district')) <p class="help-block red">*{{ $errors->first('district') }}</p> @endif
                  </div>
               </div>

                <div class="form-group">
                    {!! Form::label('Municipality', 'Municipality', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                    {!! Form::select('municipality',$selectMunicipalities,0,['class' => 'form-control input-sm' ,'name' => 'municipality','id' => 'municipality','disabled']) !!}
                    @if ($errors->has('municipality')) <p class="help-block red">*{{ $errors->first('municipality') }}</p> @endif
                  </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Ward', 'Ward', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                    {!! Form::select('ward',$selectWards,0,['class' => 'form-control input-sm' ,'name' => 'ward','id' => 'ward','disabled']) !!}
                    @if ($errors->has('ward')) <p class="help-block red">*{{ $errors->first('ward') }}</p> @endif
                  </div>
                </div>

                <div class="form-group">
                    {!! Form::label('Area', 'Area', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                      {!! Form::text('area',NULL,['class' => 'form-control input-sm','area','disabled']) !!}
                      @if ($errors->has('area')) <p class="help-block red">*{{ $errors->first('area') }}</p> @endif
                  </div>
                </div>

                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">


                <div class="form-group">
                    {!! Form::label('Problem Description', 'Problem Description', array('class' => 'col-md-3 control-label')) !!}
                    <div class="col-md-6">
                        <textarea rows="5" id="description" name="description" class="form-control" maxlength="500"></textarea>
                    </div>
                </div>

                <hr class="whiter m-t-20">
                <hr class="whiter m-b-20">

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                       <a type="#" id='submitEscalateCaseForm' class="btn btn-sm">Save Changes</a>
                    </div>
                </div>

               <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">

                    </div>
                </div>

                {!! Form::close() !!}

            </div>



        </div>
    </div>
</div>
