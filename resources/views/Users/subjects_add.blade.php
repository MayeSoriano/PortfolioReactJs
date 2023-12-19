<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
</head>
<body>
    <h1>ADD Subjects</h1>
    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf
        <input type="text" name="sub_title" placeholder="Subject Title" value="{{old('sub_title')}}">
        @error('sub_title')
        <span style="color:red">*required</span>
        @enderror
        <br>
        <input type="text" name="sub_room" placeholder="Subject Room" value="{{old('sub_room')}}">
        @error('sub_room')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="ADD">
</form>    
</body>
</html>