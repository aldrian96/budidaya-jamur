@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
<div class="card mb-3">
<img src="{{ ('img/gunung.jpg') }}" class="card-img-top">
    <div class="card-body">
      <h5 class="card-title">Inventaris Jamur</h5>
      <p class="card-text">Tidak ada penjelasan dan kejelasan apapun tentang apa yang sudah saya buat</p>
      <p class="card-text"><small class="text-muted">ADMIN</small></p>
    </div>
  </div>
</div>

@endsection
