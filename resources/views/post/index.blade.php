@extends('layouts.main')
@section('content')
<div class="bg-gradient-custom  ">
    <div class="row mb-5 ">
        <div class="col-md-12">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($berita as $key => $item)
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}"
                        class="{{$key === 0 ? 'active' : ''}}" aria-current="true"
                        aria-label="Slide {{$key++;}}"></button>

                    @endforeach
                </div>

                <div class="carousel-inner custom-carousel-inner">
                    @foreach ($berita as $key => $item)

                    <div class="carousel-item {{$key === 0 ? 'active' : ''}}" data-bs-interval="10000">
                        <img src="{{url('storage/files/'.$item->file)}}" class="carousel-img d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>{{$item->judul}}</h1>
                            <span class="d-inline small"><i class="fa fa-calendar"></i>
                                {{date('d-m-Y',strtotime($item->created_at))}}</span>
                            <br>
                            <br>
                            <a href="{{route('posts.show', $item->id)}}" class="carousel-link-btn">Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                    @endforeach


                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
    <!-- card -->
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="custom-card-index card text-center shadow-lg p-4 mb-5 bg-body-tertiary"
                    style="border-radius:0.5em">
                    <div class="card-body">
                        <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="mdi:google-maps">
                                <path id="Vector"
                                    d="M49.981 16.2503C52.7164 22.1274 52.0935 29.0607 49.0873 34.6941C46.5415 39.2712 42.8852 43.1441 39.7706 47.3962C38.4164 49.292 37.0623 51.3232 36.0602 53.517C35.7081 54.2482 35.4644 55.0066 35.1935 55.7649C34.9227 56.5232 34.6789 57.2816 34.4352 58.0399C34.1914 58.7441 33.8935 59.5837 32.9998 59.5837C31.9435 59.5837 31.6456 58.392 31.4289 57.5795C30.7789 55.6024 30.1289 53.7066 29.1269 51.892C27.9894 49.7524 26.5539 47.7753 25.0914 45.8524L49.981 16.2503ZM25.1998 22.8045L16.2623 33.4212C17.9144 36.9149 20.3789 39.8941 22.7352 42.8732C23.3039 43.5503 23.8727 44.2545 24.4144 44.9857L35.7081 31.6066L35.5998 31.6337C31.6456 32.9878 27.2581 30.9837 25.6873 27.0837C25.4706 26.6232 25.3081 26.0816 25.1998 25.5399C25.0508 24.6433 25.0508 23.7282 25.1998 22.8316V22.8045ZM18.3206 12.5128L18.2935 12.5399C13.906 18.092 13.1477 25.8107 15.7748 32.3378L26.581 19.5003L26.4456 19.3649L18.3206 12.5128ZM39.0123 6.39199L30.2914 16.7107L30.3998 16.6837C34.0289 15.4378 38.0914 17.0087 39.9331 20.3128C40.3394 21.0712 40.6644 21.8837 40.7727 22.6962C40.9352 23.7253 40.9894 24.4566 40.7998 25.4587V25.4857L49.4664 15.1941C47.201 11.0758 43.4841 7.94779 39.0394 6.41908L39.0123 6.39199ZM27.2852 18.6607L37.8748 6.06699L37.7664 6.03991C36.1956 5.63366 34.5977 5.41699 32.9998 5.41699C27.6644 5.41699 22.6269 7.71908 19.0519 11.6732L18.9977 11.7003L27.2852 18.6607Z"
                                    fill="#DF1024" />
                            </g>
                        </svg>
                        <h2 class="card-title">Maps</h2>
                        <p class="card-text mb-3">Carilah tempat-tempat yang ingin anda kunjungi di kabupaten kepulauan
                            Sangihe</p>
                        <a href="{{route('posts.show_single_post', 13)}}" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="custom-card-index card text-center shadow-lg p-4 mb-5 bg-body-tertiary"
                    style="border-radius:0.5em">
                    <div class="card-body">
                        <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="formkit:people" clip-path="url(#clip0_230_1687)">
                                <path id="Vector"
                                    d="M32.9993 28.4375C30.1262 28.4375 27.3707 27.3675 25.339 25.4628C23.3074 23.5581 22.166 20.9749 22.166 18.2812C22.166 15.5876 23.3074 13.0044 25.339 11.0997C27.3707 9.19503 30.1262 8.125 32.9993 8.125C35.8725 8.125 38.628 9.19503 40.6597 11.0997C42.6913 13.0044 43.8327 15.5876 43.8327 18.2812C43.8327 20.9749 42.6913 23.5581 40.6597 25.4628C38.628 27.3675 35.8725 28.4375 32.9993 28.4375ZM32.9993 12.1875C29.4027 12.1875 26.4993 14.9094 26.4993 18.2812C26.4993 21.6531 29.4027 24.375 32.9993 24.375C36.596 24.375 39.4993 21.6531 39.4993 18.2812C39.4993 14.9094 36.596 12.1875 32.9993 12.1875Z"
                                    fill="#DF1024" />
                                <path id="Vector_2"
                                    d="M59 44.6875C57.7867 44.6875 56.8333 43.7938 56.8333 42.6562C56.8333 41.5187 57.7867 40.625 59 40.625C60.2133 40.625 61.1667 39.7313 61.1667 38.5938C61.1667 35.9001 60.0253 33.3169 57.9937 31.4122C55.962 29.5075 53.2065 28.4375 50.3333 28.4375H46C44.7867 28.4375 43.8333 27.5438 43.8333 26.4062C43.8333 25.2687 44.7867 24.375 46 24.375C49.5967 24.375 52.5 21.6531 52.5 18.2812C52.5 14.9094 49.5967 12.1875 46 12.1875C44.7867 12.1875 43.8333 11.2938 43.8333 10.1562C43.8333 9.01875 44.7867 8.125 46 8.125C48.8732 8.125 51.6287 9.19503 53.6603 11.0997C55.692 13.0044 56.8333 15.5876 56.8333 18.2812C56.8333 20.8 55.88 23.075 54.2333 24.8625C60.69 26.4875 65.5 32.0125 65.5 38.5938C65.5 41.9656 62.5967 44.6875 59 44.6875ZM7 44.6875C3.40333 44.6875 0.5 41.9656 0.5 38.5938C0.5 32.0125 5.26667 26.4875 11.7667 24.8625C10.1633 23.075 9.16667 20.8 9.16667 18.2812C9.16667 15.5876 10.308 13.0044 12.3397 11.0997C14.3713 9.19503 17.1268 8.125 20 8.125C21.2133 8.125 22.1667 9.01875 22.1667 10.1562C22.1667 11.2938 21.2133 12.1875 20 12.1875C16.4033 12.1875 13.5 14.9094 13.5 18.2812C13.5 21.6531 16.4033 24.375 20 24.375C21.2133 24.375 22.1667 25.2687 22.1667 26.4062C22.1667 27.5438 21.2133 28.4375 20 28.4375H15.6667C12.7935 28.4375 10.038 29.5075 8.00634 31.4122C5.9747 33.3169 4.83333 35.9001 4.83333 38.5938C4.83333 39.7313 5.78667 40.625 7 40.625C8.21333 40.625 9.16667 41.5187 9.16667 42.6562C9.16667 43.7938 8.21333 44.6875 7 44.6875ZM46 56.875H20C16.4033 56.875 13.5 54.1531 13.5 50.7812V46.7188C13.5 38.8781 20.3033 32.5 28.6667 32.5H37.3333C45.6967 32.5 52.5 38.8781 52.5 46.7188V50.7812C52.5 54.1531 49.5967 56.875 46 56.875ZM28.6667 36.5625C25.7935 36.5625 23.038 37.6325 21.0063 39.5372C18.9747 41.4419 17.8333 44.0251 17.8333 46.7188V50.7812C17.8333 51.9188 18.7867 52.8125 20 52.8125H46C47.2133 52.8125 48.1667 51.9188 48.1667 50.7812V46.7188C48.1667 44.0251 47.0253 41.4419 44.9937 39.5372C42.962 37.6325 40.2065 36.5625 37.3333 36.5625H28.6667Z"
                                    fill="#DF1024" />
                            </g>
                            <defs>
                                <clipPath id="clip0_230_1687">
                                    <rect width="65" height="65" fill="white" transform="translate(0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <h2 class="card-title">Layanan Publik</h2>
                        <p class="card-text mb-3">Berikut ini daftar layanan publik di Kabupaten Kepulauan Sangihee</p>
                        <a href="{{route('posts.filter_post_by_submenu', 8)}}" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="custom-card-index card text-center shadow-lg p-4 mb-5 bg-body-tertiary"
                    style="border-radius:0.5em">
                    <div class="card-body">
                        <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="material-symbols:history-edu-outline-rounded">
                                <path id="Vector"
                                    d="M22.166 54.1663C20.6764 54.1663 19.4008 53.6355 18.3391 52.5738C17.2775 51.5122 16.7475 50.2374 16.7493 48.7497V43.333C16.7493 42.5656 17.0093 41.922 17.5293 41.402C18.0493 40.882 18.6921 40.6229 19.4577 40.6247H24.8743V34.5309C23.2945 34.4406 21.7932 34.0904 20.3704 33.4801C18.9476 32.8698 17.6503 31.9562 16.4785 30.7393V27.7601H13.3639L6.86393 21.2601C6.09657 20.4927 5.71289 19.7028 5.71289 18.8903C5.71289 18.0778 6.09657 17.3556 6.86393 16.7236C8.17296 15.5952 9.78622 14.7375 11.7037 14.1507C13.6212 13.5639 15.6642 13.2705 17.8327 13.2705C19.0514 13.2705 20.2359 13.3608 21.386 13.5413C22.5362 13.7219 23.6989 14.0604 24.8743 14.557V13.5413C24.8743 12.774 25.1343 12.1312 25.6544 11.613C26.1744 11.0948 26.8171 10.8348 27.5827 10.833H54.666C55.4334 10.833 56.0771 11.093 56.5971 11.613C57.1171 12.133 57.3762 12.7758 57.3744 13.5413V46.0413C57.3744 48.2983 56.5844 50.2167 55.0046 51.7965C53.4247 53.3764 51.5063 54.1663 49.2494 54.1663H22.166ZM30.291 40.6247H43.8327C44.6 40.6247 45.2437 40.8847 45.7637 41.4047C46.2837 41.9247 46.5428 42.5675 46.541 43.333V46.0413C46.541 46.8087 46.801 47.4524 47.321 47.9724C47.841 48.4924 48.4838 48.7515 49.2494 48.7497C50.0167 48.7497 50.6604 48.4897 51.1804 47.9697C51.7004 47.4497 51.9595 46.8069 51.9577 46.0413V16.2497H30.291V17.8747L45.7285 33.3122C46.0445 33.6281 46.2593 33.9215 46.3731 34.1924C46.4869 34.4632 46.5428 34.8018 46.541 35.208C46.541 35.9754 46.281 36.619 45.761 37.139C45.241 37.659 44.5982 37.9181 43.8327 37.9163C43.4264 37.9163 43.0879 37.8595 42.8171 37.7457C42.5462 37.632 42.2528 37.418 41.9369 37.1038L35.0306 30.1976L34.4889 30.7393C33.857 31.3712 33.1907 31.9354 32.4902 32.432C31.7896 32.9285 31.0566 33.3122 30.291 33.583V40.6247ZM15.666 22.3434H21.8952V28.1663C22.4369 28.5275 23.0011 28.7757 23.5879 28.9111C24.1747 29.0465 24.7841 29.1143 25.416 29.1143C26.4542 29.1143 27.3913 28.9563 28.2273 28.6403C29.0632 28.3243 29.8866 27.7601 30.6973 26.9476L31.2389 26.4059L27.4473 22.6143C26.1382 21.3052 24.6712 20.323 23.0462 19.6676C21.4212 19.0122 19.6834 18.6854 17.8327 18.6872C16.9299 18.6872 16.0723 18.7549 15.2598 18.8903C14.4473 19.0257 13.6348 19.2288 12.8223 19.4997L15.666 22.3434ZM22.166 48.7497H41.5306C41.3952 48.3434 41.2932 47.9146 41.2246 47.4632C41.1559 47.0118 41.1225 46.5379 41.1244 46.0413H22.166V48.7497Z"
                                    fill="#DF1024" />
                            </g>
                        </svg>
                        <h2 class="card-title">Sejarah</h2>
                        <p class="card-text mb-3">Dari berbagai sumber yang memberikan informasi tentang arti nama
                            Sangihe</p>
                        <a href="{{route('posts.show_single_post', 4)}}" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="custom-card-index card text-center shadow-lg p-4 mb-5 bg-body-tertiary"
                    style="border-radius:0.5em">
                    <div class="card-body">
                        <svg width="66" height="65" viewBox="0 0 66 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="game-icons:village">
                                <path id="Vector"
                                    d="M14.4523 4.55384L5.42086 12.0801H23.4838L14.4523 4.55384ZM51.0148 8.61634L41.9834 16.1426H60.0462L51.0148 8.61634ZM29.5379 10.7153L15.7127 22.2362H43.3631L29.5379 10.7153ZM7.46988 14.3652V22.2362H12.143L21.4347 14.4931V14.3652H7.46988ZM10.3898 16.1425H12.4211V18.4277H10.3898V16.1425ZM44.0324 18.4277V19.8194L46.9523 22.2526V20.2049H48.9836V22.49H47.2372L47.2504 22.5011L49.6749 24.5214H44.0324V26.2987H53.9347V21.3476H56.2199V26.2987H57.9972V18.4277H44.0324ZM19.3597 24.5214V27.0706L22.4186 24.5214H19.3597ZM22.9344 24.5214L36.2772 35.6402L39.716 32.7744V24.5214H22.9344ZM32.4157 26.2987H36.9523V30.6152H32.4157V26.2987ZM22.6766 27.2814L4.35547 42.5488H40.998L22.6768 27.2814H22.6766ZM47.8191 28.9965L38.0619 37.1275L42.1299 40.5176H61.6443L47.8191 28.9966V28.9965ZM44.8721 42.8027L44.8851 42.8136L47.3093 44.8339H38.1372V54.6686H45.8096V46.6114H52.1573V54.6687H57.9971V42.8029H44.8721V42.8027ZM9.50113 44.8339V60.4462H25.4972V50.6739H31.8449V60.4464H35.8522V44.8342H9.50113V44.8339ZM13.3097 48.6425H19.6574V54.9902H13.3097V48.6425Z"
                                    fill="#DF1024" />
                            </g>
                        </svg>

                        <h2 class="card-title">Kependudukan</h2>
                        <p class="card-text mb-3">Berikut adalah daftar kecamatan dan desa/kelurahan di Kabupaten
                            Kepulauan Sangihe</p>
                        <a href="{{route('posts.show_single_post', 6)}}" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between my-3">
            <h2>Berita Sangihe</h2>
            <a href="{{route('posts.filter_post_by_submenu', 9)}}" class="more">Lihat Semua <i
                    class="fa fa-arrow-right"></i></a>
        </div>
    </div>

    <div class="container" style="width:82%">
        <div class="row">
            @foreach ($berita as $key => $item)
            <div class="col-md-3 col-sm-6 col-xs-12 mb-5" style="text-align:justify">
                <img src="{{url('storage/files/'.$item->file)}}" class="img-fluid card-img-top" alt="">
                <h5 class="py-1">{{$item->judul}}</h5>
                <span class="d-inline small"><i class="fa fa-calendar"></i>
                    {{date('d-m-Y',strtotime($item->created_at))}}</span>
                <div class=""></div>


                <a href="{{route('posts.show', $item->id)}}" class="more d-inline">Selengkapnya <i
                        class="fa fa-arrow-right"></i></a>
            </div>
            @endforeach

        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between my-3 px-3">
            <h2>Dokumentasi</h2>
            <a href="{{route('posts.filter_post_by_submenu', 10)}}" class="more">Lihat Semua <i
                    class="fa fa-arrow-right"></i></a>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <iframe width="100%" style="border-radius: 1em;" height="400"
                            src="https://www.youtube.com/embed/ROQrk6cqA2g" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row mb-3">
                    @foreach ($photos as $photo)

                    <div class="col-md-6 col-sm-6 image-container">
                        <img class="img-fluid rounded" style="height: 100%" src="{{url('storage/files/'.$photo->file)}}"
                            alt="Your Image">
                        <div class="image-text">
                            <h6>
                                <a href="{{route('posts.show', $photo->id)}}">
                                    {{$photo->judul}}
                                </a>
                            </h6>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
            <div class="col-md-4 col-sm-12"
                style="height:92vh; background:red;color:white;border-radius:1em;display:flex; justify-content: center; align-items: center;">
                <h4>Widget Asean</h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between my-3 px-3">
            <h2>Layanan Publik</h2>
            <a href="{{route('posts.filter_post_by_submenu', 8)}}" class="more">Lihat Semua <i
                    class="fa fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- Carousel -->
    <div class="container mb-5">
        <div class="row">
            <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false">

                <div class="carousel-inner">
                    @php
                    $key=2;
                    @endphp
                    @foreach ($layananPublik as $key=>$item)

                    @if ($key === 0 OR $key === 3 OR $key === 6)
                    <div class="carousel-item {{($key === 0 ? 'active' : '')}}">

                        <div class="card-wrapper">
                            @endif
                            <div class="card">
                                <div class="image-wrapper">
                                    <a href="{{route('posts.show', $item->id)}}"><img
                                            src="{{url('storage/files/'.$item->file)}}" alt="..."></a>
                                </div>
                            </div>
                            @if ($key == 2 OR $key == 5 OR $key == 8 )
                        </div>
                    </div>
                    @endif
                    @endforeach

                    @if ($key != 2 && $key != 5 && $key != 8 )

                </div>
            </div>
            @endif


            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
</div>



</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script src="https://kit.fontawesome.com/9678681ae9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $('.custom-isi-berita p > img').unwrap();
</script>
@endsection