-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 10:21 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcreatesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'html'),
(2, 'css');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

DROP TABLE IF EXISTS `examinations`;
CREATE TABLE IF NOT EXISTS `examinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answers` longtext NOT NULL,
  `right_answer` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `question`, `answers`, `right_answer`, `category_id`) VALUES
(159, 'Which of the ff. is the definition of Selector?', 'A. is composed of a set of rules.<br/><br/>\nB. consist of three different parts<br/><br/>\nC. represents an HTML tag that the style will be applied.<br/><br/>\nD. all of the above<br/><br/>', 'D', 2),
(156, 'Consists of content, margin, padding, and a border.', 'A. structured model<br/><br/>\nB. box model<br/><br/>\nC. DOM structure<br/><br/>\nD. BOM structure<br/><br/>', 'B', 2),
(157, 'Moves the HTML elements as it scrolls.', 'A. position: fixed<br/><br/>\nB. position: static<br/><br/>\nC. position: relative<br/><br/>\nD. position: absolute<br/><br/>', 'A', 2),
(158, 'Determines how HTML elements are going to be placed on a webpage.', 'A. position: fixed<br/><br/>\nB. position: static<br/><br/>\nC. position: relative<br/><br/>\nD. display property<br/><br/>', 'D', 2),
(154, 'Specifies the outer edge of an HTML element.', 'A. Padding Property<br/><br/>\nB. Border Property<br/><br/>\nC. Margin Property<br/><br/>\nD. Background Property<br/><br/>', 'B', 2),
(155, 'Whether it is a button, image, or text, all HTML elements have a _______.', 'A. structured model<br/><br/>\nB. box model<br/><br/>\nC. DOM structure<br/><br/>\nD. BOM structure<br/><br/>', 'B', 2),
(150, 'What is the purpose of the head tag in HTML?', 'a) Display content<br/><br/>\n     b) Define the document\'s metadata<br/><br/>\n     c) Create headings<br/><br/>\n     d) Format text', 'b', 1),
(151, 'Used to explain the code', 'A. CSS Comments<br/><br/>\nB. CSS Align Elements<br/><br/>\nC. CSS Opacity<br/><br/>\nD. CSS Gradient Backgrounds<br/><br/>', 'A', 2),
(152, 'Can take a value from 0.0 - 1.0.', 'A. CSS Comments<br/><br/>\nB. CSS Align Elements<br/><br/>\nC. CSS Opacity<br/><br/>\nD. CSS Gradient Backgrounds<br/><br/>', 'C', 2),
(153, 'Extension of RGB color values', 'A. RGBA<br/><br/>\nB. HSL<br/><br/>\nC. Hexadecimal<br/><br/>\nD. HSLA<br/><br/>', 'A', 2),
(149, 'Which tag acts as the parent of the title tag?', 'a) html<br/><br/>\r\n     b) head<br/><br/>\r\n     c) body<br/><br/>\r\n     d) p', 'b', 1),
(148, 'Why is HTML considered the foundation of web development?', 'a) Because it\'s the most colorful language<br/><br/>\r\n     b) Because it\'s the only web technology<br/><br/>\r\n     c) Because it defines the structure and content of web pages<br/><br/>\r\n     d) Because it\'s easy to learn', 'c', 1),
(145, 'What does the em tag signify in HTML?', 'a) Italic text<br/><br/>\r\n     b) Strong emphasis<br/><br/>\r\n     c) Underlined text<br/><br/>\r\n     d) Highlighted text', 'a', 1),
(146, 'What does the br tag do in HTML?', 'a) Creates a new paragraph<br/><br/>\r\n     b) Displays a breaking space<br/><br/>\r\n     c) Inserts a line comment<br/><br/>\r\n     d) Defines a hyperlink', 'b', 1),
(147, 'What does the p tag create in HTML?', 'a) Lists<br/><br/>\r\n     b) Images<br/><br/>\r\n     c) Paragraphs<br/><br/>\r\n     d) Links', 'c', 1),
(144, 'Which HTML tag is used to add columns in an HTML table?', 'a) td<br/><br/>\r\n     b) tr<br/><br/>\r\n     c) th<br/><br/>\r\n     d) table', 'a', 1),
(141, 'What is the default bullet used in unordered lists?', 'a) Numbers<br/><br/>\r\n     b) Letters<br/><br/>\r\n     c) Shaded circle<br/><br/>\r\n     d) Square', 'c', 1),
(142, 'By default, what is the sequence used in ordered lists?', 'a) Letters (e.g., A, B, C)<br/><br/>\r\n     b) Numbers (e.g., 1, 2, 3)<br/><br/>\r\n     c) Roman numerals (e.g., I, II, III)<br/><br/>\r\n     d) Text-based bullets', 'b', 1),
(143, 'Which attribute spans a cell in a specified number of columns?', 'a) rowspan<br/><br/>\r\n     b) colspan<br/><br/>\r\n     c) cellspan<br/><br/>\r\n     d) headerspan', 'b', 1),
(138, 'What is the purpose of the dt tag in a description list?', 'a) It defines a description list<br/><br/>\r\n     b) It defines a description term<br/><br/>\r\n     c) It defines a description definition<br/><br/>\r\n     d) It defines a bullet point', 'b', 1),
(140, 'What is the primary purpose of the textarea tag in an HTML form?', 'a) It creates a multiline input field<br/><br/>\r\n     b) It defines a form title<br/><br/>\r\n     c) It adds checkboxes to the form<br/><br/>\r\n     d) It specifies form colors', 'a', 1),
(139, 'Which HTML tag is used to create a dropdown list of choices in a form?', 'a) input<br/><br/>\r\n     b) label<br/><br/>\r\n     c) select<br/><br/>\r\n     d) textarea', 'c', 1),
(137, 'Which attribute is used to specify the URL to which form data will be sent?', 'a) action<br/><br/>\r\n     b) method<br/><br/>\r\n     c) type<br/><br/>\r\n     d) href', 'a', 1),
(136, 'What does the img tag describe in HTML?', 'a) A link<br/><br/>\r\n     b) A paragraph<br/><br/>\r\n     c) An image<br/><br/>\r\n     d) A table', 'c', 1),
(135, 'What does the a tag create in HTML?', 'a) A hyperlink<br/><br/>\r\n     b) A line break<br/><br/>\r\n     c) A comment<br/><br/>\r\n     d) An image', 'a', 1),
(134, 'Which HTML tag is used to display text in a bold format?', 'a) strong<br/><br/>\r\n     b) i<br/><br/>\r\n     c) em<br/><br/>\r\n     d) b>', 'd', 1),
(133, 'Which heading tag defines the most crucial heading in an HTML document?', 'a) h1<br/><br/>\r\n     b) h2<br/><br/>\r\n     c) h3<br/><br/>\r\n     d) h4', 'a', 1),
(132, 'Which delimiter is used for comments in HTML?', 'a) &lt;!-- and --!&gt; <br/><br/>\n     b) // <br/><br/>\n     c) /! and /! <br/><br/> d) &lt;!----&gt;', 'a', 1),
(131, 'What is the purpose of comments in HTML?', 'a) Display content in the browser<br/><br/>\r\n     b) Create headings<br/><br/>\r\n     c) Document HTML code for programmers<br/><br/>\r\n     d) Format text', 'c', 1),
(130, 'Can HTML tags have more than one attribute?', 'a) No, they can only have one attribute<br/><br/>\r\n     b) Yes, but only on odd-numbered days<br/><br/>\r\n     c) Yes, HTML tags can have multiple attributes<br/><br/>\r\n     d) Yes, but it\'s discouraged', 'c', 1),
(128, 'How is a start tag formed in HTML?', 'a) With a left-angle bracket and a slash<br/><br/>\r\n     b) With a right-angle bracket<br/><br/>\r\n     c) With a left-angle bracket, tag name, and right-angle bracket<br/><br/>\r\n     d) With a semicolon and tag name', 'c', 1),
(129, 'Can HTML tags have more than one attribute?', 'a) No, they can only have one attribute<br/><br/>\r\n     b) Yes, but only on odd-numbered days<br/><br/>\r\n     c) Yes, HTML tags can have multiple attributes<br/><br/>\r\n     d) Yes, but it\'s discouraged', 'c', 1),
(126, 'What does HTML stand for?', 'a) HyperText Markup Language<br/><br/>\n     b) High-Tech Modern Language<br/><br/>\n     c) Hypertext Markdown Language<br/><br/>\n     d) Hyperlink Text Management Language', 'a', 1),
(127, 'How are HTML tags or markups used in web development?', 'a) To fix bugs in code<br/><br/>\r\n     b) To enclose elements and provide instructions<br/><br/>\r\n     c) To create animations<br/><br/>\r\n     d) To secure websites', 'b', 1),
(160, 'Specifies which type of position is used for an HTML element.', 'A. position property<br/><br/>\nB. position: static<br/><br/>\nC. position: relative<br/><br/>\nD. position: absolute<br/><br/>', 'A', 2),
(161, 'This is a type of selector for selecting a class attribute.', 'A. Universal Selector<br/><br/>\nB. Type Selector<br/><br/>\nC. ID Selector<br/><br/>\nD. Class Selector<br/><br/>', 'D', 2),
(162, 'This is a type of selector for selecting all elements.', 'A. Universal Selector<br/><br/>\nB. Type Selector<br/><br/>\nC. ID Selector<br/><br/>\nD. Class Selector<br/><br/>', 'A', 2),
(163, 'This is a type of selector for selecting a specific tag.', 'A. Universal Selector<br/><br/>\nB. Type Selector<br/><br/>\nC. ID Selector<br/><br/>\nD. Class Selector<br/><br/>', 'B', 2),
(164, 'Is used to specify if the background image is fixed or scrolls within the webpage.', 'A. background-color<br/><br/>\nB. background-position<br/><br/>\nC. background-image<br/><br/>\nD. background-attachment<br/><br/>', 'D', 2),
(165, 'Controls how bold a text is.', 'A. text-indent<br/><br/>\nB. font-weight<br/><br/>\nC. font-style<br/><br/>\nD. font-variant<br/><br/>', 'B', 2),
(166, 'This property is commonly used to italicize a text.', 'A. text-indent<br/><br/>\nB. font-weight<br/><br/>\nC. font-style<br/><br/>\nD. font-variant<br/><br/>', 'C', 2),
(167, 'Is used to set the background color of an HTML element.', 'A. background-color<br/><br/>\nB. background-position<br/><br/>\nC. background-image<br/><br/>\nD. background-attachment<br/><br/>', 'A', 2),
(168, 'Used to explain the code', 'A. CSS Comments<br/><br/>\nB. CSS Align Elements<br/><br/>\nC. CSS Opacity<br/><br/>\nD. CSS Gradient Backgrounds<br/><br/>', 'A', 2),
(169, 'Sets how much space should appear outside the border.', 'A. Padding Property<br/><br/>\nB. Border Property<br/><br/>\nC. Margin Property<br/><br/>\nD. Background Property<br/><br/>', 'C', 2),
(170, 'Is used to specify if the background image is fixed or scrolls within the webpage.', 'A. background-color<br/><br/>\nB. background-position<br/><br/>\nC. background-image<br/><br/>\nD. background-attachment<br/><br/>', 'D', 2);

