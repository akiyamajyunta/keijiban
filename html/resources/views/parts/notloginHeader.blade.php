<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
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
                            <a>
                                <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0"
                                    preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false"
                                    xmlns="http://www.w3.org/2000/svg">
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</body>

</html>

