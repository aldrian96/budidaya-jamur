@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tabungan
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
                            <th scope="col">Tabungan</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        </div>
                        <tbody>
                            @foreach( $query as $qr )
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $qr->nama }}</td>
                                    <td>{{ $qr->tabungan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="container">
                <div class="d-block col-12 mt-3 justify-content-center">
                    {{ $members->links() }}
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
