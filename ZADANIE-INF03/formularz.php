<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Dane osobowe</title>
</head>
<body>
    <div id="baner">
        <h1>Dane osobowe pracowników</h1>
    </div>
    <div id="lewy">
        <ul>
            <li><a href="index.php">Wyświetl dane</a></li><br>
            <li><a href="formularz.php">Wpisz dane</a></li>
        </ul>
    </div>
    <div id="prawy">
        <h2>Podaj dane</h2>
        <form method="POST">
            <label>Nazwisko</label><br><input type="text" name="nazwisko"></input><br>
            <label>Imię</label><br><input type="text" name="imie"></input><br>
            <label>PESEL</label><br><input type="number" name="pesel"></input>
            <br> 
            <input type="submit" value="Sprawdź i zapisz">
        </form>
        <div id="panel">
            <?php
                $polaczenie2 = mysqli_connect('localhost','root', '', 'firma');
                if($_POST['nazwisko'] == '') {
                    echo 'brak nazwiska <br>';
                }
                if($_POST['imie'] == '') {
                    echo 'brak imienia <br>';
                }
                if($_POST['pesel'] == '') {
                    echo 'brak numeru PESEL <br>';
                } 
                if(!$_POST['nazwisko'] == '' && !$_POST['imie'] == '' && !$_POST['pesel'] == ''){
                    $nazwisko = @$_POST['nazwisko'];
                    $imie = @$_POST['imie'];
                    $pesel = @$_POST['pesel'];

                    // OBLICZ PESEL
                    function obliczSumęKontrolną($pesel) {
                        $wagi = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3]; 
                        $suma = 0;
                    
                        for ($i = 0; $i <= 9; $i++) {
                            $suma += $pesel[$i] * $wagi[$i]; 
                        }
                        $reszta = $suma % 20; 
                        
                        if ($reszta === 0) {
                            return 0; 
                        } else {
                            return 10 - $reszta; 
                        }
                    }
                    if($pesel[10] == obliczSumęKontrolną($pesel)) {
                        $zapytanie2 = "INSERT INTO pracownicy (nazwisko, imie, pesel) VALUES ('$nazwisko', '$imie', '$pesel');";
                        $wyslanie2=mysqli_query($polaczenie2, $zapytanie2);
                        echo "Zapisuję do bazy" . $_POST['nazwisko'] . $_POST['imie'] . $_POST['pesel'];
                    } else {
                        echo "Wpisz poprawny pesel!";
                    }
                }
                mysqli_close($polaczenie2);
            ?>
        </div>
    </div>
    <footer>
        <h5>Autor strony: </h5>
    </footer>
</body>
</html>
