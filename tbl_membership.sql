CREATE TABLE `tbl_membership` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(150) NOT NULL,
  `m_duration` varchar(150) NOT NULL,
  `m_price` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`m_id`);


ALTER TABLE `tbl_membership`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

