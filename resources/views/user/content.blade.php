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
        <div class="row mt-3 mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="d-md-flex justify-content-md-end">
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
                    <div class="d-flex justify-content-end">
                        <a href="/course/content/detail/{{ $content->id }}">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
