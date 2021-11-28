@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('about.update',1) }}" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group ml-5">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-7">
      <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title') ? old('title') : $about->title}}" id="link" placeholder="Title About">
      <div class="invalid-feedback">
        {{ $errors->first('title') }}    
    </div> 
    </div>
  </div>

    <div class="form-group ml-5">
        <label for="title" class="col-sm-2 col-form-label">Title AR</label>
        <div class="col-sm-7">
            <input type="text" name='title_ar' class="form-control {{$errors->first('title_ar') ? "is-invalid" : "" }} " value="{{old('title_ar') ? old('title_ar') : $about->title_ar}}" id="link" placeholder="Title About AR">
            <div class="invalid-feedback">
                {{ $errors->first('title_ar') }}
            </div>
        </div>
    </div>
  <div class="form-group ml-5">
    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
    <div class="col-sm-7">
      <input type="text" name='subject' class="form-control {{$errors->first('subject') ? "is-invalid" : "" }} " value="{{old('subject') ? old('subject') : $about->subject}}" id="link" placeholder="Slogan">
      <div class="invalid-feedback">
        {{ $errors->first('subject') }}    
    </div> 
    </div>
  </div>

    <div class="form-group ml-5">
        <label for="subject_ar" class="col-sm-2 col-form-label">Subject AR</label>
        <div class="col-sm-7">
            <input type="text" name='subject_ar' class="form-control {{$errors->first('subject_ar') ? "is-invalid" : "" }} " value="{{old('subject_ar') ? old('subject_ar') : $about->subject_ar}}" id="link" placeholder="Subject AR">
            <div class="invalid-feedback">
                {{ $errors->first('subject_ar') }}
            </div>
        </div>
    </div>

    <div class="form-group ml-5">
        <label for="desc" class="col-sm-2 col-form-label">Desc</label>
        <div class="col-sm-7">
          <textarea name="desc" cols="30" rows="10" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} " id="summernote">{{old('desc') ? old('desc') : $about->desc}}</textarea>
          <div class="invalid-feedback">
            {{ $errors->first('desc') }}    
        </div> 
        </div>
      
    </div>

    <div class="form-group ml-5">
        <label for="desc_ar" class="col-sm-2 col-form-label">Desc_AR</label>
        <div class="col-sm-7">
            <textarea name="desc_ar" cols="30" rows="10" class="form-control {{$errors->first('desc_ar') ? "is-invalid" : "" }} " id="summernote_ar">{{old('desc_ar') ? old('desc_ar') : $about->desc_ar}}</textarea>
            <div class="invalid-feedback">
                {{ $errors->first('desc_ar') }}
            </div>
        </div>

    </div>

    <div class="form-group ml-5">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
  </form>
@endsection
