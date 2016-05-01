
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `martialAtsStudent` (
  `id` int(11) NOT NULL, -- Used to identify with other class attributes
  `namePerson` text NOT NULL, -- name of Person attending class
  `category` text NOT NULL, --
  `attendance` float NOT NULL,
  `voteAverage` int(11) NOT NULL,
  `numVotes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `martialAtsClass` (

  `id` int(11) NOT NULL, -- 1
  `className` text NOT NULL, -- 2
  `category` text NOT NULL, -- 3
  `attendance` float NOT NULL, --  4
  `totalClasses` float NOT NULL, -- 5
  `timeOfEntry` CURRENT_DATE NOT NULL, -- 6
  `currentClassProgress` int(11) NOT NULL, -- 7

) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `syllabusOfTechniques` (

  `id` int(11) NOT NULL, -- 1
  `techniqueCategory` text NOT NULL, -- 2
  `techniqueGrade` float NOT NULL, -- 3
  `techniqueOne` text NOT NULL, -- 4
  `techniqueTwo` text NOT NULL, -- 5
  `techniqueThree` text NOT NULL, -- 6

) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


--
-- Dumping data for table `dvds`
--

INSERT INTO `martialArtsStudent` (`id`, `namePerson`, `category`, `attendance`, `voteAverage`, `numVotes`) VALUES

(1, 'John', 'Taekwondo', 10, 5, 1),
(2, 'Paul', 'Karate', 5.99, 90, 77),
(3, 'Amy', 'Kung Fu', 10, 50, 5),
(4, 'Alex', 'Karate', 4.99, 0, 0),
(5, 'Thomas', 'Taekwondo', 19.99, 95, 201);

INSERT INTO `martialArtsClass`(`id`, `className`, `category`, `attendance`,`totalClasses`, `timeOfEntry`, `timeOfEntry`,`currentClassProgress`) VALUES

(1, 'Taekwondo', 'blueBelt', 4.0, 7.0, TIMESTAMP, 'C'),
(2, 'Karate', 'whiteBelt', 3.0, 7.0, TIMESTAMP, 'D'),
(3, 'Kung Fu', 'brownBlackBelt', 7.0, 7.0, TIMESTAMP, 'A'),
(4, 'Karate', 'whiteBelt',6.0, 7.0, TIMESTAMP, 'B'),
(5, 'Taekwondo', 'blackBelt',7.0, 7.0, TIMESTAMP, 'A');

INSERT INTO `syllabusOfTechniques` (`id`, `techniqueCategory`
, `techniqueGrade`, `techniqueOne`,
`techniqueTwo`, `techniqueThree`) VALUES

(1, 'Taekwondo', 'blueBelt', '', '', ''),
(2, 'Karate', 'whiteBelt', '', '', ''),
(3, 'Kung Fu', 'brownBlackBelt',  '', '', ''),
(4, 'Karate', 'whiteBelt', '', '', ''),
(5, 'Taekwondo', 'blackBelt', '', '', '');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `dvds`
--
ALTER TABLE `martialAtsStudent`
ALTER TABLE `martialAtsClass`
ALTER TABLE `syllabusOfTechniques`

ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dvds`
--
ALTER TABLE `syllabusOfTechniques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
