USE pbswebde_finalproject228;

CREATE TABLE User (
	user_id INT NOT NULL AUTO_INCREMENT,
	zipcode_id INT NULL,
	user_first_name varchar(50) NOT NULL,
	user_last_name varchar(50) NOT NULL,
	user_password TEXT NOT NULL,
	user_email varchar(50) NOT NULL,
	user_phone varchar(14),
	user_address varchar(100),
	CONSTRAINT user_ukey UNIQUE (user_first_name, user_last_name, user_email),
	PRIMARY KEY (user_id)
)ENGINE=InnoDB;
CREATE TABLE Movie (
	movie_id INT NOT NULL AUTO_INCREMENT,
	studio_id INT,
	movie_name varchar(255) NOT NULL,
	movie_release_date DATE,
	movie_description TEXT,
	movie_image_location varchar(255),
	movie_thumbnail varchar(255),
	CONSTRAINT movie_ukey UNIQUE (movie_name, studio_id),
	PRIMARY KEY (movie_id)
)ENGINE=InnoDB;
CREATE TABLE Studio (
	studio_id INT NOT NULL AUTO_INCREMENT,
	zipcode_id INT,
	studio_name varchar(100) NOT NULL,
	studio_phone varchar(14),
	studio_email varchar(50),
	studio_address varchar(100) NOT NULL,
	CONSTRAINT studio_ukey UNIQUE (studio_name, studio_address),
	PRIMARY KEY (studio_id)
)ENGINE=InnoDB;
CREATE TABLE Zipcode (
	zipcode_id INT NOT NULL AUTO_INCREMENT,
	zipcode INT NOT NULL,
	zipcode_city varchar(100) NOT NULL,
	zipcode_state varchar(100) NOT NULL,
	CONSTRAINT zipcode_ukey UNIQUE (zipcode),
	PRIMARY KEY (zipcode_id)
)ENGINE=InnoDB;
CREATE TABLE User_Movie (
	user_movie_id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	movie_id INT NOT NULL,
	CONSTRAINT user_movie UNIQUE (user_id, movie_id),
	PRIMARY KEY (user_movie_id)
)ENGINE=InnoDB;
ALTER TABLE User ADD CONSTRAINT User_fk0 FOREIGN KEY (zipcode_id) REFERENCES Zipcode(zipcode_id) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE Movie ADD CONSTRAINT Movie_fk0 FOREIGN KEY (studio_id) REFERENCES Studio(studio_id) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE Studio ADD CONSTRAINT Studio_fk0 FOREIGN KEY (zipcode_id) REFERENCES Zipcode(zipcode_id) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE User_Movie ADD CONSTRAINT User_Movie_fk0 FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE User_Movie ADD CONSTRAINT User_Movie_fk1 FOREIGN KEY (movie_id) REFERENCES Movie(movie_id) ON DELETE CASCADE ON UPDATE CASCADE;

