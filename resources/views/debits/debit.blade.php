@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ ('debits/create') }}" class="btn btn-outline-primary float-left">Tambah Data</a>
                    <a href="#" class="btn btn-outline-success float-left mx-2">Export</a>
                    <a href="#" class="btn btn-outline-danger float-left">Recycle Bin</a>

                    {{-- <form method="POST" action="{{ route('debits/pencarian') }}" class="form-inline my-2 my-lg-0 float-right">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> --}}
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
                            <th scope="col">Hutang bandar</th>
                            <th scope="col">Hutang Member</th>
                          </tr>
                        </thead>
                        </div>
                        <tbody>
                            @foreach( $debits as $dbt )
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dbt->nama }}</td>
                                    <td>{{ $dbt->hutang_b }}</td>
                                    <td>{{ $dbt->hutang_m }}</td>
                                    <td>
                                        <a href="{{ route('debits.edit',$dbt->id) }}" class="btn btn-warning">Edit</a>
                                        
                                        <form method="POST" action="{{ route('debits.destroy', $dbt->id) }}" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')">Delete</button>
                                        </form>

                                        <a href="{{ route('debits.show',$dbt->id) }}" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="d-block col-12 mt-3 justify-content-center">
                    {{ $debits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
