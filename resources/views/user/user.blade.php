@extends('layouts.user_superadmin_layout')
@section('main-content')
<a class="btn btn-success" href="{{route('users.create')}}">Create</a>
<table class="table table-bordered">
    <tr>
        <th>UID</th>
        <th>Nama</th>
        <th>Nomor HP</th>
        <th>Jenis User</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->uid}}</td>
        <td>{{$user->nama}}</td>
        <td>{{$user->nomor_hp}}</td>
        <td>{{$user->jenis_user}}</td>
        <td><a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a></td>
        <td>
            <form action="{{route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger custom-btn-primary" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{$users->links('pagination::bootstrap-5')}}
@endsection