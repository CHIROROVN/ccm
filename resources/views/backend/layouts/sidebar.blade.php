<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Company</a>
  <ul>
    <li class="active"><a href="{{route('backend.dashboard.index')}}"><i class="icon icon-dashboard"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"><a href="#"><i class="icon icon-home"></i> <span>Company</span> </a>
      <ul>
        <li><a href="#">Company List</a></li>
        <li><a href="#">Company Regist</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Contract</span></a>
      <ul>
        <li><a href="#">Contracts List</a></li>
        <li><a href="#">Contract Regist</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="{{route('backend.users.index')}}"><i class="icon icon-user"></i> <span>Users</span> </a>
      <ul>
        <li><a href="{{route('backend.users.index')}}">User List</a></li>
        <li><a href="#">User Regist</a></li>
      </ul>
    </li>
    <li class="content"></li>    
  </ul>
</div>