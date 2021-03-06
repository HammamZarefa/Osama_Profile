@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.pcategory.update',$pcategory->id) }}" method="POST">
    @csrf

    <div class="container">

        <div class="form-group ml-5">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-7"><input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name') ? old('name') : $pcategory->name}}" id="name" placeholder="Name">
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="name_ar" class="col-sm-2 col-form-label">Name AR</label>
            <div class="col-sm-7"><input type="text" name='name_ar' class="form-control {{$errors->first('name_ar') ? "is-invalid" : "" }} " value="{{old('name_ar') ? old('name_ar') : $pcategory->name_ar}}" id="name_ar" placeholder="Name AR">
                <div class="invalid-feedback">
                    {{ $errors->first('name_ar') }}
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