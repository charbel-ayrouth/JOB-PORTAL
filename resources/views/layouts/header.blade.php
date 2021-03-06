<head>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }


        .section-title {
            color: #87629A;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            color: #23424A;
            font-weight: 900;
            background-color: #38CFD9;
            padding: .75em 2em;
            border-radius: 100px;
        }

        .btn:hover,
        .btn:focus {
            opacity: .75;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            /* added for nav-toggle positioning */
            position: relative;
            background: #072A2D;
        }

        header {
            background: #136c72;
            padding: 1em 0;
            text-align: center;
        }

        .nav {
            width: 100%;
        }



        .nav-toggle {
            cursor: pointer;
            border: 0;
            width: 3em;
            height: 3em;
            padding: 0em;
            border-radius: 50%;
            background: #072A2D;
            color: white;
            transition: opacity 250ms ease;

            position: absolute;
            left: 0;
        }

        .nav-toggle:focus,
        .nav-toggle:hover {
            opacity: .75;
        }

        .hamburger {
            width: 50%;
            position: relative;
        }

        .hamburger,
        .hamburger::before,
        .hamburger::after {
            display: block;
            margin: 0 auto;
            height: 3px;
            background: white;
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            width: 100%;
        }

        .hamburger::before {
            transform: translateY(-6px);
        }

        .hamburger::after {
            transform: translateY(3px);
        }

        /* made changes here from video
   to make it more accessible.

   Works the same :) */
        .nav {
            visibility: hidden;
            height: 0;
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .nav__list {
            margin: 0;
            padding: 0;
            list-style: none;
            font-size: .9rem;
        }

        .nav__item {
            margin-top: 1em;
        }

        .nav__link {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            ;
        }

        .nav__link--button {
            background: #fff;
            color: #136c72;
            padding: .25em 1em;
            border-radius: 10em;
        }

        .nav__link:hover {
            opacity: .75;
        }

        .nav--visible {
            visibility: visible;
            height: auto;
            position: relative;
        }


        .logo {
            height: 30px;
        }


        .hero {
            padding: 100px 0;
            background-color: #23424A;
            color: #FFF;
        }

        .hero__img {
            margin-top: 2em;
        }


        .hero p {
            margin-bottom: 3em;
        }

        .main {
            margin-top: 3em;
        }


        .sidebar {
            padding: 1em;
            text-align: center;
            color: #fff;
            background-color: #136c72;

        }


        @media (min-width: 800px) {


            .container {
                width: 100%;
                margin: 0 auto;
                /* added for nav-toggle positioning */
                position: relative;
                background: #072A2D;
            }

            .nav-toggle {
                display: none;
            }

            .nav {
                visibility: visible;
                display: flex;
                flex-direction: row;
                height: auto;
            }

            .row {
                display: flex;
                justify-content: space-between;

            }

            .hero__text {
                width: 62%;
            }

            .hero__img {
                width: 32%;
                align-self: flex-start;
                margin: 0;
            }

            .primary-content {
                width: 62%;
            }

            .sidebar {
                width: 32%;
            }

            .logo {
                margin-right: 1em;
            }

            .nav {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                height: auto;
                position: relative;
            }

            .nav__list {
                margin: 0;
                padding: 0;
                list-style: none;
                display: flex;
                align-items: center;
                font-size: .9rem;
            }


            .nav__item {
                margin: 0 0 0 1.5em;
            }

            .nav__item--push-right {
                margin-left: auto;
            }

            .nav__link {
                color: #fff;
                text-decoration: none;
                text-transform: uppercase;
                ;
            }

            .nav__link--button {
                background: #fff;
                color: #136c72;
                padding: .25em 1em;
                border-radius: 10em;
            }

            .nav__link:hover {
                opacity: .75;
            }

        }

    </style>
</head>

<body>
    <div class="container row">
        <button class="nav-toggle" aria-label="open navigation">
            <span class="hamburger"></span>
        </button>
        <a class="logo" href="#">
            {{-- <img src="img/logo.svg" alt="conquering responsive layouts"> --}}
        </a>
        <nav class="nav">
            <ul class="nav__list nav__list--primary">
            </ul>
            <ul class="nav__list nav__list--secondary">
                @auth
                    @if (auth()->user()->role_id == 2)
                        <li class="nav__item"><a href="{{ route('homepage_js') }}" class="nav__link">Home</a>
                        </li>
                    @elseif (auth()->user()->role_id == 3)
                        {{--<li class="nav__item"><a href="{{ route('JobProviderHome') }}"
                                class="nav__link">Home</a>
                        </li>--}}
                        <li class="nav__item"><a href="{{ route('jpHome') }}" class="nav__link">Home</a></li>
                    @endif
                    <li class="nav__item"><a href="{{ route('profile', ['id' => auth()->id()]) }}"
                            class="nav__link">Profile</a></li>
                    <li class="nav__item"><a href="/logout" class="nav__link">Logout</a></li>
                @endauth
                @guest
                    <li class="nav__item"><a href="{{ route('LoginPageRecruiter') }}" class="nav__link">Sign
                            In</a></li>
                    <li class="nav__item"><a href="#" class="nav__link nav__link--button">Sign up</a></li>
                @endguest
            </ul>
        </nav>
    </div>
    <script src="/js/header.js"></script>
</body>
