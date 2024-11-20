-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 19, 2024 lúc 01:37 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'Tiểu thuyết'),
(2, 'Trinh thám'),
(3, 'Văn học'),
(4, 'Manga'),
(5, 'Anh trai say gex');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `client_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`client_id`, `username`, `password`, `name`, `email`, `image`, `role`) VALUES
(1, 'admin', '123456', 'Nam', 'admin@gmail.com', 'default.jpg', 0),
(2, 'oooo@gmail.com', '123456', 'Nicolas Jackson', 'oooo@gmail.com', 'default.png', 1),
(3, 'sssssss@gmail.com', '123456', 'Zhong Xina', 'sssssss@gmail.com', 'default.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view` int DEFAULT '0',
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `description`, `image`, `view`, `category_id`) VALUES
(1, 'Thép Đã Tôi Thế Đấy', 100000, 'Thép đã tôi thế đấy ! Được đăng lần dầu trên tạp chi Molodaya Gvardiya vào năm 1932 và được xuất bản thành sách vào năm 1936 . Không phải một tiểu thuyết bình thường , Thép đã tôi thế đấy ! Chính là cuộc đời của tác giả Nikolai A.Ostrovsky . Bằng sự ca trường của người chiến sĩ cách mạng , dù cơ thể bị tàn phá , đâu đớn , Nikolai A.Ostrovsky vẫn sống trọn vẹn , cống hiến cho xã hội cuốn tiểu thuyết bất hủ Thép đã tôi thế đấy ! và thành công trong xây dựng hình tượng nhân vật chính - người chiến sĩ hồng quân Pavel Korchagin . Nhiệt tình cách mạng nồng cháy của Pavel đã khiến nhiều độc giả yêu quý anh và phương châm sống của anh cũng đã trở thành phương châm sống của nhiều thanh niên thế hệ Pavel tại khối các nước xã hội chủ nghĩa trong đó có Việt Nam.', 'sach1.webp', 15, 3),
(2, 'Cảnh sát trưởng ngủ gật', 80000, 'Cảnh sát trưởng tên Godo Sansho, tuổi tác khoảng độ bốn mươi, bốn mốt. Ông có vóc người to béo bệ vệ, đôi vai gồ lên rắn như đá, nọng cằm chia thành hai tầng, vòng bụng phình lớn. Ngoại hình của ông khá thô kệch, đôi mắt nhỏ xíu lúc nào trông cũng lờ đờ mệt mỏi, động tác uể oải, giao tiếp lề mề, không dứt khoát.Trên bàn làm việc của ông lúc nào cũng ngổn ngang năm, sáu cuốn sách mới. Đôi khi tôi cho là ông chỉ đang “bày vẽ” bởi nếu không có việc gì làm, ông thường đánh một giấc ngon lành… Không thể tin một người đứng đầu trụ sở cảnh sát lại có phong thái lười nhác như vậy. Tuy nhiên, trong năm năm ông đương chức, số lượng vụ án thưa thớt thấy rõ. Người đân hưởng trọn niềm an vui thái bình. Điều gì khiến người đàn ông ấy được tín nhiệm đến thế?', 'sach2.webp', 8, 2),
(3, 'Bà nội Gangster', 110000, 'Bà nội của Ben là một bà nội chuẩn không cần chỉnh - bà có tóc bạc, răng giả, và giấy ăn giắt đầy tay áo. Bà chỉ thích ăn mỗi món bắp cải và chơi trò xếp chữ. Theo Ben thì bà chán kinh khủng. Cho đến khi cậu phát hiện ra bí mật vĩ đại của bà: Bà là một tên trộm nữ trang quốc tế!Hết sảy nhất là bà còn đang lên kế hoạch cho vụ trộm nữ trang đỉnh nhất từ trước đến giờ - trộm bộ Báu vật Hoàng gia từ Tháp London! Đã thế Ben còn có thể tham gia!Thế là tối thứ Sáu ở nhà bà nội bỗng trở thành ngày hào hứng nhất tuần!Và vụ trộm đã kết thúc theo một cách không ai ngờ tới nhất...', 'sach3.webp', 0, 1),
(4, 'Bánh mì kẹp chuột', 85000, 'Zoe luôn mơ ước được có một sô diễn xiếc chuột của riêng mình, nhưng chú chuột hamster của con bé đã chết một cách đột ngột, còn chuột cưng mới thì đang gặp nguy hiểm chết người.\r\n\r\nTương lai thảm khốc nào chờ đang đợi nó?\r\n\r\nVà ai đang đứng sau tất cả chuyện này?\r\n\r\nLà bà mẹ kế bị ám ảnh với món bim bim vị tôm cốc tai và cực kỳ ghét chuột...\r\n\r\n... hay kẻ bán món bánh mì kẹp bí ẩn nhưng vô cùng hút khách?.', 'sach4.webp', 0, 1),
(5, 'Những chuyện lạ ở Tokyo', 90000, 'Thất lạc người thân, sinh ly tử biệt, lãng quên tên họ... Những con người đột nhiên đánh mất điều quý giá rồi sa chân vào một góc đô thị - một thế giới tràn đầy sự trùng hợp và bất ngờ. Lữ khách tình cờ đưa ta lần theo ánh sáng nhạt mờ trong trái tim người chỉnh đàn cô độc, Vịnh Hanalei họa nên cuộc sống của một người mẹ có đứa con trai bỏ mạng nơi biển cả xứ xa... Ở thế giới mà ta đã quen, có những điểm mù xuất hiện trong khoảnh khắc, số phận bí ẩn của những người mất hút vào những điểm mù ấy được thuật lại trong năm câu chuyện này.\r\n\r\nHaruki Murakami, như mọi lần, lặng lẽ phá bỏ hàng rào giữa hiện thực và hư ảo, giữa thế giới bên này và thế giới bên kia, tiến vào những tầng tối tăm và sâu thẳm của xứ sở tiềm thức, tước từng mảnh linh hồn và cảm xúc ra khỏi cuộc sống thường nhật tầm thường.', 'sach5.webp', 6, 2),
(6, 'Gió lạnh đầu mùa', 150000, 'Gió Lạnh Đầu Mùa là tập truyện ngắn của Thạch Lam(1910 - 1942). Với bút pháp chân thực Thạch Lam đã dẫn dắt người đọc đi từ niềm xúc cảm này đến niềm xúc cảm khác với những cảnh đời không mấy may mắn...trong một xã hội đày dẫy những bất công. Đúng như Thạch Lam đã từng tuyên ngôn: \"Đối với tôi văn chương không phải là một cách đem đến cho người đọc sự thoát ly trong sự quên, trái lại văn chương là một thứ khí giới thanh cao và đắc lực mà chúng ta có, để vừa tố cáo và thay đổi một cái thế giới giả dối và tàn ác, làm cho lòng người được thêm trong sạch và phong phú hơn\". Trong Gió Lạnh Đầu Mùa, tình người ấm áp như chiếc áo mùa đông đã nảy nở trong lòng hai đưa trẻ: Hai chị em Lan, Sơn mặc áo ấm ra chợ chơi với bọn trẻ nhà nghèo thấy Hiên con bé hàng xóm co ro bên cột quán mặc manh áo rách tả tơi bèn chạy về nhà lấy áo bông cũ đem cho nó mặc. Mẹ Lan thấy nhà Hiên nghèo khổ bèn cho mẹ nó mượn năm hào may áo...', 'sach6.webp', 0, 1),
(7, 'Doraemon Plus', 50000, 'Dù bạn có là ai, có đọc bao nhiêu lần thì vẫn thấy thú vị!! Vượt qua thời gian, vượt qua thế hệ, đây là danh tác luôn được yêu quý và đón nhận!! Doraemon Plus là tuyển tập những truyện ngắn về Doraemon và các bạn của tác giả Fujiko F Fujio từng được đăng rải rác trên các tạp chí học tập Nhật Bản.\r\n\r\nDoraemon Plus tập hợp những truyện ngắn chưa từng có trong bộ truyện Doraemon 45 tập đã rất quen thuộc với tất cả chúng ta. Đặc biệt Doraemon Plus tập 6 còn giới thiệu 21 truyện ngắn cực kì hấp dẫn và chưa từng được công bố!\r\n', 'sach7.webp', 9, 4),
(8, 'BEAST COMPLEX III', 99000, 'Đây là nguồn gốc của \'BEASTARS\'. Một thế giới nơi các loài động vật ăn thịt và động vật ăn cỏ cùng tồn tại. Thế giới đầy những cảm xúc đa dạng. Trong thế giới này, vẫn còn vô số câu chuyện cần được kể. Chính vì sự khác biệt, việc đối mặt trở nên khó khăn. Và vì khó khăn, sự cố gắng đối mặt trở nên tàn nhẫn và đẹp đẽ. Tập truyện ngắn thứ ba tuyệt vời của Paru Itagaki.', 'sach8.webp', 11, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
