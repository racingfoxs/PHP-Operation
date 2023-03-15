<html>
	<head>
		<title>Loops</title>
	</head>
	<body>
        <?php 
        $a= array(1,2,4,6,8);
        
        ?>
        <br/>
        <?php 
         echo "first " . current($a) . " <br/> ";
         next($a);
         echo "next " . current($a) .  " <br/> ";
         reset($a);
         echo "reset " . current($a);
        ?>

        <?php 

        while ($new = current($a)) {
            echo $new . "<br />";
            next($a);
        }

        ?>
	
	</body>
</html>