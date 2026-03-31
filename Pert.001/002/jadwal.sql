-- SQL Code to create the schedule table
CREATE TABLE jadwal (
    id INT PRIMARY KEY,
    mata_kuliah VARCHAR(100),
    dosen VARCHAR(100),
    waktu TIME,
    tempat VARCHAR(100)
);

-- Insert sample data
INSERT INTO jadwal (id, mata_kuliah, dosen, waktu, tempat) VALUES
(1, 'Pemrograman Web', 'Dosen A', '09:00', 'Ruang 101'),
(2, 'Algoritma', 'Dosen B', '11:00', 'Ruang 102');