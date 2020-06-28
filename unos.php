<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Ivan Luka Špoljar">
    <title>Unos članka</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">

    <script type="text/javascript">

                    // Provjera forme prije slanja
                    function validacija(event) 
                    {

                        var slanjeForme = true;


                        // Naslov vjesti (5-30 znakova)
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


                        // Kratki sadržaj (10-100 znakova)
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


                        // Sadržaj mora biti unesen
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


                        // Slika mora biti unesena
                        var poljeSlika = document.getElementById("unos4");
                        var pphoto = document.getElementById("unos4").value;
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


                        // Kategorija mora biti odabrana
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

</head>

<body style="height:100vh;">
    <header style="background-color:white;">
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
            <form name="my_form" action="skripta.php" method="POST" enctype="multipart/form-data">

                <div class="form-item">
                    <span id="porukaTitle" class="bojaPoruke"></span>
                    <label for="title">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="title" class="form-field-textual" id="unos1">
                    </div>
                </div>


                <div class="form-item">
                    <span id="porukaAbout" class="bojaPoruke"></span>
                    <label for="about">Kratki sadržaj vijesti (do 50znakova)</label>
                    <div class="form-field">
                        <textarea name="about" cols="30" rows="10" class="formfield-textual" id="unos2"></textarea>
                    </div>
                </div>


                <div class="form-item">
                    <span id="porukaContent" class="bojaPoruke"></span>
                    <label for="content">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="content" cols="30" rows="10" class="form-field-textual" id="unos3"></textarea>
                    </div>
                </div>


                <div class="form-item">
                    <span id="porukaSlika" class="bojaPoruke"></span>
                    <label for="pphoto">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/jpg,image/gif,image/png" class="input-text" name="pphoto" id="unos4"/>
                    </div>
                </div>


                <div class="form-item">
                    <span id="porukaKategorija" class="bojaPoruke"></span>
                    <label for="category">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="category" id="unos5" class="form-field-textual">
                            <option value="" disabled selected>Odabir kategorije</option>    
                            <option value="Sport">Sport</option>
                            <option value="Kultura">Kultura</option>
                        </select>
                    </div>
                </div>


                <div class="form-item">
                    <label>Spremiti u arhivu:
                        <div class="form-field">
                            <input type="checkbox" name="archive" id="unos6">
                        </div>
                    </label>
                </div>


                <div class="form-item">
                    <input type="reset" value="Poništi">
                    <input type="submit" value="Prihvati" id="prihvati" onclick="validacija(event)" name="submit">
                </div>
            </form>

           <?php
               
           ?>            

       
    </main>

    <footer>
        <h2>Frankfurter Allgemeine</h2>
    </footer>
</body>

</html>