
@push('styles')
<style>

#div_step_two{
	display: none;
}

</style>
@endpush

@section('step_two')

<div class="card" id="div_step_two">
	<div class="card-header bg-card-header border-left-right-teal">
		<h3 class="m-b-0 text-dark font-weight-bold">Parents Information</h3>
	</div>
	<div class="card-body">
		<form id="parents-info-Form">
			<input type="hidden" name="parents_info_id" id="parents_info_id"/>
			<div class="form-body">
				{{ csrf_field() }}

				<div class="row p-t-20">

					<div class="col-md-6">
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Father Name:<span
								class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="text" maxlength="60" name="father_name" class="form-control" id="father_name" placeholder="Father Name" required>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label  class="col-sm-4 control-label">Father Occupation:</label>
								<div class="col-sm-8">
									<div class="controls">
										<select class="form-control" name="father_occupation" id="father_occupation" >
											<option  value="">Select One</option>
											<option value="Agriculture">Agriculture</option>
											<option value="Teacher">Teacher</option>
											<option value="Banker">Banker</option>
											<option value="Business">Business</option>
											<option value="Doctor">Doctor</option>
											<option value="Fisherman">Fisherman</option>
											<option value="Public Service">Public Service</option>
											<option value="Private Service">Private Service</option>
											<option value="Shopkeeper">Shopkeeper</option>
											<option value="Driver">Driver</option>
											<option value="Worker">Worker</option>
											<option value="N/A">N/A</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label for="name" class="col-sm-4 control-label">Father Phone:</label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="number" min="0" maxlength="15" name="father_phone" class="form-control" id="father_phone" placeholder="Father Phone Number" >
									</div>
								</div>
							</div>

						</div>
						<!--/middle point-->
						<div class="col-md-6">
							<div class="form-group row">
								<label for="name" class="col-sm-4 control-label">Mothar Name:<span class="text-danger">*</span></label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="text" maxlength="60" name="mother_name" class="form-control" id="mother_name" placeholder="Moather Name" required>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label  class="col-sm-4 control-label">Mother Occupation:</label>
								<div class="col-sm-8">
									<div class="controls">
										<select class="form-control" name="mother_occupation" id="mother_occupation" >
											<option  value="">Select One</option>
											<option value="Agriculture">Agriculture</option>
											<option value="Teacher">Teacher</option>
											<option value="Banker">Banker</option>
											<option value="Business">Business</option>
											<option value="Doctor">Doctor</option>
											<option value="Public Service">Public Service</option>
											<option value="Private Service">Private Service</option>
											<option value="Shopkeeper">Shopkeeper</option>
											<option value="House-Wife">House-Wife</option>
											<option value="N/A">N/A</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="form-group row">
								<label for="name" class="col-sm-4 control-label">Mother Phone:</label>
								<div class="col-sm-8">
									<div class="controls">
										<input type="number" min="0" maxlength="15" name="mather_phone" class="form-control" id="mather_phone" placeholder="Mother Phone Number" >
									</div>
								</div>
							</div>
						</div>

					</div>
					<hr>
					<div class="form-actions text-right p-b-20 p-r-30">
						<button id="back-step-one" type="button" class="btn waves-effect waves-light btn-outline-primary m-r-20" ><i class=" ti-arrow-left"></i>  Previous</button>

						<button id="next-step-two" type="submit" class="btn waves-effect waves-light btn-outline-info" >Next  <i class=" ti-arrow-right"></i></button>
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
			$('#back-step-one').click(function(event) {
				$("#div_step_two").hide();
				$("#div_step_one").show();
			});

			$("#parents-info-Form").on('submit', function(event) {
				event.preventDefault();

				var form_data = document.getElementById("parents-info-Form");
				var fd = new FormData(form_data);

				$.ajax({
					url: "{{url('/guardian-info')}}",
					type: 'POST', 
					data: fd,
					processData:false,
					contentType:false,
					success: function (data) {
						if(data.result == "success"){
							$("#div_step_two").hide();
							$("#div_step_three").show();
						}else{
							showNotification(data.result, data.message);
						}
					}
				});
			});
		});
	</script>
	@endpush