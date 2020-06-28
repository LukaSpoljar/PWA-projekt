<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Ivan Luka Špoljar">
    <title>Frankfurter Allgemeine</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body id="index" style="height:100vh;">
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
        <?php
            include 'connect.php';
            define('UPLPATH', 'img/');
        ?>
        <section class="kultura">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='kultura' ORDER BY datum DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);

                echo '<aside>
                <h2>Kultura</h2>
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



        <section class="sport">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' ORDER BY datum DESC  LIMIT 3";
                $result = mysqli_query($dbc, $query);

                echo '<aside>
                <h2>Sport</h2>
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