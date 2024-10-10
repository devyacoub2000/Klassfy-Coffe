<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Klassfy <sup>Coffe</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__('admin.dash')}}</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.all_reservations')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{__('admin.reve')}}</span></a>
            </li>


           <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsechef"
                    aria-expanded="true" aria-controls="collapsechef">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>{{__('admin.chef')}}</span>
                </a>
                <div id="collapsechef" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.chef.index')}}">{{__('admin.chefs')}}</a>
                        <a class="collapse-item" href="{{route('admin.chef.create')}}">
                        {{__('admin.add')}}</a>
                    </div>
                </div>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetime"
                    aria-expanded="true" aria-controls="collapsetime">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>{{__('admin.time')}}</span>
                </a>
                <div id="collapsetime" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.time.index')}}">
                            {{__('admin.times')}}
                        </a>
                        <a class="collapse-item" href="{{route('admin.time.create')}}">{{__('admin.add')}}</a>
                    </div>
                </div>
            </li>


              <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefood"
                    aria-expanded="true" aria-controls="collapsefood">
                    <i class="fas fa-fw fa-heart"></i>
                    <span>{{__('admin.food')}}</span>
                </a>
                <div id="collapsefood" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{route('admin.food.index')}}">{{__('admin.foods')}}</a>
                        <a class="collapse-item" href="{{route('admin.food.create')}}">{{__('admin.add')}}</a>
                    </div>
                </div>
            </li>

          

        </ul>















