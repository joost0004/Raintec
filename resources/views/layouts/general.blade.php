<!DOCTYPE html>
<html>

<head>
    <title>Raintec</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <style>
        hr.divider {
            border-top: 2px solid rgb(175, 175, 175);
            border-radius: 1px;
            margin-left: auto;
            margin-right: auto;
            margin-top: auto;
            content: '';
            width: 90%
        }
    </style>
</head>

<body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item">
                <img src="/img/logo.png">
            </a>
        </div>

        <div class="navbar-start">
            <a href="/dashboard" class="navbar-item">Home</a>

            <a href="{{ url()->previous() }}" class="navbar-item">Back</a>

        </div>


        <div class="navbar-end">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
                <div>{{ Auth::user()->name }}</div>
            </a>

            <div class="navbar-dropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log uit') }}
                    </x-dropdown-link>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </nav>
    </header>
    <br>
    @yield ('content')
</body>

</html>
