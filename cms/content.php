<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>
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
                <div class="bg-teal-700 text-white rounded-sm p-2 hover:bg-teal-500">
                    <a href="new-subject.php">
                        Add New Subject
                    </a>
                </div>
                <div class="bg-teal-700 text-white rounded-sm p-2 hover:bg-teal-500">
                    <a href="new-page.php?subj=<?php echo urlencode($subject_one['id']); ?>">
                        Add New Page
                    </a>                    
                </div>
               
            </nav>
        </aside>
    </div>
    <div>
        <div class="p-6">
            <?php if (!is_null($subject_one)) { // subject selected ?>
			<h2 class="text-xl text-teal-400 font-bold" ><?php echo $subject_one['menu_name']; ?></h2>
		<?php } elseif (!is_null($page_one)) { // page selected ?>
			<h2 class="text-xl text-teal-400 font-bold"><?php echo $page_one['menu_name']; ?></h2>
			<div class="py-2">
				<?php echo $page_one['content']; ?>
			</div>
			<br />
			<a class="bg-red-500 rounded p-2 text-white hover:bg-red-400" href="edit-page.php?page=<?php echo urlencode($page_one['id']); ?>">Edit page</a>
		<?php } else { // nothing selected ?>
			<h2 class="text-xl text-teal-400 font-bold">Select a subject or page to edit</h2>
		<?php } ?>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>