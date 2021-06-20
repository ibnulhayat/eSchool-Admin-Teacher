@extends('includes.header')
@section('pageTitle', 'Resource')

@push('styles')
<style>

	#addBtn{
		font-size: 18px;
		font-style: normal;
		font-weight: bold;

	}

	#tagView{
		margin-bottom: 30px;
		font-size: 13px;
		color: #000;
	}


</style>
@endpush

@section('content')
<!-- <link href="summernote-bs4.css" rel="stylesheet"> -->
<div class="row">

	<div class="col-12" >
		<div class="card">
			<div class="card-header bg-info">
				<div class="d-flex">
					<div class="align-self-center">
						<h3 class="m-b-0 text-white">Show All Resource List</h3>
					</div>
					<div class="ml-auto">
						<button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
						Add New Resource</button>

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="resourceList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th >Title</th>
								<th>Category</th>
								<th>Keywords</th>
								<th width="10%">Action</th> 
							</tr>
						</thead>
						<tbody>
							<!-- dynamic table will be load here  --> 

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



<!-- /add Resource modal -->
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
											<label  class="col-sm-4 control-label">Title:<span
												class="text-danger">*</span></label>
												<div class="col-sm-12">
													<div class="controls">
														<input 
														type="text" name="title" class="form-control" id="title"
														placeholder="Enter Title Here" required="required">
													</div>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="col-md-12">
											<div class="form-group row">
												<label for="phone" class="col-sm-4 control-label">Category:<span
													class="text-danger">*</span></label>
													<div class="col-sm-12">
														<div class="controls">
															<select class="form-control" name="category_id" id="category_id">
															</select> 

														</div>
													</div>
												</div>
											</div>
											<!--/span-->

											<div class="col-md-12">
												<div class="form-group row">
													<label  class="col-sm-12 control-label">Description:</label>
													<div class="col-sm-12">
														<div class="controls">
															<textarea type="text" name="description" id="description" class="form-control"  rows="5">

															</textarea>

														</div>
													</div>
												</div>
											</div> 
											<!--/span-->
											<div class="col-md-12">
												<div class="form-group row">
													<label  class="col-sm-2 control-label">keywords:</label>
													<div class="col-sm-12">
														<div class="controls">
															<input 
															type="text" name="keyword" class="form-control" id="keyword"
															placeholder="Enter keywords" >
														</div>
													</div>
												</div>
											</div>

										</div>

										<hr>
										<div class="form-actions text-right">
											<button  data-dismiss="modal" type="button" class="btn waves-effect waves-light btn-outline-danger">Cancel</button>

											<button id="add_save_btn" type="submit" class="waves-effect waves-light btn btn-info" > Submit</button>
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

		<!-- /show Resource modal -->
		<div id="showModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h4 class="modal-title text-white margin" id="showMH"></h4>
						<button type="button" class="close white" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></button>
					</div>

					<div class="modal-body bg-light text-dark">
						<div class="col-12">
							<div class="card bg-light text-dark" >
								<p id="tagView"></p>

								<div id="desView">

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /end Add modal -->

		@endsection
		@push('scripts')

		<script src="{{ asset('ckeditor_4/ckeditor.js') }}"></script>
		<script src="{{ asset('ckeditor_4/config.js') }}"></script>

		<script type="text/javascript">

			$(document).ready(function() {

				var url = $(location).attr('href'),
				parts = url.split("/"),
				last_part = parts[parts.length-1];
				if(last_part == "resource"){
					URL = "{{ url('resourcedatatable') }}";
				}else{
					URL = "{{ url('resourcedatatable') }}/"+last_part;
				}
				

				var editor = CKEDITOR.replace('description',{
					uiColor: '#9AB8F3'
				});
				// CKEDITOR.editorConfig = function ( config ) {
				// 	config.toolbarLocation = 'bottom';
				// 	config.toolbarGroups = [
				// 	{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
				// 	{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
				// 	{ name: 'links' },
				// 	{ name: 'insert' },
				// 	{ name: 'forms' },
				// 	{ name: 'tools' },
				// 	{ name: 'document',       groups: [ 'mode', 'document', 'doctools' ] },
				// 	{ name: 'others' },
				// 	'/',
				// 	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
				// 	{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
				// 	{ name: 'styles' },
				// 	{ name: 'colors' },
				// 	{ name: 'about' }
				// 	];
				// };

				
				//table.column([2]).search(callerID).draw();



				categoryList();
				$('#addBtn').click(function(event) {
					$('#modalHeader').html('Add New Resource Information');
					$('#addForm')[0].reset();
					editor.setData('');
					$('#edit_id').val('');
					
					$('#addModal').modal('show');
				});



				var table = $('#resourceList').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url: URL,
						type: 'GET',
					},
					"order": [
					[3, 'asc']
					],
					columns: [
					{
						data: 'title',
						name: 'title',

					},
					{
						data: 'category',
						name: 'category'
					},
					{
						data: 'keywords', 
						name: 'keywords'
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
					for ( instance in CKEDITOR.instances ) {
						CKEDITOR.instances[instance].updateElement();
					}

					var form_data = document.getElementById("addForm");
					var fd = new FormData(form_data);

					// document.getElementById("editview").innerHTML = fd.get('description');

					$.ajax({
						url: "{{ url('/addnewresource') }}",
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
							} else{
								showNotification(data.result, data.message);
							}
						}
					});
				});




				$('body').on('click', '.editData', function(event) {
					var row_id = $(this).data('id');
					$('#edit_id').val(row_id);
					$('#modalHeader').html('Edit Resource Information');

					$.get("{{ url('/getresourceById') }}/"+row_id, function(data) {

						$('#addModal').modal('show');

						var data = $.parseJSON(data);

						$('#title').val(data[0].title);
						$('#category_id').val(data[0].category_id);
						$('#keyword').val(data[0].keywords);
						editor.setData(data[0].description);


					});

				});


				$('body').on('click', '.viewPost', function(event) {
					var row_id = $(this).data('id');

					$.get("{{ url('/getresourceById') }}/"+row_id, function(data) {
						$('#showModal').modal('show');
						var data = $.parseJSON(data);
						$('#showMH').html(data[0].title);

						var tags = "Category: " +data[0].category+" | Tags: "+data[0].keywords;
						console.log(data[0].title); 
						document.getElementById("tagView").innerHTML = tags; 
						document.getElementById("desView").innerHTML = data[0].description;

					});

				});



				var row_id = "";
				$('body').on('click', '.deleteData', function() {
					row_id = $(this).data('id');
					$('#deleteModal').modal('show');
				});



				$("#delete_yes").click(function(event) {
					$.post("{{ url('/resourceDeleteById') }}", {
						"_token": "{{ csrf_token() }}",
						'id': row_id,
					},
					function(data, textStatus, xhr) {
						if (data.result == "success") {
							showNotification(data.result, data.message);
							table.ajax.reload(null, false);
						} else  {
							showNotification(data.result, data.message)
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

				function categoryList() {
					$.get('{{ url("/categorylist") }}', function(data) {
						var catData = jQuery.parseJSON(data);
						var catHtml = "";
						$.each(catData, function(index, val) {
							catHtml+='<option value="'+val.id+'">'+val.name+'</option>';
						});
						$('#category_id').html(catHtml);

					});
				}


			});
		</script>
		@endpush
