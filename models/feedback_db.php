<?php

class feedback_db {
    public static function submitFeedback($sender, $target, $feedback, $rating, $type){
        $db = Database::getDB();
        $query = 'insert into feedback(sender, target, feedback, rating, type) '
                . 'values(:sender, :target, :feedback, :rating, :type)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':sender', $sender);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':feedback', $feedback);
            $statement->bindValue(':rating', $rating);
            $statement->bindValue(':type', $type);
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
        $type = 'user';
        $query = 'select distinct target from feedback where rating < 3 && type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':type', $type);
            $statement->execute();
            $targets = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $targets;
    }
    
    public static function getNegativeCompanies(){
        $db = Database::getDB();
        $type = 'company';
        $query = 'select distinct target from feedback where rating < 3 && type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':type', $type);
            $statement->execute();
            $targets = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $targets;
    }
    
    public static function getReviewCount($target, $type){
        $db = Database::getDB();
        $query = 'select count(target) as count '
                . 'from feedback '
                . 'where target = :target AND type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':type', $type);
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
    
    public static function getFeedbackByID($target, $type){
        $db = Database::getDB();
        $query = 'select rating from feedback where target = :target AND type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':type', $type);
            $statement->execute();
            $rows = $statement->fetchAll();
            $feedback = [];
            
            foreach($rows as $value){
                array_push($feedback, (float)$value['rating']);
            }
            $statement->closeCursor();
            return $feedback;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        
    }
    
    public static function removeFeedbackByID($id){
        $db = Database::getDB();
        $query = 'delete from feedback where ID = :id';
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
