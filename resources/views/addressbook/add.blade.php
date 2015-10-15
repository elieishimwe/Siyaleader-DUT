<!-- Modal Default -->
<div class="modal fade modalAddContactModal" id="modalAddContactModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closeAddContactModal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Contact</h4>
            </div>

            <div class="modal-body">
              {!! Form::open(['url' => 'addContact', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"addContactForm" ]) !!}
              {!! Form::hidden('uid',Auth::user()->id,['id' => 'uid']) !!}
              <div class="form-group">
                  {!! Form::label('First Name', 'First Name', array('class' => 'col-md-2 control-label')) !!}
                  <div class="col-md-10">
                    {!! Form::text('FirstName',NULL,['class' => 'form-control input-sm','id' => 'FirstName']) !!}
                    @if ($errors->has('FirstName')) <p class="help-block red">*{{ $errors->first('FirstName') }}</p> @endif
                  </div>
              </div>
              <div class="form-group">
                  {!! Form::label('Surname', 'Surname', array('class' => 'col-md-2 control-label')) !!}
                  <div class="col-md-10">
                    {!! Form::text('Surname',NULL,['class' => 'form-control input-sm','id' => 'Surname']) !!}
                    @if ($errors->has('Surname')) <p class="help-block red">*{{ $errors->first('Surname') }}</p> @endif
                  </div>
              </div>
               <div class="form-group">
                  {!! Form::label('Email Address', 'Email Address', array('class' => 'col-md-2 control-label')) !!}
                  <div class="col-md-10">
                    {!! Form::text('email',NULL,['class' => 'form-control input-sm','id' => 'email']) !!}
                    @if ($errors->has('email')) <p class="help-block red">*{{ $errors->first('email') }}</p> @endif
                  </div>
              </div>
              <div class="form-group">
                  {!! Form::label('Cellphone', 'Cellphone', array('class' => 'col-md-2 control-label')) !!}
                  <div class="col-md-10">
                    {!! Form::text('cellphone',NULL,['class' => 'form-control input-sm','id' => 'cellphone']) !!}
                    @if ($errors->has('cellphone')) <p class="help-block red">*{{ $errors->first('cellphone') }}</p> @endif
                  </div>
              </div>

              <div class="form-group">
                  {!! Form::label('Relationship', 'Relationship', array('class' => 'col-md-2 control-label')) !!}
                  <div class="col-md-10">
                    {!! Form::select('relationship',$selectRelationships,0,['class' => 'form-control input-sm' ,'id' => 'relationship']) !!}
                    @if ($errors->has('relationship')) <p class="help-block red">*{{ $errors->first('relationship') }}</p> @endif
                </div>
              </div>


              <div class="form-group">
                  <div class="col-md-offset-2 col-md-10">
                      <a type="#" id='submitAddContactForm' class="btn btn-sm">Add Contact</a>
                  </div>
              </div>
              {!! Form::close() !!}
          </div>


        </div>
    </div>
</div>
