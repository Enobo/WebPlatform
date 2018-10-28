<?php
class ConfigReader
{
    function __construct() {
        // 変数を読み込み後,連想配列に格納
        // param_array: array
        $param_array = parse_ini_file("master_config.ini", true); 
        if ($param_array){
        $this->param_array = $param_array;
        }else{print("Config file not loaded");}
    }

    function readSection($section_name){
        // 指定セクションから変数を読み込み,連想配列に格納
        // $section_name : str
        // return: array
        $section_array = $this->param_array[$section_name];
        return $section_array;
    }
    
}
?>