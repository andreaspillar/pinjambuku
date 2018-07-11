<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{
 function login($email_st, $pwd_st)
 {
   $this -> db -> select('id, email_st, pwd_st');
   $this -> db -> from('student');
   $this -> db -> where('email_st', $email_st);
   $this -> db -> where('pwd_st', MD5($pwd_st));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>