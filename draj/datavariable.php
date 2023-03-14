<html>

<head>
    <title>Data Variable</title>
</head>

<body>
    <br />
    <h2>Type Casting</h2>
    <br />
    <?php

use function PHPSTORM_META\type;

        $s1 = "2 raj"; 
        $s2 = 2;
        $s3 = $s1 + $s2; //php will give notice auto
        
        $s4 = (int)$s1;

        echo gettype($s4);
    ?>
    <br />


    <h2>Strings</h2>
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
    $a1 = array(4, 5, 6, array(2, 1, 3), 9, 2);
    echo $a1[3][1];
    $a1[3] = "Raj";

    echo "<br/>";
    echo $a1[3];
    echo "<br/>";

    $a2 = array("f_name" => "D", "l_name" => "Raj");

    echo $a2["f_name"];
    echo "<br/>";

    ?>

    <br />

    <pre><?php print_r($a2); ?></pre>

    <br />
    <br />

    Count: <?php $a7 = array(4, 5, 6, array(2, 1, 3), 9, 2);
            echo count($a7); ?> <br />
    <br />
    Reverse Sort: <?php rsort($a7);
                    print_r($a7) ?><br />

    <?php $a8 = array(4, 5, 6, 8, 9, 2); ?>
    String Implode : <?php echo  $a9 = implode(" * ", $a8);
                        ?><br />
    explode : <?php print_r(explode(" * ", $a9));
                ?><br />

    <?php

    echo in_array(2, $a8);

    ?>
    <br />

    <?php
    $var1 = 3;
    $var2 = "Raj";

    echo isset($var1);
    echo "<br />  var 3 : ";
    echo isset($var1);
    echo "<br />  var 1 : ";
    echo empty($var1);
    ?>

</body>

</html>