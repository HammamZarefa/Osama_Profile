@extends('layouts.admin')

@section('styles')
@section('styles')
<style>
   .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .picture {
  width: 800px;
  height: 400px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.picture:hover {
  border-color: #2ca8ff;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100%;
  height: 100%;
}
</style>
@endsection
@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('admin.inverstment.update',$inverstment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">

        <div class="form-group">

            <div class="picture-container">
    
                <div class="picture">
    
                    <img src="{{ asset('storage/'.$inverstment->cover) }}" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>
    
                    <input type="file" id="wizard-picture" name="cover" class="form-control {{$errors->first('cover') ? "is-invalid" : "" }} ">
    
                    <div class="invalid-feedback">
                        {{ $errors->first('cover') }}    
                    </div>  
    
                </div>
    
                <h6>Pilih Cover</h6>
    
            </div>
    
        </div>

        <div class="form-group ml-5">

            <label for="category" class="col-sm-2 col-form-label">Category</label>

            <div class="col-sm-9">

                <select name='category' class="form-control {{$errors->first('category') ? "is-invalid" : "" }} " id="category">
                    <option disabled selected>Choose One!</option>
                    @foreach ($categories as $category)
                    <option {{ $category->id == $inverstment->pcategory_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('category') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="name" class="col-sm-2 col-form-label">Name</label>

            <div class="col-sm-9">

                <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name') ? old('name') : $inverstment->name}}" id="name" placeholder="Project Name">

                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">
            <label for="name" class="col-sm-2 col-form-label">Name AR</label>
            <div class="col-sm-9">
                <input type="text" name='name_ar' class="form-control {{$errors->first('name_ar') ? "is-invalid" : "" }} " value="{{old('name_ar') ? old('name_ar') : $inverstment->name}}" id="name_ar" placeholder="Project Name AR">
                <div class="invalid-feedback">
                    {{ $errors->first('name_ar') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="short_desc" class="col-sm-2 col-form-label">Short Desc</label>
            <div class="col-sm-9">
                <input type="text" name='short_desc' class="form-control {{$errors->first('short_desc') ? "is-invalid" : "" }} " value="{{old('short_desc') ? old('short_desc') : $inverstment->short_desc}}" id="short_desc" placeholder="Short Description">
                <div class="invalid-feedback">
                    {{ $errors->first('short_desc') }}
                </div>
            </div>
        </div>
        <div class="form-group ml-5">
            <label for="short_desc" class="col-sm-2 col-form-label">Short Desc AR</label>
            <div class="col-sm-9">
                <input type="text" name='short_desc_ar' class="form-control {{$errors->first('short_desc_ar') ? "is-invalid" : "" }} " value="{{old('short_desc_ar') ? old('short_desc') : $inverstment->short_desc_ar}}" id="short_desc_ar" placeholder="Short Description AR">
                <div class="invalid-feedback">
                    {{ $errors->first('short_desc_ar') }}
                </div>
            </div>
        </div>

        <div class="form-group ml-5">

            <label for="client" class="col-sm-2 col-form-label">Link</label>

            <div class="col-sm-9">

                <input type="text" name='client' class="form-control {{$errors->first('client') ? "is-invalid" : "" }} " value="{{old('client') ? old('client') : $inverstment->client}}" id="client" placeholder="client">

                <div class="invalid-feedback">
                    {{ $errors->first('client') }}
                </div>

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="date" class="col-sm-2 col-form-label">Project Date</label>

            <div class="col-sm-9">

                <input type="date" name='date' class="form-control {{$errors->first('date') ? "is-invalid" : "" }} " value="{{old('date') ? old('date') : $inverstment->date}}" id="date" >

                <div class="invalid-feedback">
                    {{ $errors->first('date') }}
                </div>

            </div>

        </div>

        <div class="form-group ml-5">
            <label for="desc" class="col-sm-2 col-form-label">Desc</label>
            <div class="col-sm-9">
                <textarea name="desc" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} "  id="summernote" cols="30" rows="10">{{old('desc') ? old('desc') : $inverstment->desc}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}
                </div>
            </div>
        </div>

        <div class="form-group ml-5">
            <label for="desc" class="col-sm-2 col-form-label">Desc AR</label>
            <div class="col-sm-9">
                <textarea name="desc_ar" class="form-control {{$errors->first('desc_ar') ? "is-invalid" : "" }} "  id="summernote" cols="30" rows="10">{{old('desc_ar') ? old('desc_ar') : $inverstment->desc_ar}}</textarea>
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

@push('scripts')

<script>
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
      readURL(this);
  });
  //Function to show image before upload
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush