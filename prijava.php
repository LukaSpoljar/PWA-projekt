<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <meta name="author" content="Ivan Luka Špoljar">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body style="height:100vh;">
        <header style="width:100%;">
            <nav>
                <ul>
                    <li><a href="index.php" class="">Početna</a></li>
                    <li><a href="kategorija.php?id=Kultura" class="">Kultura</a></li>
                    <li><a href="kategorija.php?id=Sport" class="">Sport</a></li>
                </ul>
            </nav>

            <h1>Frankfurter Allgemeine</h1>
        </header>


        <main style=" width:80%;">
        
            <form method="post" action="prijava.php" name="prijava" style="width:80%;">
                <p style="font-size:40px;text-align:center;">Prijavite se:</p>
                    <br/>
                    <br/>
                    
                    <label for="username" style="font-size:30px;text-align:center;margin:0 auto;display:inline-block;">Korisničko ime:</label>
                    <br/>
                    <input name="username" type="text"/>
                    <br/>
                    <br/>
                    <label for="password" style="font-size:30px;text-align:center;margin:0 auto;display:inline-block;">Lozinka:</label>
                    <br/>
                    <input name="password" type="password"/>
                    <br/>
                    <br/>
                    <button type="submit" id="submit" name ="submit" value="submit" style="width:50%; font-size:30px;">Prijavite se</button>
                    <br/>
                    <br/>
                    <p style="padding:30px 0px 10px 0px;">Ukoliko niste prijavljeni, registrirajte se</p>

                    <button style="width:50%; font-size:30px;">
                        <a href="registracija.php">Registrirajte se</a>
                    </button>
                  
                    <br>
                    <br>
            </form>
        
        <?php

            session_start();
            include "connect.php";
            if (isset($_POST["submit"])) 
            {   
                $korisnickoIme = $_POST["username"];
                $korisnickaLozinka = $_POST["password"];

                $uspjesnaPrijava = false;
                
                $query = "SELECT * FROM korisnik WHERE korisnicko_ime='$korisnickoIme'";            
                $result = mysqli_query($dbc, $query) or die('Error querying databese.');


                if (mysqli_num_rows($result) == 1)
                {
                    $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = ?;";
                    $stmt = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql))
                    {
                        mysqli_stmt_bind_param($stmt,'s',$korisnickoIme);

                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                    }

                    mysqli_stmt_bind_result($stmt, $id, $ime, $prezime, $korisnko_ime, $lozinka, $razina);
                    mysqli_stmt_fetch($stmt);


                    if(password_verify($korisnickaLozinka, $lozinka))
                    {
                        $_SESSION['id'] = $id;
                        $_SESSION['name'] = $ime;
                        $_SESSION['surname'] = $prezime;
                        $_SESSION['username'] = $korisnko_ime;
                        $_SESSION['level'] = $razina;
                    }
                    else
                    {
                        echo "<br/>Unijeli ste pogrešno korisničko ime ili lozinku<br/>";
                    }
                }
                else
                {
                    echo "<br/>Unijeli ste pogrešno korisničko ime ili lozinku<br/>";
                }
            }

            if(isset($_SESSION['username']))
            {
                echo 'Prijavljeni ste kao korisnik ' . $_SESSION['username'] . '<br/>';
                echo '<a href = "administracija.php">Nastavite na administraciju</a>';
            }
        ?>

    </div>

    </main>

    <footer>
        <h2>Frankfurter Allgemeine</h2>
    </footer>
</body>

</html>