-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 02:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evivlio`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_first_name`, `author_last_name`) VALUES
(1, 'JRR', 'Tolkien'),
(2, 'JK', 'Rowling'),
(3, 'Stacey ', 'Abrams'),
(4, 'John', ' Brooks '),
(5, 'Benjamin', ' Graham'),
(6, 'Clayton ', 'M Christensen'),
(7, 'Angela ', 'Duckworth'),
(8, 'Kim', 'Scott'),
(9, 'Daniel ', 'Goleman'),
(10, 'Jennifer ', 'Gaither'),
(11, 'Rachael', 'Urrutia Chu'),
(12, 'Kate', 'Jeffery '),
(13, 'Marilee', ' Joy Mayfield'),
(14, 'Tanya', 'Maneki'),
(15, 'Marilee ', 'Joy Mayfield'),
(16, ' Tracy ', 'La Rue Hohn'),
(17, 'Vince', 'Cleghorne '),
(18, 'Elizabeth', ' Cole '),
(19, 'Steve ', 'Herman '),
(20, 'Louis ', 'Menand'),
(21, 'Zachary ', 'Karabell'),
(22, 'Nathan', ' Gorenstein'),
(23, 'Linda', ' Osceola Naranjo'),
(24, 'Stacey ', 'Lee'),
(25, 'Susan ', 'Wise Bauer'),
(26, 'Barbara ', 'O\'Neal '),
(27, 'Lisa ', 'Wingate'),
(28, 'Dean', ' Koontz'),
(29, 'Gayle ', 'Forman '),
(30, 'Jane', ' Austen'),
(31, 'Janet', ' Chapman'),
(32, 'Susan ', 'Mallery '),
(33, ' Nigel ', 'Warburton '),
(34, ' Aristotle ', 'A'),
(35, 'Plato', 'A'),
(36, ' Phillip ', 'Campbell '),
(37, 'Epictetus', 'A'),
(38, 'Marcus ', 'Aurelius'),
(39, 'Orson ', 'Scott Card'),
(40, 'John', ' Wyndham'),
(41, ' Jeff ', 'Vandermeer '),
(42, ' Ann ', 'Vandermeer '),
(43, 'Alfred ', 'Bester'),
(44, 'John', 'Wyndham '),
(45, ' C.L. ', 'Moore '),
(46, ' Patrick ', 'Todoroff'),
(47, ' Dante ', 'Alighieri'),
(48, ' Adam', ' Smith'),
(49, 'Karl ', 'Marx '),
(50, 'Edward ', 'Brooke-hitching'),
(51, 'Maureen ', 'Moran'),
(52, 'D', 'K'),
(53, 'Kathy ', 'Ceceri '),
(54, 'Geoffrey', ' Campbell-Platt'),
(55, 'James  ', 'E. McClellan '),
(56, 'Harold', ' Dorn '),
(57, 'Sandra ', 'Harding'),
(58, '  Wenda', ' K. Bauchspies '),
(59, ' Jennifer', ' Croissant '),
(60, ' Sal ', 'Restivo ');

-- --------------------------------------------------------

--
-- Table structure for table `author_tag`
--

