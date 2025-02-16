<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Repsol 2024</title>
    <link rel="stylesheet" href="{{ phpasset('css/styles.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="logo" href="#">Guía Repsol</a>
            <a class="btn-access" href="#">Acceso</a>
        </div>
    </nav>
    
    <div class="container">
        <h2>Descubre los galardonados con Estrellas Guía Repsol de 2024</h2>
        <div class="filters">
            <button class="filter-btn">5 Estrellas</button>
            <button class="filter-btn">4 Estrellas</button>
            <button class="filter-btn">3 Estrellas</button>
            <button class="filter-btn">2 Estrellas</button>
            <button class="filter-btn">1 Estrella</button>
        </div>
        
        <div class="restaurant-category">
            <h3>⭐ 5 Estrellas 2024</h3>
            <div class="restaurant-card">
                <img src="{{ asset('images/aponiente.jpg') }}" alt="Aponiente">
                <div class="info">
                    <h5>Aponiente - 310€</h5>
                    <p>Puerto de Santa María, Andalucía</p>
                </div>
            </div>
        </div>
        
        <div class="restaurant-category">
            <h3>⭐ 4 Estrellas 2024</h3>
            <div class="restaurant-card">
                <img src="{{ asset('images/la_costa.jpg') }}" alt="La Costa">
                <div class="info">
                    <h5>La Costa - 150€</h5>
                    <p>El Ejido, Andalucía</p>
                </div>
            </div>
        </div>
        
        <div class="restaurant-category">
            <h3>⭐ 3 Estrellas 2024</h3>
            <div class="restaurant-card">
                <img src="{{ asset('images/moments.jpg') }}" alt="Moments">
                <div class="info">
                    <h5>Moments - 220€</h5>
                    <p>Barcelona, Cataluña</p>
                </div>
            </div>
        </div>
        
        <div class="restaurant-category">
            <h3>⭐ 2 Estrellas 2024</h3>
            <div class="restaurant-card">
                <img src="{{ asset('images/casa_lucio.jpg') }}" alt="Casa Lucio">
                <div class="info">
                    <h5>Casa Lucio - 80€</h5>
                    <p>Madrid, Comunidad de Madrid</p>
                </div>
            </div>
        </div>
        
        <div class="restaurant-category">
            <h3>⭐ 1 Estrella 2024</h3>
            <div class="restaurant-card">
                <img src="{{ asset('images/xera_restaurant.jpg') }}" alt="Xera Restaurant">
                <div class="info">
                    <h5>Xera Restaurant - 50€</h5>
                    <p>Barcelona, Cataluña</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
