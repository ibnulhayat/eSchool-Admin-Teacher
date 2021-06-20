
@section('servicemodal')
<!-- /edit service data modal -->
<div id="serviceUpdateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-white" id="servicemodalHeader"></h4>
				<button type="button" class="close white" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="col-12">
					<div class="card">
						<form id="serviceUpdateForm">
							<input type="hidden" name="ser_edit_id" id="ser_edit_id"/>
							<div class="form-body">
								{{ csrf_field() }}
								<div class="row p-t-20">

									<div class="col-12">
										<div class="form-group row">
											<label  class="col-sm-5 control-label">Are you on any medication? :<span
												class="text-danger">*</span></label>
												<div class="col-sm-7">
													<div class="controls">
														<select class="form-control" name="medication" id="medication">
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
												<label for="phone" class="col-sm-5 control-label">Any therapeutic service taken before?:<span
													class="text-danger">*</span>
												</label>
												<div class="col-sm-7">
													<div class="controls">
														<select class="form-control" name="therapeutic" id="therapeutic">
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
												<label for="phone" class="col-sm-5 control-label">Description of the problem:<span
													class="text-danger">*</span>
												</label>
												<div class="col-sm-7">
													<div class="controls">
														<textarea type="text" name="problem_description" rows="5"  class="form-control" id="problem_description" placeholder="Problem Description, word limit 200" required></textarea>
														<p id="p_d_wordCount" class="text-right word_count_p" ></p>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12">
											<div class="form-group row">
												<label for="phone" class="col-sm-5 control-label">Symptom:<span
													class="text-danger">*</span></label>
													<div class="col-sm-7">
														<div class="controls">
															<textarea type="text"name="symptom" rows="5" class="form-control" id="symptom"
															placeholder="Symptom" required></textarea>
															<p id="sym_wordCount" class="text-right word_count_p" ></p>
														</div>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<label for="phone" class="col-sm-5 control-label">Action Taken:<span
														class="text-danger">*</span></label>
														<div class="col-sm-7">
															<div class="controls">
																<textarea type="text"  name="action_taken" rows="5" class="form-control" id="action_taken"
																placeholder="Action Taken" required></textarea>
																<p id="at_wordCount" class="text-right word_count_p" ></p>
															</div>
														</div>
													</div>
												</div>


												<div class="col-12">
													<div class="form-group row">
														<label for="phone" class="col-sm-5 control-label">Risk Assessment:<span
															class="text-danger">*</span></label>
															<div class="col-sm-7">
																<div class="controls">
																	<select class="form-control" name="risk_assessment" id="risk_assessment" required>
																		<option value="">Select</option>
																		<option value="Yes">Yes</option>
																		<option value="No">No</option>
																	</select> 
																</div>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<label for="phone" class="col-sm-5 control-label"> Issue of counseling :<span
																class="text-danger">*</span></label>
																<div class="col-sm-7">
																	<div class="controls">
																		<select class="form-control" name="issue_of_counseling" id="issue_of_counseling" required>
																			<option value="">Select</option>
																			<option value="SRH">SRH</option>
																			<option value="GBV">GBV</option>
																			<option value="MH">MH</option>
																			<option value="GPH">GPH</option>
																			<option value="FP">FP</option>
																			<option value="Other">Other</option> 
																		</select> 
																	</div>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<label for="phone" class="col-sm-5 control-label">What services have been refferred to :<span
																	class="text-danger">*</span></label>
																	<div class="col-sm-7">
																		<div class="controls">
																			<select class="form-control" name="services_of_refferral" id="services_of_refferral" required>
																				<option value="">Select</option>
																				<option value="SRH">SRH</option>
																				<option value="GBV">GBV</option>
																				<option value="MH">MH</option>
																				<option value="GPH">GPH</option>
																				<option value="FP">FP</option>
																				<option value="Other">Other</option>
																			</select> 
																		</div>
																	</div>
																</div>
															</div>


															<div class="col-12">
																<div class="form-group row">
																	<label for="phone" class="col-sm-5 control-label">Reason of refferral:<span
																		class="text-danger">*</span></label>
																		<div class="col-sm-7">
																			<div class="controls">
																				<textarea type="text"  name="reason_of_refferral" rows="5" class="form-control" id="reason_of_refferral"
																				placeholder="Reason of refferral" required></textarea>
																				<p id="rr_wordCount" class="text-right word_count_p" ></p>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="col-12">
																	<div class="form-group row">
																		<label for="phone" class="col-sm-5 control-label"> Service center name:<span
																			class="text-danger">*</span></label>
																			<div class="col-sm-7">
																				<div class="controls">
																					<select class="form-control" name="referral_id" id="referral_id" required>

																					</select> 
																				</div>
																			</div>
																		</div>
																	</div>


																	<div class="col-12">
																		<div class="form-group row">
																			<label for="phone" class="col-sm-5 control-label"> Call Duration  :<span
																				class="text-danger">*</span></label>
																				<div class="col-sm-7">
																					<div class="controls">
																						<select class="form-control" name="call_duration" id="call_duration" required>
																							<option value="">Select</option>
																							<option value="0-5 minutes">0-5 minutes</option>
																							<option value="6-10 minutes">6-10 minutes</option>
																							<option value="11-15 minutes">11-15 minutes</option>
																							<option value="16-20 minutes">16-20 minutes</option>
																							<option value="21-25 minutes">21-25 minutes</option>
																							<option value="26-30 minutes">26-30 minutes</option>
																							<option value="Above 30 minutes">Above 30 minutes</option>
																						</select> 
																					</div>
																				</div>
																			</div>
																		</div>



																		<div class="col-12">
																			<div class="form-group row">
																				<label for="phone" class="col-sm-5 control-label"> Caller's feelings about counseling services:<span class="text-danger">*</span></label>
																				<div class="col-sm-7">
																					<div class="controls">
																						<select class="form-control" name="caller_feeling" id="caller_feeling" required>
																							<option value="">Select</option>
																							<option value="Satisfactory">Satisfactory</option>
																							<option value="Moderately satisfactory">Moderately satisfactory</option>
																							<option value="Not satisfactory">Not satisfactory</option>
																							<option value="Confusing">Confusing</option>
																							<option value="Not asked">Not Asked</option>
																						</select> 
																					</div>
																				</div>
																			</div>
																		</div>

																		

																		<div class="col-12">
																			<div class="form-group row">
																				<label for="phone" class="col-sm-5 control-label"> Call types  :<span
																					class="text-danger">*</span></label>
																					<div class="col-sm-7">
																						<div class="controls">
																							<select class="form-control" name="call_type" id="call_type" required>
																								<option value="">Select</option>
																								<option value="information-call">Information call</option>
																								<option value="complete/dealing">Complete/Running Call</option>
																								<option value="incomplete">Incomplete</option>
																								<option value="hang_up">Hang up call</option>
																								<option value="prank">Prank call</option>
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

																			<button id="serviceAdd_save_btn" type="submit" class="btn waves-effect waves-light btn-info" ><i class="fa fa-check"></i> Save</button>
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

										@push('scripts')
										<script type="text/javascript">
											$(document).ready(function()
											{

												var pdclimit;
												$('#problem_description').on('keyup', function() {
													var character = $(this).val();
													var count = $('#problem_description').val().trim().split(' ');
													if (count.length > 200) {
														$(this).val(character.substring(0, pdclimit));
													}else if(count.length < 200){
														pdclimit = character.length;
													}
													$('#p_d_wordCount').text("200/"+count.length);
												});             

												var sclimit;
												$('#symptom').on('keyup', function() {
													var character = $(this).val();
													var count = $('#symptom').val().trim().split(' ');

													if (count.length > 200) {
														$(this).val(character.substring(0, sclimit));
													}else if(count.length < 200){
														sclimit = character.length;
													}
													$('#sym_wordCount').text("200/"+count.length);
												});

												var atclimit;
												$('#action_taken').on('keyup', function() {
													var character = $(this).val();
													var count = $('#action_taken').val().trim().split(' ');

													if (count.length > 200) {
														$(this).val(character.substring(0, atclimit));
													}else if(count.length < 200){
														atclimit = character.length;
													}
													$('#at_wordCount').text("200/"+count.length);
												});

												var rrclimit;
												$('#reason_of_refferral').on('keyup', function() {
													var character = $(this).val();
													var count = $('#reason_of_refferral').val().trim().split(' ');

													if (count.length > 200) {
														$(this).val(character.substring(0, rrclimit));
													}else if(count.length < 200){
														rrclimit = character.length;
													}
													$('#rr_wordCount').text("200/"+count.length);
												});


											});
										</script>
										@endpush