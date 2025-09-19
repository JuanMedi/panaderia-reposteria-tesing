<x-Layout>
    <!-- Encabezado -->
    <div class="encabezado-producto">
        <h1 class="titulo-producto">Producto</h1>
        <div class="volver-btn">
            <a href="{{ route('reposteria') }}">Volver</a>
        </div>
    </div>

    <div class="container">
        <h2>Nombre: {{ $producto->nombre }}</h2>
        <div class="img-container">
            <img src="{{ asset($producto->imagen) }}" class="imagen"alt="Imagen del producto" />
        </div>
        <p class="description">{{ $producto->descripcion }}</p>
        <p class="price">Precio: ${{ $producto->precio }}</p>
    </div>

    <form action="{{ route('pedido.store', $producto) }}" method="POST" class="container">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu email" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>

        <label for="fecha_entrega">Fecha:</label>
        <input type="date" id="fecha_entrega" name="fecha_entrega" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" min="1" name="cantidad" placeholder="Ingresa la cantidad" required>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" readonly>

        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
        <input type="hidden" name="precio_unitario" value="{{ $producto->precio }}">

        <button type="submit">Realizar Pedido</button>
    </form>

</x-Layout>

<style>
    body {
        font-family: 'Merriweather', serif;
        background-color: #f5e7d3;
        margin: 0;
        padding: 0;
        color: #4b3621;
    }

    .encabezado-producto {
        background-color: #EEDBC0;
        border-radius: 15px;
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
        left: -123px;
        font-size: 14px;
        font-weight: bold;
        color: #83502b;
        background-color: #f6e4c8;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .volver-btn a:hover {
        background-color: #d9c1a5;
        color: #5e3520;
    }


    .header {
        background-color: #fff7eb;
        padding: 30px 20px;
        text-align: center;
        position: relative;
        border-bottom: 2px solid #d6c0a0;
    }

    .header h1 {
        font-size: 36px;
        font-weight: bold;
        margin: 0;
        color: #4b3621;
    }

    .volver {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .volver a {
        color: #c0392b;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .volver a:hover {
        color: #a93226;
    }


    .container {
        max-width: 700px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }


    .container h2 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
    }


    .description {
        font-size: 18px;
        color: #5a4b3c;
        margin-bottom: 20px;
    }


    .img-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        width: 100%;
    }

    .img-container img {
        width: 100%;
        max-width: 300px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }


    .price {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 30px;
    }


    form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        margin-top: 16px;
    }

    form input {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 10px;
        border: 2px solid #8b5e34;
        border-radius: 6px;
        background-color: #f5e3cf;
        font-family: 'Merriweather', serif;
        font-size: 14px;
        box-sizing: border-box;
        color: #4b3621;
    }

    form input:focus {
        border-color: #6b3e26;
        outline: none;
        background-color: #f2d7b6;
    }


    form button {
        background-color: #8b5e34;
        color: #ffffff;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        margin-top: 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #6b3e26;
    }

@media (max-width: 768px) {
    .header h1,
    .titulo-producto {
        font-size: 24px;
    }

    .container {
        padding: 20px;
        margin: 20px;
    }

    .img-container img {
        max-width: 100%;
    }

    .volver-btn a,
    .volver a {
        font-size: 12px;
        padding: 6px 12px;
    }
}

@media (max-width: 480px) {
    .header,
    .encabezado-producto {
        padding: 20px 10px;
    }

    .container h2 {
        font-size: 20px;
    }

    .description {
        font-size: 16px;
    }

    .price {
        font-size: 18px;
    }

    form input,
    form button {
        font-size: 14px;
        padding: 10px;
    }
}
</style>

<script>
    const precio = {{ $producto->precio }};
    document.getElementById('cantidad').addEventListener('input', function() {
        const cantidad = parseInt(this.value) || 0;
        document.getElementById('total').value = (cantidad * precio).toFixed(2);
    });
</script>
