@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.category.store') }}" method="POST">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-7">
                <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name')}}" id="name" placeholder="Name">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>
            </div>
            <label for="name_ar" class="col-sm-2 col-form-label">Name AR</label>
            <div class="col-sm-7">
                <input type="text" name='name_ar' class="form-control {{$errors->first('name_ar') ? "is-invalid" : "" }} " value="{{old('name_ar')}}" id="name_ar" placeholder="Name AR">
                <div class="invalid-feedback">
                    {{ $errors->first('name_ar') }}
                </div>
            </div>

        </div>

        <div class="form-group ml-5">

            <label for="keyword" class="col-sm-2 col-form-label">Keyword</label>

            <div class="col-sm-7">

                <input type="text" name='keyword' class="form-control {{$errors->first('keyword') ? "is-invalid" : "" }} " value="{{old('keyword')}}" id="keyword" placeholder="Keyword">

                <div class="invalid-feedback">
                    {{ $errors->first('keyword') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="meta_desc" class="col-sm-2 col-form-label">Meta Desc</label>

            <div class="col-sm-7">

                <input type="text" name='meta_desc' class="form-control {{$errors->first('meta_desc') ? "is-invalid" : "" }} " value="{{old('meta_desc')}}" id="meta_desc" placeholder="Meta Description">

                <div class="invalid-feedback">
                    {{ $errors->first('meta_desc') }}    
                </div>   

            </div>

        </div>
   
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Create</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection