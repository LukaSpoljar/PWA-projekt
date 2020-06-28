<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'connect.php';

        $id_number = $_GET['id'];

        $query = 'SELECT * FROM vijesti WHERE id =' . $id_number . ';';
        $result = mysqli_query($dbc, $query);

        define('UPLPATH', 'img/');
        $row = mysqli_fetch_array($result);

        echo '<title>' . $row['naslov'] . '</title>';
    ?>
   

    <meta charset="utf-8">
    <meta name="author" content="Ivan Luka Špoljar">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>


<body id="tijeloClanka" style="height:100vh;">
    <header>
        <nav>
            <ul>
                <li><a href="index.php" class="">Početna</a></li>
                <li><a href="kategorija.php?id=Kultura" class="">Kultura</a></li>
                <li><a href="kategorija.php?id=Sport" class="">Sport</a></li>
                <li><a href="prijava.php" class="">Administracija</a></li>
            </ul>
        </nav>

        <h1>Frankfurter Allgemeine</h1>
    </header>

    <main>
        <section id="sectionClanak">
            <article>
                <h2>
                    <?php echo $row['naslov']; ?>
                </h2>

                <span>
                    Ažurirano <?php echo $row['datum'];?> 
                </span>

                <?php echo '<img id="slika_clanak" alt="SLIKA" src="' . UPLPATH . $row['slika'] . '">'; ?>

                <h3>
                    <?php echo $row['sazetak']; ?>
                </h3>

                <pre><?php echo $row['tekst']; ?></pre>
            </article>
        </section>
    </main>
    
    <footer>
        <h2>Frankfurter Allgemeine</h2>
    </footer>
</body>

</html>