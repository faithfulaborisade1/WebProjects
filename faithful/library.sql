-- WebDev3 PC Exam 2023

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



--
-- Database: `library`
--

-- --------------------------------------------------------
CREATE database library;
USE library;
--
-- Table structure for table `booktable`
--

CREATE TABLE IF NOT EXISTS `booktable` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `format` varchar(20) NOT NULL,
  `publication_date` varchar(30) NOT NULL,
  `publisher` varchar(30) NOT NULL,
  `publisher_url` varchar(30) NOT NULL,
  `image` varchar(25) NOT NULL,
  `review` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktable`
--

INSERT INTO `booktable` (`id`, `title`, `author`, `format`, `publication_date`, `publisher`, `publisher_url`, `image`, `review`) VALUES
(1, 'The Pot of Gold', 'Plautus', 'Paperback', '1965-09-30', 'Penguin Classics', 'www.penguinclassics.com', 'potofgold', 'The grandfather of Euclio, an Athenian miser, entrusted a pot of gold to his household deity after burying the pot in the hearth.'),
(2, 'Importance of being Earnest', 'Oscar Wilde', 'Paperback', '2008-04-17', 'Oxford Paperbacks', 'www.oup.com', 'earnest', 'First performed on 14 February 1895 at St. James''''s Theatre in London, it is a farcical comedy.'),
(3, 'The Way of the World', 'William Congreve', 'Paperback', '2006-08-29', 'Penguin Classics', 'www.penguinclassics.com', 'wayofworld', '''A Story of Truth and Hope in an Age of Extremism is a 2008 non-fiction book by Ron Suskind'),
(4, 'Othello', 'William Shakespeare', 'Paperback', '2005-04-07', 'Penguin Classics', 'www.penguinclassics.com', 'othello', 'Othello begins on a street in Venice, in the midst of an argument between Roderigo, a rich man, and Iago');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booktable`
--
ALTER TABLE `booktable`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
