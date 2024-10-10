
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
    <h1 class="h3 mb-4 text-gray-800">{{__('admin.foods')}}</h1>
    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th>#</th>
             <th>{{__('admin.img')}}</th>
             <th>{{__('admin.name')}}</th>
             <th>{{__('admin.price')}}</th>
             <th>{{__('admin.body')}}</th>
             <th>{{__('admin.time')}}</th>
             <th>Action</th>
         </tr>

         @forelse($data as $item)
          
            <tr>
             <td>{{$loop->iteration}}</td>
             <td><img width="100" src="{{$item->img_path}}"></td>
             <td>{{$item->trans_name}}</td>
             <td>${{$item->price}}</td>
             <td>{{$item->trans_body}}</td>
             <td>{{$item->time->trans_name}}</td>

             <td>
                  <a href="{{route('admin.food.edit', $item->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i>
                 </a>
                  <form class="d-inline" action="{{route('admin.food.destroy', $item->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="return confirm('Are u Sure ?')"> <i class="fas fa-trash"></i></button>
                  </form>
             </td>
            </tr> 
         
         @empty
            
               <tr>
                  <td colspan="7" class="text-center"> No Data Found </td>
               </tr>
            
         @endforelse
    </table>

    {{$data->links()}}

@endsection
