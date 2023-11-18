<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Ticket Abierto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #3498db;
            color: white;
            padding: 2px;
        }

        main {
            padding: 20px;
        }

        h1 {
            color: white;
            font-size: 3rem;
            text-align: center
        }


        p {
            font-size: 1.9rem;
            color: #555;
            text-align: center;
            margin-top: 20px;
        }

        span {
            font-weight: bold;
            color: #0066cc;
            font-size: 1.9rem;
        }
        .ticket-info {
            background-color: #ecf0f1;
            border-radius: 8px;
            padding: 25px;
            text-align: left;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-info p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<header>
    <h1>Nuevo ticket abierto</h1>
</header>
    
<div class="ticket-info">
    <p>El cliente <span>$first_surname </span> <span>$last_surname </span> ha abierto un nuevo ticket</p>
</div>
</body>
</html>
