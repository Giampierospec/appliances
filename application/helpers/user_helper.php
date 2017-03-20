<?php
$CI =& get_instance();
function getUsersbyId($userId){
  $sql = "select * from user where id = ?";
  $rs = $CI->db->query($sql,array($userId));
  return $rs->result();
}
function getProductByUserId($userId){
  $sql = "select * from product where idUser = ?";
  $rs = $CI->db->query($sql,array($userId));
  return $rs->result();
}
 ?>
