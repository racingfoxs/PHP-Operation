<html>

<head>
    <title>Data Variable</title>
</head>

<body>
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
    length: <?php echo strlen($first) ?><br/>
    Trim: <?php echo $newfirst = $first . trim($second); ?><br/>
    Find: <?php echo strstr($first, "quick"); ?><br/>
    Replace by string: <?php echo str_replace("quick", "fast-rapid", $first); ?> <br />
</body>

</html>