<?php
 $id= filter_input(INPUT_POST, 'id');
 
 if($id != ""){
     job_db::delete_job($id);
     header("Location: index.php?action=ourJobs");
 }else{
     
 }


