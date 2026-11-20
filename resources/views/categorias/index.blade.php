@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Categoria
            </button>

            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Categorias</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Jabones">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" value="{{old('descripcion')}}" name="descripcion" placeholder="Jabones liquido">
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

    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <th scope="row">{{ $categoria->id }}</th>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->estado }}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$categoria->id}}">
                Actualizar
            </button>

            <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Modal -->
                <div class="modal fade" id="update{{$categoria->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Categoria</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombreu" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreu" value="{{old('nombre',$categoria->nombre)}}" name="nombre" placeholder="Lijas">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcionu" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcionu" value="{{old('descripcion',$categoria->descripcion)}}" name="descripcion" placeholder="Metales">
                                </div>

                                <div class="mb-3">
                                    <label for="estadou" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estadou" value="{{old('estado',$categoria->estado)}}" name="estado" placeholder="activo">
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


                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">No hay registros de categorias</td>
                </tr>
            @endforelse
        </tbody>
    </table>



@endsection
