<aside id="leftsidebar" class="sidebar"> 
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="{{asset('assets/images/xs/avatar1.jpg')}}" width="48" height="48" alt="User" /> </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Admin</div>
            <div class="email">example@gmail.com</div>
            <div class="btn-group user-helper-dropdown"> <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu">
                 
         
                  
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info --> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>                
            <li><a href="{{route('blog.listing')}}"><i class="zmdi zmdi-label-alt"></i><span>Blog Listing</span> </a> </li>
            <li><a href="{{url('/')}}"><i class="zmdi zmdi-label-alt"></i><span>Yajra User Listing</span> </a> </li>
        </ul>
    </div>
    <!-- #Menu --> 
</aside>