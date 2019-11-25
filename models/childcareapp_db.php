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

}

