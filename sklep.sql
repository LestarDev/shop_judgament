-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Mar 2022, 09:52
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_produktu` int(11) NOT NULL,
  `elektronika` int(1) NOT NULL,
  `moda` int(1) NOT NULL,
  `dom_i_ogrod` int(1) NOT NULL,
  `supermarket` int(1) NOT NULL,
  `dziecko` int(1) NOT NULL,
  `uroda` int(1) NOT NULL,
  `zdrowie` int(1) NOT NULL,
  `kultura_i_rozrywka` int(1) NOT NULL,
  `sport_i_turystyka` int(1) NOT NULL,
  `motoryzacja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_produktu`, `elektronika`, `moda`, `dom_i_ogrod`, `supermarket`, `dziecko`, `uroda`, `zdrowie`, `kultura_i_rozrywka`, `sport_i_turystyka`, `motoryzacja`) VALUES
(4, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(13, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(14, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(15, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opcje_dostawy`
--

CREATE TABLE `opcje_dostawy` (
  `id_produktu` int(11) NOT NULL,
  `paczkomat_inpost` int(1) NOT NULL,
  `orlen` int(1) NOT NULL,
  `poczta_polska` int(1) NOT NULL,
  `ruch` int(1) NOT NULL,
  `zabka` int(1) NOT NULL,
  `lewiatan` int(1) NOT NULL,
  `abc` int(1) NOT NULL,
  `odbior_osobisty` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `opcje_dostawy`
--

INSERT INTO `opcje_dostawy` (`id_produktu`, `paczkomat_inpost`, `orlen`, `poczta_polska`, `ruch`, `zabka`, `lewiatan`, `abc`, `odbior_osobisty`) VALUES
(4, 1, 0, 0, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `ilosc` int(6) NOT NULL,
  `ilosc_dostepnych` int(6) NOT NULL,
  `id_sprzedawca` int(11) NOT NULL,
  `cena` float NOT NULL,
  `marza` int(3) NOT NULL,
  `data_waznosci` date NOT NULL,
  `licytacja` int(1) NOT NULL,
  `wystawianie_faktury_vat` int(1) NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `zdjecie_miniaturka` text COLLATE utf8mb4_polish_ci NOT NULL,
  `widocznosc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `ilosc`, `ilosc_dostepnych`, `id_sprzedawca`, `cena`, `marza`, `data_waznosci`, `licytacja`, `wystawianie_faktury_vat`, `opis`, `zdjecie_miniaturka`, `widocznosc`) VALUES
(11, 'arturProdukt', 2, 2, 2, 33, 20, '2022-04-30', 0, 1, 'Produkt artura', 'https://s3.przepisy.pl/przepisy3ii/img/variants/1280x0/jablko1213810.jpg', 1),
(12, 'a-t1', 2, 2, 2, 33, 100, '2022-03-26', 0, 1, 'test kategorii', 'https://sklep.onlemon.pl/data/include/img/news/1606817970.jpg', 0),
(13, 'a-t1', 2, 2, 2, 33, 100, '2022-03-26', 1, 0, 'test kategorii', 'https://sklep.onlemon.pl/data/include/img/news/1606817970.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `Id` int(11) NOT NULL,
  `imie` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_polish_ci NOT NULL,
  `login` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(32) COLLATE utf8mb4_polish_ci NOT NULL,
  `premium` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`Id`, `imie`, `nazwisko`, `email`, `login`, `haslo`, `premium`) VALUES
(1, 'Mateusz', 'Borkowski', 'm.borkowski.2005@gmail.com', 'LestarDev', 'op9001!', 1),
(2, 'Artur', 'Karczewski', 'pijo@wp.pl', 'pijo123', 'arturk', 0),
(3, 'Wlasciciel', 'Projektu', 'nic@root.localhot', 'root', 'root', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
