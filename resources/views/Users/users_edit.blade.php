<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel CRUD</title>
</head>
<body>
	<h1>ADD User</h1>
	<form method="post" action="{{route('users.update',$user->id)}}">
		@csrf
		@method('put')
		<input type="hidden" name="id" value="{{$user->id}}">
		<input type="text" name="name" placeholder="Full Name" value="{{old('name',$user->name)}}">
		@error('name')
		<span style="color:red">*required</span>
		@enderror
		<br>
		<input type="text" name="email" placeholder="Email" value="{{old('email',$user->email)}}">
		@error('email')
		<span style="color:red">{{$message}}</span>
		@enderror
		<br>
		<input type="submit" value="EDIT" >
	</form>
</body>
</html>