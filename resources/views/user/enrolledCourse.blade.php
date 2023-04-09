@extends('layouts.userDashboard')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark">Daftar Mata Pelajaran Diambil</h3>
        </div>
    </div>
    @include('layouts.flash-message')
    <div class="row">
        @foreach($enrolled_courses as $course)
        <div class="col-md-3 col-sm-12">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/features-2.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><b>{{$course->name}}</b></h5>
                    <p class="card-text">{{$course->description}}</p>
                    <a href="/course/detail/{{$course->id}}" class="btn btn-primary btn-sm">Buka</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
