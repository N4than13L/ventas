@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Agregar la cuenta</h3>
                        <a class="btn btn-success" href="{{ route('account.add') }}"><i class="fa-solid fa-plus"></i></a>
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
                                <th scope="col">Fecha de creación</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($account as $accounts)
                                @if ($user->id == $accounts->users_id)
                                    <tr>
                                        <td scope="row">{{ $accounts->id }}</td>
                                        <td scope="row">{{ $accounts->name }}</td>
                                        <td scope="row">{{ $accounts->created_at }}</td>
                                        <td scope="row">
                                            <a href="{{ route('account.edit', ['id' => $accounts->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('account.delete', ['id' => $accounts->id]) }}"
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