CREATE TABLE `author_tag` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_tag`
--

INSERT INTO `author_tag` (`book_id`, `author_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 3),
(5, 4),
(6, 5),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(12, 12),
(13, 13),
(13, 14),
(14, 15),
(14, 16),
(15, 17),
(16, 18),
(17, 19),
(18, 20),
(19, 21),
(20, 22),
(21, 23),
(22, 24),
(23, 25),
(24, 26),
(25, 27),
(26, 28),
(27, 29),
(28, 30),
(29, 31),
(30, 32),
(31, 33),
(32, 34),
(33, 35),
(34, 36),
(35, 37),
(36, 38),
(37, 39),
(38, 40),
(39, 41),
(39, 42),
(40, 43),
(41, 44),
(42, 45),
(43, 46),
(44, 10),
(45, 47),
(46, 48),
(47, 49),
(48, 50),
(49, 51),
(50, 52),
(51, 53),
(52, 54),
(53, 55),
(53, 56),
(54, 57),
(55, 58),
(55, 59),
(55, 60);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_cover` varchar(200) NOT NULL,
  `publishing_year` int(4) NOT NULL,
  `pages` int(11) NOT NULL,
  `summary` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `publisher_id`, `isbn`, `book_title`, `book_cover`, `publishing_year`, `pages`, `summary`, `price`, `stock`) VALUES
(1, 1, '9780261102217', 'The Hobbit', '9780261102217.jpg', 1991, 400, 'The Hobbit is a tale of high adventure, undertaken by a company of dwarves in search of dragon-guarded gold. A reluctant partner in this perilous quest is Bilbo Baggins, a comfort-loving unambitious hobbit, who surprises even himself by his resourcefulness and skill as a burglar. Encounters with trolls, goblins, dwarves, elves and giant spiders, conversations with the dragon, Smaug, and a rather unwilling presence at the Battle of Five Armies are just some of the adventures that befall Bilbo. Bilbo Baggins has taken his place among the ranks of the immortals of children\'s fiction. Written by Professor Tolkien for his own children, The Hobbit met with instant critical acclaim when published.\r\n', 11.04, 10),
(2, 4, '978-1408855652', 'Harry Potter and the Philosopher\'s Stone', '978-1408855652.jpg', 2014, 256, 'Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter \'H\'.\r\n\r\nHarry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!', 29.4, 10),
(3, 4, '9781408855706', 'Harry Potter and the Half-Blood Prince', '9781408855706.jpg', 2014, 560, 'When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe. Harry is convinced that Malfoy bears the Dark Mark: there is a Death Eater amongst them. Harry will need powerful magic and true friends as he explores Voldemort\'s darkest secrets, and Dumbledore prepares him to face his destiny.\r\n\r\nThese new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It\'s time to PASS THE MAGIC ON ...', 10.29, 10),
(4, 3, '1250214807', 'Lead from the Outside: How to Build Your Future and Make Real Change', '1250214807.jpg', 2019, 256, 'Leadership is hard. Convincing others--and often yourself--that you possess the answers and are capable of world-affecting change requires confidence, insight, and sheer bravado. Lead from the Outside is the handbook for outsiders, written with the awareness of the experiences and challenges that hinder anyone who exists beyond the structure of traditional white male power--women, people of color, members of the LGBTQ community, and millennials ready to make a difference.\r\n\r\nIn Lead from the Outside, Stacey Abrams argues that knowing your own passion is the key to success, regardless of the scale or target. From launching a company, to starting a day care center for homeless teen moms, to running a successful political campaign, finding what you want to fight for is as critical as knowing how to turn thought into action. Stacey uses her experience and hard-won insights to break down how ambition, fear, money, and failure function in leadership, while offering personal stories that illuminate practical strategies.\r\n\r\nStacey includes exercises to help you hone your skills and realize your aspirations. She discusses candidly what she has learned over the course of her impressive career: that differences in race, gender, and class are surmountable. With direction and dedication, being in the minority actually provides unique and vital strength, which we can employ to rise to the top and make real change.', 12.06, 10),
(5, 4, '1497644895', 'Business Adventures: Twelve Classic Tales from the World of Wall Street', '1497644895.jpg', 2014, 464, 'What do the $350 million Ford Motor Company disaster known as the Edsel, the fast and incredible rise of Xerox, and the unbelievable scandals at General Electric and Texas Gulf Sulphur have in common? Each is an example of how an iconic company was defined by a particular moment of fame or notoriety; these notable and fascinating accounts are as relevant today to understanding the intricacies of corporate life as they were when the events happened.\r\nStories about Wall Street are infused with drama and adventure and reveal the machinations and volatile nature of the world of finance. Longtime New Yorker contributor John Brooks’s insightful reportage is so full of personality and critical detail that whether he is looking at the astounding market crash of 1962, the collapse of a well-known brokerage firm, or the bold attempt by American bankers to save the British pound, one gets the sense that history repeats itself.\r\nFive additional stories on equally fascinating subjects round out this wonderful collection that will both entertain and inform readers . . . Business Adventures is truly financial journalism at its liveliest and best.', 14.25, 21),
(6, 5, '9780060555', 'Intelligent Investor: The Definitive Book on Value Investing - A Book of Practical Counsel', '9780060555.jpg', 2003, 640, 'The greatest investment advisor of the twentieth century, Benjamin Graham taught and inspired people worldwide. Graham\'s philosophy of “value investing”—which shields investors from substantial error and teaches them to develop long-term strategies—has made The Intelligent Investor the stock market bible ever since its original publication in 1949.\r\nOver the years, market developments have proven the wisdom of Graham’s strategies. While preserving the integrity of Graham’s original text, this revised edition includes updated commentary by noted financial journalist Jason Zweig, whose perspective incorporates the realities of today’s market, draws parallels between Graham’s examples and today’s financial headlines, and gives readers a more thorough understanding of how to apply Graham’s principles.\r\nVital and indispensable, The Intelligent Investor is the most important book you will ever read on how to reach your financial goals.', 14.23, 8),
(7, 6, '1633691780', 'The Innovator\'s Dilemma: When New Technologies Cause Great Firms to Fail (Management of Innovation a', '1633691780.jpg', 2016, 288, 'A Wall Street Journal and Businessweek bestseller. Named by Fast Company as one of the most influential leadership books in its Leadership Hall of Fame. An innovation classic. From Steve Jobs to Jeff Bezos, Clay Christensen’s work continues to underpin today’s most innovative leaders and organizations.\r\nThe bestselling classic on disruptive innovation, by renowned author Clayton M. Christensen.\r\nHis work is cited by the world’s best-known thought leaders, from Steve Jobs to Malcolm Gladwell. In this classic bestseller—one of the most influential business books of all time—innovation expert Clayton Christensen shows how even the most outstanding companies can do everything right—yet still lose market leadership.\r\nChristensen explains why most companies miss out on new waves of innovation. No matter the industry, he says, a successful company with established products will get pushed aside unless managers know how and when to abandon traditional business practices.\r\n\r\nOffering both successes and failures from leading companies as a guide, The Innovator’s Dilemma gives you a set of rules for capitalizing on the phenomenon of disruptive innovation.\r\n\r\nSharp, cogent, and provocative—and consistently noted as one of the most valuable business ideas of all time—The Innovator’s Dilemma is the book no manager, leader, or entrepreneur should be without.', 15.99, 17),
(8, 7, '1501111108', 'Grit: The Power of Passion and Perseverance ', '1501111108.jpg', 2016, 352, 'In this instant New York Times bestseller, pioneering psychologist Angela Duckworth shows anyone striving to succeed--be it parents, students, educators, athletes, or business people--that the secret to outstanding achievement is not talent but a special blend of passion and persistence she calls \"grit.\"\r\n\r\nDrawing on her own powerful story as the daughter of a scientist who frequently noted her lack of \"genius,\" Duckworth, now a celebrated researcher and professor, describes her early eye-opening stints in teaching, business consulting, and neuroscience, which led to the hypothesis that what really drives success is not \"genius\" but a unique combination of passion and long-term perseverance.\r\n\r\nIn Grit, she takes readers into the field to visit cadets struggling through their first days at West Point, teachers working in some of the toughest schools, and young finalists in the National Spelling Bee. She also mines fascinating insights from history and shows what can be gleaned from modern experiments in peak performance. Finally, she shares what she\'s learned from interviewing dozens of high achievers--from JP Morgan CEO Jamie Dimon to New Yorker cartoon editor Bob Mankoff to Seattle Seahawks Coach Pete Carroll.\r\nAmong Grit\'s most valuable insights:\r\n*Why any effort you make ultimately counts twice toward your goal\r\n*How grit can be learned, regardless of I.Q. or circumstances\r\n*How lifelong interest is triggered\r\n*How much of optimal practice is suffering and how much ecstasy\r\n*Which is better for your child--a warm embrace or high standards\r\n*The magic of the Hard Thing Rule\r\n\r\nWinningly personal, insightful, and even life-changing, Grit is a book about what goes through your head when you fall down, and how that--not talent or luck--makes all the difference.', 14.95, 10),
(9, 8, '1250235375', 'Radical Candor: Be a Kick-Ass Boss Without Losing Your Humanity ', '1250235375.jpg', 2019, 336, 'The idea is simple: You don\'t have to choose between being a pushover and a jerk. Using Radical Candor--avoiding the perils of Obnoxious Aggression, Manipulative Insincerity, and Ruinous Empathy--you can be kind and clear at the same time.\r\nKim Scott was a highly successful leader at Google before decamping to Apple, where she developed and taught a management class. Since the original publication of Radical Candor in 2017, Scott has earned international fame with her vital approach to effective leadership and co-founded the Radical Candor executive education company, which helps companies put the book\'s philosophy into practice.\r\nRadical Candor is about caring personally and challenging directly, about soliciting criticism to improve your leadership and also providing guidance that helps others grow. It focuses on praise but doesn\'t shy away from criticism--to help you love your work and the people you work with.\r\nRadically Candid relationships with team members enable bosses to fulfill their three core responsibilities:\r\n1. Create a culture of Compassionate Candor\r\n2. Build a cohesive team\r\n3. Achieve results collaboratively\r\nRequired reading for the most successful organizations, Radical Candor has raised the bar for management practices worldwide.', 13.79, 18),
(10, 9, '9780553383713', '\"Emotional Intelligence: Why It Can Matter More Than IQ\" by Daniel Goleman', '9780553383713.jpg', 2005, 352, 'Everyone knows that high IQ is no guarantee of success, happiness, or virtue, but until Emotional Intelligence, we could only guess why. Daniel Goleman\'s brilliant report from the frontiers of psychology and neuroscience offers startling new insight into our “two minds”—the rational and the emotional—and how they together shape our destiny.\r\n\r\nDrawing on groundbreaking brain and behavioral research, Goleman shows the factors at work when people of high IQ flounder and those of modest IQ do surprisingly well. These factors, which include self-awareness, self-discipline, and empathy, add up to a different way of being smart—and they aren’t fixed at birth. Although shaped by childhood experiences, emotional intelligence can be nurtured and strengthened throughout our adulthood—with immediate benefits to our health, our relationships, and our work. \r\n \r\nThe twenty-fifth-anniversary edition of Emotional Intelligence could not come at a better time—we spend so much of our time online, more and more jobs are becoming automated and digitized, and our children are picking up new technology faster than we ever imagined. With a new introduction from the author, the twenty-fifth-anniversary edition prepares readers, now more than ever, to reach their fullest potential and stand out from the pack with the help of EI.', 12, 22),
(11, 10, '1409341267', 'The Business Book : Big Ideas Simply Explained', '1409341267.jpg', 2015, 352, 'You can achieve your business dream. Beat the odds as you learn from the best - including Henry Ford, Steve Jobs, and Bill Gates - and turn your idea into an amazing and profitable enterprise.\r\n\r\nThe Business Book helps you over the hurdles facing every new business, such as finding a gap in the market, securing finance, employing people, and creating an eye-catching brand. It is a plain-speaking visual guide to 80 of the most important commerce theories including chaos theory, critical path analysis, market mapping, and the MABA matrix.\r\n\r\nIts graphics and flow diagrams demystify complicated concepts and explain the ideas of seminal business thinkers, such as Malcolm Gladwell\'s \"tipping point\", Michael Porter\'s \"five forces\", and Meredith Belbin\'s theories on effective teamwork. It shows that you can succeed with stories of rags-to-riches entrepreneurs, including the founders of Hewlett-Packard, who began their global enterprise from their garage.\r\n\r\nWhether you are a student, a CEO, or a would-be entrepreneur, The Business Book will inspire you and put you on the inside track to making your goal a reality.', 18.45, 17),
(12, 11, '1949474496', 'Fiona Flamingo', '1949474496.jpg', 2019, 56, 'Follow Fiona through her color-changing, feather-filled day as she learns to accept not only being a different color from the rest of her flamingo flock, but also that it\'s okay to be scared, angry, and sad at times. ', 14.95, 10),
(13, 10, '1949474852', 'A Friend is Someone Who... ', '1949474852.jpg', 2020, 50, 'Do you remember your first friend? Your friends always find a way to double your joys and halve your sorrows. This fun, rhyming book helps children understand the value of having friends and of being a friend to others.', 14.95, 17),
(14, 12, '1949474755', 'A Mother\'s Love', '1949474755.jpg', 2020, 48, 'This beautiful book is made to help every child understand how many things mothers actually do to help their kids feel loved, happy, and safe... The special bond a mother shares with her children is one of the most powerful forces of nature. The unconditional love from the ever-watchful eye of a mother is something to always be cherished.\r\nFrom the author of The Snowman\'s Song, The Lights in the Church, Growing Up Sisters, and The Super Tiny Ghost, Marilee Joy Mayfield\'s new children\'s book has quickly become one of our best sellers.', 14.39, 28),
(15, 10, '1949474968', 'Mich & Moose: Sticky Business', '1949474968.jpg', 2021, 48, 'Book 6 brings us even more Zen Pig wisdom as he helps his niece understand, accept, and welcome her feelings. In times of uncertainty or overwhelming emotions, this book offers a simple, and easy to understand tool to give your children clarity.', 14.95, 12),
(16, 13, '9798723622579', 'I Am Stronger Than Anxiety', '9798723622579.jpg', 2021, 30, 'All children worry from time to time and it is a normal part of growing up. But, when anxiety becomes overwhelming, it can greatly affect kids’ behavior. It may lead to a feeling of stress, exhaustion, isolation and many others. It is very important to be aware of these emotions and to know how to deal with them in a healthy way.\r\nThis activity book captures children\'s attention, provides kid-friendly entry points into understanding the essence of the feeling of anxiety, and is a perfect tool for educating them about how to overcome worries, fear and phobias.\r\nThis cute book about Little Nick:\r\ncontains lovely illustrations and a lightly rhyming storyline.\r\nhelps children recognize and manage their anxiety by interacting with animals in a funny way.\r\nprovides tips and techniques on what to do when your children feel worried, nervous, anxious or scared.\r\ndelivers important messages aimed at improving kids’ self-regulation skills.\r\nteaches children to understand their emotions and feelings and to improve their emotional intelligence.\r\nincludes a bonus activity game.\r\nThis storybook is a continuation of Nick’s adventures from the World of Kids Emotions books’ series. The first book of the series became an Amazon Bestseller.', 11.66, 42),
(17, 14, '1948040689', 'Help Your Dragon Deal With Anxiety', '1948040689.jpg', 2018, 46, 'Having a pet dragon is very fun!\r\n\r\nHe can sit, roll over, and play…\r\n\r\nHe can candle a birthday cake, lit a campfire, or so many other cool things…\r\n\r\nBut what if your dragon is constantly worrying about so many things?\r\n\r\nWhat if he’s worried about his math test even though he has studied very hard?\r\n\r\nWhat if he’s so nervous about his upcoming book report in front of the class?\r\n\r\nWhat if he gets so anxious when he has to go get a shot from the doctor office? So anxious that he has a meltdown?\r\n\r\nWhat if your dragon is always asking about “What If”?\r\n\r\nWhat should you do?\r\n\r\nYou teach him how to deal with his anxiety!\r\n\r\nHow?\r\n\r\nGet this book and learn how!', 12.69, 12),
(18, 15, '0374158452', 'The Free World: Art and Thought in the Cold War', '0374158452.jpg', 2021, 880, 'The Cold War was not just a contest of power. It was also about ideas, in the broadest sense―economic and political, artistic and personal. In The Free World, the acclaimed Pulitzer Prize–winning scholar and critic Louis Menand tells the story of American culture in the pivotal years from the end of World War II to Vietnam and shows how changing economic, technological, and social forces put their mark on creations of the mind.\r\n\r\nHow did elitism and an anti-totalitarian skepticism of passion and ideology give way to a new sensibility defined by freewheeling experimentation and loving the Beatles? How was the ideal of “freedom” applied to causes that ranged from anti-communism and civil rights to radical acts of self-creation via art and even crime? With the wit and insight familiar to readers of The Metaphysical Club and his New Yorker essays, Menand takes us inside Hannah Arendt’s Manhattan, the Paris of Jean-Paul Sartre and Simone de Beauvoir, Merce Cunningham and John Cage’s residencies at North Carolina’s Black Mountain College, and the Memphis studio where Sam Phillips and Elvis Presley created a new music for the American teenager. He examines the post war vogue for French existentialism, structuralism and post-structuralism, the rise of abstract expressionism and pop art, Allen Ginsberg’s friendship with Lionel Trilling, James Baldwin’s transformation into a Civil Right spokesman, Susan Sontag’s challenges to the New York Intellectuals, the defeat of obscenity laws, and the rise of the New Hollywood.\r\n\r\nStressing the rich flow of ideas across the Atlantic, he also shows how Europeans played a vital role in promoting and influencing American art and entertainment. By the end of the Vietnam era, the American government had lost the moral prestige it enjoyed at the end of the Second World War, but America’s once-despised culture had become respected and adored. With unprecedented verve and range, this book explains how that happened.', 27.49, 7),
(19, 16, '1594206619', 'Inside Money: Brown Brothers Harriman and the American Way of Power ', '1594206619.jpg', 2021, 448, 'A sweeping history of the legendary private investment firm Brown Brothers Harriman, exploring its central role in the story of American wealth and its rise to global power\r\n\r\nConspiracy theories have always swirled around Brown Brothers Harriman, and not without reason. Throughout the nineteenth century, when America was convulsed by a devastating financial panic essentially every twenty years, Brown Brothers quietly went from strength to strength, propping up the U.S. financial system at crucial moments and catalyzing successive booms, from the cotton trade and the steamship to the railroad, while largely managing to avoid the unwelcome attention that plagued some of its competitors. By the turn of the twentieth century, Brown Brothers was unquestionably at the heart of what was meant by an American Establishment. As America\'s reach extended beyond its shores, Brown Brothers worked hand in glove with the State Department, notably in Nicaragua in the early twentieth century, where the firm essentially took over the country\'s economy. To the Brown family, the virtue of their dealings was a given; their form of muscular Protestantism, forged on the playing fields of Groton and Yale, was the acme of civilization, and it was their duty to import that civilization to the world. When, during the Great Depression, Brown Brothers ensured their strength by merging with Averell Harriman\'s investment bank to form Brown Brothers Harriman, the die was cast for the role the firm would play on the global stage during World War II and thereafter, as its partners served at the highest levels of government to shape the international system that defines the world to this day.\r\nIn Inside Money, acclaimed historian, commentator, and former financial executive Zachary Karabell offers the first full and frank look inside this institution against the backdrop of American history. Blessed with complete access to the company\'s archives, as well as a thrilling understanding of the larger forces at play, Karabell has created an X-ray of American power--financial, political, cultural--as it has evolved from the early 1800s to the present. Today, unlike many of its competitors, Brown Brothers Harriman remains a private partnership and a beacon of sustainable capitalism, having forgone the heady speculative upsides of the past thirty years but also having avoided any role in the devastating downsides. The firm is no longer in the command capsule of the American economy, but, arguably, that is to its credit. If its partners cleaved to any one adage over the generations, it is that a relentless pursuit of more can destroy more than it creates.', 25.91, 10),
(20, 17, '1982129212', 'The Guns of John Moses Browning: The Remarkable Story of the Inventor Whose Firearms Changed the Wor', '1982129212.jpg', 2021, 336, 'Few people are aware that John Moses Browning--a tall, modest man born in 1855 and raised as a Mormon in the American West-- invented the mechanism used in virtually all modern pistols, created the most popular hunting rifles and shotguns, and conceived the machine guns introduced in World War I and which dominated air and land battles in World War II. Yet few in America knew his name until he was into his sixties.\r\n\r\nNow, author Nathan Gorenstein brings firearms inventor John Moses Browning to vivid life in this riveting and revealing biography. Embodying the tradition of self-made, self-educated geniuses (like Lincoln and Edison), Browning was able to think in three dimensions (he never used blueprints) and his gifted mind produced everything from the famous Winchester \"30-30\" hunting rifle to the awesomely effective machine guns used by every American aircraft and infantry unit in World War II. The British credited Browning\'s guns with helping to win the Battle of Britain.\r\n\r\nHis inventions illustrate both the good and bad of weapons.\r\n\r\nSweeping, lively, and brilliantly told, this fascinating book introduces a little-known American legend whose impact on history ranks with that of the Wright Brothers, Thomas Edison, and Henry Ford.', 24.99, 6),
(21, 18, '9798706448363', 'The Native American Herbalist’s Bible', '9798706448363.jpg', 2021, 266, 'Would you like to find a way into the lost world and forgotten art of Native American herbalism without getting caught in misinformation and sensationalistic claims?\r\n\r\nAre you looking for a modern guide on traditional Native American herbal medicine to stock your medicine cabinet full of all-natural, low-cost herbal preparations?\r\n\r\nThe knowledge of Native American tribes on herbs and herbal remedies is unmatched but not easily accessible since it has been passed on orally from one generation to another. But don’t give up!\r\n\r\nI am proud to present The Native American Herbalist’s Bible: an in-depth, all-encompassing 3 books in 1 bundle that has recorded our rich heritage of herbal craftmanship and tradition.\r\n\r\nMore exhaustive than any other guide on the market, thoroughly researched, and written with ease of use in mind, this book will accompany you from harvesting to administering low-cost, DIY remedies, from planting tips to the creation of your very own natural medicine cabinet, from traditional methods to modern uses, for beginners and expert herbalists alike.', 28.77, 2),
(22, 19, '1524740985', 'Luck of the Titanic', '1524740985.jpg', 2021, 384, 'Valora Luck has two things: a ticket for the biggest and most luxurious ocean liner in the world, and a dream of leaving England behind and making a life for herself as a circus performer in New York. Much to her surprise though, she\'s turned away at the gangway; apparently, Chinese aren\'t allowed into America.\r\n\r\nBut Val has to get on that ship. Her twin brother Jamie, who has spent two long years at sea, is there, as is an influential circus owner, whom Val hopes to audition for. Thankfully, there\'s not much a trained acrobat like Val can\'t overcome when she puts her mind to it.\r\n\r\nAs a stowaway, Val should keep her head down and stay out of sight. But the clock is ticking and she has just seven days as the ship makes its way across the Atlantic to find Jamie, perform for the circus owner, and convince him to help get them both into America.\r\n\r\nThen one night the unthinkable happens, and suddenly Val\'s dreams of a new life are crushed under the weight of the only thing that matters: survival.', 13.29, 18),
(23, 20, '039305974X', 'The History of the Ancient World: From the Earliest Accounts to the Fall of Rome ', '039305974X.jpg', 2007, 896, 'This is the first volume in a bold new series that tells the stories of all peoples, connecting historical events from Europe to the Middle East to the far coast of China, while still giving weight to the characteristics of each country. Susan Wise Bauer provides both sweeping scope and vivid attention to the individual lives that give flesh to abstract assertions about human history.', 18.94, 25),
(24, 21, '4523653251', 'When We Believed in Mermaids', '4523653251.jpg', 2019, 348, 'From the author of The Art of Inheriting Secrets comes an emotional new tale of two sisters, an ocean of lies, and a search for the truth.\r\n\r\nHer sister has been dead for fifteen years when she sees her on the TV news…\r\n\r\nJosie Bianci was killed years ago on a train during a terrorist attack. Gone forever. It’s what her sister, Kit, an ER doctor in Santa Cruz, has always believed. Yet all it takes is a few heart-wrenching seconds to upend Kit’s world. Live coverage of a club fire in Auckland has captured the image of a woman stumbling through the smoke and debris. Her resemblance to Josie is unbelievable. And unmistakable. With it comes a flood of emotions—grief, loss, and anger—that Kit finally has a chance to put to rest: by finding the sister who’s been living a lie.\r\n\r\nAfter arriving in New Zealand, Kit begins her journey with the memories of the past: of days spent on the beach with Josie. Of a lost teenage boy who’d become part of their family. And of a trauma that has haunted Kit and Josie their entire lives.\r\n\r\nNow, if two sisters are to reunite, it can only be by unearthing long-buried secrets and facing a devastating truth that has kept them apart far too long. To regain their relationship, they may have to lose everything.', 6.19, 2),
(25, 22, '9780425284681', 'Before We Were Yours', '9780425284681.jpg', 2017, 352, 'Look for Lisa Wingate’s powerful new historical novel, The Book of Lost Friends, available now!\r\n\r\nMemphis, 1939. Twelve-year-old Rill Foss and her four younger siblings live a magical life aboard their family’s Mississippi River shantyboat. But when their father must rush their mother to the hospital one stormy night, Rill is left in charge—until strangers arrive in force. Wrenched from all that is familiar and thrown into a Tennessee Children’s Home Society orphanage, the Foss children are assured that they will soon be returned to their parents—but they quickly realize the dark truth. At the mercy of the facility’s cruel director, Rill fights to keep her sisters and brother together in a world of danger and uncertainty.\r\n\r\nAiken, South Carolina, present day. Born into wealth and privilege, Avery Stafford seems to have it all: a successful career as a federal prosecutor, a handsome fiancé, and a lavish wedding on the horizon. But when Avery returns home to help her father weather a health crisis, a chance encounter leaves her with uncomfortable questions and compels her to take a journey through her family’s long-hidden history, on a path that will ultimately lead either to devastation or to redemption.\r\n\r\nBased on one of America’s most notorious real-life scandals—in which Georgia Tann, director of a Memphis-based adoption organization, kidnapped and sold poor children to wealthy families all over the country—Lisa Wingate’s riveting, wrenching, and ultimately uplifting tale reminds us how, even though the paths we take can lead to many places, the heart never forgets where we belong.', 19.58, 11),
(26, 1, '9780008291341', 'Devoted', '9780008291341.jpg', 2020, 376, 'Woody Bookman hasn’t spoken a word in his eleven years of life. Not when his father died in a freak accident. Not when his mother, Megan, tells him she loves him. For Megan, keeping her boy safe and happy is what matters. But Woody believes a monstrous evil was behind his father’s death and now threatens him and his mother. And he’s not alone in his thoughts. An ally unknown to him is listening.\r\n\r\nA uniquely gifted dog with a heart as golden as his breed, Kipp is devoted beyond reason to people. When he hears the boy who communicates like he does, without speaking, Kipp knows he needs to find him before it’s too late.\r\n\r\nWoody’s fearful suspicions are taking shape. A man driven by a malicious evil has set a depraved plan into motion. And he’s coming after Woody and his mother. The reasons are primal. His powers are growing. And he’s not alone. Only a force greater than evil can stop what’s coming next.', 13.48, 10),
(27, 23, '1616207329', 'Leave Me', '1616207329.jpg', 2017, 368, '\"This surprising, compassionate story brings to life the secret, guilty fantasy of many overworked moms.\" --People \"In an enthralling novel reminiscent of Anne Tyler\'s Ladder of Years, a woman who recently suffered a heart attack runs away to recover her equilibrium.\" --O, The Oprah Magazine Every woman who has ever fantasized about driving past her exit on the highway instead of going home to make dinner, and every woman who has ever dreamed of boarding a train to a place where no one needs constant attention--meet Maribeth Klein. A harried working mother who\'s so busy taking care of her husband and twins, she doesn\'t even realize she\'s had a heart attack. Surprised to discover that her recuperation seems to be an imposition on those who rely on her, Maribeth does the unthinkable: she packs a bag and leaves. But, as is often the case, once we get where we\'re going we see our lives from a different perspective. Far from the demands of family and career and with the help of liberating new friendships, Maribeth is able to own up to secrets she has been keeping from herself and those she loves. With bighearted characters--husbands, wives, friends, and lovers--who stumble and trip, grow and forgive, Leave Me is about facing the fears we\'re all running from. Gayle Forman is a dazzling observer of human nature. She has written an irresistible novel that confronts the ambivalence of modern motherhood head on and asks, what happens when a grown woman runs away from home?', 14.36, 5),
(28, 24, '0141330163', 'Pride and Prejudice', '0141330163.jpg', 2018, 464, 'When two rich young gentlemen move to town, they don\'t go unnoticed - especially when Mrs Bennett vows to have one of her five daughters marry into their fortunes. But love, as Jane and Elizabeth Bennett soon discover, is rarely straightforward, and often surprising. It\'s only a matter of time until their own small worlds are turned upside down and they discover that first impressions can be the most misleading of all.\r\nWith a behind-the-scenes journey, including an author profile, a guide to who\'s who, activities and more.', 17.57, 20),
(29, 25, '743486315', 'The Dangerous Protector', '743486315.jpg', 2005, 368, 'Janet Chapman returns to the breathtaking Maine coast in Seductive Impostor the second novel featuring two passionate sisters . . . and the men who have what it takes to love them. Willow Foster is committed to protecting Maine\'s precious coastline. She\'s equally committed to avoiding her one-time fling, Duncan Ross, the rugged Scotsman who\'s got her hometown believing she\'s the love of his life. But when Willow goes home to uncover the mystery behind a worrisome lobster catch, she learns that pub owner Duncan holds some mysteries of his own . . . and that taking a chance with her heart might open her life up to passion beyond her wildest dreams.', 11.38, 17),
(30, 26, '1501133853', 'Sweet Success', '1501133853.jpg', 2015, 352, 'Bestselling author Susan Mallery awakens the senses--and fills the heart with warmth and laughter--in this tantalizing novel of love\'s richest rewards. The free-spirited owner of a booming chocolate emporium in Santa Magdelana, California, Allison Thomas is out to save the world--one truffle at a time. Everyone adores Ali--who wouldn\'t love a lady who sneaks midnight chocolate deliveries to the local health spa? And even if a string of crumbled relationships have put romance on hold, Ali\'s perfectly content with her life and her high-flying career. That is, until the mysterious Matt Baker stirs up her world...New to town, Matt quickly gets under her skin and leads her into temptation. But neither love nor chocolate seems to melt Matt\'s icy heart. Now, in a unique setting where luscious desserts, sweet wine, and fresh ocean breezes intoxicate the soul, it may prove impossible for either of them to resist this seductive recipe for a wondrously indulgent passion!', 21.54, 8),
(31, 27, '9780300187793', 'A Little History of Philosophy', '9780300187793.jpg', 2012, 272, '\"A primer in human existence: philosophy has rarely seemed so lucid, so important, so worth doing and so easy to enter into. . . . A wonderful introduction for anyone who\'s ever felt curious about almost anything.\"-Sarah Bakewell, author of How To Live: A Life of Montaigne in One Question and Twenty Attempts at an Answer\r\n\r\nPhilosophy begins with questions about the nature of reality and how we should live. These were the concerns of Socrates, who spent his days in the ancient Athenian marketplace asking awkward questions, disconcerting the people he met by showing them how little they genuinely understood. This engaging book introduces the great thinkers in Western philosophy and explores their most compelling ideas about the world and how best to live in it.\r\n\r\nIn forty brief chapters, Nigel Warburton guides us on a chronological tour of the major ideas in the history of philosophy. He provides interesting and often quirky stories of the lives and deaths of thought-provoking philosophers from Socrates, who chose to die by hemlock poisoning rather than live on without the freedom to think for himself, to Peter Singer, who asks the disquieting philosophical and ethical questions that haunt our own times.\r\n\r\nWarburton not only makes philosophy accessible, he offers inspiration to think, argue, reason, and ask in the tradition of Socrates. A Little History of Philosophy presents the grand sweep of humanity\'s search for philosophical understanding and invites all to join in the discussion.', 12.54, 5),
(32, 28, '9780451531759', 'The Philosophy of Aristotle', '9780451531759.jpg', 2011, 544, 'More than two thousand years ago, Aristotle established unique standards of philosophic inquiry, observation, and judgment. This book offers a contemporary reevaluation of the philosophy of the master of Western thought, and shows his vital, continuing influence in our modern world.', 9.69, 7),
(33, 29, '9780486411217', 'The Republic', '9780486411217.jpg', 2010, 320, 'Often ranked as the greatest of Plato\'s many remarkable writings, this celebrated philosophical work of the fourth century B.C. contemplates the elements of an ideal state, serving as the forerunner for such other classics of political thought as Cicero\'s De Republica, St. Augustine\'s City of God, and Thomas More\'s Utopia.\r\nWritten in the form of a dialog in which Socrates questions his students and fellow citizens, The Republic concerns itself chiefly with the question, \"What is justice?\" as well as Plato\'s theory of ideas and his conception of the philosopher\'s role in society. To explore the latter, he invents the allegory of the cave to illustrate his notion that ordinary men are like prisoners in a cave, observing only the shadows of things, while philosophers are those who venture outside the cave and see things as they really are, and whose task it is to return to the cave and tell the truth about what they have seen. This dynamic metaphor expresses at once the eternal conflict between the world of the senses (the cave) and the world of ideas (the world outside the cave), and the philosopher\'s role as mediator between the two.\r\nHigh school and college students, as well as lovers of classical literature and philosophy, will welcome this handsome and inexpensive edition of an immortal work. It appears here in the fine translation by the English classicist Benjamin Jowett.', 6.83, 1),
(34, 30, '1505105668', 'The Story of Civilization', '1505105668.jpg', 2016, 336, 'Children should not just read about history, they should live it. In The Story of Civilization, the ancient stories that have shaped humanity come alive like never before. Author Phillip Campbell uses his historical expertise and story-telling ability together in tandem to present the content in a fresh and thrilling way. The Story of Civilization reflects a new emphasis in presenting the history of the world as a thrilling and compelling narrative. Within each chapter, children will encounter short stories that place them directly in the shoes of historical figures, both famous and ordinary, as they live through legendary battles and invasions, philosophical debates, the construction of architectural wonders, the discovery of new inventions and sciences, and the exploration of the world. Volume I, The Ancient World, begins the journey, covering the time periods from the dawn of history and the early nomads, to the conversion of Emperor Constantine. Children will learn what life was like in the ancient civilizations of Egypt, Mesopotamia, Persia, Greece, Rome, and more, as well as learn the Old Testament stories of the Israelites and the coming of Christ. The strength of the content lies not only in the storybook delivery of it, but also in the way it presents history through the faithful prism of the Church. Have you always wanted your children to learn about world history from a Catholic perspective? Here, you\'ll have the trusted resource you\'ve always wanted. Did You Know...\r\n- That young people in the Minoan culture participated in bull leaping games?\r\n- That King Xerxes of Persia once ordered his soldiers to whip the waves when the ocean became rocky beneath their boats?\r\n- That the Greek inventor, Archimedes, built a giant heat ray to protect his hometown, catching enemy ships on fire through the use of sunbeams?\r\n- That the powerful Carthaginian general, Hannibal, used elephants to march his army over the Alps on his way to attack Rome?\r\n- That Julius Caesar of Rome fell in love with the famous Cleopatra of Egypt?\r\nEmbark on the journey now to learn of all these wonders and more!', 23.86, 3),
(35, 31, '9780486433592', 'Enchiridion', '9780486433592.jpg', 2004, 64, 'Although he was born into slavery and endured a permanent physical disability, Epictetus (ca. 50-ca. 130 CE) maintained that all people are free to control their lives and live in harmony with nature. We will always be happy, he argued, if we learn to desire that things should be exactly as they are. After attaining his freedom, Epictetus spent his career teaching philosophy and advising a daily regimen of self-examination. His pupil Arrian later collected and published the master\'s lecture notes; the Enchiridion, or Manual, is a distillation of Epictetus\'s teachings and an instruction manual for a tranquil life. Full of practical advice, this work offers guidelines for those seeking contentment as well as those who have already made some progress in that direction. Translated by George Long.', 3.93, 8),
(36, 31, '9780486298238', 'Meditations', '9780486298238.jpg', 1998, 112, 'One of the world\'s most famous and influential books, Meditations, by the Roman emperor Marcus Aurelius (A.D. 121-180), incorporates the stoic precepts he used to cope with his life as a warrior and administrator of an empire. Ascending to the imperial throne in A.D. 161, Aurelius found his reign beset by natural disasters and war. In the wake of these challenges, he set down a series of private reflections, outlining a philosophy of commitment to virtue above pleasure and tranquility above happiness.\r\nReflecting the emperor\'s own noble and self-sacrificing code of conduct, this eloquent and moving work draws and enriches the tradition of Stoicism, which stressed the search for inner peace and ethical certainty in an apparently chaotic world. Serenity was to be achieved by emulating in one\'s personal conduct the underlying orderliness and lawfulness of nature. And in the face of inevitable pain, loss, and death -- the suffering at the core of life -- Aurelius counsels stoic detachment from the things that are beyond one\'s control and a focus on one\'s own will and perception.\r\nPresented here in a specially modernized version of the classic George Long translation, this updated and revised edition is easily accessible to contemporary readers. It not only provides a fascinating glimpse into the mind and personality of a highly principled Roman of the second century but also offers today\'s readers a practical and inspirational guide to the challenges of everyday life.', 13.96, 4),
(37, 32, '9781582971032', 'How to Write Science Fiction and Fantasy', '9781582971032.jpg', 2001, 144, 'Learn to write science fiction and fantasy from a master You\'ve always dreamed of writing science fiction and fantasy tales that pull readers into extraordinary new worlds and fantastic conflicts. Best-selling author Orson Scott Card shows you how it\'s done, distilling years of writing experience and publishing success into concise, no-nonsense advice. You\'ll learn how to: - utilize story elements that define the science fiction and fantasy genres\r\n- build, populate, and dramatize a credible, inviting world your readers will want to explore\r\n- develop the rules of time, space and magic that affect your world and its inhabitants\r\n- construct a compelling story by developing ideas, characters, and events that keep readers turning pages\r\n- find the markets for speculative fiction, reach them, and get published\r\n- submit queries, write cover letters, find an agent, and live the life of a writer The boundaries of your imagination are infinite. Explore them with Orson Scott Card and create fiction that casts a spell over agents, publishers, and readers from every world.', 17.23, 7),
(38, 33, '9780141033013', 'The Midwich Cuckoos', '9780141033013.jpg', 2008, 224, '\'Exciting, unsettling and technically brilliant\' - Spectator\r\nIn the sleepy English village of Midwich, a mysterious silver object appears and all the inhabitants fall unconscious. A day later the object is gone and everyone awakens unharmed - except that all the women in the village are discovered to be pregnant.\r\nThe resultant children of Midwich do not belong to their parents: all are blonde, all are golden eyed. They grow up too fast and their minds exhibit frightening abilities that give them control over others and brings them into conflict with the villagers just as a chilling realisation dawns on the world outside . . .\r\nThe Midwich Cuckoos is the classic tale of aliens in our midst, exploring how we respond when confronted by those who are innately superior to us in every conceivable way.', 8, 2),
(39, 22, '1101910097', 'The Big Book of Science Fiction', '1101910097.jpg', 2016, 1216, 'Quite possibly the greatest science fiction collection of all time--past, present, and future! What if life was neverending? What if you could change your body to adapt to an alien ecology? What if the pope were a robot? Spanning galaxies and millennia, this must-have anthology showcases classic contributions from H. G. Wells, Arthur C. Clarke, Octavia E. Butler, and Kurt Vonnegut, alongside a century of the eccentrics, rebels, and visionaries who have inspired generations of readers. Within its pages, you\'ll find beloved worlds of space opera, hard SF, cyberpunk, the New Wave, and more. Learn about the secret history of science fiction, from titans of literature who also wrote SF to less well-known authors from more than twenty-five countries, some never before translated into English. In The Big Book of Science Fiction, literary power couple Ann and Jeff VanderMeer transport readers from Mars to Mechanopolis, planet Earth to parts unknown. Immerse yourself in the genre that predicted electric cars, space tourism, and smartphones. Sit back, buckle up, and dial in the coordinates, as this stellar anthology has got worlds within worlds. Including:\r\n- Legendary tales from Isaac Asimov and Ursula K. Le Guin\r\n- An unearthed sci-fi story from W. E. B. Du Bois\r\n- The first publication of the work of cybernetic visionary David R. Bunch in twenty years\r\n- A rare and brilliant novella by Chinese international sensation Cixin Liu Plus:\r\n- Aliens!\r\n- Space battles!\r\n- Robots!\r\n- Technology gone wrong!\r\n- Technology gone right!', 33.56, 8),
(40, 34, '9780575094192', 'The Stars My Destination', '9780575094192.jpg', 2010, 256, 'That\'s the official verdict on Gully Foyle, unskilled space crewman.\r\n\r\nBut right now he is the only survivor on his drifting, wrecked spaceship, and when another space vessel - the Vorga - ignores his distress flares and sails by, Gully becomes obsessed with revenge. He endures 170 days alone in deep space before finding refuge on the Sargasso Asteroid and returning to Earth to track down the crew and owners of the Vorga. But, as he works out his murderous grudge, Gully Foyle also uncovers a secret of momentous proportions ...', 6.94, 6),
(41, 33, '9780141032993', 'The Kraken Wakes ', '9780141032993.jpg', 2008, 240, 'It started with fireballs raining down from the sky and crashing into the oceans\' deeps. Then ships began sinking mysteriously and later \'sea tanks\' emerged from the deeps to claim people . . .\r\n\r\nFor journalists Mike and Phyllis Watson, what at first appears to be a curiosity becomes a global calamity. Helpless, they watch as humanity struggles to survive now that water - one of the compounds upon which life depends - is turned against them. Finally, sea levels begin their inexorable rise . . .\r\n\r\nThe Kraken Wakes is a brilliant novel of how humankind responds to the threat of its own extinction and, ultimately, asks what we are prepared to do in order to survive.', 11.18, 15),
(42, 35, '1473222532', 'Judgment Night', '1473222532.jpg', 2019, 352, 'Released in 1952, Judgment Night collects five Moore novellas from the pages of editor John W. Campbell, Jr.\'s Astounding Science Fiction magazine:\r\n\r\n\'\'Judgment Night\'\' (first published in August and September, 1943) balances a lush rendering of a future galactic empire with a sober meditation on the nature of power and its inevitable loss;\r\n\r\n\'\'The Code\'\' (July, 1945) pays homage to the classic Faust with modern theories and Lovecraftian dread;\r\n\r\n\'\'Promised Land\'\' (February, 1950) and \'\'Heir Apparent\'\' (July, 1950) both document the grim twisting that mankind must undergo in order to spread into the solar system;\r\n\r\n\'\'Paradise Street\'\' (September, 1950) shows a futuristic take on the old western conflict between lone hunter and wilderness-taming settlers.\r\n\r\nChosen by the author herself as the best of her longer-form writing, these stories show a gifted wordsmith working at the height of her talents.', 10.43, 15);
INSERT INTO `book` (`book_id`, `publisher_id`, `isbn`, `book_title`, `book_cover`, `publishing_year`, `pages`, `summary`, `price`, `stock`) VALUES
(43, 2, '1472835697', 'Zona Alfa : Salvage and Survival in the Exclusion Zone', '1472835697.jpg', 2020, 64, 'Zona Alfa is a set of simple, fast-play skirmish rules for scavenging, exploring, and surviving in a near-future, post-apocalyptic Eastern European setting. Players take on the role of bandits, mercenaries, and military units fighting over the blasted Exclusion Zone and its abandoned artefacts. Customise your fighters with a variety of weapons and specialisms to create your ideal warband. With extended rules for campaigns, character progression, terrain, and environmental hazards, Zona Alfa contains all the tools required to engage in blistering firefights within the Exclusion Zone.', 14.89, 14),
(44, 10, '194947450X', 'I Can Yell Louder', '194947450X.jpg', 2020, 48, 'Michelle loves to yell and scream as loudly as she can. The word \"quiet\" isn\'t even in her vocabulary...until one of Michelle\'s classmates comes up with a plan to beat her at her own game.', 14.95, 19),
(45, 36, '1840221666', 'The Divine Comedy', '1840221666.jpg', 2019, 592, 'Dante Alighieri (1265-1321) is one of the most important and innovative figures of the European Middle Ages. Writing his Comedy (the epithet Divine was added by later admirers) in exile from his native Florence, he aimed to address a world gone astray both morally and politically. At the same time, he sought to push back the restrictive rules which traditionally governed writing in the Italian vernacular, to produce a radically new and all-encompassing work.\r\n\r\n\r\nThe Comedy tells of the journey of a character who is at one and the same time both Dante himself and Everyman through the three realms of the Christian afterlife: Hell, Purgatory and Heaven. He presents a vision of the afterlife which is strikingly original in its conception, with a complex architecture and a coherent structure. On this journey Dante\'s protagonist - and his reader - meet characters who are variously noble, grotesque, beguiling, fearful, ridiculous, admirable, horrific and tender, and through them he is shown the consequences of sin, repentance and virtue, as he learns to avoid Hell and, through cleansing in Purgatory, to taste the joys of Heaven.', 7.94, 7),
(46, 37, '1840226889', 'Wealth of Nations', '1840226889.jpg', 2012, 1008, 'Adam Smith (1723-1790) was one of the brightest stars of the eighteenth-century Scottish Enlightenment. An Inquiry into the Nature and Causes of the Wealth of Nations was his most important book. First published in London in March 1776, it had been eagerly anticipated by Smith\'s contemporaries and became an immediate bestseller. That edition sold out quickly and others followed. Today, Smith\'s Wealth of Nations rightfully claims a place in the Western intellectual canon.\r\n\r\n\r\n\r\nIt is the first book of modern political economy, and still provides the foundation for the study of that discipline.\r\nBut it is much more than that. Along with important discussions of economics and political theory, Smith mixed plain common sense with large measures of history, philosophy, psychology, sociology, and much else. Few texts remind us so clearly that the Enlightenment was very much a lived experience, a concern with improving the human condition in practical ways for real people. A masterpiece by any measure, Wealth of Nations remains a classic of world literature to be usefully enjoyed by readers today.', 8.59, 3),
(47, 33, '9780140445695', 'Capital : Volume II', '9780140445695.jpg', 1993, 624, 'The \"forgotten\" second volume of Capital, Marx\'s world-shaking analysis of economics, politics, and history, contains the vital discussion of commodity, the cornerstone to Marx\'s theories.', 28.8, 13),
(48, 38, '1471166910', 'The Madman\'s Library : The Greatest Curiosities of Literature', '1471166910.jpg', 2020, 256, '\'Anybody who loves the printed word will be bowled over by this amusing, erudite, beautiful book about books. It is in every way a triumph. One of the loveliest books to have been published for many, many years\' Alexander McCall Smith\r\n\'Quite simply the best gift for any book lover this year, or perhaps ever\' Lucy Atkins, Sunday Times Literary Book of the Year\r\n\'An utterly joyous journey into the deepest eccentricities of the human mind... The most cheering, fascinating book I\'ve read for ages\' Guardian\r\n\r\nFrom the author of the critically acclaimed and globally successful The Phantom Atlas, The Golden Atlas and The Sky Atlas comes a stunning new work. The Madman\'s Library is a unique, beautifully illustrated journey through the entire history of literature, delving into its darkest territories to hunt down the very strangest books ever written, and uncover the fascinating stories behind their creation.\r\n\r\nThis is a madman\'s library of eccentric and extraordinary volumes from around the world, many of which have been completely forgotten. Books written in blood and books that kill, books of the insane and books that hoaxed the globe, books invisible to the naked eye and books so long they could destroy the Universe, books worn into battle, books of code and cypher whose secrets remain undiscovered... and a few others that are just plain weird.\r\n\r\nFrom the 605-page Qur\'an written in the blood of Saddam Hussein, through the gorgeously decorated 15th-century lawsuit filed by the Devil against Jesus, to the lost art of binding books with human skin, every strand of strangeness imaginable (and many inconceivable) has been unearthed and bound together for a unique and richly illustrated collection ideal for every book-lover.', 22.44, 20),
(49, 39, '9780826488848', 'Victorian Literature and Culture', '9780826488848.jpg', 2007, 160, '\"Introductions to British Literature and Culture\" are practical guides to key literary periods. Guides in the series are designed to help introduce a new module or area of study, providing concise information on the historical, literary and critical contexts and acting as an initial map of the knowledge needed to study the literature and culture of a specific period. This accessible introduction to Victorian literature and its contexts from 1837-1901 includes: an overview of the historical, cultural and intellectual background including politics and economics, popular culture, philosophy and religion; a survey of the developments in key genres including discussion of major writers such as the Brontes, the Brownings, Collins, Dickens, Eliot, Gaskell, Hardy, Rossetti, Shaw, Swinburne, Tennyson and Wilde; concise explanations of key terms needed to understand the literature and criticism; a guide to key critical approaches; a chronology mapping historical events and literary works; and guided further reading including websites and electronic resources.', 17.71, 5),
(50, 40, ' 1465429883', 'The Literature Book : Big Ideas Simply Explained', ' 1465429883.jpg', 2016, 352, '\"Books, let\'s face it, are better than anything else.\" Nick Hornby Turn the pages of The Literature Book to discover over 100 of the world\'s most enthralling reads and the literary geniuses behind them. Storytelling is as old as humanity itself. Part of the Big Ideas Simply Explained series, The Literature Book introduces you to ancient classics from the Epic of Gilgamesh written 4,000 years ago, as well as the works of Shakespeare, Voltaire, Tolstoy, and more, and 20th-century masterpieces, including Catch-22, Beloved, and On the Road. The perfect reference for your bookshelf, it answers myriad questions such as what is stream of consciousness, who wrote To Kill a Mockingbird, and what links the poetry of Wordsworth with that of TS Eliot. Losing yourself in a great book transports you to another time and place, and The Literature Book sets each title in its social and political context. It helps you appreciate, for example, how Dickens\' Bleak House paints a picture of deprivation in 19th-century England, or how Stalin\'s climb to power was the backdrop for George Orwell\'s 1984. With succinct plot summaries, graphics, and inspiring quotations, this is a must-have reference for literature students and the perfect gift for book-lovers everywhere.\r\n\r\nSeries Overview: Big Ideas Simply Explained series uses creative design and innovative graphics along with straightforward and engaging writing to make complex subjects easier to understand. With over 7 million copies worldwide sold to date, these award-winning books provide just the information needed for students, families, or anyone interested in concise, thought-provoking refreshers on a single subject.', 24.61, 5),
(51, 41, '1936749750', 'Robotics : DISCOVER THE SCIENCE AND TECHNOLOGY OF THE FUTURE with 20 PROJECTS', '1936749750.jpg', 2012, 128, 'Once, robots were only found in science fiction books and movies. Today, robots are everywhere! They assemble massive cars and tiny computer chips. They help doctors do delicate surgery. They vacuum our houses and mow our lawns. Robot toys play with us, follow our commands, and respond to our moods. We even send robots to explore the depths of the ocean and the expanse of space. In Robotics, children ages 9 and up learn how robots affect both the future and the present. Hands-on activities make learning both fun and lasting.', 16.54, 12),
(52, 42, '9780470673423', 'Food Science and Technology', '9780470673423.jpg', 2017, 576, 'Food Science and Technology is considered the flagship textbook for degree level studies in food science, supported by the International Union of Food Science and Technology. The comprehensive text and reference book is designed to cover all the essential elements of food science and technology, including all core aspects of major food science and technology degree programs being taught worldwide. This second edition sees major development of the book\'s accessibility and features as well as a greater use of colour, photos and illustrations to enhance the reader\'s learning experience and to appeal to students in the subject. The editor, Geoffrey Campbell-Platt, is a world-renowned food scientist with a long career in industry and academia, and is currently President of the world s biggest professional association for food science, the International Union of Food Science and Technology (IUFoST). Each chapter is written by an expert in their chosen field, thus presenting a collection of authoritative authors in one volume, suitable for food science and technology degree programmes and food industry professionals.\r\nAbout IUFoST The International Union of Food Science and Technology (IUFoST) is a country-membership organisation representing some 65 member countries, and around 200,000 food scientists and technologists worldwide. IUFoST is the global voice of food science and technology, dedicated to promoting the sharing of knowledge and good practice in food science and technology internationally. IUFoST organises World Congresses of Food Science and Technology, and has established the International Academy of Food Science and Technology (IAFoST) to which eminent food scientists can be elected by peer review. For further information about IUFoST and its activities, visit: www.iufost.org\r\nshow less', 69.56, 5),
(53, 43, '1421417758', 'Science and Technology in World History : An Introduction', '1421417758.jpg', 2016, 552, 'Tracing the relationship between science and technology from the dawn of civilization to the early twenty-first century, James E McClellan III and Harold Dorn\'s bestselling book argues that technology as \"applied science\" emerged relatively recently, as industry and governments began funding scientific research that would lead directly to new or improved technologies. McClellan and Dorn identify two great scientific traditions: the useful sciences, which societies patronized from time immemorial, and the exploration of questions about nature itself, which the ancient Greeks originated. The authors examine scientific traditions that took root in China, India, and Central and South America, as well as in a series of Near Eastern empires in late antiquity and the Middle Ages. From this comparative perspective, McClellan and Dorn survey the rise of the West, the Scientific Revolution of the seventeenth century, the Industrial Revolution, and the modern marriage of science and technology. They trace the development of world science and technology today while raising provocative questions about the sustainability of industrial civilization.\r\nThis new edition of Science and Technology in World History offers an enlarged thematic introduction and significantly extends its treatment of industrial civilization and the technological super system built on the modern electrical grid. The Internet and social media receive increased attention. Facts and figures have been thoroughly updated and the work includes a comprehensive Guide to Resources, incorporating the major published literature along with a vetted list of websites and Internet resources for students and lay readers.', 31.42, 5),
(54, 44, '9780822349570', 'The Postcolonial Science and Technology Studies Reader', '9780822349570.jpg', 2011, 546, 'For twenty years, the renowned philosopher of science Sandra Harding has argued that science and technology studies, postcolonial studies, and feminist critique must inform one another. In The Postcolonial Science and Technology Studies Reader, Harding puts those fields in critical conversation, assembling the anthology that she has long wanted for classroom use. In classic and recent essays, international scholars from a range of disciplines think through a broad array of science and technology philosophies and practices. The contributors reevaluate conventional accounts of the West\'s scientific and technological projects in the past and present, rethink the strengths and limitations of non-Western societies\' knowledge traditions, and assess the legacies of colonialism and imperialism. The collection concludes with forward-looking essays, which explore strategies for cultivating new visions of a multicultural, democratic world of sciences and for turning those visions into realities. Feminist science and technology concerns run throughout the reader and are the focus of several essays. Harding provides helpful background for each essay in her introductions to the reader\'s four sections.', 32.72, 5),
(55, 45, '9780631232100', 'Science, Technology, and Society : A Sociological Approach', '9780631232100.jpg', 2005, 164, '\"Science, Technology and Society: A Sociological Approach\" is a comprehensive guide to the emergent field of science, technology, and society (STS) studies and its implications for today\'s culture and society. This title discusses current STS topics, research tools, and theories. It tackles some of the most urgent issues in current STS studies, including power and culture, race, gender, colonialism, the Internet, cyborgs and robots, and biotechnology. It includes case studies, a glossary, and further reading lists.', 32.92, 4);

-- --------------------------------------------------------

--
-- Table structure for table `book_feature`
--

CREATE TABLE `book_feature` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_feature`
--

