<?php include 'config.php';?>

<main>
    <a href="../opdracht_1/admin/inlog.php">Inloggen</a>
    <h1>Boeken</h1>
    <!-- alles voor de Koop nu gedeelte -->
    <?php
    $liqry = $conn->prepare("SELECT ID, title, author,  publisher, pages, lend FROM books");
    if ($liqry === false) {
        trigger_error(mysqli_error($conn));
    } else {
        // $liqry->bind_param('s', $categoryName, $categoryDescription);
        $liqry->bind_result($ID, $title, $author, $publisher, $pages, $lend);
        if ($liqry->execute()) {
            $liqry->store_result();
            while ($liqry->fetch()) {
    ?>
                <div class="container-books">
                    <?php echo "ID: ", $ID ?>
                    <br>
                    <?php echo "titel: ", $title ?>
                    <br>
                    <?php echo "auteur: ", $author ?>
                    <br>
                    <?php echo "publisher: ", $publisher ?>
                    <br>
                    <?php echo "pagina's: ", $pages ?>
                    <br>
                    <?php echo "beschikbaar: ", $lend ?>
                    <br>
                    <a href="detail.php?id=<?php echo $ID ?>">Lenen</a>
                    <br>
                    <br>
                </div>
    <?php
            }
        }
        $liqry->close();
    }
    ?>