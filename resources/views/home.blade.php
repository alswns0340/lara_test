<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Home</br>
    @if (Auth::check())
      {{ Auth::user()->name }}님 환영합니다.
      <p><a href="/logout">로그아웃</a></p>
      </form>
    @else
      회원이 아닙니다.
      <p><a href="/login">로그인</a></p></br>
      <p><a href="/register">회원가입</a></p>
    @endif
  </h1>
  <?php
  //php연습
  ?>
 
</body>
</html>