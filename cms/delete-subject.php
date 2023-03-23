<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>

<?php
if (intval($_GET['subj']) == 0) {
    redirect_to("content.php");
}

$id = mysql_prep($_GET['subj']);

if ($subject = get_subject_by_id($id)) {
    $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
    $result = $connection->query($query);
    if ($connection->affected_rows == 1) {
        redirect_to("content.php");
        $message = "Deleted Sucessfull";
    } else {
        // Failed
        $message = "Delete failed.";
        $message .= "<br />";
    }
} else {
    redirect_to("content.php");
}

?>

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
                    if (!is_null($message)) {

                        echo "<h2 class=\"text-white  p-4\"> {$message} </h2>";
                    }
                    ?>
                </div>

            </section>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>