<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventaris Sarana Sekolah</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('template/img/logo_sarpras.png') }}"
                    alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <div class="dropdown nav-tem ">
                        <button class="btn btn-transparent dropdown-toggle text-white" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                    {{-- <div class="dropdown nav-tem ms-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Barang yang DI Pinjam
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($pembeli as $item)
                                
                            <li>
                                <a class="dropdown-item" href="">{{}}</a>
                    </li>

                    @endforeach
                </ul>
            </div> --}}




        </div>
        </div>
        </li>
        </ul>
        </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang di Starbhak Sarpras!</div>
        </div>
    </header>

    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center" data-aos="zoom-in">
                <h2 class="section-heading text-uppercase">Perlengkapan</h2>
                <h3 class="section-subheading text-muted">Berikut Isi Barang-barang:</h3>
            </div>
            <div class="row">
                @foreach ($barang as $key=>$item)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        @if ($item->jumlah_barang >= 5)
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $key }}">
                            <div class="portfolio-hover bg-info">

                                <div class="portfolio-hover-content">{{$item->jumlah_barang}}</div>
                            </div>
                            @elseif($item->jumlah_barang >=1)
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal{{ $key }}">
                                <div class="portfolio-hover bg-danger">

                                    <div class="portfolio-hover-content">{{$item->jumlah_barang}}</div>
                                </div>
                                @else
                                <a class="portfolio-link" data-bs-toggle="modal" href="#">
                                    <div class="portfolio-hover bg-secondary">

                                        <div class="portfolio-hover-content">Sold Out gan </div>
                                    </div>
                                    @endif
                                    <img class="img-fluid" src="{{voyager::image($item->gambar)}}" alt="..." />
                                </a>

                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{$item->nama_barang}}</div>
                                    <div class="portfolio-caption-subheading text-muted">Di Beli Tanggal :
                                        {{$item->created_at}}
                                    </div>
                                    <br>
                                    @if(auth()->user()->role_id == "1")
                                    <a href="{{ route('generate',$item->id) }}" class="btn btn-info">Generate QR</a>
                                    @endif
                                </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="text-center" data-aos="zoom-in">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted"> Kelompok 1 Inventaris Sekolah </h3>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row" data-aos="zoom-in">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potoarya.jpg') }}"
                                    alt="..." />
                                <h4>Arya Yudha Zachri</h4>
                                <p class="text-muted">Leader & Front End</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potozharfan.jpg') }}"
                                    alt="..." />
                                <h4>Fikri Zharfan Daryanto</h4>
                                <p class="text-muted">Front End</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potoiqbal.jfif') }}"
                                    alt="..." />
                                <h4>Muhammad Iqbal</h4>
                                <p class="text-muted">Back End</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row" data-aos="zoom-in">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potoerni.jpg') }}"
                                    alt="..." />
                                <h4>Erni Septafia Andriani</h4>
                                <p class="text-muted">Front End</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potolaila.jpg') }}"
                                    alt="..." />
                                <h4>Nurlaila Nabillah</h4>
                                <p class="text-muted">Front End</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potozia.jpg') }}"
                                    alt="..." />
                                <h4>Nur Fauziah Putri Jannatin</h4>
                                <p class="text-muted">Front End</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row" data-aos="zoom-in">
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/poropadil.jpeg') }}"
                                    alt="..." />
                                <h4>Muhammad Rivaldi Rakasiwi</h4>
                                <p class="text-muted">Back End</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potoesa1.jpg') }}"
                                    alt="..." />
                                <h4>Reyhan Esa Adi Nugroho</h4>
                                <p class="text-muted">ERD</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="team-member">
                                <img class="mx-auto rounded-circle" src="{{ asset('template/img/potopipe.jpg') }}"
                                    alt="..." />
                                <h4>Five Adil Wicaksono</h4>
                                <p class="text-muted">ERD</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Kelompok 1 <?php  
                    echo date("Y"); 
                    ?></div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    {{-- $barang  --}}
    @foreach ($barang as $key=> $item)
    

    <div class="portfolio-modal modal fade" id="portfolioModal{{ $key }}" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img
                        src="{{ asset('template/assets/img/close-icon.svg') }}" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">
                                    {{$item->nama_barang}}
                                </h2>

                                <p class="item-intro text-muted">Kategori : {{$item->barang->nama_kategori}}</p>
                                <img class="img-fluid d-block mx-auto" src="{{voyager::image($item->gambar)}}"
                                    alt="..." />

                                <form id="contactForm" data-sb-form-api-token="API_TOKEN"
                                    action="{{route('tambah_peminjam')}}" method="POST">
                                    @csrf

                                    <div class="row align-items-stretch mb-5">
                                        <div class="form-group pl-5 pr-5">
                                            <div class="form-text">Nama Peminjam</div>
                                            <input type="text" class="form-control" name="nama_peminjam"
                                                id="nama_peminjam" value="{{ Auth::user()->name }}  "
                                                placeholder="Masukan Nama Kamu" required readonly>
                                        </div>
                                        <div class="form-group pl-5 pr-5">
                                            <div class="form-text">Kode Peminjam</div>
                                            <input type="text" class="form-control" name="kode_pinjaman" value="{{$nomor}}"
                                                placeholder="Kode Peminjam" required readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group pl-5 pr-5">
                                                <div class="form-text">Pilih Ruangan</div>
                                                <select class="form-control" name="ruangan_id" required>
                                                    <option disabled value="">Pilih Ruangan</option>
                                                    @foreach ($ruangan as $items)
                                                    <option value="{{$items->id}}">{{$items->nama_ruangan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pl-5 pr-5">
                                                <div class="form-text">Nama Barang </div>
                                                <p>{{$item->nama_barang}}</p> <input type="hidden" class="form-control"
                                                    name="barang_id" id="barang_id" value="{{$item->id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group pl-5 pr-5">
                                            <div class="form-text">Jumlah Barang</div>
                                            <input type="number" class="form-control" name="qty"
                                                value="{{ old('', '') }}" placeholder="Masukan Jumlah Barang" required>
                                        </div>
                                        <div class="form-group pl-5 pr-5">
                                            <div class="form-text">Tujuan Meminjam</div>
                                            <textarea class="form-control" name="tujuan_peminjam" id="tujuan" cols="10"
                                                rows="5" placeholder="Masukan Tujuan Anda Meminjam Barang Tersebut"
                                                required></textarea>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                <br><br>
                                <button class="btn btn-primary btn-xl text-uppercase bg-info" data-bs-dismiss="modal"
                                    type="button">
                                    <i class="fas fa-times me-1"></i>
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endforeach

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" href="#" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

        // Swal.fire({
        // icon: 'info',
        // title: 'Sabar Kawan',
        // text: 'ScrenShoot QR Ini Berikan Petugas',
        // footer: '<a  class="btn btn-info" href="">Generate QR</a>'
        // })

    </script>

</body>

</html>
