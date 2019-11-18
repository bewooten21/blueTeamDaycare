<?php

class feedback_db {
    public static function submitFeedback($sender, $target, $feedback, $rating){
        $db = Database::getDB();
        $query = 'insert into feedback (sender, target, feedback, rating) '
                . 'values(:sender, :$target:, :feedback, :rating)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':sender', $sender);
            $statement->bindValue(':target', $target);
            $statement->bindValue(':rating', $rating);
            $statement->bindValue(':feedback', $feedback);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
