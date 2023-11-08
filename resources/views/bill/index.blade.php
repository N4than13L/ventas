@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Agregar Supllidres</h3>
                        <a class="btn btn-success" href="{{ route('bill.add') }}"><i class="fa-solid fa-plus"></i></a>
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
                                <th scope="col">Attendido por</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Producto</th>
                                <th scope="col">tipo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($bill as $bills)
                                @if ($user->id == $bills->users_id)
                                    <tr>
                                        <td scope="row">{{ $bills->id }}</td>
                                        <td scope="row">{{ $bills->attendedby }}</td>
                                        <td scope="row">{{ $bills->volume }}</td>
                                        <td scope="row">{{ $bills->clients->fullname }}</td>
                                        <td scope="row">{{ $bills->clients->products->name }}</td>
                                        <td scope="row">{{ $bills->clients->products->type }}</td>
                                        <td scope="row">{{ $bills->clients->products->color }}</td>

                                        <td scope="row">
                                            <a href="{{ route('supplier.edit', ['id' => $bills->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('supplier.delete', ['id' => $bills->id]) }}"
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
