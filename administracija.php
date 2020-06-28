<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">


    <?php
        


        if(isset($_POST['delete']))
        {
            

            $id=$_POST['id'];
            $query = "DELETE FROM vijesti WHERE id=$id ";
            $result = mysqli_query($dbc, $query);

            echo "Uspješno ste obrisali članak";
            mysqli_close($dbc);
        }


        if(isset($_POST['update']))
        {
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                $date=date('d.m.Y. - H:i:s');

                if(isset($_POST['archive']))
                {
                    $archive=1;
                }
                else
                {
                    $archive=0;
                }

            $target_dir = 'img/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

            $id=$_POST['id'];
            $query = "UPDATE vijesti SET datum='$date', naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
            $result = mysqli_query($dbc, $query);
            mysqli_close($dbc);
        }
    ?>



</head>
<body id="tijeloAdministracije" style="height:100vh;">

        <header >
                <nav>
                    <ul>
                        <li><a href="index.php" class="">Početna</a></li>
                        <li><a href="kategorija.php?id=Kultura" class="">Kultura</a></li>
                        <li><a href="kategorija.php?id=Sport" class="">Sport</a></li>
                        <li><a href="prijava.php" class="">Administracija</a></li>
                    </ul>
                </nav>

                <h1 style="border-bottom:0px solid black;">Frankfurter Allgemeine</h1>
        </header>



    <main>
        <?php
                        // Pokaži stranicu ukoliko je korisnik uspješno prijavljen iadministrator je
                        session_start();
                    include 'connect.php';
                    define('UPLPATH', 'img/');


                    $prijavaLozinkaKorisnika="";
                    $lozinkaKorisnika="";

                    if (isset($_SESSION['username']) == false) 
                    {
                        echo 'Niste ulogirani !';
                        die();
                    }
                    else if($_SESSION['level'] == 1)
                {
                include 'connect.php';

                

                $query = "SELECT * FROM vijesti ORDER BY datum DESC";
                $result = mysqli_query($dbc, $query);

                echo '<a href="unos.php" style="padding:10px; border:2px solid black; border-radius:10px;">Unesi novi članak</a>';
                echo'<span style="height:50px;"></span>';

                while($row = mysqli_fetch_array($result)) 
                {

                echo '
                <form enctype="multipart/form-data" action="" method="POST">

                    <div class="form-item">
                        <span id="porukaTitle" class="bojaPoruke"></span>
                        <label for="title">Naslov vjesti:</label>
                            <div class="form-field">
                                <input type="text" name="title" class="form-field-textual" id="unos1" value="'.$row['naslov'].'">
                            </div>
                    </div>


                    <div class="form-item">
                        <span id="porukaAbout" class="bojaPoruke"></span>
                        <label for="about">Kratki sadržaj vijesti (do 50znakova):</label>
                            <div class="form-field">
                                <textarea name="about" id="unos2" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                            </div>
                    </div>


                    <div class="form-item">
                        <span id="porukaContent" class="bojaPoruke"></span>
                        <label for="content">Sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="content" id="unos3" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
                            </div>
                    </div>



                    <div class="form-item">
                        <span id="porukaSlika" class="bojaPoruke"></span>
                        <label for="pphoto">Slika:</label>
                            <div class="form-field">
                                <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH . $row['slika'] . '" width=300px; height=auto>
                            </div>
                    </div>



                    <div class="form-item">
                        <span id="porukaKategorija" class="bojaPoruke"></span>
                        <label for="category">Kategorija vijesti:</label>
                            <div class="form-field">
                                <select name="category" id="unos5" class="form-field-textual" value="'.$row['kategorija'].'">
                                        <option value="sport">Sport</option>
                                        <option value="kultura">Kultura</option>
                                </select>
                            </div>
                    </div>

                    

                    <div class="form-item">
                        <label>Spremiti u arhivu:
                            <div class="form-field">';

                                if($row['arhiva'] == 0) 
                                {
                                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                                } 
                                else 
                                {
                                    echo '<input type="checkbox" name="archive" id="archive"checked/> Arhiviraj?';
                                }

                echo '
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="update" value="Izmjeni" id="izmjeni">Izmjeni</button>
                        <button type="submit" name="delete" value="Izbriši">Izbriši</button>
                    </div>

                </form>';
                }



            } 
            else if ($_SESSION['level'] == 0) 
            {

                echo '<p>Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';

            } 
            else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) 
            {
                echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p>';
                die();
            } 
           ?>

                
            
           
            <script type="text/javascript">
             
                document.getElementById("izmjeni").onclick = function(event) 
                        {

                            var slanjeForme = true;


                            
                            var poljeTitle = document.getElementById("unos1");
                            var title = document.getElementById("unos1").value;
                            if (title.length < 5 || title.length > 30) 
                            {
                                slanjeForme = false;
                                poljeTitle.style.border="1px dashed red";
                                document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
                            } 
                            else 
                            {
                                poljeTitle.style.border="1px solid green";
                                document.getElementById("porukaTitle").innerHTML="";
                            }


                            
                            var poljeAbout = document.getElementById("unos2");
                            var about = document.getElementById("unos2").value;
                            if (about.length < 10 || about.length > 100) 
                            {
                                slanjeForme = false;
                                poljeAbout.style.border="1px dashed red";
                                document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
                            } 
                            else 
                            {
                                poljeAbout.style.border="1px solid green";
                                document.getElementById("porukaAbout").innerHTML="";
                            }


                            
                            var poljeContent = document.getElementById("unos3");
                            var content = document.getElementById("unos3").value;
                            if (content.length == 0) 
                            {
                                slanjeForme = false;
                                poljeContent.style.border="1px dashed red";
                                document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
                            } 
                            else 
                            {
                                poljeContent.style.border="1px solid green";
                                document.getElementById("porukaContent").innerHTML="";
                            }


                            
                            var poljeSlika = document.getElementById("pphoto");
                            var pphoto = document.getElementById("pphoto").value;
                            if (pphoto.length == 0) 
                            {
                                slanjeForme = false;
                                poljeSlika.style.border="1px dashed red";
                                document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
                            } 
                            else 
                            {
                                poljeSlika.style.border="1px solid green";
                                document.getElementById("porukaSlika").innerHTML="";
                            }


                            
                            var poljeCategory = document.getElementById("unos5");
                            if(document.getElementById("unos5").selectedIndex == 0) 
                            {
                                slanjeForme = false;
                                poljeCategory.style.border="1px dashed red";
                                document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
                            } 
                            else 
                            {
                                poljeCategory.style.border="1px solid green";
                                document.getElementById("porukaKategorija").innerHTML="";
                            }

                            if (slanjeForme != true) 
                            {
                                event.preventDefault();
                            }
                        };
            
            </script>
        </main>

        <footer>
            <h2>Frankfurter Allgemeine</h2>
        </footer>
</body>
</html>