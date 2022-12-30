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
                    <form action="{{ url('user/update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $users->name }}">
                            {{-- <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span> --}}
                        </div>
                        {{-- <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city"
                            value="{{ $user->city }}"> --}}
                        {{-- <span class="text-danger">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
            </div> --}}
                        <div class="mb-3">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $users->company_id }}">
                            {{-- <span class="text-danger">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </span> --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $users->email }}">
                                {{-- <span class="text-danger">
                                @error('marks')
                                    {{ $message }}
                                @enderror
                            </span> --}}
                            </div>

                            <div class="button" style="text-align:center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </body>
@endsection

</html>
