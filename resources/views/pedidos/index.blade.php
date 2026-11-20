@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            Tienditas el mañana se fia hoy no.
            &nbsp;
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Pedido
            </button>

            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulario Pedido</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="cliente_id" class="form-label">ID Cliente</label>
                                    <input type="number" class="form-control" id="cliente_id" value="{{ old('cliente_id') }}" name="cliente_id" min="1" placeholder="1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="empleado_id" class="form-label">ID Empleado</label>
                                    <input type="number" class="form-control" id="empleado_id" value="{{ old('empleado_id') }}" name="empleado_id" min="1" placeholder="1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="numero_pedido" class="form-label">Número Pedido</label>
                                    <input type="text" class="form-control" id="numero_pedido" value="{{ old('numero_pedido') }}" name="numero_pedido" maxlength="20" placeholder="PED-001" required>
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_pedido" class="form-label">Fecha Pedido</label>
                                    <input type="date" class="form-control" id="fecha_pedido" value="{{ old('fecha_pedido') }}" name="fecha_pedido" required>
                                </div>

                                <div class="mb-3">
                                    <label for="fecha_entrega" class="form-label">Fecha Entrega</label>
                                    <input type="date" class="form-control" id="fecha_entrega" value="{{ old('fecha_entrega') }}" name="fecha_entrega" required>
                                </div>

                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="number" class="form-control" id="total" value="{{ old('total') }}" name="total" min="0" step="0.01" placeholder="100.00" required>
                                </div>

                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-select" id="estado" name="estado" required>
                                        <option value="pendiente" @selected(old('estado', 'pendiente') == 'pendiente')>Pendiente</option>
                                        <option value="procesando" @selected(old('estado') == 'procesando')>Procesando</option>
                                        <option value="enviado" @selected(old('estado') == 'enviado')>Enviado</option>
                                        <option value="entregado" @selected(old('estado') == 'entregado')>Entregado</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="observaciones" class="form-label">Observaciones</label>
                                    <input type="text" class="form-control" id="observaciones" value="{{ old('observaciones') }}" name="observaciones" maxlength="25" placeholder="Entrega a domicilio" required>
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

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Se encontraron los siguientes errores:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">ID Cliente</th>
                        <th scope="col">ID Empleado</th>
                        <th scope="col">Número Pedido</th>
                        <th scope="col">Fecha Pedido</th>
                        <th scope="col">Fecha Entrega</th>
                        <th scope="col">Total</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $pedido)
                        <tr>
                            <th scope="row">{{ $pedido->id }}</th>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td>{{ $pedido->empleado_id }}</td>
                            <td>{{ $pedido->numero_pedido }}</td>
                            <td>{{ $pedido->fecha_pedido }}</td>
                            <td>{{ $pedido->fecha_entrega }}</td>
                            <td>{{ $pedido->total }}</td>
                            <td>{{ $pedido->estado }}</td>
                            <td>{{ $pedido->observaciones }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Acciones del pedido">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update{{ $pedido->id }}">
                                        Actualizar
                                    </button>

                                    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <!-- Modal -->
                                        <div class="modal fade" id="update{{ $pedido->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateLabel{{ $pedido->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="updateLabel{{ $pedido->id }}">Formulario Pedido</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="cliente_idu{{ $pedido->id }}" class="form-label">ID Cliente</label>
                                                            <input type="number" class="form-control" id="cliente_idu{{ $pedido->id }}" value="{{ old('cliente_id', $pedido->cliente_id) }}" name="cliente_id" min="1" placeholder="1" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="empleado_idu{{ $pedido->id }}" class="form-label">ID Empleado</label>
                                                            <input type="number" class="form-control" id="empleado_idu{{ $pedido->id }}" value="{{ old('empleado_id', $pedido->empleado_id) }}" name="empleado_id" min="1" placeholder="1" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="numero_pedidou{{ $pedido->id }}" class="form-label">Número Pedido</label>
                                                            <input type="text" class="form-control" id="numero_pedidou{{ $pedido->id }}" value="{{ old('numero_pedido', $pedido->numero_pedido) }}" name="numero_pedido" maxlength="20" placeholder="PED-001" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fecha_pedidou{{ $pedido->id }}" class="form-label">Fecha Pedido</label>
                                                            <input type="date" class="form-control" id="fecha_pedidou{{ $pedido->id }}" value="{{ old('fecha_pedido', $pedido->fecha_pedido) }}" name="fecha_pedido" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="fecha_entregau{{ $pedido->id }}" class="form-label">Fecha Entrega</label>
                                                            <input type="date" class="form-control" id="fecha_entregau{{ $pedido->id }}" value="{{ old('fecha_entrega', $pedido->fecha_entrega) }}" name="fecha_entrega" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="totalu{{ $pedido->id }}" class="form-label">Total</label>
                                                            <input type="number" class="form-control" id="totalu{{ $pedido->id }}" value="{{ old('total', $pedido->total) }}" name="total" min="0" step="0.01" placeholder="100.00" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="estadou{{ $pedido->id }}" class="form-label">Estado</label>
                                                            <select class="form-select" id="estadou{{ $pedido->id }}" name="estado" required>
                                                                <option value="pendiente" @selected(old('estado', $pedido->estado) == 'pendiente')>Pendiente</option>
                                                                <option value="procesando" @selected(old('estado', $pedido->estado) == 'procesando')>Procesando</option>
                                                                <option value="enviado" @selected(old('estado', $pedido->estado) == 'enviado')>Enviado</option>
                                                                <option value="entregado" @selected(old('estado', $pedido->estado) == 'entregado')>Entregado</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="observacionesu{{ $pedido->id }}" class="form-label">Observaciones</label>
                                                            <input type="text" class="form-control" id="observacionesu{{ $pedido->id }}" value="{{ old('observaciones', $pedido->observaciones) }}" name="observaciones" maxlength="25" placeholder="Entrega a domicilio" required>
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

                                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">No hay registros de pedidos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
