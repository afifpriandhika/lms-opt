@extends('layouts.adminDashboard')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6">
        <h3 class="text-dark"><b>Daftar Siswa</b></h3>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
                Tambah Siswa
            </button>
        </div>
    </div>
</div>
@if ($usersCount == 0)
    <div class="row">
        <div class="col-md-12 col-sm-12 mt-3">
            <div class="rounded-lg shadow-lg p-5 bg-white">
                <center><img class="img-fluid" src="{{ asset('img/no-data.jpg') }}" alt="" width="300rem">
                </center>
                <center>
                    <h4><b>Tidak ada siswa</b></h4>
                </center>
            </div>
        </div>
    </div>
@else
@include('layouts.flash-message')
<div class="row">
    <div class="col-md-12 col-sm-12 mt-3">
        <div class="rounded-lg shadow-lg p-5 bg-white">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Waktu Registrasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/admin/manageStudents/{{$user->id}}/delete">Hapus</a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" href="#update{{ $user->id }}" role="button">Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endif
<!-- Insert Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="insertModalLabel">Tambah Siswa</h4>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.storeStudent')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
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

<!-- Update Modal -->
@foreach($users as $user)
<div class="modal fade" id="update{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title fs-5" id="updateModalLabel">Tambah Siswa</h4>
        </div>
        <div class="modal-body">
            <form action="/admin/manageStudents/update/{{$user->id}}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
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