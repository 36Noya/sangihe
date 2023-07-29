@extends('layouts.tentang_sangihe')
@section('main-content')

<div class="judul-post fw-bold d-flex justify-content-center mb-2 fs-4">
    {{$post->judul}}
</div>
@if ($post->id_submenu == '13')
<center>

    <div class="custom-map">



        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127416.93571767167!2d125.46120335328413!3d3.63778620270315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328b0a35fb8cee17%3A0x3bf033a364ef8865!2sKantor%20Bupati%20Kepulauan%20Sangihe!5e0!3m2!1sid!2sid!4v1689745110842!5m2!1sid!2sid"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</center>
@elseif($post->id_submenu =='5')
<section class="section">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

                <div class="candidate-list">
                    <div class="candidate-list-box border mt-4 shadow-sm">
                        <div class="p-4 card-body">
                            <div class="align-items-center row">
                                <div class="col-auto">
                                    <div class="candidate-list-images">
                                        <a href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""
                                                class="avatar-md img-thumbnail rounded-circle" /></a>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="candidate-list-content mt-3 mt-lg-0">
                                        <h5 class="fs-19 mb-0">
                                            <a class="primary-link">Charles Dickens</a>
                                        </h5>
                                        <p class="text-muted mb-2">Bupati</p>
                                        <ul class="list-inline mb-0 text-muted">
                                            <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> Oakridge
                                                Lane Richardson</li>
                                            <li class="list-inline-item">
                                                <a href="" class="badge custom-badge bg-primary ms-1">Sosmed</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</section>
@else
<div class="custom-isi">

    {!!$post->isi!!}
</div>
@endif


@endsection