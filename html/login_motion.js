//htmlレンダリング後に実行
window.addEventListener('load', function(){ 
    //bodyのIDを取得
    var body = document.getElementById('body');
    //top_containerのIDを取得
    var top_container = document.getElementById('top_container');
    //login_buttonのIDを取得
    var login_button = document.getElementById('login_button');
    
    //bodyにfadeoutクラスを追加する関数
    function fadeOut(){
        body.classList.add('fadeout');
    }

    //top_containerにtransformクラスを追加する関数
    function transForm(){
        top_container.classList.add('transform');
    }

    //formに送信する関数
    function submitData(){
        document.myform.submit();
    }

    //Loginボタンクリック時の動作
    login_button.addEventListener('click', function(){
        fadeOut();
        transForm();
        setTimeout(submitData,800);//800ms後にsubmitDataを実行
    }, false);
});