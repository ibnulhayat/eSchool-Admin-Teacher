@extends('includes.header')
@section('pageTitle', 'Thana')

@push('styles')
<style>

.addBtn{
  font-size: 18px;
  font-style: normal;
  font-weight: bold;

}
</style>
@endpush

@section('content')

<div class="row">


  <!-- right site div start here-->
  <div class="col-12">

   <div class="card">
    <div class="card-header bg-megna">
      <div class="d-flex">
        <div class="align-self-center">
          <h3 class="m-b-0 text-white">Show All Thana List</h3>
        </div>
        <div class="ml-auto">
          <button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
          Add New Thana</button>

        </div>
      </div>
    </div>
    <div class="card-body">
     <div class="table-responsive">
      <table id="thanaList" class="p-l-0 p-r-0 table table-bordered table-striped">
       <thead>
        <tr>

          <th>Thana Name</th>
          <th>District Name</th>
          <th width="10%">Action</th>

        </tr>
      </thead>
      <tbody>
        <!-- dynamic table will be load here -->

      </tbody>
    </table>
  </div>
</div>
</div>
</div>


</div>
<!-- right site div end here-->



<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" id="tooltipmodel">Are you sure to delete this User?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn waves-effect waves-light btn-outline-danger"
    data-dismiss="modal">Cancel</button>
    <button id="delete_yes" type="button" class="btn waves-effect waves-light btn-danger"
    data-dismiss="modal">Confirm</button>

  </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /end modal -->

<!-- /add User modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-megna ">
        <h4 class="modal-title text-white" id="modalHeader"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">×</button>
      </div>
      <!-- modatl body start -->
      <div class="modal-body"> 

        <div class="col-12">
          <div class="card">

            <form id="addForm">
              <input type="hidden" name="edit_id" id="edit_id"/>
              <div class="form-body">
                {{ csrf_field() }}

                <div class="row p-t-20">
                 <div class="col-md-12">
                   <div class="form-group row">
                    <label for="name" class="col-sm-4 control-label">Thana Name:<span
                      class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <div class="controls">
                          <input type="text" maxlength="60" name="tha_name" class="form-control" id="tha_name"
                          placeholder="Thana Name" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group row">

                    <label for="phone" class="col-sm-4 control-label">District:<span
                      class="text-danger">*</span></label>
                      <div class="col-sm-8">
                       <div class="controls">
                        <select class="form-control" name="district_id" id="district_id">

                        </select> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-actions text-right">
                <button type="button" class="btn waves-effect waves-light btn-outline-danger"
                data-dismiss="modal">Cancel</button>
                <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-outline-success"
                ><i class="fa fa-check"></i> Save </button>

              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
    <!-- modal body end -->

  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /end modal -->




@endsection
@push('scripts')

<script type="text/javascript">
 $(document).ready(function() {
        //
        districtlist();
        // list data
        var table = $('#thanaList').DataTable({

         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('thanaDataTable') }}",
          type: 'GET',
        },
        "order": [
        [2, 'asc']
        ],
        columns: [
        {
          data: 'name',
        },
        {
          data: 'district',
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
        ]
      });

        $("#addForm").on('submit', function(event) {
          event.preventDefault();
          
          var form_data = document.getElementById("addForm");
          var fd = new FormData(form_data);
          if(fd.get('tha_name') != ""){
            $.ajax({
              url: "{{ url('/addThana') }}",
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              success: function(data) {
                if (data.result == "success") {
                  $('#addModal').modal('hide');
                  table.ajax.reload(null, false);
                  showNotification(data.result, data.message);
                } else if (data.result == "error") {
                  showNotification(data.result, data.message);
                }
              }
            });
          }

        });


        
  // update
  $('body').on('click', '.editData', function(event) {
    var row_id = $(this).data('id');
    $('#edit_id').val(row_id);
    $('#modalHeader').html('Edit District Information');

    $.get("{{ url('/getThanaById') }}/"+row_id, function(data) {

     $('#addModal').modal('show');

     var data = $.parseJSON(data);

     $('#tha_name').val(data[0].name);
     $('#district_id').val(data[0].district_id);

   });


  });



    // delete data
    var id_user_for_delete = "";
    $('body').on('click', '.deleteData', function() {
     id_user_for_delete = $(this).data('id');
     $('#deleteModal').modal('show');
   });

    // delete yes click
    $("#delete_yes").click(function(event) {
     $.post("{{ url('/thanaDeleteByID') }}", {
      "_token": "{{ csrf_token() }}",
      'id': id_user_for_delete,
    },
    function(data, textStatus, xhr) {
      if (data.result == "success") {
       showNotification(data.result, data.message);
       table.ajax.reload(null, false);
     } else if (data.result == "error") {
       showNotification(data.result, data.message);
     }
   });
   });

    function showNotification(type, message) {
      $.toast({
        heading: message,
        position: 'bottom-right',
        loaderBg: '#ff6849',
        icon: type,
        hideAfter: 3000,
        stack: 1
      });
    }



    // show modal code
    $('#addBtn').click(function(event) {
      $('#modalHeader').html('Add New Thana');
      $('#edit_id').val('');
      $('#addForm')[0].reset();

      $('#addModal').modal('show');
    });

    // drop down manu sat up code
    function districtlist() {
      $.get('{{ url("/districtlist") }}', function(data) {
        var disData = jQuery.parseJSON(data);
        var ddHtml = "";
        $.each(disData, function(index, val) {
          ddHtml+='<option value="'+val.id+'">'+val.name+'</option>';
        });
        $('#district_id').html(ddHtml);

      });
    }

  });
</script>
@endpush