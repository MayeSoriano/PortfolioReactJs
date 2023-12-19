<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel CRUD</title>
</head>
<body>
	<h1>Add User Subjects</h1>
	<h3>Name: {{$user->name}}</h3>
	<form method="post" action="{{route('user_subjects.add')}}">
		@csrf
		<input type="hidden" name="id" value="{{$user->id}}">
	<table>
		<thead>
			<tr>
				<th>Subject List</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($subjects as $subj)
    		<tr>
        		<td>{{$subj->sub_title.' - '.$subj->sub_room}}</td>
        		<td>
           			@if (!$user->subjects->contains('id', $subj->id))
                		<input type="checkbox" name="{{$subj->id}}">
            	@endif
        		</td>
        		<td></td>
   			</tr>
		@endforeach
		</tbody>
	</table>
		<input type="submit" value="ADD">
	</form>
</body>
</html>														