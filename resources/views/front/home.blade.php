@extends('layouts.front')

@section('meta')
<!-- Primary Meta Tags -->
<meta name="description" content="{{ $general->meta_desc }}">
<meta name="keywords" content="{{ $general->keyword }}">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="127.0.0.1:8000">
<meta property="og:title" content="{{ $general->title }}">
<meta property="og:description" content="{{ $general->meta_desc }}">
<meta property="og:image" content="{{ asset('storage/'.$general->favicon) }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="127.0.0.1:8000">
<meta property="twitter:title" content="{{ $general->title }}">
<meta property="twitter:description" content="{{ $general->meta_desc }}">
<meta property="twitter:image" content="{{ asset('storage/'.$general->favicon) }}">

@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        @foreach ($banner as $key => $banner)

        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{asset('storage/'.$banner->cover)}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{ $banner->title }}</h2>
              <p>{{ $banner->desc }}</p>
              @isset($banner->link)
              <div class="text-center">
                <a href="{{ $banner->link }}" class="btn-get-started">Read More</a>
              </div>
              @endisset
            </div>
          </div>
        </div>

        @endforeach


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>{{ $about->title }}</h2>
            <h3>{{ $about->subject }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
              {!! $about->desc !!}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</strong></h2>
          <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
        </div>

        <div class="row">

          @foreach ($service as $service)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                  </svg>
                  <i class="{{ $service->icon }}"></i>
                </div>
                <h4><a href="{{ route('serviceshow',$service->slug) }}">{{ $service->title }}</a></h4>
                <p>{{ $service->quote }}</p>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              {{--<li data-filter="*" class="filter-active">All</li>--}}
              @foreach ($pcategories as $category)
                <li data-filter=".{{ $category->id }}">{{ $category->name }}</li>
        {{--<div class="row portfolio-container" data-aos="fade-up">--}}
          @foreach ($portfolio as $portfoli)
            @if($category->id ==$portfoli->pcategory_id)
          <div class="col-lg-4 col-md-6 portfolio-item {{ $portfoli->pcategory_id }}">
            <img src="{{ asset('storage/'.$portfoli->cover) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $portfoli->name }}</h4>
              <p>{{ $portfoli->pcategory->name }}</p>
              <a href="{{ asset('storage/'.$portfoli->cover) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfoli->name }}"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolioshow',$portfoli->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
              @endif
          @endforeach
        </div>
              @endforeach
            </ul>
          </div>
        {{--</div>--}}
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    {{--<section id="clients" class="clients">--}}
      {{--<div class="container" data-aos="fade-up">--}}

        {{--<div class="section-title">--}}
          {{--<h2>Partners</h2>--}}
        {{--</div>--}}

        {{--<div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">--}}

          {{--@foreach ($partner as $partner)--}}
          {{--<div class="col-lg-3 col-md-4 col-6">--}}
          {{--<div class="col-lg-3 col-md-4col-6">--}}
            {{--<div class="client-logo">--}}
              {{--<a href="{{ $partner->link }}" target="_blank" rel="noopener noreferrer">--}}
                {{--<img src="{{ asset('storage/'.$partner->cover) }}" class="img-fluid" alt="{{ $partner->name }}">--}}
              {{--</a>--}}
            {{--</div>--}}
          {{--</div>--}}
          {{--@endforeach--}}

        {{--</div>--}}

      {{--</div>--}}
    {{--</section><!-- End Our Clients Section -->--}}

  </main><!-- End #main -->
@endsection