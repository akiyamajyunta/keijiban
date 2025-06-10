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
            <form class="search__form" action=""> <!-- 検索、後でここに挿入-->
              <label class="sr-only" for="search">Search</label>
              <input type="search" name="" id="search" placeholder="検索" />
              <!-- ボタンは無いですがエンターバチコンッで自動で遷移します-->
            </form>
          </div>
        <div class="personal_info">
                <p class="name">山田</p>
                <p class="name">yamada1234</p>
        </div>  
        </div>
        <div class="site-header__end">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">menu </button>
            <ul class="nav__wrapper">
              <li class="nav__item">
                <a href="{{route('home')}}"> <!-- homeの遷移先を表示-->
                  <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M22,9.45,12.85,3.26A1.52,1.52,0,0,0,12,3a1.49,1.49,0,0,0-.84.26L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h5V16h4v5h5a1,1,0,0,0,1-1V10.37l.94.63Z" class="inactive-item" style="fill-opacity: 1" ></path>
                    <path d="M22,9.45L12.85,3.26a1.5,1.5,0,0,0-1.69,0L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h6V16h2v5h6a1,1,0,0,0,1-1V10.37L20.94,11ZM18,19H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v4H6V8.89l6-4,6,4V19Z" class="active  -item" style="fill: currentColor" ></path>
                  </svg>
                  <span class="header_name">Home</span>
                </a>
              </li>
              <li class="nav__item">
                <a href="{{route('profile')}}"> <!-- プロフィールの表示遷移先を表示-->
                  <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M16,17.85V20a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V17.85a4,4,0,0,1,2.55-3.73l2.95-1.2V11.71l-0.73-1.3A6,6,0,0,1,4,7.47V6a4,4,0,0,1,4.39-4A4.12,4.12,0,0,1,12,6.21V7.47a6,6,0,0,1-.77,2.94l-0.73,1.3v1.21l2.95,1.2A4,4,0,0,1,16,17.85Zm4.75-3.65L19,13.53v-1a6,6,0,0,0,1-3.31V9a3,3,0,0,0-6,0V9.18a6,6,0,0,0,.61,2.58A3.61,3.61,0,0,0,16,13a3.62,3.62,0,0,1,2,3.24V21h4a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.75,14.2Z" class="inactive-item" style="fill-opacity: 1" ></path>
                    <path d="M20.74,14.2L19,13.54V12.86l0.25-.41A5,5,0,0,0,20,9.82V9a3,3,0,0,0-6,0V9.82a5,5,0,0,0,.75,2.63L15,12.86v0.68l-1,.37a4,4,0,0,0-.58-0.28l-2.45-1V10.83A8,8,0,0,0,12,7V6A4,4,0,0,0,4,6V7a8,8,0,0,0,1,3.86v1.84l-2.45,1A4,4,0,0,0,0,17.35V20a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.74,14.2ZM16,8.75a1,1,0,0,1,2,0v1.44a3,3,0,0,1-.38,1.46l-0.33.6a0.25,0.25,0,0,1-.22.13H16.93a0.25,0.25,0,0,1-.22-0.13l-0.33-.6A3,3,0,0,1,16,10.19V8.75ZM6,5.85a2,2,0,0,1,4,0V7.28a6,6,0,0,1-.71,2.83L9,10.72a1,1,0,0,1-.88.53H7.92A1,1,0,0,1,7,10.72l-0.33-.61A6,6,0,0,1,6,7.28V5.85ZM14,19H2V17.25a2,2,0,0,1,1.26-1.86L7,13.92v-1a3,3,0,0,0,1,.18H8a3,3,0,0,0,1-.18v1l3.72,1.42A2,2,0,0,1,14,17.21V19Zm7,0H16V17.35a4,4,0,0,0-.55-2l1.05-.4V14.07a2,2,0,0,0,.4.05h0.2a2,2,0,0,0,.4-0.05v0.88l2.53,1a1.5,1.5,0,0,1,1,1.4V19Z" class="active-item" style="fill: currentColor" ></path>
                  </svg>
                  <span class="header_name">account</span>
                </a>
              </li>
              <!-- <li class="nav__item">
                <a href="#">
                  <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M2,13H22v6a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V13ZM22,8v4H2V8A1,1,0,0,1,3,7H7V6a3,3,0,0,1,3-3h4a3,3,0,0,1,3,3V7h4A1,1,0,0,1,22,8ZM15,6a1,1,0,0,0-1-1H10A1,1,0,0,0,9,6V7h6V6Z" class="inactive-item" style="fill-opacity: 1" ></path>
                    <path d="M21,7H17V6a3,3,0,0,0-3-3H10A3,3,0,0,0,7,6V7H3A1,1,0,0,0,2,8V19a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V8A1,1,0,0,0,21,7ZM9,6a1,1,0,0,1,1-1h4a1,1,0,0,1,1,1V7H9V6ZM20,18H4V13H20v5Zm0-6H4V9H20v3Z" class="active-item" style="fill: currentColor" ></path>
                  </svg>
                  <span>message</span>
                </a>
              </li> -->
              <li class="nav__item">
                <a href="{{route('message')}}"> <!-- dm -->
                  <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M21,8H8A1,1,0,0,0,7,9V19a1,1,0,0,0,1,1H18l4,3V9A1,1,0,0,0,21,8Zm-4,8H12V15h5Zm1-3H11V12h7ZM17,4V6H6A1,1,0,0,0,5,7v8H3a1,1,0,0,1-1-1V4A1,1,0,0,1,3,3H16A1,1,0,0,1,17,4Z" class="inactive-item" style="fill-opacity: 1" ></path>
                    <path d="M21,8H8A1,1,0,0,0,7,9V19a1,1,0,0,0,1,1H18l4,3V9A1,1,0,0,0,21,8ZM20,19.11L18.52,18H9V10H20v9.11ZM12,15h5v1H12V15ZM4,13H5v2H3a1,1,0,0,1-1-1V4A1,1,0,0,1,3,3H16a1,1,0,0,1,1,1V6H15V5H4v8Zm14,0H11V12h7v1Z" class="active-item" style="fill: currentColor" ></path>
                  </svg>
                  <span class="header_name">Messaging</span>
                </a>
              </li>
              <li class="nav__item">
                <a href="{{route('option')}}">
                  <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" >
                    <path d="M18.94,14H5.06L5.79,8.44A6.26,6.26,0,0,1,12,3h0a6.26,6.26,0,0,1,6.21,5.44Zm2,5-1.71-4H4.78L3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19Z" class="inactive-item" style="fill-opacity: 1" ></path>
                    <path d="M20.94,19L19,14.49s-0.41-3.06-.8-6.06A6.26,6.26,0,0,0,12,3h0A6.26,6.26,0,0,0,5.79,8.44L5,14.49,3.06,19a0.71,0.71,0,0,0-.06.28,0.75,0.75,0,0,0,.75.76H10a2,2,0,1,0,4,0h6.27A0.74,0.74,0,0,0,20.94,19ZM12,4.75h0a4.39,4.39,0,0,1,4.35,3.81c0.28,2.1.56,4.35,0.7,5.44H7L7.65,8.56A4.39,4.39,0,0,1,12,4.75ZM5.52,18l1.3-3H17.18l1.3,3h-13Z" class="active-item" style="fill: currentColor" ></path>
                  </svg>
                  <span class="header_name">OPTION</span>
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
    color: orangered;}
