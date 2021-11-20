@extends('layouts.front')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ __('home.portfoliodetails') }} </h2>
          <ol>
            <li><a href="/">{{ __('home.home') }} </a></li>
            <li>{{ __('home.portfoliodetails') }} </li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <img src="{{ asset('storage/'.$portfolio->cover) }}" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info">
            <h3>{{ __('home.projectinformation') }}</h3>
            <ul>
              <li><strong>{{ __('home.category') }}</strong>:  {{ $portfolio->pcategory->name }}</li>
              <li><strong>{{ __('home.client') }}</strong>: {{ $portfolio->client }}</li>
              <li><strong>{{ __('home.projectdate') }}</strong>: {{ Carbon\Carbon::parse($portfolio->date)->format("d F, Y") }}</li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{ $portfolio->name }}</h2>
          <p>
            {!! $portfolio->desc !!}
          </p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection