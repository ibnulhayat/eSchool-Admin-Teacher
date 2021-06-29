@extends('includes.header')
@section('pageTitle', 'Dashboard')

@push('styles')
<style>
.border-left-danger{
    border-left-style: solid;
    border-left-color: red;
}
.border-left-dark{
    border-left-style: solid;
    border-left-color: black;
}
.border-left-info{
    border-left-style: solid;
    border-left-color: #1976D2;
}
.border-left-warning{
    border-left-style: solid;
    border-left-color: #FFA500;
}
.border-left-success{
    border-left-style: solid;
    border-left-color: #06D79C;
}    
.border-left-primary{
    border-left-style: solid;
    border-left-color: #745AF2;
}    
.border-left-secondary{
    border-left-style: solid;
    border-left-color: #5A6268;
}   
.border-left-deepSky{
    border-left-style: solid;
    border-left-color: #32CD32;
}
.border-left-teal{
    border-left-style: solid;
    border-left-color: #808000;
}
.text-deepsky{
    color:#32CD32;
}
.text-teal{
    color:#808000;
}
.custom_row{
    width: 100%;
    margin-left: 15px;
    margin-right: 15px;
    margin-bottom: 0px;
}
.vl {
    border-left: 2px solid #E5E5E5;
    margin-bottom: 10px;
}
.fonticon-list{
    list-style: none;
    margin: 20px 0;
    padding: 0;
}
.mt-22{
    margin-top: 22px;
}
.card-body{
    padding: 20px 5px 20px 5px;
}
.align_center{
    text-align: center;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
}
</style>
@endpush
@section('content')
<div class="row ">

    <!-- <div class="custom_row">
        <h2 style="font-weight: bold;">Dashboard</h2>
    </div> -->


    <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
        <div class="rounded bg-white border-left-deepSky">
            <div class="card-body">
                <div class="d-flex">
                    <div class="w-100 ">
                        <h2 class="text-deepsky align_center" id="total_students">200</h2>
                    </div>
                    <div class="text-center">
                        <i class=" icon-people text-deepsky" style="font-size:40px;"></i>
                        <h3 class="font-weight-bold text-deepsky">Students</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
        <div class="rounded bg-white border-left-success">
            <div class="card-body ">
                <div class="d-flex">
                    <div class="w-100 ">
                        <h2 class="text-success align_center" id="total_teachers">20</h2>
                    </div>
                    <div class="text-center">
                        <i class=" icon-user text-success" style="font-size:40px;"></i>
                        <h3 class="font-weight-bold text-success">Teachers</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
        <div class="rounded bg-white border-left-primary">
            <div class="card-body">
                <div class="d-flex">
                    <div class="w-100 ">
                        <h2 class="text-primary align_center" id="total_">5</h2>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-users text-primary" style="font-size:40px;"></i>
                        <h3 class="font-weight-bold text-primary">Classes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
        <div class="rounded bg-white border-left-teal">
            <div class="card-body">
                <div class="d-flex">
                    <div class="w-100 ">
                        <h2 class="text-teal align_center" id="total_">2</h2>
                    </div>
                    <div class="text-center">
                        <i class="icon-bell text-teal" style="font-size:40px;"></i>
                        <h3 class="font-weight-bold text-teal">Notice</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {


    });

</script>
@endpush
