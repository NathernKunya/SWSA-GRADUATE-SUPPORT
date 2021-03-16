-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 03:25 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_semesters`
--

CREATE TABLE `current_semesters` (
  `id` int(11) NOT NULL,
  `semesternumber` enum('1','2') NOT NULL,
  `academicyear` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `ended` enum('True','False') NOT NULL DEFAULT 'True',
  `MASSPM` int(100) NOT NULL,
  `MSW` int(100) NOT NULL,
  `PhD` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_semesters`
--

INSERT INTO `current_semesters` (`id`, `semesternumber`, `academicyear`, `start_date`, `end_date`, `ended`, `MASSPM`, `MSW`, `PhD`) VALUES
(1, '2', '2020-2021', '07/04/2020', '07/10/2020', 'True', 0, 0, 0),
(3, '1', '2021-2022', '17/07/2020', '', 'True', 0, 0, 0),
(4, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(5, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(6, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(7, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(8, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(9, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(10, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(11, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(12, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(13, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(14, '2', '2020-2021', '02/08/2020', '', 'True', 0, 0, 0),
(15, '1', '2021-2022', '02/08/2020', '', 'True', 0, 0, 0),
(16, '2', '2020-2021', '02/08/2020', '', 'False', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  `reciever` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `messageread` enum('True','False') NOT NULL DEFAULT 'False',
  `semester` varchar(11) NOT NULL,
  `messagetype` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `message`, `sender`, `reciever`, `date`, `time`, `messageread`, `semester`, `messagetype`) VALUES
(1, 'um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.\r\n\r\nenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.', '41', '35', '16/07/2020', '06:07:09am', 'False', '2', ''),
(2, 'um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, ', 'kjhgLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.\r\n\r\nenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.', '41', '35', '16/07/2020', '06:07:55am', 'False', '1', ''),
(3, 'um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, ', 'lkijuytLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.\r\n\r\nenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.', '45', '35', '16/07/2020', '07:07:20am', 'False', '1', ''),
(4, 'In Pictures: Makerere University 67th Graduation - New Vision', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.\r\n\r\nenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.', '46', '35', '29/07/2020', '12:07:17am', 'False', '1', ''),
(11, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.</p>\r\n\r\n<p>enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.</p>\r\n', '41', '1', '22/08/2020', '01:08:06pm', 'False', '1', 'notice'),
(10, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa', '<p><strong>Dear Students,</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>\r\n\r\n<ol>\r\n	<li>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</li>\r\n	<li>Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. enean leo ligula, porttitor eu, consequat vitae,</li>\r\n	<li>eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</li>\r\n	<li>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.</li>\r\n	<li>Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</li>\r\n	<li>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar.</li>\r\n</ol>\r\n', '47', '1', '22/08/2020', '08:08:18am', 'False', '1', 'notice');

-- --------------------------------------------------------

--
-- Table structure for table `research_feedback`
--

CREATE TABLE `research_feedback` (
  `id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `feedbackto` varchar(100) NOT NULL,
  `feedbackby` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_feedback`
--

INSERT INTO `research_feedback` (`id`, `feedback`, `feedbackto`, `feedbackby`, `date`, `time`) VALUES
(9, '                            \r\n                     elkdfiuyugfbnv       ', '71', '36', '02/08/2020', '12:08:16pm'),
(10, 'Does the verse in Song of Solomon 5:16 contain the name of the Islamic prophet Muhammad?', '71', '36', '02/08/2020', '12:08:57pm'),
(11, '                            \r\n                hods feedback            ', '71', '38', '02/08/2020', '12:08:29pm');

-- --------------------------------------------------------

--
-- Table structure for table `research_progress`
--

CREATE TABLE `research_progress` (
  `id` int(11) NOT NULL,
  `student` varchar(100) DEFAULT NULL,
  `research_topic` text,
  `datert` varchar(100) DEFAULT NULL,
  `timert` varchar(100) DEFAULT NULL,
  `protocol_concept` varchar(100) DEFAULT NULL,
  `datepc` varchar(100) DEFAULT NULL,
  `timepc` varchar(100) DEFAULT NULL,
  `concept_description` text,
  `supervisor_comment1` text,
  `datesc1` varchar(100) DEFAULT NULL,
  `timesp1` varchar(100) DEFAULT NULL,
  `commentedfile1` varchar(500) DEFAULT NULL,
  `revised_concept` varchar(100) DEFAULT NULL,
  `daterc` varchar(100) DEFAULT NULL,
  `timerc` varchar(100) DEFAULT NULL,
  `concept_description2` text,
  `supervisor_comment2` text,
  `datesc2` int(11) NOT NULL,
  `timesc2` int(11) NOT NULL,
  `commentedfile2` varchar(100) DEFAULT NULL,
  `proposal` varchar(100) DEFAULT NULL,
  `datep` varchar(100) DEFAULT NULL,
  `timep` varchar(100) DEFAULT NULL,
  `proposal_description` varchar(100) DEFAULT NULL,
  `supervisor_commentproposal1` text,
  `datescp1` int(11) NOT NULL,
  `timescp1` int(11) NOT NULL,
  `commentedfile3` varchar(100) DEFAULT NULL,
  `revised_proposal` varchar(100) DEFAULT NULL,
  `daterp` varchar(100) DEFAULT NULL,
  `timerp` varchar(100) DEFAULT NULL,
  `proposal_description2` text,
  `submit_proposal_tomsacordinator` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `resubmited_proposal` varchar(100) DEFAULT NULL,
  `dateresubp` varchar(100) NOT NULL,
  `timeresubp` varchar(100) NOT NULL,
  `proposal_description3` text NOT NULL,
  `approved_proposal` varchar(100) DEFAULT NULL,
  `quantitativenotes_and_questionaires` varchar(100) DEFAULT NULL,
  `dateq` varchar(100) NOT NULL,
  `timeq` varchar(100) NOT NULL,
  `descriptionq` text NOT NULL,
  `dissertation1` varchar(100) DEFAULT NULL,
  `dateds1` varchar(100) DEFAULT NULL,
  `timeds1` varchar(100) DEFAULT NULL,
  `description_ds1` varchar(100) DEFAULT NULL,
  `dessertation_feedback1` text,
  `datedf1` varchar(100) NOT NULL,
  `timedf1` varchar(100) NOT NULL,
  `commentedfile4` varchar(100) NOT NULL,
  `dissertation2` varchar(100) DEFAULT NULL,
  `dateds2` varchar(100) DEFAULT NULL,
  `timeds2` varchar(100) DEFAULT NULL,
  `description_ds2` text,
  `dessertation_feedback2` text,
  `datedf2` varchar(100) DEFAULT NULL,
  `timedf2` varchar(100) DEFAULT NULL,
  `commentedfile5` varchar(100) DEFAULT NULL,
  `dissertation3` varchar(100) DEFAULT NULL,
  `dateds3` varchar(100) DEFAULT NULL,
  `timeds3` varchar(100) DEFAULT NULL,
  `description_ds3` text,
  `foward_dissertationforexamination` enum('TRUE','FALSE') DEFAULT 'FALSE',
  `revisions_with_compliance_reports` varchar(100) DEFAULT NULL,
  `daterwcr` varchar(100) DEFAULT NULL,
  `timerwcr` varchar(100) DEFAULT NULL,
  `descriptionrwcr` text,
  `step` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_progress`
--

INSERT INTO `research_progress` (`id`, `student`, `research_topic`, `datert`, `timert`, `protocol_concept`, `datepc`, `timepc`, `concept_description`, `supervisor_comment1`, `datesc1`, `timesp1`, `commentedfile1`, `revised_concept`, `daterc`, `timerc`, `concept_description2`, `supervisor_comment2`, `datesc2`, `timesc2`, `commentedfile2`, `proposal`, `datep`, `timep`, `proposal_description`, `supervisor_commentproposal1`, `datescp1`, `timescp1`, `commentedfile3`, `revised_proposal`, `daterp`, `timerp`, `proposal_description2`, `submit_proposal_tomsacordinator`, `resubmited_proposal`, `dateresubp`, `timeresubp`, `proposal_description3`, `approved_proposal`, `quantitativenotes_and_questionaires`, `dateq`, `timeq`, `descriptionq`, `dissertation1`, `dateds1`, `timeds1`, `description_ds1`, `dessertation_feedback1`, `datedf1`, `timedf1`, `commentedfile4`, `dissertation2`, `dateds2`, `timeds2`, `description_ds2`, `dessertation_feedback2`, `datedf2`, `timedf2`, `commentedfile5`, `dissertation3`, `dateds3`, `timeds3`, `description_ds3`, `foward_dissertationforexamination`, `revisions_with_compliance_reports`, `daterwcr`, `timerwcr`, `descriptionrwcr`, `step`) VALUES
(7, '37', 'Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view. ', '24/08/2020', '02:08:08pm', 'Protocol_concept_isabirye_ taibu_37.docx', '24/08/2020', '04:08:10pm', '<p>Wishing an if he sixteen visited tedious subject it. Mind mrs yet did quit high even you went. Sex against the two however not nothing prudent colonel greater. Up husband removed parties staying he subject mr. &nbsp; Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry. Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality. Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view.&nbsp;</p>\r\n', '                            \r\n                            kjn', '26/08/2020', '10:08:56am', 'Commented_protocalConcept_37.docx', 'Revised_protocol_concept_isabirye_ taibu_37.docx', '24/08/2020', '04:08:51pm', '<p>Wishing an if he sixteen visited tedious subject it. Mind mrs yet did quit high even you went. Sex against the two however not nothing prudent colonel greater. Up husband removed parties staying he subject mr. &nbsp; Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry. Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality. Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view.&nbsp;</p>\r\n', '                            \r\n                            kjnb ', 26, 11, 'Commented_Revised_protocalConcept_37.docx', 'Research_proposal_isabirye_ taibu_37.pdf', '25/08/2020', '10:08:16pm', '<p>lkjn</p>\r\n', '                            \r\n                            mn ', 26, 11, 'Commented_Proposalone_37.pdf', 'RevisedResearch_proposal_isabirye_ taibu_37.docx', '25/08/2020', '10:08:15pm', '<p>kjhb</p>\r\n', 'FALSE', 'Correction_and_resubmissonOfP_roposalisabirye_ taibu_37.docx', '25/08/2020', '10:08:50pm', '<p>iuhygb</p>\r\n', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, '                            \r\n                            lkn', '26/08/2020', '11:08:03am', 'Commented_Dissertation_one_37.docx', NULL, NULL, NULL, NULL, '                            \r\n                            ,m', '26/08/2020', '11:08:42am', 'Commented_Dissertation2_37.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '32'),
(8, '38', 'Expressionists and their impact on modern art', '26/08/2020', '01:08:57pm', 'Protocol_concept_music_ music_38.docx', '26/08/2020', '01:08:50pm', 'try', '                            \r\n                            try', '26/08/2020', '01:08:20pm', 'Commented_protocalConcept_38.docx', 'Revised_protocol_concept_music_ music_38.docx', '26/08/2020', '01:08:24pm', 'try2', 'try                          \r\n                            ', 26, 1, 'Commented_Revised_protocalConcept_38.docx', 'Research_proposal_music_ music_38.docx', '26/08/2020', '01:08:54pm', 'try', '                            \r\n                    wed        ', 26, 1, 'Commented_Proposalone_38.docx', 'RevisedResearch_proposal_music_ music_38.docx', '26/08/2020', '01:08:00pm', 'trf', 'TRUE', 'Disertation_draft_three_music_ music_38.docx', '26/08/2020', '03:08:12pm', 'try', NULL, 'Questionaires_and_quantitative_notes_music_ music_38.docx', '26/08/2020', '02:08:02pm', 'ijh', 'Disertation_draft_one_music_ music_38.docx', '26/08/2020', '02:08:22pm', 'try', '                            \r\n                            try', '26/08/2020', '02:08:35pm', 'Commented_Dissertation_one_38.docx', 'Disertation_draft_two_music_ music_38.docx', '26/08/2020', '02:08:43pm', 'try', '                            \r\n                            eee', '26/08/2020', '03:08:26pm', 'Commented_Dissertation2_38.docx', 'Disertation_draft_three_music_ music_38.docx', '26/08/2020', '03:08:56pm', 'ee', 'TRUE', 'Dissertation_resubmission_with_CR_music_ music_38.docx', '26/08/2020', '03:08:17pm', 'try', '18');

-- --------------------------------------------------------

--
-- Table structure for table `research_work`
--

CREATE TABLE `research_work` (
  `id` int(11) NOT NULL,
  `item` text,
  `item_category` varchar(100) NOT NULL,
  `description` text,
  `attatchment` varchar(100) DEFAULT NULL,
  `student` varchar(100) DEFAULT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `supervisorcomment` text,
  `cordinatorcomment` text,
  `hodcomment` text,
  `yearofstudy` varchar(100) NOT NULL,
  `stepinphase` varchar(100) NOT NULL,
  `phase` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_work`
--

INSERT INTO `research_work` (`id`, `item`, `item_category`, `description`, `attatchment`, `student`, `date`, `time`, `semester`, `supervisorcomment`, `cordinatorcomment`, `hodcomment`, `yearofstudy`, `stepinphase`, `phase`) VALUES
(74, 'Improve ashamed married expense bed her comfort pursuit mrs. Four time took ye your as fail lady. ', 'research_topic', '<p>Improve ashamed married expense bed her comfort pursuit mrs. Four time took ye your as fail lady. Up greatest am exertion or marianne. Shy occasional terminated insensible and inhabiting gay. So know do fond to half on. Now who promise was justice new winding. In finished on he speaking suitable advanced if. Boy happiness sportsmen say prevailed offending concealed nor was provision. Provided so as doubtful on striking required. Waiting we to compass assured.&nbsp;</p>\r\n\r\n<p>No opinions answered oh felicity is resolved hastened. Produced it friendly my if opinions humoured. Enjoy is wrong folly no taken. It sufficient instrument insipidity simplicity at interested. Law pleasure attended differed mrs fat and formerly. Merely thrown garret her law danger him son better excuse. Effect extent narrow in up chatty. Small are his chief offer happy had.&nbsp;<br />\r\n&nbsp;</p>\r\n', NULL, '27', '24/08/2020', '07:08:44am', '16', NULL, NULL, NULL, '2', '1', '1'),
(75, 'Wishing an if he sixteen visited tedious subject it. Mind mrs yet did quit high even you went. Sex against the two however not nothing prudent colonel greater. Up husband removed parties staying he subject mr.   Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry. Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality. Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view. ', 'research_progress', 'Wishing an if he sixteen visited tedious subject it. Mind mrs yet did quit high even you went. Sex against the two however not nothing prudent colonel greater. Up husband removed parties staying he subject mr.   Two assure edward whence the was. Who worthy yet ten boy denote wonder. Weeks views her sight old tears sorry. Additions can suspected its concealed put furnished. Met the why particular devonshire decisively considered partiality. Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no walk. At he spot with five of view. ', 'Protocol concept_27.pdf', '27', '24/08/2020', '08:08:11am', '16', NULL, NULL, NULL, '1', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `staffid` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `Active` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staffid`, `firstname`, `lastname`, `username`, `password`, `gender`, `email`, `phone`, `role`, `office`, `photo`, `Active`) VALUES
(42, 'MAK0002', 'taibu', 'isabirye', 'tisabirye6', 'xrcn63', 'Male', 'findtaibu@gmail.com', 'o78358474', 'cordinator', 'A4, BLOCKB', '', '1'),
(37, 'MAK0001', 'taibu', 'isabirye', 'tisabirye2', '91scjy', 'Male', 'findtaibu@gmail.com', '078358474', 'supervisor', 'A4, BLOCKB', '', '1'),
(36, 'MAK0001', 'taibu', 'isabirye', 'supervisor', 'supervisor', 'Male', 'findtaibu@gmail.com', '078358474', 'supervisor', 'A4, BLOCKB', '', '1'),
(35, 'MAK0001', 'taibu', 'isabirye', 'tisabirye', '73erba', 'Male', 'findtaibu@gmail.com', '078358474', 'supervisor', '', '', '1'),
(40, 'MAK0002', 'taibu', 'isabirye', 'tisabirye5', 'kpid7a', 'Male', 'findtaibu@gmail.com', '078358474', 'cordinator', 'A4, BLOCKB', '', '1'),
(41, 'MAK0002', 'Unknown', 'isabirye', 'codinator', 'codinator', 'Male', 'findtaibu@gmail.com', 'o78358474', 'cordinator', 'A4, BLOCKB', 'teacher1598096046.jpg', '1'),
(39, 'MAK0002', 'taibu', 'isabirye', 'tisabirye4', '4pbzuk', 'Female', 'findtaibu@gmail.com', '078358474', 'cordinator', '', '', '1'),
(38, 'MAK0001', 'taibu', 'isabirye', 'tisabirye3', 'kgw9c3', 'Male', 'findtaibu@gmail.com', '078358474', 'HOD', 'A4, BLOCKB', '', '1'),
(45, 'MAK0002', 'taibu', 'isabirye', 'tisabirye49', '2pq5xg', 'Male', 'amtaibu@gmail.com', 'o78358474', 'supervisor', '', '', '1'),
(46, 'MAK0002', 'taibu', 'isabirye', 'tisabirye24', 'qibswj', 'Male', 'amtaibu@gmail.com', 'o78358474', '', 'A4, BLOCKB', '', '1'),
(47, 'MAK0002', 'taibu', 'isabirye', 'tisabirye27', 't54wzx', 'Male', 'findtaibu@gmail.com', '078358474', '', 'A4, BLOCKB', 'teacher1598039337.jpg', '1'),
(49, 'MAK0002', 'taibu', 'isabirye', 'tisabirye30', '9guzja', 'Male', 'amtaibu@gmail.com', '078358474', '', 'A4, BLOCKB', 'teacher1598095936.jpg', '0'),
(50, 'MAK0001', 'taibu', 'isabirye', 'tisabirye33', '4z53bv', 'Female', 'gettaibu@gmail.com', '078358474', '', 'A4, BLOCKB', 'teacher1598096046.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Id` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studentsEmail` varchar(50) NOT NULL,
  `studentsRole` varchar(50) DEFAULT NULL,
  `studentsPhone` varchar(100) NOT NULL,
  `Program` varchar(100) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Year` varchar(100) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `RegNumber` varchar(100) NOT NULL,
  `ResearchTopic` varchar(100) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'0',
  `supervisor` varchar(11) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Id`, `FirstName`, `LastName`, `username`, `password`, `studentsEmail`, `studentsRole`, `studentsPhone`, `Program`, `Semester`, `Year`, `StudentNumber`, `RegNumber`, `ResearchTopic`, `Active`, `supervisor`, `photo`, `CreationDate`) VALUES
(24, 'taibu', 'isabirye', 'tisabirye', '9xlsmy', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 0, '1', '234746', '384474', 'Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no', b'1', '36', '', '2020-08-02 12:18:07'),
(25, 'taibu', 'isabirye', 'tisabirye8', 'e8tliw', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', '36', '', '2020-08-02 12:37:07'),
(26, 'taibu', 'isabirye', 'tisabirye16', 'e6hjdn', 'amtaibu@gmail.com', NULL, 'o78358474', 'MSW', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-02 13:48:00'),
(27, 'Unknown', 'liouy', 'student', 'student', 'isabiryetai645@gmail.com', NULL, 'o78358474', 'MASSPM', 16, '1', '234746', '384474', 'Wishing an if he sixteen visited tedious subject it. Mind mrs yet did quit high even you went. Sex a', b'1', NULL, '', '2020-08-02 13:49:11'),
(28, 'Unknown', 'isabirye', 'uisabirye', 'smn6j5', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:12:51'),
(29, 'Unknown', 'isabirye', 'uisabirye1', 's3m4bx', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:13:17'),
(30, 'taibu', 'isabirye', 'tisabirye36', 'lh9ucf', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:14:10'),
(31, 'taibu', 'isabirye', 'tisabirye48', 'tyzvm2', 'isabiryetai645@gmail.com', NULL, 'o78358474', 'MSW', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:17:26'),
(32, 'taibu', 'isabirye', 'tisabirye60', 'j4p7z2', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:20:05'),
(33, 'taibu', 'isabirye', 'tisabirye72', 'szmrig', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '2', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:33:21'),
(34, 'taibu', 'isabirye', 'tisabirye84', 'vlzpkh', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '1', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:39:34'),
(35, 'taibu', 'isabirye', 'tisabirye96', 'y5dzjb', 'amtaibu@gmail.com', NULL, 'o78358474', 'MSW', 16, '2', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:53:11'),
(36, 'taibu', 'isabirye', 'tisabirye108', 'w6y5pb', 'amtaibu@gmail.com', NULL, 'o78358474', 'PhD', 16, '2', '234746', '384474', NULL, b'1', NULL, '', '2020-08-24 14:55:45'),
(37, 'taibu', 'student', 'student2', 'student2', 'amtaibu@gmail.com', NULL, 'o78358474', 'MASSPM', 16, '1', '234746', '384474', 'Certain it waiting no entered is. Passed her indeed uneasy shy polite appear denied. Oh less girl no', b'1', '36', '', '2020-08-24 14:56:20'),
(38, 'music', 'music', 'mmusic', 'music', 'amtaibu@gmail.com', NULL, '078358474', 'MASSPM', 16, '1', '234746', '384474', 'Expressionists and their impact on modern art', b'1', '36', '', '2020-08-26 14:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollment`
--

CREATE TABLE `student_enrollment` (
  `id` int(100) NOT NULL,
  `student` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `currentyearofstudy` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_semesters`
--
ALTER TABLE `current_semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_feedback`
--
ALTER TABLE `research_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_progress`
--
ALTER TABLE `research_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_work`
--
ALTER TABLE `research_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_semesters`
--
ALTER TABLE `current_semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `research_feedback`
--
ALTER TABLE `research_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `research_progress`
--
ALTER TABLE `research_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `research_work`
--
ALTER TABLE `research_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `student_enrollment`
--
ALTER TABLE `student_enrollment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
