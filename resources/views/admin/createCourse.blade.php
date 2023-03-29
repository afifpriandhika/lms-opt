@extends('layouts.adminDashboard')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark"><b>Buat Materi</b></h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-sm-12">
            <div class="rounded-lg shadow-lg bg-white p-5">
                <form action="{{route('admin.storeCourse')}}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="courseName" class="col-sm-2 col-form-label text-dark">Judul Materi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="courseName" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-sm-2 col-form-label text-dark">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
