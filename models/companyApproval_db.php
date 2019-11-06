<?php

class companyApproval_db {
    public static function addCompany($name, $maxEmp, $maxChild, $curEmp, $curChild, $rating)
    {
        $query = 'insert into companyapproval(name, maxEmp, maxChildren, currentEmp, currentChildren, rating)'
                . 'values(:name, :maxEmp, :maxChild, :curEmp, :curChild, :rating)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':maxEmp', $maxEmp);
            $statement->bindValue(':maxChild', $maxChild);
            $statement->bindValue(':curEmp', $curEmp);
            $statement->bindValue(':curChild', $curChild);
            $statement->bindValue(':rating', $rating);
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
            
    }
    
    public static function addCompanyWithLogo($name, $maxEmp, $maxChild, $curEmp, $curChild, $rating, $logo)
    {
         $query = 'insert into companyapproval(name, maxEmp, maxChildren, currentEmp, currentChildren, rating, logo)'
                . 'values(:name, :maxEmp, :maxChild, :curEmp, :curChild, :rating, :logo)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':maxEmp', $maxEmp);
            $statement->bindValue(':maxChild', $maxChild);
            $statement->bindValue(':curEmp', $curEmp);
            $statement->bindValue(':curChild', $curChild);
            $statement->bindValue(':rating', $rating);
            $statement->bindValue(':logo', $logo);
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}