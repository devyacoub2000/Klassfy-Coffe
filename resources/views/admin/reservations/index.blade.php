
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
    <h1 class="h3 mb-4 text-gray-800">{{__('admin.reve')}}</h1>
    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th>#</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone Number</th>
             <th>Number Of Guests</th>
             <th>Date</th>
             <th>Message</th>
             <th>Time</th>
             <th>Status</th>
             <th>Action</th>
         </tr>

         @forelse($reservations as $item)
          
            <tr>
             <td>{{$loop->iteration}}</td>
             <td>{{$item->name}}</td>
             <td>${{$item->email}}</td>
             <td>{{$item->phone}}</td>
             <td>{{$item->number_guests}}</td>
             <td>{{$item->date}}</td>
             <td>{{Str::words($item->message, 6, '..')}}</td>
             <td>{{$item->time->trans_name}}</td>
             <td class="@php  
                       if($item->status == 'pending') echo 'text-warning';
                       elseif($item->status == 'cancel') echo 'text-danger';
                       else 
                       echo 'text-success';
              @endphp">{{$item->status}}</td>
             <td>
                  <form class=""text-center action="{{route('admin.update_reservation', $item->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('put')
                      <select name="status" class="mb-1 form-control" onchange="this.form.submit()">

                            <option value="cancel" 
                            <?php if($item->status == 'cancel') echo 'selected' ?>>   
                              Cancel
                            </option>

                           <option value="confirmed" <?php if($item->status == 'confirmed') echo 'selected' ?>>
                              Confirmed
                          </option>

                      </select>
                  </form>
             </td>
            </tr> 
         
         @empty
            
               <tr>
                  <td colspan="7" class="text-center"> No Data Found </td>
               </tr>
            
         @endforelse
    </table>

    {{$reservations->links()}}

@endsection
