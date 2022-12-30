<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Task</title>
</head>
@extends('layouts.main')

<body>
    @section('main')
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-sm-5 align-item-center">
                    <form method="POST">
                        @csrf
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Task</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th>{{ $task->id }}</th>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <a href="{{ url('task/edit', ['id' => $task->id]) }}"
                                                class="btn btn-info btn-sm">EDIT</a>
                                        </td>
                                        <td> <a href="{{ url('task/delete', ['id' => $task->id]) }}"
                                                class="btn btn-danger btn-sm">DELETE</a></td>
                                        <td>
                                            <a href="{{ url('task') }}" class="btn btn-warning btn-sm">TASK</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </body>
@endsection

</html>
