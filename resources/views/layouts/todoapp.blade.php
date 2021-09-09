<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        h1{text-align: center; background-color:#96969e; font-family: 'Anton', sans-serif}
        .footer{text-align: right; font-size: 10pt; margin: 10px;
                border-bottom: solid 1px #ccc; color: #ccc; }
        .content{height: 100%; margin-bottom: 35%;}
        table {width: 100%;}
        th {background-color: #999; color:fff; padding: 5px 10px; width:80%; text-align: left;}
        td {border: solid 1px #aaa; color:#999; padding: 5px 10px;width:20%; text-align: left;}
        .tableContents{height: 100%;}
        a{text-decoration: none; color: black; }
        .add{padding: 0.5em 1em; margin: 2em 0; border: double 5px #4ec4d3; width: 97%; background-color: #c8d4e8;}
        .add:hover{transform: scale(0.99,0.99);}
        body{font-family: 'Noto Sans JP', sans-serif;}
        .message{padding: 0.5em 1em; margin: 2em 0; border: double 5px #4ec4d3; width: 97%; background-color: #e32807; opacity: 0.7; color: whitesmoke;}


    </style>
</head>
<body>

    <h1><a href="/folder">@yield('title')</a></h1>
    @section('add')

    @show

    <div class ="content">
    @yield('content')
    </div>

    <div class="footer">
    @yield('footer')
    </div>

</body>
</html>