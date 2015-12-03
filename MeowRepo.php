<?php

/*
 * Sqlite repo of Record
 * 19:22:23 PM W DEC 2ND 2015
 * PS 3001 718
 * 
 */

namespace yzhan214\fp;

require_once 'Interface.php';
require_once 'Record.php';


class SqliteUserRepository implements IUserRepository
{
    private $dbfile = 'data/user_db_pdo.sqlite';
    private $db;

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->dbfile);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS Users (UID INTEGER PRIMARY KEY AUTOINCREMENT, UNAME TEXT, PASSWORD TEXT, EMAIL TEXT, ADDRESS TEXT, ZIP TEXT)");
    }

    public function saveUser($user){
        //print_r($user);
        if ($user->getId() != '') {
            //Update
            $stmh = $this->db->prepare("UPDATE Users SET UNAME = :username, PASSWORD = :password, EMAIL =:email, ADDRESS =:address, ZIP =:zip  WHERE UID = :id");
            $un = $user->getUsername() . '';
            $stmh->bindParam(':username', $un);
            $pw = $user->getPassword() . '';
            $stmh->bindParam(':password', $pw);
            $em = $user->getEmail() . '';
            $stmh->bindParam(':email', $em);
            $ad = $user->getAddress() . '';
            $stmh->bindParam(':address', $ad);
            $zp = $user->getZip() . '';
            $stmh->bindParam(':zip', $zp);
            $num = intval($user->getId());
            $stmh->bindParam(':id', $num);
            $stmh->execute();
           
        } else {
            //Insert

            $stmh = $this->db->prepare("INSERT INTO Users (UNAME,PASSWORD,EMAIL,ADDRESS,ZIP) 
                VALUES (:username, :password, :email, :address, :zip)");
            //bingParam
            $un = $user->getUsername();
            $stmh->bindParam(':username', $un);
            $pw = $user->getPassword();
            $stmh->bindParam(':password', $pw);
            $em = $user->getEmail();
            $stmh->bindParam(':email', $em);
            $ad = $user->getAddress();
            $stmh->bindParam(':address', $ad);
            $zp = $user->getZip();
            $stmh->bindParam(':zip', $zp);

            $stmh->execute();

        }
    }

    public function getAllUsers()
    {
        $userlist = array();
        $result = $this->db->query('SELECT * FROM Users');
        foreach($result as $row) {
            $aUser = new User();
            $aUser->setId(intval($row['UID']));
            $aUser->setUsername($row['UNAME']);
            $aUser->setPassword($row['PASSWORD']);
            $aUser->setEmail($row['EMAIL']);
            $aUser->setAddress($row['ADDRESS']);
            $aUser->setZip($row['ZIP']);
           
            $notelist[$aUser->getId()] = $aUser;
        }
        return $userlist;
    }

    public function getUserByUname($username)
    {
        $stmh = $this->db->prepare("SELECT * from Users WHERE UNAME = :username");
        $uname = trim($username);
        $stmh->bindParam(':username', $uname);
        $stmh->execute();
        $stmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $stmh->fetch()) {
            $aUser = new User();
            $aUser->setId($row['UID']);
            $aUser->setUsername($row['UNAME']);
            $aUser->setPassword($row['PASSWORD']);
            $aUser->setEmail($row['EMAIL']);
            $aUser->setAddress($row['ADDRESS']);
            $aUser->setZip($row['ZIP']);
            
            return $aUser;
        } else {
            return new User();
        }

    }

    public function deleteUser($username)
    {
        // TODO: Implement deleteUser() method.
        $stmh = $this->db->prepare("DELETE FROM Users WHERE UNAME = :username");
        $stmh->bindParam(':username', trim($username));
        $stmh->execute();
    }


}


