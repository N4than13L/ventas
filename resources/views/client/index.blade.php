@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Clientes</h3>
                        <a class="btn btn-success" href="{{ route('client.add') }}"><i class="fa-solid fa-plus"></i></a>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">direccion</th>
                                <th scope="col">telefono</th>
                                <th scope="col">email</th>
                                <th scope="col">apodo</th>
                                <th scope="col">producto</th>
                                <th scope="col">credit/contado</th>
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($client as $clients)
                                @if ($user->id == $clients->users_id)
                                    <tr>
                                        <td scope="row">{{ $clients->id }}</td>
                                        <td scope="row">{{ $clients->fullname }}</td>
                                        <td scope="row">{{ $clients->address }}</td>
                                        <td scope="row">{{ $clients->phone }}</td>

                                        <td scope="row">{{ $clients->email }}</td>

                                        <td scope="row">{{ $clients->nick }}</td>
                                        <td scope="row">{{ $clients->products->name }}</td>
                                        <td scope="row">{{ $clients->account->name }}</td>
                                        <td scope="row">{{ $clients->created_at }}</td>


                                        <td scope="row">
                                            <a href="{{ route('client.edit', ['id' => $clients->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('client.delete', ['id' => $clients->id]) }}"
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
