<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss', 'resources/css/app.css'])
</head>
<body>
    <div id="app">
        @if (!empty($url))
            <audio controls autoplay>
                <source src="{{ $url }}" type="audio/mpeg">
            </audio>
        @endif
    </div>
</body>
</html>
