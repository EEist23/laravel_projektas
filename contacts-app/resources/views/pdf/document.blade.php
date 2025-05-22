<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Dokumentas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; font-size: 24px; font-weight: bold; }
        .content { margin-top: 20px; font-size: 16px; }
    </style>
</head>
<body>
    <div class="header">{{ $title }}</div>
    <div class="content">
        <p>Data: {{ $date }}</p>
        <p>{{ $content }}</p>
    </div>
</body>
</html>
