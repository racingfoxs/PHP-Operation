
<?php

function confirm_query($query) {
    global $connection;
    if ($connection->error) {
        try {    
            throw new Exception("MySQL error $connection->error <br> Query:<br> $query", $connection->errno);    
        } catch(Exception $e ) {
            echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
            echo nl2br($e->getTraceAsString());
        }
    }
}

function get_all_subject(){
    global $connection;
    $query = "SELECT * FROM subjects";
    $subjects = $connection->query($query);
    confirm_query($query); 
    return $subjects;
}

function get_all_pages($s_id){
    global $connection;
    $query = "SELECT * FROM pages WHERE subject_id = $s_id";
    $pages = $connection->query($query);
    confirm_query($query); 
    return $pages;
}

?>