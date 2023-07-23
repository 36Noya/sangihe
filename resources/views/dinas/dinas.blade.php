@extends('layouts.tentang_sangihe')
@section('main-content')

@foreach ($dinas as $item)
<div class="row ms-2 mb-2">
    <div class="col-md-12 bg-light border p-2">
        <div class="row ">
            <div class="col-md-2 custom-dinas-wrapper">
                <img class="img-fluid custom-dinas-img mt-3" src="{{url('storage/files/'.$item->logo)}}" alt="">
            </div>
            <div class="col-md-9">

                <div class="row ">
                    <div class="col-md-4 fw-bold">

                        {{$item->nama}}
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-4 fs-6"">

                        {{$item->alamat}}
                    </div>
                </div>
                <div class=" row ">
                    <div class=" col-md-4 fs-6"">

                        {{$item->nomor_telepon}}
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-7 mt-2">

                        <a target='_blank' class="btn btn-danger custom-btn-primary fs-6"" href="
                            {{$item->website}}">Kunjungi
                            Website</a>
                        @if (Auth::check() && Auth::user()->jenis_user == 'admin')

                        <a target='_blank' class="btn btn-warning  fs-6"" href=" {{route('dinas.edit',
                            $item->id)}}">Edit</a>
                        @endif

                    </div>
                </div>
                @if (Auth::check() && Auth::user()->jenis_user == 'admin')
                <div class="row">
                    <div class="col-md-12">

                        <form class="p-0 col-md-12" action="{{route('dinas.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class=" btn btn-secondary mt-1 " type="submit">Delete</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endforeach
{{$dinas->links('pagination::bootstrap-5')}}
@endsection