{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')


    <div class="container-parson">
      <div class="container">
        <p class="fsize">個人情報の変更</p>

        <button class="change_button" onclick="toggleFormTab(this)">名前</button>
        <div class="form-tab">
          <form action="">
              <input type="text" placeholder="Username" />
              <button class="change_button">送信</button>
          </form>
        </div>
        <button class="change_button" onclick="toggleFormTab(this)">アカウントネーム</button>
        <div class="form-tab">
          <form action="">
            <input type="text" placeholder="accountName" />
            <button class="change_button">送信</button>
          </form>
        </div>
        <button class="change_button" onclick="toggleFormTab(this)">パスワード</button>
        <div class="form-tab">
          <form action="">
            <input type="password" placeholder="password" />
              <input type="password" placeholder="password" />
              <button class="change_button">送信</button>
            </form>
        </div>
      </div>
    </div>


<style>
.fsize{
  font-size: 24px;
  text-align: center;
}
.container-parson{
justify-content: center;
margin-top: 150px;
}
.container {
  width: 300px;
  margin: auto;
  padding: 20px;
  background-color: #ffffff;
  border: 1px solid #ccc;
  border-radius: 5px;
  justify-content: center;
  text-align: center;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

input[type="text"],
input[type="password"] {
  width: 93%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.change_button{
    background-color: white;
    width: 50%;
    color: black;
    border: 1px solid black;
    padding: 3px 6px;
    cursor: pointer;
    font-size: 1rem;
    margin-top: 3%;
    margin-bottom: 3%;
    justify-content: center;
}
.form-tab {
  /* 初期状態は非表示（高さ0、透明） */
  max-height: 0;
  opacity: 0;
  overflow: hidden;
  transition: max-height 0.5s ease-out, opacity 0.5s ease-out;
}

/* open クラスが付いたときは展開状態に */
.form-tab.open {
    max-height: 300px;
    opacity: 1;
}


</style>

<script>
  function toggleFormTab(button) {
    const formTab = button.nextElementSibling;
    formTab.classList.toggle("open");
}

</script>

