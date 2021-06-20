@extends('includes.header')
@section('pageTitle', 'Report')
@push('styles')
<style type="text/css">
	.addBtn{
		font-size: 18px;
		font-style: normal;
		font-weight: bold;
	}

	.button-width{
		width: 100%;

	}
	.container{
		margin:0px;
		padding: 15px 10px 10px 10px; 
		background-color:#2e86de;
	}
	.nav-tabs >a,
	.nav-tabs >a:hover,
	.nav-tabs >a:focus {
		color: #fff;
		border-color: transparent;
	}
	.table-secondary{
		background-color: #c8d6e5;
	}

	
</style>
@endpush


@section('content')

<div class="row"> 

	<div class="container col-12 rounded">
		<div class="row ">
			<div class="col-12 rounded">
				<nav>
					<div class="nav nav-tabs " id="nav-tab" role="tablist">
						<a class="nav-item nav-link active font-weight-bold " id="nav-info-tab " data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">Caller Info</a>
						<a class="nav-item nav-link  font-weight-bold " id="nav-service-tab " data-toggle="tab" href="#nav-service" role="tab" aria-controls="nav-service" aria-selected="false" style="margin-left: 5px;">Caller Service</a>
						<a class="nav-item nav-link font-weight-bold " id="nav-reportdownload-tab" data-toggle="tab" href="#nav-reportdownload" role="tab" aria-controls="nav-reportdownload" aria-selected="false" style="margin-left: 5px;">Download Report</a>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<div class="col-12 bg-white " style="margin-top: -11px;">

		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active table-responsive "id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"  >
				<table id="allcallerList" class="p-l-0 p-r-0 table table-bordered table-striped">
					<thead>
						<tr>
							<th>Phone Number</th>
							<th>Name</th>
							<th>Called Before</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Marital Status</th>
							<th>District</th>
							<th>Thana</th>
							<th>Source of knowing</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<!--dynamic table will be load here -->
					</tbody>
				</table>
			</div>

			<div class="tab-pane fade table-responsive" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab">
				<table id="reportList" class="p-l-0 p-r-0 table table-bordered table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>Phone Number</th> 
							<th>Name</th> 
							<th>Symptom</th>
							<th>Medication</th>
							<th>Issue of Counseling</th>
							<th>Call duration</th>
							<th>Counselor</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<!-- dynamic table will be load here -->
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="nav-reportdownload" role="tabpanel" aria-labelledby="nav-reportdownload-tab">
				<div class="row card-body ">
					<div class="col-lg-12 p-b-5 d-flex">

						<div class="form-group col-lg-4">
							<select style="width: 100%;" class="form-control" name="report_of_month" id="report_of_month">

							</select>
						</div>
						<div class=" col-lg-4">
							<select class="form-control form-group" name="report_list" id="report_list">
								<option value="first">Gist of Call Analysis</option>
								<option value="issues">Issues of Counsiling</option>
								<option value="reffered">Issues that being Reffered</option>
								<option value="rating">Service Rating</option>
								<option value="marital">Marital Status</option>
								<option value="callertype">Caller Type</option>
								<option value="helpline">About of GB Helpline</option>
								<option value="duration">Call Duration</option>
								<option value="calltype">Call Type</option>
								<option value="district">Zonal Report</option>
							</select> 

						</div>

						<div class="text-center col-lg-4">
							<button type="button" class="btn btn-outline-info addBtn btn-sm" id="exportTable">Excel</button>
							<button type="button" class="btn btn-outline-info addBtn btn-sm" id="printTable">Print</button>
							<button type="button" class="btn btn-outline-info addBtn btn-sm" id="pdfTable">Pdf</button>
						</div>
						
					</div>

					
					
					<div class="col-lg-12">
						<div class="table-responsive" id="tableDiv">
							<table  class="table text-center table-bordered table-secondary " id="reportTable">
								<thead class="">
									<tr>
										<th rowspan="2" > Type</th>
										<th colspan="2"> 10-14 Year</th>
										<th colspan="2"> 15-19 Year</th>
										<th colspan="2"> subTotal<br> [Adolescent]</th>
										<th colspan="2"> 20+ Year</th>
										<th colspan="2"> subTotal</th>
										<th rowspan="2" > Total</th>
									</tr>
									<tr>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
										<th>M</th>
										<th>F</th>
									</tr>
								</thead>
								<tbody id="showValue">

								</tbody>

							</table>
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>

</div> <!-- main row end div -->

<!-- /delete User modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<input type="hidden" name="modalType" id="modalType"/>
				<h4 class="modal-title" >Are you sure to delete this information?</h4>
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


@include('report/infomodal')
@yield('infomodal')

