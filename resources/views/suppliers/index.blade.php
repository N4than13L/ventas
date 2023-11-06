@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Supllidres</h3>
                        <a class="btn btn-success" href="{{ route('supplier.add') }}"><i class="fa-solid fa-plus"></i></a>
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
                                <th scope="col">direccion</th>
                                <th scope="col">telefono</th>
                                <th scope="col">email</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($supplier as $suppliers)
                                @if ($user->id == $suppliers->users_id)
                                    <tr>
                                        <td scope="row">{{ $suppliers->id }}</td>
                                        <td scope="row">{{ $suppliers->name }}</td>

                                        <td scope="row">{{ $suppliers->address }}</td>
                                        <td scope="row">{{ $suppliers->phone }}</td>

                                        <td scope="row">{{ $suppliers->email }}</td>

                                        <td scope="row">{{ $suppliers->created_at }}</td>
                                        <td scope="row">
                                            <a href="{{ route('supplier.edit', ['id' => $suppliers->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('supplier.delete', ['id' => $suppliers->id]) }}"
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
