@extends('layouts.userDashboard')

@section('content')
    <div class="row mb-3">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark">Daftar Mata Pelajaran</h3>
        </div>
    </div>
    @include('layouts.flash-message')
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
    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-3 col-sm-12">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/features-2.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><b>{{$course->name}}</b></h5>
                    <p class="card-text">{{$course->description}}</p>
                    <a data-bs-toggle="modal" href="#enroll{{ $course->id }}" role="button" class="btn btn-primary btn-sm">Enroll</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


@foreach($courses as $course)
<div class="modal fade" id="enroll{{$course->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="updateModalLabel">Enroll Mata Pelajaran</h4>
        </div>
        <div class="modal-body">
            <form action="/course/enroll/{{$course->id}}" method="POST">
                @csrf
                <input type="hidden" value="{{$course->id}}" name="course_id">
                <div class="mb-3 row">
                    <label for="courseName" class="col-sm-3 col-form-label text-dark">Enrollment Key</label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="courseName" name="enrollment" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Enroll</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
@endsection
