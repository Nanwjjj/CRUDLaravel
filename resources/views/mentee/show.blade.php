@extends('layout.template')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    DETAIL MENTEE
                </div>
                <div class="card-body text-center">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @else
                        <h4 class="card-title">{{ $mentee->nama }}</h4>
                        <p class="card-text">
                            <strong></strong> {{ $mentee->nim }}<br>
                            <strong></strong> {{ $mentee->prodi }}
                        </p>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('mentee.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
