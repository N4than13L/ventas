@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Editar productos</h3>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}">
                            @csrf

                            {{-- name --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $product->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- type --}}
                            <div class="row mb-3">
                                <label for="type"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tipo') }}</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" value="{{ $product->type }}"
                                        class="form-control @error('type') is-invalid @enderror" name="type"
                                        value="{{ old('type') }}" required autocomplete="type" autofocus>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- color --}}
                            <div class="row mb-3">
                                <label for="color"
                                    class="col-md-4 col-form-label text-md-end">{{ __('color') }}</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" value="{{ $product->color }}"
                                        class="form-control @error('color') is-invalid @enderror" name="color"
                                        value="{{ old('color') }}" required autocomplete="color" autofocus>

                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- stock --}}
                            <div class="row mb-3">
                                <label for="stock"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                                <div class="col-md-6">
                                    <input id="stock" type="number" value="{{ $product->stock }}"
                                        class="form-control @error('stock') is-invalid @enderror" name="stock"
                                        value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                                    @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- descripcion --}}
                            <div class="row mb-3">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-end">{{ __('descripcion') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="number" class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                                    
                                        {{ $product->description }}
                                    </textarea>


                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
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
