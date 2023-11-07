@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Productos</h3>
                        <a class="btn btn-success" href="{{ route('product.add') }}"><i class="fa-solid fa-plus"></i></a>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">tipo</th>
                                <th scope="col">Color</th>
                                <th scope="col">stock</th>
                                <th scope="col">descripcion</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $products)
                                @if ($user->id == $products->users_id)
                                    <tr>
                                        <td scope="row">{{ $products->id }}</td>
                                        <td scope="row">{{ $products->name }}</td>
                                        <td scope="row">{{ $products->type }}</td>
                                        <td scope="row">{{ $products->color }}</td>
                                        <td scope="row">{{ $products->stock }}</td>
                                        <td scope="row">{{ $products->description }}</td>
                                        <td scope="row">{{ $products->created_at }}</td>
                                        <td scope="row">
                                            <a href="{{ route('product.edit', ['id' => $products->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('product.delete', ['id' => $products->id]) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
