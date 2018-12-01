<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @if ($errors->any()) 
            {{-- {{ dd($errors) }} --}}
            {{ $errors->first('username') }}
        @endif
    </div>
    
    <div class="container mt-5" style="width: 400px;">
        <form action="{{ route('test.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Username:</label>
                <input type="text" name="username" class="form-control" value="{{old('username')}}">
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>        
    </div>
</body>
</html>