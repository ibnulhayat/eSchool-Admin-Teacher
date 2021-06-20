@push('styles')
<style>
#hidden_upload {
	height: 0;
	overflow: hidden;
	width: 0;
}
.picture-upload {
	position: relative;
	cursor: pointer;
	width: 150px;
	height: 150px;
	border-radius: 50%;
	display: inline-block;
	overflow: hidden;
}
.upload-icon {
	opacity: 0;
	position: absolute;
	top: calc(50% - 10px);
	left: calc(50% - 10px);
	color: #fff;
	transform: scale(0);
	transition: transform .3s ease-in-out;
}
.upload-icon-wrap {
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, .5);
	display: inline-block;
	position: absolute;
	left: 0;
	top: 0;
	opacity: 0;
	transition: transform .3s ease-in-out;
	transform: scale(0);
}
.picture-upload:hover .upload-icon {
	opacity: 1;
	transform: scale(1);

}
.picture-upload:hover .upload-icon-wrap {
	opacity: 1;
	transform: scale(1);
}

#div_step_one{
	display: none;

}
#div_admitted_class{
	display: none;
}

</style>
@endpush
@section('step_one')

<div class="card" id="div_step_one">
	<div class="card-header bg-card-header border-left-right-teal">
		<h3 class="m-b-0 text-dark font-weight-bold">Parsonal Information</h3>
	</div>
	<div class="card-body">
		<form id="general-info-Form">
			<input type="hidden" name="general_info_id" id="general_info_id"/>
			<div class="form-body">
				{{ csrf_field() }}
				<center class="m-t-30">
					<div class="picture-upload">
						<img id="profile-pic" src="{{asset('assets/images/man.png')}}" width="150" />
						<span class="upload-icon-wrap"> <i class="upload-icon fas fa-camera"></i></span>
					</div>

					<input id="hidden_upload" accept=".gif,.png,.jpeg,.jpg" type="file" name="user-picture"
					size="chars">
				</center>

				<div class="row p-t-20 ">
					<div class="col-md-6">
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Name:<span
								class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<input 
										type="text" maxlength="60" name="user_name" class="form-control" id="user_name"
										placeholder="Full Name" required>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label  class="col-sm-4 control-label">Email:<span
									class="text-danger">*</span></label>
									<div class="col-sm-8">
										<div class="controls">
											<input type="text" maxlength="60" name="user_email" class="form-control" id="user_email"
											placeholder="Email Address" required>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="form-group row">
									<label for="name" class="col-sm-4 control-label">Phone:<span class="text-danger">*</span></label>
									<div class="col-sm-8">
										<div class="controls">
											<input type="text"  maxlength="11" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" required>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="form-group row">
									<label for="name" class="col-sm-4 control-label">Gender:<span class="text-danger">*</span></label>
									<div class="col-sm-8">
										<div class="controls">
											<select  name="gender" class="form-control" id="gender" required>
												<option value="">Select One</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Other">Other</option>
											</select>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="form-group row">
									<label  class="col-sm-4 control-label">Marital Status:<span
										class="text-danger">*</span></label>
										<div class="col-sm-8">
											<div class="controls">
												<select  name="marital_status" class="form-control" id="marital_status" required>
													<option value="">Select One</option>
													<option value="Unmarried">Unmarried</option>
													<option value="Married">Married</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<!-- middle point -->

								<div class="col-md-6">
									<div class="form-group row">
										<label  class="col-sm-4 control-label">Blood Group:<span
											class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<select  name="blood_group" class="form-control" id="blood_group" required>
														<option value="">Select One</option>
														<option value="A+">A+</option>
														<option value="A-">A-</option>
														<option value="AB+">AB+</option>
														<option value="AB-">AB-</option>
														<option value="B+">B+</option>
														<option value="B-">B-</option>
														<option value="O+">O+</option>
														<option value="O-">O-</option>
													</select>
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="form-group row">
											<label  class="col-sm-4 control-label">Religion:<span
												class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<select  name="religion" class="form-control" id="religion" required>
															<option value="">Select One</option>
															<option value="Islam">Islam</option>
															<option value="Hinduism">Hinduism</option>
															<option value="Buddhism">Buddhism</option>
															<option value="Christianity">Christianity</option>
															<option value="Other">Other</option>
														</select>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Birth of Date:<span class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<input 
														type="date"  name="birth_date" class="form-control" id="birth_date" required>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Nationality:<span
													class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<select class="form-control" name="nationality" id="nationality"required>
																<option value="">Select One</option>
																<option value="Bangladesshi">Bangladeshi</option>
																<option value="Other">Other</option>
															</select>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="form-group row">
													<label  class="col-sm-4 control-label">User Type:<span
														class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<select class="form-control" name="user_role" id="user_role"required>
																	<option value="">Select One</option>
																	<option value="Teacher">Teacher</option>
																	<option value="Student">Student</option>
																</select> 

															</div>
														</div>
													</div>
													<!--/span-->
													<div  id="div_admitted_class">
														<div class="form-group row ">
															<label  class="col-sm-4 control-label">Admitted Class:<span class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<select class="form-control" name="admitted_class" id="admitted_class"required disabled="disabled">
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<hr>
											<div class="form-actions text-right p-b-20 p-r-30">

												<button id="next-step-one" type="submit" class="btn waves-effect waves-light btn-outline-info" > Next <i class=" ti-arrow-right"></i></button>
											</div>

										</div>
									</form>
								</div>
							</div>

							@endsection
							@push('scripts')
							<script type="text/javascript">
								$(document).ready(function()
								{
									classList();

									$('.upload-icon-wrap').click(function() {
										$('#hidden_upload').click();
									});

									$("#hidden_upload").change(function() {
										readURL(this);
									});

									// image on change based on base64
									function readURL(input) {
										var url = input.value;
										var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

										if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
											var reader = new FileReader();

											reader.onload = function(e) {
												$('#profile-pic').attr('src', e.target.result);
											}

											reader.readAsDataURL(input.files[0]);
										} else {
											$('#profile-pic').attr('src', 'assets/images/man.png');
											showNotification('error','file type not supported')
										}
									}

									$('#user_email').on('keyup', function() {
										$('#user_email').filter(function() {
											var email = $('#user_email').val();
											var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
											if (!emailReg.test(email)) {
												$('.help-block').show();
												$("#next-step-one").prop("disabled", true);
											} else {
												$('.help-block').hide();
												$("#next-step-one").prop("disabled", false);
											}
										})
									}); 


									$(function() {
										$( "#birth_date" ).datepicker({
											dateFormat: 'dd-mm-yy',
											defaultDate:"24-09-2019"
										});
									});

									
									
									// $('#admitted_class').change(function(event) {
									// 	var select_class = $('#user_role :selected').attr('value');
									// });

									function classList() {
										
										$.get('{{ url("/getclasslist") }}', function(data) {
											var disData = jQuery.parseJSON(data);
											var ddHtml = '<option value="">Select One</option>';
											$.each(disData, function(index, val) {
												ddHtml+='<option value="'+val.id+'">'+val.name+" - "+val.number+'</option>';
											});
											$('#admitted_class').html(ddHtml);
										});

									}


									$("#general-info-Form").on('submit', function(event) {
										event.preventDefault();

										var form_data = document.getElementById("general-info-Form");
										var fd = new FormData(form_data);

										$.ajax({
											url: "{{url('/general-info')}}",
											type: 'POST', 
											data: fd,
											processData:false,
											contentType:false,
											success: function (data) {
												if(data.result == "success"){
													$("#div_step_one").hide();
													$("#div_step_two").show();
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