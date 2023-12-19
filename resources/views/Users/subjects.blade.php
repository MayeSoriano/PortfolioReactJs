<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
</head>
<body>
    @if(session('store_subjects'))
    <span>{{session('store_subjects')}}</span>
    @endif
    @if(session('update_subjects'))
    <span>{{session('update_subjects')}}</span>
    @endif
    <h1>Subjects</h1>
    <a href="/subjects/create/">Add Subjects</a>
    <table>
        <thread>
            <tr>
                <th>Subjects</th>
                <th>Room</th>
            </tr>
        </thread>
        <tbody>
            @foreach($subjects as $subj)
            <tr>
                <td>{{$subj->sub_title}}</td>
                <td>{{$subj->sub_room}}</td>
                <td><a href="/subjects/{{$subj->id}}/edit/">Update</a><br>
                <form action="{{ route('subjects.destroy',$subj->id)}}" method="post">
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