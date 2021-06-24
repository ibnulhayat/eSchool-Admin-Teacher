@extends('includes.header')
@section('pageTitle', 'Subject')
@push('styles')
<style type="text/css">

.addBtn{
    font-size: 18px;
    font-style: normal;
    font-weight: bold;

}
</style>
@endpush
@section('content')
<!-- main row start div -->
<div class="row"> 


    <!-- show Referral vid start bellow -->
    <div class="col-12">
     <div class="card">

        <div class="card-header bg-megna">
            <div class="d-flex">
                <div class="align-self-center">
                  <h3 class="m-b-0 text-white">Show All Subject List</h3>
              </div>
              <div class="ml-auto">
                  <button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
                  Add New Subject</button>

              </div>
          </div>
      </div>
      <div class="card-body">
       <div class="table-responsive">
        <table id="subjectList" class="p-l-0 p-r-0 table table-bordered table-striped">
         <thead>
            <tr>
                <th>Full Name</th>
                <th>Short Name</th>
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
<!-- show Referral vid end here -->

</div> <!-- main row end div -->

<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" >Are you sure to delete this Referral?</h4>
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
            <div class="modal-header bg-megna">
                <h4 class="modal-title text-white" id="modalHeader"></h4>
                <button type="button" class="close white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
             <div class="col-12">
                <div class="card">

                    <form id="addSubjectForm">
                        <input type="hidden" name="edit_id" id="edit_id"/>
                        <div class="form-body">
                            {{ csrf_field() }}
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 control-label">Full Name:<span
                                            class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <div class="controls">
                                                    <input type="text" maxlength="60" name="full_name" class="form-control" id="full_name"
                                                    placeholder="Full Name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 control-label">Short Name:<span
                                                class="text-danger">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="controls">
                                                        <input type="text" maxlength="60" name="short_name" class="form-control" id="short_name"placeholder="Short name" equired >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-actions text-right">
                                        <button type="button" class="btn waves-effect waves-light btn-outline-danger"
                                        data-dismiss="modal">Cancel</button>

                                        <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-info" ><i class="fa fa-check"></i> Save</button>
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


    <!-- //javascript code start -->
    <script type="text/javascript">
        $(document).ready(function() {

            districtlist();

            var table = $('#subjectList').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('subjectlist') }}",
                    type: 'GET',
                },
                "order": [
                [0, 'asc']
                ],
                columns: [
                {
                    data: 'full_name',
                    name: 'full_name'
                },
                {
                    data: 'short_name',
                    name: 'short_name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                ]
            });


            $('#addBtn').click(function(event) {
                $('#modalHeader').html('Add New Subject');
                $('#edit_id').val('');
                $('#addSubjectForm')[0].reset();
                // var select_id = $('#district_id :selected').attr('value');
                // thanalist(select_id);

                $('#addModal').modal('show');
            });




            $("#addSubjectForm").on('submit', function(event) {
                event.preventDefault();

                var form_data = document.getElementById("addSubjectForm");
                var fd = new FormData(form_data);
                if(fd.get('theName') != ""){
                    $.ajax({ 
                        url: "{{ url('/addsubject') }}",
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




            $('body').on('click', '.editData', function(event) {
                var row_id = $(this).data('id');
                $('#edit_id').val(row_id);
                $('#modalHeader').html('Edit Subject Information');

                $.get("{{ url('/getsubjectById') }}/"+row_id, function(data) {

                    $('#addModal').modal('show');

                    var data = $.parseJSON(data);

                    $('#full_name').val(data[0].full_name);
                    $('#short_name').val(data[0].short_name);

                });

            });





            var row_id = "";
            $('body').on('click', '.deleteData', function() {
                row_id = $(this).data('id');
                $('#deleteModal').modal('show');
            });



            $("#delete_yes").click(function(event) {
                $.post("{{ url('/referralDeleteById') }}", {
                    "_token": "{{ csrf_token() }}",
                    'id': row_id,
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
    <!-- //javascript code start -->
    @endpush