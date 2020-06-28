<!DOCTYPE html>
<html lang="en">
<head>
    <?php
       $vrsta = $_GET['id'];
    ?>

    <meta charset="utf-8">
    <meta name="author" content="Ivan Luka Špoljar">

    <?php
        echo '<title>' . $vrsta . '</title>';
    ?>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body style="height:100vh;">
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
  
        <section id="vrstaVijesti">
            <?php
                include 'connect.php';
                define('UPLPATH', 'img/');

                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$vrsta' ORDER BY datum DESC;";
                $result = mysqli_query($dbc, $query);

                echo '<aside>
                <h2>' . $vrsta . '</h2>
                </aside>';

                while($row = mysqli_fetch_array($result)) 
                {
                    echo '<article>';
                        echo '<a href="clanak.php?id='.$row['id'].'">';
                                echo '<img alt="SLIKA"src="' . UPLPATH . $row['slika'] . '"';
                                echo '<h3>' . $row["datum"] . '</h3>';
                                echo '<h2>' . $row["naslov"] . '</h2>';
                                echo '<p>' . $row["sazetak"] . '</p>';
                        echo '</a>';
                    echo '</article>';
                }
            ?>
        </section>
    </main>
    
    <footer>
        <h2>Frankfurter Allgemeine</h2>
    </footer>
</body>

</html>