<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Panadería y Repostería</title>
</head>
<body>
    <header>
        <nav>
            <a href="/dashboard">
                <div class="logo">
                    <img src="{{ asset('images/logoconnegro.png') }}" alt="Logo">
                </div>
            </a>
            <ul class="nav-links">
                <li>
                    <a href="{{ route('reposteria') }}">Repostería</a>
                </li>
                <li>
                    <a href="{{ route('panaderia') }}">Panadería</a>
                </li>
            </ul>
            @auth
            <div class="user-info">
                <p>{{ Auth::user()->nombre }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Cerrar sesión</button>
                </form>
            </div>
            @endauth
            <div>
                {{-- Aquí puedes agregar un botón de inicio de sesión si es necesario --}}
            </div>
        </nav>
    </header>
</body>
<style>
        body {
            font-family: 'Merriweather', serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(214, 192, 160); /* Color café */
            font-size: 18px; /* text-lg */
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 96px; /* h-24 */
            padding: 0 16px; /* px-4 */
        }

        .logo img {
            width: 120px; /* Ajusta el tamaño según sea necesario */
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px; /* gap-2 */
            padding: 0;
            margin: 0;
            list-style: none;
            flex-grow: 1; /* Permite que ocupe el espacio disponible */
            justify-content: center; /* Centra los enlaces */
        }

        .nav-links li {
            list-style: none;
        }

        .nav-links a {
            padding: 0 40px; /* px-10 */
            margin: 0 20px; /* mx-5 */
            border-left: 1px solid black; /* border-x-1 */
            border-right: 1px solid black; /* border-x-1 */
            text-decoration: none;
            color: black;
        }

        .nav-links a:hover {
            color: gray; /* hover:text-gray-500 */
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-left: auto; /* Empuja el bloque de usuario al margen derecho */
        }

        .logout-button {
            margin-left: 10px; /* Espaciado entre el nombre y el botón */
            background-color: #83502b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            box-shadow: inset 0 -2px 0 rgba(0,0,0,0.2);
            transition: 0.3s ease;
            border: none; /* Elimina el borde del botón */
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
        }
        @media (max-width: 768px) {
        nav {
            flex-direction: column;
            height: auto;
            padding: 10px 16px;
            gap: 10px;
        }

        .nav-links {
            justify-content: center;
            flex-direction: column;
            gap: 12px;
        }

        .nav-links a {
            margin: 0;
            padding: 10px;
            border: none;
            border-bottom: 1px solid black;
        }

        .user-info {
            justify-content: center;
            margin: 10px 0 0 0;
            width: 100%;
        }

        .logout-button {
            width: 100%;
            text-align: center;
        }
        }
    </style>
</html>
