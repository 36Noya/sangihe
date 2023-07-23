@extends('layouts.tentang_sangihe')

@section('main-content')

<a href="{{route('posts.index')}}">Index Post</a>
<table>
    <tr>
        <th>Submenu</th>
        <th>Action</th>
    </tr>
    @foreach ($submenus as $submenu)
    <tr>
        <td>{{$submenu->nama}}</td>
        <td>
            @if (in_array($submenu->id, $multiplePostsId))
            <a href="{{route('posts.filter_post_by_submenu', $submenu->id)}}">Detail</a>
            @else
            <a href="{{route('posts.show_single_post', $submenu->id)}}">Show</a>
            <a href="{{route('posts.edit_single_post', $submenu->id)}}">Edit</a>

            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection