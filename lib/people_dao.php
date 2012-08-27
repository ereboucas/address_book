<?php

  include_once('db.php');

  $PEOPLE_FIELDS = array(
    'last_name',
    'first_name',
    'country',
    'city',
    'address',
    'email'
  );
  
  function people_list($sort, $order) {
  
    global $PEOPLE_FIELDS;
    
    // primary key is handled separatedly
    
    $sql = "select id, ".implode(", ", $PEOPLE_FIELDS)." from people";
    
    // Guarantee there will be no strange sort field
    
    if (in_array($sort, $PEOPLE_FIELDS)) {
      $sql = $sql." order by ".$sort;
      if ($order == 'desc') {
        $sql = $sql." desc";
      }
    }
    
    return db_query($sql);
    
  }

  function people_find($id) {  
    global $PEOPLE_FIELDS;
    $sql = "select id, ".implode(", ", $PEOPLE_FIELDS)." from people where id = ".mysql_escape_string($id);
    return db_query($sql);
  }

  function people_add($arr) {
    global $PEOPLE_FIELDS;
    $escaped_arr = db_arr_escape($arr);
    $values = array();
    foreach ($PEOPLE_FIELDS as $field) {
      $values[] = "'".$escaped_arr[$field]."'";
    }
    $sql = "insert into people (".implode(", ", $PEOPLE_FIELDS).") values (".implode(",", $values).")";
    return db_query($sql);
  }

  function people_update($arr) {
    global $PEOPLE_FIELDS;
    $escaped_arr = db_arr_escape($arr);
    foreach ($PEOPLE_FIELDS as $field) {
      $values[] = $field." = '".$escaped_arr[$field]."'";
    }
    $sql = "update people set ".implode(", ", $values)." where id = ".$escaped_arr['id'];
    return db_query($sql);
  }

  function people_delete($arr) {
    $escaped_arr = db_arr_escape($arr);
    $sql = "delete from people where id = ".$escaped_arr['id'];
    return db_query($sql);
  }
  
?>
