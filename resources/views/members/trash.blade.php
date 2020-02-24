@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/members/restore_all" class="btn btn-outline-primary float-left mx-2" onclick="return confirm('Apakah Anda yakin ingin merestore semua data ini?')">Restore All</a>
                    <a href="/members/delete_all" class="btn btn-outline-danger float-left" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen semua data ini?')">Delete All</a>
                </div>


                @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-hover">
                        <div class="">
                        <thead class="thead-dark text-center">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        </div>
                        <tbody>
                            @foreach( $members as $member )
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->nama }}</td>
                                    <td>{{ $member->noTelp }}</td>
                                    <td>{{ $member->alamat }}</td>
                                    <td>
                                    <a href="/members/restore/{{ $member->id }}" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin merestore data ini?')">Restore</a>
                                    <a href="/members/delete/{{ $member->id }}" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="d-block col-12 mt-3 justify-content-center">
                    <a href="{{ route('members.index') }}" class="btn btn-primary float-right">Kembali</a>
                    {{ $members->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
