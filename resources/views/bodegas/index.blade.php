@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Bodega
            </button>

            <form action="{{ route('bodegas.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Bodega</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_bodega" class="form-label">Codigo Bodega</label>
                                    <input type="text" class="form-control" id="codigo_bodega" value="{{old('codigo_bodega')}}" name="codigo_bodega" placeholder="B-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Metal">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" value="{{old('descripcion')}}" name="descripcion" placeholder="Metales">
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
                <th scope="col">Codigo Bodega</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($bodegas as $bodega)
                <tr>
                    <th scope="row">{{ $bodega->id }}</th>
                    <td>{{ $bodega->codigo_bodega }}</td>
                    <td>{{ $bodega->nombre }}</td>
                    <td>{{ $bodega->descripcion }}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$bodega->id}}">
                Actualizar
            </button>

            <form action="{{ route('bodegas.update',$bodega->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Modal -->
                <div class="modal fade" id="update{{$bodega->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Bodega</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="codigo_bodegau" class="form-label">Codigo Bodega</label>
                                    <input type="text" class="form-control" id="codigo_bodegau" value="{{old('codigo_bodega',$bodega->codigo_bodega)}}" name="codigo_bodega" placeholder="B-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombreu" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreu" value="{{old('nombre',$bodega->nombre)}}" name="nombre" placeholder="Metal">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcionu" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcionu" value="{{old('descripcion',$bodega->descripcion)}}" name="descripcion" placeholder="Metales">
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


                            <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">NO HAY registros de bodegas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
