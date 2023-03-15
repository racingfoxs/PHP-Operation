<?php require_once('./includes/functions.php'); ?>
<?php require_once('./includes/dbconnect.php'); ?>
<?php include('./includes/header.php'); ?>

<div>
    <div>
        <aside class="w-full p-6 sm:w-60 dark:bg-gray-900 dark:text-gray-100">
            <nav class="space-y-8 text-sm">
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold tracking-widest uppercase dark:text-gray-400">Nav</h2>
                    <div class="flex flex-col space-y-1">
                        <?php
                        $query = "SELECT * FROM subjects";
                        $result = mysqli_query($connection, "SELECT * FROM subjects");
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<a>{$row["menu_name"]}</a>";

                            $results = mysqli_query($connection, "SELECT * FROM pages WHERE subject_id = {$row["id"]}");
                            while ($row = mysqli_fetch_array($results)) {
                                echo "<a classname=\"pb-12\"> {$row["menu_name"]}</a>";    
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