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
	private $sentence = "";
	private $id = "";
	
    /* 
     * @constructor
     */
	public function _construct($cSt,$cId){
		$this->sentence = $cSt;
        $this->id = $cId;
        
	}//end of _construct()



    /*
     * @accessors to return string
     */

    public function getSentence(){
    	return $this->sentence;
    }
   
    public function getId(){ 
    	return $this->id;
    }
    
  
    /*
     * @mutators to set values into vars
     */


    public function setSentence($st){
    	$this->sentence= $st;
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