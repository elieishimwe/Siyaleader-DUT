@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Home</a></li>
    <li class="active">Console</li>
</ol>

<h4 class="page-title">Console</h4>



<!-- Quick Stats -->
<div class="block-area" id="tabs">
    <div class="tab-container">

        <div class="row nav tab">
            <a href="#reported">
                <div class="col-md-3 col-xs-6">
                    <div class="tile quick-stats">
                        <div id="stats-line-2" class="pull-left"></div>
                        <div class="data">
                            <h2 data-value="{{ count($numberReferredCases,0)}}">0</h2>
                            <small>Reported/Referred Cases </small>
                        </div>
                    </div>
                </div>
            </a>

            @if ( Auth::user()->role == 1)
                <a href="#pendingreferral">
                    <div class="col-md-3 col-xs-6">
                        <div class="tile quick-stats">
                            <div id="stats-line" class="pull-left"></div>
                            <div class="data">
                                <h2 data-value="{{ count($numberPendingCases,0)}}">0</h2>
                                <small>Reported/Pending Referral Cases </small>
                            </div>
                        </div>
                    </div>
                </a>
            @endif

            <a href="#closure">
                <div class="col-md-3 col-xs-6">
                    <div class="tile quick-stats media">
                        <div id="stats-line-3" class="pull-left"></div>
                        <div class="media-body">
                            <h2 data-value="{{ count($numberPendingClosureCases,0)}}">0</h2>
                            <small>Pending Closure Cases</small>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#resolved">
                <div class="col-md-3 col-xs-6">
                    <div class="tile quick-stats media">
                        <div id="stats-line-4" class="pull-left"></div>
                        <div class="media-body">
                            <h2 data-value="{{ count($numberResolvedCases,0)}}">0</h2>
                            <small>Resolved Cases</small>
                        </div>
                    </div>
                </div>
            </a>

        </div>

       <hr class="whiter" />

       <div class="tab-content">
            <div class="tab-pane active" id="reported">
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive overflow">
                        <h3 class="block-title">Reported/Referred Cases Listing</h3>
                        <table class="table tile table-striped" id="casesTable">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="closure">
             <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive overflow">
                        <h3 class="block-title">Pending Closure Cases Listing</h3>
                        <table class="table tile table-striped" id="deletedCasesTable">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="pendingreferral">
             <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive overflow">
                        <h3 class="block-title">Reported/Pending Referral Cases Listing</h3>
                        <table class="table tile table-striped" id="pendingreferralCasesTable">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="resolved">
             <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissable fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="table-responsive overflow">
                        <h3 class="block-title">Resolved Cases Listing</h3>
                        <table class="table tile table-striped" id="resolvedCasesTable">
                            <thead>
                              <tr>
                                    <th>Id</th>
                                    <th>Created At</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<hr class="whiter" />




@include('cases.profile')
@include('cases.refer')
@include('cases.closeRequest')
@include('addressbook.list')
@include('addressbook.add')
@include('casenotes.add')
@include('casefiles.add')



@endsection

@section('footer')
 <script>

 @include('functions.caseModal')



  @if (count($errors) > 0)

      $('#modalAddContactModal').modal('show');

  @endif

</script>
@endsection

