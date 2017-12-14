<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Company</a>
  <ul>
    <li class="@if(curr_page() == 'dashboard') active @endif" ><a href="{{route('backend.dashboard.index')}}"><i class="icon icon-dashboard"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"><a href="{{route('backend.company.index')}}"><i class="icon icon-home"></i> <span>Company</span> </a>
      <ul>
        <li><a href="{{route('backend.company.index')}}">Company List</a></li>
        <li><a href="{{route('backend.company.regist')}}">Company Regist</a></li>
      </ul>
    </li>
    <li class="submenu"><a href="{{route('backend.contact.index')}}"><i class="icon icon-home"></i> <span>Contact</span> </a>
      <ul>
        <li><a href="{{route('backend.contact.index')}}">Contact List</a></li>
        <li><a href="{{route('backend.contact.regist')}}">Contact Regist</a></li>
      </ul>
    </li>
    <li class="submenu @if(curr_page() == 'contract') active @endif"> <a href="{{route('backend.contract.index')}}"><i class="icon icon-book"></i> <span>Contract</span></a>
      <ul>
        <li><a href="{{route('backend.contract.index')}}">Contracts List</a></li>
        <li><a href="{{route('backend.contract.regist')}}">Contract Regist</a></li>
      </ul>
    </li>
    <li class="submenu @if(curr_page() == 'meeting') active @endif"> <a href="{{route('backend.meeting.index')}}"><i class="icon icon-group"></i> <span>Meeting</span></a>
      <ul>
        <li><a href="{{route('backend.meeting.index')}}">Meeting List</a></li>
        <li><a href="#">Meeting Regist</a></li>
      </ul>
    </li>
    <li class="submenu @if(curr_page() == 'users') active @endif"> <a href="{{route('backend.users.index')}}"><i class="icon icon-user"></i> <span>Users</span> </a>
      <ul>
        <li><a href="{{route('backend.users.index')}}">User List</a></li>
        <li><a href="#">User Regist</a></li>
      </ul>
    </li>
    <!-- <li class="content"></li>  -->   
  </ul>
</div>