-- =====================================================
-- Database: kopi_db
-- Aplikasi Web Mini - Profil Perusahaan Kopi Nusantara
-- CodeIgniter 3 + MySQL (XAMPP, port 3308)
-- Import file ini lewat phpMyAdmin (http://localhost/phpmyadmin)
-- =====================================================

CREATE DATABASE IF NOT EXISTS kopi_db;
USE kopi_db;

-- Tabel article
CREATE TABLE IF NOT EXISTS article (
    `id` VARCHAR(32) NOT NULL,
    `title` VARCHAR(128) NULL,
    `slug` VARCHAR(128) NOT NULL,
    `content` TEXT NULL,
    `draft` ENUM('true','false') NOT NULL DEFAULT 'true',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabel feedback
CREATE TABLE IF NOT EXISTS feedback (
    `id` VARCHAR(32) NOT NULL,
    `name` VARCHAR(32) NOT NULL,
    `email` VARCHAR(32) NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Data contoh artikel
INSERT INTO article (`id`, `title`, `slug`, `content`, `draft`) VALUES
('art001', 'Mengenal Kopi Gayo, Permata dari Aceh', 'mengenal-kopi-gayo-permata-dari-aceh-art001',
 'Kopi Gayo adalah salah satu kopi arabika terbaik di dunia yang berasal dari dataran tinggi Gayo, Aceh Tengah. Ditanam di ketinggian 1.200 - 1.700 mdpl, kopi ini memiliki cita rasa yang kompleks dengan aroma rempah dan tingkat keasaman yang seimbang.\n\nKopi Nusantara bekerja sama langsung dengan lebih dari 50 petani Gayo untuk memastikan kualitas terbaik di setiap cangkir.', 'false'),
('art002', '5 Tips Menyeduh Kopi di Rumah ala Barista', '5-tips-menyeduh-kopi-di-rumah-ala-barista-art002',
 'Menyeduh kopi enak tidak harus di kafe. Berikut 5 tips dari head barista kami: gunakan biji kopi segar yang baru digiling, perhatikan suhu air (idealnya 90-96 derajat celcius), gunakan rasio kopi dan air 1:15, tuang air secara perlahan dan merata, dan yang terakhir... nikmati prosesnya!\n\nDengan peralatan sederhana seperti V60 atau french press, kamu sudah bisa menikmati kopi berkualitas kafe di rumah.', 'false'),
('art003', 'Perbedaan Arabika dan Robusta yang Wajib Kamu Tahu', 'perbedaan-arabika-dan-robusta-yang-wajib-kamu-tahu-art003',
 'Arabika dan Robusta adalah dua jenis kopi yang paling banyak dikonsumsi di dunia. Arabika tumbuh di dataran tinggi, punya rasa lebih kompleks dan asam buah, dengan kafein lebih rendah. Robusta tumbuh di dataran rendah, rasanya lebih pahit dan kuat, dengan kandungan kafein hampir dua kali lipat.\n\nDi Kopi Nusantara, kami menyediakan keduanya dari berbagai daerah di Indonesia.', 'false'),
('art004', 'Rencana Ekspansi Kedai Kopi Nusantara 2026', 'rencana-ekspansi-kedai-kopi-nusantara-2026-art004',
 'Draft artikel internal: tahun ini Kopi Nusantara berencana membuka 10 kedai baru di kota-kota besar Indonesia. Artikel ini masih dalam tahap penulisan.', 'true');

-- Data contoh feedback
INSERT INTO feedback (`id`, `name`, `email`, `message`) VALUES
('fb001', 'Dian Pratama', 'dian@gmail.com', 'Kopi Gayo-nya mantap sekali! Pengiriman juga cepat. Semoga bisa buka cabang di Bandung.'),
('fb002', 'Siti Rahma', 'siti.rahma@gmail.com', 'Suka banget sama artikel tips menyeduh kopinya. Sangat membantu untuk pemula seperti saya.');
