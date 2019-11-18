<?php

class companyApproval_db {
    public static function addCompany($name, $maxChild, $curEmp, $curChild, $rating)
    {
        $db = Database::getDB();
        $query = 'insert into companyapproval(name, maxChildren, currentEmp, currentChildren, rating) '
                . 'values(:name, :maxChild, :curEmp, :curChild, :rating)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':maxChild', $maxChild);
            $statement->bindValue(':curEmp', $curEmp);
            $statement->bindValue(':curChild', $curChild);
            $statement->bindValue(':rating', $rating);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
            
    }
    
    public static function addCompanyWithLogo($name, $maxChild, $curEmp, $curChild, $rating, $logo)
    {
        $db = Database::getDB();
        $fileLocation = "images/". $logo;
        $query = 'insert into companyapproval(name, maxChildren, currentEmp, currentChildren, rating, logo) '
                . 'values(:name, :maxChild, :curEmp, :curChild, :rating, :fileLocation)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':maxChild', $maxChild);
            $statement->bindValue(':curEmp', $curEmp);
            $statement->bindValue(':curChild', $curChild);
            $statement->bindValue(':rating', $rating);
            $statement->bindValue(':fileLocation', $fileLocation);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getUnprocessedCompanies()
    {
        $db = Database::getDB();
        $query = 'select * from companyapproval '
                . 'where isProccessed = 0';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
        } 
        catch (Exception $e) {
           $error_message = $e->getMessage();
           display_db_error($error_message);
        }
        return $rows;
    }
    
    public static function approveCompany($id)
    {
        $db = Database::getDB();
        $query = 'update table companyapproval '
                . 'set isApproved = 1'
                . 'where id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } 
        catch (Exception $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function declineCompany($id)
    {
        $db = Database::getDB();
        $query = 'update table companyapproval '
                . 'set isApproved = 0'
                . 'where id = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } 
        catch (Exception $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}