
<?php

function redirect_to($location = NULL){
    if($location == !NULL){
        header("Location: {$location}");
        exit;
    }
}



function mysql_prep( $value ) {
    global $connection;
    $value = mysqli_real_escape_string( $connection, $value );
   
    return $value;
}

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
function get_subject_by_id($subject_id) {
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM subjects ";
    $query .= "WHERE id=" . $subject_id ." ";
    $query .= "LIMIT 1";
    $result_set = $connection->query($query);
    confirm_query($result_set);
    if ($subject = mysqli_fetch_array($result_set)) {
        return $subject;
    } else {
        return NULL;
    }
}
function get_page_by_id($page_id) {
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM pages ";
    $query .= "WHERE id=" . $page_id ." ";
    $query .= "LIMIT 1";
    $result_set = $connection->query($query);
    confirm_query($result_set);
    if ($page = mysqli_fetch_array($result_set)) {
        return $page;
    } else {
        return NULL;
    }
}

function find_selected_page(){
    global $subject_one;
    global $page_one;
    if (isset($_GET['subj'])) {
        $subject_one = get_subject_by_id($_GET['subj']);
        $page_one = NULL;
    } elseif (isset($_GET['page'])) {
        $subject_one = NULL;
        $page_one = get_page_by_id($_GET['page']);
    } else {
        $subject_one = NULL;
        $page_one = NULL;
    }
}

function navigation($subject_one, $page_one ){                         
                        $subjects = get_all_subject(); 
                        $output = "";
                        while ($subject = mysqli_fetch_array($subjects)) {
                            $output .= "<a";
                            $output .= " href=\"edit-subject.php?subj=" . urlencode($subject['id']) . "\"";
                            $output .= " class=\" hover:bg-teal-700 ";

                            if(isset($subject_one['id'])){
                                if($subject['id'] == $subject_one['id']){
                                    $output .= "bg-teal-800 text-white p-1 rounded-sm";
                                }
                            }                   
                            
                            $output .= "\"";
                                                        
                            $output .= ">{$subject["menu_name"]}</a>";


                            $pages = get_all_pages($subject["id"]);
                            while ($page = mysqli_fetch_array($pages)) {
                                $output .= "<a";
                                $output .= " class=\" ml-2 hover:bg-teal-800 rounded-sm p-1";
                                if(isset($page_one['id'])){
                                if($page['id'] == $page_one['id']){
                                    $output .= " bg-teal-800 text-white focus:ml-2";
                                }    }
                                $output .= " \"";
                                $output .= " href=\"content.php?page=" . urlencode($page["id"]) . "\" classname=\"pb-12 bg-teal-400\"> {$page["menu_name"]}</a>";    
                            }
                            $output .= "<br />";
                        } 
                        return $output ;

}

?>