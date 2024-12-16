<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mega Project-CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 bg-primary text-white">
                <h1>Mega Project</h1>
            </div>
        </div>
        {{-- for title yield --}}
        <div class="row">
            <div class="col-8  border border-primary">
                <h4> @yield('title')</h4>
            </div>
        </div>
        {{-- alert message --}}
        <div class="row">
            <div class="div col-8">
                @if (session('status'))
                <div class="alert alert-success mt-5">
                    {{session('status')}}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger mt-5 col-4">
                    {{ session('error') }}
                </div>
                @endif
            </div>
        </div>
        {{-- for content yield --}}
        <div class="row ">
            <div class="col-8 ">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>