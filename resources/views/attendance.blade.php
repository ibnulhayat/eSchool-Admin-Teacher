@extends('includes.header')
@section('pageTitle', 'Attendances')
@push('styles')
<style>


</style>
@endpush
@section('content')
<div class="row">

	<div class="col-12">
		<div class="card">
			<div class="card-header bg-megna">
				<div class="d-flex">
					<div>
						<h3 class="m-b-0 text-white">Attendance Class wise</h3>
					</div>
				</div>
			</div>
			<div class="card-body">
				<!-- Select user -->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Select Class:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<select id="className" name="className"
									class="form-control custom-select"></select>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 control-label">Search Student:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<input type="text" id="searchByStdentID" class="form-control" placeholder="Search page">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-check-inline">
					<input  type="radio" name="inlineRadioOptions" id="radioPresent" value="Present"><label class="form-check-label" for="radioPresent">Present</label>

					<input  type="radio" name="inlineRadioOptions" id="radioAbsent" value="Absent">
					<label class="form-check-label" for="radioAbsent">Absent</label>

					<input  type="radio" name="inlineRadioOptions" id="radioLeave" value="Leave">
					<label class="form-check-label" for="radioLeave">Leave</label>
				</div>
				<div class="form-check-inline">
					<input  type="radio" name="inlineRadioOptions" id="radioPresent" value="Present"><label class="form-check-label" for="radioPresent">Present</label>

					<input  type="radio" name="inlineRadioOptions" id="radioAbsent" value="Absent">
					<label class="form-check-label" for="radioAbsent">Absent</label>

					<input  type="radio" name="inlineRadioOptions" id="radioLeave" value="Leave">
					<label class="form-check-label" for="radioLeave">Leave</label>
				</div>



				<div class="col-md-12">
					<form >
						<div class="form-body">
							{{ csrf_field() }}
							<div class="row p-t-20">
								<div class="table-responsive">
									<table id="studentList" class="p-l-0 p-r-0 table table-bordered table-striped">
										<thead>
											<tr>
												<th>Student Name</th>
												<th>Student ID</th>
												<th>Attendance</th>
											</tr>
										</thead>
										<tbody> </tbody>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {


		// $.get("{{ url('/userList') }}", function(data) {
		// 	var select_html = '';
		// 	$.each(data, function(index, val) {
		// 		select_html += '<option value = ' + val.id + '>' + val.name +" - "+ val.usertype+
		// 		'</option>';
		// 		if (index == 0) {
		// 			pageListByUserId(val.id);
		// 		}
		// 	});
		// 	$('#pageWiseUserName').html(select_html);
		// });

		$.get('{{ url("/getclasslist") }}', function(data) {
			var disData = jQuery.parseJSON(data);
			var ddHtml = '<option value="">Select One</option>';
			$.each(disData, function(index, val) {
				ddHtml+='<option value="'+val.id+'">'+val.name+" - "+val.number+'</option>';
			});
			$('#className').html(ddHtml);
		});

		$('#className').on('change', function() {
			studentListByClassId(this.value);
		});

		function studentListByClassId(class_id) {
			$("#studentList tbody tr").remove();
			$("#studentList").hide();
			$("#studentList").show();
			$.get("{{ url('/studentlistByClassId') }}/" + class_id, function(data) {
                //console.log(data);
                var finalData = JSON.parse(data);
                $.each(finalData, function(i, value) {
                	// if (value.allow_deny == 'allow') {
                	// 	var checked = 'btn-success';
                	// 	fonticon = 'fa-check';
                	// } else {
                	// 	var checked = 'btn-danger';
                	// 	fonticon = 'fa-times';
                	// }
                	$('#studentList').append('<tr><td>' + value.name+'</td>'+
                		'<td>'+value.student_id+'</td>'+
                		'<td><div class="form-check-inline ">'+
                		'<input class="le-check" type="radio" name="inlineRadioOptions'+value.id+'" id="radioPresent" value="Present">'+
                		'<label class="form-check-label" for="radioPresent">Present</label><input id="user_id" type="hidden" value="'+value.id+'"/></div>'+
                		'<div class="form-check-inline">'+
                		'<input class="le-check" type="radio" name="inlineRadioOptions'+value.id+'" id="radioAbsent" value="Absent">'+
                		'<label class="form-check-label" for="radioAbsent">Absent</label></div>'+   
                		'<div class="form-check-inline">'+
                		'<input class="le-check" type="radio" name="inlineRadioOptions'+value.id+'" id="radioLeave" value="Leave">'+
                		'<label class="form-check-label" for="radioLeave">Leave</label></div></td>'
                		// +'<td style="display:block;">'+'<input id="user_id" type="text" value="'+value.id+'"/>'+'</td>'
                		+'</tr>'
                		);
                });
            });
		}

		// $('#jscCheckbox').click(function() {
		// 	if (!$(this).is(':checked')) {
		// 		$( "#jscSchoolName" ).prop( "disabled", true );
		// 		$( "#jscExamName" ).prop( "disabled", true );
		// 		$( "#jscBoard" ).prop( "disabled", true );
		// 		$( "#jscResult" ).prop( "disabled", true );
		// 		$( "#jscPassingYear" ).prop( "disabled", true );
		// 	}else{


		// 	}
		// });

		$('body').on('click', '.le-check', function() {
			var status = '';
			var class_id= $('#className').val();
			var user_id = $(this).next().val();
			//var user_id =  $(this).attr('user_id');;

			status = $('input[name="inlineRadioOptions"]:checked').val();

			alert(status+" - "+class_id+" - "+user_id);

			// console.log("TCL: status", user_id+" "+class_id);

			$.post("{{ url('/makeAttendance') }}", {
				"_token": "{{ csrf_token() }}",
				'user_id': user_id,
				'class_id': class_id,
				'attendace': status
			},
			function(data, textStatus, xhr) {
				if (data.result == "success") {
					showNotification(data.result, data.message);
					studentlistByClassId(id_user);

				} else {
					showNotification(data.result, data.message);
				}
			});
		});


		$(document).ready(function() {
			$("#customTableSearch").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#userAccessList tbody tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
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