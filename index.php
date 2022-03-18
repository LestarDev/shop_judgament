<!DOCTYPE html>
<html>
    <head>
        <title>Sklep</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="menu.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            /* body{
                display:grid;
                background: #ECEFF1;
                grid-template-columns: 12;
            }

            .menu{
                display: flex;
                justify-content: space-evenly;
                grid-column-start: 4;
                grid-column-end: 14;
            }

            img[alt="logo"]{
                height: 90px;
                grid-column-start: 1;
                grid-column-end: 4;
            }

            .szukanie{
                width:495px;
                border: 1px solid black;
                border-right: 0px;
            }

            .szukaj{
                background: #FF5A00;
                height: 90px;
                width: 180px;
            }

            .zaloguj{
                background: #FF5A00;
                width: 180px;
            }

            img[alt="koszyk"]{
                width: 90px;
                height: 80px;
            } */

            body{
                background: rgb(10, 21, 24);
            }

            .wyszukiwanie-l{
                border: 1px solid black;
                border-right: 0px;
                height: 90px;
                padding: 0;
                display: flex;
            }

            .wyszukiwanie-r{
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                height: 90px;
            }

            .szukaj{
                height: 90px;
                background: #FF5A00;
            }

            .menu{
                display: flex;
                align-items: center;
                margin-right: 10px;
            }

            img[alt="koszyk"]{
                width: 100%;
                height: 100%;
            }

            .zaloguj{
                height: 90px;
                background: #FF5A00;
            }

            input[placeholder="szukaj"]{
                width: 200%;
                height: 100%;
                position: absolute;
            }

            .dod_produkt{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
                flex-wrap: wrap;
            }

            .dod_produkt span{
                text-align: center;
                color: white;
            }

            .dod_produkt input[type="checkbox"]{
                align-self: center;
            }

            .oferta{
                display: flex;
            }

            .oferta span{
                color: hsl(217, 15%, 83%);
            }

            .oferta img{
                max-width: 200px;
                margin: 10px;
            }

            .oferta > div:nth-child(2){
                display: flex;
                flex-direction: column;
                justify-content: space-evenly;
            }

            .oferta > div > span:nth-child(1){
                font-weight: bold;
                font-size: 120%;
                color: hsl(217, 15%, 83%);
            }

            .oferta div span:nth-child(3){
                font-weight: bold;
                font-size: 170%;
            }

            .oferta span s{
                color: gray;
            }

            .oferta > div > span:last-child{
                color: lime;
            }

            .produkty{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                width: 80%;
                margin: auto;
            }

            .register{
                display: flex;
                flex-direction: column;
                align-content: center;
                flex-wrap: wrap;
            }

            .produkty2{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                width: 500px;
                margin:auto;
            }

            .czy_edit{
                align-self: center;
                margin-left: 50px;
            }

            .dod_produkt div{
                display: flex;
                flex-direction: column;
            }
        </style>
    
    </head>

    <body>

    <ul class="menu-hover-fill flex flex-col items-start leading-none text-2xl uppercase space-y-4">
        <li><a href="?page=home" data-text="home">home</a></li>
        <li><a href="?page=login" data-text="login">login</a></li>
        <li><a href="?page=register" data-text="register">register</a></li>
        <li><a href="?page=moje_produkty" data-text="moje produkty">moje produkty</a></li>
        <li><a href="?page=kontakt" data-text="kontakt">kontakt</a></li>
    </ul>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        
        <?php

        /* dodwanie produktu */

            //sztuki*
            //kategoria/e [radio]*
            //cena jednostkowa*
            //marza {%} *
            //data waznosci *
            //sql injection *
            //opcje dostawy [radio]
            //opcja "licytacja"
            //polecana oferta [opcjonalnie]
            //wystawianie faktury VAt [bool]
            //opis
            //zdjecie miniaturka [link]
            //stan [radio]
            //ilosc dostepnych

        /* profil sprzedjacego */

            //potrafi zmienic haslo
            //przy register automatyczne generowanie hasla minimum 8 znakow + 1 znak specjalny i tez pozniej jako walidacja
            //autoryzacja profilu [przez]
            //nie ma mozliwosci usuniecia konta [moze tylko admin]
            //"twoj profil"
            //koszyk z data waznosci
            //wyszukiwarka + po kategorie
            //ma widziec ile dostepnych sztuk
            //czas bycia w koszyku [w zaleznosci czy ma premium]
            //cena w brutto
            //haszowanie hasla automatyczne dzieki db sql
            //nazwa
            //osoba prywatna/firma
            //kontakt
            //osoby polecajacego go {%}
            //zgodnosc z opisem [x.x/5]
            //obsluga kupujacego [x.x/5]
            //koszt wysylki
            //opis
            //przedmioty sprzedajacego
            //wyruzniona oferta [na gorze]

            $link=@mysqli_connect("localhost","root","","sklep");
            
            function strona_register($czy=0){
                if($czy){
                    echo "<h2 style='color: red;'>Zle dane</h2>";
                }
                echo "<form method='POST' action='index.php' class='register'>";
                echo "<input type='text' name='imie' placeholder='Imie' required>";
                echo "<input type='text' name='nazwisko' placeholder='Nazwisko' required>";
                echo "<input type='email' name='email' placeholder='email' required>";
                echo "<input type='text' name='login' placeholder='login' required>";
                echo "<div><input type='password' name='haslo' placeholder='haslo' class='register_haslo' value='".generuj_haslo()."' onchange='sprawdzenie(1,0)' required><input type='checkbox' name='odkryj' onchange='podglad(0)'><span>podglad</span></div>";
                echo "<div><input type='password' name='haslo1' placeholder='haslo' class='register_haslo' onchange='sprawdzenie(0,1)' required><input type='checkbox' name='odkryj' onchange='podglad(1)'><span>podglad</span></div>";
                echo "<input type='submit' name='register' value='register'>";
                echo "</form>";
            }

            function strona_logowanie($czy=0){
                if($czy){
                    echo "<h2 style='color: red;'>Zle dane</h2>";
                }
                echo "<form method='POST' action='index.php' class='login'>";
                echo "<input type='text' name='login' placeholder='login' required>";
                echo "<div><input type='password' name='haslo' placeholder='haslo' class='register_haslo' required><input type='checkbox' name='odkryj' onchange='podglad(0)'><span>podglad</span></div>";
                echo "<input type='submit' name='zaloguj' value='zaloguj'>";
                echo "</form>";
            }

            function strona_dod_pordukt(){
                echo "<form method='POST' action='index.php' class='dod_produkt'>";
                echo "<span>name</span><input type='text' name='name' require><br>";
                echo "<span>ilosc</span><input type='number' name='ilosc' require><br>";
                echo "<span>cena</span><input type='number' name='cena' require><br>";
                echo "<span>marza</span><input type='number' name='marza' require><br>";
                echo "<span>data waznosci</span><input type='date' name='data_waznosci' require><br>";
                echo "<span>licytacja</span><input type='checkbox' name='licytacja'><br>";
                echo "<span>Darmowa dostawa</span><input type='checkbox' name='wystawianie_faktury_vat'><br>";
                echo "<textarea rows='8' columns='40' name='opis' require></textarea><br>";
                echo "<span>link do zjdecia/miniaturki</span><input type='text' name='zdjecie'><br>";
                echo "<span style='font-size:150%;'>Kategorie</span>";
                echo "<div>";
                echo "<span>elektornika</span><input type='checkbox' name='elektornika'>";
                echo "<span>moda</span><input type='checkbox' name='moda'>";
                echo "<span>dom_i_ogrod</span><input type='checkbox' name='dom_i_ogrod'>";
                echo "<span>supermarket</span><input type='checkbox' name='supermarket'>";
                echo "<span>dziecko</span><input type='checkbox' name='dziecko'>";
                echo "<span>uroda</span><input type='checkbox' name='uroda'>";
                echo "<span>zdrowie</span><input type='checkbox' name='zdrowie'>";
                echo "<span>kultura_i_rozrywka</span><input type='checkbox' name='kultura_i_rozrywka'>";
                echo "<span>sport_i_turystyka</span><input type='checkbox' name='sport_i_turystyka'>";
                echo "<span>motoryzacja</span><input type='checkbox' name='motoryzacja'>";
                echo "</div><br>";
                echo "<input type='submit' name='dodaj' value='dodaj'><br>";
                echo "</form>";
            }

            function strona_edytuj($id){
                $produkt=select_produkt($id);
                echo "<form method='POST' action='index.php' class='edit_produkt'>";
                echo "<input type='hidden' name='id' value='".$id."'>";
                echo "<span>name</span><input type='text' name='name' value='".$produkt["nazwa"]."' require><br>";
                echo "<span>ilosc</span><input type='number' name='ilosc' value='".$produkt["ilosc"]."' require><br>";
                echo "<span>cena</span><input type='number' name='cena' value='".$produkt["cena"]."' require><br>";
                echo "<span>marza</span><input type='number' name='marza' value='".$produkt["marza"]."' require><br>";
                echo "<span>data waznosci</span><input type='date' name='data_waznosci' value='".$produkt["data_waznosci"]."'require><br>";
                echo "<span>licytacja</span><input type='checkbox' name='licytacja'><br><script>document.getElementsByTagName('input')[7].checked=";
                if($produkt["licytacja"]){echo "true";}else{echo "false";}
                echo "</script>";
                echo "<span>Darmowa dostawa</span><input type='checkbox' name='wystawianie_faktury_vat'><br><script>document.getElementsByTagName('input')[8].checked=";
                if($produkt["wystawianie_faktury_vat"]){echo "true";}else{echo "false";}
                echo "</script>";
                echo "<textarea rows='8' columns='40' name='opis' require>".$produkt["opis"]."</textarea><br>";
                echo "<span>link do zjdecia/miniaturki</span><input type='text' name='zdjecie' value='".$produkt["zdjecie_miniaturka"]."'><br>";
                echo "<input type='submit' name='aktualizuj' value='aktualizuj'><br>";
                echo "<input type='submit' name='usun' value='usun'><br>";
                echo "</form>";
            }

            function strona_edit_kategoria($id){
                $kategorie=get_kategoria($id+1);
                // print_r($kategorie);
                echo "<form action='index.php' method='POST'>";
                echo "<span>elektornika</span><input type='checkbox' name='elektornika'>";
                echo "<span>moda</span><input type='checkbox' name='moda'>";
                echo "<span>dom_i_ogrod</span><input type='checkbox' name='dom_i_ogrod'>";
                echo "<span>supermarket</span><input type='checkbox' name='supermarket'>";
                echo "<span>dziecko</span><input type='checkbox' name='dziecko'>";
                echo "<span>uroda</span><input type='checkbox' name='uroda'>";
                echo "<span>zdrowie</span><input type='checkbox' name='zdrowie'>";
                echo "<span>kultura_i_rozrywka</span><input type='checkbox' name='kultura_i_rozrywka'>";
                echo "<span>sport_i_turystyka</span><input type='checkbox' name='sport_i_turystyka'>";
                echo "<span>motoryzacja</span><input type='checkbox' name='motoryzacja'>";
                echo "<input type='hidden' name='id' value='".$id."'>";
                echo "<input type='submit' name='aktualizuj_kat' value='edytuj'>";
                echo "<script>document.getElementsByTagName('input')[1].checked=";
                if($kategorie["elektronika"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[2].checked=";
                if($kategorie["moda"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[3].checked=";
                if($kategorie["dom_i_ogrod"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[4].checked=";
                if($kategorie["supermarket"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[5].checked=";
                if($kategorie["dziecko"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[6].checked=";
                if($kategorie["uroda"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[7].checked=";
                if($kategorie["zdrowie"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[8].checked=";
                if($kategorie["kultura_i_rozrywka"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[9].checked=";
                if($kategorie["sport_i_turystyka"]){echo "true";}else{echo "false";}
                echo ";";
                echo "document.getElementsByTagName('input')[10].checked=";
                if($kategorie["motoryzacja"]){echo "true";}else{echo "false";}
                echo "</script>";
                echo "</form>";
            }

            function strona_produktu($id){
                $produkt=select_produkt($id);
                echo "<div class='produkt_calosc'>";

                echo "<img src='".$produkt["zdjecie_miniaturka"]."' alt='Brak zdjecia!'>";
                echo "<div>";
                echo "<span class='nazwa'>".$produkt["nazwa"]."</span>";
                echo "<div><span>od ".get_sprzedawca($produkt["id_sprzedawca"])["imie"]." ".get_sprzedawca($produkt["id_sprzedawca"])["nazwisko"]."</span></div>";
                echo "</div>";

                echo "</div>";
            }

            // function strona_przejdz_dalej(){
            //     echo "<form class='przejdz_dalej'><input type='submit' name='dalej'";
            // }

            function add_produkt($name, $ilosc, $id_sprzedawca, $cena, $marza, $data_warzonsci, $licytacja, $wystawianie_faktury_vat, $opis, $zdjecie){
                global $link;
                $query_add_produkt="INSERT INTO `produkty` (`id`, `nazwa`, `ilosc`, `ilosc_dostepnych`, `id_sprzedawca`, `cena`, `marza`, `data_waznosci`, `licytacja`, `wystawianie_faktury_vat`, `opis`, `zdjecie_miniaturka`) VALUES (NULL, '$name', '$ilosc', '$ilosc', '$id_sprzedawca', '$cena', '$marza', '$data_warzonsci', '$licytacja', '$wystawianie_faktury_vat', '$opis', '$zdjecie')";
                mysqli_query($link, $query_add_produkt);
            }

            function add_kategoria($id_produktu, $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8, $x9, $x10){
                global $link;
                $query_add_kategoria="INSERT INTO `kategorie` (`id_produktu`, `elektronika`, `moda`, `dom_i_ogrod`, `supermarket`, `dziecko`, `uroda`, `zdrowie`, `kultura_i_rozrywka`, `sport_i_turystyka`, `motoryzacja`) VALUES ('$id_produktu', '$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$x7', '$x8', '$x9', '$x10')";
                mysqli_query($link,$query_add_kategoria);
            }

            function add_opcje_dostawy($id_produktu, $x1, $x2, $x3, $x4, $x5, $x6, $x7, $x8){
                global $link;
                $query_add_opcje_dostawy="INSERT INTO `opcje_dostawy` (`id_produktu`, `paczkomat_inpost`, `orlen`, `poczta_polska`, `ruch`, `zabka`, `lewiatan`, `abc`, `odbior_osobisty`) VALUES ('$id_produktu', '$x1', '$x2', '$x3', '$x4', '$x5', '$x6', '$x7', '$x8')";
                mysqli_query($link, $query_add_opcje_dostawy);
            }

            function select_produkt($id){
               global $link;
               $query_select_produkt="SELECT * FROM `produkty` WHERE id='$id'";
               $result=mysqli_query($link, $query_select_produkt);
               $tab=$result->fetch_assoc();
               return $tab; 
            }

            function select_produkty_all(){
                global $link;
                $query_select_produkty_all="SELECT * FROM `produkty`";
                $result=mysqli_query($link, $query_select_produkty_all);
                while($row=$result->fetch_assoc())
                {
                    $tab[] = $row;
                }
                return $tab;
            }

            function select_produkty_current($id_sprzedawca){
                global $link;
                $query_select_produkty_current="SELECT * FROM `produkty` WHERE id_sprzedawca='$id_sprzedawca'";
                $result=mysqli_query($link, $query_select_produkty_current);
                while($row=$result->fetch_assoc())
                {
                    $tab[] = $row;
                }
                if(!isset($tab)){
                    return NULL;
                }                
                return $tab;
            }

            function generuj_haslo(){
                $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
                $s=$s.substr(str_shuffle("!@#$%^&*();><|}{?"), 0, 1);
                return $s;
            }

            function usun_przedmiot($id){
                global $link;
                $query_usun_przedmiot="UPDATE `produkty` SET `widocznosc` = '1' WHERE `produkty`.`id` = $id";
                mysqli_query($link,$query_usun_przedmiot);
                // $query_usun_przedmiot_z_kategorii="UPDATE `kategorie` SET `widocznosc` = `1` WHERE `id_produktu` = $id";
                // mysqli_query($link,$query_usun_przedmiot_z_kategorii);
            }

            function minus_dostepne($id_produktu, $ilosc=NULL){
                global $link;
                if($ilosc==NULL){
                    $ilosc=1;
                }
                $query_minus_dostepne="UPDATE `produkty` SET `ilosc_dostepnych` = ilosc_dostepnych - $ilosc WHERE `produkty`.`id` = $id_produktu;";
                mysqli_query($link,$query_minus_dostepne);
            }

            function register_uzytkownik($imie, $nazwisko, $email, $login, $haslo){
                global $link;
                $query_register_uzytkownik_czek="SELECT * FROM `uzytkownicy` WHERE email='$email' or (imie='$imie' AND nazwisko='$nazwisko')";
                $result=mysqli_query($link, $query_register_uzytkownik_czek);
                while($row=$result->fetch_assoc())
                {
                    $tab[] = $row;
                }
                if(!isset($tab)){
                    $query_register_uzytkownik="INSERT INTO `uzytkownicy` (`Id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `premium`) VALUES (NULL, '$imie', '$nazwisko', '$email', '$login', '$haslo', '0')";
                    mysqli_query($link, $query_register_uzytkownik);
                    return 1;
                }
                else
                {
                    return 0;
                }
            }

            function login_uzytkownik($login, $haslo){
                global $link;
                $query_login_uzytkownik="SELECT * FROM `uzytkownicy` WHERE login='$login' AND haslo='$haslo';";
                $result=mysqli_query($link,$query_login_uzytkownik);
                while($row=$result->fetch_assoc())
                {
                    $tab[] = $row;
                }
                if(!isset($tab)){
                    return 0;
                }
                else
                {
                    return 1;
                }
            }

            function get_sprzedawca_id($login, $haslo){
                global $link;
                $query_get_spzedawca_id="SELECT id FROM `uzytkownicy` WHERE login='$login' and haslo='$haslo';";
                $result=mysqli_query($link,$query_get_spzedawca_id);
                $tab=$result->fetch_assoc();
                return $tab["id"];
            }

            function get_sprzedawca($id_sprzedawca){
                global $link;
                $query_get_spzedawca="SELECT * FROM `uzytkownicy` WHERE id='$id_sprzedawca'";
                $result=mysqli_query($link, $query_get_spzedawca);
                $tab=$result->fetch_assoc();
                return $tab;
            }

            function get_kategoria($id){
                global $link;
                $query_get_kategoria="SELECT * FROM `kategorie` WHERE id_produktu='$id'";
                $result=mysqli_query($link,$query_get_kategoria);
                $tab=$result->fetch_assoc();
                return $tab;
            }


            function wypisz_produkty($id_sprzedawca=NULL){
                if($id_sprzedawca==NULL){
                    echo "<div class='produkty'>";
                    if(select_produkty_all()!=NULL){
                        foreach(select_produkty_all() as $key => $value){
                            if($value["widocznosc"]!=1){
                                echo "<div class='oferta'>";
                                echo "<img src='".$value["zdjecie_miniaturka"]."' alt='error'>";
                                echo "<div>";
                                echo "<span>".$value["nazwa"]."</span>";
                                echo "<span>".get_sprzedawca($value["id_sprzedawca"])["imie"]." ".get_sprzedawca($value["id_sprzedawca"])["nazwisko"]."</span>";
                                echo "<span>".round(($value["cena"]+($value["cena"]*$value["marza"]/100)),2)."zł</span>";
                                if($value["wystawianie_faktury_vat"]){
                                    echo "<span>Darmowa dostawa</span>";
                                }
                                else
                                {
                                    echo "<span><s>Darmowa dostawa</s></span>";
                                }
                                echo "</div>";
                                echo "</div>";
                            }
                            
                        }
                    }
                    echo "</div>";
                }
                else
                {
                    echo "<div class='produkty2'>";
                    if(select_produkty_current($id_sprzedawca)!=NULL){
                        foreach(select_produkty_current($id_sprzedawca) as $key => $value){
                            if($value["widocznosc"]!=1)
                            {
                                echo "<div class='oferta'>";
                                echo "<img src='".$value["zdjecie_miniaturka"]."' alt='error'>";
                                echo "<div>";
                                echo "<span>".$value["nazwa"]."</span>";
                                echo "<span>".get_sprzedawca($value["id_sprzedawca"])["imie"]." ".get_sprzedawca($value["id_sprzedawca"])["nazwisko"]."</span>";
                                echo "<span>".round(($value["cena"]+($value["cena"]*$value["marza"]/100)),2)."zł</span>";
                                if($value["wystawianie_faktury_vat"]){
                                    echo "<span>Darmowa dostawa</span>";
                                }
                                else
                                {
                                    echo "<span><s>Darmowa dostawa</s></span>";
                                }
                                echo "</div>";
                                echo "<form method='POST' action='index.php' class='czy_edit'>";
                                echo "<input type='hidden' name='id' value='".$value["id"]."'>";
                                echo "<input type='submit' name='edytuj' value=' edytuj wartosci '>";
                                echo "<input type='submit' name='zmien_kat' value='edytuj kategorie'>";
                                echo "</form>";
                                echo "</div>";
                            }
                            
                        }
                    }
                    else{
                        echo "<h1>Brak produktow</h1>";
                    }
                    echo "</div>";
                    echo "<form action='index.php' method='POST'><input type='submit' name='dod_produkt' value='dodaj produkt'></form>";
                    
                }
            }

            function aktualizuj_kategorie($id, $x1, $x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10){
                global $link;
                $id=$id+1;
                $query_aktualizuj_kategorie="UPDATE `kategorie` SET `elektronika`='$x1',`moda`='$x2',`dom_i_ogrod`='$x3',`supermarket`='$x4',`dziecko`='$x5',`uroda`='$x6',`zdrowie`='$x7',`kultura_i_rozrywka`='$x8',`sport_i_turystyka`='$x9',`motoryzacja`='$x10' WHERE id_produktu='$id'";
                mysqli_query($link, $query_aktualizuj_kategorie);
            }

            function aktualizuj($id, $name, $cena, $marza, $data, $licytacja, $vat, $opis, $zdjecie){
                global $link;
                $query_aktualizuj="UPDATE `produkty` SET `nazwa` = '$name', `cena` = '$cena', `marza` = '$marza', `data_waznosci` = '$data', `licytacja` = '$licytacja', `wystawianie_faktury_vat` = '$vat', `opis` = '$opis', `zdjecie_miniaturka` = '$zdjecie' WHERE `produkty`.`id` = '$id'";
                mysqli_query($link,$query_aktualizuj);
                echo "<form id='dalej1'><input type='submit'></form>";
                echo "<script>document.getElementById('dalej1').submit(); </script>";
            }


            /*zdazenia i co ma sie teraz wyswietlac na stronie*/

            if(isset($_GET["page"])){
                if($_GET["page"]=="home"){
                    echo "<form id='dalej1'><input type='submit'></form>";
                    echo "<script>document.getElementById('dalej1').submit(); </script>";
                }else
                if($_GET["page"]=="login"){
                    strona_logowanie();
                }else
                if($_GET["page"]=="register"){
                    strona_register();
                }else
                if($_GET["page"]=="moje_produkty"){
                    // echo "<form method='POST' action='index.php' id='dalej2'><input type='submit' name='moje_konto' value='moje_produkty'></form>";
                    // echo "<script>document.getElementById('dalej2').submit(); </script>";
                    wypisz_produkty($_COOKIE["id"]);
                }
            }else
            if(isset($_POST["register"])){
                if(isset($_POST["imie"]) and isset($_POST["nazwisko"]) and isset($_POST["email"]) and isset($_POST["login"]) and isset($_POST["haslo"])){
                    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                        register_uzytkownik($_POST["imie"],$_POST["nazwisko"],$_POST["email"],$_POST["login"],$_POST["haslo"]);
                        strona_logowanie();
                    }
                }else{
                    strona_register(1);
                }
                
            }else
            if(isset($_POST["zaloguj"])){
                if(isset($_POST["login"]) and isset($_POST["haslo"])){
                    if(login_uzytkownik($_POST["login"], $_POST["haslo"])){
                        $dane_sprzedawca=get_sprzedawca(get_sprzedawca_id($_POST["login"],$_POST["haslo"]));
                        echo "<form method='POST' action='login.php' name='dalej1' id='dalej1'>";
                        echo "<input type='hidden' name='imie' value='".$dane_sprzedawca["imie"]."'>";
                        echo "<input type='hidden' name='nazwisko' value='".$dane_sprzedawca["nazwisko"]."'>";
                        echo "<input type='hidden' name='email' value='".$dane_sprzedawca["email"]."'>";
                        echo "<input type='hidden' name='id' value='".$dane_sprzedawca["Id"]."'>";
                        echo "<input type='submit' name='dalej' value='dalej' id='dalej'>";
                        echo "<script>document.getElementById('dalej1').submit(); </script>";
                        echo "</form>";
                    }else{
                        strona_logowanie(1);
                    }
                }
            }else
            if(isset($_POST["dodaj"])){
                $id_sprzedawca=$_COOKIE["id"];
                if(isset($_POST["licytacja"])){
                    $licytacja=1;
                }else{$licytacja=0;}
                if($_POST["wystawianie_faktury_vat"]){
                    $wystawianie_faktury_vat=1;
                }else{$wystawianie_faktury_vat=0;}
                @add_produkt($_POST["name"],$_POST["ilosc"],$id_sprzedawca,$_POST["cena"],$_POST["marza"],$_POST["data_waznosci"],$licytacja,$wystawianie_faktury_vat,$_POST["opis"],$_POST["zdjecie"]);
                if(isset($_POST["elektronika"])){
                    $x1=1;
                }else{$x1=0;}
                if(isset($_POST["moda"])){
                    $x2=1;
                }else{$x2=0;}
                if(isset($_POST["dom_i_ogrod"])){
                    $x3=1;
                }else{$x3=0;}
                if(isset($_POST["supermarket"])){
                    $x4=1;
                }else{$x4=0;}
                if(isset($_POST["dziecko"])){
                    $x5=1;
                }else{$x5=0;}
                if(isset($_POST["uroda"])){
                    $x6=1;
                }else{$x6=0;}
                if(isset($_POST["zdrowie"])){
                    $x7=1;
                }else{$x7=0;}
                if(isset($_POST["kultura_i_rozrywka"])){
                    $x8=1;
                }else{$x8=0;}
                if(isset($_POST["sport_i_turystyka"])){
                    $x9=1;
                }else{$x9=0;}
                if(isset($_POST["motoryzacja"])){
                    $x10=1;
                }else{$x10=0;}
                add_kategoria((mysqli_insert_id($link)+1),$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10);
                echo "<form id='dalej1'></form><script>document.getElementById('dalej1').submit(); </script>";
            }else
            if(isset($_POST["aktualizuj"])){
                if(isset($_POST["licytacja"])){
                    $licytacja=1;
                }else{$licytacja=0;}
                if(isset($_POST["wystawianie_faktury_vat"]))
                {
                    $wystawianie_faktury_vat=1;
                }else{$wystawianie_faktury_vat=0;}
                aktualizuj($_POST["id"], $_POST["name"], $_POST["cena"],$_POST["marza"], $_POST["data_waznosci"], $licytacja, $wystawianie_faktury_vat, $_POST["opis"], $_POST["zdjecie"]);
            }else
            if(isset($_POST["zmien_kat"])){
                strona_edit_kategoria($_POST["id"]);
            }else
            if(isset($_POST["dod_produkt"])){
                strona_dod_pordukt();
            }else
            if(isset($_POST["aktualizuj_kat"])){
                if(isset($_POST["elektronika"])){
                    $x1=1;
                }else{$x1=0;}
                if(isset($_POST["moda"])){
                    $x2=1;
                }else{$x2=0;}
                if(isset($_POST["dom_i_ogrod"])){
                    $x3=1;
                }else{$x3=0;}
                if(isset($_POST["supermarket"])){
                    $x4=1;
                }else{$x4=0;}
                if(isset($_POST["dziecko"])){
                    $x5=1;
                }else{$x5=0;}
                if(isset($_POST["uroda"])){
                    $x6=1;
                }else{$x6=0;}
                if(isset($_POST["zdrowie"])){
                    $x7=1;
                }else{$x7=0;}
                if(isset($_POST["kultura_i_rozrywka"])){
                    $x8=1;
                }else{$x8=0;}
                if(isset($_POST["sport_i_turystyka"])){
                    $x9=1;
                }else{$x9=0;}
                if(isset($_POST["motoryzacja"])){
                    $x10=1;
                }else{$x10=0;}
                // var_dump($_POST);
                aktualizuj_kategorie($_POST["id"],$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8,$x9,$x10);
                echo "<form id='dalej1'></form><script>document.getElementById('dalej1').submit(); </script>";
            }else
            if(isset($_POST["usun"])){
                usun_przedmiot($_POST["id"]);
                echo "<form id='dalej1'></form><script>document.getElementById('dalej1').submit(); </script>";
            }else
            if(isset($_POST["edytuj"])){
                strona_edytuj($_POST["id"]);
            }else
            if(isset($_POST["moje_konto"])){
                wypisz_produkty($_COOKIE["id"]);         
            }else
            if(isset($_COOKIE["id"])){
                wypisz_produkty();
            }else{
                strona_register();
                echo "<br>";
                strona_logowanie();
            }
            
        ?>

        <form><input type="submit"></form>
        
        <!-- <form method="POST" action="index.php">
            <input type="submit" name="moje_konto" value="moje_produkty">
        </form>
         -->

        <script>
            function sprawdzenie(ktory, ja){
                if(document.getElementsByClassName("register_haslo")[ja].value==document.getElementsByClassName("register_haslo")[ktory].value){
                    document.getElementsByClassName("register_haslo")[ja].style="border: 1px solid lime";                    document.getElementsByClassName("register_haslo")[ja].style="border: 1px solid lime";
                    document.getElementsByClassName("register_haslo")[ktory].style="border: 1px solid lime";
                }
                else
                {
                    document.getElementsByClassName("register_haslo")[ja].style="border: 1px solid red;";
                    document.getElementsByClassName("register_haslo")[ktory].style="border: 1px solid red;";
                }
            }

            function podglad(ktory){
                if(document.getElementsByClassName("register_haslo")[ktory].type=="text")
                {
                    document.getElementsByClassName("register_haslo")[ktory].type="password";
                }else{
                    document.getElementsByClassName("register_haslo")[ktory].type="text";
                }
            }
        </script>
        <!-- <script src="http://proveskill.pl/api/lestar_api.js"></script>

        <script>
            let x = Lestar.createObject(1,false)[0];
            x.set('id',2);
            x.createName('koko');
            x.add('name','lol');
            

            let ilosc_enemy=2;

            let Enemys = Lestar.createObject(ilosc_enemy);
            Enemys[0].createName('zombie');
            Enemys[1].createName('warrior');

            Lestar.showAllInArrayToConsole(Enemys);

        </script> -->
    </body>
</html>