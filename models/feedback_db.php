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
        $query = 'select count(target) from feedback where target = :target && type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':type', $type);
            $statement->execute();
            $count = $statement->fetch();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $count;
    }
    
    public static function getFeedbackByID($target, $type){
        $db = Database::getDB();
        $query = 'select feedback, rating, ID from feedback where target = :target && type = :type';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':type', $type);
            $statement->execute();
            $feedback = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
        return $feedback;
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
