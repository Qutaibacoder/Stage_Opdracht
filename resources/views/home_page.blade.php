<x-app>
    <!DOCTYPE html>
    <html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <!-- Font Awesome CDN voor iconen -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
            }
            .navbar {
                background-color: #333;
                overflow: hidden;
            }
            .navbar a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }
            .navbar a:hover {
                background-color: #ddd;
                color: black;
            }
            .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 90vh;
                text-align: center;
            }
            .icon {
                font-size: 100px;
                color: #4CAF50;
            }
            h1 {
                font-size: 2.5em;
                margin: 20px 0 10px 0;
            }
            p {
                font-size: 1.2em;
                color: #555;
            }
        </style>
    </head>
    <body>

    <div class="content">
        <i class="fas fa-home icon"></i>
        <h1>Welkom op mijn homepage</h1>
        <p>Dit is een eenvoudige homepage zonder navigatiebalk, met een icoon en tekst.</p>
    </div>
    </body>
    </html>


</x-app>
