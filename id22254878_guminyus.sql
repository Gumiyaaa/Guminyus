-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2024 at 05:32 PM
-- Server version: 10.5.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22254878_guminyus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(3, 'Gumilang', '$2y$10$58hF.YSepFy01XWR9VIC3O9wEHQ.uqfJwAF.h3YAoeaaACmnHCJfO', '220605110108@student.uin-malang.ac.id', 1, '2024-06-13 05:01:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(8, 'Anime', 'Guminyus Anime adalah portal berita online yang khusus mengulas dunia anime, memberikan informasi terkini, terpercaya, dan mendalam tentang berbagai aspek dari anime. Kami hadir untuk memenuhi kebutuhan para penggemar anime di Indonesia dengan menyajikan berita terbaru, ulasan mendalam, dan artikel menarik seputar anime.', '2024-06-08 04:16:38', NULL, 1),
(9, 'Olahraga', 'Guminyus Olahraga adalah portal berita online yang menyediakan informasi terkini, terpercaya, dan mendalam tentang dunia olahraga. Kami hadir untuk memenuhi kebutuhan para penggemar olahraga di Indonesia dengan menyajikan berita terbaru, analisis tajam, dan liputan eksklusif dari berbagai cabang olahraga.', '2024-06-08 05:06:21', NULL, 1),
(10, 'Politik', 'Guminyus Politik adalah portal berita online yang menyediakan informasi terkini, terpercaya, dan mendalam tentang dunia politik. Kami hadir untuk memenuhi kebutuhan masyarakat yang ingin mendapatkan berita dan analisis politik yang akurat dan tajam, baik di tingkat nasional maupun internasional.', '2024-06-08 05:39:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1),
(4, '13', 'Gumilang Atmaja', 'yangpunyaguminyus@gmail.com', 'Beritanya cukup memuaskan', '2024-06-08 04:53:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'Tentang Guminyus', '<p style=\"text-align: center;\"><strong><font face=\"Times New Roman\">Selamat datang di Guminyus!</font></strong></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Guminyus adalah portal berita online yang berdedikasi untuk menyajikan informasi terkini, terpercaya, dan akurat kepada pembaca di seluruh Indonesia. Kami berkomitmen untuk memberikan liputan berita yang menyeluruh, mencakup berbagai topik seperti politik, ekonomi, teknologi, hiburan, olahraga, dan masih banyak lagi.&nbsp;Guminyus didukung oleh tim jurnalis profesional yang berpengalaman dan berdedikasi. Mereka bekerja keras untuk memberikan laporan yang akurat dan bermanfaat bagi masyarakat.</font></p>', '2018-06-30 18:01:03', '2024-06-08 04:14:58'),
(2, 'contactus', 'Detail Kontak', '<p><b>Alamat:&nbsp; </b>Joyo Raharjo Gang V, Merjosari , Malang<br></p><p><b>Nomor Telepon : </b>+087823637155</p><p><b>Email : Guminyus@gmail.com</b></p>', '2018-06-30 18:01:36', '2024-06-08 04:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(13, '\"Legenda Nusantara: Petualangan Arjuna\" Sukses Menjadi Anime Terpopuler di Indonesia', 8, 10, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Jakarta, 8 Juni 2024 </b>– Dunia anime Indonesia kembali bergemuruh dengan hadirnya Legenda Nusantara: Petualangan Arjuna. Anime ini berhasil mencuri perhatian para penggemar dengan cerita yang memukau dan animasi yang memanjakan mata. Dirilis pada awal tahun ini, anime produksi lokal ini kini merajai berbagai platform streaming dan menjadi topik hangat di kalangan komunitas anime. Legenda Nusantara: Petualangan Arjuna mengisahkan petualangan seorang pemuda bernama Arjuna yang memiliki kekuatan luar biasa. Terinspirasi dari kisah-kisah epik nusantara, anime ini menggabungkan elemen-elemen budaya lokal dengan sentuhan modern. Arjuna bersama teman-temannya berjuang melawan kekuatan jahat yang mengancam kedamaian Nusantara.<br></font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\">Cerita yang kaya dengan unsur budaya Indonesia, seperti mitologi, tarian tradisional, dan musik gamelan, menjadi daya tarik utama dari anime ini. Para kreator berhasil mengemas cerita tradisional menjadi sesuatu yang segar dan menarik bagi penonton muda. Anime ini diproduksi oleh Studio Garuda, sebuah studio animasi yang berbasis di Jakarta. Dipimpin oleh sutradara muda berbakat, Aditya Pratama, tim kreatif Studio Garuda terdiri dari animator-animator handal yang sebelumnya telah berpengalaman dalam berbagai proyek animasi internasional.</font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\">Dalam sebuah wawancara eksklusif dengan Guminyus Anime, Aditya mengungkapkan, Kami ingin membawa cerita-cerita lokal ke level internasional. Melalui Legenda Nusantara: Petualangan Arjuna, kami berharap bisa menunjukkan kepada dunia bahwa Indonesia memiliki kekayaan budaya yang luar biasa dan tak kalah dengan negara lain dalam hal produksi anime.</font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify;\"><font face=\"Times New Roman\">Sejak penayangannya, Legenda Nusantara: Petualangan Arjuna telah menerima berbagai ulasan positif dari kritikus dan penggemar anime. Anime ini tidak hanya populer di Indonesia, tetapi juga mulai menarik perhatian penonton internasional. Beberapa platform streaming global telah menunjukkan minat untuk menayangkan anime ini di luar negeri. Tidak hanya sukses di layar kaca, merchandise resmi dari Legenda Nusantara: Petualangan Arjuna juga laris manis di pasaran. Mulai dari action figure, kaos, hingga poster, semua produk terkait anime ini diburu oleh para penggemar. Kesuksesan Legenda Nusantara: Petualangan Arjuna menjadi bukti bahwa industri anime nasional memiliki potensi besar untuk berkembang dan bersaing di kancah internasional. Dengan dukungan dari para penggemar dan kreator-kreator berbakat, masa depan anime Indonesia terlihat semakin cerah.</font></p>', '2024-06-08 04:51:39', '2024-06-08 04:52:31', 1, '\"Legenda-Nusantara:-Petualangan-Arjuna\"-Sukses-Menjadi-Anime-Terpopuler-di-Indonesia', 'a2e2bd0c1b0f513ed92cfdfddffd04b8.jpg'),
(14, 'Anime Baru dari Studio Sakura, Petualangan di Dunia Arcania, Menjadi Sensasi Global', 8, 11, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Tokyo, 8 Juni 2024</b> – Dunia anime internasional sedang digemparkan oleh rilis terbaru dari Studio Sakura, yaitu Petualangan di Dunia Arcania. Anime ini telah mencuri perhatian penggemar di seluruh dunia dengan cerita yang memikat dan animasi yang spektakuler. Sejak penayangan perdananya bulan lalu, Petualangan di Dunia Arcania langsung menjadi topik hangat di kalangan komunitas anime dan merajai berbagai platform streaming.<br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Petualangan di Dunia Arcania mengisahkan perjalanan seorang pemuda bernama Hiroshi yang tanpa sengaja masuk ke dunia sihir bernama Arcania. Di sana, ia bertemu dengan berbagai makhluk magis dan bergabung dengan sekelompok petualang untuk menyelamatkan dunia tersebut dari ancaman kegelapan. Dengan plot yang penuh dengan liku-liku dan karakter yang mendalam, anime ini berhasil menarik hati para penonton dari episode pertama.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Dikenal dengan kualitas animasinya yang luar biasa, Studio Sakura sekali lagi membuktikan keahliannya melalui Petualangan di Dunia Arcania. Setiap adegan, dari pertempuran epik hingga pemandangan alam Arcania yang memukau, digambarkan dengan detail yang menakjubkan. Para penggemar dan kritikus sama-sama memuji kualitas visual anime ini, menyebutnya sebagai salah satu karya terbaik dari studio tersebut. Sejak dirilis, Petualangan di Dunia Arcania telah menerima sambutan yang sangat positif dari penggemar dan kritikus anime di seluruh dunia. Ulasan-ulasan memuji cerita yang orisinal, pengembangan karakter yang kuat, serta animasi yang memanjakan mata. Banyak yang menyebut anime ini sebagai salah satu calon kuat untuk meraih berbagai penghargaan di tahun ini.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Tidak hanya populer di Jepang, Petualangan di Dunia Arcania juga telah menarik perhatian penonton internasional. Anime ini diterjemahkan ke berbagai bahasa dan tersedia di berbagai platform streaming global, memungkinkan penggemar di seluruh dunia untuk menikmati petualangan Hiroshi di Arcania. Kepopuleran anime ini juga memicu peningkatan minat terhadap budaya Jepang, terutama dalam hal seni dan animasi. Dengan cerita yang masih terus berkembang dan berbagai kejutan yang menanti, masa depan Petualangan di Dunia Arcania terlihat sangat cerah. Para penggemar dengan antusias menantikan setiap episode baru, sementara merchandise resmi dari anime ini laris manis di pasaran. Studio Sakura juga mengisyaratkan adanya kemungkinan adaptasi ke media lain, seperti film layar lebar atau video game.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Terus ikuti berita terbaru dan ulasan mendalam seputar anime internasional hanya di Guminyus Anime. Kami selalu menyajikan informasi terkini dan terpercaya untuk Anda.</font></p>', '2024-06-08 05:04:35', NULL, 1, 'Anime-Baru-dari-Studio-Sakura,-Petualangan-di-Dunia-Arcania,-Menjadi-Sensasi-Global', 'e40335ae31f2bb59f734e8ca10b08e42.jpg'),
(15, 'Timnas Indonesia Raih Kemenangan Bersejarah di Kejuaraan Dunia Sepak Bola', 9, 12, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Jakarta, 8 Juni 2024</b> – Dalam sebuah pencapaian yang menggetarkan seluruh bangsa, Tim Nasional Indonesia berhasil meraih kemenangan bersejarah di Kejuaraan Dunia Sepak Bola 2024 yang digelar di Qatar. Dengan semangat juang yang tinggi dan strategi permainan yang matang, Garuda Muda mengukir prestasi gemilang yang mengharumkan nama Indonesia di kancah internasional.&nbsp;</font><span style=\"font-family: &quot;Times New Roman&quot;;\">Perjalanan Timnas Indonesia menuju puncak kejuaraan tidaklah mudah. Dalam fase grup, Indonesia harus berhadapan dengan tim-tim tangguh seperti Brasil, Jerman, dan Korea Selatan. Namun, dengan kerja sama tim yang solid dan kepemimpinan kapten Arif Pratama, Timnas berhasil lolos dari grup dengan hasil yang mengesankan.</span></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Pada babak perempat final, Indonesia bertemu dengan Argentina, salah satu favorit juara. Dalam pertandingan yang dramatis, gol tunggal dari striker muda Budi Santoso di menit-menit akhir pertandingan memastikan kemenangan dan membawa Indonesia ke semifinal. Di babak semifinal, Timnas Indonesia menghadapi Prancis dan kembali menunjukkan performa luar biasa dengan kemenangan 2-1 melalui gol-gol yang dicetak oleh Ridho Firmansyah dan Andi Wicaksono.&nbsp;</font><span style=\"font-family: &quot;Times New Roman&quot;;\">Partai final mempertemukan Indonesia dengan Spanyol, sebuah tim yang dikenal dengan permainan tiki-taka yang memukau. Dalam pertandingan yang berlangsung sengit di Stadion Lusail Iconic, Qatar, Timnas Indonesia berhasil menunjukkan performa terbaiknya. Gol pembuka dari Budi Santoso di babak pertama memberikan keunggulan bagi Indonesia. Spanyol sempat menyamakan kedudukan di babak kedua, namun serangan balik cepat yang dipimpin oleh gelandang serang Hendra Wijaya berhasil mengunci kemenangan dengan skor akhir 2-1.</span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\"><br></span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Kemenangan ini tidak hanya dirayakan oleh para pemain dan staf tim, tetapi juga oleh seluruh rakyat Indonesia. Presiden Indonesia memberikan ucapan selamat secara langsung kepada tim di lapangan dan mengumumkan hari libur nasional untuk merayakan pencapaian bersejarah ini. Budi Santoso, yang mencetak gol penentu di final, dianugerahi sebagai pemain terbaik turnamen dan mendapat penghargaan Golden Boot sebagai top skor.&nbsp;</span><span style=\"font-family: &quot;Times New Roman&quot;;\">Kemenangan ini membawa dampak besar bagi sepak bola Indonesia. Banyak pihak yang berharap prestasi ini akan menjadi titik balik bagi perkembangan sepak bola tanah air. Beberapa klub top Eropa dikabarkan tertarik untuk merekrut pemain-pemain muda berbakat dari Timnas Indonesia. Selain itu, pemerintah berencana untuk meningkatkan investasi dalam fasilitas olahraga dan program pengembangan pemain muda di seluruh negeri.</span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\"><br></span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Dengan kemenangan ini, masa depan sepak bola Indonesia terlihat sangat cerah. Generasi muda mendapatkan inspirasi baru untuk mengejar impian mereka di dunia sepak bola. Kesuksesan ini juga diharapkan akan memotivasi para atlet dan penggemar olahraga lainnya untuk terus berprestasi dan mengharumkan nama bangsa di berbagai arena internasional.</span><br></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Terus ikuti berita terbaru dan ulasan mendalam seputar olahraga nasional hanya di Guminyus Olahraga. Kami selalu menyajikan informasi terkini dan terpercaya untuk Anda.</font></p><p style=\"text-align: justify; \"><br></p>', '2024-06-08 05:12:53', '2024-06-08 05:38:37', 1, 'Timnas-Indonesia-Raih-Kemenangan-Bersejarah-di-Kejuaraan-Dunia-Sepak-Bola', '4ee44b83247ba2a5dbad1eb8d7429a11.jpg'),
(16, 'Tim Basket Amerika Serikat Menorehkan Sejarah dengan Kemenangan di Olimpiade Paris 2024', 9, 13, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Paris, 8 Juni 2024</b> – Dalam sebuah penampilan yang mengukuhkan dominasi mereka di dunia basket, Tim Nasional Basket Amerika Serikat berhasil meraih medali emas di Olimpiade Paris 2024. Dengan kemenangan ini, tim AS menorehkan sejarah dengan memenangkan medali emas ke-17 dalam cabang olahraga basket di ajang Olimpiade. Sejak awal turnamen, tim AS sudah menunjukkan performa yang impresif. Dengan pemain bintang NBA seperti LeBron James, Kevin Durant, dan Stephen Curry yang kembali dari masa pensiun internasional, tim ini menunjukkan kekompakan dan strategi permainan yang luar biasa. Mereka mengalahkan lawan-lawannya dengan skor yang meyakinkan di babak penyisihan grup, termasuk kemenangan besar melawan tim-tim kuat seperti Spanyol, Serbia, dan Australia.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Partai final mempertemukan Tim Nasional Amerika Serikat dengan Prancis, yang merupakan tuan rumah Olimpiade. Pertandingan berlangsung di Accor Arena, Paris, dan dihadiri oleh ribuan penonton yang antusias. Dalam pertandingan yang berlangsung sengit, kedua tim saling berkejaran skor hingga menit-menit akhir. Tim AS, yang sempat tertinggal di kuarter ketiga, berhasil membalikkan keadaan melalui aksi gemilang dari Stephen Curry yang mencetak tiga poin krusial dan mempertahankan keunggulan hingga akhir pertandingan dengan skor 98-94.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">LeBron James, yang kembali bermain untuk tim nasional setelah absen di beberapa Olimpiade sebelumnya, memberikan kontribusi besar dengan performa all-around yang brilian. Stephen Curry, yang mencetak 30 poin di pertandingan final, dinobatkan sebagai MVP turnamen. \"Ini adalah momen yang sangat spesial bagi kami semua. Kami datang ke sini untuk memenangkan emas dan berhasil melakukannya,\" ujar Curry usai pertandingan. Kemenangan ini tidak hanya dirayakan di Amerika Serikat, tetapi juga mendapat perhatian besar dari seluruh dunia. Para penggemar basket dari berbagai negara memuji kualitas permainan dan semangat juang tim AS. Media internasional menyebut kemenangan ini sebagai salah satu pencapaian terbesar dalam sejarah Olimpiade modern.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Di sisi lain, keberhasilan ini juga membawa dampak positif bagi popularitas basket di seluruh dunia. Banyak negara yang berencana untuk meningkatkan program pelatihan dan pengembangan pemain muda mereka sebagai respon terhadap dominasi tim AS. Dengan kemenangan ini, masa depan basket dunia tampak semakin cerah. Generasi muda dari berbagai negara mendapatkan inspirasi untuk mengejar karir di dunia basket. Keberhasilan tim AS di Olimpiade Paris 2024 diharapkan akan memotivasi banyak atlet muda untuk terus berlatih dan berkompetisi di level tertinggi.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Terus ikuti berita terbaru dan ulasan mendalam seputar olahraga internasional hanya di Guminyus Olahraga. Kami selalu menyajikan informasi terkini dan terpercaya untuk Anda.</font></p>', '2024-06-08 05:18:19', '2024-06-08 05:19:10', 1, 'Tim-Basket-Amerika-Serikat-Menorehkan-Sejarah-dengan-Kemenangan-di-Olimpiade-Paris-2024', '029535262b648e923fbf69ac5695b074.jpg'),
(17, 'Konferensi Global di Geneva Berhasil Capai Kesepakatan untuk Mengatasi Perubahan Iklim', 10, 15, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Geneva, 8 Juni 2024 </b>– Dalam sebuah langkah bersejarah, pemimpin dari berbagai negara di dunia berhasil mencapai kesepakatan penting dalam Konferensi Global tentang Perubahan Iklim yang diadakan di Geneva, Swiss. Pertemuan yang berlangsung selama satu minggu ini menghasilkan \"Deklarasi Geneva\" yang berisi komitmen bersama untuk mengurangi emisi karbon dan mengatasi dampak perubahan iklim secara global.<br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Konferensi ini dihadiri oleh kepala negara dan pemerintahan dari lebih dari 190 negara, termasuk Amerika Serikat, Tiongkok, India, dan Uni Eropa. Dalam deklarasi yang dihasilkan, negara-negara peserta sepakat untuk mengambil tindakan konkret dalam upaya mengurangi emisi karbon hingga 50% pada tahun 2030 dan mencapai netralitas karbon pada tahun 2050. Presiden Amerika Serikat, Michelle Harper, dalam pidatonya menekankan pentingnya kerjasama global untuk menghadapi tantangan perubahan iklim. \"Ini adalah momen penting bagi dunia. Kita harus bertindak bersama dan segera untuk melindungi planet kita demi generasi mendatang,\" ujarnya.<br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Deklarasi Geneva mencakup sejumlah komitmen dan rencana aksi yang ambisius, termasuk:</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Investasi dalam Energi Terbarukan: Negara-negara peserta berkomitmen untuk meningkatkan investasi dalam energi terbarukan seperti tenaga surya, angin, dan hidroelektrik.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pengurangan Penggunaan Bahan Bakar Fosil: Negara-negara berjanji untuk mengurangi ketergantungan pada bahan bakar fosil dengan mengembangkan teknologi rendah emisi dan mempercepat transisi ke kendaraan listrik.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pelestarian Hutan dan Keanekaragaman Hayati: Deklarasi ini juga menekankan pentingnya pelestarian hutan dan keanekaragaman hayati sebagai upaya untuk menyerap karbon dan melindungi ekosistem.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pendanaan untuk Negara Berkembang : Negara-negara maju sepakat untuk menyediakan dana bantuan bagi negara-negara berkembang guna membantu mereka dalam menghadapi dampak perubahan iklim dan melaksanakan program-program mitigasi dan adaptasi. </font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Kesepakatan ini disambut dengan antusias oleh berbagai pihak, termasuk organisasi lingkungan dan masyarakat sipil. Greta Thunberg, aktivis lingkungan terkenal, menyatakan bahwa Deklarasi Geneva merupakan langkah maju yang signifikan. \"Ini adalah kemenangan besar bagi planet kita. Namun, kita harus memastikan bahwa komitmen ini benar-benar dilaksanakan,\" kata Thunberg.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Namun, ada juga kritik yang muncul, terutama dari beberapa kelompok industri yang khawatir bahwa kebijakan baru ini akan berdampak negatif pada ekonomi. Beberapa negara produsen minyak dan gas menyatakan keberatan mereka dan meminta agar ada kebijakan transisi yang lebih adil dan realistis. Dengan Deklarasi Geneva, dunia kini memiliki peta jalan yang lebih jelas untuk mengatasi krisis iklim. Tantangan terbesar ke depan adalah memastikan implementasi dari semua komitmen yang telah disepakati. Para pemimpin dunia menyadari bahwa tindakan nyata dan keberlanjutan dari upaya ini adalah kunci untuk mencapai tujuan yang telah ditetapkan.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Terus ikuti perkembangan berita politik internasional hanya di Guminyus Politik. Kami selalu menyajikan informasi terkini dan terpercaya untuk Anda.</font></p>', '2024-06-08 05:44:34', NULL, 1, 'Konferensi-Global-di-Geneva-Berhasil-Capai-Kesepakatan-untuk-Mengatasi-Perubahan-Iklim', '169f760cb3d8a33af4b3e4cab6a68c1b.jpg'),
(18, 'Pemerintah Indonesia Meluncurkan Program Ambisius \"Masyarakat Sejahtera 2040\" untuk Transformasi Sosial Ekonomi', 10, 14, '<p style=\"text-align: justify; \"><font face=\"Times New Roman\"><b>Jakarta, 8 Juni 2024 </b>– Dalam upaya untuk mengatasi tantangan sosial dan ekonomi yang dihadapi oleh masyarakat Indonesia, pemerintah telah meluncurkan program ambisius yang diberi nama \"Masyarakat Sejahtera 2040.\" Program ini bertujuan untuk menciptakan transformasi sosial ekonomi yang signifikan melalui sejumlah kebijakan dan program strategis yang menyentuh berbagai aspek kehidupan masyarakat.<br></font></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\"><br></span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Masyarakat Sejahtera 2040 memiliki tujuan yang jelas dan ambisius, antara lain:</span><br></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Mengurangi tingkat kemiskinan secara signifikan dengan memperluas akses terhadap pendidikan, kesehatan, dan kesempatan ekonomi.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Mendorong pertumbuhan ekonomi yang inklusif dan berkelanjutan dengan memperkuat sektor-sektor ekonomi yang potensial dan memberdayakan pelaku usaha mikro, kecil, dan menengah.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Meningkatkan kualitas hidup masyarakat dengan meningkatkan akses terhadap layanan publik berkualitas, infrastruktur, dan lingkungan yang bersih dan sehat.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Memperkuat tatanan sosial yang inklusif dan berkeadilan dengan mengedepankan hak asasi manusia, keadilan gender, dan partisipasi masyarakat dalam proses pengambilan keputusan.</font></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\"><br></span></p><p style=\"text-align: justify; \"><span style=\"font-family: &quot;Times New Roman&quot;;\">Program Masyarakat Sejahtera 2040 mencakup sejumlah kebijakan dan program utama, antara lain:</span><br></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pendidikan Gratis dan Berkualitas: Pemerintah akan meningkatkan akses terhadap pendidikan tingkat dasar hingga perguruan tinggi dengan memberikan fasilitas pendidikan gratis dan berkualitas.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pengembangan Infrastruktur: Investasi besar-besaran akan dilakukan untuk memperbaiki dan memperluas infrastruktur transportasi, energi, dan komunikasi di seluruh Indonesia.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pemberdayaan Ekonomi Rakyat: Program ini akan memberikan dukungan dan insentif bagi pelaku usaha mikro, kecil, dan menengah untuk mengembangkan usaha mereka dan menciptakan lapangan kerja baru.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">- Pengentasan Kemiskinan: Pemerintah akan meningkatkan program-program bantuan sosial dan mengimplementasikan kebijakan yang bertujuan untuk mengentaskan kemiskinan secara bertahap.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Program Masyarakat Sejahtera 2040 disambut dengan beragam tanggapan dari masyarakat. Sebagian besar masyarakat menyambut baik langkah-langkah pemerintah untuk meningkatkan kesejahteraan rakyat. Mereka berharap program ini dapat diimplementasikan dengan baik dan memberikan dampak yang nyata bagi kehidupan mereka sehari-hari. Namun, ada juga beberapa pihak yang menyampaikan kekhawatiran terkait dengan kesiapan dan kemampuan pemerintah dalam melaksanakan program ini secara efektif. Mereka menekankan perlunya transparansi, akuntabilitas, dan partisipasi masyarakat yang lebih besar dalam proses perencanaan dan implementasi program-program ini.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Pemerintah Indonesia berkomitmen untuk melaksanakan program Masyarakat Sejahtera 2040 dengan sungguh-sungguh. Mereka akan bekerja sama dengan berbagai pemangku kepentingan, termasuk swasta dan masyarakat sipil, untuk mencapai tujuan yang telah ditetapkan. Dengan kerjasama dan dukungan semua pihak, diharapkan program ini dapat menjadi tonggak penting dalam membangun Indonesia yang lebih sejahtera dan berkeadilan.</font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\"><br></font></p><p style=\"text-align: justify; \"><font face=\"Times New Roman\">Terus ikuti perkembangan berita politik nasional hanya di Guminyus Politik. Kami selalu menyajikan informasi terkini dan terpercaya untuk Anda.</font></p>', '2024-06-08 05:51:02', NULL, 1, 'Pemerintah-Indonesia-Meluncurkan-Program-Ambisius-\"Masyarakat-Sejahtera-2040\"-untuk-Transformasi-Sosial-Ekonomi', 'b9fb9d37bdf15a699bc071ce49baea53.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2018-06-22 15:45:38', '0000-00-00 00:00:00', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2018-06-30 09:00:43', '0000-00-00 00:00:00', 1),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '0000-00-00 00:00:00', 1),
(6, 5, 'Television', 'TeleVision', '2018-06-30 18:59:22', '0000-00-00 00:00:00', 1),
(7, 6, 'National', 'National', '2018-06-30 19:04:29', '0000-00-00 00:00:00', 1),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '0000-00-00 00:00:00', 1),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '0000-00-00 00:00:00', 1),
(10, 8, 'Nasional', 'Di subkategori ini, kami fokus pada perkembangan dunia anime di Indonesia. Kami menyajikan berita terkini tentang produksi anime lokal, perkembangan industri anime di tanah air, serta berbagai acara dan festival anime yang digelar di Indonesia. Kami juga memberikan sorotan pada kreator-kreator lokal yang berkontribusi dalam mengembangkan dunia anime Indonesia.', '2024-06-08 04:17:05', NULL, 1),
(11, 8, 'Internasional', 'Di subkategori ini, kami menyajikan berita dan informasi terkini dari dunia anime internasional. Kami meliput berbagai perkembangan terbaru dari industri anime Jepang dan negara lainnya yang terkenal dengan produksi animenya. Dari pengumuman anime baru, rilis film, hingga acara-acara besar di dunia anime, kami hadir untuk memberikan informasi yang lengkap dan terpercaya.', '2024-06-08 04:17:24', NULL, 1),
(12, 9, 'Nasional', 'Di subkategori ini, kami fokus pada perkembangan dunia olahraga di Indonesia. Kami menyajikan berita terkini tentang berbagai cabang olahraga yang populer di tanah air, seperti sepak bola, bulu tangkis, basket, dan lainnya. Kami juga memberikan sorotan pada prestasi atlet-atlet Indonesia, baik di kancah nasional maupun internasional.', '2024-06-08 05:06:44', NULL, 1),
(13, 9, 'Internasional', 'Di subkategori ini, kami menyajikan berita dan informasi terkini dari dunia olahraga internasional. Kami meliput berbagai perkembangan terbaru dari cabang olahraga populer di seluruh dunia, seperti sepak bola, tenis, basket, Formula 1, dan banyak lagi. Dari liga-liga besar hingga turnamen internasional, kami hadir untuk memberikan informasi yang lengkap dan terpercaya.', '2024-06-08 05:07:03', NULL, 1),
(14, 10, 'Nasional', 'Di subkategori ini, kami fokus pada perkembangan dunia politik di Indonesia. Kami menyajikan berita terkini tentang kebijakan pemerintah, dinamika partai politik, serta isu-isu politik yang sedang hangat di tanah air. Kami juga memberikan sorotan pada tokoh-tokoh politik Indonesia dan peran mereka dalam menentukan arah kebijakan negara.', '2024-06-08 05:40:04', NULL, 1),
(15, 10, 'Internasional', 'Di subkategori ini, kami menyajikan berita dan informasi terkini dari dunia politik internasional. Kami meliput berbagai perkembangan terbaru dari arena politik global, termasuk kebijakan luar negeri, hubungan diplomatik, dan isu-isu internasional yang berpengaruh pada skala global. Dari pemilu di negara-negara besar hingga krisis internasional, kami hadir untuk memberikan informasi yang lengkap dan terpercaya.', '2024-06-08 05:40:22', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
