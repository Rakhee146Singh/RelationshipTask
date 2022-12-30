<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Task</title>
</head>
@extends('layouts.main')

<body>
    @section('main')
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="col-sm-5 align-item-center">
                    <form action="{{ route('user.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            {{-- <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span> --}}
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Company Name</label>
                            <select class="form-control" name="companyname" id="companyname">
                                <option hidden>Choose Company Name</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            {{-- <span class="text-danger">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </span> --}}
                        </div>
                        <div class="mb-3">
                            <label for="marks" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            {{-- <span class="text-danger">
                            @error('marks')
                                {{ $message }}
                            @enderror
                        </span> --}}
                        </div>
                        <div class="button" style="text-align:center">
                            <button type="submit" href="{{ url('/create') }}" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-sm-5">
                    <div class="button" style="text-align:rignt">
                        <button type="submit" onClick="user/index" class="btn btn-primary">CREATE</button>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->company ? $user->company->name : '-' }}</td>
                                    {{-- <td>
                                    @foreach ($user->pivot as $pivots)
                                        <ul>
                                            <li>{{ $pivots->id }}</li>
                                            <li>{{ $pivots->name }}</li>
                                        </ul>
                                    @endforeach
                                </td> --}}
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ url('user/edit', $user->id) }}" class="btn btn-info btn-sm">EDIT</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url('user/delete', $user->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm_user"
                                                data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </td>
                                    {{-- <a href="{{ url('user/delete', $user->id) }}"
                                        class="btn btn-danger btn-sm">DELETE</a> --}}
                                    <td>
                                        <a href="{{ url('user/show', $user->id) }}"
                                            class="btn btn-success btn-sm">tasks</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- for Pagination --}}
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

        <script type="text/javascript">
            $('.show_confirm_user').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    </body>
@endsection

</html>
