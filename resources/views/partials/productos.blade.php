{{-- resources/views/partials/productos.blade.php --}}
@foreach ($productos as $producto)
    <div class="producto">
        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
        <h3 class="titulo_tarjeta">{{ $producto->nombre }}</h3>
        <p class="precio">${{ number_format($producto->precio, 0, ',', '.') }}</p>
        <a href="{{route('reposteria.show', $producto)}}" class="btn">Comprar Ahora</a>
    </div>
@endforeach
