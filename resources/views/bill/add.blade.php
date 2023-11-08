@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Facturas</h3>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('bill.save') }}">
                            @csrf

                            {{-- attendedby --}}
                            <div class="row mb-3">
                                <label for="attendedby"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Attendido por') }}</label>

                                <div class="col-md-6">
                                    <input id="attendedby" type="text"
                                        class="form-control @error('attendedby') is-invalid @enderror" name="attendedby"
                                        value="{{ old('attendedby') }}" required autocomplete="attendedby" autofocus>

                                    @error('attendedby')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- volume --}}
                            <div class="row mb-3">
                                <label for="volume"
                                    class="col-md-4 col-form-label text-md-end">{{ __('cantidad') }}</label>

                                <div class="col-md-6">
                                    <input id="volume" type="number"
                                        class="form-control @error('volume') is-invalid @enderror" name="volume"
                                        value="{{ old('volume') }}" required autocomplete="volume" autofocus>

                                    @error('volume')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Client --}}
                            <div class="row mb-3">
                                <label for="client"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="client" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el cliente</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">
                                                {{ $clients->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
