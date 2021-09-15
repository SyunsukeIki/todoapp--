<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
         body{font-family: 'Noto Sans JP', sans-serif;}
         h1  {text-align: center; background-color:#96969e; border-radius: 30px;border-radius: 7px;}
         .footer{text-align: right; font-size: 10pt; margin: 10px;
                border-bottom: solid 1px #ccc; color: #ccc; font-weight: bold;}
        .content{height: 100%; margin-bottom: 33%;}
        table{margin: auto; padding-top: 4%;}
        th {background-color: #999; color:fff; padding: 5px 10px;  text-align: left; position: center; font-weight: bold;
            border-radius: 2px;}
        td {border: solid 1px #aaa; color:#999; padding: 5px 10px; text-align: left; position: center; font-weight: bold;
            border-radius: 2px;}
        a  {text-decoration: none; color: black; font-weight: bold;}
        .add{padding: 0.5em 1em; margin: 2em 0; border: double 5px #4ec4d3; width: 97%; background-color: #84DCC6 border-radius: 7px;}
        .add:hover{transform: scale(0.97,0.97);}
        .del{padding: 0.5em 1em; margin: 2em 0; border: double 5px #4ec4d3; width: 97%; background-color: #ABA8B2; opacity:0.85;
        }
        .del:hover{transform: scale(0.99,0.99); cursor: pointer; }
        table tbody tr td.start{color:red;}
        table > tbody:nth-of-type(3){background-color: red;}
        table tbody tr td.done {background-color: red;}


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
    <a href="/logout">@yield('title')</a>
    </div>

</body>
</html>