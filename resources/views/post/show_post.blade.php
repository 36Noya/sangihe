@extends('layouts.tentang_sangihe')
@section('main-content')

<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">
    {{$post->judul}}
</div>
@if ($post->id_submenu == '13')
<center>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127416.93571767167!2d125.46120335328413!3d3.63778620270315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328b0a35fb8cee17%3A0x3bf033a364ef8865!2sKantor%20Bupati%20Kepulauan%20Sangihe!5e0!3m2!1sid!2sid!4v1689745110842!5m2!1sid!2sid"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</center>
@else
<div class="custom-isi">

    {!!$post->isi!!}
</div>
@endif


@endsection