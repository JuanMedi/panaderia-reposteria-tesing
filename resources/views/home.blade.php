<x-Layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <section>
        <div class="tarjeta">
        <h2 class="titulo-productos">Nuevos productos</h2>
        <div class="productos">
    <div class="producto">
        <img src="{{ asset('images/tortadeleche.jpg') }}" alt="Producto 1">
        <h3 class="titulo_tarjeta">Torta de leche asada</h3>
        <p class="precio">$24000</p>

    </div>

    <div class="producto">
        <img src="{{ asset('images/dulcealfajor.jpg') }}" alt="Producto 2">
        <h3 class="titulo_tarjeta">Dulce de Alfajor</h3>
        <p class="precio">$5500</p>

    </div>

    <div class="producto">
        <img src="{{ asset('images/roll.jpg') }}" alt="Producto 3">
        <h3 class="titulo_tarjeta">Roll de Canela</h3>
        <p class="precio">$4000</p>
</div>
    </div>
</div>
<style>

.titulo-productos {
    text-align: center;
    font-family: 'Merriweather', serif;
    font-size: 40px;
    font-weight: bold;
    color: #6b3e26; /* opcional: tono marrón cálido */
}

.productos {
    background-color: #f5e3cf; /* Fondo claro */
    padding: 10px 0; /* Espaciado arriba y abajo */
    width: 100%; /* Ocupar todo el ancho de la página */
    display: flex;
    justify-content: center; /* Centra los productos en la página */
    gap: 20px; /* Espaciado entre tarjetas */
}

.producto {
    background-color: white; /* Fondo blanco para cada tarjeta */
    padding: 20px;
    border-radius: 10px; /* Bordes curvos */
    text-align: center;
    width: 250px; /* Tamaño fijo de cada tarjeta */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Sombra elegante */
}

.producto img {
    width: 100%;
    height: 250px;
    border-radius: 10px; /* Bordes curvos para la imagen */
}

.titulo_tarjeta{
font-size: 18px;
    color: #4b3621; /* Color café */
    margin: 10px 0;
}

.precio {
    font-size: 18px;
    color: #4b3621; /* Color café */
    font-weight: bold;
    margin: 10px 0;
}
@media (max-width: 768px) {
    .titulo-productos {
        font-size: 32px;
    }

    .producto {
        width: 45%; /* dos tarjetas por fila */
        height: auto;
    }

    .producto img {
        height: 200px;
    }
}

/* Aquí el cambio importante para que las tarjetas se apilen */
@media (max-width: 480px) {
    .titulo-productos {
        font-size: 26px;
    }

    .productos {
        flex-direction: column; /* columnas verticales */
        padding: 10px 15px;
        gap: 15px;
    }

    .producto {
        width: 100%; /* una tarjeta por fila */
        padding: 15px;
    }

    .producto img {
        height: 180px;
    }

    .titulo_tarjeta,
    .precio {
        font-size: 16px;
    }
}
}
</style>
    </section>
    <h2 class="titulo-categorias">Nuestras Categorias!</h2>
    <div class="opciones">
    <select name="menu" id="categoriaSelect">
        <option value="panaderia">Panadería</option>
        <option value="reposteria">Repostería</option>
    </select>
    </div>

    <div id="productosContainer">
    {{-- Aquí van los productos inicialmente cargados --}}
    <div class="productos" id="contenedor-productos">
    @include('partials.productos', ['productos' => $productosPanaderia])

    </div>

</div>
<style>
    .titulo-categorias {
    margin-top: 30px;
    text-align: center;
    font-family: 'Merriweather', serif;
    font-size: 40px;
    font-weight: bold;
    color: #6b3e26; /* opcional: tono marrón cálido */
}

select {
    background-color: #f5e3cf;
    color: #4b3621;
    border: 2px solid #8b5e34;
    border-radius: 5px;
    padding: 10px 15px;
    font-family: 'Merriweather', serif;
    font-size: 16px;
    appearance: none;         /* Oculta flecha nativa */
    -webkit-appearance: none; /* Safari */
    -moz-appearance: none;    /* Firefox */
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 140 140' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline points='30,50 70,90 110,50' fill='none' stroke='%236b3e26' stroke-width='15' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    background-size: 12px;
    cursor: pointer;
    min-width: 200px;
    margin-bottom: 50px;
}

select:focus {
    outline: none;
    border-color: #6b3e26;
    background-color: #f2d7b6;
}

#productosContainer {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacio entre los productos */
    justify-content: center; /* Asegura que los elementos estén bien distribuidos */
}
.productos {
    flex: 1 1 calc(33.333% - 20px); /* Distribuye los productos en tres columnas */
    box-sizing: border-box;
}

.btn{
    display: inline-block;
    background-color: #8b5e34; /* Botón en color café */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
@media (max-width: 992px) {
    .titulo-categorias {
        font-size: 32px;
    }

    select {
        min-width: 150px;
        font-size: 14px;
        padding: 8px 12px;
        margin-bottom: 40px;
    }

    .productos {
        flex: 1 1 calc(50% - 20px); /* 2 columnas */
    }
}

@media (max-width: 576px) {
    .titulo-categorias {
        font-size: 26px;
        margin-top: 20px;
    }

    select {
        width: 100%;
        min-width: unset;
        font-size: 14px;
        padding: 10px;
        margin-bottom: 30px;
    }

    #productosContainer {
        gap: 15px;
    }

    .productos {
        flex: 1 1 100%; /* 1 columna */
    }

    .btn {
        width: 100%;
        padding: 12px;
        font-size: 16px;
    }
}

</style>
</x-Layout>

<script>
document.getElementById('categoriaSelect').addEventListener('change', function () {
    const categoria = this.value;

    fetch(`/productos/categoria/${categoria}`) // Usar backticks ``
        .then(response => response.text())
        .then(html => {
            document.getElementById('productosContainer').innerHTML = html;
        })
        .catch(error => {
            console.error('Error cargando productos:', error);
        });
});
</script>
