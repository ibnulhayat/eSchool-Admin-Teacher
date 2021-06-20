@extends('includes.header')
@section('pageTitle', 'My profile')
@push('styles')
<style>
.button-text{
	font-size: 18px;
	font-style: normal;
	font-weight: bold;

}
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

.picture-upload:hover .upload-icon-wrap {
	opacity: 1;
	transform: scale(1);
}

.picture-upload:hover .upload-icon {
	opacity: 1;
	transform: scale(1);

}

#userEditForm input[readonly],
#userEditForm select:not(#patient_type)[readonly],
#userEditForm textarea[readonly] {
	opacity: 1;
	background-color: transparent;
}
</style>
@endpush

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-megna">
				<div class="d-flex">
					<div>
						<h3 class="m-b-0 text-white">My profile</h3>
					</div>
					<div class="ml-auto">
						<button
						class="pull-right btn button-text waves-effect waves-light btn-outline-light editProfileBtn">Edit</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<form id="userEditForm">
					<div class="form-body">
						{{ csrf_field() }}
						<center class="m-t-10">
							<div class="picture-upload">
								<img id="profile-pic" src="" width="150" />
								<span class="upload-icon-wrap"> <i class="upload-icon fas fa-camera"></i></span>
							</div>
							<!-- <h4 class="card-title m-t-10">Hanna Gover</h4> -->
							<input id="hidden_upload" accept=".gif,.png,.jpeg,.jpg" type="file" name="user-picture"
							size="chars">
						</center>
						<div class="row p-t-20" style="padding-left: 100px; padding-right: 100px;">
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
																	<select class="form-control" name="nationality" id="us_nationality"required>
																		<option value="">Select One</option>
																		<option value="Bangladeshi">Bangladeshi</option>
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
																			<option value="Admin">Admin</option>
																			<option value="Teacher">Teacher</option>
																			<option value="Student">Student</option>
																		</select> 

																	</div>
																</div>
															</div>
														</div>



													</div>

													<hr>
													<div class="form-actions text-right">
														<button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-outline-info"><i class="fa fa-check"></i> Update</button>
													</div>
												</div>
											</form>
										</div>
									</div>

									<div class="card">
										<div class="card-header bg-megna">
											<div class="d-flex">
												<div>
													<h3 class="m-b-0 text-white">Password change</h3>
												</div>
											</div>
										</div>
										<div class="card-body">
											<form id="userPasswordChange">
												<div class="form-body">
													{{ csrf_field() }}

													<div class="row p-t-20"style="padding-left: 100px; padding-right: 100px;">
														<!--/span-->
														<div class="col-12">
															<div class="form-group row">
																<label for="old_password" class="col-sm-3 control-label">Old password:<span
																	class="text-danger">*</span> </label>
																	<div class="col-sm-9">
																		<div class="input-group">
																			<input type="password" maxlength="60" class="form-control"
																			name="old_password" id="old_password" placeholder="Old password">
																		</div>
																	</div>
																</div>
															</div>
															<!--/span-->
															<div class="col-12">
																<div class="form-group row">
																	<label for="password" class="col-sm-3 control-label">Password:<span
																		class="text-danger">*</span> </label>
																		<div class="col-sm-9">
																			<div class="input-group">
																				<input type="password" maxlength="60" class="form-control" name="password"
																				id="password" placeholder="New Password">
																			</div>
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="col-12">
																	<div class="form-group row">
																		<label for="re_password" class="col-sm-3 control-label">Re-enter password:<span
																			class="text-danger">*</span> </label>
																			<div class="col-sm-9">
																				<div class="input-group">
																					<input type="password" maxlength="60" class="form-control"
																					name="re_password" id="re_password" placeholder="Re-enter password">
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--/span-->
																</div>

																<hr>
																<div class="form-actions text-right">
																	<button id="add_save_btn_pass" type="submit" class="btn waves-effect waves-light btn-outline-info">
																		<i class="fa fa-check"></i> Update</button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>

											@endsection


											@push('scripts')

											<script type="text/javascript">
												$(document).ready(function() {

													$.get("{{ url('/myProfileData') }}", function(data) {
														if (data[0].imageUrl !== null) {
															$("#profile-pic").attr("src", "uploads/userimages/" + data[0].imageUrl);
														} else if(data[0].imageUrl == null) {
															$("#profile-pic").attr("src", "assets/images/man.png");
														}

														$('#user_name').val(data[0].name);
														$('#phone_number').val(data[0].phone);
														$('#user_email').val(data[0].email);
														$('#gender').val(data[0].gender);
														$('#marital_status').val(data[0].marital_status);
														$('#blood_group').val(data[0].blood_group);
														$('#religion').val(data[0].religion);
														$('#birth_date').val(data[0].birth_date);
														$('#us_nationality').val(data[0].nationality);
														$('#user_role').val(data[0].role);
													});

													$("#userEditForm").on('submit', function(event) {
														event.preventDefault();
														$("#add_save_btn").prop("disabled", true);

														var form_data = document.getElementById("userEditForm");
														var fd = new FormData(form_data);
														$.ajax({
															url: "{{ url('/myProfileEdit') }}",
															data: fd,
															cache: false,
															processData: false,
															contentType: false,
															type: 'POST',
															success: function(data) {
																console.log(data);
																if (data.result == "success") {


																	showNotification('error',data.message);
																	$('#docList').DataTable();
																} else if (data.result == "fail") {
																	showNotification('error',data.message);
																} else if (data.result == "error") {
																	$.each(data.message, function(index, val) {
																		showNotification('error',data.message[index]);
																	});

																}
																$("#add_save_btn").prop("disabled", false);
															}
														});

													});

													$("#userPasswordChange").on('submit', function(event) {
														event.preventDefault();
														$("#add_save_btn_pass").prop("disabled", true);

														var form_data = document.getElementById("userPasswordChange");
														var fd = new FormData(form_data);
														$.ajax({
															url: "{{ url('/changePass') }}",
															data: fd,
															cache: false,
															processData: false,
															contentType: false,
															type: 'POST',
															success: function(data) {
																console.log(data);
																if (data.result == "success") {
																	$('#userPasswordChange')[0].reset();
																	showNotification(data.result,data.message);
																	$('#docList').DataTable();
																} else if (data.result == "error") {
																	showNotification(data.result,data.message[0]);

																}
																$("#add_save_btn_pass").prop("disabled", false);
															}
														});

													});


													$('.upload-icon-wrap').click(function() {
														$('#hidden_upload').click();
													});

													$('#userEditForm .form-group input, #userEditForm .form-group textarea').attr('readonly', 'readonly');

													$('#userEditForm .form-actions, .upload-icon-wrap').hide();
													$('.editProfileBtn').click(function() {
														$('#userEditForm .form-group input, #userEditForm .form-group textarea').removeAttr('readonly',
															'readonly');
														$('#userEditForm .form-actions, .upload-icon-wrap').show();
													})


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
															showNotification('error','file type not supported');
														}
													}


													$("#hidden_upload").change(function() {
														readURL(this);
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