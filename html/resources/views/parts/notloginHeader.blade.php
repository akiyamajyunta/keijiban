<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/headerSmartphone.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/headerTablet.css')}}" />
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a class="brand">twister</a>
                <div class="search">
                    <!-- <button class="search__toggle" aria-label="Open search">Search </button> -->
                    <form class="search__form" action="{{route('search')}}">
                        <label class="sr-only" for="search">検索</label>
                        <input type="search" name="search" id="search" placeholder="検索" />
                    </form>
                </div>
                <div class="personal_info">
                    <p class="name"></p>
                    <p class="name"></p>
                </div>
            </div>
            <div class="site-header__end">
                <nav class="nav">
                    <ul class="nav__wrapper">
                        <li class="nav__item">
                            <a href="{{route('comment.store')}}">
                                <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0"
                                    preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path

                                        d="M18.94,14H5.06L5.79,8.44A6.26,6.26,0,0,1,12,3h0a6.26,6.26,0,0,1,6.21,5.44Zm2,5-1.71-4H4.78L3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19Z"
                                        class="inactive-item" style="fill-opacity: 1"></path>
                                    <path
                                        d="M20.94,19L19,14.49s-0.41-3.06-.8-6.06A6.26,6.26,0,0,0,12,3h0A6.26,6.26,0,0,0,5.79,8.44L5,14.49,3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19ZM12,4.75h0a4.39,4.39,0,0,1,4.35,3.81c0.28,2.1.56,4.35,0.7,5.44H7L7.65,8.56A4.39,4.39,0,0,1,12,4.75ZM5.52,18l1.3-3H17.18l1.3,3h-13Z"
                                        class="active-item" style="fill: currentColor"></path>
                                </svg>
                                <span class="header_name">Login</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>