.personal_info{
    width: 300px;
    height: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-left: 100px;
}
.name{
    font-weight: bold;
    text-align: center;
    font-size: 20px;
    margin:1px;
    color: orangered;}

/* ヘッダー本体 */
.site-header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: black; 
  border-top: 6px solid red;
  border-bottom: 6px solid red;
  z-index: 1000; /* 必要に応じて調整 */

}

.header_name{
    color:red
}
.site-header__start {
  display: flex;
  align-items: center; }

.site-header__end {
  display: flex;
  align-items: center; }

.site-header__wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
  @media (min-width: 800px) {
    .site-header__wrapper {
      padding-top: 0;
      padding-bottom: 0; } }
@media (min-width: 800px) {
  .nav__wrapper {
    display: flex; } }

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
    transition: transform 0.3s ease-out, opacity 0.3s ease-out; }
    .nav__wrapper.active {
      visibility: visible;
      opacity: 1;
      transform: translateY(0); } }
.nav__item:hover{
background-color: white;
}
.nav__item:not(:last-child) {
  margin-right: 0.5rem; }

.nav__item a {
  display: block;
  padding: 1rem;
  border-left: 4px solid transparent; }
  @media (min-width: 800px) {
    .nav__item a {
      text-align: center;
      border-left: 0;
      border-bottom: 4px solid transparent; } }
.nav__item svg {
    color: red;
    display: inline-block;
    vertical-align: middle;
    width: 28px;
    height: 28px;
    margin-right: 1rem; }
  @media (min-width: 800px) {
    .nav__item svg {
      display: block;
      margin: 0 auto 0.5rem; } }
.nav__item.active a {
  border-left-color: #222; }
  @media (min-width: 800px) {
    .nav__item.active a {
      border-bottom-color: #222; } }
.nav__toggle {
  display: none; }
  @media (max-width: 799px) {
    .nav__toggle {
      display: block;
      position: absolute;
      right: 1rem;
      top: 1rem; } }
.search {
  display: flex;
  margin-left: 1rem; }

.search__toggle {
  appearance: none;
  order: 1;
  font-size: 0;
  width: 34px;
  height: 34px;
  background: url("../img/header-3/search.svg") center right/22px no-repeat;
  border: 0;
  display: none; }
  @media (min-width: 800px) {
    .search__toggle {
      border-left: 1px solid #979797;
      padding-left: 10px; } }
  @media (max-width: 799px) {
    .search__toggle {
      position: absolute;
      right: 5.5rem;
      top: 0.65rem;
      background: url("../img/header-3/search.svg") center/22px no-repeat; } }
.search__form {
  display: block; }
  .search__form.active {
    display: block; }
  @media (max-width: 799px) {
    .search__form {
      position: absolute;
      left: 0;
      right: 0;
      top: 100%; }
      .search__form input {
        width: 100%; } }
  .search__form input {
    min-width: 500px;
    appearance: none;
    border: 2px solid red;
    background-color: #fff;
    border-radius: 0;
    font-size: 16px;
    padding: 0.5rem; }
    @media (max-width: 799px) {
      .search__form input {
        border-bottom: 1px solid #979797; } }
.inactive-item {
  opacity: 0; }

</style>