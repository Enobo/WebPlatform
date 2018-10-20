<?php
   // configから変数読み込み
   include("config.php");
   session_start();
   
   // POST methondに反応
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // usernameとpasswordをindex.htmlから取得
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      // SQLデータベースに接続
      $sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);

      // Table usersから username = $usernameの列をリストとして取得
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // usernameとpasswordが usersテーブル内に一致した場合リストは1列のみ
      if($count == 1) {
        // usernameをセッション中グローバル変数として保存
        session_register("username");
        $_SESSION['login_user'] = $username;
        // welcome.phpにリダイレクト
        header("location: welcome.php");
      }else {
        // エラーメッセージ
        $error = "Your username or password is invalid";
      }
   }
?>