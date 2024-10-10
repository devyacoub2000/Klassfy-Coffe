
    @extends('front.master')

    @section('title', 'Single Time')

    @section('content') 

       <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>{{$time->trans_name}}</h6>
                        <h2>
                            <img src="{{$time->Img_Path}}"  width="100px">
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <div class="row">
                                  @foreach($time->food as $item)  
                                    <div class="col-md-6">
                                        <div class="tab-item">
                                            <img src="{{$item->Img_Path}}" alt="">
                                            <h4>{{$item->trans_name}}</h4>
                                            <p>{{$item->trans_body}}</p>
                                            <div class="price">
                                                <h6>${{$item->price}}</h6>
                                            </div>
                                        </div>
                                     </div> 
                                  @endforeach   


                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
          
    @endsection

  