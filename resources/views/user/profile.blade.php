@extends('layouts.userDashboard')

@section('content')
    @include('layouts.flash-message')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="text-dark"><b>Profil</b></h3>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-warning me-md-2 mb-3" data-bs-toggle="modal" href="#updatePassword{{ Auth::User()->id }}" role="button" type="button">Ganti Password</button>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="rounded-lg shadow-lg p-5 bg-white">
                <form action="/profile/update/{{Auth::User()->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" disabled value="{{Auth::User()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePassword{{Auth::User()->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="updateModalLabel">Tambah Siswa</h4>
        </div>
        <div class="modal-body">
            <form action="/profile/update/password/{{Auth::User()->id}}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Baru</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection