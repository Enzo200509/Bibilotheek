<?php
include 'config.php';
$id = $_GET["id"];
?>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <?php $liqry = $conn->prepare("SELECT id, title, author,  publisher, pages, overview, lend FROM books WHERE id = $id");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->bind_result($id, $title, $author, $publisher, $pages, $overview, $lend);
        if ($liqry->execute()) {
            $liqry->store_result();
            while ($liqry->fetch()) {
    ?>
                <div class="container-books">
                    <?php echo "ID: ", $id ?>
                    <br>
                    <?php echo "titel: ", $title ?>
                    <br>
                    <?php echo "auteur: ", $author ?>
                    <br>
                    <?php echo "publisher: ", $publisher ?>
                    <br>
                    <?php echo "pagina's: ", $pages ?>
                    <br>
                    <?php echo "samenvatting: <br> <br> ", $overview ?>
                    <br>
                    <?php echo "<br>   Beschikbaar: ", $lend ?>
                    <br>
                    <a href="../opdracht_1/leen.php?id=<?php echo $ID ?>">Lenen</a>
                    <br>
                    <br>
                </div>
                <?php
            }
        }
        $liqry->close();
    }
                ?>
</body>

</html>