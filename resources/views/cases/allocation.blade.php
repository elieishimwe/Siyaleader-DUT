<!-- Modal Default -->
<div class="modal modalCaseAllocation" id="modalCaseAllocation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"  id="closeAllocateCase" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id='depTitle'>Allocate Case</h4>
            </div>
            <div class="row">
              <div class="col-md-6">

              </div>

            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'escalateCase', 'method' => 'post', 'class' => 'form-horizontal', 'id'=>"allocationCaseForm" ]) !!}
                {!! Form::hidden('caseID',NULL,['id' => 'caseID']) !!}

                <div class="form-group">
                  {!! Form::label('Department', 'Department', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                  {!! Form::select('department',$selectDepartments,0,['class' => 'form-control' ,'id' => 'department']) !!}
                  <div id = "error_department"></div>
                  </div>
                </div>

                <div class="form-group hidden" id="categoryDiv">
                  {!! Form::label('Category', 'Category', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                  {!! Form::select('category',$selectCategories,0,['class' => 'form-control' ,'id' => 'category','hidden']) !!}
                  <div id = "error_category"></div>
                  </div>
                </div>

                <div class="form-group hidden" id="subCategoryDiv">
                  {!! Form::label('Sub Category', 'Sub Category', array('class' => 'col-md-3 control-label')) !!}
                  <div class="col-md-6">
                  {!! Form::select('sub_category',$selectCategories,0,['class' => 'form-control' ,'id' => 'sub_category','hidden']) !!}
                  <div id = "error_sub_category"></div>
                  </div>
                </div>


                <div class="form-group">
                    {!! Form::label('Message', 'Message', array('class' => 'col-md-2 control-label')) !!}
                    <div class="col-md-8">
                        <textarea rows="5" id="message" name="message" class="form-control" maxlength="500"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                       <a type="#" id='submitEscalateCaseForm' class="btn btn-sm">Allocate Case</a>
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
