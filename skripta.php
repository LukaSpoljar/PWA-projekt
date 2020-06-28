<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Ivan Luka Špoljar">
    <title>Novi članak</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body id="tijeloSkripte" style="height:100vh;">
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
            include 'insert.php';
            define('UPLPATH', 'img/');
        ?>

            <section id="sectionClanak">
                <article>
                    <h2>
                        <?php echo $title; ?>
                    </h2>

                    <span>
                        Ažurirano <?php echo $date;?> 
                    </span>

                    <?php echo '<img id="slika_clanak" alt="SLIKA" src="' . UPLPATH . $picture. '">'; ?>

                    <h3>
                        <?php echo $about; ?>
                    </h3>

                    <pre><?php echo $content;?></pre>
                </article>
            </section>
    </main>
    
    <footer>
        <h2>Frankfurter Allgemeine</h2>
    </footer>
</body>

</html>