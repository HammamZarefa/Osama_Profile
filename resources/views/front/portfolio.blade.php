@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ __('home.portfolio') }}</h2>
          <ol>
            <li><a href="/">{{ __('home.home') }}</a></li>
            <li>{{ __('home.portfolio') }}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>{{ __('home.portfolio') }}</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul class="shuffle">
              <!-- portfolio item 1 -->
              @foreach ($pcategories as $category)
                <li data-filter=".{{ $category->id }}">{{ $category->name }}</li>
                <div class="imgs-container" data-aos="fade-up">
                  @foreach ($portfolio as $portfoli)
                    @if($category->id ==$portfoli->pcategory_id)
                      <div class="box">
                        <a href="{{ route('portfolioshow',$portfoli->slug) }}">
                          <img src="{{ asset('storage/'.$portfoli->cover) }}" class="img-fluid" alt="">
                          <h4>{{ $portfoli->name }}</h4>
                          <p>{!!$portfoli->short_desc!!}</p>
                        </a>
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

  </main><!-- End #main -->
@endsection