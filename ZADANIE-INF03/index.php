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
        <h2>Dane osobowe</h2>
        <table>
            <tr><th>Id</th><th>Nazwisko</th><th>Imie</th><th>PESEL</th></tr>
            <?php
                $polaczenie1 = mysqli_connect('localhost','root', '', 'firma');
                $zapytanie1 = "SELECT * FROM pracownicy;"; 
                $wyslanie1=mysqli_query($polaczenie1, $zapytanie1);
                WHILE($wynik1=mysqli_fetch_array($wyslanie1))
                {
                    echo '<tr>';
                    echo '<td>' . $wynik1['id'] .'</td>';
                    echo '<td>' . $wynik1['nazwisko'] .'</td>';
                    echo '<td>' . $wynik1['imie'] .'</td>';
                    echo '<td>' . $wynik1['PESEL'] .'</td>';
                    echo '</tr>';
                }
                mysqli_close($polaczenie1);
            ?>
        </table>
    </div>
    <footer>
        <h5>Autor strony: Mateusz Kozdroń</h5>
    </footer>
</body>
</html>