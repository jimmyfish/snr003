INSERT INTO category (`id`, `name`, `varian`, `volume`)
	VALUES
		(1, 'MPX-2', 'AHM Oil MPX-2', '800'),
		(2, 'Transmission Gear Oil', 'Gear Matic Oil', '120'),
		(3, 'AHM Oil SPX-2', 'AHM Oil SPX-2', 'SPX2')
;

INSERT INTO products (`category_id`, `part_number`, `het`, `created_at`)
	VALUES
		(1, '082322MBK0LN1', 45000, '2019-09-10 00:00:00'),
		(1, '082322MBK0LN2', 45000, '2019-09-10 00:00:00'),
		(1, '082322MBK0LN3', 45000, '2019-09-10 00:00:00'),
		(2, '08294M99Z8YN1', 13000, '2019-09-10 00:00:00'),
		(2, '08294M99Z8YN2', 13000, '2019-09-10 00:00:00'),
		(2, '08294M99Z8YN3', 13000, '2019-09-10 00:00:00'),
		(3, '082342MBK0LN0', 54000, '2019-09-10 00:00:00')
;
		