-- --------------------------------------------------------

--
-- Table structure for table `examination_progress`
--

DROP TABLE IF EXISTS `examination_progress`;
CREATE TABLE IF NOT EXISTS `examination_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `description`, `category_id`, `image`, `unit_id`, `sequence`) VALUES
(8, 'Lesson 8 Comments in HTML', 'Comments are a block of codes that are not displayed in the browser. Programmers use comments as documentation of HTML codes. \r\n<br/><br/>\r\nAny part of HTML enclosed with the comment delimiter (<!-- comment -->) will not be displayed.', 1, 'HTML Lesson 8.png', 2, 0),
(9, 'Lesson 9 Heading Tags', 'These tags are used to create headings, either as a title or subtitle, in an HTML document. The h1 tag defines the most crucial heading in a document. The h6 tag defines the least important heading in a document.<br />', 1, 'HTML Lesson 9.png', 2, 0),
(10, 'Lesson 10 Paragraph Tag', 'The p tag creates a paragraph to be displayed in a browser. The browser removes extra white spaces added inside the contents of the p tag, and paragraphs always start a new line.<br />The pre tag displays preformatted contents on a web page. It also preserves white spaces from new lines and spaces. The font style displayed on the browser will also be dependent on the text editor or Integrated Development Environment (IDE) used. The font style used by a text editor or IDE will be the font style displayed by the browser when using pre tag. NOTE: Visual Studio (VS) Code is used on the following samples with Consolas as its font style.<br />', 1, 'HTML Lesson 10.png', 2, 0),
(11, 'Lesson 11 Line Break Tag', 'The br tag is an empty tag that displays a breaking space (or a line break) to separate contents on a web page. Use this tag if you want to have a new line without creating a new paragraph.<br />', 1, 'HTML Lesson 11.png', 3, 0),
(12, 'Lesson 12 Formatting Tags', 'The br tag is an empty tag that displays a breaking space (or a line break) to separate contents on a web page. Use this tag if you want to have a new line without creating a new paragraph.<br />Both &lt;b&gt; and &lt;strong&gt; tags display its content bold in the browser. Using the &lt;b&gt; tag specifies that the text within has no importance. Using the &lt;strong&gt; tag specifies that the text within is important.', 1, 'HTML Lesson 12.png', 3, 0),
(13, 'Lesson 13 Anchor Tag', 'The &lt;a&gt; tag or the anchor element creates a hyperlink that could navigate to another web page or an iframe. It is necessary to add the href attribute to an &lt;a&gt; tag to determine which uniform resource locator (URL) it shall navigate to. \r\n<br/><br/>\r\nLinks provided in the href attribute may be from your source (HTML files created by you). Make sure to provide the correct path when calling your files. Specifying a destination can be done using the <a> tag. The target attribute specifies how the URL will be opened. Syntax of <a> tag using target attribute: \r\n<br/><br/>\r\n1. _self - This is the default value. It opens the link to the same tab where it was clicked. \r\n<br/>\r\n2. _blank - It opens the link to a new tab. \r\n<br/>\r\n3. _parent - It opens the link to the parent frame. It is only applicable if a link was clicked inside an iframe. \r\n<br/>\r\n4. _top - It opens the link in the body of the tab or the window.', 1, 'HTML Lesson 13.png', 3, 0),
(14, 'Lesson 14 Image Tag', 'The &lt;img&gt; tag describes an image in an HTML document. The most common accepted file types are apng, jpeg, png, svg, ico, and gif. Some attributes used in &lt;img&gt; tag are the following:\r\n<br/><br/>\r\n1. src - the path or location of the image to be displayed \r\n<br/>\r\n2. alt - an alternative text to be displayed if the image failed its loading \r\n<br/>\r\n3. title - a text appears when the mouse pointer hovers in the image \r\n<br/>\r\n4. width and height - dimensions or size of the image.\r\n<br/><br/>\r\nThe image might be huge in our browser. To adjust its size, use width, and height attributes.', 1, 'HTML Lesson 14.png', 3, 0),
(15, 'Lesson 15 Character Entities', 'Character entities, or just entities, are used to display characters in an HTML document. Character entities are mostly used on reserved characters like &lt;and&gt;.\r\n<br/><br/>\r\nAll character entities start with an ampersand and end with a semi-colon. If the entity has a name, it can be used to call out the character. If none, the equivalent entity number may be used, preceded by a number sign ( # ).', 1, 'HTML Lesson 15.png', 3, 0),
(16, 'Lesson 16 HTML Tables', 'Table tags allow us to create tables, composed of rows and columns, with headers and a caption. The tags used in creating tables in php are &lt;table&gt;, &lt;tr&gt;, &lt;th&gt;, &lt;td&gt;, and &lt;caption&gt;. \r\n<br/><br/>\r\nThough creating a table in HTML uses at least three elements, creating a table in HTML is simple. Starting with its general container, the &lt;table&gt; tag shall contain all the table elements inside to be part of a single table.', 1, 'HTML Lesson 16.png', 4, 0),
(17, 'Lesson 17 Table Rows', 'Use the &lt;tr&gt; tag to add a table row. \r\n<br/><br/>\r\nAdding multiple rows in a table is possible. Make sure that each table row is properly closed before starting a new table row element.', 1, 'HTML Lesson 17.png', 4, 0),
(18, 'Lesson 18 Table Columns', 'Columns in HTML table are stored in a table data or a cell. The &lt;td&gt; tag is used to add columns in a table. Make sure that the &lt;td&gt; tag is inside a &lt;tr&gt; tag. Adding multiple &lt;td&gt; tag is possible but make sure that the first one is closed before opening another. \r\n<br/><br/>\r\nAdding a header in a table is optional, yet it allows a title to be displayed per column to guide the readers what the column is about. Use a &lt;th&gt; tag to add table headers. Make sure that the table header is inside a &lt;tr&gt; tag. Adding multiple headers is possible making sure that the first one is closed before opening another.', 1, 'HTML Lesson 18.png', 4, 0),
(19, 'Lesson 19 Attributes in HTML Tables', 'As we could see on the table, there are repetitive contents either per row or per column. Adding the rowspan and the colspan attributes in a cell can make them occupy several rows or columns depending on what is specified. \r\n<br/><br/>\r\nThe rowspan attribute spans a cell in a specified number of rows. The colspan attribute spans a cell in a specified number of columns. Let\'s alter the given table and use both the rowspan and colspan attributes.', 1, 'HTML Lesson 19.png', 4, 0),
(20, 'Lesson 20 Adding a Caption', 'Adding a caption for a table gives more information to the readers of what the general idea of the table indicates. \r\n<br/><br/>\r\nAdding a caption in HTML table is through the caption tag.', 1, 'HTML Lesson 20.png', 4, 0),
(21, 'Lesson 21 Ordered Lists', 'Ordered lists or numbered lists are used to group items and present them with\r\norder or arrangement through numbers or letters (alphabetically). The default\r\nsequence used in ordered lists are numbers, e.g., 1, 2, 3,. The &lt;ol&gt; tag displays an ordered list with list items using the &lt;li&gt; tag.\r\n<br/><br/>\r\nThe &lt;ol&gt; tag gives us a way of changing its displayed sequence. Again, the\r\ndefault is numbers. Changing the type of a sequence may be done by adding the type\r\nattribute and specifying the value. Values allowed for the type attribute are A, a, I, i, and 1 (default).\r\n', 1, 'HTML Lesson 21.png', 5, 0),
(1, 'Lesson 1 What is HTML?', 'HTML or most known as Hypertext Markup Language is considered as the leading markup language. It is considered as the standard markup language for websites. \r\n<br/><br/>\r\nHTML, as the name itself implies, is written using markups or tags which represent various elements. HTML is the core of a website. All technologies for web developers rely on HTML and its structure.\r\n<br/><br/>\r\nHTML documents are plain files, and could be saved with the extension *.html, *.htm, or *.xhtml. Any file name will do in an HTML file as long as you follow the naming rules of files. HTML documents may be created using any text editor.', 1, 'HTML Lesson 1.png', 1, 0),
(2, 'Lesson 2 Structure of HTML Documents', 'Elements Elements are components of an HTML file, including anchors, paragraphs, tables, forms, lists, images, and the like.\r\n<br/><br/>\r\nTags, or markups, represent the element in an HTML file. These are what we also include in our HTML file. \r\n<br/><br/>\r\nEach tag has its instruction to inform HTML what to do with it. It is formed by enclosing the tag name with angle brackets.', 1, 'HTML Lesson 2.png', 1, 0),
(3, 'Lesson 3 What is Paired Tags?', 'Paired tag consists of a start tag (also called an opening tag) and an end tag (also called a closing tag). \r\n<br/><br/>\r\nMost HTML tags are paired tags. The start tag marks the beginning of a section that is formed using a left-angle bracket, the tag name, and a right-angle bracket. \r\n<br/><br/>\r\nThe closing tag determines the end of a section created using a left-angle bracket, a slash, the tag name, and a right-angle bracket.', 1, 'HTML Lesson 3.png', 1, 0),
(4, 'Lesson 4 What are empty tags?', 'Empty tags are tags that do not have an end or closing tag. \r\n<br/><br/>\r\nEmpty tags are formed using a left-angle bracket, the tag name, a slash, and a right-angle bracket. Sometimes, the slash is omitted on empty tags.', 1, 'HTML Lesson 4.png', 1, 0),
(5, 'Lesson 5 What are attributes', 'Attributes in HTML are additional information or characteristic given to HTML tags.\r\n<br/><br/> \r\nIt is used to enhance or modify a tag and is always placed within the start tag after the tag name separated with space. \r\n<br/><br/>\r\nHTML tags could have more than one attribute. Space shall separate attributes if a tag contains more than one.', 1, 'HTML Lesson 5.png', 1, 0),
(6, 'Lesson 6 Hierarchical Structure', 'Tags are structured in HTML with the hierarchy to be readable by developers and executed and displayed well by browsers. The document structure of an HTML file follows the first in, last out (FILO) rule, which means that the tag that starts first shall be the tag that ends last.\r\n<br/><br/>\r\nAs we could see, the html tag acts as the root tag or the outermost tag. In an HTML file, it is suggested to have only one root tag: the html tag. The head and body tags act as the children tags of the HTML tag. \r\n<br/><br/>\r\nOn the other hand, both tags are considered the parent tag of elements inside them. The title tag is the child of the head tag and the p tag is the child of the body tag. Tags in HTML follow the parent-child relationship to identify its hierarchy', 1, 'HTML Lesson 6.png', 2, 0),
(7, 'Lesson 7 Tags used in HTMLsyntax', 'In HTML, we have the core HTML tags that define mostly of the document structure. Those tags are the html, head, and body tags. The html Tag The html tag is a paired tag which indicates that the document is an HTML file. With its start and an end tag, it indicates the beginning and the end of an HTML file.\r\n<br/><br/>\r\nThe head Tag The head tag holds information about the document and is generally not displayed. Some elements can be placed within the head tag such as link, meta, title, script, base, and style which specify the document&apos;s metadata. \r\n<br/><br/>\r\nThe body Tag The body tag contains all other tags and delimits the body section of the web pages. This section is the visible section when web pages are executed in a browser.', 1, 'HTML Lesson 7.png', 2, 0),
(84, 'Lesson 1 What is CSS', 'Cascading Style Sheet (CSS) is a design or a style language intended to use\r\nfor creating presentable and attractive websites.\r\n<br/><br/>\r\nUnderstanding of HTML and CSS are the foundation of being a great Web\r\nDeveloper and Web Designer. Therefore, it is a must skill for every IT student and\r\nprofessional. Moreover, once they understand the basics of HTML and CSS, they can\r\neasily understand other related languages like JavaScript and PHP and their\r\nframeworks like the LaravelPHP, Bootstrap, and JQuery.\r\n<br/><br/>\r\nIn June 1999, CSS3, the current and latest version of CSS, became the recommendation of\r\nW3C, and nowadays, it is the widely used style language over the web.\r\n\r\n', 2, 'CSS Lesson 1.png', 1, 0),
(85, 'Lesson 2 CSS Selectors', 'The CSS syntax is composed of a set of rules. These rules consist of three\ndifferent parts: the selector, property, and value.\n<br/><br/>\nA selector represents an HTML tag that the style will be applied. It could be\nany tag like a paragraph tag <-p-> or a heading tag <-h1->.\n<br/><br/>\nA property specifies what style to add to an HTML element. They could be\na color, alignment, or a border.\n<br/><br/>\nValues are given to a property. For example, a color property can have a value\nof either white or black.\n', 2, 'CSS Lesson 2.png', 1, 0),
(86, 'Lesson 3 Type Selector', 'Type Selector - This type of selector is for selecting a specific HTML tag.\r\n<br/><br/>\r\nFor example, selecting an &lt;h1&gt; tag and changing its color to blue. Using this type of selector means all of the &lt;h1&gt; tags from the document will be\r\ncolored blue, even the newly added &lt;h1&gt; tags.\r\n', 2, 'CSS Lesson 3.png', 1, 0),
(23, 'Lesson 23 Nesting Ordered and Unordered Lists', 'Nesting an ordered list within an unordered list is possible and vice versa. The\r\nimportant thing is you must start and end each tag correctly.\r\n<br/><br/>\r\nAs you see, the ol tags use its default type no matter what level it is on the\r\nlist. On the other hand, the ul tags use different types of bullets depending on the level of the list.\r\n', 1, 'HTML Lesson 23.png', 5, 0),
(22, 'Lesson 22 Unordered Lists', 'Unordered lists or bulleted lists may display contents without a sequence. It\r\npresents its list with bullets. The default used bullet is a shaded circle or disc. The ul tag displays an unordered list with list items using the li tag.\r\n<br/><br/>\r\nTo change the type of bullet used by the ul tag, add the type attribute with the\r\ncorresponding value. The values allowed for the type attribute are disc (default),\r\ncircle (without a shade), square (shaded), and none (no bullets).\r\n', 1, 'HTML Lesson 22.png', 5, 0),
(24, 'Lesson 24  Description Lists', 'The description list is used to provide a list of terms with a corresponding\r\ndefinition. There are three tags used in the description lists: the dl tag to define a description list, the dt tag to define a description term, and the dd tag to define a description definition.\r\n', 1, 'HTML Lesson 24.png', 5, 0),
(25, 'Lesson 25 HTML Forms', 'The HTML forms use different elements to accommodate different ways of\r\ninputting in a form. This lesson will discuss each element and its use in a form, such as radio buttons, combo boxes, checkboxes, etc.\r\n<br/><br/>\r\nTo contain all form elements, we use its unique tag, the <form> tag. All form\r\nelements should be within the <form> tag to include its data to the server. Some of\r\nthe attributes we use in a <form> tag are:\r\n<br/><br/>\r\n1. method - method attribute accepts either of two values, POST or GET. It specifies the type of method of how the form\'s data will be sent to the server. The GET method transfers data to the URL. Meanwhile, the POST method transfers data\r\nusing the HTTP. Data transferred using the POST method are hidden from the\r\nuser, of which it is advisable to be used when dealing with sensitive information.\r\n<br/><br/>\r\n2. action - it sets the URL to which the data will be sent. Often, the action\r\nattribute is set to a PHP file that would process the data.\r\n<br/><br/>\r\n1. &lt;input&gt; - input elements set different input methods from a simple text field, an email text field, a color picker, and more.\r\n<br/>\r\n2. &lt;label&gt; - labels display texts for form elements.\r\n<br/>\r\n3. &lt;select&gt; - select element is used to create combo boxes, a dropdown list of choices, in which the only one may be selected.\r\n<br/>\r\n4. &lt;textarea&gt; - &lt;textarea&gt; tag defines a multiline input, which are best for paragraph inputs.\r\n<br/>\r\n5. &lt;button&gt; - buttons are clickable elements. Buttons are best used together with\r\nJavaScript (see Unit 3).\r\n<br/>\r\n6. &lt;fieldset&gt; and &lt;legend&gt; - &lt;fieldset&gt; tag defines a group of interrelated\r\ncontents. <legend> tag displays the &lt;fieldset&gt; title.\r\n\r\n', 1, 'HTML Lesson 25.png', 5, 0),
(87, 'Lesson 4 Universal Selector ', 'The Universal selector matches all the HTML elements that you added on your HTML file. May it be a paragraph, button, or a heading tag. All styles will be applied in each HTML element.\r\n', 2, 'CSS Lesson 4.png', 1, 0),
(88, 'Lesson 5 Class Selector ', 'The class selector selects all HTML elements depending on the particular class attribute. Class selectors are formed by a period and selector name.\r\n', 2, 'CSS Lesson 5.png', 1, 0),
(89, 'Lesson 6 Different ways to add CSS', 'Inline CSS uses style attribute to add an inline style to a particular\r\nHTML element. Internal CSS can be found at the head section of a webpage\r\ninside the <style> tag. It is used to add style for a single HTML page.\r\nExternal CSS is a separate file with the extension of *.css. The\r\nexternal style sheet file referenced inside the <link> tag is found at the head\r\nsection of the webpage.\r\n', 2, 'CSS Lesson 6.png', 2, 0),
(90, 'Lesson 7 CSS Background Properties', 'The CSS background properties are used to control the background of an\r\nHTML element. A single HTML element can have multiple background properties, and\r\nthese are the following:\r\nbackground-color\r\nbackground-image\r\nbackground-repeat\r\nbackground-attachment\r\nbackground-position\r\nBackground\r\n\r\n The background-color property is used to set the\r\nbackground color of an HTML element.\r\nThe background-image property is used\r\nto insert a background image into an HTML element.\r\nUse the background-repeat\r\nproperty and repeat value if the background image is too small. \r\nUse the background-position\r\nproperty to determine the position of the background image. \r\nThe background-attachment\r\nproperty is used to specify if the background image is fixed or scrolls within the\r\nwebpage.\r\nA shorthand property defines all\r\nbackground properties in one property to have lesser code.\r\n', 2, 'CSS Lesson 7.png', 2, 0),
(91, 'Lesson 8 Text Properties', 'The CSS text and font properties allow the formatting of HTML text and font\r\nelements. These may customize the font color, the font style, alignment, and many\r\nmore. Below is the list of various text and font properties:\r\ncolor - The color property specifies the color of a text\r\ndirection - The direction property is used to change the\r\ndirection of a text. Right to the left (rtl) and Left to the right (ltr) are the two\r\npossible values.\r\nletter-spacing - The letter-spacing property allows us to\r\nhave specified space between characters. Use normal value or number value\r\nto set the space.\r\ntext-indent - The text-indent property specifies the\r\nindention of a text. It is mostly used for paragraph tags <p>.\r\ntext-align - The text-align property is used to change the\r\nalignment of a text. Example values are left, right, center, and justify.\r\ntext-decoration - The text-decoration property changes\r\nthe decoration of a text. Example values are none, underline, overline, linethrough, and blink.\r\ntext-transform - The text-transform property specifies the\r\ntext case of a text. Example values are none, capitalize, uppercase, and\r\nlowercase.\r\nwhite-space - The white-space property allows the text to\r\nhave white spaces. Example values are normal, pre, and nowrap.\r\ntext-shadow - The text-shadow property sets the shadow of\r\na text. Note that not all browsers support this property.\r\n', 2, 'CSS Lesson 8.png', 2, 0),
(92, 'Lesson 9 Font Properties', 'The font-family Property - The font-family property specifies the font face\r\nof a text. There are two kinds of font-family names. First is the generic family,\r\nwhich is a group of fonts with a similar class. Typical generic font families\r\ninclude serif, sans-serif, and monospace. Second is a specific font family\r\nsuch as Times New Roman, Arial, and a lot more.\r\nThe font-style Property - The font-style property defines the font style of\r\na text. This property is commonly used to italicize a text. Example values are\r\nnormal, italic, and oblique.\r\nThe font-variant Property - The font-variant property is used to set the\r\nfont-variant of a text. Example values are normal and small-caps.\r\nThe font-weight Property - The font-variant controls how bold a text is.\r\nExample values are normal, bold, bolder, lighter, 100, 200, and 300.\r\nThe font-size Property - The font-variant property defines the size of a\r\ntext. Example values are xx-small, x-small, small, medium, large, xx-large, in\r\npixels, and percentage.\r\n\r\nThe CSS Font Shorthand - A shorthand property defines all font properties\r\nin one property to have lesser code.\r\n', 2, 'CSS Lesson 9.png', 2, 0),
(93, 'Lesson 10 Image Properties', 'People love to visualize rather than reading alone. Images help to give a deep\r\nunderstanding of a story or content. Hence, pictures on websites deliver an immersive\r\nexperience to the visitors. CSS provides different image properties to customize and\r\ncontrol the appearance of the images.\r\nThe border Property - The border property is used to define the border width\r\nof an image. Specify values in length or percentage.\r\nThe height Property - The height property is used to change the height of\r\nan image. Specify values in length or percentage.\r\nThe width Property - The width property is used to change the width of an\r\nimage. Specify values in length or percentage\r\n', 2, 'CSS Lesson 10.png', 2, 0),
(94, 'Lesson 11  CSS Position :Static', 'Designing and customizing a website is not limited to changing backgrounds, styling\r\nfonts, and adding images. When developing a website, one of the crucial things to\r\nlearn is to layout the webpage which means, to decide the placement of the HTML\r\nelements.\r\n            The position property specifies which type of position is used for an HTML\r\nelement.\r\nThe position: static Property - The static position is the default position\r\nof an HTML element. Static positioning places the HTML elements\r\naccording to the normal flow of the webpage\r\n', 2, 'CSS Lesson 11.png', 3, 0),
(95, 'Lesson 12 CSS property :relative', 'The position: relative Property – Relative positioning places the HTML\r\nelements close to where it usually appears. Additionally, it allows us to change the place of an HTML element by defining the top, right, button, and\r\nleft an HTML element. Take note: changing the position of an element using\r\na relative position does not disturb the other elements.\r\n', 2, 'CSS Lesson 12.png', 3, 0),
(96, 'Lesson 13 CSS property: absolute', 'The position: absolute Property - The absolute position removes the\r\nHTML element from the document flow while other elements will render as\r\nif it does not exist. It also enables the placement of an HTML element using\r\nthe top, right, button, and left. However, changing the position of an element\r\nusing the absolute position initially disturb the position of other elements\r\n', 2, 'CSS Lesson 13.png', 3, 0),
(97, 'Lesson 14 CSS position property: fixed', 'the position: fixed Property - The fixed position moves the HTML\r\nelements as it scrolls.\r\n', 2, 'CSS Lesson 14.png', 3, 0),
(98, 'Lesson 15 CSS Display Property', 'The display Property - The display property determines how HTML\r\nelements are going to be placed on a webpage. The default HTML display value is\r\nblock or inline.\r\nBlock level elements are the any HTML elements that uses the full width of a\r\npage. A block level element occupies the entire space and always begin on a new\r\nline. These are some examples of block level elements.\r\nThe inline level elements are the any HTML elements that do not force a\r\nnew line and only occupy space as needed. These are some examples of inline level\r\n', 2, 'CSS Lesson 15.png', 3, 0),
(99, 'Lesson 16  CSS Box Model', 'Everything in CSS is a box. Whether it is a button, image, or text, all HTML\r\nelements have a box model. Refer to the image below for the illustration of a box\r\nmodel. The box model consists of content, margin, padding, and a border.\r\n', 2, 'CSS Lesson 16.png', 4, 0),
(100, 'Lesson 17 Padding Property', 'The padding Property - The padding property set how much space should appear\r\ninside the border and around the content of an HTML element.\r\n', 2, 'CSS Lesson 17.png', 4, 0),
(101, 'Lesson 18 Border Property', 'The border Property - The border property specifies the outer edge of an HTML\r\nelement. Modify the border of an element using its three properties:\r\nThe border-color sets the color of the border.\r\nThe border-style sets the style of the border. Example values are solid,\r\ndashed, double, and dotted.\r\nThe border-width sets width of a border.\r\n', 1, 'CSS Lesson 18.png', 4, 0),
(102, 'Lesson 19 Margin Property', 'The margin Property - The margin property sets how much space should appear\r\noutside the border. Margin is usually used to specify space between the elements.\r\n', 2, 'CSS Lesson 19.png', 4, 0),
(103, 'Lesson 20 CSS Lists', 'The list-style-type property specifies the type of list item marker.\r\nThe list-style-type property can have a value like circle, square, upper-roman and lower-alpha\r\n', 2, 'CSS Lesson 20.png', 4, 0),
(104, 'Lesson 21 CSS comments', 'Comments are used to explain the code, and may help when you edit the source code at a later date\r\nA CSS comment is placed inside the <style> element, and starts with /* and ends with */:\r\n', 2, 'CSS Lesson 21.png', 5, 0),
(105, 'Lesson 22 CSS Align Elements', 'Setting the width of the element will prevent it from stretching out to the edges of its container.\r\n            The element will then take up the specified width, and the remaining space will be split equally between the two margins:\r\nTo horizontally center a block element (like <div>), use margin: auto;\r\nTo just center the text inside an element, use text-align: center;\r\n', 2, 'CSS Lesson 22.png', 5, 0),
(106, 'Lesson 23 CSS Opacity', 'he opacity property specifies the opacity/transparency of an element. The opacity property can take a value from 0.0 - 1.0. The lower the value, the more transparent:\r\nThe opacity property is often used together with the :hover selector to change the opacity on mouse-over:\r\n', 2, 'CSS Lesson 23.png', 5, 0),
(107, 'Lesson 24 CSS Gradient Backgrounds', 'CSS gradients let you display smooth transitions between two or more specified colors. \r\nCSS defines three types of gradients:\r\nLinear Gradients (goes down/up/left/right/diagonally)\r\nRadial Gradients (defined by their center)\r\nConic Gradients (rotated around a center point)\r\n', 2, 'CSS Lesson 24.png', 5, 0),
(108, 'Lesson 25 CSS Colors', 'CSS supports 140+ color names, HEX values, RGB values, RGBA values, HSL values, HSLA values, and opacity.\r\nRGBA color values are an extension of RGB color values with an alpha channel - which specifies the opacity for a color.\r\n            HSL stands for Hue, Saturation and Lightness.\r\nAn HSL color value is specified with: hsl(hue, saturation, lightness).\r\nHSLA color values are an extension of HSL color values with an alpha channel - which specifies the opacity for a color.\r\n', 2, 'CSS Lesson 25.png', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `progresses`
--

DROP TABLE IF EXISTS `progresses`;
CREATE TABLE IF NOT EXISTS `progresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `is_done` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answers` longtext NOT NULL,
  `right_answer` varchar(255) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `question`, `answers`, `right_answer`, `lesson_id`) VALUES
(1, 'What does HTML stand for?', 'a) HyperText Markup Language\r\n<br/><br/>\r\nb) High-Tech Modern Language\r\n<br/><br/>\r\nc) Hypertext Markdown Language\r\n<br/><br/>\r\nd) Hyperlink Text Management Language\r\n', 'a', 5),
(2, 'Which file extensions are commonly used for saving HTML documents?', 'a) .xml, .json, .css\r\n<br/><br/>\r\nb) .html, .htm, .js\r\n<br/><br/>\r\nc) .php, .asp, .jpg\r\n<br/><br/>\r\nd) .txt, .doc, .pdf\r\n', 'b', 5),
(3, 'What is the primary purpose of HTML in web development?', 'a) Creating databases\r\n<br/><br/>\r\nb) Defining website layout\r\n<br/><br/>\r\nc) Styling web pages\r\n<br/><br/>\r\nd) Processing user input\r\n', 'b', 5),
(4, 'What are HTML elements?', 'a) Programming languages\r\n<br/><br/>\r\nb) Components of a web page\r\n<br/><br/>\r\nc) Types of web browsers\r\n<br/><br/>\r\nd) Web hosting providers\r\n', 'b', 5),
(5, 'How are HTML tags or markups used in web development?', 'a) To fix bugs in code\r\n<br/><br/>\r\nb) To enclose elements and provide instructions\r\n<br/><br/>\r\nc) To create animations\r\n<br/><br/>\r\nd) To secure websites\r\n', 'b', 5),
(6, 'Explain what a paired tag is in HTML.', 'a) A tag used for paired programming\r\n<br/><br/>\r\nb) A tag with multiple attributes\r\n<br/><br/>\r\nc) A tag with no attributes\r\n<br/><br/>\r\nd) A tag with both start and end tags\r\n', 'd', 5),
(7, 'How is a start tag formed in HTML?', 'a) With a left-angle bracket and a slash\r\n<br/><br/>\r\nb) With a right-angle bracket\r\n<br/><br/>\r\nc) With a left-angle bracket, tag name, and right-angle bracket\r\n<br/><br/>\r\nd) With a semicolon and tag name\r\n\r\n', 'c', 5),
(8, 'How is an end tag formed in HTML?', 'a) With a left-angle bracket, tag name, and right-angle bracket\r\n<br/><br/>\r\nb) With a right-angle bracket\r\n<br/><br/>\r\nc) With a left-angle bracket and a slash before the tag name\r\n<br/><br/>\r\nd) With a semicolon and tag name\r\n', 'c', 5),
(9, 'Give an example of a paired HTML tag.', 'a) &lt;img&gt;\r\n<br/><br/>\r\nb) &lt;div&gt;\r\n<br/><br/>\r\nc) &lt;link&gt;\r\n<br/><br/>\r\nd) &lt;br&gt;\r\n', 'b', 5),
(10, 'What are empty tags in HTML?', 'a) Tags that contain a lot of content\r\n<br/><br/>\r\nb) Tags without a start tag\r\n<br/><br/>\r\nc) Tags without an end tag\r\n<br/><br/>\r\nd) Tags used for paragraphs\r\n', 'c', 5),
(22, 'Which delimiter is used for comments in HTML?', 'a) &lt;&gt;<br/><br/>b) {}<br/><br/>c) ()<br/><br/>d) &lt;!-- --&gt;', 'd', 10),
(21, 'What is the purpose of comments in HTML?', 'a) Display content in the browser<br/><br/>b) Create headings<br/><br/>c) Document HTML code for programmers<br/><br/>d) Format text', 'c', 10),
(19, 'What is the purpose of the head tag in HTML?', 'a) Display content<br/><br/>b) Define the document\'s metadata<br/><br/>c) Create headings<br/><br/>d) Format text', 'b', 10),
(20, 'Which tag marks the beginning and end of an HTML file?', 'a) head<br/><br/>b) body<br/><br/>c) html<br/><br/>d) p', 'c', 10),
(18, 'According to the FILO rule, which tag should end last in an HTML document?', 'a) html<br/><br/>b) head<br/><br/>c) body<br/><br/>d) p', 'a', 10),
(16, 'What is the root tag in an HTML document?', 'a) head<br/><br/>b) body<br/><br/>c) p<br/><br/>d) html', 'd', 10),
(17, 'Which tag acts as the parent of the title tag?', 'a) html<br/><br/>b) head<br/><br/>c) body<br/><br/>d) p', 'b', 10),
(23, 'Which heading tag defines the most crucial heading in an HTML document?', 'a) h1<br/><br/>b) h2<br/><br/>c) h3<br/><br/>d) h4', 'a', 10),
(24, 'Which heading tag defines the least important heading in an HTML document?', 'a) h1<br/><br/>b) h2<br/><br/>c) h5<br/><br/>d) h6', 'd', 10),
(25, 'What does the p tag create in HTML?', 'a) Lists<br/><br/>b) Images<br/><br/>c) Paragraphs<br/><br/>d) Links', 'c', 10),
(26, 'What does the br tag do in HTML?', 'a) Creates a new paragraph<br/><br/>b) Displays a breaking space<br/><br/>c) Inserts a line comment<br/><br/>d) Defines a hyperlink', 'b', 15),
(27, 'When should you use the br tag?', 'a) To create a new paragraph<br/><br/>b) To add a line comment<br/><br/>c) To insert an image<br/><br/>d) To create a new line without a new paragraph', 'd', 15),
(28, 'Which HTML tag is used to display text in a bold format?', 'a) <strong><br/><br/>b) <i><br/><br/>c) <em><br/><br/>d) <b>', 'd', 15),
(29, 'What does the em tag signify in HTML?', 'a) Italic text<br/><br/>b) Strong emphasis<br/><br/>c) Underlined text<br/><br/>d) Highlighted text', 'a', 15),
(30, 'What is the purpose of the mark tag in HTML?', 'a) Displays text in italics<br/><br/>b) Deletes a part of the text<br/><br/>c) Highlights text<br/><br/>d) Inserts text within a paragraph', 'c', 15),
(31, 'What does the a tag create in HTML?', 'a) A hyperlink<br/><br/>b) A line break<br/><br/>c) A comment<br/><br/>d) An image', 'a', 15),
(32, 'Which attribute is necessary to add to an a tag to specify the URL it should navigate to?', 'a) target<br/><br/>b) alt<br/><br/>c) href<br/><br/>d) source', 'c', 15),
(33, 'Which value of the target attribute opens the link in a new tab?', 'a) _self<br/><br/>b) _blank<br/><br/>c) _parent<br/><br/>d) _top', 'b', 15),
(34, 'What does the img tag describe in HTML?', 'a) A link<br/><br/>b) A paragraph<br/><br/>c) An image<br/><br/>d) A table', 'c', 15),
(35, 'Which attribute specifies the location of the image to be displayed?', 'a) alt<br/><br/>b) title<br/><br/>c) width<br/><br/>d) src', 'd', 15),
(36, 'Which HTML tag is used to create a table?', 'a) &lt;table&gt;<br/><br/>b) &lt;tr&gt;<br/><br/>c) &lt;th&gt;<br/><br/>d) &lt;td&gt;', 'a', 20),
(37, 'What is the purpose of the caption tag in an HTML table?', 'a) Add table rows<br/><br/>b) Add table columns<br/><br/>c) Add a title or description to the table<br/><br/>d) Add header cells', 'c', 20),
(38, 'Which HTML tag is used to add a new table row?', 'a) &lt;t&gt;<br/><br/>b) &lt;td&gt;<br/><br/>c) &lt;th&gt;<br/><br/>d) &lt;table&gt;', 'a', 20),
(39, 'What should you ensure when adding multiple rows in an HTML table?', 'a) Each row is properly closed before starting a new one<br/><br/>b) Rows have the same content<br/><br/>c) Rows are indented correctly<br/><br/>d) Rows contain only headers', 'a', 20),
(40, 'Which HTML tag is used to add columns in an HTML table?', 'a) td<br/><br/>b) tr<br/><br/>c) th<br/><br/>d) table', 'a', 20),
(41, 'What is the purpose of the th tag in an HTML table?', 'a) Add table rows<br/><br/>b) Add table columns<br/><br/>c) Add header cells<br/><br/>d) Add a title or description to the table', 'c', 20),
(42, 'Which attribute spans a cell in a specified number of rows?', 'a) rowspan<br/><br/>b) colspan<br/><br/>c) cellspan<br/><br/>d) headerspan', 'a', 20),
(43, 'Which attribute spans a cell in a specified number of columns?', 'a) rowspan<br/><br/>b) colspan<br/><br/>c) cellspan<br/><br/>d) headerspan', 'b', 20),
(44, 'What does adding a caption to an HTML table provide?', 'a) Adds additional rows<br/><br/>b) Adds a title to a specific column<br/><br/>c) Adds a title or description to the entire table<br/><br/>d) Adds a background color to the table', 'c', 20),
(45, 'Which HTML tag is used to add a caption to a table?', 'a) caption<br/><br/>b) title<br/><br/>c) description<br/><br/>d) label', 'a', 20),
(72, 'What does the method attribute in the &lt;form&gt; tag specify?', 'a) The color scheme of the form<br/><br/>b) The data transmission method (POST or GET)<br/><br/>c) The form\'s title<br/><br/>d) The form\'s width and height', 'b', 25),
(71, 'What HTML tag is used to contain all form elements in an HTML form?', 'a) &lt;input&gt;<br/><br/>b) &lt;label&gt;<br/><br/>c) &lt;form&gt;<br/><br/>d) &lt;select&gt;', 'c', 25),
(69, 'Which HTML tag is used to define a description list?', 'a) &lt;dl&gt;<br/><br/>b) &lt;dt&gt;<br/><br/>c) &lt;dd&gt;<br/><br/>d) &lt;list&gt;', 'a', 25),
(70, 'What is the purpose of the &lt;dt&gt; tag in a description list?', 'a) It defines a description list<br/><br/>b) It defines a description term<br/><br/>c) It defines a description definition<br/><br/>d) It defines a bullet point', 'b', 25),
(68, 'Is it possible to nest an ordered list within an unordered list or vice versa?', 'a) Yes, it\'s possible<br/><br/>b) No, it\'s not possible<br/><br/>c) Only if you use a different type of bullet<br/><br/>d) Only if you use a different type of numbering', 'a', 25),
(65, 'Which attribute is used to specify the URL to which form data will be sent?', 'a) action<br/><br/>b) method<br/><br/>c) type<br/><br/>d) href', 'a', 25),
(67, 'What is the default bullet used in unordered lists?', 'a) Numbers<br/><br/>b) Letters<br/><br/>c) Shaded circle<br/><br/>d) Square', 'c', 25),
(66, 'What HTML tag is used to create an unordered list?', 'a) &lt;ul&gt;<br/><br/>b) &lt;ol&gt;<br/><br/>c) &lt;li&gt;<br/><br/>d) &lt;dl&gt;', 'a', 25),
(64, 'What HTML tag is used to create an ordered list?', 'a) &lt;ol&gt;<br/><br/>b) &lt;ul&gt;<br/><br/>c) &lt;li&gt;<br/><br/>d) &lt;dl&gt;', 'a', 25),
(73, 'Which HTML tag is used to create a dropdown list of choices in a form?', 'a) &lt;input&gt;<br/><br/>b) &lt;label&gt;<br/><br/>c) &lt;select&gt;<br/><br/>d) &lt;textarea&gt;', 'c', 25),
(79, 'What does CSS mean?', 'A.Cascading Style Sheets\nB.Cascading Sheet Sheets\nC.Combination of Style Sheets\nD.Corolla Stigma Signs', 'A', 88),
(80, 'Which of the following is the definition of Selector?', 'A.is composed of a set of rules.\nB.consist of three different parts\nC.represents an HTML tag that the style will be applied.\nD.all of the above', 'D', 88),
(81, 'This is a type of selector for selecting a specific tag.', 'A.Universal Selector\nB.Type Selector\nC.ID Selector\nD.Class Selector', 'B', 88),
(82, 'This is a type of selector for selecting all elements.', 'A.Universal Selector\nB.Type Selector\nC.ID Selector\nD.Class Selector', 'A', 88),
(83, 'This is a type of selector for selecting a class attribute.', 'A.Universal Selector\nB.Type Selector\nC.ID Selector\nD.Class Selector', 'D', 88),
(84, 'How to add CSS in your file?', 'A. Inline\nB. Internal\nC. External\nD. all of the above', 'D', 93),
(85, 'is used to set the background color of an HTML element.', 'A. background-color\nB. background-position\nC. background-image\nD. background-attachment', 'A', 93),
(86, 'is used to specify if the background image is fixed or scrolls within the webpage.', 'A. background-color\nB. background-position\nC. background-image\nD. background-attachment', 'D', 93),
(87, 'specifies the indention of a text. It is mostly used for paragraph tags', 'A. text-indent\nB. letter-spacing\nC. font-style\nD. font-variant', 'A', 93),
(88, 'controls how bold a text is.', 'A. text-indent\nB. font-weight\nC. font-style\nD. font-variant', 'B', 93),
(89, 'specifies which type of position is used for an HTML element.', 'A. position property\nB. position: static\nC. position: relative\nD. position: absolute', 'A', 98),
(90, 'places the HTML elements close to where it usually appears.', 'A. position property\nB. position: static\nC. position: relative\nD. position: absolute', 'C', 98),
(91, 'enables the placement of an HTML element using the top, right, bottom, and left.', 'A. position property\nB. position: static\nC. position: relative\nD. position: absolute', 'D', 98),
(92, 'moves the HTML elements as it scrolls.', 'A. position: fixed\nB. position: static\nC. position: relative\nD. position: absolute', 'A', 98),
(93, 'determines how HTML elements are going to be placed on a webpage.', 'A. position: fixed\nB. position: static\nC. position: relative\nD. display property', 'D', 98),
(94, 'Whether it is a button, image, or text, all HTML elements have a _______.', 'A. structured model\nB. box model\nC. DOM structure\nD. BOM structure', 'B', 103),
(95, 'Set how much space should appear inside the border', 'A. Padding Property\nB. Border Property\nC. Margin Property\nD. Background Property', 'A', 103),
(96, 'Sets how much space should appear outside the border.', 'A. Padding Property\nB. Border Property\nC. Margin Property\nD. Background Property', 'C', 103),
(97, 'Specifies the outer edge of an HTML element.', 'A. Padding Property\nB. Border Property\nC. Margin Property\nD. Background Property', 'B', 103),
(98, 'Consists of content, margin, padding, and a border.', 'A. structured model\nB. box model\nC. DOM structure\nD. BOM structure', 'B', 103),
(99, 'Used to explain the code', 'A. CSS Comments\nB. CSS Align Elements\nC. CSS Opacity\nD. CSS Gradient Backgrounds', 'A', 108),
(100, 'Can take a value from 0.0 - 1.0.', 'A. CSS Comments\nB. CSS Align Elements\nC. CSS Opacity\nD. CSS Gradient Backgrounds', 'C', 108),
(101, 'Let you display smooth transitions', 'A. CSS Comments\nB. CSS Align Elements\nC. CSS Opacity\nD. CSS Gradient Backgrounds', 'D', 108),
(102, 'Extension of RGB color values', 'A. RGBA\nB. HSL\nC. Hexadecimal\nD. HSLA', 'A', 108),
(103, 'An extension of HSL color values', 'A. RGBA\nB. HSL\nC. Hexadecimal\nD. HSLA', 'D', 108),
(104, 'test1234567890', 'test', 'test', 0),
(111, 'test', 'test', 'test', 115),
(112, 'demo question', 'a.) demo answer <br/><br/>\r\nb.) demo answer <br/><br/>\r\nc.) demo answer <br/><br/>\r\nd.) demo answer <br/><br/>', 'b', 116);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'Unit 1'),
(2, 'Unit 2'),
(3, 'Unit 3'),
(4, 'Unit 4\r\n'),
(5, 'Unit 5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `place_of_birth`, `school`, `contact_info`, `password`, `is_admin`, `image`) VALUES
(3, 'admin', 'admin@admin.com', '', '', '', '$2y$10$UOplQNq7h4xxNDbT0dF63u8/p4uxE3lCcb70khNcdqOnbtqnyiYdC', 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
