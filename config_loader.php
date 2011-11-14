<?php
  

  
  class ConfigLoader{
  
    private static $db_handle;
    private static $values = array();
    private static $initialized = false;
    
    public static function initialize(){
      include("dbconfig.php");
      
      self::$db_handle = mysql_connect($config['host'],$config['user'],$config['pass']);
      mysql_select_db($config['db'],self::$db_handle);
      
      self::$initialized = true;
      
    }
    
    public static function getValue($property){
      
      if(!self::$initialized)
        self::initialize();
      
      if(isset($values[$property])){
        return $values[$property];
      }else{
        $result = mysql_query("SELECT value from `config` where property=\"".$property."\"",self::$db_handle);
        $row = mysql_fetch_row($result);
        $values[$property] = $row[0];
        mysql_free_result($result);
        return $row[0];
      }
      
    }
    
  }

?>