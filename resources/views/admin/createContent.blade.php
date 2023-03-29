@extends('layouts.adminDashboard')

@section('content')
    @include('layouts.flash-message')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark"><b>Buat Konten Materi</b></h3>
        </div>
    </div>

    <form action="{{ route('admin.storeContent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($courses as $course)
            <input type="hidden" name="course_id" value="{{ $course->id }}">
        @endforeach
        <div class="row mt-3">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label text-dark">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label text-dark">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h5 class="text-dark"><b>Bahan Ajar</b></h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <h6 class="text-dark">Ringkasan Materi</h6>
                <textarea class="ckeditor form-control" name="material"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label for="videoLink" class="form-label text-dark">Link Video Pembelajaran (Gunakan link embedded)</label>
                    <textarea class="form-control" id="video" name="video" rows="4"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Unggah File Pendukung</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    <script src="//cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>
@endsection
