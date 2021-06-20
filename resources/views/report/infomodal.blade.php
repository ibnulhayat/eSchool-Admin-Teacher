
@section('infomodal')
<!-- /edit caller info modal -->
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

									<div class="col-12">
										<div class="form-group row">
											<label class="col-sm-5 control-label">Phone Number : <span
												class="text-danger">*</span></label>
												<div class="col-sm-7">
													<div class="controls">
														<input required type="number" min="0" maxlength="15" name="phone_num" class="form-control" id="phone_num"
														placeholder="Phone Number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														onKeyUp="if(this.value<0){this.value='0';}">
													</div>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<label class="col-sm-5 control-label">Email (Optional) :</label>
												<div class="col-sm-7">
													<div class="controls">
														<input type="text"  name="caller_email" class="form-control" id="caller_email"
														placeholder="Email Address" >
													</div>
												</div>
											</div>
										</div> 
										<div class="col-12">
											<div class="form-group row">
												<label class="col-sm-5 control-label">Name:<span
													class="text-danger">*</span></label>
													<div class="col-sm-7">
														<div class="controls">
															<input type="text" maxlength="60" name="caller_name" class="form-control" id="caller_name"
															placeholder="Caller Name" required>
														</div>
													</div>
												</div>
											</div>


											<div class="col-12">
												<div class="form-group row">
													<label  class="col-sm-5 control-label">Age:<span
														class="text-danger">*</span></label>
														<div class="col-sm-7">
															<div class="controls">
																<input required type="number" min="0" maxlength="3" name="age" class="form-control" id="age" placeholder="Age"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
																onKeyUp="if(this.value<0){this.value='0';}">
															</div>
														</div>
													</div>
												</div>



												<div class="col-12">
													<div class="form-group row">
														<label  class="col-sm-5 control-label">District:<span
															class="text-danger">*</span></label>
															<div class="col-sm-7">
																<div class="controls">
																	<select class="form-control" name="district_id" id="district_id" required></select> 
																</div>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<label  class="col-sm-5 control-label">Upazilla/Thana :<span
																class="text-danger">*</span></label>
																<div class="col-sm-7">
																	<div class="controls">
																		<select required class="form-control" name="thana_id" id="thana_id">

																		</select> 
																	</div>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<label  class="col-sm-5 control-label">Gender :<span
																	class="text-danger">*</span></label>
																	<div class="col-sm-7">
																		<div class="controls">
																			<select class="form-control" name="gender" id="gender"  required>
																				<option value="">Select</option>
																				<option value="Male">Male</option>
																				<option value="Female">Female</option>
																				<option value="Other">Other</option>
																			</select> 
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-12">
																<div class="form-group row">
																	<label class="col-sm-5 control-label"> Marital status :<span
																		class="text-danger">*</span></label>
																		<div class="col-sm-7">
																			<div class="controls">
																				<select class="form-control" name="marital_status" id="marital_status" required>
																					<option value="">Select</option>
																					<option value="Unmarried">Unmarried</option>
																					<option value="Married">Married</option>
																					<option value="Not asked">Not Asked</option>
																					<option value="Refused to answer">Refused to answer</option>
																				</select> 
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group row">
																		<label class="col-sm-5 control-label">Have you called on this helpline before :<span
																			class="text-danger">*</span></label>
																			<div class="col-sm-7">
																				<div class="controls">
																					<select class="form-control" name="call_before" id="call_before" required>
																						<option value="No">No</option>
																						<option value="Yes">Yes</option>
																						<option value="Not Asked">Not Asked</option>
																						<option value="Refused to answer">Refused to answer</option>

																					</select> 
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-12">
																		<div class="form-group row">
																			<label for="phone" class="col-sm-5 control-label"> How did you hear about this helpline  :<span
																				class="text-danger">*</span></label>
																				<div class="col-sm-7">
																					<div class="controls">
																						<select class="form-control" name="source_of_knowing" id="source_of_knowing" required>
																							<option value="">Select</option>
																							<option value="Radio Program">Radio Program</option>
																							<option value="School">School</option>
																							<option value="Madrasa">Madrasa</option>
																							<option value="Club member">Club member</option>
																							<option value="Gender promoter">Gender promoter</option>
																							<option value="Newspaper">Newspaper</option>
																							<option value="GB project event">GB project event</option>
																							<option value="Friend">Friend</option>
																							<option value="Project staff">Project staff</option>
																							<option value="Parents">Parents</option>
																							<option value="Website">Website</option>
																							<option value="Not asked">Not Asked</option>
																							<option value="Refused to answer">Refused to answer</option>
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
									<!-- /end edit modal -->
									@endsection
									