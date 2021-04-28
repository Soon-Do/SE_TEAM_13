<?php
  // DB연동
  $host = 'localhost';
  $user = 'root';
  $pw = '6cPdELc9x7kx';
  $dbName = 'test_db';
  $mysqli = new mysqli($host, $user, $pw, $dbName);

  $user_name = $_POST['user_name'];
  $user_nickname = $_POST['user_nickname'];
  $user_email = $_POST['user_email'];
  $user_id = $_POST['user_id'];
  $user_password = $_POST['user_password'];
  $pwd_check = $_POST['pwd_check'];
  // //DB연동

  // 비밀번호 확인 함수
  function passwordCheck($_str)
  {
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

    if(strlen($pw) < 10 || strlen($pw) > 30)
    {
        return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 10자리 ~ 최대 30자리 이내로 입력해주세요.");
        exit;
    }
    if(preg_match("/\s/u", $pw) == true)
    {
        return array(false, "비밀번호는 공백없이 입력해주세요.");
        exit;
    }

    if( $num == 0 || $eng == 0 || $spe == 0)
    {
        return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        exit;
    }
    return array(true);
  }
  // 비밀번호 확인 함수

  //아이디 중복 확인 함수
  function CheckId($userid)
  {
    $sql = "select user_id from user where user_id = $userid";
    $ret = mysqli_query($sql);
    $exist = mysqli_num_rows($ret);
    if($exist>0){
      return 1;
    }
    else {
      return 0;
    }
  }

  $id_result = CheckId($user_id); // 아이디 중복 확인
  if($id_result == 1){
    echo "<script>
    function back() {
      alert('아이디가 중복되었습니다.');
      history.go(-1);
    }
    </script>";
  }
  else {
    if($user_password === $pwd_check) {

      $pwd_result = passwordCheck($user_password); //비밀번호 확인
      if($pwd_result[0]==false)
      {
        echo "<script>
        function back() {
          alert('$result[1]');
          history.go(-1);
        }
        </script>";
      }

      // DB table에 저장
      $user_password = md5($_POST['user_password']);
      $sql = "insert into member (user_name, user_nickname, user_email, user_id, user_password)";
      $sql = $sql. "values('$user_name', '$user_nickname', '$user_email', '$user_id', '$user_password')";

      // 회원가입 성공
      if($mysqli->query($sql)){
        echo "<script>
        function back() {
          alert('회원가입 완료');
          location.href='Login.html';
        }
        back();
        </script>";
      }
      else {    // 회원가입 실패
        echo "<script>
        function back() {
          alert('알 수 없는 오류로 회원가입 실패');
          history.go(-1);
        }
        back();
        </script>";
      }
    }
    else {  // 비밀번호 일치하지 않음
      echo "<script>
      function back() {
        alert('비밀번호가 일치하지 않습니다.');
        history.go(-1);
      }
      back();
      </script>";
    }
  }
?>
