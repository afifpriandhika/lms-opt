@extends('layouts.userDashboard')

@section('content')
    @foreach ($contents as $content)
        <div class="row mb-md-5 mb-sm-3">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg shadow-md bg-white p-3">
                    <h3 class="text-dark"><b>{{ $content->name }}</b></h3>
                    <p class="text-dark mt-3">{{ $content->description }}</p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="rounded-lg shadow-lg bg-white p-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h5 class="text-dark"><b>Ringkasan Materi</b></h5>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12">
                            <div class="text dark">
                                {!! $content->material !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="shadow-lg rounded-lg bg-white p-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="text-dark"><b>Video Pendukung</b></h5>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex align-items-center justify-content-center">
                        {!! $content->video !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 col-sm-12">
                <div class="shadow-lg rounded-lg bg-white p-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="text-dark"><b>Dokumen Pendukung</b></h5>
                            <p>{{ $content->file }}</p>
                            @if (!$content->file)
                                <p>Tidak ada dokumen pendukung</p>
                            @else
                                <a class="btn btn-primary" href="/content/{{ $content->file }}/view_pdf"
                                    target="_blank">Baca</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
