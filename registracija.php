<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body style="height:100vh;">

      <?php

        $registriranKorisnik = false;
        $msg="";

            if (isset($_POST["submit"])) 
            {    
                include "connect.php";

                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $username = $_POST['username'];
                $lozinka = $_POST['pass'];
                $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                $razina = 0;
                $registriranKorisnik = '';


                $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
                $stmt = mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $sql)) 
                {
                    mysqli_stmt_bind_param($stmt, 's', $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }

                if(mysqli_stmt_num_rows($stmt) > 0)
                {
                    $msg='Korisničko ime već postoji!';
                }
                else
                {

                    $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);

                    if (mysqli_stmt_prepare($stmt, $sql)) 
                    {
                        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                        mysqli_stmt_execute($stmt);

                        $registriranKorisnik = true;
                    }
                }
                mysqli_close($dbc);

            }
        ?>
    
        <?php
            
            if($registriranKorisnik == true) 
            {
                echo '<p>Korisnik je uspješno registriran!</p>';
                header("Location:prijava.php");
            } 
            else 
            {
                
        ?>

            <main id="registracija">
                <section style="width:100%;">
                            <form enctype="multipart/form-data" action="" method="POST">

                                <div class="form-item">
                                    <span id="porukaIme" class="bojaPoruke"></span>
                                    <label for="title">Unesite svoje ime: </label>
                                    <div class="form-field">
                                        <input type="text" name="ime" id="ime" class="form-fieldtextual">
                                    </div>
                                </div>
                            
                                <div class="form-item">
                                    <span id="porukaPrezime" class="bojaPoruke"></span>
                                    <label for="about">Unesite svoje prezime: </label>
                                    <div class="form-field">
                                        <input type="text" name="prezime" id="prezime" class="formfield-textual">
                                    </div>
                                </div>


                                <div class="form-item">
                                    <span id="porukaUsername" class="bojaPoruke"></span>
                                    <label for="content">Unesite korisničko ime:</label>
                                   

                                    <?php 
                                            echo '<br><span class="bojaPoruke">' . $msg . '</span>'; 
                                    ?>

                                    <div class="form-field">
                                        <input type="text" name="username" id="username" class="formfield-textual">
                                    </div>
                                </div>


                                <div class="form-item">
                                    <span id="porukaPass" class="bojaPoruke"></span>
                                    <label for="pphoto">Lozinka: </label>
                                    <div class="form-field">
                                        <input type="password" name="pass" id="pass" class="formfield-textual">
                                    </div>
                                </div>


                                <div class="form-item">
                                    <span id="porukaPassRep" class="bojaPoruke"></span>
                                    <label for="pphoto">Ponovite lozinku: </label>
                                    <div class="form-field">
                                        <input type="password" name="passRep" id="passRep" class="form-field-textual">
                                    </div>
                                </div>


                                <div class="form-item">
                                    <button type="submit" value="Prijava" id="slanje" name="submit">Prijava</button>
                                </div>
                            </form>
                        </section>
            </main>
            



            <script type="text/javascript">
                    document.getElementById("slanje").onclick = function(event) 
                    {
                        var slanjeForme = true;
                        

                        var poljeIme = document.getElementById("ime");
                        var ime = document.getElementById("ime").value;
                        if (ime.length == 0) 
                        {
                            slanjeForme = false;
                            poljeIme.style.border="1px dashed red";
                            document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                        } 
                        else 
                        {
                            poljeIme.style.border="1px solid green";
                            document.getElementById("porukaIme").innerHTML="";
                        }



                        
                        var poljePrezime = document.getElementById("prezime");
                        var prezime = document.getElementById("prezime").value;
                        if (prezime.length == 0) 
                        {
                            slanjeForme = false;
                            poljePrezime.style.border="1px dashed red";
                            document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
                        } 
                        else 
                        {
                            poljePrezime.style.border="1px solid green";
                            document.getElementById("porukaPrezime").innerHTML="";
                        }


                        
                        var poljeUsername = document.getElementById("username");
                        var username = document.getElementById("username").value;
                        if (username.length == 0) 
                        {
                            slanjeForme = false;
                            poljeUsername.style.border="1px dashed red";
                            document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničkoime!<br>";
                        } 
                        else 
                        {
                            poljeUsername.style.border="1px solid green";
                            document.getElementById("porukaUsername").innerHTML="";
                        }


                        
                        var poljePass = document.getElementById("pass");
                        var pass = document.getElementById("pass").value;
                        var poljePassRep = document.getElementById("passRep");
                        var passRep = document.getElementById("passRep").value;

                        if (pass.length == 0 || passRep.length == 0 || pass != passRep) 
                        {
                            slanjeForme = false;
                            poljePass.style.border="1px dashed red";
                            poljePassRep.style.border="1px dashed red";
                            document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";

                            document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
                        } 
                        else 
                        {
                            poljePass.style.border="1px solid green";
                            poljePassRep.style.border="1px solid green";
                            document.getElementById("porukaPass").innerHTML="";
                            document.getElementById("porukaPassRep").innerHTML="";
                        }

                        if (slanjeForme != true) 
                        {
                            event.preventDefault();
                        }
                    };

            </script>
    <?php
    }
?>



</body>
</html>



