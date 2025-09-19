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
<x-HdEmpleado />

<body>
    <main>
        {{-- El slot es donde se va a cargar el contenido de cada vista --}}
        {{ $slot }}
    </main>
</body>

{{-- Se agrega el footer --}}

<style>
    body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #F5E7D3;
            margin: 0;
            padding: 0;
            font-family: 'Merriweather', serif;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

    @media (max-width: 768px) {
        main {
            padding: 2rem 1rem;
        }
    }

    @media (max-width: 480px) {
        body {
            font-size: 14px;
        }

        main {
            padding: 1.5rem 0.5rem;
        }
    }
</style>
<x-Footer/>

</html>
