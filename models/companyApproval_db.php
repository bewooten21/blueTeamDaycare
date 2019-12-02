<?php

class companyApproval_db {
    public static function addCompany($companyID)
    {
        $db = Database::getDB();
        $query = 'insert into companyapproval(companyID)'
                . 'values(:companyID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
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
        $query = 'select * from companyapproval JOIN company ON '
                . 'companyapproval.companyID = company.companyID '
                . 'where isProcessed = 0';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            return $rows;
        } 
        catch (Exception $e) {
           $error_message = $e->getMessage();
           include('database_error.php');
        }
    }
    
    public static function getUnapprovedCompanyIDs()
    {
        $db = Database::getDB();
        $query = 'select companyapproval.companyID from companyapproval JOIN company ON '
                . 'companyapproval.companyID = company.companyID '
                . 'where isApproved = 0';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            return $rows;
        } 
        catch (Exception $e) {
           $error_message = $e->getMessage();
           include('database_error.php');
        }
    }
    
    public static function approveCompany($id)
    {
        $db = Database::getDB();
        $query = 'update companyapproval '
                . 'set isApproved = 1, '
                . 'isProcessed = 1 '
                . 'where compApprovalID = :id';
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
        $query = 'update companyapproval '
                . 'set isApproved = 0, '
                . 'isProcessed = 1 '
                . 'where compApprovalID = :id';
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