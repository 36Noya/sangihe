<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

    <link href="{{asset('datatables/datatables.min.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script> --}}
    {{-- <script src="https://kit.fontawesome.com/9678681ae9.js" crossorigin="anonymous"></script> --}}
    <script src="{{asset('datatables/datatables.min.js')}}"></script>

    <title>Sangihe</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white ">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img class="w-50" src="{{URL::to('assets/img/logo.png')}}" alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Auth::check() && Auth::user()->jenis_user === 'superadmin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('users.index')}}">User</a>
                    </li>
                    @endif


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tentang Sangihe
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 1)}}">Visi Misi dan
                                    Lambang</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 2)}}">Moto Daerah</a>
                            </li>

                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 4)}}">Sejarah
                                    Sangihe</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 5)}}">Struktur
                                    Pemerintahan</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 6)}}">Kependudukan</a>
                            </li>
                            <li><a class="dropdown-item" href="{{route('posts.filter_post_by_submenu', 7)}}">Tempat
                                    Wisata</a></li>
                            <li><a class="dropdown-item" href="{{route('dinas.index')}}">Perangkat Daerah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan & Informasi Publik
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('posts.filter_post_by_submenu', 8)}}">Layanan
                                    Publik</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.filter_post_by_submenu', 9)}}">Berita
                                    Sangihe</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{route('posts.filter_post_by_submenu', 10)}}">Dokumentasi
                                    Publik</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.filter_post_by_submenu', 12)}}">Galeri
                                    Foto</a></li>
                            <li><a class="dropdown-item" href="{{route('posts.show_single_post', 13)}}">Maps</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('reports.index')}}">Pengaduan
                            Masyarakat</a>
                    </li>
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark " href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu me-2" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('users.show', Auth::id())}}">Profile</a>
                            </li>
                            <li>
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>

                            </li>

                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
                    </li>

                    @endif

                </ul>

            </div>
        </div>
    </nav>

    {{-- End Navbar --}}

    @yield('content')


    {{-- Footer --}}
    <div id="custom-footer" class="row d-flex  p-2">
        <div class="p-2 bd-highlight col-md-3"><img src="{{URL::to('assets/img/logo.png')}}" alt=""></div>
        <div class="p-2 bd-highlight col-md-3">
            <p class="fw-bold">Tentang Sangihe</p>
            <p><a href="{{route('posts.show_single_post', 1)}}" class=" text-decoration-none">Visi Misi</a>
            </p>
            <p><a href="{{route('posts.show_single_post', 2)}}" class=" text-decoration-none">Moto Daerah</a>
            </p>
            <p>

            <p><a href="{{route('posts.show_single_post', 4)}}" class=" text-decoration-none">Sejarah
                    Sangihe</a></p>
            <p><a href="{{route('posts.show_single_post', 5)}}" class=" text-decoration-none">Struktur Pemerintahan</a>
            </p>
            <p><a href="{{route('posts.show_single_post', 6)}}" class=" text-decoration-none">Kependudukan</a></p>
            <p><a href="{{route('posts.filter_post_by_submenu', 7)}}" class=" text-decoration-none">Tempat Wisata</a>
            </p>
            <p><a href="{{route('dinas.index')}}" class=" text-decoration-none">Perangkat Daerah</a>
            </p>

        </div>
        <div class="p-2 bd-highlight col-md-3">
            <p class="fw-bold">Layanan & Informasi Publik</p>
            <p><a href="{{route('posts.filter_post_by_submenu', 8)}}" class=" text-decoration-none">Layanan Publik</a>
            </p>
            <p><a href="{{route('posts.filter_post_by_submenu', 9)}}" class=" text-decoration-none">Berita Sangihe</a>
            </p>
            <p><a href="{{route('posts.filter_post_by_submenu', 10)}}" class=" text-decoration-none">Dokumentasi
                    Publik</a></p>
            <p><a href="{{route('posts.show_single_post', 12)}}" class=" text-decoration-none">Galeri Foto</a></p>
            <p><a href="{{route('posts.show_single_post', 13)}}" class=" text-decoration-none">Maps</a></p>
        </div>
        <div class="p-2 bd-highlight col-md-3">
            <p class="fw-bold">Alamat</p>
            <p>Jl. Stadion Tona Kel. Tona Kec. Tahuna Timur, Kepulauan Sangihe, Sulawesi Utara.</p>
            <p class="fw-bold mt-2">Email</p>
            <p>info@sangihekab.go.id <br>kominfo@sangihekab.go.id </p>
            <p class="fw-bold mt-2">Media Sosial</p>
            <p class="mt-1">
                <a href="" class="text-white"><i class="fa-brands fa-facebook-f fa-lg p-2"></i></a>
                <a href="" class="text-white"><i class="fa-brands fa-instagram fa-lg p-2"></i></a>
                <a href="" class="text-white"><i class="fa-brands fa-youtube fa-lg p-2"></i></a>
            </p>
            <p class="mt-3">
                &copy; 2023 Pemerintah Kabupaten Kepulauan Sangihe
            </p>

        </div>
    </div>
    {{-- End Footer --}}

</body>

</html>