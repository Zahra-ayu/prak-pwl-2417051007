<head>
    <meta charset="UTF-8">
    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="card">
        <img src="{{ asset('assets/img/profile.jpg') }}" alt="Profile Picture" width="200" height="200">

        <br>
        <div class="info">{{ $nama }}</div>
        <div class="info">{{ $NPM }}</div>
        <div class="info">{{ $kelas }}</div>
    </div>
</body>