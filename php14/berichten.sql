

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";





CREATE TABLE `bericht` (
  `id` int(10) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `bericht` text NOT NULL,
  `datumstijd` varchar(30) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




ALTER TABLE `bericht`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `bericht`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;
