<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <p>Pridedame jūsų sugeneruotą PDF dokumentą.</p>
</body>
</html>

El. laiško siuntimas iš kontrolerio:
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;

Mail::to('test@example.com')->send(new PDFMail());