@include('report/servicemodal')
@yield('servicemodal')

@endsection

@push('scripts')

<link rel="stylesheet" href="{{asset('assets/selectTwo/dist/css/select2.min.css')}}" />
<script src="{{asset('assets/selectTwo/dist/js/select2.min.js')}}"></script>


<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/table-button/buttons.print.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js"></script>

<script type="text/javascript">
	$(document).ready(function()
	{
		var todayDate = new Date();





		


		$('#report_of_month').select2();

		$.get('{{ url("/getmonthyear") }}', function(data) {
			var disData = jQuery.parseJSON(data);
			var total = disData[0].value+"-01&"+disData[disData.length-1].value+"-31";
			var ddHtml = '<option value="'+total+'">'+disData[0].date+" - "+disData[disData.length-1].date+'</option>';

			$.each(disData, function(index, val) {
				ddHtml+='<option value="'+val.value+"-01&"+val.value+'-31">'+val.date+'</option>';
			});
			$('#report_of_month').html(ddHtml);

			var select_id = $('#report_list :selected').attr('value');
			showValueInTable(total+"="+select_id);
		});

		

		var row_id = "";
		$('body').on('click', '.infoDeleteData', function() {
			row_id ='';
			row_id = $(this).data('id');
			$('#modalType').val("info");
			$('#deleteModal').modal('show');
		});

		$('body').on('click', '.serviceDeleteData', function() {
			row_id ='';
			row_id = $(this).data('id');
			$('#modalType').val("service");
			$('#deleteModal').modal('show');
		});

		$("#delete_yes").click(function(event) {
			if($('#modalType').val() == "info"){
				deleteItem("{{ url('/callerdeleteByID') }}");
			}else{
				deleteItem("{{ url('/reportdeleteByID') }}");
			}
		});

		function deleteItem(url) {
			$.post(url, {
				"_token": "{{ csrf_token() }}",
				'id': row_id,
			},
			function(data, textStatus, xhr) {
				if (data.result == "success") {
					showNotification(data.result, data.message);
					tableReload();
				} else {
					showNotification(data.result, data.message)
				}
			});
		}

		function tableReload() {
			console.log("tableReload");
			infotable.ajax.reload(null, false);
			servicetable.ajax.reload(null, false);
		}


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


		var infotable = $('#allcallerList').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('allcallerDataTable') }}",
				type: 'GET',
			},
			"order": [
			[9, 'asc']
			],
			columns: [
			{
				data: 'phone',
				name: 'phone'
			},
			{
				data: 'name',
				name: 'name'
			},
			{
				data: 'call_before',
				name: 'call_before'
			},
			{
				data: 'gender',
				name: 'gender'
			},
			{
				data: 'age',
				name: 'age'
			},
			{
				data: 'marital_status',
				name: 'marital_status'
			},
			{
				data: 'district',
				name: 'district'
			},
			{
				data: 'thana',
				name: 'thana'
			},
			{
				data: 'source_of_knowing',
				name: 'source_of_knowing'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},

			],

			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
				}
			},
			{
				extend: 'excel',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
				}
			},
			{
				extend: 'print',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ] 
				}
			},
			{
				extend: 'pdf',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ] 
				}
			}
			]
		});


		var servicetable = $('#reportList').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ url('reportDataTable') }}",
				type: 'GET',
			},
			"order": [
			[8, 'asc']
			],
			columns: [
			{
				data: 'localdate',
				name: 'localdate'
			},
			{
				data: 'phone',
				name: 'phone'
			},
			{
				data: 'name',
				name: 'name'
			},
			{
				data: 'symptom',
				name: 'symptom'
			},
			{
				data: 'medication',
				name: 'medication'
			},
			{
				data: 'issue_of_counseling',
				name: 'issue_of_counseling'
			},
			{
				data: 'call_duration',
				name: 'call_duration'
			},
			{
				data: 'counselor',
				name: 'counselor'
			},
			{
				data: 'action',
				name: 'action',
				orderable: false,
				searchable: false
			},
			],

			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'csv',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
				}
			},
			{
				extend: 'excel',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
				}
			},
			{
				extend: 'print',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ] 
				}
			},
			{
				extend: 'pdf',
				exportOptions: {
					columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ] 
				}
			}
			]

		});


		$('#report_list').change(function(event) {
			var selected_date = $('#report_of_month :selected').attr('value');
			var select_id = $('#report_list :selected').attr('value');

			showValueInTable(selected_date+"="+select_id);
		});

		$('#report_of_month').change(function(event) {
			var selected_date = $('#report_of_month :selected').attr('value');
			var select_id = $('#report_list :selected').attr('value');

			showValueInTable(selected_date+"="+select_id);
		});


		function showValueInTable(name) {
			var totalmf_10=0,totalmf_15=0,totalmf_10_15=0,totalmf_20=0,total=0;
			$.ajax({
				url: "{{ url('/callanalysis') }}/"+name,
				type: 'GET',
				dataType: 'json',
				success: function (data) {
					var toAppendItems = '';
					$.each(data, function(index, val) {
						var name = '';
						if(val.title =="Yes" || val.title == "No"){
							name = val.title == "Yes"?"Old Caller":"New Caller";
						}else{
							name = val.title;
						}

						totalmf_10 += data[index]['count'][0]+data[index]['count'][1];
						totalmf_15 += data[index]['count'][2]+data[index]['count'][3];
						totalmf_10_15 += data[index]['count'][4]+data[index]['count'][5];
						totalmf_20 += data[index]['count'][6]+data[index]['count'][7];
						total += data[index]['count'][10];

						toAppendItems += 
						'<tr> <td>'+name+'</td>'+
						'<td>'+data[index]['count'][0]+'</td>'+
						'<td>'+data[index]['count'][1]+'</td>'+
						'<td>'+data[index]['count'][2]+'</td>'+
						'<td>'+data[index]['count'][3]+'</td>'+
						'<td>'+data[index]['count'][4]+'</td>'+
						'<td>'+data[index]['count'][5]+'</td>'+
						'<td>'+data[index]['count'][6]+'</td>'+
						'<td>'+data[index]['count'][7]+'</td>'+
						'<td>'+data[index]['count'][8]+'</td>'+
						'<td>'+data[index]['count'][9]+'</td>'+
						'<td class="font-weight-bold">'+data[index]['count'][10]+'</td></tr>'

					});
					toAppendItems += '<tr class="font-weight-bold"> <td >'+"Total"+'</td>'+
					'<td colspan="2">'+totalmf_10+'</td>'+
					'<td colspan="2"> '+totalmf_15+'</td>'+
					'<td colspan="2">'+totalmf_10_15+'</td>'+
					'<td colspan="2">'+totalmf_20+'</td>'+
					'<td colspan="2">'+" "+'</td>'+
					'<td>'+total+'</td></tr>'
					$('#showValue').html(toAppendItems);

				}
			});
		}

		$('#exportTable').click(function(event) {
			exportReportToExcel();
		});
		$('#printTable').click(function(event) {
			var selectYera = $("#report_of_month option:selected").text();
			var selectName = $("#report_list option:selected").text();
			printData(selectName+" "+selectYera);
		});
		$('#pdfTable').click(function(event) {
			var selectYera = $("#report_of_month option:selected").text();
			var selectName = $("#report_list option:selected").text();
			pdfTable(selectName+"-"+selectYera);
			
		});

		function exportReportToExcel() {
			TableToExcel.convert(document.getElementById("reportTable"), {
				name: "Report.xlsx",
				sheet: {
					name: "Sheet 1"
				}
			});
		}

		function printData(title) {
			var tab = document.getElementById('reportTable');

			var style = "<style>";
			style = style + "table {width: 100%; font: 17px Calibri;}";
			style = style + "h3,table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
			style = style + "padding: 2px 3px; text-align: center; background-color:#c8d6e5;}";
			style = style + "</style>";
			var win = window.open('', 'Download', 'height=700,width=1200');
			win.document.write(style);
			win.document.write('<h3 >'+title+'</h3>');
			win.document.write(tab.outerHTML);
			win.document.close();
			win.print();


		}

		function pdfTable(fileName) { 
			// html2canvas(document.getElementById('reportTable'), {
			// 	onrendered: function (canvas) {
			// 		var data = canvas.toDataURL();
			// 		var docDefinition = {
			// 			content: [{
			// 				image: data,
			// 				width: 500
			// 			}]
			// 		};
			// 		pdfMake.createPdf(docDefinition).download(fileName+".pdf");
			// 	}
			// });

			var doc = new jsPDF();

			doc.text(20, 20, 'Hello world!');
			doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

// Add new page
doc.addPage();
doc.text(20, 20, 'Visit CodexWorld.com');

// Save the PDF
doc.save('document.pdf');
}



		// Update Caller information  
		// code start below
		districtlist();
		thanalist("");

		function districtlist() {
			$.get('{{ url("/districtlist") }}', function(data) {
				var disData = jQuery.parseJSON(data);
				var ddHtml = '<option value="">Select Distict</option>';
				$.each(disData, function(index, val) {
					ddHtml+='<option value="'+val.id+'">'+val.name+'</option>';
				});
				$('#district_id').html(ddHtml);
			});
		}

		$('#district_id').change(function(event) {
			var select_id = $('#district_id :selected').attr('value');
			thanalist(select_id);
		});

		function thanalist(dId) {
			console.log("District-id: "+dId);
			if(dId == ""){
				$('#thana_id').html('<option value="">Not select any district</option>');
			}else{
				$.get("{{ url('/thanalist')}}/"+dId, function(data) {
					var thanaList = JSON.parse(data);
					var th_Html="";
					$.each(thanaList, function(index, val) {
						th_Html+='<option value="'+val.id+'">'+val.name+'</option>';
					});
					$('#thana_id').html(th_Html);
				});
			}
		}

		$('body').on('click', '.infoEditData', function(event) {
			var row_id = $(this).data('id');
			$('#edit_id').val(row_id);
			$('#modalHeader').html('Edit Caller Information');
			$("#add_save_btn").prop("disabled", false);

			$.get("{{ url('/callerinfoById') }}/"+row_id, function(data) {
				var data = $.parseJSON(data);
				$('#addModal').modal('show');

				$('#call_before').val(data[0].call_before);
				$('#phone_num').val(data[0].phone);
				$('#caller_email').val(data[0].email);
				$('#caller_name').val(data[0].name);
				$('#age').val(data[0].age);
				$('#district_id').val(data[0].district_id);
				thanalist(data[0].district_id);
				setTimeout(function() {
					$('#thana_id').val(data[0].thana_id).change();
				},500);

				$('#gender').val(data[0].gender);
				$('#marital_status').val(data[0].marital_status);
				$('#source_of_knowing').val(data[0].source_of_knowing);

			});
		});

		$("#addForm").on('submit', function(event) {
			event.preventDefault();
			var form_data = document.getElementById("addForm");
			var fd = new FormData(form_data);
			$("#add_save_btn").prop("disabled", true);
			$.ajax({
				url: "{{ url('/updateCallerInfo') }}",
				data: fd,
				cache: false,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function(data) {
					if (data.result == "success") {
						$('#addModal').modal('hide');
						showNotification(data.result, data.message);
						tableReload();
					} else {
						showNotification(data.result, data.message);
						$("#add_save_btn").prop("disabled", false);
					}
				} 
			}); 

		});

		//code end now 


		// Update Caller service Information 
		// code start below
		var refData ;

		$.get('{{ url("/referrallist") }}', function(data) {
			refData = jQuery.parseJSON(data);
			var refHtml = '<option value="">Select Center Name</option>';
			$.each(refData, function(index, val) {
				refHtml+='<option value="'+val.id+'">'+val.name+'</option>';
			});
			$('#referral_id').html(refHtml);

		});


		$('body').on('click', '.serviceEditData', function(event) {
			var row_id = $(this).data('id');
			$('#ser_edit_id').val(row_id);
			$('#servicemodalHeader').html('Edit Caller Information');
			$("#serviceAdd_save_btn").prop("disabled", false);
			
			$.get("{{ url('/callerserviceById') }}/"+row_id, function(data) {
				var data = $.parseJSON(data);
				$('#serviceUpdateModal').modal('show');

				$('#medication').val(data[0].medication);
				$('#therapeutic').val(data[0].therapeutic);
				$('#problem_description').val(data[0].problem_description);
				$('#symptom').val(data[0].symptom);
				$('#action_taken').val(data[0].action_taken);
				$('#risk_assessment').val(data[0].risk_assessment);
				$('#issue_of_counseling').val(data[0].issue_of_counseling);
				$('#services_of_refferral').val(data[0].services_of_refferral);
				$('#reason_of_refferral').val(data[0].reason_of_refferral);
				$('#call_duration').val(data[0].call_duration);
				$('#caller_feeling').val(data[0].caller_feeling);
				$('#call_type').val(data[0].call_type);

				setTimeout(function() {
					$('#referral_id').val(data[0].referral_id).change();
				},500);
			});
		});

		$("#serviceUpdateForm").on('submit', function(event) {
			event.preventDefault();
			var form_data = document.getElementById("serviceUpdateForm");
			var fd = new FormData(form_data);
			$("#serviceAdd_save_btn").prop("disabled", true);
			$.ajax({
				url: "{{ url('/updateCallerService') }}",
				data: fd,
				cache: false,
				processData: false,
				contentType: false,
				type: 'POST',
				success: function(data) {
					if (data.result == "success") {
						$('#serviceUpdateModal').modal('hide');
						showNotification(data.result, data.message);
						tableReload();
					} else {
						showNotification(data.result, data.message);
						$("#serviceAdd_save_btn").prop("disabled", false);
					}
				} 
			}); 

		});
		// code end now



	});
</script>
@endpush