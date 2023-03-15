<html>
	<head>
		<title>About</title>
	</head>
	<body>

    <?php 
        $_GET ;

        $id = $_GET['id'];
        $names = urldecode($_GET['name']);

        echo $id . " +++++ " . $names;
    ?>
	
	</body>
</html>