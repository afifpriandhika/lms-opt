@extends('layouts.adminDashboard')

@section('content')
@include('layouts.flash-message')
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h3 class="text-dark"><b>Daftar Mata Pelajaran</b></h3>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('admin.createCourse') }}" class="btn btn-primary">Buat Mata Pelajaran Baru</a>
            </div>
        </div>
    </div>
    @if ($coursesCount == 0)
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-3">
                <div class="rounded-lg shadow-lg p-5 bg-white">
                    <center><img class="img-fluid" src="{{ asset('img/no-data.jpg') }}" alt="" width="300rem">
                    </center>
                    <center>
                        <h4><b>Belum Ada Mata Pelajaran</b></h4>
                    </center>
                </div>
            </div>
        </div>
    @else
        @foreach ($courses as $course)
            <div class="row">
                <div class="col-md-12 col-sm-12 mt-3">
                    <div class="rounded-lg shadow-lg p-3 bg-white">
                        <h4 class="text-dark"><b>{{ $course->name }}</b></h4>
                        <p class="text-dark mt-3">{{ $course->description }}</p>
                        @if($course->status == 1)
                        <span class="badge rounded-pill bg-success text-dark">Konten Ditampilkan</span>
                        @else
                        <span class="badge rounded-pill bg-warning text-dark">Konten Disembunyikan</span>
                        @endif

                        <div class="d-flex justify-content-end">
                            <a href="/admin/manageCourse/detail/{{ $course->id }}">Lihat</a>
                            @if($course->status == 1)
                            <a class="text-warning ml-2" href="/admin/manageCourse/hide/{{ $course->id }}">Sembunyikan</a>
                            @else
                            <a class="text-warning ml-2" href="/admin/manageCourse/unhide/{{ $course->id }}">Tampilkan</a>
                            @endif
                            <a class="text-danger ml-2" href="/admin/manageCourse/delete/{{ $course->id }}">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
