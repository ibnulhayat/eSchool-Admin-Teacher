
@push('styles')
<style>

#div_step_three{
	display: none;
}


</style>
@endpush

@section('step_three')
<div class="card" id="div_step_three">
	<div class="card-header bg-card-header border-left-right-teal">
		<h3 class="m-b-0 text-dark font-weight-bold">Address</h3>
	</div>
	<div class="card-body">
		<form id="address-Form">
			<input type="hidden" name="address_id" id="address_id"/>
			<div class="form-body">
				{{ csrf_field() }}

				<div class="row p-t-20 ">
					<div class="col-md-6">
						<div class=" ">
							<h4 class="m-b-10 text-dark font-weight-bold">Paressent Address:</h4>
						</div>
						<div class="form-group row ">
							<label  class="col-sm-4 control-label">Village/Flat/House/road:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<textarea type="text" name="paressent_village" rows="2" class="form-control" id="paressent_village" placeholder="" required></textarea>
								</div>
							</div>
						</div>

						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Post Office:</label>
							<div class="col-sm-8">
								<div class="controls">
									<input type="text" maxlength="60" name="paressent_post_office" class="form-control" id="paressent_post_office" placeholder="Post Office">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">District:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<select style="width: 100%;" class="form-control" name="paressent_district_id" id="paressent_district_id" required></select> 
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Upazilla/Thana:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<select style="width: 100%;" required class="form-control" name="paressent_thana_id" id="paressent_thana_id"> </select> 
								</div>
							</div>
						</div>
					</div>

					<!--/midil point-->

					<div class="col-md-6">
						<div >
							<h4 class="m-b-10 text-dark font-weight-bold">Parmanent Address:</h4>
						</div>
						<div class="form-group row ">
							<label  class="col-sm-4 control-label">Village/Flat/House/road:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<textarea type="text" name="parmanent_village" rows="2" class="form-control" id="parmanent_village" placeholder="" required></textarea>
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Post Office:</label>
							<div class="col-sm-8">
								<div class="controls">
									<input type="text" maxlength="60" name="parmanent_post_office" class="form-control" id="parmanent_post_office" placeholder="Post Office">
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">District:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<select style="width: 100%;" class="form-control" name="parmanent_district_id" id="parmanent_district_id" required></select> 
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="form-group row">
							<label  class="col-sm-4 control-label">Upazilla/Thana:<span class="text-danger">*</span></label>
							<div class="col-sm-8">
								<div class="controls">
									<select style="width: 100%;" required class="form-control" name="parmanent_thana_id" id="parmanent_thana_id"></select> 
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-actions text-right p-b-20 p-r-30">
					<button id="back-step-two" type="button" class="btn waves-effect waves-light btn-outline-primary m-r-20" ><i class=" ti-arrow-left"></i>  Previous</button>
					<button id="next-step-three" type="submit" class="btn waves-effect waves-light btn-outline-info" >Next  <i class=" ti-arrow-right"></i></button>
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
		$('#paressent_district_id').select2();
		$('#paressent_thana_id').select2();

		pra_thanalist("");
		function pra_districtlist() {
			$.get('{{ url("/districtlist") }}', function(data) {
				var disData = jQuery.parseJSON(data);
				var ddHtml = '<option value="">Select Distict</option>';
				$.each(disData, function(index, val) {
					ddHtml+='<option value="'+val.id+'">'+val.name+'</option>';
				});
				$('#paressent_district_id').html(ddHtml);
			});
}

$('#paressent_district_id').change(function(event) {
	var select_id = $('#paressent_district_id :selected').attr('value');
	pra_thanalist(select_id);
});

function pra_thanalist(distId) {
	if(distId == ""){
		$('#paressent_thana_id').html('<option value="">Not select any district</option>');
	}else{
		$.get("{{ url('/thanalist')}}/"+distId, function(data) {
			var thanaList = JSON.parse(data);
			var th_Html="";
			$.each(thanaList, function(index, val) {
				th_Html+='<option value="'+val.id+'">'+val.name+'</option>';
			});
			$('#paressent_thana_id').html(th_Html);
		});
	}


}

$('#parmanent_district_id').select2();
$('#parmanent_thana_id').select2();

thanalist("");

$('#parmanent_district_id').change(function(event) {
	var select_id = $('#parmanent_district_id :selected').attr('value');
	thanalist(select_id);
});

function thanalist(distId) {
	if(distId == ""){
		$('#parmanent_thana_id').html('<option value="">Not select any district</option>');
	}else{
		$.get("{{ url('/thanalist')}}/"+distId, function(data) {
			var thanaList = JSON.parse(data);
			var th_Html="";
			$.each(thanaList, function(index, val) {
				th_Html+='<option value="'+val.id+'">'+val.name+'</option>';
			});
			$('#parmanent_thana_id').html(th_Html);
		});
	}
}


$('#back-step-two').click(function(event) {
	$("#div_step_three").hide();
	$("#div_step_two").show();
});

$("#address-Form").on('submit', function(event) {
	event.preventDefault();

	var form_data = document.getElementById("address-Form");
	var fd = new FormData(form_data);

	$.ajax({
		url: "{{url('/address')}}",
		type: 'POST', 
		data: fd,
		processData:false,
		contentType:false,
		success: function (data) {
			if(data.result == "success"){
				$("#div_step_three").hide();
				$("#div_step_four").show();
			}
		}
	});
});

});
</script>
@endpush