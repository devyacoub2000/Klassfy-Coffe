
@extends('admin.app')

@section('title', 'Edit')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Time</h1>

    <form action="{{route('admin.time.update', $time->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('put') 

         <div class="mb-3">
              <div class="row">
                  <div class="col-md-6">
                       <label for="name_en"> Name English </label>
                       <input type="text" name="name_en" placeholder="Name En " value="{{old('name_en', $time->name_en)}}" class="form-control @error('name_en') is-invalid @enderror">
                       @error('name_en')
                         <small class="invalid-feedback"> {{$message}} </small>
                       @enderror
                  </div>

                  <div class="col-md-6">
                       <label for="name_ar"> Name Arabic </label>
                       <input type="text" name="name_ar" placeholder="Name Ar " value="{{old('name_ar', $time->name_ar)}}" class="form-control @error('name_ar') is-invalid @enderror">
                       @error('name_ar')
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
              @php 
                $src = '';
                if($time->image) {
                    $src = asset('images/'.$time->image->path);
                }
              @endphp
              <img src="{{$src}}" width="100" id="preview">
         </div>

         <div class="mb-3">
              <button class="btn btn-info"> <i class="fas fa-edit"></i> Save </button>
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