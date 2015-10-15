@extends('master')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">Users Listing</li>
</ol>

<h4 class="page-title">USERS</h4>
<!-- Alternative -->
<div class="block-area" id="alternative-buttons">
    <h3 class="block-title">Users Listing</h3>
    <a href="{{ url('add-user') }}" class="btn btn-sm">
       Add User
    </a>
</div>

<!-- Responsive Table -->
<div class="block-area" id="responsiveTable">
    @if(Session::has('success'))
      <div class="status alert alert-danger">
          {{ Session::get('success') }}
      </div>
    @endif
    <div class="table-responsive overflow">
        <table class="table tile table-striped" id="usersTable">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Cell Number</th>
                    <th>Email</th>
                    <th>Password</th>
              </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('footer')

 <script>
    $(document).ready(function() {

  var oTable     = $('#usersTable').DataTable({
                "processing": true,
                "serverSide": true,
                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                "ajax": "{!! url('/users-list/')!!}",
                 "columns": [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'username', name: 'username'},
                {data: 'actions',  name: 'actions'}

               ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 6 ] },
                { "bSortable": false, "aTargets": [ 6 ] }
            ]

         });

  });
</script>
@endsection
