<x-Empleado>
    <!-- Encabezado -->
    <div class="form-wrapper">
        <h1>Editar Producto</h1>
        <h2>Panadería</h2>

        <!-- Formulario -->
        {{-- Validación de errores --}}
        @if ($errors->any())
            <div class="error-box">
                <h2 class="font-bold">Errores:</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="Form">
            <form action="{{ route('panaderia.update', $producto) }}" method="POST" class="formulario"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}"
                    placeholder="Ingrese el nombre del producto">
                @error('nombre')
                    <p class="mensaje-error">{{ $message }}</p>
                @enderror

                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $producto->slug) }}"
                    placeholder="Ingrese el slug del producto">
                @error('slug')
                    <p class="mensaje-error">{{ $message }}</p>
                @enderror

                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ingrese una descripción del producto">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="mensaje-error">{{ $message }}</p>
                @enderror

                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" value="{{ old('precio', $producto->precio) }}"
                    placeholder="Ingrese el precio del producto">
                @error('precio')
                    <p class="mensaje-error">{{ $message }}</p>
                @enderror
                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                    <input type="file" name="imagen" id="imagen" accept="image/*"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" />
                    @if ($producto->imagen)
                        <div class="mt-2">
                            <img src="{{ asset($producto->imagen) }}" alt="Imagen actual del producto"
                                class="w-32 h-32 object-cover rounded-lg">
                            <p class="text-sm text-gray-500 mt-1">Imagen actual</p>
                        </div>
                    @endif
                    @error('imagen')
                        <p class="mensaje-error">{{ $message }}</p>
                    @enderror
                </div>
                <label for="categoria_id">Categoría</label>
                <select name="categoria_id" id="categoria_id">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="mensaje-error">{{ $message }}</p>
                @enderror

                <!-- Botón -->
                <div class="button-container">
                    <button type="submit">Editar Producto</button>
                </div>
            </form>
        </div>
        <style>
            body {
                background-color: #EEDBC0;
                font-family: 'Merriweather', serif;
                margin: 0;
                padding: 0;
            }

            .form-wrapper {
                background-color: #b3926d;
                border-radius: 12px;
                padding: 3rem;
                max-width: 800px;
                /* más ancho */
                width: 90%;
                margin: 3rem auto;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
                color: #3b2200;
            }

            .form-wrapper button {
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

            .form-wrapper button:hover {
                background-color: #6c3f20;
            }


            .form-wrapper h1,
            .form-wrapper h2 {
                margin: 0;
                text-align: center;
            }

            .form-wrapper h1 {
                font-size: 2rem;
                margin-bottom: 0.5rem;
            }

            .form-wrapper h2 {
                font-size: 1.3rem;
                margin-bottom: 2rem;
            }

            .Form {
                background-color: #f6e4c8;
                padding: 1.5rem;
                border-radius: 12px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 0.3rem;
                color: #3b2200;
            }

            input[type="text"],
            input[type="number"],
            textarea,
            select {
                width: 100%;
                padding: 0.6rem;
                margin-bottom: 1rem;
                border: none;
                border-radius: 8px;
                background-color: #f7ede5;
                font-size: 1rem;
                font-family: inherit;
            }

            input:focus,
            textarea:focus,
            select:focus {
                outline: 2px solid #a05c2c;
            }

            .error-message {
                color: #b91c1c;
                font-size: 0.875rem;
                margin-top: -0.5rem;
                margin-bottom: 1rem;
            }

            .button-container {
                text-align: center;
            }

            button {
                background-color: #83502b;
                color: white;
                border: none;
                padding: 0.6rem 1.5rem;
                border-radius: 8px;
                font-weight: bold;
                font-size: 1rem;
                cursor: pointer;
                box-shadow: 0 4px 0 #6b3e22;
                transition: 0.3s;
            }

            button:hover {
                background-color: #6c3f20;
            }

            .error-box {
                background-color: #fef2f2;
                border: 1px solid #f87171;
                color: #b91c1c;
                padding: 1rem;
                border-radius: 0.375rem;
                margin-bottom: 1rem;
            }
            @media (max-width: 768px) {
            .form-wrapper {
                padding: 1.5rem;
                margin: 2rem 1rem;
            }

            .Form {
                padding: 1rem;
            }

            .form-wrapper h1 {
                font-size: 1.5rem;
            }

            .form-wrapper h2 {
                font-size: 1.1rem;
            }

            input[type="text"],
            input[type="number"],
            textarea,
            select {
                font-size: 1rem;
            }

            button,
            .form-wrapper button {
                width: 100%;
                font-size: 1rem;
                padding: 0.75rem 1rem;
            }
        }
        </style>
</x-Empleado>
