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
            <ul id="portfolio-flters">
              <!-- {{--<li data-filter="*" class="filter-active">All</li>--}} -->
              @foreach ($pcategories as $category)
                <li data-filter=".{{ $category->id }}">{{ $category->name }}</li>
                {{--<div class="row portfolio-container" data-aos="fade-up">--}}
          @foreach ($portfolio as $portfoli)
            @if($category->id ==$portfoli->pcategory_id)
          <div class="col-lg-3 col-md-3 portfolio-item {{ $portfoli->pcategory_id }}">
            <img src="{{ asset('storage/'.$portfoli->cover) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <a href="{{ asset('storage/'.$portfoli->cover) }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $portfoli->name }}"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolioshow',$portfoli->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
            <h5 class="portfolio-name">{{ $portfoli->name }}</h5>
            {!!$portfoli->desc!!}
          </div>
          
              @endif
          @endforeach
          @endforeach
        </div>           
            </ul>
          </div>
        {{--</div>--}}
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
@endsection