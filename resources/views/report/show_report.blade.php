@extends('layouts.main')
@section('content')
<a href="{{route('reports.index')}}">Index Report</a>
<table>
    <tr>
        <th>Judul</th>
        <th>Pelapor</th>
        <th>Isi</th>
        <th>Lokasi</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Update</th>
    </tr>    
    <tr>
        <td>{{$report->judul}}</td>
        <td>{{$report->user->nama}}</td>
        <td>{{$report->isi}}</td>
        <td>{{$report->lokasi}}</td>
        <td> <img src="{{Storage::url('files/'.$report->foto)}}" alt=""> </td>
        <td>{{$report->status}}</td>
        
    </tr>
</table>    
@endsection