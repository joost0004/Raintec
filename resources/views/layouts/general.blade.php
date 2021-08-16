<!DOCTYPE html>
<html>
    <head>
    <title>Raintec</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    </head>
    <body>

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
              <a class="navbar-item" href="/">
                <img src="/img/logo.png">
              </a>
            </div>


            <div class="navbar-end">
            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
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

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
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
