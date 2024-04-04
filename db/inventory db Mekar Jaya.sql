/*
MySQL Backup
Database: inventory
Backup Time: 2023-11-23 14:20:51
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `inventory`.`barang_harga`;
DROP TABLE IF EXISTS `inventory`.`barang_master`;
DROP TABLE IF EXISTS `inventory`.`barang_masuk`;
DROP TABLE IF EXISTS `inventory`.`cabang`;
DROP TABLE IF EXISTS `inventory`.`historibayar`;
DROP TABLE IF EXISTS `inventory`.`pelanggan`;
DROP TABLE IF EXISTS `inventory`.`penjualan`;
DROP TABLE IF EXISTS `inventory`.`penjualan_detail`;
DROP TABLE IF EXISTS `inventory`.`penjualan_detail_temp`;
DROP TABLE IF EXISTS `inventory`.`supplier`;
DROP TABLE IF EXISTS `inventory`.`users`;
DROP VIEW IF EXISTS `inventory`.`view_barang_keluar`;
DROP VIEW IF EXISTS `inventory`.`view_totalbayar`;
DROP VIEW IF EXISTS `inventory`.`view_totalpenjualan`;
CREATE TABLE `barang_harga` (
  `kode_harga` varchar(10) NOT NULL,
  `kode_barang` varchar(7) NOT NULL,
  `harga_modal` int(40) NOT NULL,
  `harga_bakul` int(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kode_cabang` varchar(5) NOT NULL,
  PRIMARY KEY (`kode_harga`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `barang_master` (
  `kode_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `supplier` varchar(40) NOT NULL,
  PRIMARY KEY (`kode_barang`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(40) NOT NULL,
  `supplier` varchar(40) NOT NULL,
  `tmbhstok` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_cabang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_barang_masuk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
CREATE TABLE `cabang` (
  `kode_cabang` varchar(5) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(100) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`kode_cabang`) USING BTREE,
  KEY `kode_cab_idx` (`kode_cabang`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `historibayar` (
  `nobukti` varchar(14) NOT NULL,
  `no_faktur` varchar(13) NOT NULL,
  `tglbayar` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `totalmodal` int(11) NOT NULL,
  `id_user` char(6) NOT NULL,
  PRIMARY KEY (`nobukti`) USING BTREE,
  KEY `hb_nofaktur` (`no_faktur`) USING BTREE,
  KEY `hb_tglbayar_jenis` (`tglbayar`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(8) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_cabang` char(5) NOT NULL,
  PRIMARY KEY (`kode_pelanggan`) USING BTREE,
  KEY `pel_nama` (`nama_pelanggan`) USING BTREE,
  KEY `pel_kodecab` (`kode_cabang`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `penjualan` (
  `no_faktur` varchar(13) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kode_pelanggan` varchar(13) NOT NULL,
  `jenistransaksi` varchar(6) NOT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `id_user` char(6) NOT NULL,
  `kode_cabang` varchar(5) NOT NULL,
  PRIMARY KEY (`no_faktur`) USING BTREE,
  KEY `kode_pelanggan` (`kode_pelanggan`) USING BTREE,
  KEY `tgltransaksi` (`tgltransaksi`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `penjualan_detail` (
  `no_faktur` varchar(13) DEFAULT NULL,
  `kode_barang` varchar(8) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `harga_modal` int(40) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  KEY `detailpenj_nofaktur` (`no_faktur`) USING BTREE,
  KEY `detailpenj_kodebarang` (`kode_barang`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `penjualan_detail_temp` (
  `kode_barang` varchar(8) NOT NULL,
  `harga_modal` int(40) NOT NULL,
  `harga_bakul` int(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` char(6) NOT NULL,
  `stokbarang` int(11) NOT NULL,
  `kode_harga` varchar(20) NOT NULL,
  `jenis_harga` varchar(20) NOT NULL,
  KEY `detailpenj_kodebarang` (`kode_barang`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;
CREATE TABLE `users` (
  `id_user` char(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `kode_cabang` varchar(4) NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_barang_keluar` AS SELECT
	penjualan_detail.kode_barang, 
	penjualan_detail.qty, 
	penjualan.tgltransaksi, 
	barang_master.nama_barang, 
	barang_master.supplier, 
	penjualan.id_user
FROM
	penjualan_detail
	INNER JOIN
	penjualan
	ON 
		penjualan_detail.no_faktur = penjualan.no_faktur
	INNER JOIN
	barang_master
	ON 
		penjualan_detail.kode_barang = barang_master.kode_barang ;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_totalbayar` AS SELECT
	no_faktur,
	SUM( bayar ) AS totalbayar,
	totalmodal 
FROM
	historibayar 
GROUP BY
	no_faktur ;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_totalpenjualan` AS SELECT
	no_faktur, 
	SUM(harga*qty) AS totalpenjualan, 
	harga_modal
FROM
	penjualan_detail
GROUP BY
	no_faktur ;
BEGIN;
LOCK TABLES `inventory`.`barang_harga` WRITE;
DELETE FROM `inventory`.`barang_harga`;
INSERT INTO `inventory`.`barang_harga` (`kode_harga`,`kode_barang`,`harga_modal`,`harga_bakul`,`harga`,`stok`,`kode_cabang`) VALUES ('BR00020GDG', 'BR00020', 55000, 65000, 70000, 92, 'GDG1'),('BR00007JTK', 'BR00007', 55000, 65000, 70000, 100, 'JTK'),('BR00024JTK', 'BR00024', 55000, 60000, 70000, 9, 'JTK'),('BR00006JTK', 'BR00006', 55000, 65000, 70000, 445, 'JTK'),('BR00017JTK', 'BR00017', 45000, 50000, 60000, 94, 'JTK')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`barang_master` WRITE;
DELETE FROM `inventory`.`barang_master`;
INSERT INTO `inventory`.`barang_master` (`kode_barang`,`nama_barang`,`satuan`,`supplier`) VALUES ('BR00001', 'Avian Cat Kayu Warna Merah 5kg', 'Galon', 'PT AVIAN BRAND'),('BR00019', 'Am Smen Nat kuning 1Kg', 'Pcs', 'Pt Adiwisesa Am '),('BR00003', 'AQUAPROOP ABU MUDA 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00004', 'AQUAPROOP HITAM 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00005', 'Avitex 5kg Merah Hijau Muda', 'Kaleng', 'PT AVIAN BRAND'),('BR00006', 'Avitex 5kg Kuning Cat Tembok', 'Galon', 'PT AVIAN BRAND'),('BR00007', 'Avitex 5kg Biru Cat Tembok', 'Galon', 'PT AVIAN BRAND'),('BR00008', 'AQUAPROOP ABU-ABU 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00009', 'AQUAPROOP MERAH 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00010', 'AQUAPROOP HIJAU 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00011', 'AQUAPROOP HIJAU LIMAU 1kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00012', 'AQUAPROOP KUNING 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00013', 'AQUAPROOP BIRU 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00014', 'AQUAPROOP HJAU  MUDA 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00015', 'AQUAPROOP MERAH MUDA 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00016', 'AQUAPROOP ABU MUDA 1Kg', 'Galon', 'PT Adhi Cakra Utama Mulia'),('BR00017', 'Keramik concord 50x50 ', 'Dus', 'PT CONCORD'),('BR00018', 'Keramik Mulia 50x50 putih', 'Dus', 'PT CONCORD'),('BR00020', 'Am Smen Nat Warana Mocha 1kg', 'Pcs', 'Pt Adiwisesa Am '),('BR00021', 'AQUAPROOP ABU MUDA 5Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia'),('BR00022', 'Ampelas nomor 5 Meteran', 'Dus', 'Pilih Supplier..'),('BR00023', 'List Keramik', 'Pcs', 'Pilih Supplier..'),('BR00024', 'AQUAPROOP Hijau Toska 1Kg', 'Kaleng', 'PT Adhi Cakra Utama Mulia')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`barang_masuk` WRITE;
DELETE FROM `inventory`.`barang_masuk`;
INSERT INTO `inventory`.`barang_masuk` (`id_barang_masuk`,`nama_barang`,`supplier`,`tmbhstok`,`tgl_masuk`,`kode_cabang`) VALUES (27, 'AQUAPROOP Hijau Toska 1Kg', 'PT Adhi Cakra Utama Mulia', 100, '2023-10-06', 'JTK'),(28, 'Avitex 5kg Kuning Cat Tembok', 'PT AVIAN BRAND', 500, '2023-10-09', 'JTK'),(29, 'Am Smen Nat Warana Mocha 1kg', 'Pt Adiwisesa Am ', 100, '2023-10-10', 'GDG1'),(30, 'Avitex 5kg Biru Cat Tembok', 'PT AVIAN BRAND', 100, '2023-10-10', 'JTK'),(31, 'Keramik concord 50x50 ', 'PT CONCORD', 100, '2023-10-10', 'JTK')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`cabang` WRITE;
DELETE FROM `inventory`.`cabang`;
INSERT INTO `inventory`.`cabang` (`kode_cabang`,`nama_cabang`,`alamat_cabang`,`telepon`) VALUES ('PST', 'MEKAR JAYA 1 JETAK PUSAT  (KEPALA TOKO/PEMILIK TOK', '     Jetak, Blok M, Sindangwangi RT 01/RW02, Kec.Bantarkawung, Kab. Brebes', '082265107578'),('JTK', 'MEKAR JAYA 1 JETAK ', '  Jetak Rt 01/Rw 02, Sindangwangi, Kec Bantarkawung, Kab Brebes', '08226534356'),('GDG1', 'GUDANG 1 MEKAR JAYA ', ' SUKA JAYA JIPANG', '0000000000000')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`historibayar` WRITE;
DELETE FROM `inventory`.`historibayar`;
INSERT INTO `inventory`.`historibayar` (`nobukti`,`no_faktur`,`tglbayar`,`bayar`,`totalmodal`,`id_user`) VALUES ('BK2310250001', 'TR2310250001', '2023-10-25', 380000, 290000, 'USR004'),('BK2310220002', 'TR2310220002', '2023-10-22', 280000, 220000, 'USR004'),('BK2310220003', 'TR2310220003', '2023-10-22', 260000, 200000, 'USR004'),('BK2310220004', 'TR2310220004', '2023-10-22', 700000, 550000, 'USR004'),('BK2310220005', 'TR2310220005', '2023-10-22', 700000, 550000, 'USR004'),('BK2310090002', 'TR2310090002', '2023-10-09', 280000, 220000, 'USR004'),('BK2310090003', 'TR2310070002', '2023-10-09', 600000, 473000, 'USR004'),('BK2310100001', 'TR2310100001', '2023-10-10', 0, 0, 'USR004'),('BK2310220001', 'TR2310220001', '2023-10-22', 280000, 220000, 'USR004'),('BK2310120001', 'TR2310120001', '2023-10-12', 560000, 440000, 'USR004'),('BK2310090001', 'TR2310090001', '2023-10-09', 1610000, 1265000, 'USR004'),('BK2310070001', 'TR2310070001', '2023-10-07', 700000, 550000, 'USR004')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`pelanggan` WRITE;
DELETE FROM `inventory`.`pelanggan`;
INSERT INTO `inventory`.`pelanggan` (`kode_pelanggan`,`nama_pelanggan`,`alamat_pelanggan`,`no_hp`,`kode_cabang`) VALUES ('PLG00002', 'Tidak di KetahuiSaha Bae', ' s', '081466861357', 'JMS'),('PLG00008', 'Aaa', ' ', '', 'Pilih'),('PLG00001', 'Tidak di Ketahui', ' Tidak di Ketahui', 'Tidak di Ketahu', 'JTK'),('PLG00004', 'Saein Maksus', ' Jetak Sindangwangi', '082265107179', 'JTK'),('PLG00005', 'Beni', ' Jemasih', '081466861357', 'JMS'),('PLG00006', 'Aar Ashrorin', ' Jemasih Ketanggungan', '0815668614777', 'JMS'),('PLG00007', 'Ardiono', ' Kosambi Jipang', '081466861357', 'JTK'),('PLG00009', 'Aar Priana', ' Jetak Blok M', '082265107177', 'JTK')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`penjualan` WRITE;
DELETE FROM `inventory`.`penjualan`;
INSERT INTO `inventory`.`penjualan` (`no_faktur`,`tgltransaksi`,`kode_pelanggan`,`jenistransaksi`,`jatuhtempo`,`id_user`,`kode_cabang`) VALUES ('TR2310250001', '2023-10-25', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310220005', '2023-10-22', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310220004', '2023-10-22', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310220003', '2023-10-22', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310120001', '2023-10-12', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310220001', '2023-10-22', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310220002', '2023-10-22', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310100001', '2023-10-10', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310090003', '2023-10-09', 'PLG00004', 'kredit', '2023-11-09', 'USR004', 'PST'),('TR2310090002', '2023-10-09', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310070002', '2023-10-07', 'PLG00004', 'kredit', '2023-11-07', 'USR004', 'PST'),('TR2310090001', '2023-10-09', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST'),('TR2310070001', '2023-10-07', 'PLG00001', 'tunai', '0000-00-00', 'USR004', 'PST')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`penjualan_detail` WRITE;
DELETE FROM `inventory`.`penjualan_detail`;
INSERT INTO `inventory`.`penjualan_detail` (`no_faktur`,`kode_barang`,`harga`,`harga_modal`,`qty`) VALUES ('TR2310070001', 'BR00024', 70000, 55000, 10),('TR2310070002', 'BR00024', 70000, 55000, 20),('TR2310090001', 'BR00024', 70000, 55000, 23),('TR2310090002', 'BR00024', 70000, 55000, 4),('TR2310090003', 'BR00006', 70000, 55000, 23),('TR2310120001', 'BR00006', 70000, 55000, 4),('TR2310120001', 'BR00020', 70000, 55000, 4),('TR2310220001', 'BR00006', 70000, 55000, 4),('TR2310220002', 'BR00006', 70000, 55000, 4),('TR2310220003', 'BR00017', 60000, 45000, 2),('TR2310220003', 'BR00020', 70000, 55000, 2),('TR2310220004', 'BR00006', 70000, 55000, 10),('TR2310220005', 'BR00006', 70000, 55000, 10),('TR2310250001', 'BR00017', 60000, 45000, 4),('TR2310250001', 'BR00020', 70000, 55000, 2)
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`penjualan_detail_temp` WRITE;
DELETE FROM `inventory`.`penjualan_detail_temp`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`supplier` WRITE;
DELETE FROM `inventory`.`supplier`;
INSERT INTO `inventory`.`supplier` (`id_supplier`,`nama_supplier`,`alamat_supplier`,`no_telp`) VALUES (1, 'PT Adhi Cakra Utama Mulia', 'Jakarta Gambir', '082235463736'),(3, 'Pt Adiwisesa ', '  Bandung Dage Bumiayu', '081466861357'),(4, 'PT AVIAN BRAND', ' CIREBON', '081466861357'),(5, 'PT CONCORD', ' Tegal', '081466861357'),(6, 'PT KERAMIK MULIA', ' BREBES', '081466861357'),(7, 'KIRIN', ' JAKARTA', '081466861357'),(8, 'Pt Adiwisesa Am ', '  Bandung Cibarengkok', '081466861357'),(9, 'PT Washer Indonesia Jaya', '  Cirebon, Dadap, Jawa barat', '082265107175'),(11, 'DULUX INDONESIA', ' TEGAL', '081466861357')
;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `inventory`.`users` WRITE;
DELETE FROM `inventory`.`users`;
INSERT INTO `inventory`.`users` (`id_user`,`nama_lengkap`,`no_hp`,`username`,`password`,`level`,`kode_cabang`) VALUES ('USR005', 'Toni Sucipto', '081466861357', 'toni', 'toni', 'karyawan toko', 'JTK'),('USR004', 'rizalparhi', '082265107179', 'rizalparhi', 'admin', 'administrator', 'PST'),('USR008', 'Koko', '081466861357', 'shopa', 'shopa', 'administrator', 'PST'),('USR009', 'Eeng Saputra', '081466861357', 'eeng', 'eeng', 'karyawan gudang', 'GDG1')
;
UNLOCK TABLES;
COMMIT;
