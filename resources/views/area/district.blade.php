@extends('includes.header')
@section('pageTitle', 'District')

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
			<div class="card-header bg-megna">
				<div class="d-flex">
					<div class="align-self-center">
						<h3 class="m-b-0 text-white">Show All District List</h3>
					</div>
					<div class="ml-auto">
						<button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">Add New District</button>
					</div>
				</div>

			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="distictList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th>District Name</th>
								<th>Division Name</th>
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

						<form id="addForm">
							<input type="hidden" name="edit_id" id="edit_id">
							<div class="form-body">
								{{ csrf_field() }}
								<div class="row p-t-20">

									<div class="col-md-12">
										<div class="form-group row">
											<label  class="col-sm-4 control-label">Name:<span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<input type="text" maxlength="60" name="dis_name" class="form-control" id="dis_name"
													placeholder="District Name" required="required" >
												</div>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-12">
										<div class="form-group row">
											<label for="phone" class="col-sm-4 control-label">Division: <span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<select class="form-control" name="division_id" id="division_id">
														<option value="1">Chittagong</option>
														<option value="2">Rajshahi</option>
														<option value="3">Khulna</option>
														<option value="4">Barisal</option>
														<option value="5">Sylhet</option>
														<option value="6">Dhaka</option>
														<option value="7">Rangpur</option>
														<option value="8">Mymensingh</option>
													</select> 
												</div>
											</div>
										</div>
									</div>

								</div>
								<hr>
								<div class="form-actions text-right">
									<button type="button" class="btn waves-effect waves-light btn-outline-danger" data-dismiss="modal">Cancel</button>

									<button id="add_save_btn" type="submit" class="waves-effect waves-light btn btn-success" > <i class="fa fa-check"> </i> Save</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /end modal -->



@endsection
@push('scripts')


<script type="text/javascript">
	$(document).ready(function() {


		$('#addBtn').click(function(event) {

			$('#modalHeader').html('Add New District');
			$('#addForm')[0].reset();
			$('#addModal').modal('show');

		});


		$("#addForm").on('submit', function(event) {
			event.preventDefault();

			var form_data = document.getElementById("addForm");
			var fd = new FormData(form_data);
			if(fd.get('dis_name') != ""){
				$.ajax({
					url: "{{ url('/addDistrict') }}",
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

		var table = $('#distictList').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('districtListDataTable') }}",
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
				data: 'division',
			},
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			}
			]
		});


		$('body').on('click', '.editData', function(event) {
			var row_id = $(this).data('id');
			$('#edit_id').val(row_id);
			$('#modalHeader').html('Edit District Information');

			$.get("{{ url('/getDistrictById') }}/"+row_id, function(data) {
				$('#addModal').modal('show');

				var data = $.parseJSON(data);

				$('#dis_name').val(data[0].name);
				$('#division_id').val(data[0].division_id);

			});
		});




		var row_id = "";
		$('body').on('click', '.deleteData', function() {
			row_id = $(this).data('id');
			$('#deleteModal').modal('show');
			console.log(row_id);
		});


		$("#delete_yes").click(function(event) {
			$.post("{{ url('/districtDeleteByID') }}", {
				"_token": "{{ csrf_token() }}",
				'id': row_id,
			},
			function(data, textStatus, xhr) {
				if (data.result == "success") {
					showNotification(data.result, data.message);
					table.ajax.reload(null, false);
				} else {
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
