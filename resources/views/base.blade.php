<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>CRUD</title>
</head>
<body>

<div class="container" style="margin-top: 40px">
    @yield('content')
    <ul id="pagination-demo" class="pagination"></ul>
</div>

{{--<script--}}
{{--    src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="--}}
{{--    crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('js/get_employers.js') }}"></script>
<script src="{{ asset('js/delete_employer.js') }}"></script>
<script src="{{ asset('js/add_employers.js') }}"></script>
<script src="{{ asset('js/show_employer.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
</body>
</html>