INSERT INTO `book_feature` (`feature_id`, `feature_name`) VALUES
(1, 'Best Sellers'),
(2, 'Editor Recommends'),
(3, 'New Release');

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `book_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Business'),
(2, 'Children Collection'),
(3, 'History'),
(4, 'Literature'),
(5, 'Novels'),
(6, 'Science Fiction'),
(7, 'Science and Technology'),
(8, 'Philosophy');

-- --------------------------------------------------------

--
-- Table structure for table `category_tag`
--

CREATE TABLE `category_tag` (
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tag`
--

INSERT INTO `category_tag` (`book_id`, `category_id`) VALUES
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 4),
(28, 5),
(29, 5),
(30, 5),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 8),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(41, 6),
(42, 6),
(43, 6),
(44, 2),
(45, 4),
(46, 4),
(47, 3),
(47, 4),
(48, 3),
(48, 4),
(49, 3),
(49, 4),
(50, 4),
(51, 7),
(52, 4),
(53, 7),
(54, 7),
(55, 7);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feature_tag`
--

CREATE TABLE `feature_tag` (
  `book_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_tag`
--

INSERT INTO `feature_tag` (`book_id`, `feature_id`) VALUES
(9, 1),
(11, 2),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(18, 2),
(18, 3),
(20, 1),
(20, 3),
(22, 3),
(24, 3),
(25, 2),
(26, 3),
(28, 1),
(30, 2),
(34, 2),
(39, 2),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 3),
(46, 2),
(48, 1),
(49, 2),
(50, 1),
(51, 1),
(52, 3),
(53, 2),
(55, 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_name` varchar(50) NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `book_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher`) VALUES
(1, 'HarperCollins Publishers'),
(2, 'Bloomsbury Publishing PLC'),
(3, 'Picador USA'),
(4, 'Open Road Media'),
(5, 'HarperBus'),
(6, 'Harvard Business Review Press'),
(7, 'Scribner Book Company'),
(8, 'Macmillan USA'),
(9, 'Bantam'),
(10, 'Puppy Dogs & Ice Cream'),
(11, 'Puppy Dogs & Ice Cream Publishing; Illustrated edition'),
(12, ' Puppy Dogs & Ice Cream; Illustrated edition'),
(13, ' Independently published '),
(14, 'DG Books Publishing'),
(15, 'Farrar, Straus and Giroux'),
(16, 'Penguin Press'),
(17, 'Scribner'),
(18, 'Independently published'),
(19, 'G.P. Putnam\'s Sons Books for Young Readers'),
(20, 'W. W. Norton & Company'),
(21, 'Lake Union Publishing'),
(22, 'Random House USA Inc'),
(23, 'Algonquin Books'),
(24, ' Penguin Random House Children\'s UK '),
(25, ' Washington Square Press'),
(26, ' Gallery Books '),
(27, 'Yale University Press'),
(28, ' Penguin Putnam Inc '),
(29, ' Dover Publications Inc. '),
(30, ' Tan Books '),
(31, 'Dover Publications Inc.'),
(32, 'F&W Publications Inc'),
(33, 'Penguin Books Ltd'),
(34, 'Orion Publishing Co'),
(35, ' Orion Publishing Co '),
(36, ' Wordsworth Editions Ltd '),
(37, 'Wordsworth Editions Ltd'),
(38, 'Simon & Schuster Ltd'),
(39, 'Bloomsbury Publishing PLC2007'),
(40, 'DK'),
(41, 'Nomad Press'),
(42, 'John Wiley & Sons Inc'),
(43, 'JOHNS HOPKINS UNIVERSITY PRESS'),
(44, 'Duke University Press'),
(45, 'John Wiley and Sons Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin_permission` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `customer_id`, `username`, `password`, `admin_permission`) VALUES
(1, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `author_tag`
--
ALTER TABLE `author_tag`
  ADD KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `book_feature`
--
ALTER TABLE `book_feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_tag`
--
ALTER TABLE `category_tag`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `feature_tag`
--
ALTER TABLE `feature_tag`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `book_feature`
--
ALTER TABLE `book_feature`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_tag`
--
ALTER TABLE `author_tag`
  ADD CONSTRAINT `author_tag_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `author_tag_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON UPDATE CASCADE;

--
-- Constraints for table `book_review`
--
ALTER TABLE `book_review`
  ADD CONSTRAINT `book_review_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_review_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `category_tag`
--
ALTER TABLE `category_tag`
  ADD CONSTRAINT `category_tag_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_tag_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `feature_tag`
--
ALTER TABLE `feature_tag`
  ADD CONSTRAINT `feature_tag_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `feature_tag_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `book_feature` (`feature_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `customer_order` (`order_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
