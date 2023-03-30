<?php
  $con = mysqli_connect('localhost', 'root', '', 'kwiaciarnia');
  $res = "";
  if($con){
    if(isset($_POST['submit'])){
      $miasto = $_POST['miasto'];
      $sql = "SELECT kwiaciarnie.nazwa, kwiaciarnie.ulica FROM kwiaciarnie WHERE kwiaciarnie.miasto='$miasto'";
      $query = mysqli_query($con, $sql);
      while($row = mysqli_fetch_row($query)){
        $res .= "<h3>$row[0], $row[1]</h3>";
      }
    }
  }else{
    echo "Brak połączenia z bazą";
  }
?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kwiaty</title>
    <link rel="stylesheet" href="./styl3.css" />
  </head>
  <body>
    <section class="baner">
      <h1>Grupa Polskich Kwiaciarni</h1>
    </section>
    <div class="container">
      <section class="lewy">
        <h2>Menu</h2>
        <ol>
          <li><a href="index.html">Strona główna</a></li>
          <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
          <li>
            <a href="znajdz.php">Znajdź kwiaciarnię</a>
            <ul>
              <li><span>w Warszawie</span></li>
              <li><span>w Malborku</span></li>
              <li><span>w Poznaniu</span></li>
            </ul>
          </li>
        </ol>
      </section>
      <section class="prawy">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="POST">
          Podaj nazwę miasta: <input type="text" name="miasto" id="miasto">
          <input type="submit" value="SPRAWDŹ" name="submit" id="submit">
        </form>
        <h3>
          <!-- Skrypt PHP -->
          <?=$res;?>
        </h3>
      </section>
    </div>
    <section class="stopka">
      <p>Stronę opracował: Jan Kowalski</p>
    </section>
  </body>
</html>
