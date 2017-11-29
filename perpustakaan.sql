-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 29 nov 2017 kl 16:20
-- Serverversion: 10.1.28-MariaDB
-- PHP-version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admin`
--

CREATE TABLE `admin` (
  `username` varchar(250) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Tabellstruktur `buku`
--

CREATE TABLE `buku` (
  `ISBN` varchar(10) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `buku`
--

INSERT INTO `buku` (`ISBN`, `judul_buku`, `pengarang`, `penerbit`, `jenis`) VALUES
('1001', 'Belah Duren', 'Julia Peres', 'PT Gondal Gandul', 'Romance'),
('1002', 'Cara Merakit Bom', 'Osama Bin Laden', 'PT Terroris', 'Tutorial');

-- --------------------------------------------------------

--
-- Tabellstruktur `student`
--

CREATE TABLE `student` (
  `id` int(4) NOT NULL,
  `email_st` varchar(250) NOT NULL,
  `pwd_st` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `student`
--

INSERT INTO `student` (`id`, `email_st`, `pwd_st`) VALUES
(8, 'ingefara@ikea.se', 'JATTEbra'),
(9, 'andreas_pillar@aol.com', 'OKE');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Index för tabell `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index för tabell `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `student`
--
ALTER TABLE `student`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
