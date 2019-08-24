<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SolveApp</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>


<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro"  style="font-size: 30px;">SolveApp<img src="" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          @guest
            <li class="">
              <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li>
                  <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @else
            <li class="drop-down"><a href="">{{ Auth::user()->name }}</a>
            <ul>
              <a href="{{ route('view.create') }}">Tanggapan</a>
              <li><a href="{{ route('logout') }} "onclick="event.preventDefault();document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a></li>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
              <li>

                </li>
            </ul>
          </li>
          @endguest

        </ul>
      </nav><!-- .main-nav -->

    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro-img.svg" alt="" class="img-fluid" style="height: 250px;">
      </div>

      <div class="intro-info">
        <h2>Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
        <div>
          <!-- Button trigger modal -->
          <button  class="btn-services scrollto" style="background-color: red" data-toggle="modal" data-target="#exampleModalScrollable">Lapor!!!</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Laporkan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('view.store')}}">
                      @csrf
                      <select name="id_user" style="background-color: white; color: white ;border-color: white">
                        <option  value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                      </select>
                      <textarea class="form-control" style="height: 250px;" name="keluhan"  placeholder="Apa Yang Anda Ingin Laporkan"></textarea>
                      <br>
                      <select name="id_dinas" class="form-control">
                        <option >Pengajuan</option>
                        <option value="01">Infrastruktur</option>
                        <option value="02">Tambang Ilegal</option>
                      </select>
                      <br>
                      <select name="jenis_pesan" class="form-control">
                        <option>Jenis Pesan</option>
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                      </select>
                      <br>
                      <input name="alamat"  class="form-control" type="text" placeholder="Alamat" name="">
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-primary">
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
<!-- endmodal -->

          <a href="#about" class="btn-services scrollto">Petunjuk</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Petunjuk</h3>
          <br>
          <!-- <p>Tata Cara tentang penggunaan Sistem</p> -->
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">

            <div class="icon-box wow fadeInUp">
              <div class="icon"><img src="{{assets('open-book')}}"></div>
              <h4 class="title"><a href="">Silahkan klik tulisan "LAPOR" yang ada pada halaman awal.</a></h4>
              <p class="description"></p>

            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-photo"></i></div>
              <h4 class="title"><a href="">Selanjutnya akan ada Form pengaduan yang akan muncul, lalu isi form tersbut sesuai kebutuhan anda.</a></h4>

            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Lalu pilih "INSTANSI TERKAIT" yang ada pada form tersebut.</a></h4>
              <p class="description">
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Lalu pilih "LANGSUNG atau MUSYAWARAH" yang ada pada form tersebut.</a></h4>
              <p class="description">
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><i class="fa fa-bar-chart"></i></div>
              <h4 class="title"><a href="">Lalu Klik tulisan "LAPOR !!!" yang ada pada from tersebut.Laporan Anda akan terus ditindaklanjuti hingga terselesaikan</a></h4>
              <p class="description">
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp" >
            <img style="padding-left: 100px;" src="img/about-img.svg" class="img-fluid" alt="">
          </div>
        </div>



      </div>
    </section><!-- #about -->

    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Banyaknya Laporan</h3>

        </header>



        <div class="row counters">


          <div class="col-lg-50 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Belum Terselesaikan</p>
          </div>

          <div class="col-lg50 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Terselesaikan</p>
          </div>


        </div>


      </div>
    </section>

    <!--==========================
      Portfolio Section
    ============================-->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
