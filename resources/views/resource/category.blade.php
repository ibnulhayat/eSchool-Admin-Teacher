@extends('includes.header')
@section('pageTitle', 'Category')

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


  <div class="col-12">

   <div class="card">
    <div class="card-header bg-info">

      <div class="d-flex">
        <div class="align-self-center">
          <h3 class="m-b-0 text-white">Show All Category List</h3>
        </div>
        <div class="ml-auto">
          <button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
          Add New Category</button>

        </div>
      </div>
    </div>
    <div class="card-body">
     <div class="table-responsive">
      <table id="catagoryList" class="p-l-0 p-r-0 table table-bordered table-striped">
       <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
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

<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title" >Are you sure to delete this User?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn waves-effect waves-light btn-outline-danger"
    data-dismiss="modal">Cancel</button>
    <button id="delete_yes" type="button" class="btn waves-effect waves-light btn-danger"
    data-dismiss="modal">Confirm</button>
  </div>
</div>

</div>

</div>
<!-- /end delete modal -->

<!-- /add Referral modal -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title text-white" id="modalHeader"></h4>
        <button type="button" class="close white" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

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
                  <label for="name" class="col-sm-4 control-label">Name:<span
                    class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <div class="controls">
                        <input type="text" name="cat_name" maxlength="60" class="form-control" id="cat_name"
                        placeholder="Category Name" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-12">
                  <div class="form-group row">
                   <label for="phone" class="col-sm-4 control-label">Description:<span
                    class="text-danger">*</span></label>
                    <div class="col-sm-8">
                     <div class="controls">
                      <textarea type="text" name="description" rows="5" class="form-control" id="description"
                      placeholder="Description" required></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-actions text-right">
              <button type="button" class="btn waves-effect waves-light btn-outline-danger"
              data-dismiss="modal">Cancel</button>

              <button id="add_save_btn" type="submit" class="waves-effect waves-light btn btn-info" ><i class="fa fa-check"></i> Save</button>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </div>


</div>
</div>
</div>
<!-- /end Add modal -->




@endsection

@push('scripts')

<script type="text/javascript">
 $(document).ready(function() {


        // show modal code
        $('#addBtn').click(function(event) {
          $('#modalHeader').html('Add New Catagory');
          $('#edit_id').val('');
          $('#addForm')[0].reset();

          $('#addModal').modal('show');
        });


        $("#addForm").on('submit', function(event) {
          event.preventDefault();
          
          var form_data = document.getElementById("addForm");
          var fd = new FormData(form_data);
          console.log(fd.get('cat_name'));
          if(fd.get('cat_name') != ""){
            $.ajax({
              url: "{{ url('/addCategory') }}",
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
                } else {
                  showNotification(data.result, data.message);
                }
              }
            });
          }

        });

        // list data
        var table = $('#catagoryList').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('categoryListDataTable') }}",
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
          data: 'description',
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        },
        ]
      });




    // update
    $('body').on('click', '.editData', function(event) {
      var row_id = $(this).data('id');
      $('#edit_id').val(row_id);
      $('#modalHeader').html('Edit Catagory Information');

      $.get("{{ url('/getCatagoryById') }}/"+row_id, function(data) {

       $('#addModal').modal('show');

       var data = $.parseJSON(data);

       $('#cat_name').val(data[0].name);
       $('#description').val(data[0].description);

     });


    });



    // delete data
    var row_id = "";
    $('body').on('click', '.deleteData', function() {
     row_id = $(this).data('id');
     $('#deleteModal').modal('show');
     console.log(row_id);
   });

    // delete yes click
    $("#delete_yes").click(function(event) {
     $.post("{{ url('/categoryDeleteByID') }}", {
      "_token": "{{ csrf_token() }}",
      'id': row_id,
    },
    function(data, textStatus, xhr) {
      if (data.result == "success") {
        showNotification(data.result, data.message);
        table.ajax.reload(null, false);
      } else  {
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


  });
</script>
@endpush