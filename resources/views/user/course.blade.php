@extends('layouts.userDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark">Daftar Mata Pelajaran</h3>
        </div>
    </div>
    @if($coursesCount == 0)
    <div class="row">
        <div class="col-md-12 col-sm-12 mt-3">
            <div class="rounded-lg shadow-lg p-5 bg-white">
                <center><img class="img-fluid" src="{{asset('img/no-data.jpg')}}" alt="" width="300rem"></center>
                <center><h4><b>Belum Ada Mata Pelajaran</b></h4></center>
            </div>
        </div>
    </div>
    @else
    @foreach($courses as $course)
    <div class="row">
        <div class="col-md-12 col-sm-12 mt-3">
            <div class="rounded-lg shadow-lg p-3 bg-white">
                <h4 class="text-dark"><b>{{$course->name}}</b></h4>
                <p class="text-dark mt-3">{{$course->description}}</p>
                <div class="d-flex justify-content-end">
                    <a href="/course/{{$course->id}}/content">Masuk</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
@endsection
