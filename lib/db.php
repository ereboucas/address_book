<?php

  include_once("conn.php");
  
  function db_query($sql) {
  
    global $SERVER;
    global $USER;
    global $PASS;    
    global $DATABASE;

    $rows = array();
        
    $link = mysql_connect($SERVER, $USER, $PASS);
    if ($link) {
      mysql_select_db($DATABASE, $link);  
      $result = mysql_query($sql, $link);
      if (is_bool($result)) {
        $rows[] = array($result);
      } else {
        while ($row = mysql_fetch_assoc($result)) {
          $rows[] = $row;
        }
        mysql_free_result($result);        
      }
    }
    mysql_close($link);
    
    return $rows;
  }
  
  function db_arr_escape($arr) {

    global $SERVER;
    global $USER;
    global $PASS;    

    $arr_escaped = array();

    $link = mysql_connect($SERVER, $USER, $PASS);
    
    foreach ($arr as $field => $value) {
      $arr_escaped[$field] = mysql_real_escape_string($value, $link);
    }
    
    mysql_close($link);
    
    return $arr_escaped;
    
  }
  
?>
