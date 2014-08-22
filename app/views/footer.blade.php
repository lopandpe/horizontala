<div id="footer">
    <div id="nav_footer">
        <ul>
            <li><a href="http://www.horizontala.info/wordpress/contacta-con-horizontala">Escríbenos</a></li>
            <li><a href="http://horizontala.info/wordpress/aviso-legal">Aviso legal</a></li>
            <li>
                @if (null!==(Auth::user()))
                    <h1>{{ Auth::user()->username; }}</h1>
                    <a href="{{ route('logout') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
            </li>
        </ul>

    </div>
</div>