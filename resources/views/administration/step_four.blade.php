
@push('styles')
<style>

#div_step_four{
	display: none;
}
.student{
	display: none;
}
.teacher{
	display: none;
}

</style>
@endpush

@section('step_four')
<div class="card" id="div_step_four">
	<div class="card-header bg-card-header border-left-right-teal">
		<h3 class="m-b-0 text-dark font-weight-bold">Educational Inforation</h3>
	</div>
	
	<!-- start student form -->
	<div class="card-body student" >
		<form id="education-info-student-Form">
			<!-- <input type="hidden" name="address_id" id="address_id"/> -->
			<div class="form-body">
				{{ csrf_field() }}

				<!-- start PSC form -->
				<div class="col-12 p-t-20" id="psc_div">
					<h4 class="m-b-10 text-dark font-weight-bold">Primary School Certificate (PSC)</h4>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row ">
								<label  class="col-sm-4 control-label">School Name:<span class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="text" maxlength="200" name="pscSchoolName" class="form-control" id="pscSchoolName" placeholder="Schoole Name" required>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="text" maxlength="200" name="pscExamName" class="form-control" id="pscExamName" placeholder="Examinitaion Name" required>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label  class="col-sm-4 control-label">Division:<span class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<select class="form-control" name="pscDivision" id="pscDivision" required>
											<option  value="">Select One</option>
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
							<div class="form-group row">
								<label  class="col-sm-4 control-label">District:<span
									class="text-danger">*</span></label>
									<div class="col-sm-8">
										<div class="controls">
											<select class="form-control" style="width: 100%;" name="pscDistrict_id" id="pscDistrict_id" required>

											</select> 
										</div>
									</div>
								</div>
							</div>
							<!-- middle point of PSC  -->

							<div class="col-md-6">
								<div class="form-group row">
									<label  class="col-sm-4 control-label">Upazilla/Thana:<span
										class="text-danger">*</span></label>
										<div class="col-sm-8">
											<div class="controls">
												<select class="form-control" style="width: 100%;" name="pscThana_id" id="pscThana_id" required>

												</select> 
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="form-group row">
										<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
										<div class="col-sm-8">
											<div class="controls">
												<input type="text" maxlength="4" name="pscResult" class="form-control" id="pscResult" placeholder="Ex: 5.00" required>
											</div>
										</div>
									</div>				
									<!--/span-->
									<div class="form-group row">
										<label  class="col-sm-4 control-label">Passing Year:<span
											class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<input type="text" class="form-control" maxlength="4" name="pscPassingYear" id="pscPassingYear"placeholder="Ex: 2000" required >
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<!-- end PSC form -->
							<hr id="jsc_div">
							<!-- start JSC form -->
							<div class="col-12 p-t-0"  id="jsc_div">
								<div class="d-flex">
									<h4 class="m-b-10 text-dark font-weight-bold">Junior School Certificate (JSC/JDC)</h4> 
									<div class="m-l-10 form-check ">
										<input class="form-check-input" type="checkbox" id="jscCheckbox" value="option1">
										<label class="form-check-label" for="jscCheckbox">if applicable</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group row ">
											<label  class="col-sm-4 control-label">School Name:<span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<input type="text" maxlength="200" name="jscSchoolName" class="form-control" id="jscSchoolName" placeholder="School Name" required disabled="disabled">

												</div>
											</div>
										</div>
										<!--/span-->
										<div class="form-group row">
											<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<div class="controls">
													<input type="text" maxlength="200" name="jscExamName" class="form-control" id="jscExamName" placeholder="Examinitaion Name" required disabled="disabled">
												</div>
											</div>
										</div>
										<!--/span-->
										<div class="form-group row">
											<label  class="col-sm-4 control-label">Board:<span
												class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<select class="form-control" name="jscBoard" id="jscBoard" required disabled="disabled">
															<option  value="">Select One</option>
															<option value="1">Dhaka</option>
															<option value="2">Comilla</option>
															<option value="3">Rajshahi</option>
															<option value="4">Jessore</option>
															<option value="5">Chittagong</option>
															<option value="6">Barisal</option>
															<option value="7">Sylhet</option>
															<option value="8">Dinajpur</option>
															<option value="9">Madrasah</option>
															<option value="13">Others</option>
														</select> 
													</div>
												</div>
											</div>
										</div>

										<!-- middle point of JSC  -->

										<div class="col-md-6">

											<div class="form-group row">
												<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<input type="text" maxlength="4" name="jscResult" class="form-control" id="jscResult" placeholder="5.00" required disabled="disabled">
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Passing Year:<span
													class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<input class="form-control" type="text" maxlength="4" name="jscPassingYear" id="jscPassingYear" placeholder="2000" required disabled="disabled">
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>
									<!-- end JSC form -->
									<hr>
									<div class="form-actions text-right p-b-20 p-r-30">
										<button id="student-back-step-three" type="button" class="btn waves-effect waves-light btn-outline-primary m-r-20" ><i class=" ti-arrow-left"></i>  Previous</button>

										<button id="submit-student" type="submit" class="btn waves-effect waves-light btn-outline-success" > Submit </button>
									</div>
								</div>
							</form>
						</div>
						<!-- end student form -->
						<!-- ######################################## -->

						<!-- ######################################## -->
						<!-- start teacher form -->
						<div class="card-body teacher" >
							<form id="education-info-teacher-Form">
								<div class="form-body">
									{{ csrf_field() }}

									<!-- start SSC form -->
									<div class="col-12 p-t-20">
										<h4 class="m-b-10 text-dark font-weight-bold">Secondary School Certificate (SSC)</h4>
										<input type="hidden" name="ssc_id" id="ssc_id"/>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row ">
													<label  class="col-sm-4 control-label">School Name:<span class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<input type="text" maxlength="200" name="schoolName" class="form-control" id="schoolName" placeholder="Schoole Name" required >
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<select type="text" name="sscExamType" 
															class="form-control" id="sscExamType" required>
															<option value="">Select One</option>
															<option value="S.S.C">S.S.C</option>
															<option value="Dakhil">Dakhil</option>
															<option value="S.S.C Vocational">S.S.C Vocational</option>
															<option value="O Level/Cambridge">O Level/Cambridge</option>
															<option value="S.S.C Equivalent">S.S.C Equivalent</option>
														</select>
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Group:<span class="text-danger">*</span></label>
												<div class="col-sm-8">
													<div class="controls">
														<select class="form-control" name="sscGroup" id="sscGroup" required>
															<option  value="">Select One</option>
															<option value="Science">Science</option>
															<option value="Humanities">Humanities</option>
															<option value="Commerce">Commerce</option>
															<option value="Others">Others</option>
														</select> 
													</div>
												</div>
											</div>
										</div>
										<!-- middle point of SSC  -->

										<div class="col-md-6">
											<div class="form-group row">
												<label  class="col-sm-4 control-label">Board:<span
													class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<select class="form-control" name="sscBoard" id="sscBoard" required>
																<option  value="">Select One</option>
																<option value="1">Dhaka</option>
																<option value="2">Comilla</option>
																<option value="3">Rajshahi</option>
																<option value="4">Jessore</option>
																<option value="5">Chittagong</option>
																<option value="6">Barisal</option>
																<option value="7">Sylhet</option>
																<option value="8">Dinajpur</option>
																<option value="9">Madrasah</option>
																<option value="10">Technical</option>
																<option value="11">Cambridge International - IGCE</option>
																<option value="12">Edexcel International</option>
																<option value="13">Others</option>
															</select> 
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<input type="text" maxlength="10" name="sscResult" class="form-control" id="sscResult" placeholder="5.00" required>
														</div>
													</div>
												</div>				
												<!--/span-->
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Passing Year:<span
														class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<input class="form-control" maxlength="4" name="sscPassingYear" id="sscPassingYear"placeholder="2000" required >
															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
										<!-- end SSC form -->
										<hr>
										<!-- start HSC form -->
										<div class="col-12 p-t-0">
											<h4 class="m-b-10 text-dark font-weight-bold">Higher Secondary School Certificate (H.S.C)</h4>
											<input type="hidden" name="hsc_id" id="hsc_id"/>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row ">
														<label  class="col-sm-4 control-label">College Name:<span class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<input type="text" maxlength="200" name="collageName" class="form-control" id="collageName" placeholder="College Name" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="form-group row">
														<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<select type="text" maxlength="60" name="hscExamType" 
																class="form-control" id="hscExamType" required>
																<option value="">Select One</option>
																<option value="H.S.C">H.S.C</option>
																<option value="Alim">Alim</option>
																<option value="Business Management">Business Management</option>
																<option value="Diploma">Diploma</option>
																<option value="A Level/Sr. Cambridge">A Level/Sr. Cambridge</option>
																<option value="H.S.C Equivalent">H.S.C Equivalent</option>
															</select>
														</div>
													</div>
												</div>
												<!--/span-->
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Group:<span class="text-danger">*</span></label>
													<div class="col-sm-8">
														<div class="controls">
															<select class="form-control" name="hscGroup" id="hscGroup" required>
																<option  value="">Select One</option>
																<option value="Science">Science</option>
																<option value="Humanities">Humanities</option>
																<option value="Commerce">Commerce</option>
																<option value="Others">Others</option>
															</select> 
														</div>
													</div>
												</div>
											</div>

											<!-- middle point of HSC  -->

											<div class="col-md-6">
												<div class="form-group row">
													<label  class="col-sm-4 control-label">Board:<span
														class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<select class="form-control" name="hscBoard" id="hscBoard" required>
																	<option  value="">Select One</option>
																	<option value="1">Dhaka</option>
																	<option value="2">Comilla</option>
																	<option value="3">Rajshahi</option>
																	<option value="4">Jessore</option>
																	<option value="5">Chittagong</option>
																	<option value="6">Barisal</option>
																	<option value="7">Sylhet</option>
																	<option value="8">Dinajpur</option>
																	<option value="9">Madrasah</option>
																	<option value="10">Technical</option>
																	<option value="11">Cambridge International - IGCE</option>
																	<option value="12">Edexcel International</option>
																	<option value="13">Others</option>
																</select> 
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="form-group row">
														<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
														<div class="col-sm-8">
															<div class="controls">
																<input type="text" maxlength="10" name="hscResult" class="form-control" id="hscResult" placeholder="5.00" required>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="form-group row">
														<label  class="col-sm-4 control-label">Passing Year:<span
															class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<input class="form-control" maxlength="4" name="hscPassingYear" id="hscPassingYear" placeholder="2000" required >
																</div>
															</div>
														</div>
													</div>

												</div>
											</div>
											<!-- end HSC form -->
											<hr>
											<!-- start Graduation form -->
											<div class="col-12 p-t-0">
												<h4 class="m-b-10 text-dark font-weight-bold">Graduation</h4>
												<input type="hidden" name="bsc_id" id="bsc_id"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group row ">
															<label  class="col-sm-4 control-label">University/Institute:<span class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<input type="text" maxlength="200" name="versityName" class="form-control" id="versityName" placeholder="University/Institute"required>
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="form-group row">
															<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<input type="text" maxlength="200" name="bscExamType" class="form-control" id="bscExamType" placeholder="BSe in CSE"required>
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="form-group row">
															<label  class="col-sm-4 control-label">Subject Name:<span class="text-danger">*</span></label>
															<div class="col-sm-8">
																<div class="controls">
																	<input type="text" maxlength="200" name="bscSubject" class="form-control" id="bscSubject" placeholder="Bangla/English/CSE etc"required>
																</div>
															</div>
														</div>
													</div>

													<!-- middle point of Graduation  -->

													<div class="col-md-6">
														<div class="form-group row">
															<label  class="col-sm-4 control-label">Course Duration:<span
																class="text-danger">*</span></label>
																<div class="col-sm-8">
																	<div class="controls">
																		<input class="form-control" maxlength="10" name="bscCourseDuration" id="bscCourseDuration" placeholder="4 Years / 5 Yeras" required >
																	</div>
																</div>
															</div>
															<!--/span-->
															<div class="form-group row">
																<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
																<div class="col-sm-8">
																	<div class="controls">
																		<input type="text" maxlength="4" name="bscResult" class="form-control" id="bscResult" placeholder="4.00"required>
																	</div>
																</div>
															</div>
															<!--/span-->
															<div class="form-group row">
																<label  class="col-sm-4 control-label">Passing Year:<span
																	class="text-danger">*</span></label>
																	<div class="col-sm-8">
																		<div class="controls">
																			<input class="form-control" maxlength="4" name="bscPassingYear" id="bscPassingYear" placeholder="2000" required >
																		</div>
																	</div>
																</div>

															</div>

														</div>
													</div>
													<!-- end Graduation form -->
													<hr>
													<!-- start Master's form -->
													<div class="col-12 p-t-0">
														<div class="d-flex">
															<h4 class="m-b-10 text-dark font-weight-bold">Master's</h4> 
															<input type="hidden" name="msc_id" id="msc_id"/>
															<div class="m-l-10 form-check ">
																<input class="form-check-input" type="checkbox" id="mscCheckbox" value="option1">
																<label class="form-check-label" for="mscCheckbox">if applicable</label>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group row ">
																	<label  class="col-sm-4 control-label">University/Institute:<span class="text-danger">*</span></label>
																	<div class="col-sm-8">
																		<div class="controls">
																			<input type="text" maxlength="200" name="mscVersityName" class="form-control" id="mscVersityName" placeholder="University/Institute"required disabled="disabled">
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="form-group row">
																	<label  class="col-sm-4 control-label">Examinitaion:<span class="text-danger">*</span></label>
																	<div class="col-sm-8">
																		<div class="controls">
																			<input type="text" maxlength="200" name="mscExamType" class="form-control" id="mscExamType" placeholder="MSe"required disabled="disabled">
																		</div>
																	</div>
																</div>
																<!--/span-->
																<div class="form-group row">
																	<label  class="col-sm-4 control-label">Subject Name:<span class="text-danger">*</span></label>
																	<div class="col-sm-8">
																		<div class="controls">
																			<input type="text" maxlength="200" name="mscSubject" class="form-control" id="mscSubject" placeholder="Bangla/English/CSE etc"required disabled="disabled">
																		</div>
																	</div>
																</div>
															</div>

															<!-- middle point of Master's  -->

															<div class="col-md-6">
																<div class="form-group row">
																	<label  class="col-sm-4 control-label">Course Duration:<span
																		class="text-danger">*</span></label>
																		<div class="col-sm-8">
																			<div class="controls">
																				<input class="form-control" maxlength="10" name="mscCourseDuration" id="mscCourseDuration" placeholder="1 Year / 2 Yeras" required  disabled="disabled">
																			</div>
																		</div>
																	</div>
																	<!--/span-->
																	<div class="form-group row">
																		<label  class="col-sm-4 control-label">Result:<span class="text-danger">*</span></label>
																		<div class="col-sm-8">
																			<div class="controls">
																				<input type="text" maxlength="4" name="mscResult" class="form-control" id="mscResult" placeholder="4.00"required disabled="disabled">
																			</div>
																		</div>
																	</div>
																	<!--/span-->
																	<div class="form-group row">
																		<label  class="col-sm-4 control-label">Passing Year:<span
																			class="text-danger">*</span></label>
																			<div class="col-sm-8">
																				<div class="controls">
																					<input class="form-control" maxlength="4" name="mscPassingYear" id="mscPassingYear" placeholder="2000" required  disabled="disabled">
																				</div>
																			</div>
																		</div>

																	</div>

																</div>
															</div>
															<!-- end Graduation form -->

															<hr>
															<div class="form-actions text-right p-b-20 p-r-30">
																<button id="teacher-back-step-three" type="button" class="btn waves-effect waves-light btn-outline-primary m-r-20" ><i class=" ti-arrow-left"></i>  Previous</button>

																<button id="submit-teacher" type="submit" class="btn waves-effect waves-light btn-outline-success" > Submit </button>
															</div>
														</div>
													</form>
												</div>
												<!-- end teacher form -->
											</div>

											@endsection

											@push('scripts') 
											<script type="text/javascript">
												$(document).ready(function()
												{
													$('#pscDistrict_id').select2();
													$('#pscThana_id').select2();

													thanalist("");

													$('#pscDistrict_id').change(function(event) {
														var select_id = $('#pscDistrict_id :selected').attr('value');
														thanalist(select_id);
													});
													function thanalist(distId) {
														if(distId == ""){
															$('#pscThana_id').html('<option value="">Not select any district</option>');
														}else{
															$.get("{{ url('/thanalist')}}/"+distId, function(data) {
																var thanaList = JSON.parse(data);
																var th_Html="";
																$.each(thanaList, function(index, val) {
																	th_Html+='<option value="'+val.id+'">'+val.name+'</option>';
																});
																$('#pscThana_id').html(th_Html);
															});
														}
													}


													$('#jscCheckbox').click(function() {
														if (!$(this).is(':checked')) {
															$( "#jscSchoolName" ).prop( "disabled", true );
															$( "#jscExamName" ).prop( "disabled", true );
															$( "#jscBoard" ).prop( "disabled", true );
															$( "#jscResult" ).prop( "disabled", true );
															$( "#jscPassingYear" ).prop( "disabled", true );
														}else{

															$( "#jscSchoolName" ).prop( "disabled", false );
															$( "#jscExamName" ).prop( "disabled", false );
															$( "#jscBoard" ).prop( "disabled", false );
															$( "#jscResult" ).prop( "disabled", false );
															$( "#jscPassingYear" ).prop( "disabled", false );
														}
													});
													$('#mscCheckbox').click(function() {
														if (!$(this).is(':checked')) {
															$( "#mscVersityName" ).prop( "disabled", true );
															$( "#mscExamType" ).prop( "disabled", true );
															$( "#mscSubject" ).prop( "disabled", true );
															$( "#mscResult" ).prop( "disabled", true );
															$( "#mscPassingYear" ).prop( "disabled", true );
															$( "#mscCourseDuration" ).prop( "disabled", true );
														}else{

															$( "#mscVersityName" ).prop( "disabled", false );
															$( "#mscExamType" ).prop( "disabled", false );
															$( "#mscSubject" ).prop( "disabled", false );
															$( "#mscResult" ).prop( "disabled", false );
															$( "#mscPassingYear" ).prop( "disabled", false );
															$( "#mscCourseDuration" ).prop( "disabled", false );
														}
													});

													$('#student-back-step-two').click(function(event) {
														$("#div_step_four").hide();
														$("#div_step_three").show();
													});

													$('#teacher-back-step-two').click(function(event) {
														$("#div_step_four").hide();
														$("#div_step_three").show();
													});






												});
											</script>
											@endpush