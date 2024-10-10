
@extends('admin.app')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create Chef</h1>

    <form action="{{route('admin.chef.store')}}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="mb-3">
              <div class="row">
                  <div class="col-md-6">
                       <label for="name_en"> Name English </label>
                       <input type="text" name="name_en" placeholder="Name En " value="{{old('name_en')}}" class="form-control @error('name_en') is-invalid @enderror">
                       @error('name_en')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>

                  <div class="col-md-6">
                       <label for="name_ar"> Name Arabic </label>
                       <input type="text" name="name_ar" placeholder="Name Ar " value="{{old('name_ar')}}" class="form-control @error('name_ar') is-invalid @enderror">
                       @error('name_ar')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>
              </div>
         </div>

          <div class="mb-3">
              <div class="row">
                  <div class="col-md-6">
                       <label for="special_en"> Special English </label>
                       <input type="text" name="special_en" placeholder="Special En " value="{{old('special_en')}}" class="form-control @error('special_en') is-invalid @enderror">
                       @error('special_en')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>

                <div class="col-md-6">
                       <label for="special_ar"> Special Arabic </label>
                       <input type="text" name="special_ar" placeholder="Special Ar " value="{{old('special_ar')}}" class="form-control @error('special_ar') is-invalid @enderror">
                       @error('special_ar')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>
              </div>
         </div>

         <div class="mb-3">
              <label for="image"> Image </label>
              <input onchange="return showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
                <small class="invalid-feedback"> {{$message}}</small>
              @enderror
              <img src="" width="100" id="preview">
         </div>

         <div class="mb-3">
              <button class="btn btn-success"> <i class="fas fa-save"></i> Save </button>
         </div>



    </form>
@endsection
@section('js')
   <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
@endsection