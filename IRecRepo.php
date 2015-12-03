<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 11/27/2015
 * Time: 11:40:19
 * @ 3001-718 Chicago
 * BLACK FRIDAY
 */

 namespace yzhan214\fp;

 interface IRecRepo{

 	public function saveRecord($rec);
 	public function getAllRecords();
 	public function getRecordById($id);
 	public function deleteRecord($id);

 }
 
 ?>

 