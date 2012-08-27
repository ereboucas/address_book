<?php

  header("content-type: application/json");

  include_once('lib/people_dao.php');
  
  $action = $_GET['action'];
  
  $result = '[]';
  
  if ($action == 'list') {
    $result = people_list($_GET['sort'], $_GET['order']);
  } elseif ($action == 'edit') {
    $result = people_find($_GET['id']);
  } elseif ($action == 'add') {
    $result = people_add($_GET);
  } elseif ($action == 'update') {
    $result = people_update($_GET);
  } elseif ($action == 'delete') {
    $result = people_delete($_GET);
  }

  print json_encode($result);
  
?>
