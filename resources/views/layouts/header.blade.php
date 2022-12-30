<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0 !important;
            overflow: hidden;
            background-color: rgb(101, 85, 112);
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 10px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>

</head>

<body>
    <ul>
        <li>
            <button class="w3-button w3-teal w3-xlarge leftMenu" onclick="w3_open()">☰</button>
        </li>
        <li><a class="/" href="/">HOME</a>
        </li>
        <li><a href="/user/">USER</a></li>
        <li><a href="/company/">COMPANY</a></li>
        <li><a href="/task/">TASK</a></li>
    </ul>