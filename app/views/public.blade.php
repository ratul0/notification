<h1>Coming Soon</h1>
@if(Auth::check())
	<!-- <a href="{{ URL::route('logout') }}">Logout</a> -->
	{{link_to_route('logout','Logout')}}
@else
	<!-- <a href="{{ URL::route('login') }}">Login</a> -->
	{{link_to_route('login','Login')}}
@endif
