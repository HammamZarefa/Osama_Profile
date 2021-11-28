@extends('layouts.front')

@section('content')
<main id="main">
{{ $local=session()->get('locale')}}
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $local=='en'?$service->title: $service->title}}</h2>
          <ol>
            <li><a href="/">{{ __('home.home') }}</a></li>
            <li>{{ $local=='en'?$service->title: $service->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
        <div class="row">

          {!! $local=='en'?$service->desc: $service->desc!!}

        </div>
      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
@endsection