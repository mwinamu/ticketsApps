<div id="app" >
    <nav class="navbar navbar-default navbar-static-top" style="background-color: steelblue">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="color: black">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->


                        <li><a href="{{ route('quest.raiseTicket') }}" style="color: black">Raise Ticket</a></li>

                        <li><a href="{{ route('quest.ticket') }}" style="color: black">Tickets</a></li>

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>