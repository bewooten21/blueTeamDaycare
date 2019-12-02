<?php 
class company_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM company';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        

        foreach ($rows as $value) {
            $owner = user_db::get_user_by_id($value['ownerID']);
            $company = new company($value['companyID'], $value['companyName'], $value['employeeCount'], $value['childCapacity'], $value['childrenEnrolled'], $value['overallRating'], $owner, $value['companyImage']);
            $companies[]=$company;
                    
        }
        $statement->closeCursor();

        return $companies;
    }

    public static function get_company_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM company
              WHERE companyID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $value = $statement->fetch();
        
        $owner = user_db::get_user_by_id($value['ownerID']);
        $company = new company($value['companyID'], $value['companyName'], $value['employeeCount'], $value['childCapacity'], $value['childrenEnrolled'], $value['overallRating'], $owner,$value['companyImage']);
        
        $statement->closeCursor();

        return $company;
    }
    
    public static function get_company_by_ownerId($id) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM company
              WHERE ownerID= :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $company = $statement->fetch();

        $statement->closeCursor();

        if ($statement->rowCount() > 0){
           return $company; 
        }else{
            return false;
        }
        
    }
    
    

    public static function get_company_by_companyname($companyName) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM company
              WHERE companyName= :companyName';

        $statement = $db->prepare($query);
        $statement->bindValue(':companyName', $companyName);
        $statement->execute();
        $value = $statement->fetch();

        $owner = user_db::get_user_by_id($value['ownerID']);
        $companies = new company($value['companyID'], $value['companyName'], $value['employeeCount'], $value[', childCapacity'], $value['childrenEnrolled'], $value['overallRating'], $owner);
        
        $statement->closeCursor();
        
        return $companies;
    }

    public static function add_company($companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, $ownerID) {
        $db = Database::getDB();
        
        $query = 'INSERT INTO company
                 (companyName, employeeCount, childCapacity, childrenEnrolled, overallRating, ownerID)
              VALUES
                 (:companyName, :employeeCount, :childCapacity, :childrenEnrolled, :overallRating, :ownerID)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyName', $companyName);
            $statement->bindValue(':employeeCount', $employeeCount);
            $statement->bindValue(':childCapacity', $childCapacity);
            $statement->bindValue(':childrenEnrolled', $childrenEnrolled);
            $statement->bindValue(':overallRating', $overallRating);
            $statement->bindValue(':ownerID', $ownerID);
           
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $company_id = $db->lastInsertId();
            return $company_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
        }
    }
    
    public static function add_company_with_image($companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, $ownerID, $fileName) {
        
        $fileLocation = "images/". $fileName;
        $db = Database::getDB();
        $query = 'INSERT INTO company
                 (companyName, employeeCount, childCapacity, childrenEnrolled, overallRating, ownerID, comapnyImage)
              VALUES
                 (:companyName, :employeeCount, :childCapacity, :childrenEnrolled, :overallRating, :ownerID, :fileLocation)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyName', $companyName);
            $statement->bindValue(':employeeCount', $employeeCount);
            $statement->bindValue(':childCapacity', $childCapacity);
            $statement->bindValue(':childrenEnrolled', $childrenEnrolled);
            $statement->bindValue(':overallRating', $overallRating);
            $statement->bindValue(':ownerID', $ownerID);
            $statement->bindValue(':fileLocation', $fileLocation);
           
            $statement->execute();
            $statement->closeCursor();
            $company_id = $db->lastInsertId();
            return $company_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
        }
    }

    public static function update_company($ID, $companyName, $employeeCount, $childCapacity, $childrenEnrolled, $overallRating, $ownerID, $image) {
        
        $fileLocation = "images/".$image;
        $db = Database::getDB();
        $query = $query = 'UPDATE company
              SET companyName = :companyName,
                  employeeCount = :employeeCount,
                  childCapacity = :childCapacity,
                  childrenEnrolled = :childrenEnrolled,
                  overallRating = :overallRating
                  ownerID = :ownerID
                  companyImage = :companyImage
                WHERE companyID = :ID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyName', $companyName);
            $statement->bindValue(':employeeCount', $employeeCount);
            $statement->bindValue(':childCapacity', $childCapacity);
            $statement->bindValue(':childrenEnrolled', $childrenEnrolled);
            $statement->bindValue(':overallRating', $overallRating);
            $statement->bindValue(':ownerID', $ownerID);
            $statement->bindValue(':companyImage', $fileLocation);
            $statement->bindValue(':ID', $ID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
        }
    }

    public static function delete_company_by_ID($id) {
        $db = Database::getDB();
        $query = 'DELETE from company WHERE companyID= :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
        }
    }
    
    public static function get_all() {
        $db = Database::getDB();

        $query='SELECT * from company'
            ;
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
      
        $statement->closeCursor();

        return $rows;
    }
    
}
