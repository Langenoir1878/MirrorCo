<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 11/27/2015
 * Time: 11:40:19
 * @ 3001-718 Chicago
 * BLACK FRIDAY
 */

 namespace yzhan214\fp;

 interface IUserRepository{

 	public function saveUser($user);
 	public function getAllUsers();
 	public function getUserByUname($username);
 	public function deleteUser($username);

 }
 
 ?>

 