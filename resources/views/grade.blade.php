@extends('includes.header')
@section('pageTitle', 'Subject')
@push('styles')
<style type="text/css">

.addBtn{
    font-size: 18px;
    font-style: normal;
    font-weight: bold;

}
</style>
@endpush
@section('content')
<!-- main row start div -->
<div class="row"> 
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 style="font-weight: bold;">New Grade Record</h2>
                <form id="addGradeForm">
                    <input type="hidden" name="edit_id" id="edit_id"/>
                    <div class="form-body">
                        {{ csrf_field() }}
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Student ID:<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="full_name" class="form-control" id="full_name" placeholder="Full Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Class Name:<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="full_name" class="form-control" id="full_name" placeholder="Class Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Subject Name:<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="full_name" class="form-control" id="full_name" placeholder="Subject Name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 control-label">Subject Mark:<span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="controls">
                                            <input type="text" maxlength="60" name="full_name" class="form-control" id="full_name" placeholder="Subject Mark" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <hr>
                    <div class="form-actions text-right">
                        <button type="button" class="btn waves-effect waves-light btn-outline-danger" data-dismiss="modal">Cancel</button>

                        <button id="add_save_btn" type="submit" class="btn waves-effect waves-light btn-outline-success" > <i class="fa fa-check"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> 

<!-- main row end div -->


@endsection
@push('scripts')


<!-- //javascript code start -->
<script type="text/javascript">
    $(document).ready(function() {

    });

</script>
<!-- //javascript code start -->
@endpush