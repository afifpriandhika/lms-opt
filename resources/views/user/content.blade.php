@extends('layouts.userDashboard')

@section('content')
    @foreach ($courses as $course)
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg shadow-md bg-white p-3">
                    <h3 class="text-dark"><b>{{ $course->name }}</b></h3>
                    <p class="text-dark mt-3">{{ $course->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <a data-bs-toggle="modal" href="#unenroll{{ $course->id }}" role="button" class="btn btn-danger me-md-2" type="button">Batalkan Enrollment</a>
    </div>

    @foreach ($contents as $content)
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg shadow-lg bg-white p-3">
                    <h3 class="text-dark"><b>{{ $content->name }}</b></h3>
                    <p class="text-dark mt-3">{{ $content->description }}</p>
                    <div class="d-flex justify-content-end">
                        <a href="/course/content/detail/{{ $content->id }}">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@foreach($courses as $course)
<div class="modal fade" id="unenroll{{$course->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Mata Pelajaran</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin akan menghapus mata pelajaran ini dari daftar pelajaran yang di enroll?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="/course/unenroll/{{$course->id}}" type="button">Yakin</a>
                
            </div>
        </div>
    </div>
</div>
@endforeach


<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
