@extends('includes.header')
@section('pageTitle', 'AddCallerInfo')

@push('styles')
<style >
    .margin {
        margin-left: 15px;
    }
    
    .no-drop {
       cursor: no-drop;
   }

   .font-size{
    font-size: 15px;
}
.word_count_p {
    margin-top: 0px; 
    margin-right: 5px;
}

</style>
@endpush

@section('content')

<div class="row">

    <div class="col-md-8 col-sm-12" >
        <div class="form-group row">
            <div class="col-sm-8 p-b-5">
                <input required class="form-control" type="number" min="0" maxlength="15" name="fetch_data"  id="fetch_data" placeholder="Phone Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                onKeyUp="if(this.value<0){this.value='0';}">
            </div>
            <div class="col-sm-4" >
                <button id="fetchBtn" style="width: 100%;" type="button" class="btn waves-effect waves-light btn-outline-info "><i class="fas fa-search"></i>
                Search</button>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-sm-12">

        <h4 class="font-weight-bold text-danger" id="errorMessage"></h4>

    </div>


    <div class=" col-md-8 col-sm-12">

        <div class="card">
            <div class="card-header bg-info">
                <h3 class="m-b-0 text-white">Add Caller Information</h3>
            </div>

            <div class="card-body text-dark font-size">
                <form id="addForm">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <div class="row p-t-20">
                            <div class="col-12" style="display: none;">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-5 control-label">Unique Id :
                                    </label>
                                    <div class="col-sm-7">
                                        <div class="controls">
                                            <input  name="unique_id" class="form-control no-drop" id="unique_id" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                            <select style="width: 100%;" class="form-control" name="district_id" id="district_id" required></select> 
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
                                                            <select style="width: 100%;" required class="form-control" name="thana_id" id="thana_id">

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
                                                            <textarea type="text" name="problem_description" rows="5"  class="form-control" id="problem_description" placeholder="Problem Description" required></textarea>
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
                                                                    <select style="width: 100%;" class="form-control" name="referral_id" id="referral_id" required>

                                                                    </select> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                           <label for="phone" class="col-sm-5 control-label">Service center address:</label>
                                                           <div class="col-sm-7">
                                                             <div class="controls">
                                                                <textarea type="text" name="center_address" rows="5" class="form-control text-dark" id="center_address"
                                                                placeholder="Service center address" readonly></textarea>
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
                                           <div class="form-actions text-right">

                                            <button id="create_btn" type="submit" class="waves-effect waves-light btn btn-outline-info " ><i class="fa fa-check"></i> Submit </button>

                                        </div>
                                    </div>
                                </form>               
                            </div>    
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">

                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="m-b-0 text-white">Show Counseling List</h3>
                            </div>

                            <div class="card-body text-dark">
                                <div class="col-md-8 col-lg-12 scrollspy-example bg-white" data-spy="scroll" data-target="#spy">

                                    <div id="caller_service" >

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                @endsection

                @push('scripts') 
                <link rel="stylesheet" href="assets/selectTwo/dist/css/select2.min.css" />
                <script src="assets/selectTwo/dist/js/select2.min.js"></script>

                <script type="text/javascript">
                    $(document).ready(function() {
            //
            $('#district_id').select2();
            $('#thana_id').select2();
            $('#referral_id').select2();

            districtlist();
            thanalist("");
            reffralList();
            setTimestamp();

            function setTimestamp() {
               const currentDate = new Date();
               const timestamp = currentDate.getTime();
               $('#unique_id').val(timestamp);
           }

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

        var refData ;
        function reffralList() {
            $.get('{{ url("/referrallist") }}', function(data) {
                refData = jQuery.parseJSON(data);
                var refHtml = '<option value="">Select Center Name</option>';
                $.each(refData, function(index, val) {
                    refHtml+='<option value="'+val.id+'">'+val.name+'</option>';
                });
                $('#referral_id').html(refHtml);

            });
        }

        $('#referral_id').change(function(event) {
            var select_id = $('#referral_id :selected').attr('value');
            var refHtml = "";
            $.each(refData, function(index, val) {
                if(select_id == val.id){
                    refHtml+= val.address;
                }
            });
            $('#center_address').html(refHtml);
        });



        //add create click
        $("#addForm").on('submit',function(event) {
            event.preventDefault();
            var form_data = document.getElementById("addForm");
            var fd = new FormData(form_data);

            $.ajax({
                url: "{{ url('/addnewcaller') }}",
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.result == "success") {
                        showNotification(data.result, data.message);
                        formReset();
                    } else {
                        showNotification(data.result, data.message);
                    }

                    $("#create_btn").prop("disabled", false);
                }
            });

        });


        $('#fetchBtn').click(function(event) {
            var phone_uID = document.getElementById("fetch_data").value;
            //console.log("value : "+phone_uID); 
            if(phone_uID ==""){
                showNotification("error", "Please input valid phone number and Try again.");
            }else{
                $.ajax({
                    url: "{{ url('/fetchdata') }}/"+phone_uID,
                    type: 'GET',
                    dataType: 'json',
                    success:function(data) {
                        if(data.includes("blocked")){ 
                            $('#errorMessage').text(data);
                            
                        }else if(data.includes("not")){ 
                            $('#errorMessage').text(data);

                        }else{
                            $('#errorMessage').text("");
                            var toAppendItems = '<div class="row " id="accordion"> ';

                            $.each(data, function(index, val) {

                                $.each(data[index]['info'], function(index, valu) {
                                    $('#unique_id').val(valu.unique_id);
                                    $('#call_before').val(valu.call_before);
                                    $('#phone_num').val(valu.phone);
                                    $('#caller_email').val(valu.email);
                                    $('#caller_name').val(valu.name);
                                    $('#age').val(valu.age);
                                    $('#district_id').val(valu.district_id);
                                    setTimeout(function() {
                                        $('#thana_id').val(valu.thana_id).change();
                                    },500);

                                    $('#gender').val(valu.gender);
                                    $('#marital_status').val(valu.marital_status);
                                    $('#source_of_knowing').val(valu.source_of_knowing);
                                    selectItemChangeColor();
                                }); 


                                $.each(data[index]['service'], function(index, valu2) {
                                    toAppendItems += '<div style="width:100%;" ><h4 ><a data-toggle="collapse"  href="#tab-'+valu2.id +'" class="collapsed">'+valu2.date+'</a></h4><hr>'+
                                    '<div id="tab-'+valu2.id+'" class="collapse" data-parent="#accordion">'+

                                    '<table class="table table-striped"><tbody>'+
                                    '<tr><th> Caller ID </th><td>'+valu2.unique_id+'</td> </tr>'+
                                    '<tr><th> Medication </th><td>'+valu2.medication+'</td> </tr>'+
                                    '<tr><th> Therapeutic </th><td>'+valu2.therapeutic+'</td> </tr>'+
                                    '<tr><th> Problem description </th><td>'+valu2.problem_description+'</td> </tr>'+
                                    '<tr><th> Symptom </th><td>'+valu2.symptom+'</td> </tr>'+
                                    '<tr><th> Action taken </th><td>'+valu2.action_taken+'</td> </tr>'+
                                    '<tr><th> Call Duration </th><td>'+valu2.call_duration+'</td> </tr>'+
                                    '<tr><th> Caller Feeling </th><td>'+valu2.caller_feeling+'</td> </tr>'+
                                    '<tr><th> Call Type </th><td>'+valu2.call_type+'</td> </tr>'+
                                    '<tr><th> Counselor </th><td>'+valu2.counselor+'</td> </tr>'+
                                    '</tbody></table></div> '

                                });

                            });
                            toAppendItems += '</div></div>'
                            $('#caller_service').html(toAppendItems);
                        }
                    }
                });
            }
        });


        function selectItemChangeColor() {
            $('#call_before').css({"background-color":"#F5F5F5"});
            $('#phone_num').css({"background-color":"#F5F5F5"});
            $('#caller_email').css({"background-color":"#F5F5F5"});
            $('#caller_name').css({"background-color":"#F5F5F5"});
            $('#age').css({"background-color":"#F5F5F5"});
            $('#district_id').css({"background-color":"#F5F5F5"}).trigger('change');
            $('#thana_id').css({"background-color":"#F5F5F5"}).trigger('change');
            $('#gender').css({"background-color":"#F5F5F5"});
            $('#marital_status').css({"background-color":"#F5F5F5"});
            $('#source_of_knowing').css({"background-color":"#F5F5F5"});
        } 

        function formReset() {
            $('#addForm')[0].reset();
            $('#center_address').val("");
            setTimestamp();
            districtlist();
            thanalist("");
            reffralList();
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
