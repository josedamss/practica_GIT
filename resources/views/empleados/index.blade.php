@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Empleado
            </button>

            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Empleados</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_empleado" class="form-label">Codigo Empleados</label>
                                    <input type="text" class="form-control" id="codigo_empleado" value="{{old('codigo_empleado')}}" name="codigo_empleado" placeholder="E-001">
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
                                    <label for="cargo" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="cargo" value="{{old('cargo')}}" name="cargo" placeholder="Supervisor">
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_contratacion" class="form-label">Fecha_Contratacion</label>
                                    <input type="text" class="form-control" id="fecha_contratacion" value="{{old('fecha_contratacion')}}" name="fecha_contratacion" placeholder="09-10-2005">
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estado" value="{{old('estado')}}" name="estado" placeholder="activo/inactivo">
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

                <div class= "alert alert danger alert-dismissible fade show">
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
                <th scope="col">Cargo</th>
                <th scope="col">Fecha_Contratacion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($empleados as $empleado)
                <tr>
                    <th scope="row">{{ $empleado->id }}</th>
                    <td>{{ $empleado->codigo_empleado }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellido }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->fecha_contratacion }}</td>
                    <td>{{ $empleado->estado }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$empleado->id}}">
                Actualizar
            </button>

            <form action="{{ route('empleados.update',$empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Modal -->
                <div class="modal fade" id="update{{$empleado->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Empleado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_empleadou" class="form-label">Codigo Empleado</label>
                                    <input type="text" class="form-control" id="codigo_clienteu" value="{{old('codigo_cliente',$empleado->codigo_empleado)}}" name="codigo_empleado" placeholder="E-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombreu" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreu" value="{{old('nombre',$empleado->nombre)}}" name="nombre" placeholder="Jose">
                                </div>

                                <div class="mb-3">
                                    <label for="apellidou" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellidou" value="{{old('apellido',$empleado->apellido)}}" name="apellido" placeholder="Damas">
                                </div>

                                <div class="mb-3">
                                    <label for="emailu" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailu" value="{{old('email',$empleado->email)}}" name="email" placeholder="name@example.com">
                                </div>

                                <div class="mb-3">
                                    <label for="cargou" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="cargou" value="{{old('cargo',$empleado->cargo)}}" name="cargo" placeholder="Ganador">
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_contratacionu" class="form-label">Fecha_Contratacion</label>
                                    <input type="text" class="form-control" id="fecha_contratacion" value="{{old('fecha_contratacion',$empleado->fecha_contratacion)}}" name="fecha_contratacion" placeholder="01-01-2004">
                                </div>

                                <div class="mb-3">
                                    <label for="estadou" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estadou" value="{{old('estado',$empleado->estado)}}" name="estado" placeholder="activo">
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


                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">NO HAY registros de Empleados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
