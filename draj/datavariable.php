<html>

<head>
    <title>Data Variable</title>
</head>

<body>
    <h1>Strings</h1>
    <?php
    $first = "The quick brown fox";
    $second = " jumps over the lazy dog.";
    ?>
    <br />
    Lowercase <?php echo strtolower($first) ?><br />
    Uppercase <?php echo strtoupper($first) ?><br />
    Uppercase <?php echo strtoupper($first) ?><br />
    Upper Word <?php echo ucwords($first) ?><br />
    <br />
    length: <?php echo strlen($first) ?><br />
    Trim: <?php echo $newfirst = $first . trim($second); ?><br />
    Find: <?php echo strstr($first, "quick"); ?><br />
    Replace by string: <?php echo str_replace("quick", "fast-rapid", $first); ?> <br /> <br /> <br /> <br />

    <h2>Number</h2>

    <?php
    $num1 = 1;
    $num1 += 4;
    $num1 /= 2;

    echo $num1;

    ?>
    <?php
    $num1--;
    echo $num1;

    ?>
    <br />
    <?php $num3 = 3.14 ?><br />
    Floating : <?php echo $float = 3.14 ?><br />
    Ceiling : <?php echo ceil($num3) ?><br />
    Round : <?php echo round($num3) ?><br />
    Modulo : <?php echo fmod(4, 7) ?><br />
    Random : <?php echo rand(4, 2) ?><br />


    <h2>Arrays</h2>
    <?php 
        $a1 = array(4,5,6,array(2,1,3),9,2); 
        echo $a1[3][1];
        $a1[3] = "Raj";

        echo "<br/>";
        echo $a1[3];
    ?><br>


</body>

</html>