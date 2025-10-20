<style>
    body {}

    /* Contenedor general */
    .registro-empleados-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 100px;
        margin-bottom: 100px;
    }

    /* Caja del formulario */
    .registro-empleados-card {
        background-color: #d6c1a5;
        /* tono similar al login */
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        width: 320px;
    }

    /* Título */
    .registro-empleados-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        text-align: center;
        color: #4b2e1e;
    }

    /* Formulario */
    .registro-empleados-form {
        display: flex;
        flex-direction: column;
    }

    /* Grupo de cada input */
    .registro-empleados-group {
        margin-bottom: 12px;
    }

    /* Label */
    .registro-empleados-label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #4b2e1e;
    }

    /* Input */
    .registro-empleados-input {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #b28a68;
        border-radius: 4px;
        background-color: #fff6ec;
        font-size: 14px;
        color: #333;
    }

    /* Botón */
    .registro-empleados-actions {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .registro-empleados-btn {
        background-color: #8b5e3c;
        color: #fff;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .registro-empleados-btn:hover {
        background-color: #6d472c;
    }

    .btn-home {
        display: inline-block;
        background-color: #8b5e3c;
        /* mismo tono que el botón de registrar */
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-home:hover {
        background-color: #6d472c;
    }

    .text-danger {
        color: red;
    }
</style>

<a href="{{ route('home') }}" class="btn-home">De vuelta al inicio</a>

<div class="registro-empleados-container">


    <div class="registro-empleados-card">
        <h2 class="registro-empleados-title">Registro de empleados</h2>

        <form method="POST" action="{{ route('register.submit') }}" class="registro-empleados-form">
            @csrf

            <div class="registro-empleados-group">
                <label class="registro-empleados-label">Nombre <span class="text-danger">*</span></label>
                <input type="text" name="nombre" class="registro-empleados-input" value="{{ old('nombre') }}"
                    required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="registro-empleados-group">
                <label class="registro-empleados-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="registro-empleados-input" value="{{ old('email') }}"
                    required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="registro-empleados-group">
                <label class="registro-empleados-label">Contraseña <span class="text-danger">*</span></label>
                <input type="password" name="password" class="registro-empleados-input" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="registro-empleados-group">
                <label class="registro-empleados-label">Confirmar Contraseña <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" class="registro-empleados-input" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="registro-empleados-actions">
                <button type="submit" class="registro-empleados-btn">Registrar</button>
            </div>
        </form>
    </div>
</div>

<x-Footer>
</x-Footer>
