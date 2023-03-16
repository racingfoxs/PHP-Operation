<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>
<?php
if (isset($_GET['subj'])) {
	$sel_subj = $_GET['subj'];
	$sel_page = "";
} elseif (isset($_GET['page'])) {
	$sel_subj = "";
	$sel_page = $_GET['page'];
} else {
	$sel_subj = "";
	$sel_page = "";
}

// echo $sel_subj; checking we are getting it or not
// echo $sel_page;
?>

<div>
    <div>
        <aside class="w-full h-screen p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100">
            <nav class="space-y-8 text-sm">
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold tracking-widest uppercase dark:text-gray-400">Nav</h2>
                    <div class="flex flex-col space-y-1">
                        <?php                        
                        $subjects = get_all_subject();  
                        while ($subject = mysqli_fetch_array($subjects)) {
                            echo "<a";
                            echo " href=\"content.php?subj=" . urlencode($subject['id']) . "\"";
                            if($subject['id'] == $sel_subj){
                                echo " class=\"font-bold\"";
                            }                            
                            echo ">{$subject["menu_name"]}</a;>";
                            $pages = get_all_pages($subject["id"]);
                            while ($page = mysqli_fetch_array($pages)) {
                                echo "<a";
                                if($page['id'] == $sel_page){
                                    echo " class=\"font-bold\"";
                                }    
                                echo " href=\"content.php?page=" . urlencode($page["id"]) . "\" classname=\"pb-12 bg-teal-400\"> {$page["menu_name"]}</a>";    
                            }
                            echo "<br />";
                        } ?>
                        <!-- <a rel="noopener noreferrer" href="#">Plugins</a> -->
                    </div>
                </div>
            </nav>
        </aside>
    </div>
</div>

<?php require('./includes/footer.php'); ?>