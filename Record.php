<?php
/**
 * User: ln1878-yz-214
 * 
 * Time: 00:00:49 AM
 * @ 3001-718 Chicago
 * DEC 1 T 2015
 */

namespace yzhan214\fp;

class Record{

    //initiate private vars
	private $rec = "";
	private $id = "";
	
    /* 
     * @constructor
     */
	public function _construct($cRc,$cId){
		$this->rec = $cRc;
        $this->id = $cId;
        
	}//end of _construct()



    /*
     * @accessors to return string
     */

    public function getRec(){
    	return $this->rec;
    }
   
    public function getId(){ 
    	return $this->id;
    }
    
  
    /*
     * @mutators to set values into vars
     */


    public function setRec($re){
    	$this->rec= $re;
    }
   
    public function setId($id)
    {
        $this->id = $id;
    }

    /*
 	public function toString(){
 		print "*** This is in line 58 in Record.php, toString method, for testing";
 	}
    */

}//end of class User.php



?>