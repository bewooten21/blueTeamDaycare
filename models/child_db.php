<?php

class child_db {

    public static function add_child($stuId, $parentId, $fName, $lName, $age) {
        $db = Database::getDB();
        $query = 'INSERT INTO student
                 (studentId, parentId, stuFName, stuLName, age)
              VALUES
                 (:stuId, :parentId, :fName, :lName, :age)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':stuId', $stuId);
            $statement->bindValue(':parentId', $parentId);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':age', $age);

            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_children_byParentId($id) {
        $db = Database::getDB();

        $query = 'SELECT * from student
                WHERE parentId = :id
                ORDER by age';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();


        if ($statement->rowCount() > 0) {
            $rows = $statement->fetchAll();
        } else {
            $rows = false;
        }


        $statement->closeCursor();
        return $rows;
    }

    public static function get_child_byId($id) {
        $db = Database::getDB();

        $query = 'SELECT * from student 
                WHERE studentId = :id';


        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $row = $statement->fetch();

        return $row;
    }

    public static function edit_child($id, $fName, $lName, $age) {
        $db = Database::getDB();

        $query = 'UPDATE  student 
                  SET stuFName= :fName,
                  stuLName= :lName,
                  age = :age
                  WHERE studentId = :id';


        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->bindValue(':lName', $lName);
            $statement->bindValue(':fName', $fName);
            $statement->bindValue(':age', $age);
            $statement->execute();
        } catch (Exception $ex) {

            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function approveChild($studentId, $companyId){
        $db = Database::getDB();
        
        $query = 'UPDATE  student 
                  SET companyId= :companyId
                  WHERE studentId = :studentId';
        
        $statement = $db->prepare($query);
            $statement->bindValue(':studentId', $studentId);
            $statement->bindValue(':companyId', $companyId);
            $statement->execute();
            $statement->closeCursor();
        
        
    }
    
    public static function get_children_byParentIdNotNull($id) {
        $db = Database::getDB();

        $query = 'SELECT * from student
                WHERE parentId = :id
                 AND companyId is null
                 ORDER by age';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();


        if ($statement->rowCount() > 0) {
            $rows = $statement->fetchAll();
        } else {
            $rows = false;
        }


        $statement->closeCursor();
        return $rows;
    }
    
    public static function getChildrenByCompanyId($companyId){
        
        $db = Database::getDB();

        $query = 'SELECT * from student 
                WHERE companyId = :companyId';


        $statement = $db->prepare($query);
        $statement->bindValue(':companyId', $companyId);
        $statement->execute();
        $rows = $statement->fetchAll();

        return $rows;
        
    }
    
    public static function setCompanyIdToNull($studentId){
        $db = Database::getDB();
        
        $query = 'UPDATE  student 
                  SET companyId= null
                  WHERE studentId = :studentId';
        
        $statement = $db->prepare($query);
            $statement->bindValue(':studentId', $studentId);
            $statement->execute();
            $statement->closeCursor();
        
        
    }
}
