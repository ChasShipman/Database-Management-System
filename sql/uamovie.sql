-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 05:06 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uamovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`) VALUES
('anthony'),
('bailey'),
('cesaer'),
('chas'),
('claire'),
('colin'),
('francis'),
('frankie'),
('gracie'),
('henry'),
('javy'),
('jesse'),
('kris'),
('mike'),
('minrui'),
('mozzie'),
('neil'),
('nick'),
('pepper'),
('peter'),
('petey'),
('shane');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Username`) VALUES
('cto'),
('dori'),
('jack'),
('jim'),
('kelly'),
('president');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `Title` varchar(50) NOT NULL,
  `Rating` varchar(10) DEFAULT NULL,
  `Genre` varchar(30) DEFAULT NULL,
  `Length` time DEFAULT NULL,
  `AverageRating` float DEFAULT NULL,
  `Synopsis` varchar(1000) DEFAULT NULL,
  `Cast` varchar(500) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`Title`, `Rating`, `Genre`, `Length`, `AverageRating`, `Synopsis`, `Cast`, `ReleaseDate`) VALUES
('A Star Is Born', 'R', 'Drama / Music / Romance', '02:16:00', 4, 'A musician helps a young singer find fame, even as age and alcoholism send his own career into a downward spiral.', 'Lady Gaga, Ally, Bradley Cooper, Jack, Sam Elliot, Bobby, Andrew Dice Clay, Lorenzo, Rafi Gavron, Rez Gavron', '2018-10-05'),
('At Eternity\'s Gate', 'PG-13', 'Biography / Drama', '01:50:00', 3.5, 'A look at the life of painter Vincent van Gogh during the time he lived in Arles and Auvers-sur-Oise, France.', 'Willem Dafoe, Vincent Van Gogh, Rupert Friend, Theo Van Gogh, Oscar Isaac, Paul Gauguin, Mads Mikkelsen, The Priest, Mathieu Amalric, Dr. Paul Gachet', '2018-11-16'),
('Bohemian Rhapsody', 'PG-13', 'Biography / Drama / Music', '02:14:00', 4.4, 'A chronicle of the years leading up to Queen\'s legendary appearance at the Live Aid (1985) concert.', 'Rami Malek, Freddie Mercury, Lucy Boynton, Mary Austin, Gwilym Lee, Brian May, Ben Hardy, Roger Taylor, Joseph Mazzello, John Deacon (as Joe Mazzello)', '2018-11-02'),
('Creed II', 'PG-13', 'Drama / Sport', '02:00:00', 5, 'Under the tutelage of Rocky Balboa, newly crowned light heavyweight champion Adonis Creed faces off against Viktor Drago, the son of Ivan Drago.', 'Tessa Thompson, Bianca, Sylvester Stallone, 	Rocky Balboa, Michael B. Jordan, Adonis Johnson, Dolph Lundgren, Ivan Drago, Florian Munteanu, Viktor Drago', '2018-12-06'),
('Fantastic Beasts: The Crimes of Grindelwald', 'PG-13', 'Adventure / Family / Fantasy', '02:14:00', 4, 'The second installment of the \"Fantastic Beasts\" series set in J.K. Rowling\'s Wizarding World featuring the adventures of magizoologist Newt Scamander.', 'Eddie Redmayne, Newt Scamander, Katherine Waterston,	Tina Goldstein, Dan Fogler, Jacob Kowalski, Alison Sudol, Queenie Goldstein, Ezra Miller, Credence Barebone', '2018-11-16'),
('Halloween', 'R', 'Horror / Thriller', '01:46:00', 5, 'Laurie Strode confronts her long-time foe Michael Myers, the masked figure who has haunted her since she narrowly escaped his killing spree on Halloween night four decades ago.', 'Jamie Lee Curtis, Laurie Strode, Judy Greer, Karen, Andi Matichak, Allyson, James Jude Courtney, The Shape, Nick Castle, The Shape', '2018-10-19'),
('Instant Family', 'PG-13', 'Comedy', '02:00:00', 4.5, 'A couple find themselves in over their heads when they adopt three children.', 'Mark Wahlberg, Pete, Rose Byrne, Ellie, Isabela Moner, Lizzy, Gustavo Quiroz, Juan, Julianna Gamiz, Lita', '2018-11-16'),
('Mid90s', 'R', 'Comedy / Drama', '01:25:00', 3, 'Follows Stevie, a thirteen-year-old in 1990s-era Los Angeles who spends his summer navigating between his troubled home life and a group of new friends that he meets at a Motor Avenue skate shop.', 'Sunny Suljic, Stevie, Katherine Waterston, Dabney, Lucas Hedges, Ian, Na-kel Smith, Ray, Olan Prenatt, Fuckshit', '2018-10-26'),
('Ralph Breaks the Internet', 'PG', 'Animation / Adventure / Comedy', '01:52:00', 1, 'Six years after the events of \"Wreck-It Ralph\", Ralph and Vanellope, now friends, discover a wi-fi router in their arcade, leading them into a new adventure.', 'John C. Reilly, Ralph (voice), Sarah Silverman, Vanellope (voice), Gal Gadot, Shank (voice), Taraji P. Henson, Yesss (voice), Jack McBrayer, Felix (voice)', '2018-12-06'),
('Robin Hood', 'PG-13', 'Action / Adventure', '01:56:00', 3, 'A war-hardened Crusader and his Moorish commander mount an audacious revolt against the corrupt English crown in a thrilling action-adventure packed with gritty battlefield exploits, mind-blowing fight choreography, and a timeless romance.', 'Taron Egerton, Robin of Loxley, Jamie Foxx, Yahya / John, Ben Mendelsohn, Sheriff of Nottingham, Eve Hewson, 	Marian, Jamie Dornan, Will Scarlet', '2018-12-06'),
('The Last Race', 'PG-13', ' Documentary / Sport ', '01:15:00', 4, 'THE LAST RACE is the portrait of a small-town stock car racetrack and the tribe of blue-collar drivers that call it home, struggling to hold onto an American racing tradition as the world around them is transformed by globalization and commercialization.', 'Marty Berger, Real estate developer, Mike Cappiello, Track official, Barbara Cromarty, Race track co-owner, Jim Cromarty, Race track co-owner, Bob Finan, Announcer', '2018-11-16'),
('The Nutcracker and the Four Realms', 'PG', 'Adventure / Family / Fantasy', '01:39:00', 3.5, 'A young girl is transported into a magical world of gingerbread soldiers and an army of mice.', 'Mackenzie Foy, Clara, Tom Sweet, Fritz, Meera Syal, Cook, Ellie Bamber, Louise, Matthew Macfadyen, Mr. Stahlbaum', '2018-11-02'),
('The World Before Your Feet', 'PG-13', 'Documentary', '01:35:00', 2.5, 'For over six years, and for reasons he can\'t explain, Matt Green, 37, has been walking every block of every street in New York City - a journey of more than 8,000 miles. THE WORLD BEFORE YOUR FEET tells the story of one man\'s unusual personal quest and the unexpected journey of discovery, humanity, and wonder that ensues.', 'Matt Green, Himself', '2018-12-06'),
('Venom', 'PG-13', 'Action / Sci-Fi', '01:52:00', 3, 'When Eddie Brock acquires the powers of a symbiote, he will have to release his alter-ego \"Venom\" to save his life.', 'Tomy Hardy, Eddie Brock / Venom, Michelle Williams, Anne Weying, Riz Ahmed, Carlton Drake / Riot, Scott Haze, Security Chief Roland Treece, Reid Scott, Dr. Dan Lewis', '2018-10-05'),
('Widows', 'R', 'Crime / Drama / Romance', '02:09:00', 4, 'Set in contemporary Chicago, amidst a time of turmoil, four women with nothing in common except a debt left behind by their dead husbands\' criminal activities, take fate into their own hands, and conspire to forge a future on their own terms.', 'Viola Davis, Veronica, Liam Neeson, Harry Rawlings, Jon Bernthal, Florek, Manuel Garcia-Rulfo, Carlos, Coburn Goss, Jimmy Nunn', '2018-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NoSeniorTickets` int(11) NOT NULL,
  `NoAdultTickets` int(11) NOT NULL,
  `NoChildTickets` int(11) NOT NULL,
  `Time` time NOT NULL,
  `TotalTickets` int(11) NOT NULL,
  `TotalCost` double NOT NULL,
  `Status` varchar(12) NOT NULL,
  `Cemail` varchar(50) NOT NULL,
  `MovieTitle` varchar(50) NOT NULL,
  `CardNo` bigint(16) NOT NULL,
  `TheatreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `Date`, `NoSeniorTickets`, `NoAdultTickets`, `NoChildTickets`, `Time`, `TotalTickets`, `TotalCost`, `Status`, `Cemail`, `MovieTitle`, `CardNo`, `TheatreID`) VALUES
(1, '2018-11-04', 0, 1, 0, '16:00:00', 1, 11.54, 'complete', 'henry@gmail.com', 'Bohemian Rhapsody', 1111222233334444, 6666),
(2, '2018-12-07', 0, 1, 0, '16:00:00', 1, 11.54, 'unused', 'henry@gmail.com', 'Creed II', 5555666677778888, 5555),
(3, '2018-11-04', 0, 1, 0, '15:00:00', 1, 5, 'cancelled', 'minrui@gmail.com', 'A Star Is Born', 2236554111232254, 3333),
(4, '2018-11-16', 0, 1, 0, '14:00:00', 1, 5, 'cancelled', 'minrui@gmail.com', 'The Last Race', 1145662588457742, 4444),
(5, '2018-11-16', 1, 1, 0, '12:00:00', 2, 20.77, 'complete', 'minrui@gmail.com', 'At Eternity\'s Gate', 2236554111232254, 6666),
(6, '2018-11-01', 0, 1, 0, '15:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'A Star Is Born', 1234566987455556, 3333),
(7, '2018-11-22', 1, 1, 0, '13:00:00', 2, 20.77, 'complete', 'henry@gmail.com', 'Widows', 1111222233334444, 5555),
(8, '2018-12-08', 0, 1, 0, '11:00:00', 1, 11.54, 'unused', 'chas@gmail.com', 'Creed II', 2224555866697774, 6666),
(9, '2018-12-07', 0, 1, 0, '10:00:00', 1, 5, 'cancelled', 'chas@gmail.com', 'Ralph Breaks the Internet', 3326554188963325, 6666),
(10, '2018-11-17', 1, 1, 1, '18:00:00', 3, 28.85, 'unused', 'henry@gmail.com', 'Fantastic Beasts: The Crimes of Grindelwald', 1111222233334444, 1111),
(11, '2018-12-07', 0, 1, 0, '13:00:00', 1, 11.54, 'unused', 'chas@gmail.com', 'The World Before Your Feet', 3326554188963325, 4444),
(12, '2018-11-17', 0, 1, 0, '18:00:00', 1, 5, 'cancelled', 'henry@gmail.com', 'Fantastic Beasts: The Crimes of Grindelwald', 5555666677778888, 1111),
(13, '2018-12-05', 1, 1, 0, '10:00:00', 2, 20.77, 'unused', 'henry@gmail.com', 'Ralph Breaks the Internet', 1111222233334444, 6666),
(14, '2018-10-11', 0, 1, 0, '15:00:00', 1, 11.54, 'complete', 'chas@gmail.com', 'A Star Is Born', 3326554188963325, 3333),
(15, '2018-12-06', 0, 1, 0, '11:00:00', 1, 5, 'cancelled', 'chas@gmail.com', 'Creed II', 2224555866697774, 6666),
(16, '2018-11-16', 1, 1, 0, '12:00:00', 2, 20.77, 'complete', 'chas@gmail.com', 'At Eternity\'s Gate', 3326554188963325, 6666),
(17, '2018-10-05', 0, 1, 0, '22:00:00', 1, 11.54, 'complete', 'henry@gmail.com', 'Venom', 5555666677778888, 5555),
(18, '2018-11-16', 0, 1, 0, '12:00:00', 1, 5, 'cancelled', 'chas@gmail.com', 'At Eternity\'s Gate', 3326554188963325, 6666),
(19, '2018-12-07', 0, 1, 1, '13:00:00', 2, 19.62, 'unused', 'mike@gmail.com', 'The World Before Your Feet', 1234566987455556, 4444),
(20, '2018-11-08', 0, 1, 0, '16:00:00', 1, 5, 'cancelled', 'chas@gmail.com', 'Bohemian Rhapsody', 2224555866697774, 6666),
(21, '2018-11-05', 1, 2, 0, '15:00:00', 3, 32.31, 'complete', 'jesse@gmail.com', 'Mid90s', 2214441255236625, 4444),
(22, '2018-11-05', 0, 2, 0, '15:00:00', 2, 23.08, 'complete', 'chas@gmail.com', 'Halloween', 2224555866697774, 4444),
(23, '2018-11-17', 1, 1, 0, '13:00:00', 2, 20.77, 'complete', 'mike@gmail.com', 'Instant Family', 1234566987455556, 6666),
(24, '2018-11-22', 0, 1, 0, '13:00:00', 1, 5, 'cancelled', 'jesse@gmail.com', 'Widows', 1125554788859964, 5555),
(25, '2018-11-05', 0, 1, 0, '15:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'Halloween', 1234566987455556, 4444),
(26, '2018-12-08', 0, 1, 0, '16:00:00', 1, 11.54, 'unused', 'chas@gmail.com', 'Robin Hood', 3326554188963325, 6666),
(27, '2018-11-16', 0, 1, 0, '12:00:00', 1, 11.54, 'complete', 'chas@gmail.com', 'At Eternity\'s Gate', 2224555866697774, 6666),
(28, '2018-11-17', 0, 1, 2, '18:00:00', 3, 27.7, 'complete', 'jesse@gmail.com', 'Fantastic Beasts: The Crimes of Grindelwald', 2214441255236625, 1111),
(29, '2018-12-09', 0, 1, 0, '11:00:00', 1, 11.54, 'unused', 'mike@gmail.com', 'Creed II', 1234566987455556, 6666),
(30, '2018-12-08', 0, 1, 0, '10:00:00', 1, 11.54, 'unused', 'minrui@gmail.com', 'Ralph Breaks the Internet', 1145662588457742, 6666),
(31, '2018-11-05', 1, 1, 0, '19:00:00', 2, 20.77, 'unused', 'minrui@gmail.com', 'The Nutcracker and the Four Realms', 2236554111232254, 2222),
(32, '2018-11-05', 0, 1, 0, '16:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'Bohemian Rhapsody', 1234566987455556, 6666),
(33, '2018-10-05', 0, 1, 0, '22:00:00', 1, 11.54, 'unused', 'minrui@gmail.com', 'Venom', 2236554111232254, 5555),
(34, '2018-11-05', 1, 1, 0, '15:00:00', 2, 20.77, 'complete', 'mike@gmail.com', 'Mid90s', 1234566987455556, 4444),
(35, '2018-11-17', 0, 1, 0, '18:00:00', 0, 5, 'cancelled', 'minrui@gmail.com', 'Fantastic Beasts: The Crimes of Grindelwald', 1145662588457742, 1111),
(36, '2018-11-17', 0, 1, 0, '13:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'Instant Family', 1234566987455556, 6666),
(37, '2018-11-05', 1, 1, 0, '19:00:00', 2, 20.77, 'unused', 'jesse@gmail.com', 'The Nutcracker and the Four Realms', 1125554788859964, 2222),
(38, '2018-11-05', 0, 1, 0, '15:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'Mid90s', 1234566987455556, 4444),
(39, '2018-11-22', 0, 1, 0, '14:00:00', 1, 5, 'cancelled', 'mike@gmail.com', 'The Last Race', 1234566987455556, 4444),
(40, '2018-12-07', 0, 1, 0, '16:00:00', 1, 11.54, 'unused', 'mike@gmail.com', 'Robin Hood', 1234566987455556, 6666),
(41, '2018-11-29', 0, 2, 0, '19:00:00', 2, 23.08, 'complete', 'chas@gmail.com', 'The Nutcracker and the Four Realms', 2224555866697774, 2222),
(42, '2018-11-29', 0, 1, 0, '19:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'The Nutcracker and the Four Realms', 1234566987455556, 2222),
(43, '2018-11-29', 0, 1, 0, '14:00:00', 1, 11.54, 'complete', 'henry@gmail.com', 'The Last Race', 1111222233334444, 4444),
(44, '2018-11-29', 0, 1, 0, '14:00:00', 1, 11.54, 'complete', 'jesse@gmail.com', 'The Last Race', 2214441255236625, 4444),
(45, '2018-12-06', 0, 1, 0, '16:00:00', 1, 11.54, 'unused', 'henry@gmail.com', 'Creed II', 1111222233334444, 5555),
(46, '2018-11-05', 0, 1, 0, '16:00:00', 1, 11.54, 'complete', 'mike@gmail.com', 'Bohemian Rhapsody', 1234566987455556, 6666),
(47, '2018-11-06', 0, 1, 0, '16:00:00', 1, 11.54, 'complete', 'henry@gmail.com', 'Bohemian Rhapsody', 1111222233334444, 6666),
(48, '2018-12-03', 0, 1, 0, '19:00:00', 1, 11.54, 'unused', 'henry@gmail.com', 'Venom', 2222444488886666, 6666);

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `CardNo` bigint(16) NOT NULL,
  `NameOnCard` varchar(50) NOT NULL,
  `CVV` int(11) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Saved` varchar(5) NOT NULL,
  `Cemail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`CardNo`, `NameOnCard`, `CVV`, `ExpirationDate`, `Saved`, `Cemail`) VALUES
(1125554788859964, 'Jesse', 263, '2019-04-01', 'true', 'jesse@gmail.com'),
(1145662588457742, 'Minrui', 147, '2019-04-01', 'true', 'minrui@gmail.com'),
(1234566987455556, 'Mike', 145, '2019-03-01', 'true', 'mike@gmail.com'),
(1236547885211458, 'Mike', 254, '2019-05-01', 'true', 'mike@gmail.com'),
(2214441255236625, 'Jesse', 226, '2019-03-01', 'true', 'jesse@gmail.com'),
(2222444488886666, 'Henry', 123, '2019-02-01', 'false', 'henry@gmail.com'),
(2224555866697774, 'Chas', 789, '2019-06-01', 'true', 'chas@gmail.com'),
(2236554111232254, 'Minrui', 885, '2019-03-01', 'true', 'minrui@gmail.com'),
(3326554188963325, 'Chas', 256, '2019-04-01', 'true', 'chas@gmail.com'),
(5555666677778888, 'Henry', 456, '2019-02-01', 'true', 'henry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `playsat`
--

CREATE TABLE `playsat` (
  `MovieTitle` varchar(50) NOT NULL,
  `TheatreID` int(11) NOT NULL,
  `ShowTime` time DEFAULT NULL,
  `Playing` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playsat`
--

INSERT INTO `playsat` (`MovieTitle`, `TheatreID`, `ShowTime`, `Playing`) VALUES
('A Star Is Born', 3333, '15:00:00', 'true'),
('Bohemian Rhapsody', 6666, '16:00:00', 'true'),
('Mid90s', 4444, '15:00:00', 'true'),
('The Nutcracker and the Four Realms', 2222, '19:00:00', 'true'),
('Venom', 5555, '22:00:00', 'true'),
('Halloween', 4444, '15:00:00', 'true'),
('Widows', 5555, '13:00:00', 'true'),
('The Last Race', 4444, '14:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 1111, '18:00:00', 'true'),
('Creed II', 6666, '11:00:00', 'false'),
('Robin Hood', 2222, '19:00:00', 'false'),
('Ralph Breaks the Internet', 6666, '10:00:00', 'false'),
('The World Before Your Feet', 4444, '13:00:00', 'false'),
('At Eternity\'s Gate', 1111, '13:00:00', 'true'),
('Instant Family', 2222, '12:00:00', 'true'),
('The World Before Your Feet', 1111, '12:00:00', 'false'),
('The World Before Your Feet', 2222, '12:00:00', 'false'),
('The World Before Your Feet', 3333, '12:00:00', 'false'),
('The World Before Your Feet', 5555, '12:00:00', 'false'),
('The World Before Your Feet', 6666, '12:00:00', 'false'),
('Ralph Breaks the Internet', 1111, '14:00:00', 'false'),
('Ralph Breaks the Internet', 2222, '14:00:00', 'false'),
('Ralph Breaks the Internet', 3333, '14:00:00', 'false'),
('Ralph Breaks the Internet', 4444, '14:00:00', 'false'),
('Ralph Breaks the Internet', 5555, '14:00:00', 'false'),
('Robin Hood', 1111, '16:00:00', 'false'),
('Robin Hood', 3333, '16:00:00', 'false'),
('Robin Hood', 4444, '16:00:00', 'false'),
('Robin Hood', 5555, '16:00:00', 'false'),
('Robin Hood', 6666, '16:00:00', 'false'),
('Creed II', 1111, '16:00:00', 'false'),
('Creed II', 2222, '16:00:00', 'false'),
('Creed II', 3333, '16:00:00', 'false'),
('Creed II', 4444, '16:00:00', 'false'),
('Creed II', 5555, '16:00:00', 'false'),
('A Star Is Born', 1111, '18:00:00', 'true'),
('A Star Is Born', 2222, '18:00:00', 'true'),
('A Star Is Born', 4444, '18:00:00', 'true'),
('A Star Is Born', 5555, '18:00:00', 'true'),
('A Star Is Born', 6666, '18:00:00', 'true'),
('At Eternity\'s Gate', 2222, '12:00:00', 'true'),
('At Eternity\'s Gate', 3333, '12:00:00', 'true'),
('At Eternity\'s Gate', 4444, '12:00:00', 'true'),
('At Eternity\'s Gate', 5555, '12:00:00', 'true'),
('At Eternity\'s Gate', 6666, '12:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 2222, '15:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 3333, '15:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 4444, '15:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 5555, '15:00:00', 'true'),
('Fantastic Beasts: The Crimes of Grindelwald', 6666, '15:00:00', 'true'),
('The Last Race', 1111, '17:00:00', 'true'),
('The Last Race', 2222, '17:00:00', 'true'),
('The Last Race', 3333, '17:00:00', 'true'),
('The Last Race', 5555, '17:00:00', 'true'),
('The Last Race', 6666, '17:00:00', 'true'),
('Widows', 1111, '17:00:00', 'true'),
('Widows', 2222, '17:00:00', 'true'),
('Widows', 3333, '17:00:00', 'true'),
('Widows', 4444, '17:00:00', 'true'),
('Widows', 6666, '17:00:00', 'true'),
('Halloween', 1111, '11:00:00', 'true'),
('Halloween', 2222, '11:00:00', 'true'),
('Halloween', 3333, '11:00:00', 'true'),
('Halloween', 5555, '11:00:00', 'true'),
('Halloween', 6666, '11:00:00', 'true'),
('Venom', 1111, '19:00:00', 'true'),
('Venom', 2222, '19:00:00', 'true'),
('Venom', 3333, '19:00:00', 'true'),
('Venom', 4444, '19:00:00', 'true'),
('Venom', 6666, '19:00:00', 'true'),
('The Nutcracker and the Four Realms', 1111, '14:00:00', 'true'),
('The Nutcracker and the Four Realms', 3333, '14:00:00', 'true'),
('The Nutcracker and the Four Realms', 4444, '14:00:00', 'true'),
('The Nutcracker and the Four Realms', 5555, '14:00:00', 'true'),
('The Nutcracker and the Four Realms', 6666, '14:00:00', 'true'),
('Mid90s', 1111, '18:00:00', 'true'),
('Mid90s', 2222, '18:00:00', 'true'),
('Mid90s', 3333, '18:00:00', 'true'),
('Mid90s', 5555, '18:00:00', 'true'),
('Mid90s', 6666, '18:00:00', 'true'),
('Bohemian Rhapsody', 1111, '15:00:00', 'true'),
('Bohemian Rhapsody', 2222, '15:00:00', 'true'),
('Bohemian Rhapsody', 3333, '15:00:00', 'true'),
('Bohemian Rhapsody', 4444, '15:00:00', 'true'),
('Bohemian Rhapsody', 5555, '15:00:00', 'true'),
('Instant Family', 1111, '13:00:00', 'true'),
('Instant Family', 3333, '13:00:00', 'true'),
('Instant Family', 4444, '13:00:00', 'true'),
('Instant Family', 5555, '13:00:00', 'true'),
('Instant Family', 6666, '13:00:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `prefers`
--

CREATE TABLE `prefers` (
  `Username` varchar(15) DEFAULT NULL,
  `TheatreID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefers`
--

INSERT INTO `prefers` (`Username`, `TheatreID`) VALUES
('henry', 1111),
('henry', 5555),
('minrui', 2222),
('minrui', 3333),
('mike', 3333),
('mike', 4444),
('chas', 3333),
('chas', 4444),
('nick', 3333),
('nick', 6666),
('cesaer', 2222),
('cesaer', 3333),
('henry', 6666);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `Rating` float NOT NULL,
  `Cemail` varchar(50) DEFAULT NULL,
  `MovieTitle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `Title`, `Comments`, `Rating`, `Cemail`, `MovieTitle`) VALUES
(1, 'Wow', 'It was pretty amazing.', 5, 'henry@gmail.com', 'Bohemian Rhapsody'),
(2, 'Meh', 'Nothing Specail.', 3, 'minrui@gmail.com', 'At Eternity\'s Gate'),
(3, 'Touching', 'I have never felt so sad', 4, 'henry@gmail.com', 'Widows'),
(4, 'Alright', 'It was alright', 3, 'chas@gmail.com', 'The World Before Your Feet'),
(5, 'Trash', 'Do not see this', 1, 'henry@gmail.com', 'Ralph Breaks the Internet'),
(6, 'Pretty Good', 'I liked it', 4, 'chas@gmail.com', 'At Eternity\'s Gate'),
(7, 'Well Then', 'Not a complete waste', 2, 'mike@gmail.com', 'The World Before Your Feet'),
(8, 'Nice', 'I had a great time', 4, 'jesse@gmail.com', 'Mid90s'),
(9, 'Pretty Funny', 'I laughed alot', 4, 'mike@gmail.com', 'Instant Family'),
(10, 'AMAZING!!!!', 'Best thriller of the year!', 5, 'mike@gmail.com', 'Halloween'),
(11, 'Another Remake', 'Not as good as disneys movie.', 3, 'chas@gmail.com', 'Robin Hood'),
(12, 'Another good movie', 'Has its faults but its alright', 4, 'jesse@gmail.com', 'Fantastic Beasts: The Crimes of Grindelwald'),
(13, 'Creeds back', 'A great sequel, expands on the previous movie!', 5, 'mike@gmail.com', 'Creed II'),
(14, 'Tribute', 'A great tribute to Freddy.', 4, 'mike@gmail.com', 'Bohemian Rhapsody'),
(15, 'Meh', 'I did not find it that funny', 2, 'mike@gmail.com', 'Mid90s'),
(16, 'Alright', 'I had fun watching it.', 3, 'mike@gmail.com', 'Robin Hood'),
(17, 'Very Nice', 'Now THIS is comedy', 5, 'mike@gmail.com', 'Instant Family'),
(2224, 'Great Movie!', 'The movie was so good!', 4, 'henry@gmail.com', 'Bohemian Rhapsody'),
(2225, 'Fantastic!', 'The movie was incredible. A must see!', 4, 'mike@gmail.com', 'Bohemian Rhapsody'),
(2230, 'Fantastic', 'I loved every second of it!', 5, 'mike@gmail.com', 'Bohemian Rhapsody'),
(2231, 'Not bad.', 'It was okay.', 3, 'henry@gmail.com', 'Venom'),
(2232, 'It was good', 'I liked it.', 4, 'chas@gmail.com', 'A Star Is Born'),
(2233, 'Really good', 'I really enjoyed this movie.', 4, 'mike@gmail.com', 'A Star Is Born'),
(2234, 'Okay', 'It was alright.', 3, 'chas@gmail.com', 'The Nutcracker and the Four Realms'),
(2235, 'Eh', 'It was okay.', 4, 'mike@gmail.com', 'The Nutcracker and the Four Realms'),
(2236, 'Good', 'I enjoyed it.', 4, 'henry@gmail.com', 'The Last Race'),
(2237, 'Great', 'I thought it was good.', 4, 'jesse@gmail.com', 'The Last Race');

-- --------------------------------------------------------

--
-- Table structure for table `systeminfo`
--

CREATE TABLE `systeminfo` (
  `CancellationFee` int(11) NOT NULL,
  `TicketCost` double NOT NULL,
  `ManagerPassword` int(11) NOT NULL,
  `SeniorDiscount` decimal(1,1) NOT NULL,
  `ChildDiscount` decimal(1,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systeminfo`
--

INSERT INTO `systeminfo` (`CancellationFee`, `TicketCost`, `ManagerPassword`, `SeniorDiscount`, `ChildDiscount`) VALUES
(5, 11.54, 12345, '0.8', '0.7');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `TheatreID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` int(11) NOT NULL,
  `State` varchar(2) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `ZipCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`TheatreID`, `Name`, `Address`, `State`, `City`, `Street`, `ZipCode`) VALUES
(1111, 'UA Movie Theatre', 115, 'AL', 'Tuscaloosa', 'University Blvd.', 35401),
(2222, 'Roll Tide Theatre', 5566, 'AL', 'Tuscaloosa', 'Hargrove', 35401),
(3333, 'Bama Thetare', 1445, 'AL', 'Tuscaloosa', 'McFarland', 35401),
(4444, 'Go Bama Go theatre', 32, 'AL', 'Northport', '12th', 35401),
(5555, 'This Theatre is Tua Good', 852, 'AL', 'Tuscaloosa', 'University', 35401),
(6666, 'Big Al Theatre', 745, 'AL', 'Tuscaloosa', '15th', 35401);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(50) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Username`, `Password`) VALUES
('anthony@gmail.com', 'anthony', 'anthony'),
('bailey@gmail.com', 'bailey', 'bailey'),
('cesaer@gmail.com', 'cesaer', 'cesaer'),
('chas@gmail.com', 'chas', 'chas'),
('claire@gmail.com', 'claire', 'claire'),
('colin@gmail.com', 'colin', 'colin'),
('cto@gmail.com', 'cto', 'cto'),
('dori@gmail.com', 'dori', 'dori'),
('francis@gmail.com', 'francis', 'francis'),
('frankie@gmail.com', 'frankie', 'frankie'),
('gracie@gmail.com', 'gracie', 'gracie'),
('henry@gmail.com', 'henry', 'henry'),
('jack@gmail.com', 'jack', 'jack'),
('javy@gmail.com', 'javy', 'javy'),
('jesse@gmail.com', 'jesse', 'jesse'),
('jim@gmail.com', 'jim', 'jim'),
('kelly@gmail.com', 'kelly', 'kelly'),
('kris@gmail.com', 'kris', 'kris'),
('mike@gmail.com', 'mike', 'mike'),
('minrui@gmail.com', 'minrui', 'minrui'),
('mozzie@gmail.com', 'mozzie', 'mozzie'),
('neil@gmail.com', 'neil', 'neil'),
('nick@gmail.com', 'nick', 'nick'),
('pepper@gmail.com', 'pepper', 'pepper'),
('peter@gmail.com', 'peter', 'peter'),
('petey@gmail.com', 'petey', 'petey'),
('president@gmail.com', 'president', 'president'),
('shane@gmail.com', 'shane', 'shane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`Title`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `MovieTitle` (`MovieTitle`),
  ADD KEY `CardNo` (`CardNo`),
  ADD KEY `TheatreID` (`TheatreID`),
  ADD KEY `Cemail` (`Cemail`) USING BTREE;

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`CardNo`),
  ADD KEY `paymentinfo_ibfk_1` (`Cemail`);

--
-- Indexes for table `playsat`
--
ALTER TABLE `playsat`
  ADD KEY `MovieTitle` (`MovieTitle`),
  ADD KEY `TheatreID` (`TheatreID`);

--
-- Indexes for table `prefers`
--
ALTER TABLE `prefers`
  ADD KEY `Username` (`Username`),
  ADD KEY `TheatreID` (`TheatreID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD UNIQUE KEY `ReviewID` (`ReviewID`),
  ADD KEY `Cemail` (`Cemail`),
  ADD KEY `MovieTitle` (`MovieTitle`);

--
-- Indexes for table `systeminfo`
--
ALTER TABLE `systeminfo`
  ADD PRIMARY KEY (`CancellationFee`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`TheatreID`),
  ADD UNIQUE KEY `Street` (`Street`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`,`Email`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2238;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`Cemail`) REFERENCES `user` (`Email`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_ibfk_4` FOREIGN KEY (`TheatreID`) REFERENCES `theatre` (`TheatreID`) ON DELETE NO ACTION;

--
-- Constraints for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD CONSTRAINT `paymentinfo_ibfk_1` FOREIGN KEY (`Cemail`) REFERENCES `user` (`Email`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `playsat`
--
ALTER TABLE `playsat`
  ADD CONSTRAINT `playsat_ibfk_1` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`),
  ADD CONSTRAINT `playsat_ibfk_2` FOREIGN KEY (`TheatreID`) REFERENCES `theatre` (`TheatreID`);

--
-- Constraints for table `prefers`
--
ALTER TABLE `prefers`
  ADD CONSTRAINT `prefers_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`),
  ADD CONSTRAINT `prefers_ibfk_2` FOREIGN KEY (`TheatreID`) REFERENCES `theatre` (`TheatreID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`Cemail`) REFERENCES `user` (`Email`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`MovieTitle`) REFERENCES `movie` (`Title`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
