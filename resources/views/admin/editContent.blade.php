@extends('layouts.adminDashboard')

@section('content')
    @include('layouts.flash-message')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark"><b>Ubah Konten Materi</b></h3>
        </div>
    </div>

    @foreach ($contents as $content)
    <form action="/admin/manageCourse/content/update/{{$content->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <input type="hidden" name="course_id" value="{{ $content->id }}">
        @endforeach
        <div class="row mt-3">
            <div class="col-md-6 col-sm-12">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label text-dark">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $content->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label text-dark">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $content->description }}</textarea>
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
                <textarea class="ckeditor form-control" name="material">{!! $content->material !!}</textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 col-sm-12">
                <p class="text-dark">Preview Video Pembelajaran</p>
                <div class="col-sm-12 d-flex align-items-center justify-content-center">
                    {!! $content->video !!}
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label for="videoLink" class="form-label text-dark">Link Video Pembelajaran</label>
                        <textarea class="form-control" id="video" name="video" rows="4">{{ $content->video }}</textarea>
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
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h5 class="text-dark"><b>Dokumen Pendukung</b></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="mb-3">
                <div class="form-group">
                    @if(!$content->file)
                    <span class="badge rounded-pill bg-warning text-dark">Tidak ada file pendukung</span>
                    @else
                    <p>Dokumen Terunggah :
                        <a href="/admin/content/{{ $content->file }}/view_pdf" target="_blank">{!! $content->file !!}</a>
                        <a href="/admin/manageCourse/content/delete/file/{{$content->id}}" class="btn btn-danger btn-sm ml-2">Hapus</a>
                    </p>
                    @endif
                    <form class="mt-3" method="POST" action="/admin/manageCourse/content/update/file/{{$content->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="exampleFormControlFile1" class="text-dark"><b>Ubah File Pendukung</b></label>
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
    <hr>

    <div class="d-grid gap-2 d-md-block mb-3">
        <button class="btn btn-warning" type="button">Sembunyikan</button>
    </div>

    <script src="//cdn.ckeditor.com/4.20.1/basic/ckeditor.js"></script>
@endsection
