<!DOCTYPE html>
<html lang="en" {{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <met name="scsrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'Laravel CURD Project' }}</title>
</head>

<body>
    <x-partials.navbar />
    <div>{{ $slot }}</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    {{ $scripts ?? '' }}
</body>

</html>
