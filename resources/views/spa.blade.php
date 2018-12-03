<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vue SPA Test</title>
    {{--todo, add vars to window--}}
</head>
<body>
<div id="entry">
    <app :holiday-destinations="{{$holiday_destinations}}"></app>
</div>

<script src="{{ mix('js/entry.js') }}"></script>
</body>
</html>