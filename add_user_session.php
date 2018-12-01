<?php
  //変数をconfigから読み込み, 連想配列として格納
  include('config_reader.php');
  $ConfigReader = new ConfigReader(); 
  $data_array = $ConfigReader->readSection("db_params");
  $user_table = $data_array["db_user_table"];
  // セッション開始
  session_start();
    // POST methondの時のみ反応
    if($_SERVER["REQUEST_METHOD"] == "POST")
      {
      // usernameとpasswordをmainpage.phpから取得
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
      // //DBサーバー接続成功 (for debug)
      // echo "<html><head><title>Success at " .WEB_ID. "</title></head><body><pre>";
      // echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
      // echo "Host information: " . mysqli_get_host_info($db_link) . PHP_EOL;
      
      // DBを選択
      mysqli_select_db($db_link, $data_array["db_dbname"]);

      // ユーザーがすでに存在している場合エラー
      $check_user_query = "SELECT id FROM $user_table WHERE username = '$username'";
    
      //ユーザーが存在しているかを確認するqueryを作成
      $check_result = mysqli_query($db_link,$check_user_query);
      $id_number = mysqli_num_rows($check_result);

      // id を見つけた場合、登録済みとみなす
      if($id_number) {
        echo ("このユーザーは既に登録済みです");
        mysqli_close($link);
      }else {
        // 新規ユーザーを登録するためのqueryを作成
        $add_user_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        // queryを実行
        $query_result = mysqli_query($db_link,$add_user_query);
        
        // DBへの書き込みが成功したかどうか確認
        $affected_rows = mysqli_affected_rows($db_link);

        // 行数が1以上の場合成功とみなす
        if ($affected_rows>=1){
          echo ("ユーザーの追加を完了しました");
        }else{
          echo ("ユーザーの追加に失敗しました");
        }
        // 接続を終了
        mysqli_close($link);
      }
  }
?>