<x-Empleado>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Panadería</title>

        <div class="panaderia-card">
            <h1 class="panaderia-title">Panadería</h1>

            <div class="boton-contenedor">
                <a href="{{ route('panaderia.create') }}" class="boton-nuevo">Nuevo producto</a>
            </div>

            <!-- Lista de productos -->
            <div class="productos-contenedor">
                <h2 class="productos-titulo">Nuestros productos</h2>
                <ul class="productos-lista">
                    @foreach ($productos as $producto)
                        @if ($producto->categoria_id == 1)
                            <li class="producto-item">
                                <div>
                                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                    class="w-16 h-16 rounded-full">
                                    <a href="{{ route('panaderia.show', $producto) }}" class="producto-link">
                                        {{ $producto->nombre }}
                                    </a>
                                </div>

                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Paginación (comentada) -->
            {{--
    <div class="">
        {{ $posts->links() }}
    </div>
    --}}
            <style>
                body {
                    background-color: #EEDBC0;
                    /* Fondo cálido tipo café claro */
                    font-family: 'Merriweather', serif;
                }

                .panaderia-card {
                    max-width: 420px;
                    margin: 60px auto;
                    background-color: #b3926d;
                    /* Fondo del contenedor, tipo café medio */
                    padding: 30px 25px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                    color: #fff;
                }

                .panaderia-title {
                    font-size: 28px;
                    font-weight: bold;
                    color: #2e1f12;
                    margin-bottom: 25px;
                    text-align: left;
                }

                .boton-contenedor {
                    text-align: center;
                    margin-bottom: 30px;
                }

                .boton-nuevo {
                    background-color: #83502b;
                    color: white;
                    border: none;
                    padding: 0.6rem 1.5rem;
                    border-radius: 8px;
                    font-weight: bold;
                    font-size: 1rem;
                    cursor: pointer;
                    box-shadow: 0 4px 0 #6b3e22;
                    transition: background-color 0.3s;
                }

                .boton-nuevo:hover {
                    background-color: #6c3f20;
                }

                .productos-contenedor {
                    background-color: #f6e4c8;
                    padding: 20px;
                    border-radius: 8px;
                }

                .productos-titulo {
                    font-size: 20px;
                    font-weight: bold;
                    color: #3b2b1f;
                    margin-bottom: 15px;
                    text-align: left;
                }

                .productos-lista {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                }

                .producto-item {
                    background-color: #ede0d4;
                    color: #3b2b1f;
                    padding: 10px 15px;
                    border-radius: 6px;
                    margin-bottom: 10px;
                    text-align: left;
                }

                .producto-link {
                    text-decoration: none;
                    color: inherit;
                    font-weight: 500;
                }

                .producto-link:hover {
                    color: #83502b;
                }
                @media (max-width: 768px) {
            .panaderia-card {
                margin: 30px 16px;
                padding: 20px;
            }

            .panaderia-title {
                font-size: 22px;
                text-align: center;
            }

            .productos-titulo {
                font-size: 18px;
                text-align: center;
            }

            .boton-nuevo {
                width: 100%;
                font-size: 1rem;
                padding: 0.75rem;
            }

            .producto-item {
                padding: 12px;
                font-size: 0.95rem;
            }
        }
            </style>

    </html>
</x-Empleado>
