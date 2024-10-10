
@extends('admin.app')

@section('title', 'index')

@section('content')
     @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
     @endif 
    <h1 class="h3 mb-4 text-gray-800">{{__('admin.times')}}</h1>
    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th>#</th>
             <th>{{__('admin.img')}}</th>
             <th>{{__('admin.name')}}</th>
             <th>Action</th>
         </tr>

         @forelse($times as $time)
         <tr>
             <td>{{$loop->iteration}}</td>
             <td><img width="100" src="{{$time->img_path}}"></td>
             <td>{{$time->trans_name}}</td>
             <td>
                  <a href="{{route('admin.time.edit', $time->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i>
                 </a>
                  <form class="d-inline" action="{{route('admin.time.destroy', $time->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="return confirm('Are u Sure ?')"> <i class="fas fa-trash"></i></button>
                  </form>
             </td>
            </tr> 
         
         @empty
            
               <tr>
                  <td colspan="5" class="text-center"> No Data Found </td>
               </tr>
            
         @endforelse
    </table>

    {{$times->links()}}

@endsection
