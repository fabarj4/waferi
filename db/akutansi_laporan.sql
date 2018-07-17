/*
SQLyog Ultimate v12.4.1 (32 bit)
MySQL - 5.7.22-0ubuntu18.04.1 : Database - akuntan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`akuntan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `akuntan`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nm_barang` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_vendor` int(11) NOT NULL,
  `harga_beli` int(8) NOT NULL,
  `harga_jual` int(8) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nm_barang`,`stock`,`tgl_update`,`id_vendor`,`harga_beli`,`harga_jual`) values 
(1,'WAFERI COKELAT',600,'2018-07-17 13:13:00',1,6000,9000),
(2,'WAFERI VANILLA',10,'2018-07-17 09:44:17',1,5000,8000),
(3,'WAFERI KEJU',100,'2018-07-17 13:14:49',2,7000,10000);

/*Table structure for table `jurnal_kas` */

DROP TABLE IF EXISTS `jurnal_kas`;

CREATE TABLE `jurnal_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_penerimaan` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` int(1) NOT NULL,
  `tipe` int(1) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_kas` */

insert  into `jurnal_kas`(`id`,`tgl_penerimaan`,`username`,`saldo`,`jenis`,`tipe`,`ket`) values 
(1,'0000-00-00','1',233122,0,0,''),
(2,'0000-00-00','2',230000,0,0,''),
(3,'2018-07-17','admin',1269510,3,0,'Modal'),
(4,'2018-07-17','admin',10000000,8,0,'Investasi oleh pemilik');

/*Table structure for table `jurnal_pembelian` */

DROP TABLE IF EXISTS `jurnal_pembelian`;

CREATE TABLE `jurnal_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pembelian` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `saldo` int(7) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_pembelian` */

insert  into `jurnal_pembelian`(`id`,`tgl_pembelian`,`username`,`saldo`,`id_barang`,`jumlah`,`ket`) values 
(7,'2018-01-31','7',300000,0,0,''),
(13,'2018-01-14','9',43252,0,0,''),
(26,'2018-01-12','2141',224,0,0,''),
(27,'2018-01-17','10',120000,0,0,''),
(28,'2018-01-19','11',120029,0,0,''),
(29,'2018-01-27','12',221000,0,0,''),
(30,'2018-02-15','13',324222,0,0,''),
(33,'2018-07-17','admin',700000,3,100,'penambahan stok barang WAFERI KEJU');

/*Table structure for table `jurnal_pengeluaran_kas` */

DROP TABLE IF EXISTS `jurnal_pengeluaran_kas`;

CREATE TABLE `jurnal_pengeluaran_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengeluaran` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` int(1) NOT NULL,
  `tipe` int(1) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_pengeluaran_kas` */

insert  into `jurnal_pengeluaran_kas`(`id`,`tgl_pengeluaran`,`username`,`saldo`,`jenis`,`tipe`,`ket`) values 
(4,'0000-00-00','1',123112,0,0,''),
(5,'2018-07-17','admin',1000000,9,0,'Kas'),
(6,'2018-07-17','admin',100000,9,0,'Peralatan kantor'),
(7,'2018-07-17','admin',1000000,9,0,'Sewa gudang'),
(10,'2018-07-17','admin',1000000,5,0,'Pembelian Aktiva Tetap'),
(11,'2018-07-17','admin',1000000,10,0,'Penarikan oleh pemilik');

/*Table structure for table `jurnal_penggajian` */

DROP TABLE IF EXISTS `jurnal_penggajian`;

CREATE TABLE `jurnal_penggajian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_penggajian` date NOT NULL,
  `username` varchar(15) NOT NULL,
  `saldo` int(8) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_penggajian` */

/*Table structure for table `jurnal_penjualan` */

DROP TABLE IF EXISTS `jurnal_penjualan`;

CREATE TABLE `jurnal_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_penjualan` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_penjualan` */

insert  into `jurnal_penjualan`(`id`,`tgl_penjualan`,`id_barang`,`jumlah`,`username`,`ket`) values 
(3,'2018-07-17',1,100000,'user','Penjualan Waferi Cokelat'),
(4,'2018-07-17',2,2000000,'user','Penjualan Waferi Vanilla');

/*Table structure for table `jurnal_umum` */

DROP TABLE IF EXISTS `jurnal_umum`;

CREATE TABLE `jurnal_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pembelian` date NOT NULL,
  `jurnal` varchar(20) NOT NULL,
  `akun_debit` varchar(20) NOT NULL,
  `total_debit` int(10) NOT NULL,
  `akun_kredit` varchar(20) NOT NULL,
  `total_kredit` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `jurnal_umum` */

insert  into `jurnal_umum`(`id`,`tgl_pembelian`,`jurnal`,`akun_debit`,`total_debit`,`akun_kredit`,`total_kredit`) values 
(4,'2018-07-17','Pembelian','eko',120029,'KAS',120029),
(5,'2018-07-17','Pembelian','KAS',221000,'sigit',221000),
(6,'2018-07-17','Pembelian','KAS',324222,'ryan',324222),
(7,'2018-07-17','Penjualan','dila',420222,'KAS',420222),
(8,'2018-07-17','Penggajian','KAS',203399,'deden',203399),
(9,'2018-07-17','Penerimaan','KAS',233122,'rahmat',233122),
(13,'2018-07-17','Pengeluaran Kas','lulud',123112,'KAS',123112),
(14,'2018-07-17','Penerimaan Kas','aris',230000,'KAS',230000),
(15,'2018-07-17','Pembelian','KAS',122000,'alfat',122000),
(16,'2018-07-17','Penjualan','KAS',212333,'sinta',212333),
(17,'2018-07-17','Penggajian','ica',122999,'KAS',122999),
(18,'2018-07-17','Pengeluaran Kas','KAS',120000,'rista',120000);

/*Table structure for table `konsumen` */

DROP TABLE IF EXISTS `konsumen`;

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `konsumen` */

/*Table structure for table `r_jenis_kas` */

DROP TABLE IF EXISTS `r_jenis_kas`;

CREATE TABLE `r_jenis_kas` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis` varchar(200) NOT NULL,
  `is_kredit` smallint(1) NOT NULL DEFAULT '1' COMMENT '0: debet 1:kredit',
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `r_jenis_kas` */

insert  into `r_jenis_kas`(`id_jenis`,`nm_jenis`,`is_kredit`) values 
(1,'Beban Pendapatan',1),
(2,'Kewajiban',0),
(3,'Ekuitas',0),
(5,'Pembelian Aktiva Tetap',1),
(6,'Penjualan Aktiva Tetap',1),
(8,'Kas Investasi oleh pemilik',0),
(9,'Assets',1),
(10,'Penarikan oleh pemilik',0);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`nama`,`alamat`,`no_hp`) values 
(1,'CV. Indo Wafer','JL. Raya Bogor No.31 KM .56','021888756'),
(2,'Mukidin','JL. Padjajaran No. 56 ','085718187564');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL DEFAULT '',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pass` varchar(10) NOT NULL,
  `tipe` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`id`,`pass`,`tipe`,`nama`) values 
('admin',1,'123',1,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
