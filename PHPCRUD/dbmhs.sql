CREATE TABLE `tbl_jk` (
    `id_jk` int(11) NOT NULL,
    `nama_jk` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`id_jk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbl_jk` (`id_jk`, `nama_jk`) VALUES
    (1, "Laki-Laki"),
    (2, "Perempuan");

CREATE TABLE `tbl_prodi` (
    `id_prodi` int(11) NOT NULL,
    `jenjang` varchar(30) DEFAULT NULL,
    `nama_prodi` varchar(30) DEFAULT NULL,
    PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbl_prodi` (`id_prodi`, `jenjang`, `nama_prodi`) VALUES
    (1, "S1", "Teknik Informatika"),
    (2, "S1", "Manajemen Informatika"),
    (3, "S1", "Pendidikan Teknologi Informasi"),
    (4, "S1", "Sistem Informasi");

CREATE TABLE `tbl_mhs` (
    `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
    `nim` varchar(11) DEFAULT NULL,
    `nama_mhs` varchar(50) DEFAULT NULL,
    `jk` int(11) DEFAULT NULL,
    `alamat` varchar(100) DEFAULT NULL,
    `prodi` int(11) DEFAULT NULL,
    `foto` varchar(55) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id_mhs`),
    KEY `fk_jk` (`jk`),
    KEY `fk_prodi` (`prodi`),
    CONSTRAINT `fk_jk` FOREIGN KEY (`jk`) REFERENCES `tbl_jk`(`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_prodi` FOREIGN KEY (`prodi`) REFERENCES `tbl_prodi`(`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;