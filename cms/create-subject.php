<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>
<?php
$menu_name = $_POST['menu_name'];
$position = $_POST['position'];
$visible = $_POST['visible'];
?>
<?php
$query = "INSERT INTO subjects (
				menu_name, position, visible
			) VALUES (
				'{$menu_name}', {$position}, {$visible}
			)";
$create_result = $connection->query($query);

?>
<?php find_selected_page(); ?>
<div class="w-full p-4 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex justify-center item-center">
        <h1 class="font-bold text-teal-400">Content Mangement System</h1>
    </div>
</div>
<div class="flex justify-start item-center">

    <div>
        <aside class="w-full h-full p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100">
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
    <div class="w-full dark:bg-gray-800 dark:text-gray-50">
        <div class="dark:bg-gray-800 dark:text-gray-50 h-screen w-2/3">
            <section class="p-6 dark:bg-gray-800 dark:text-gray-50">
                <h2 class="text-3xl font-bold text-teal-500 py-6">
                <?php if ($create_result) {

                    echo "Added Successfully";
                } else {
                    echo "<p>Subject creation failed.</p>";
                } ?>
                </h2>

                <div class="flex justify-start item-center gap-4 py-2">
                    <button type="button" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="content.php">Go to Homepage</a></button>
                    <button type="button" class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="new-subject.php">Add More</a></button>

                </div>
            </section>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>