<nav>
    <ul>
        <!--  First active class -->
        <li class="{{ Request::is( '/') ? 'active' : '' }}">
        	<a href="{{ URL::to( '/') }}">Home</a>
        </li>
        <li class="{{ Request::is( 'about-us') ? 'active' : '' }}">
        	<a href="{{ URL::to( 'about-us') }}">About us</a>
        </li>				
        <li class="{{ Request::is( 'portfolio') ? 'active' : '' }}">
        	<a href="{{ URL::to( 'portfolio') }}">Portfolio</a>
        </li>
        <li class="{{ Request::is( 'contact') ? 'active' : '' }}">
        	<a href="{{ URL::to( 'contact') }}">Contact</a>
        </li>
    </ul>
</nav>		
