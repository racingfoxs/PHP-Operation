<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>

<?php 
if (intval($_GET['subj']) == 0) {
    redirect_to("content.php");
}
    	if (isset($_POST['submit'])) {
        $errors = array();

$required_fields = array('menu_name', 'position', 'visible');
foreach ($required_fields as $fieldname) {
    if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname]) && $_POST[$fieldname] != 0) {
        $errors[] = $fieldname;
    }
}

$fields_with_lengths = array('menu_name' => 30);
foreach ($fields_with_lengths as $fieldname => $maxlength) {
    if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) {
        $errors[] = $fieldname;
    }
}
if (empty($errors)) {
    // Perform Update
    $id = mysql_prep($_GET['subj']);
    $menu_name = mysql_prep($_POST['menu_name']);
    $position = mysql_prep($_POST['position']);
    $visible = mysql_prep($_POST['visible']);
    
    $query = "UPDATE subjects SET 
                menu_name = '{$menu_name}', 
                position = {$position}, 
                visible = {$visible} 
            WHERE id = {$id}";
    $result = $connection->query($query);
    if ($connection->affected_rows == 1) {
        // Success
        $message = "The subject was successfully updated.";
    } else {
        // Failed
        $message = "The subject update failed.";
        $message .= "<br />";
    }
    
} else {
    // Errors occurred
    $message = "There were " . count($errors) . " errors in the form.";
}

}
?>
<?php find_selected_page(); ?>
<div class="w-full p-4 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex justify-center item-center">
        <h1 class="font-bold text-teal-400">Content Mangement System</h1>
    </div>
</div>
<div class="flex justify-start item-center">

    <div>
        <aside class="w-full h-screen p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100">
            <nav class="space-y-8 text-sm">
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold tracking-widest uppercase dark:text-gray-400">Navigation</h2>
                    <div class="flex flex-col space-y-1">
                        <?php echo navigation($subject_one, $page_one); ?>
                    </div>

                </div>
            </nav>
        </aside>
    </div>
    <div>
        <div class="p-6">
            <section class="p-6 dark:bg-gray-800 dark:text-gray-50">
               <div class="bg-teal-500 rounded-sm">               
                    <?php 
                        global $message;
                        if(!is_null($message)){

                            echo "<h2 class=\"text-white  p-4\"> {$message} </h2>";
                        }
                    ?>
               </div>
                <form action="edit-subject.php?subj=<?php echo urlencode($subject_one['id']); ?>" method="post" class="rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-lg font-medium title-font mb-5">Edit Subject
                        <?php echo $subject_one['menu_name'] ?>
                    </h2>
                    <div class="relative mb-4">
                        <label for="menu_name" class="leading-7 text-sm ">Menu Name</label>
                        <input type="text" value="<?php echo $subject_one['menu_name']; ?>" id="menu_name" name="menu_name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="position" class="leading-7 text-sm ">Position</label>

                        <select name="position" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <?php 
                            $subject_set = get_all_subject();
                            $subject_count = mysqli_num_rows($subject_set);

                            for ($count=1; $count <= $subject_count+1; $count++) { 
                                echo "<Option value=\"1\"";
                                if($subject_one['position'] == $count){

                                    echo " selected ";
                                }
                                echo ">{$count}</Option>";
                            }
                        
                        ?>
                        </select>
                    </div>
                    <div class="relative mb-4">
                        <p class="leading-7 text-sm">Visible</p>

                        <input type="radio" id="forno" name="visible" value="0" <?php if($subject_one['visible'] == 0) {echo " checked "; } ?> class=" bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <label for="forno" class="leading-7 text-sm mr-8">No</label>
                        <input type="radio" id="foryes" name="visible" <?php if($subject_one['visible'] == 1) {echo " checked "; } ?> value="1" class=" bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <label for="foryes" class="leading-7 text-sm ">Yes</label>
                    </div>
                    <div class="flex justify-between item-center gap-4 py-2">
                        <button type="submit" name="submit" value="Edit Submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Edit</button>
                        <button type="button" class="text-white bg-orange-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="content.php">Cancel</a></button>

                    </div>
                </form>
            </section>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>