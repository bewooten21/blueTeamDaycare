<?php

class feedback_db {
    public static function submitCompanyFeedback($raterID, $companyID, $feedback, $rating){
        $db = Database::getDB();
        $query = 'insert into companyfeedback(raterID, companyID, feedback, rating) '
                . 'values(:raterID, :companyID, :feedback, :rating)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':raterID', $raterID);
            $statement->bindValue(':companyID', $companyID);
            $statement->bindValue(':feedback', $feedback);
            $statement->bindValue(':rating', $rating);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function submitUserFeedback($raterID, $userID, $feedback, $rating){
        $db = Database::getDB();
        $query = 'insert into userfeedback(raterID, userID, feedback, rating) '
                . 'values(:raterID, :userID, :feedback, :rating)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':raterID', $raterID);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':feedback', $feedback);
            $statement->bindValue(':rating', $rating);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getNegativeUsers(){
        $db = Database::getDB();
        $query = 'select distinct userID, uName '
                . 'FROM userfeedback JOIN user ON '
                . 'userfeedback.userId = user.id '
                . 'WHERE rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $targets = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("database_error.php");
        }
        return $targets;
    }
    
    public static function getNegativeCompanies(){
        $db = Database::getDB();
        $query = 'select distinct companyID from companyfeedback where rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $targets = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $targets;
    }
    
    public static function getUserReviewCount($userID){
        $db = Database::getDB();
        $query = 'select count(userID) as count '
                . 'from userfeedback '
                . 'where userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $value = $statement->fetch();
            $count = $value['count'];
            $statement->closeCursor();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getCompanyReviewCount($companyID){
        $db = Database::getDB();
        $query = 'select count(companyID) as count '
                . 'from companyfeedback '
                . 'where companyID = :companyID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->execute();
            $value = $statement->fetch();
            $count = $value['count'];
            $statement->closeCursor();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getUserNegativeReviewCount($userID){
        $db = Database::getDB();
        $query = 'select count(userID) as count '
                . 'from userfeedback '
                . 'where userID = :userID && rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $value = $statement->fetch();
            $count = $value['count'];
            $statement->closeCursor();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getCompanyNegativeReviewCount($companyID){
        $db = Database::getDB();
        $query = 'select count(companyID) as count '
                . 'from companyfeedback '
                . 'where companyID = :companyID && rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->execute();
            $value = $statement->fetch();
            $count = $value['count'];
            $statement->closeCursor();
            return $count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function getUserFeedbackByID($userID){
        $db = Database::getDB();
        $query = 'select * from userfeedback where userID = :userID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $rows = $statement->fetchAll();
            
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        } 
    }
    public static function getCompanyFeedbackByID($companyID){
        $db = Database::getDB();
        $query = 'select * from companyfeedback where companyID = :companyID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->execute();
            $rows = $statement->fetchAll();

            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        } 
    }
    
     public static function getUserNegativeFeedbackByID($userID){
        $db = Database::getDB();
        $query = 'select * from userfeedback where userID = :userID && rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->execute();
            $rows = $statement->fetchAll();
            
            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        } 
    }
    public static function getCompanyNegativeFeedbackByID($companyID){
        $db = Database::getDB();
        $query = 'select * from companyfeedback where companyID = :companyID && rating < 3';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':companyID', $companyID);
            $statement->execute();
            $rows = $statement->fetchAll();

            $statement->closeCursor();
            return $rows;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        } 
    }
    
    public static function removeUserFeedbackByID($id){
        $db = Database::getDB();
        $query = 'delete from userfeedback where uFeedbackID = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    public static function removeCompanyFeedbackByID($id){
        $db = Database::getDB();
        $query = 'delete from companyfeedback where cFeedbackID = :id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
