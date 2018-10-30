<?php
  //変数をconfigから読み込み, 連想配列として格納
  include('config_reader.php');
  $ConfigReader = new ConfigReader(); 
  $data_array = $ConfigReader->readSection("db_params");
  
  // セッション開始
  session_start();
    // POST methondの時のみ反応
    if($_SERVER["REQUEST_METHOD"] == "POST")
      {
      // usernameとpasswordをindex.htmlから取得
      $username = $_POST['username'];
      $password = $_POST['password'];

      // SQLデータベースに接続
      $db_link = mysqli_connect($data_array["db_servername"], $data_array["db_username"], $data_array["db_password"]);
      // if (!$db_link) {
      //   // DBサーバー接続失敗(for debug)
      //   header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
      //   echo "<html><head><title>Failed at " .WEB_ID. "</title></head><body><pre>";
      //   echo "Web server: ". WEB_ID .  PHP_EOL;
      //   echo "Error: Unable to connect to MySQL." . PHP_EOL;
      //   echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      //   echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      //   exit;
      // }
      // DBサーバー接続成功 (for debug)
      //echo "<html><head><title>Success at " .WEB_ID. "</title></head><body><pre>";
      //echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
      //echo "Host information: " . mysqli_get_host_info($db_link) . PHP_EOL;
      
      // ユーザー情報を取得
      $login_query = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
      
      // DBを選択
      mysqli_select_db($db_link, $data_array["db_dbname"]);

      // query
      $query_result = mysqli_query($db_link,$login_query);

      // ログインエラー (for debug)
      //if(!$query_result || mysqli_num_rows($query_result) <= 0)
      //{
      //    echo "Error logging in. ";
      //}
      $n_row = mysqli_num_rows($query_result);
      mysqli_close($link);
      
      // usernameとpasswordが usersテーブル内に一致した場合ログイン
      if($n_row == 1) {
        // welcome.phpにリダイレクト
        header("location: mainPage.html");
        }else {
        // エラーメッセージ
        $error = "Your username or password is invalid";
        header("location: index.html");
      }
  }
?>