@extends('master')

@section('content')

<!-- Breadcrumb -->
<ol class="breadcrumb hidden-xs">
    <li><a href="#">Administration</a></li>
    <li><a href="{{ url('list-districts/$provinceObj->id') }}">Districts</a></li>
    <li><a href="#">{{ $provinceObj->name }}</a></li>
    <li class="active">Districts Listing</li>
</ol>

<h4 class="page-title">{{ $provinceObj->name }} DISTRICTS</h4>
<!-- Alternative -->
<div class="block-area" id="alternative-buttons">
    <h3 class="block-title">Districts Listing</h3>
    <a class="btn btn-sm" data-toggle="modal" data-target=".modalAddCategory">
     Add District
    </a>
</div>

<!-- Responsive Table -->
<div class="block-area" id="responsiveTable">
    @if(Session::has('success'))
      <div class="alert alert-success alert-icon">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ Session::get('success') }}
          <i class="icon">&#61845;</i>
      </div>
    @endif
    <div class="table-responsive overflow">
        <table class="table tile table-striped" id="districtsTable">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Created At</th>
                    <th>Name</th>
                    <th>Actions</th>
              </tr>
            </thead>
        </table>
    </div>
</div>
@include('districts.edit')
@include('districts.add')
@endsection

@section('footer')

 <script>
  $(document).ready(function() {

  var department = {!! $provinceObj->id !!};
  var oTable     = $('#districtsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "dom": 'T<"clear">lfrtip',
                "order" :[[0,"desc"]],
                "ajax": "{!! url('/districts-list/" + department +"')!!}",
                 "columns": [
                {data: 'id', name: 'id'},
                {data: 'created_at', name: 'created_at'},
                {data: function(d)
                {
                 return "<a href='{!! url('list-sub-categories/" + d.id + "') !!}' class='btn btn-sm'>"+d.name+"</a>";

                },"name" : 'name'},

              {data: 'actions',  name: 'actions'},
               ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 1] },
                { "bSortable": false, "aTargets": [ 1 ] }
            ]

         });

  });

   function launchUpdateDistrictModal(id)
    {

      $(".modal-body #districtID").val(id);

        $.ajax({
        type    :"GET",
        dataType:"json",
        url     :"{!! url('/districts/"+ id + "')!!}",
        success :function(data) {

            if(data[0] !== null)
            {

               $("#modalEditDistrict #name").val(data[0].name);

            }
            else {
               $("#modalEditDistrict #name").val('');
            }

        }
    });

    }

    @if (count($errors) > 0)

      $('#modalAddCategory').modal('show');

    @endif
</script>
@endsection
