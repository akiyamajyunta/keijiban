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
}

.header_name {
    color: red;
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

/* レスポンシブ設定を除外して、常にデスクトップ向けのレイアウトを使用 */
.nav__wrapper {
    display: flex;
    /* 固定レイアウトの場合、位置指定等不要（必要に応じて調整してください） */
}

.nav__item:hover {
    background-color: white;
}

.nav__item:not(:last-child) {
    margin-right: 0.5rem;
}

.nav__item a {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1rem;
    border-left: 4px solid transparent;
    text-align: center;
    border-bottom: 4px solid transparent;
}

.nav__item {
    display: flex;
    align-items: center;   
    justify-content: center; 
}

.nav__item svg {
    /* display: block; または inline-block; どちらでも可 */
    color: red;
    width: 28px;
    height: 28px;
}


.nav__item.active a {
    border-left-color: #222;
    border-bottom-color: #222;
}

/* 常にデスクトップ向けの設定として、ナビゲーション切替ボタンは非表示 */
.nav__toggle {
    display: none;
}

.search {
    display: flex;
    margin-left: 1rem;
}

/* 常に表示する設定に変更。元々はメディアクエリで表示切替していました */
.search__toggle {
    appearance: none;
    order: 1;
    font-size: 0;
    width: 34px;
    height: 34px;
    background: url("../img/header-3/search.svg") center right/22px no-repeat;
    border: 0;
    display: block;
    border-left: 1px solid #979797;
    padding-left: 10px;
}

.search__form {
    display: block;
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

.inactive-item {
    opacity: 0;
}
</style>