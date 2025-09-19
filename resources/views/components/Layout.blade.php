<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Panadería y Repostería - Zhandra Araujo</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logoconnegro.png') }}">
</head>

{{-- Se agrega el header --}}
<x-Header />

<body>
    <img class="fondo-trigo" src="/images/fondotrigo-removebg-preview.png" alt="Fondo de trigo">
    
    <main>
        {{-- El slot es donde se va a cargar el contenido de cada vista --}}
        {{ $slot }}
    </main>
</body>

{{-- Se agrega el footer --}}
<x-Footer />
<style>
    /* Aplica estilos generales al body */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #F5E7D3;
        background-image: url('/images/fondotrigo-removebg-preview.png');
        backdrop-filter: blur(4px);
        background-position: center top;
        background-size: contain;
    }
    .fondo-trigo {
        filter: blur(4px); /* 👈 Solo la imagen del trigo tendrá blur */
        opacity: 0.2;

    }
    /* Estilos para el main */
    main {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
    }
    @media (max-width: 768px) {
    body {
        background-size: cover; /* Para que cubra mejor en pantallas pequeñas */
        background-position: top;
    }

    main {
        padding: 0.5rem;
    }

    .fondo-trigo {
        display: none; /* Opcional: ocultar imagen de fondo en móviles si interfiere */
    }
    }
</style>
</html>
