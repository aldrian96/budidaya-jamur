@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ ('members/create') }}" class="btn btn-outline-primary float-left">Tambah Data</a>
                    <a href="/members/export_excel" class="btn btn-outline-success float-left mx-2">Export</a>
                    <a href="/members/trash" class="btn btn-outline-danger float-left">Recycle Bin</a>

                    <form method="POST" action="{{ route('members/pencarian') }}" class="form-inline my-2 my-lg-0 float-right">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
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
                                        <a href="{{ route('members.edit',$member->id) }}" class="btn btn-warning">Edit</a>
                                        <form method="POST" action="{{ route('members.destroy', $member->id) }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')">Delete</button>
                                        </form>
                                        <a href="{{ route('members.show',$member->id) }}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="d-block col-12 mt-3 justify-content-center">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
