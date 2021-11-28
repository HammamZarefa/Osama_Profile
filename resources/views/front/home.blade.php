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
 {{ $local=session()->get('locale')}}
  <!-- ======= Hero Section ======= -->
  direction: ltr !important;
  <section id="hero" style="direction: ltr !important;">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div  style="background-image: url({{asset('storage/'.$banner[0]->cover)}});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{$local=='en'? $banner[0]->title:$banner[0]->title_ar }}</h2>
                <p>{{ $local=='en'?$banner[0]->desc:$banner[0]->desc_ar }}</p>
                @isset($banner[0]->link)
                  <div class="text-center">
                    <a href="{{ $banner[0]->link }}" class="btn-get-started">{{ __('home.readmore') }}</a>
                  </div>
                @endisset
              </div>
            </div>
          </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>{{ __('home.aboutus') }}</strong></h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2> {{$local=='en'? $about->title:$about->title_ar }}</h2>
            <h3>{{$local=='en'? $about->subject:$about->subject_ar }}</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
              {!!$local=='en'? $about->desc:$about->desc_ar  !!}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><strong>{{ __('home.services') }}</strong></h2>
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
                <h4><a href="{{ route('serviceshow',$service->slug) }}">{{ $local=='en'? $service->title:$service->title_ar }}</a></h4>
                <p>{{$local=='en'? $service->quote:$service->quote_ar }}</p>
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
          <h2>{{ __('home.portfolio') }}</h2>
          <ul class="shuffle">
            <!-- portfolio item 1 -->
            @foreach ($pcategories as $category)
              <li data-filter=".{{ $category->id }}">{{$local=='en'? $category->name :$category->name_ar}}</li>
              <div class="imgs-container" data-aos="fade-up">
                @foreach ($portfolio as $portfoli)
                  @if($category->id ==$portfoli->pcategory_id)
                    <div class="box">
                      <a href="{{ route('portfolioshow',$portfoli->slug) }}">
                        <img src="{{ asset('storage/'.$portfoli->cover) }}" class="img-fluid" alt="">
                        <h4>{{ $local=='en'?$portfoli->name:$portfoli->name_ar }}</h4>
                        <p>{{$local=='en'?$portfoli->short_desc:$portfoli->short_desc_ar}}</p>
                      </a>
                    </div>
                  @endif
                @endforeach
              </div>
            @endforeach
          </ul>
        </div>
      </div>
    </section>


    <!-- End Portfolio Section -->
    <!-- ======= Investment ideas ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>{{ __('home.investmentideas') }}</h2>
          <ul class="shuffle">
            <!-- portfolio item 1 -->

            <div class="imgs-container" data-aos="fade-up">
              @foreach ($investment as $investment)

                <div class="box">
                  <a href="{{ route('portfolioshow',$investment->slug) }}">
                    <img src="{{ asset('storage/'.$investment->cover) }}" class="img-fluid" alt="">
                    <h4>{{ $local=='en'?$investment->name:$investment->name_ar }}</h4>
                    <p>{{$local=='en'?$investment->short_desc:$investment->short_desc_ar}}</p>
                  </a>
                </div>

              @endforeach
            </div>
          </ul>
        </div>
      </div>
    </section>
    <!-- Investment ideas -->
    <!-- Project for Sale -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>{{ __('home.projectforsale') }} </h2>
          <ul class="shuffle">
            <!-- portfolio item 1 -->

            <div class="imgs-container" data-aos="fade-up">
              @foreach ($comingSoon as $comingSoon)

                <div class="box">
                  <a href="{{ route('portfolioshow',$comingSoon->slug) }}">
                    <img src="{{ asset('storage/'.$comingSoon->cover) }}" class="img-fluid" alt="">
                    <h4>{{$local=='en'? $comingSoon->name:$comingSoon->name_ar }}</h4>
                    <p>{{$local=='en'?$comingSoon->short_desc:$comingSoon->short_desc_ar}}</p>
                  </a>
                </div>

              @endforeach
            </div>
          </ul>
        </div>
      </div>
    </section>
    <!-- End Project Sale -->
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