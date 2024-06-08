<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrollable Card Container</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .card-container {
            width: 300px;
            height: 500px;
            border: 1px solid #ccc;
            overflow-y: auto;
            padding: 10px;
            box-sizing: border-box;
        }
        
        .card {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">Card 1</div>
        <div class="card">Card 2</div>
        <div class="card">Card 3</div>
        <div class="card">Card 4</div>
        <div class="card">Card 5</div>
        <div class="card">Card 6</div>
        <div class="card">Card 7</div>
        <div class="card">Card 8</div>
        <div class="card">Card 9</div>
        <div class="card">Card 10</div>
        <!-- Tambahkan lebih banyak card sesuai kebutuhan -->
    </div>
</body>
</html>
