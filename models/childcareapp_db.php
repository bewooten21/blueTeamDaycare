<?php

class childcareapp_db{
    
    public static function checkforchild_byId($companyId, $studentId){
        $db = Database::getDB();
        
        $query = 'SELECT * from childcareapp
                 WHERE companyId = :companyId AND studentId = :studentId';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':studentId', $studentId);
        $statement->bindValue(':companyId', $companyId);

        $statement->execute();
        
        if($statement->rowCount() > 0){
            return false;
    }else{
        return true;
    }
    
    
}

public static function addApplication($appId,$companyId, $studentId,$parentId ){
    $db = Database::getDB();
    
    $query= 'INSERT into childcareapp
            (appId, companyId, studentId, parentId)
              VALUES
                 (:appId, :companyId, :studentId, :parentId)';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':appId', $appId);
    $statement->bindValue(':companyId', $companyId);
    $statement->bindValue(':studentId', $studentId);
    $statement->bindValue(':parentId', $parentId);
    $statement->execute();
    $statement->closeCursor();
    
    
}

public static function getAppsByCompanyId($id){
    $db = Database::getDB();
    
    $query = 'SELECT * from childcareapp JOIN
             student ON childcareapp.studentId = student.studentId
             WHERE childcareapp.companyId = :id
             AND student.companyId is NULL';
    
    
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    
    $rows= $statement->fetchAll();
    $statement->closeCursor();
    return $rows;
}

public static function removeChildSuccess($studentId){
    $db = Database::getDB();
    
    $query= 'DELETE from childcareapp
              WHERE studentId= :studentId
              ';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId);
    $statement->execute();
    $statement->closeCursor();
    
}

public static function removeChildDeny($studentId, $companyId){
    $db = Database::getDB();
    
    $query= 'DELETE from childcareapp
              WHERE studentId= :studentId
              AND companyId = :companyId';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':studentId', $studentId);
    $statement->bindValue(':companyId', $companyId);
    $statement->execute();
    $statement->closeCursor();
    
}



}

