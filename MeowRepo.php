<?php

/*
 * Sqlite repo of Record
 * 19:22:23 PM W DEC 2ND 2015
 * PS 3001 718
 * 
 */

namespace yzhan214\fp;

require_once 'IRecRepo.php';
require_once 'Record.php';


class MeowRepo implements IRecRepo{

    private $dbfile = 'data/meow_record.sqlite';
    private $db;

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->dbfile);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS Meows (UID INTEGER PRIMARY KEY AUTOINCREMENT, RECORD TEXT)");
    }

    public function saveRecord($meow){
        
        if ($meow->getId() != '') {
            //Update
            $stmh = $this->db->prepare("UPDATE Meows SET RECORD =:rec WHERE UID = :id");
            $aRec = $meow->getRec() . '';
            $stmh->bindParam(':rec', $aRec);
            $num = intval($meow->getId());
            $stmh->bindParam(':id', $num);
            $stmh->execute();
           
        } else {
            //Insert
            $stmh = $this->db->prepare("INSERT INTO Meows (RECORD) VALUES (:rec)");
            //bingParam
            $aRec = $meow->getRec();
            $stmh->bindParam(':rec', $aRec);
            $stmh->execute();

        }
    }

    public function getAllRecords()
    {
        $meowlist = array();
        $result = $this->db->query('SELECT * FROM Meows');
        foreach($result as $row) {
            $aMeow = new Record();
            $aMeow->setId(intval($row['UID']));
            $aMeow->setRec($row['RECORD']);
           
            $meowlist[$aMeow->getId()] = $aMeow;
        }
        return $meowlist;
    }

    public function getRecordById($id)
    {
        $stmh = $this->db->prepare("SELECT * from Meows WHERE UID = :id");
        $aId = intval($id);
        $stmh->bindParam(':id', $aId);
        $stmh->execute();
        $stmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $stmh->fetch()) {
            $aMeow = new Record();
            $aMeow->setId($row['UID']);
            $aMeow->setRec($row['RECORD']);
            
            return $aMeow;
        } else {
            return new Record();
        }

    }

    public function deleteRecord($aId)
    {
        $stmh = $this->db->prepare("DELETE FROM Meows WHERE UID = :id");
        $stmh->bindParam(':id', intval($aId));
        $stmh->execute();
    }


}


