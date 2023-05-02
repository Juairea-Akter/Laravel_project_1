@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-12 grid-margic">

        @if(session('message'))
        <h6 class="alert alert-success">{{session('message')}},</h6>
        @endif
        <div class="me-md-3 me-xl-5">
            <h2> Admin Dashboard</h2>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Orders</label>
                    <h1>{{$totalOrder}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Today Order</label>
                    <h1>{{$todayOrder}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>This Month Order</label>
                    <h1>{{$thisMonthOrder}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Year Order</label>
                    <h1>{{$thisYearOrder}}</h1>

                </div>
            </div>
            <hr>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Categories</label>
                    <h1>{{$totalCategories}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Sub Categories</label>
                    <h1>{{$totalSubCategories}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Packages</label>
                    <h1>{{$totalPackages}}</h1>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Makeup Artists</label>
                    <h1>{{$totalAllUser}}</h1>

                </div>
            </div>
            <hr>
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Customers</label>
                    <h1>{{$totalAllUser}}</h1>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection