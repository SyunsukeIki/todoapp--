<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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

        .menu {
            position: relative;
            list-style-type: none;
            width: 100%;
            padding : 0px;
            border-radius: 7px;

        }

        .menu > li {
            float: left;
            width: 100%;
            height: 50px;
            line-height: 50px;
            background-color: #aaa;
            border-radius: 7px;
        }

        .menu > li a {
            display: block;
            color: #fff;
            padding-left: 11.5px;
        }

        .menu > li a:hover {
            color: #999;
        }

        ul.menu__second-level {
            visibility: hidden;
            opacity: 0;
            z-index: 1;
        }

        ul.menu__third-level {
            visibility: hidden;
            opacity: 0;
        }

        ul.menu__fourth-level {
            visibility: hidden;
            opacity: 0;
        }

        .menu > li:hover {
            background: #072A24;
            -webkit-transition: all .5s;
            transition: all .5s;
        }

        .menu__second-level li {
            border-top: 1px solid #111;
        }

        .menu__third-level li {
            border-top: 1px solid #111;
        }

        .menu__second-level li a:hover {
            background: #111;
        }

        .menu__third-level li a:hover {
            background: #2a1f1f;
        }

        .menu__fourth-level li a:hover {
            background: #1d0f0f;
        }

        /* 下矢印 */
        .init-bottom:after {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            margin: 0 0 0 15px;
            border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        /* floatクリア */
        .menu:before,
        .menu:after {
            content: " ";
            display: table;
        }

        .menu:after {
            clear: both;
        }

        .menu {
            *zoom: 1;
        }
        .menu > li.menu__single {
            position: relative;
        }

        li.menu__single ul.menu__second-level {
            position: absolute;
            top: 40px;
            width: 93%;
            background: #072A24;
            -webkit-transition: all .2s ease;
            transition: all .2s ease;
        }

        li.menu__single:hover ul.menu__second-level {
            top: 50px;
            visibility: visible;
            opacity: 1;
        }



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