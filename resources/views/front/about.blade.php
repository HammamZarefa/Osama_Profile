@extends('layouts.front')
{{ $local=session()->get('locale')}}
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2>{{ __('home.about') }}</h2>
            <ol>
              <li><a href="/">{{ __('home.home') }}</a></li>
              <li>{{ __('home.about') }}</li>
            </ol>
          </div>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= About Us Section ======= -->
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
  
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right" style="display:flex;flex-direction: column;align-items: center;">
              <h2>{{ $local=='en'?$about->title:$about->title_ar }}</h2>
              <h3>{{ $local=='en'?$about->subject:$about->subject }}</h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" style="display:flex;flex-direction: column;align-items: center;">
              <p>
                {!! $local=='en'?$about->desc:$about->desc_ar !!}
              </p>
             
            </div>
          </div>
  
        </div>
      </section><!-- End About Us Section -->


       <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>{{ __('home.frequentlyaskedquestions') }}</h2>
          </div>
  
          <div class="faq-list">
            <ul>
              @foreach ($faq as $key => $faq)
              <li data-aos="fade-up">
                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-{{ $faq->id }}">{{ $faq->question }} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-{{ $faq->id }}" class="collapse {{$key == 0 ? 'show' : '' }}" data-parent=".faq-list">
                  <p>
                    {{ $faq->answer }}
                  </p>
                </div>
              </li>
              @endforeach
  
            </ul>
          </div>
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
  
    </main><!-- End #main -->
@endsection