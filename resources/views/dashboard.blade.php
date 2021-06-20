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
    .mt-10{
        margin-top: 22px;
    }
    .card-body{
        padding: 20px 5px 20px 5px;
    }
</style>
@endpush
@section('content')
<div class="row">

    <div class="custom_row">
        <h2 style="font-weight: bold;">Dashboard</h2>
    </div>

    <div class="custom_row">
        <div class="row "> 
            <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
                <div class="mt-10 rounded bg-white border-left-deepSky">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-l-5 text-center align-self-center">
                                <i class="icon-phone text-deepsky" style="font-size:40px;"></i>

                            </div>
                            <div class="text-center  ml-auto w-100">
                                <h3 class="font-weight-bold text-deepsky mt-2 mb-1">Total Call</h3>
                                <h2 class="mt-0 text-deepsky" id="total_call_data"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
                <div class="mt-10 rounded bg-white border-left-success">
                    <div class="card-body ">
                        <div class="d-flex ">
                            <div class="m-l-5 text-center align-self-center">
                                <i class="icon-phone text-success" style="font-size:40px;"></i>
                            </div>
                            <div class="text-center ml-auto w-100">
                                <h3 class="font-weight-bold text-success mt-2 mb-1">Monthly Call</h3>
                                <h2 class="mt-0 text-success" id="monthly_call_data"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
                <div class="mt-10 rounded bg-white border-left-primary">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-l-5 text-center align-self-center">

                                <i class="icon-phone text-primary" style="font-size:40px;"></i>
                            </div>
                            <div class="text-center  ml-auto w-100">
                                <h3 class="font-weight-bold text-primary mt-2 mb-1">Weekly Call</h3>
                                <h2 class="mt-0 text-primary" id="weekly_call_data"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-3 col-md-3 col-lg-3 col-sm-3 ">
                <div class="mt-10 rounded bg-white border-left-teal">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="m-l-5 text-center align-self-center "> 
                                <i class="icon-user text-teal" style="font-size:40px;"></i>
                            </div>
                            <div class="text-center  ml-auto w-100"> 
                                <h3 class="font-weight-bold text-teal mt-2 mb-1">Total Staff</h3>
                                <h2 class="mt-0 text-teal" id="total_staff_data"></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="custom_row mt-10 bg-white rounded">

        <div class=" card-body">
            <div class="d-md-flex">
                <div>
                    <h3 class="card-title">Monthly Services Overview </h3>
                </div>
                <div class="ml-auto">
                    <select class="custom-select border-1" name="monthYear" id="monthYear">

                    </select>
                </div>
            </div>
        </div>
        <hr>

        <div class="stats-bar">
            <div class="row text-center "> 
                <div class="col-sm-4" >
                    <div class="p-3 ">
                        <h6 class="font-weight-bold text-info text-uppercase" id="titleofMonth"></h6>
                        <h3 class="font-weight-bold text-gray-800" id="this_month_call"></h3>
                    </div>
                </div>

                <div class="col-sm-4 vl">
                    <div class="p-3">
                        <h6 class="font-weight-bold text-info text-uppercase"id="titleofWeek"></h6>
                        <h3 class="font-weight-bold text-gray-800" id="this_week_call"></h3>
                    </div>
                </div>

                <div class="col-sm-4 vl">
                    <div class="p-3">
                        <h6 class="font-weight-bold text-info text-uppercase"id="titleofDaily"></h6>
                        <h3 class="font-weight-bold text-gray-800" id="today_call"></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left: 2px; margin-right: 2px; margin-top: 30px;" >

        <div class="mt-12 col-md-12 col-sm-12">

            <div class="card-body rounded bg-white">
                <div>
                    <h3 class="card-title mb-3">Category List</h3>
                </div>
                <div class="row" id="items_view" >

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
