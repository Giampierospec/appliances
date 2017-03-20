<?php

function getUsersbyId($userId){
  $CI =& get_instance();
  $sql = "select * from user where id = ?";
  $rs = $CI->db->query($sql,array($userId));
  return $rs->result();
}
function getProductByUserId($userId){
  $CI =& get_instance();
  $sql = "select * from product where idUser = ?";
  $rs = $CI->db->query($sql,array($userId));
  return $rs->result();
}
 ?>
