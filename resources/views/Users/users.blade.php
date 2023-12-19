<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel CRUD</title>
</head>
<body>
	<h1>Users</h1>
	<a href="/users/create/">Add User</a>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Date Created</th>
				<th>Date Updated</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
				<td>{{$user->updated_at}}</td>
				<td><a href="/user_subjects/{{$user->id}}">View Subjects</a><br>
					<a href="/users/{{$user->id}}/edit/">Update</a><br>
					<form action="{{ route('users.destroy',$user->id )}}" method="post">
						@csrf
						@method('delete')
						<button class="btn btn-danger" type="submit">Delete</button>
					</form>
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>