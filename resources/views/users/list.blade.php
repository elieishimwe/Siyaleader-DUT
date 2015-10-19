@extends('master')

@section('content')
<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="{{ url('list-users') }}">Users</a></li>
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
                    <th>Actions</th>
              </tr>
            </thead>
        </table>
    </div>
</div>
@include('users.edit')
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
                {data: 'cellphone', name: 'cellphone'},
                {data: 'email', name: 'email'},
                {data: 'actions',  name: 'actions'}

               ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 6 ] },
                { "bSortable": false, "aTargets": [ 6 ] }
            ]

         });

  });

    function launchUpdateUserModal(id)
    {

       $(".modal-body #userID").val(id);
       $.ajax({
        type    :"GET",
        dataType:"json",
        url     :"{!! url('/users/"+ id + "')!!}",
        success :function(data) {

            if(data[0] !== null)
            {

               $("#modalEditUser #role").val(data[0].role);
               $("#modalEditUser #name").val(data[0].name);
               $("#modalEditUser #surname").val(data[0].surname);
               $("#modalEditUser #email").val(data[0].email);
               $("#modalEditUser #alt_email").val(data[0].alt_email);
               $("#modalEditUser #cellphone").val(data[0].cellphone);
               $("#modalEditUser #alt_cellphone").val(data[0].alt_cellphone);
               $("#modalEditUser #position").val(data[0].position);
               $("#modalEditUser #role").val(data[0].role);
               $("#modalEditUser #language").val(data[0].language);
               $("#modalEditUser #id_number").val(data[0].id_number);
               $("#modalEditUser #department").val(data[0].department);
               $("#modalEditUser #province").val(data[0].province);
               $("#modalEditUser #district").val(data[0].district);
               $("#modalEditUser #municipality").val(data[0].municipality);
               $("#modalEditUser #ward").val(data[0].ward);



            }
            else {
               $("#modalEditUser #name").val('');
            }

        }
    });

    }
</script>
@endsection
