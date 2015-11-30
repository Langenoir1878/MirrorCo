<?php
/**
 * User: ln1878
 * Date: 11/26/2015
 * Time: 17:17:47 PM
 * @ 3001-718 Chicago
 * HAPPY THANKSGIVING
 */

namespace yzhan214\fp;

class User{

    //initiate private vars
	private $username = "";
	private $password = "";
	private $id = "";
	private $email = "";

    private $address = "";
    private $zip = "";

 
    /* 
     * @constructor
     */
	public function _construct($cUn, $cPw, $cId, $cEm, $cAd, $cZp){
		$this->username = $cUn;
		$this->password = $cPw;
        $this->id = $cId;
        $this->email = $cEm;
        $this->address = $cAd;
        $this->zip = $cZp;
	
	}//end of _construct()



    /*
     * @accessors to return string
     */
    public function getUsername(){
    	return $this->username;
    }
    public function getPassword(){
    	return $this->password;
    }
    public function getId(){ 
    	return $this->id;
    }
    public function getEmail(){
    	return $this->email;
    }
   
    public function getAddress(){
    	return $this->address;
    } 

    public function getZip(){
        return $this->zip;
    }
  
    /*
     * @mutators to set values into vars
     * username shouldn't be mutated, comment out
     */


    public function setUsername($un){
        $this->username = $un;
    }

    public function setPassword($pw){
    	$this->password = $pw;
    }
   
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($em){
    	$this->email = $em;
    }

    public function setAddress($ad){
        $this->address = $ad;
    }

    public function setZip($zp){
        $this->zip = $zp;
    }
    
    /*
 	public function toString(){
 		print "*** This is in line 97 in User.php, toString method, for testing";
 	}
    */

}//end of class User.php



?>