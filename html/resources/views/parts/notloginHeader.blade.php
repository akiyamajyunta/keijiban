<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Headers - 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-4.css" /> -->
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a class="brand">twister</a>
                <div class="search">
                    <button class="search__toggle" aria-label="Open search">Search </button>

                </div>
                <div class="personal_info">
                    <p class="name"></p>
                    <p class="name"></p>
                </div>
            </div>
            <div class="site-header__end">
                <nav class="nav">
                    <button class="nav__toggle" aria-expanded="false" type="button">menu </button>
                    <ul class="nav__wrapper">

                        <li class="nav__item">
                            <a>
                                <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg">
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <script src="js/header-4.js"></script>
</body>

</html>


<style>
    .brand {
        font-style: italic;
        font-weight: bold;
        font-size: 20px;
        color: orangered;
    }

    .personal_info {
        width: 300px;
        height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-left: 100px;
    }

    .name {
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        margin: 1px;
        color: orangered;
    }

    /* ヘッダー本体 */
    .site-header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: black;
        border-top: 6px solid red;
        border-bottom: 6px solid red;
        z-index: 1000;
        /* 必要に応じて調整 */

    }

    .header_name {
        color: red
    }

    .site-header__start {
        display: flex;
        align-items: center;
    }

    .site-header__end {
        display: flex;
        align-items: center;
    }

    .site-header__wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (min-width: 800px) {
        .site-header__wrapper {
            padding-top: 0;
            padding-bottom: 0;
        }
    }

    @media (min-width: 800px) {
        .nav__wrapper {
            display: flex;
        }
    }

    @media (max-width: 799px) {
        .nav__wrapper {
            position: absolute;
            top: calc(100% + 35px);
            right: 0;
            left: 0;
            z-index: -1;
            background-color: #d9f0f7;
            visibility: hidden;
            opacity: 0;
            transform: translateY(-100%);
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        .nav__wrapper.active {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* .nav__item:hover{
background-color: white;
} */
    .nav__item:not(:last-child) {
        margin-right: 0.5rem;
    }

    .nav__item a {
        display: block;
        padding: 1rem;
        border-left: 4px solid transparent;
    }

    @media (min-width: 800px) {
        .nav__item a {
            text-align: center;
            border-left: 0;
            border-bottom: 4px solid transparent;
        }
    }

    .nav__item svg {
        color: red;
        display: inline-block;
        vertical-align: middle;
        width: 28px;
        height: 28px;
        margin-right: 1rem;
    }

    @media (min-width: 800px) {
        .nav__item svg {
            display: block;
            margin: 0 auto 0.5rem;
        }
    }

    .nav__item.active a {
        border-left-color: #222;
    }

    @media (min-width: 800px) {
        .nav__item.active a {
            border-bottom-color: #222;
        }
    }

    .nav__toggle {
        display: none;
    }

    @media (max-width: 799px) {
        .nav__toggle {
            display: block;
            position: absolute;
            right: 1rem;
            top: 1rem;
        }
    }

    .search {
        display: flex;
        margin-left: 1rem;
    }

    .search__toggle {
        appearance: none;
        order: 1;
        font-size: 0;
        width: 34px;
        height: 34px;
        background: url("../img/header-3/search.svg") center right/22px no-repeat;
        border: 0;
        display: none;
    }

    @media (min-width: 800px) {
        .search__toggle {
            border-left: 1px solid #979797;
            padding-left: 10px;
        }
    }

    @media (max-width: 799px) {
        .search__toggle {
            position: absolute;
            right: 5.5rem;
            top: 0.65rem;
            background: url("../img/header-3/search.svg") center/22px no-repeat;
        }
    }

    .search__form {
        display: block;
    }

    .search__form.active {
        display: block;
    }

    @media (max-width: 799px) {
        .search__form {
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
        }

        .search__form input {
            width: 100%;
        }
    }

    .search__form input {
        min-width: 500px;
        appearance: none;
        border: 2px solid red;
        background-color: #fff;
        border-radius: 0;
        font-size: 16px;
        padding: 0.5rem;
    }

    @media (max-width: 799px) {
        .search__form input {
            border-bottom: 1px solid #979797;
        }
    }

    .inactive-item {
        opacity: 0;
    }
</style>