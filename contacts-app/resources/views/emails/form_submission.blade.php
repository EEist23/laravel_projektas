<p>Sveiki,</p>
<p>Jūs pateikėte formą su šiais duomenimis:</p>

<ul>
    @foreach($formData as $key => $value)
        <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
    @endforeach
</ul>

<p>Ačiū!</p>

