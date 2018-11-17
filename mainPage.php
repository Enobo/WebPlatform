<!DOCTYPE html>
<!--メインページ-->
<html>
    <head><!--ヘッダー開始-->
    <meta charset="utf-8">
    <title>main_page</title>
    <!--CSSファイル呼び出し-->
    <link rel="stylesheet" href="">
  </head><!--ヘッダー終了-->
  
  <body><!--Body開始-->
    <div class="top_container"><!--top_container開始-->
        <!--サイドメニュー-->
        <div class="side_menu">
            <ul>
                <li><a href="#">Top</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">GameCenter</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
        
        <div class="mainpage_container"><!--top_container開始-->
            <h1>Welcome to EnoboWorld!</h1>
            <!--ユーザー登録フォーム-->
            <form name="add_user_button" action="add_user.php" method = "post">
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
            </form>

        </div>
    </div>
  </body><!--Body終了-->
</html>