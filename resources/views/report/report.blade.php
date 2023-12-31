@extends('layouts.report_layout')
@section('main-content')
<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">{{(request()->segment(2) ==
    'showAllReportsByUserId') ? 'Pengaduan Saya' : 'Semua Pengaduan'}}</div>
<table id="reports" class="table table-striped table-hover">
    <thead>

        <tr>
            <th>Judul</th>
            <th>Pelapor</th>
            <th>Isi</th>
            <th>Lokasi</th>
            <th>Tanggal</th>
            <th>Foto</th>
            <th>Status</th>
            @if (Auth::check() && Auth::user()->jenis_user === 'admin')
            <th>Action</th>

            @endif
        </tr>
    </thead>
    <tbody>

        @foreach ($reports as $report)
        <tr>
            <td>{{$report->judul}}</td>
            <td>{{$report->user->nama}}</td>
            <td>{{$report->isi}}</td>
            <td>{{$report->lokasi}}</td>
            <td>{{date('d-m-Y',strtotime($report->tgl_kejadian))}}</td>
            <td> <a class="text-decoration-none" target="_blank" href="{{url('storage/files/'.$report->foto)}}"
                    alt="">Lihat
                    Gambar</a> </td>
            <td class='text-capitalize'>{{$report->status}}</td>
            @if (Auth::check() && Auth::user()->jenis_user === 'admin')

            <td>
                <a class="text-decoration-none " href="{{route('reports.edit', $report->id)}}">Update</a>

            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $('#reports').DataTable( {
    responsive: true,
    searching: false,
    ordering: false,
    paging: false,
    info : false
    } );
</script>
@endsection