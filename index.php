<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Example</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>



    <main>

        <form method="post">
            <div class="formWrapper">
        		    <span class="first">Wpisz się! </span>
        		    <span class="discr">Imię </span>
        		    <input type="text" name="imie"><br>
        		    <span class="discr">Nazwisko</span>
        		    <input type="text" name="nazwisko"><br>
        		    <input type="submit" value="Dodaj" name="clicker">
                <span class="output">
                  &nbsp;
                  <?php

                    $servername='localhost';
                    $dbusername='root';
                    $dbpassword='';
                    $dbname='Studenci';

                    $link = new mysqli($servername,$dbusername,$dbpassword,$dbname);



              			if(isset($_POST["clicker"]) ){
              				if($_POST['imie']=="" || $_POST['nazwisko']==""){
              					echo "<br>Uzupełnij oba pola. <br>";
              				}
                      else {

                        $imie=$_POST['imie'];
                        $nazwisko=$_POST['nazwisko'];

                        if($link->connect_error){
                          die($link->connect_error);
                        }

                        $sqlQuery = "INSERT INTO Studenci(imie,nazwisko) VALUES('".$imie."','".$nazwisko."') ";

                        if($link->query($sqlQuery)===true){
                          echo"<br>Dodano: ".$imie." ".$nazwisko."<br>";
                        }
                        else{
                          echo"<br> Nie udało się dodać użytkownika, 2/10<br>";
                        }

                      }

              			}
                    $link->close();
                   ?>
                </span>

            </div>
        </form>
    </main>

  </body>
</html>
