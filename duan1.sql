-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 05:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `name_client` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` decimal(10,0) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `client_id`, `name_client`, `phone`, `address`, `total`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'luong', 961903715, 'vviettiandljfsd', 200000, '2024-11-24 11:57:24', NULL, 0),
(11, 1, 'luong', 961903715, 'vviettiandljfsd', 0, '2024-11-24 11:57:24', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 3, 3, 50000),
(2, 1, 6, 1, 50000);

--
-- Triggers `bill_detail`
--
DELIMITER $$
CREATE TRIGGER `update_bill_total_after_insert_detail` AFTER INSERT ON `bill_detail` FOR EACH ROW BEGIN
    DECLARE new_total DECIMAL(10, 2);

    -- Tính tổng tiền của các bản ghi có bill_id là NEW.bill_id trong bảng bill_detail
    SELECT SUM(quantity * price)
    INTO new_total
    FROM bill_detail
    WHERE bill_id = NEW.bill_id;

    -- Cập nhật tổng tiền vào bảng bill
    UPDATE bill
    SET total = new_total
    WHERE id = NEW.bill_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`) VALUES
(1, 'Truyện dài', '0'),
(2, 'Trinh thám', '1'),
(3, 'Văn học', '1'),
(4, 'Manga', '1'),
(5, 'Tiểu thuyết', '1'),
(6, 'Truyện cười', '1'),
(7, 'Kinh dị', '1');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL,
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `username`, `password`, `name`, `email`, `image`, `role`, `status`) VALUES
(1, 'Hoàng Văn Lượng', 'Zocl00zonx.', 'Lượng Vip Vch', 'luonghvpp03220', '2024_11_24_22_49_19Hoàng Văn Lượng.jpg', 0, '1'),
(2, 'Nguyễn Anh Tuấn', '0123@Aabc', 'Búi Đầu Tuần', 'oooo@gmail.com', '2024_11_24_23_03_21avata1.jpg', 1, '0'),
(3, 'Phạm Duy Tú', '$1212Afds', 'Pịa Duy Tú', 'sssssss@gmail.com', '2024_11_24_23_03_35download.jpg', 1, '0'),
(4, 'Nguyễn Hải Nam', '@123Ab', 'Nam Gex Say', 'nam@gm.gm', '2024_11_24_22_50_31avata.jpg', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `image`, `view`, `category_id`, `status`) VALUES
(1, 'Thép Đã Tôi Thế Đấy', 100000, 'Thép đã tôi thế đấy ! Được đăng lần dầu trên tạp chi Molodaya Gvardiya vào năm 1932 và được xuất bản thành sách vào năm 1936 . Không phải một tiểu thuyết bình thường , Thép đã tôi thế đấy ! Chính là cuộc đời của tác giả Nikolai A.Ostrovsky . Bằng sự ca trường của người chiến sĩ cách mạng , dù cơ thể bị tàn phá , đâu đớn , Nikolai A.Ostrovsky vẫn sống trọn vẹn , cống hiến cho xã hội cuốn tiểu thuyết bất hủ Thép đã tôi thế đấy ! và thành công trong xây dựng hình tượng nhân vật chính - người chiến sĩ hồng quân Pavel Korchagin . Nhiệt tình cách mạng nồng cháy của Pavel đã khiến nhiều độc giả yêu quý anh và phương châm sống của anh cũng đã trở thành phương châm sống của nhiều thanh niên thế hệ Pavel tại khối các nước xã hội chủ nghĩa trong đó có Việt Nam.', '2024_11_24_22_38_56ThepDaToiTheDay.webp', 15, 3, '0'),
(2, 'Cảnh sát trưởng ngủ gật', 80000, 'Cảnh sát trưởng tên Godo Sansho, tuổi tác khoảng độ bốn mươi, bốn mốt. Ông có vóc người to béo bệ vệ, đôi vai gồ lên rắn như đá, nọng cằm chia thành hai tầng, vòng bụng phình lớn. Ngoại hình của ông khá thô kệch, đôi mắt nhỏ xíu lúc nào trông cũng lờ đờ mệt mỏi, động tác uể oải, giao tiếp lề mề, không dứt khoát.Trên bàn làm việc của ông lúc nào cũng ngổn ngang năm, sáu cuốn sách mới. Đôi khi tôi cho là ông chỉ đang “bày vẽ” bởi nếu không có việc gì làm, ông thường đánh một giấc ngon lành… Không thể tin một người đứng đầu trụ sở cảnh sát lại có phong thái lười nhác như vậy. Tuy nhiên, trong năm năm ông đương chức, số lượng vụ án thưa thớt thấy rõ. Người đân hưởng trọn niềm an vui thái bình. Điều gì khiến người đàn ông ấy được tín nhiệm đến thế?', '2024_11_24_22_43_53CanhSatTruongNguGat.webp', 8, 2, '1'),
(3, 'Bà nội Gangster', 110000, 'Bà nội của Ben là một bà nội chuẩn không cần chỉnh - bà có tóc bạc, răng giả, và giấy ăn giắt đầy tay áo. Bà chỉ thích ăn mỗi món bắp cải và chơi trò xếp chữ. Theo Ben thì bà chán kinh khủng. Cho đến khi cậu phát hiện ra bí mật vĩ đại của bà: Bà là một tên trộm nữ trang quốc tế!Hết sảy nhất là bà còn đang lên kế hoạch cho vụ trộm nữ trang đỉnh nhất từ trước đến giờ - trộm bộ Báu vật Hoàng gia từ Tháp London! Đã thế Ben còn có thể tham gia!Thế là tối thứ Sáu ở nhà bà nội bỗng trở thành ngày hào hứng nhất tuần!Và vụ trộm đã kết thúc theo một cách không ai ngờ tới nhất...', '2024_11_24_22_44_07BaNoiGangXto.webp', 0, 1, '0'),
(4, 'Bánh mì kẹp chuột', 85000, 'Zoe luôn mơ ước được có một sô diễn xiếc chuột của riêng mình, nhưng chú chuột hamster của con bé đã chết một cách đột ngột, còn chuột cưng mới thì đang gặp nguy hiểm chết người.Tương lai thảm khốc nào chờ đang đợi nó?Và ai đang đứng sau tất cả chuyện này?Là bà mẹ kế bị ám ảnh với món bim bim vị tôm cốc tai và cực kỳ ghét chuột...... hay kẻ bán món bánh mì kẹp bí ẩn nhưng vô cùng hút khách?.', '2024_11_24_22_44_19BanhMiKepChuot.webp', 0, 1, '1'),
(5, 'Những chuyện lạ ở Tokyo', 90000, 'Thất lạc người thân, sinh ly tử biệt, lãng quên tên họ... Những con người đột nhiên đánh mất điều quý giá rồi sa chân vào một góc đô thị - một thế giới tràn đầy sự trùng hợp và bất ngờ. Lữ khách tình cờ đưa ta lần theo ánh sáng nhạt mờ trong trái tim người chỉnh đàn cô độc, Vịnh Hanalei họa nên cuộc sống của một người mẹ có đứa con trai bỏ mạng nơi biển cả xứ xa... Ở thế giới mà ta đã quen, có những điểm mù xuất hiện trong khoảnh khắc, số phận bí ẩn của những người mất hút vào những điểm mù ấy được thuật lại trong năm câu chuyện này.Haruki Murakami, như mọi lần, lặng lẽ phá bỏ hàng rào giữa hiện thực và hư ảo, giữa thế giới bên này và thế giới bên kia, tiến vào những tầng tối tăm và sâu thẳm của xứ sở tiềm thức, tước từng mảnh linh hồn và cảm xúc ra khỏi cuộc sống thường nhật tầm thường.', '2024_11_24_22_44_32NhungTruyenLaOTokyo.webp', 6, 2, '1'),
(6, 'Gió lạnh đầu mùa', 150000, 'Gió Lạnh Đầu Mùa là tập truyện ngắn của Thạch Lam(1910 - 1942). Với bút pháp chân thực Thạch Lam đã dẫn dắt người đọc đi từ niềm xúc cảm này đến niềm xúc cảm khác với những cảnh đời không mấy may mắn...trong một xã hội đày dẫy những bất công. Đúng như Thạch Lam đã từng tuyên ngôn: ', '2024_11_24_22_44_42GioLanhDauMua.webp', 0, 1, '1'),
(7, 'Doraemon Plus', 50000, 'Dù bạn có là ai, có đọc bao nhiêu lần thì vẫn thấy thú vị!! Vượt qua thời gian, vượt qua thế hệ, đây là danh tác luôn được yêu quý và đón nhận!! Doraemon Plus là tuyển tập những truyện ngắn về Doraemon và các bạn của tác giả Fujiko F Fujio từng được đăng rải rác trên các tạp chí học tập Nhật Bản.Doraemon Plus tập hợp những truyện ngắn chưa từng có trong bộ truyện Doraemon 45 tập đã rất quen thuộc với tất cả chúng ta. Đặc biệt Doraemon Plus tập 6 còn giới thiệu 21 truyện ngắn cực kì hấp dẫn và chưa từng được công bố!', '2024_11_24_22_44_53DoremonPlus.webp', 9, 4, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
