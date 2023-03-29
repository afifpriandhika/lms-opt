@extends('layouts.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="rounded-lg shadow-lg p-5 bg-white">
                <h3 class="text-dark"><b>Selamat datang {{Auth::User()->name}}!</b></h3>
                <center><img class="img-fluid" src="{{asset('img/welcome.jpg')}}" alt="" width="600rem"></center>
            </div>
        </div>
    </div>
@endsection