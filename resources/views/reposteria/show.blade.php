<x-Empleado>
    <!-- Encabezado -->
    <div class="encabezado-producto">
        <h1 class="titulo-producto">Producto</h1>
        <div class="volver-btn">
            <a href="{{ route('reposteria') }}">Volver</a>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="producto-card">
        <div class="info-producto">
            <h2 class="producto-nombre">Nombre: {{ $producto->nombre }}</h2>
            <p class="producto-descripcion">{{ $producto->descripcion }}</p>

            <div class="producto-imagen-contenedor">
                <img
                    src="{{ asset($producto->imagen) }}"
                    alt="Imagen del producto"
                    class="producto-imagen"
                />
            </div>

            <p class="producto-precio">Precio: ${{ $producto->precio }}</p>
        </div>

        <!-- Acciones -->
        <div class="acciones-producto">
            <a href="{{ route('reposteria.edit', $producto) }}" class="btn-editar">Editar Producto</a>

            <form action="{{ route('reposteria.destroy', $producto) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-eliminar">Eliminar Producto</button>
            </form>
        </div>
    </div>

    <style>
        body {
            background-color: #EEDBC0;
            font-family: 'Merriweather', serif;
            margin: 0;
            padding: 0;
        }

        .encabezado-producto {
            
            padding: 30px 20px;
            text-align: center;
            position: relative;
        }

        .titulo-producto {
            font-size: 32px;
            font-weight: bold;
            color: #3e2a1f;
        }

        .volver-btn {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .volver-btn a {
            position: absolute;
            top: 20px;
            left: -123px; /* antes: 20px */
            font-size: 14px;
            font-weight: bold;
            color: #83502b;
            background-color: #f6e4c8;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            box-shadow: inset 0 -2px 0 rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .volver-btn a:hover {
            background-color: #d9c1a5;
            color: #5e3520;
        }

        .producto-card {
            max-width: 720px;
            margin: 40px auto;
            background-color: #b3926d;
            color: #3e2a1f;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        .info-producto {
            background-color: #f6e4c8;
            margin-bottom: 30px;
            padding: 1.5rem;
            border-radius: 12px;
        }

        .producto-nombre {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .producto-descripcion {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .producto-imagen-contenedor {
            text-align: center;
            margin-bottom: 20px;
        }

        .producto-imagen {
            max-width: 280px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .producto-precio {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .acciones-producto {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .btn-editar,
        .btn-eliminar {
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            transition: background 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: white;
            display: inline-block;
            box-shadow: inset 0 -2px 0 rgba(0,0,0,0.2);
        }

        .btn-editar {
            background-color: #b57e1e;
        }

        .btn-editar:hover {
            background-color: #a06713;
        }

        .btn-eliminar {
            background-color: #a03c3c;
            border: none;
        }

        .btn-eliminar:hover {
            background-color: #7a1e1e;
        }
        @media (max-width: 768px) {
        .titulo-producto {
            font-size: 26px;
        }

        .volver-btn {
            position: static;  /* quita absolute */
            margin-top: 10px;  /* separa un poco del título */
            text-align: center; /* si quieres centrar el botón */
        }

        .volver-btn a {
            position: static;
            display: inline-block;
            margin: 0 auto;
            left: auto;
            top: auto;
            box-shadow: inset 0 -2px 0 rgba(0,0,0,0.1);
        }


        .encabezado-producto {
            padding: 20px 15px;
            text-align: center;
        }

        .producto-card {
            max-width: 90%;
            padding: 20px;
            margin: 30px auto;
        }

        .producto-nombre {
            font-size: 22px;
        }

        .producto-descripcion {
            font-size: 15px;
        }

        .producto-imagen {
            max-width: 220px;
        }

        .producto-precio {
            font-size: 18px;
        }

        .acciones-producto {
            flex-direction: column;
            gap: 12px;
        }

        .btn-editar,
        .btn-eliminar {
            width: 100%;
            padding: 12px 0;
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .titulo-producto {
            font-size: 22px;
        }

        .encabezado-producto {
            padding: 15px 10px;
        }

        .producto-card {
            padding: 15px 15px;
            margin: 20px auto;
        }

        .producto-nombre {
            font-size: 20px;
        }

        .producto-imagen {
            max-width: 180px;
        }

        .producto-precio {
            font-size: 16px;
        }

        .btn-editar,
        .btn-eliminar {
            font-size: 14px;
            padding: 10px 0;
        }
    }
    </style>
</x-Empleado>
