@extends('includes.header')
@section('pageTitle', 'Teachers & Students List')
@push('styles')
<style type="text/css">

.addBtn{
	font-size: 18px;
	font-style: normal;
	font-weight: bold;

}
.border-left-right-teal{
	border-left-style: solid;
	border-left-color: #808000;
}
.bg-card-header{
	background-color: #E0E0E0;
}

#tableView{
	display: block;
}
</style>
@endpush

@section('content')
<div class="row">

	<div class="col-12" id="tableView" >
		<div class="card">
			<div class="card-header bg-megna">
				<div class="d-flex">
					<div class="align-self-center">
						<h3 class="m-b-0 text-white">Show All Users List</h3>
					</div>
					<div class="ml-auto">
						<button id="addBtn" type="button" class="addBtn btn waves-effect waves-light btn-outline-light">
						Add New User</button>

					</div>
				</div>
			</div>

			<div class="card-body" >
				<div class="table-responsive" >
					<table id="usersList" class="p-l-0 p-r-0 table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Gender</th>
								<th>Birth Date</th>
								<th>Marital Status</th>
								<th>Religion</th>
								<th>Nationality</th>
								<th width="5%">Action</th> 
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

@include('administration/step_one')
@yield('step_one')

@include('administration/step_two')
@yield('step_two')

@include('administration/step_three')
@yield('step_three')

@include('administration/step_four')
@yield('step_four')

@endsection


@push('scripts')
<link rel="stylesheet" href="assets/plugins/select2/dist/css/select2.min.css" />
<script src="assets/plugins/select2/dist/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		

		var table = $('#usersList').DataTable({

			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('usersdatalist') }}",
				type: 'GET',
			},
			"order": [
			[1, 'asc']
			],
			columns: [
			{
				data: 'imageUrl',
				name: 'imageUrl',
				orderable: false,
				searchable: false
			},
			{
				data: 'name',
				name: 'name'
			},

			{
				data: 'email',
				name: 'email'
			},
			{
				data: 'phone',
				name: 'phone'
			},
			{
				data: 'gender',
				name: 'gender'
			},
			{
				data: 'birth_date',
				name: 'birth_date'
			},
			{
				data: 'marital_status',
				name: 'marital_status'
			},
			{
				data: 'religion',
				name: 'religion'
			},
			{
				data: 'nationality',
				name: 'nationality'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},

			]
		});


		//Show add teacher form
		$('#addBtn').click(function(event) {
			$("#tableView").hide();
			selectUserRole("");
			districtlist();
			$('#general-info-Form')[0].reset();
			$('#parents-info-Form')[0].reset();
			$('#address-Form')[0].reset();
			$('#education-info-student-Form')[0].reset();
			$('#education-info-teacher-Form')[0].reset();
			$("#div_step_one").show();

		});



		var row_id = "";
		$('body').on('click', '.deleteData', function() {
			row_id = $(this).data('id');
			$('#deleteModal').modal('show');
			console.log(row_id);
		});


		$("#delete_yes").click(function(event) {
			$.post("{{ url('/userDeleteByID') }}", {
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



		function districtlist() {
			$.get('{{ url("/districtlist") }}', function(data) {
				var disData = jQuery.parseJSON(data);
				var ddHtml = '<option value="">Select Distict</option>';
				$.each(disData, function(index, val) {
					ddHtml+='<option value="'+val.id+'">'+val.name+'</option>';
				});
				$('#parmanent_district_id').html(ddHtml);
				$('#paressent_district_id').html(ddHtml);
				$('#pscDistrict_id').html(ddHtml);
			});
		}
		
		$('#user_role').change(function(event) {
			var select_value = $('#user_role :selected').attr('value');
			selectUserRole(select_value);
		});


		function selectUserRole(select_value) {
			if(select_value == "Student"){
				$('#div_admitted_class').show();
				$('.teacher').hide();
				$('.student').show();
				$( "#admitted_class" ).prop( "disabled", false );
			}else{
				$('#div_admitted_class').hide();
				$('.student').hide();
				$( "#admitted_class" ).prop( "disabled", true );
				$('.teacher').show();
			}
		}

		$("#education-info-student-Form").on('submit', function(event) {
			event.preventDefault();
			//$("#submit-student").prop("disabled", true);
			var form_data = document.getElementById("education-info-student-Form");
			var fd = new FormData(form_data);

			$.ajax({
				url: "{{url('/education-info-student')}}",
				type: 'POST', 
				data: fd,
				processData:false,
				contentType:false,
				success: function (data) {
					if(data.result == "success"){
						showNotification(data.result, data.message);
						$("#div_step_four").hide();
						$("#tableView").show();
						table.ajax.reload(null, false);
					}else{
						showNotification(data.result, data.message);
					}
				}
			});
		});

		$("#education-info-teacher-Form").on('submit', function(event) {
			event.preventDefault();

			$("#submit-teacher").prop("disabled", true);
			var form_data = document.getElementById("education-info-teacher-Form");
			var fd = new FormData(form_data);

			$.ajax({
				url: "{{url('/education-info-teacher')}}",
				type: 'POST', 
				data: fd,
				processData:false,
				contentType:false,
				success: function (data) {
					if(data.result == "success"){
						showNotification(data.result, data.message);
						$("#div_step_four").hide();
						$("#tableView").show();
						table.ajax.reload(null, false);
					}else{
						showNotification(data.result, data.message);
					}
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
