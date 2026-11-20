@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Producto
            </button>

            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="categoria_id" class="form-label">ID Categoria</label>
                                    <input type="text" class="form-control" id="categoria_id" value="{{old('categoria_id')}}" name="categoria_id" placeholder="15">
                                </div>

                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Codigo Producto</label>
                                    <input type="text" class="form-control" id="codigo" value="{{old('codigo')}}" name="codigo" placeholder="P-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Metal">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion" value="{{old('descripcion')}}" name="descripcion" placeholder="Metales">
                                </div>

                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="precio" value="{{old('precio')}}" name="precio" placeholder="10,000 Lps">
                                </div>

                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="text" class="form-control" id="stock" value="{{old('stock')}}" name="stock" placeholder="1">
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
                <th scope="col">Id_Categoria</th>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <th scope="row">{{ $producto->categoria_id }}</th>
                    <td>{{ $producto->codigo }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->estado }}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{$producto->id}}">
                Actualizar
            </button>

            <form action="{{ route('productos.update',$producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Modal -->
                <div class="modal fade" id="update{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="categoria_idu" class="form-label">ID Categoria</label>
                                    <input type="text" class="form-control" id="categoria_idu" value="{{old('categoria_id',$producto->categoria_id)}}" name="categoria_id" placeholder="15">
                                </div>

                                <div class="mb-3">
                                    <label for="codigou" class="form-label">Codigo Producto</label>
                                    <input type="text" class="form-control" id="codigou" value="{{old('codigo',$producto->codigo)}}" name="codigo" placeholder="P-001">
                                </div>

                                <div class="mb-3">
                                    <label for="nombreu" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreu" value="{{old('nombre',$producto->nombre)}}" name="nombre" placeholder="Metal">
                                </div>

                                <div class="mb-3">
                                    <label for="descripcionu" class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcionu" value="{{old('descripcion',$producto->descripcion)}}" name="descripcion" placeholder="Metales">
                                </div>

                                <div class="mb-3">
                                    <label for="preciou" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="preciou" value="{{old('precio',$producto->precio)}}" name="precio" placeholder="10,000 Lps">
                                </div>

                                <div class="mb-3">
                                    <label for="stocku" class="form-label">Stock</label>
                                    <input type="text" class="form-control" id="stocku" value="{{old('stock',$producto->stock)}}" name="stock" placeholder="1">
                                </div>

                                <div class="mb-3">
                                    <label for="estadou" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estadou" value="{{old('estado',$producto->estado)}}" name="estado" placeholder="activo/inactivo">
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


                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">NO HAY registros de Productos</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
