<html>
	<head>
		<title>Function</title>
	</head>
	<body>
        <?php 
        $a= array(1,2,4,6,6);
        foreach ($a as $item ) {
            echo $item . " ";
        }
        ?>
        <br/>
        <?php 
        foreach ($a as $position => $item ) {
            echo $position . "=" . $item .",";
        }
        ?>

        <?php 
        function numbersRaj($abc){
            echo $abc;

            return false;
        }

        numbersRaj(5896658);
        ?>
	
	</body>
</html>