@extends('layouts.adminDashboard')

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
        <div class="row mt-3 mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="d-md-flex justify-content-md-end">
                    <a data-bs-toggle="modal" href="#update{{ $course->id }}" role="button" class="btn btn-warning mr-2">Ubah Mata Pelajaran</a>
                    <a href="/admin/manageCourse/{{ $course->id }}/content/add" class="btn btn-primary">Buat Konten Mata Pelajaran</a>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="row">
    <div class="col-md-7 offset-3 mt-4">
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                </div>
            </form>
        </div>
    </div>
</div> --}}
    @foreach ($contents as $content)
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg shadow-lg bg-white p-3">
                    <h3 class="text-dark"><b>{{ $content->name }}</b></h3>
                    <p class="text-dark mt-3">{{ $content->description }}</p>
                    @if($content->status == 1)
                        <span class="badge rounded-pill bg-success text-dark">Konten Ditampilkan</span>
                    @else
                        <span class="badge rounded-pill bg-warning text-dark">Konten Disembunyikan</span>
                    @endif
                    <div class="d-flex justify-content-end">
                        <a href="/admin/manageCourse/content/detail/{{$content->id}}">Lihat</a>
                        @if($content->status == 1)
                            <a class="text-warning ml-2" href="/admin/manageCourse/content/hide/{{ $content->id }}">Sembunyikan</a>
                        @else
                            <a class="text-warning ml-2" href="/admin/manageCourse/content/unhide/{{ $content->id }}">Tampilkan</a>
                        @endif
                        <a class="text-danger ml-2" href="/admin/manageCourse/content/{{ $content->id }}/delete">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Update Modal -->
@foreach($courses as $course)
<div class="modal fade" id="update{{$course->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="updateModalLabel">Update Mata Pelajaran</h4>
        </div>
        <div class="modal-body">
            <form action="/admin/manageCourse/update/{{$course->id}}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="mb-3 row">
                    <label for="courseName" class="col-sm-2 col-form-label text-dark">Judul Materi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="courseName" name="name" value="{{$course->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description" class="col-sm-2 col-form-label text-dark">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" rows="3">{{$course->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach
@endsection

<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
