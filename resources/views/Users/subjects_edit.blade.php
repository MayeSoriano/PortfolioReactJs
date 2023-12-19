<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelCRUD</title>
</head>
<body>
    <h1>Edit Subjects</h1>
    <form method="POST" action="{{ route('subjects.update', ['subject' => $subject->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$subject->id}}">
        <input type="text"   name="sub_title" placeholder="Subject Title" value="{{old('sub_title', $subject->sub_title)}}">
        @error( 'sub_title' )
        <span style="color:red">*required</span>
        @enderror
        <br>
        <input type="text" name="sub_room" placeholder="Subject Room" value="{{old('sub_room',$subject->sub_room)}}">
        @error('sub_room')
        <span style="color:red">{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="UPDATE" class="submit-button">
    </form>
</body>
</html>