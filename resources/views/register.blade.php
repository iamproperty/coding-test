<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Address</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container p-3">
            <div class="content" id="app">
                <register></register>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

