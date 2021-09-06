<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        h1{text-align: center; background-color:#96969e;}
        .footer{text-align: right; font-size: 10pt; margin: 10px;
                border-bottom: solid 1px #ccc; color: #ccc; }
        table {max-width: auto; }
        th {background-color: #999; color:fff; padding: 5px 10px;}
        td {border: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
</head>
<body>

    <h1>@yield('title')</h1>

    @section('header')

    @show

    <div class ="content">
    @yield('content')
    </div>

    <div class="footer">
    @yield('footer')
    </div>

</body>
</html>