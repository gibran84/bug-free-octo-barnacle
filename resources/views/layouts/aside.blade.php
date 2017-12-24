<ul class="nav flex-column">

	@can('show-places')
  <li class="nav-item">
    <a class="nav-link" href="{{route('places')}}">Lugares</a>
  </li>
  @endcan
  @can('show-groups')
  <li class="nav-item">
    <a class="nav-link" href="{{route('groups')}}">Grupos</a>
  </li>
  @endcan
  <li class="nav-item">
    <a class="nav-link" href="{{route('users')}}">Usuarios</a>
  </li>
</ul>