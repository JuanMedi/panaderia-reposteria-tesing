<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Header</title>
</head>
<body>
    <header>
    <nav class="navbar">
        <a href="/">
        <div class="logo">
            <img src="{{ asset('images/logoconnegro.png') }}" alt="Zhandra Araujo Panadería Repostería" class="logo">
        </div>
        </a>
        <ul class="nav-links">
            <li class="dropdown">
                <a href="#" class="dropbtn">Empleados</a>
                <div class="dropdown-content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <label for="username">Usuario:</label>
                        <input type="text" id="username" name="username" placeholder="Usuario">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Contraseña">
                        <button type="submit">Ingresar</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div class="banner">
        <img src="{{ asset('images/banner3.png') }}" alt="Banner" class="banner-img">
        <img src="{{ asset('images/logomama.png') }}" alt="Banner" class="banner-img">
        <img src="{{ asset('images/bagge-roll.png') }}" alt="Banner" class="banner-img">
    </div>
<header>
</body>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Merriweather', serif;
    }


    img {
        width: 55px; /* Ancho fijo */
        height: auto; /* Mantiene la proporción original */
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(214, 192, 160);
        padding: 4px 10px;
        height: 95px; /* ALTURA FIJA */
        box-sizing: border-box;
    }
    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
                width: 130px; /* Ajusta el tamaño según sea necesario */
            }

    .nav-links {
        list-style: none;
        display: flex;
        justify-content: center; /* Centra los elementos */
        align-items: center;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .nav-links li {
        position: relative;
    }

    .nav-links a {
        color: black;
        text-decoration: none;
        padding: 10px 15px;
        display: block;
    }

    .dropbtn{
        text-align: center;
        font-family: 'Merriweather', serif;
        font-size: 25px;
        color: #6b3e26;
    }

    .nav-links .dropdown-content {
        display: none;
        position: absolute;
        background-color: rgb(183, 162, 132); /* Color café */
        width: 250px;
        padding: 15px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
        box-sizing: border-box; /* Mantiene el tamaño fijo */
    }

    .nav-links .dropdown-content form {
        display: flex;
        flex-direction: column;
    }

    .nav-links .dropdown-content input,
    .nav-links .dropdown-content button {
        border: 2px solid #8b5e34; /* Borde café más claro */
    background-color: #f5e3cf; /* Fondo beige claro */
    padding: 10px; /* Espacio interno */
    border-radius: 5px; /* Bordes redondeados */
    color: #4b3621; /* Color del texto más oscuro */
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box; /* Evita que el padding altere el tamaño */
    }

    .nav-links .dropdown-content button {
        background-color: #8b5e34; /* Color café más claro */
        color: white;
        border: none;
        cursor: pointer;
    }

    .nav-links .dropdown:hover .dropdown-content {
        display: block;
    }

    .banner {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; /* Por si no caben en una sola fila */
        width: 100%;
        margin-top: 20px;
        gap: 20px;
        padding: 0 40px; /* Espaciado lateral */
        box-sizing: border-box;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .banner-img {
        width: 30%; /* Ajusta según cuántas imágenes tengas */
        max-width: 400px;
        border-radius: 20px;
        height: auto; /* IMPORTANTE: quitar altura fija */
        aspect-ratio: 4 / 3; /* Opcional, da una forma más uniforme */
        object-fit: cover; /* Mantiene el recorte bonito */
    }
    @media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        height: auto;
        box-sizing: border-box
        gap: 10px;
    }

    .nav-links {
        flex-direction: column;
        width: 100%;
        align-items: stretch;
        justify-content: center;
        gap: 12px;
    }

    .nav-links a {
        padding: 12px;
        text-align: center;
        border-top: 1px solid #ccc;
    }

    .nav-links .dropdown-content {
        position: static;
        width: 100%;
        box-shadow: none;
        margin-top: 10px;
    }

    .banner-img {
        width: 90%;
        max-width: 100%;
    }
    }
</style>
</html>
