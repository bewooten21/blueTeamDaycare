<?php
class comment {
    private $commentID, $profileID, $comment, $commenterID, $commentTime, $commenterName;
    function __construct($commentID, $profileID, $comment, $commenterID, $commenterName, $commentTime) {
        
        $this->commentID = $commentID;
        $this->profileID = $profileID;
        $this->comment = $comment;
        $this->commenterID = $commenterID;
        $this->commentTime = $commentTime;
        $this->commenterName = $commenterName;
        
    }
    
    function getCommentID() {
        return $this->commentID;
    }

    function getProfileID() {
        return $this->profileID;
    }

    function getComment() {
        return $this->comment;
    }

    function getCommenterID() {
        return $this->commenterID;
    }

    function getCommentTime() {
        return $this->commentTime;
    }
    
    function setCommentID($commentID) {
        $this->commentID = $commentID;
    }

    function setProfileID($profileID) {
        $this->profileID = $profileID;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setCommenterID($commenterID) {
        $this->commenterID = $commenterid;
    }

    function setCommentTime($commentTime) {
        $this->commentTime = $commentTime;
    }

    function getCommenterName() {
        return $this->commenterName;
}

    function setCommenterName($commenterName){
        $this->commenterName = $commenterName;
    }
}
