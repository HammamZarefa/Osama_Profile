@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.service.update',$service->id) }}" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="container">

        <div class="form-group ml-5">
            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
            <div class="col-sm-9">
                <input type="text" name='icon' class="form-control {{$errors->first('icon') ? "is-invalid" : "" }} " value="{{old('icon') ? old('icon') : $service->icon}}" id="icon" placeholder="icofont-map">
                <div class="invalid-feedback">
                    {{ $errors->first('icon') }}    
                </div>
            </div>
            <a href="https://icofont.com/icons" target="_blank" rel="noopener noreferrer">
                <span class="col-sm-2 col-form-label" style="color: red">https://icofont.com/icons</span>
            </a>
        </div>

        <div class="form-group ml-5">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-9">
                <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title') ? old('title') : $service->title}}" id="title" placeholder="Title">
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="title" class="col-sm-2 col-form-label">Title AR</label>
            <div class="col-sm-9">
                <input type="text" name='title_ar' class="form-control {{$errors->first('title_ar') ? "is-invalid" : "" }} " value="{{old('title_ar') ? old('title_ar') : $service->title_ar}}" id="title_ar" placeholder="Title AR">
                <div class="invalid-feedback">
                    {{ $errors->first('title_ar') }}
                </div>
            </div>
        </div>



        <div class="form-group ml-5">
            <label for="quote" class="col-sm-2 col-form-label">Quote</label>
            <div class="col-sm-9">
                <input type="text" name='quote' class="form-control {{$errors->first('quote') ? "is-invalid" : "" }} " value="{{old('quote') ? old('quote') : $service->quote}}" id="quote" placeholder="Quote">
                <div class="invalid-feedback">
                    {{ $errors->first('quote') }}    
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="quote_ar" class="col-sm-2 col-form-label">Quote AR</label>
            <div class="col-sm-9">
                <input type="text" name='quote_ar' class="form-control {{$errors->first('quote_ar') ? "is-invalid" : "" }} " value="{{old('quote_ar') ? old('quote_ar') : $service->quote_ar}}" id="quote_ar" placeholder="Quote AR">
                <div class="invalid-feedback">
                    {{ $errors->first('quote_ar') }}
                </div>
            </div>
        </div>


        <div class="form-group ml-5">
            <label for="desc" class="col-sm-2 col-form-label">Desc</label>
            <div class="col-sm-9">
                {{-- <input type="text" class="form-control" id="title" placeholder="Title"> --}}
                <textarea name="desc" id="summernote" cols="30" rows="10" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} ">{{old('desc') ? old('desc') : $service->desc}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}    
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="desc_ar" class="col-sm-2 col-form-label">Desc AR</label>
            <div class="col-sm-9">
                {{-- <input type="text" class="form-control" id="title" placeholder="Title"> --}}
                <textarea name="desc_ar" id="summernote" cols="30" rows="10" class="form-control {{$errors->first('desc_ar') ? "is-invalid" : "" }} ">{{old('desc_ar') ? old('desc_ar') : $service->desc_ar}}</textarea>
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

    </div>      
 
</form>
@endsection