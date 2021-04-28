<?php
  $host = 'localhost';
  $user = 'root';
  $pw = '6cPdELc9x7kx';
  $dbName = 'test_db';
  $mysqli = new mysqli($host, $user, $pw, $dbName);
  
  $userid = $_POST[ 'login_id' ];
  $password = $_POST[ 'login_pwd' ];
  if ( !is_null( $userid ) ) {
    $jb_conn = mysqli_connect( 'localhost', 'root', '6cPdELc9x7kx', 'test_db' );
    $jb_sql = "SELECT user_password FROM member WHERE user_id = '$userid';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
      $encrypted_password = $jb_row[ 'user_password' ];
    }
    if ( is_null( $encrypted_password ) ) {
      $wu = 1;
    } else {
      if ( password_verify( $password, $encrypted_password ) ) {
        header( 'Location: login-ok.php' );
      } else {
        $wp = 1;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="author" content="SE_team 13">
      <meta name="description" content="소프트웨어공학 팀프로젝트 쇼핑몰사이트 만들기">
      <meta name="keywords" content="쇼핑몰, 로그인, 스포츠, 스포츠용품, 옷, 기구, 소프트웨어공학, 서울과학기술대학교">
      <meta name="google" value="notranslate">
      <title>Shoppingmall 로그인</title>

      <!-- CSS -->
      <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/login_style.css">
      <!-- 웹폰트 -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    </head>
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
            <div class="login_form">
              <form method="post" action="login.php" autocomplete="off">
                <input type="text" name="login_id" class="text_field" placeholder="아이디">
                <input type="password" name="login_pwd"
                class="text_field" placeholder="비밀번호">
                <input type="submit" value="로그인" style="color: #fff; font-size: 20px; font-family:'Noto Sans KR', sans-serif; font-weight: bold;" class="submit_btn"></p>
              </form>
            </div>
            <div class="signup">
              <a href="Signup.php">회원가입</a>
            </div>
            <?php
              if ( $wu == 1 ) {
                echo "<p>사용자이름이 존재하지 않습니다.</p>";
              }
              if ( $wp == 1 ) {
                echo "<p>비밀번호가 틀렸습니다.</p>";
              }
              ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
