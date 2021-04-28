<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="SE_team 13">
    <meta name="description" content="소프트웨어공학 팀프로젝트 쇼핑몰사이트 만들기">
    <meta name="keywords" content="쇼핑몰, 회원가입, 스포츠, 스포츠용품, 옷, 기구, 소프트웨어공학, 서울과학기술대학교">
    <meta name="google" value="notranslate">
    <title>Shoppingmall 회원가입</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/Signup-style.css">
    <!-- 웹폰트 -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="wrap">
      <div class="container">
        <div class="row">
          <div class="wrap">
            <div class="logo">
              <a href="SE_index.html">
                <img src="img/login-logo.png" alt="Shoppingmall Logo">
              </a>
            </div>
            <div class="signup_form">
              <form action="Signup_OK.php" method="post" autocomplete="off">
                <div class="name">
                  <input type="text" name="user_name" class="text_field" placeholder="이름" required>
                </div>
                <input type="text" name="user_nickname" class="text_field" placeholder="닉네임" required />
                <input type="text" name="user_email" class="text_field" placeholder="이메일" required />
                <input type="text" name="user_id" class="text_field" placeholder="아이디" required />
                <input type="password" name="user_password" class="text_field" placeholder="비밀번호" required />
                <input type="password" name="pwd_check" class="text_field" placeholder="비밀번호 확인" required />
                <input type="submit" class="submit_btn" value="submit" style="color: #fff; font-size: 20px; font-family:'Noto Sans KR', sans-serif; font-weight: bold;" />
              </form>
            </div>
            <div class="login">
              <a href="Login.html">기존 아이디로 로그인하기</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
