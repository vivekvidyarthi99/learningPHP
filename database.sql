USE database_testing;

CREATE TABLE IF NOT EXISTS myTable (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_type` VARCHAR(25),
  `item_title` VARCHAR(25),
  `item_lot` int,
  PRIMARY KEY (id),
  UNIQUE id (id)
);


INSERT INTO myTable(`id`,`item_type`, `item_title`, `item_lot`) VALUES
  ('1', 'Granite', 'Bianco Neve', '1234'),
  ('2', 'Quartz', 'Arbitrary Quartz Color', '1235');

