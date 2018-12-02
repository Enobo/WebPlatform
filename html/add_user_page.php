<!DOCTYPE html>
<!--アドミン追加ページ-->
<html>
    <head><!--ヘッダー開始-->
    <meta charset="utf-8">
    <title>Admin_register</title>
    <!--CSSファイル呼び出し-->
    <link rel="stylesheet" href="">
  </head><!--ヘッダー終了-->
  
  <body><!--Body開始-->
        <div class="user_register_container"><!--user_register_container開始-->
            <form name="add_user_button" action="add_user_session.php" method = "post"><!--ユーザー登録フォーム開始-->
                <div class="add_form"> 
                <p>Username:</p>
                <input  class="username" type="text" maxlength="20" name="username" value="">
                <br>
                <p>Password:</p>
                <input  class="password" type="password" maxlength="30" name="password" value="">  
                </div>
                <div class="button_form">
                    <button class="add_button" type="submit" >
                    <span>登録</span>
                    </button>
                </div>
            </form><!--ユーザー登録フォーム終了-->
        </div><!--user_register_container終了-->
    </div>
  </body><!--Body終了-->
</html>