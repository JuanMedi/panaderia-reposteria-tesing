<x-Empleado>
    <h1>Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Fecha de Entrega</th>
                <th>Dirección</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                @php $detalle = $pedido->detalles->first(); @endphp
                <tr>
                    <td>{{ $pedido->cliente->nombre }}</td>
                    <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                    <td>{{ $pedido->fecha_entrega }}</td>
                    <td>{{ $pedido->direccion_entrega }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td class="actions">
                        @if($pedido->estado === 'pendiente')
                            <form action="{{ route('pedidos.aceptar', $pedido->id) }}" method="POST">
                                @csrf @method('PUT')
                                <button type="submit" class="button accept">Aceptar</button>
                            </form>
                            <form action="{{ route('pedidos.rechazar', $pedido->id) }}" method="POST">
                                @csrf @method('PUT')
                                <button type="submit" class="button reject">Rechazar</button>
                            </form>
                        @elseif($pedido->estado === 'rechazado')
                            <form action="{{ route('pedidos.aceptar', $pedido->id) }}" method="POST">
                                @csrf @method('PUT')
                                <button type="submit" class="button accept">Aceptar</button>
                            </form>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="button delete">Eliminar</button>
                            </form>
                        @else
                            <span class="text-muted">Sin acciones</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            border: 1px solid #e5e7eb;
        }

        thead {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 8px 16px;
            border: 1px solid #e5e7eb;
            text-align: left;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .button {
            padding: 4px 12px;
            font-size: 0.875rem;
            border-radius: 4px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .accept {
            background-color: #22c55e;
        }

        .reject {
            background-color: #f59e0b;
        }

        .delete {
            background-color: #dc2626;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .text-muted {
            color: #4b5563;
        }
        @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        thead {
            display: none; /* Ocultamos encabezado en móviles */
        }

        tr {
            margin-bottom: 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background-color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: right;
            position: relative;
        }

        td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 10px;
            font-weight: bold;
            color: #374151;
            text-align: left;
        }

        .actions {
            justify-content: center;
        }
        }
    </style>
</x-Empleado>
