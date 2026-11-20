@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Cliente / {{$clientes_count}}
            </button>

            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Clientes</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_cliente" class="form-label">Codigo Cliente</label>
                                    <input type="text" class="form-control" id="codigo_cliente" value="{{old('codigo_cliente')}}" name="codigo_cliente" placeholder="C-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Jose">
                                </div>

                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" value="{{old('apellido')}}" name="apellido" placeholder="Damas">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="name@example.com">
                                </div>

                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" value="{{old('telefono')}}" name="telefono" placeholder="8888-9999">
                                </div>

                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" value="{{old('direccion')}}" name="direccion" placeholder="Tu casa">
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estado" value="{{old('estado')}}" name="estado" placeholder="activo">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class = "card">
        <div class = "card-body">

            @if($errors->any())

                <div class= "alert alert-danger alert-dismissible fade show">
                    <strong> Se encontraron los siguientes errores: </strong>

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>

                        @endforeach

                    </ul>

                    <button type="button" class="btn-close" data-bs-dismiss="alert">

                    </button>


                </div>
            @endif





    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->codigo_cliente }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->estado }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$cliente->id}}">
                Actualizar
            </button>

            <form action="{{ route('clientes.update',$cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Modal -->
                <div class="modal fade" id="update{{$cliente->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Clientes</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_clienteu" class="form-label">Codigo Cliente</label>
                                    <input type="text" class="form-control" id="codigo_clienteu" value="{{old('codigo_cliente',$cliente->codigo_cliente)}}" name="codigo_cliente" placeholder="C-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombreu" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreu" value="{{old('nombre',$cliente->nombre)}}" name="nombre" placeholder="Jose">
                                </div>

                                <div class="mb-3">
                                    <label for="apellidou" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellidou" value="{{old('apellido',$cliente->apellido)}}" name="apellido" placeholder="Damas">
                                </div>

                                <div class="mb-3">
                                    <label for="emailu" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailu" value="{{old('email',$cliente->email)}}" name="email" placeholder="name@example.com">
                                </div>

                                <div class="mb-3">
                                    <label for="telefonou" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefonou" value="{{old('telefono',$cliente->telefono)}}" name="telefono" placeholder="8888-9999">
                                </div>

                                <div class="mb-3">
                                    <label for="direccionu" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccionu" value="{{old('direccion',$cliente->direccion)}}" name="direccion" placeholder="Tu casa">
                                </div>

                                <div class="mb-3">
                                    <label for="estadou" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estadou" value="{{old('estado',$cliente->estado)}}" name="estado" placeholder="activo">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">NO HAY registros de Clientes</td>
                </tr>
            @endforelse
        </tbody>
    </table>

        </div>
    </div>
@endsection
