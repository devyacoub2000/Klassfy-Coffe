
@extends('admin.app')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create Food</h1>

    <form action="{{route('admin.food.store')}}" method="POST" enctype="multipart/form-data">
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
                       <label for="body_en"> Body English </label>
                       <input type="text" name="body_en" placeholder="Body En " value="{{old('body_en')}}" class="form-control @error('body_en') is-invalid @enderror">
                       @error('body_en')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>

                   <div class="col-md-6">
                       <label for="body_ar"> Body Arabic </label>
                       <input type="text" name="body_ar" placeholder="Body Ar " value="{{old('body_ar')}}" class="form-control @error('body_ar') is-invalid @enderror">
                       @error('body_ar')
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
              <div class="row">
                   <div class="col-md-12">
                       <label for="Price"> Price </label>
                       <input type="number" name="price" placeholder="Price " value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror">
                       @error('price')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>
              </div>
         </div>

         <div class="mb-3">
             <div class="row">
                 <div class="col-md-4">
                     <select name="time_id" class="form-control @error('time_id') is-invalid @enderror" value="{{old('time_id')}}">
                        @foreach($times as $time)
                          <option value="{{$time->id}}">
                               {{$time->trans_name}}
                          </option>
                        @endforeach
                     </select>
                 </div>
             </div>
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