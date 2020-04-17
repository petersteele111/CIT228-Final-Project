USE pbswebde_finalproject228;

INSERT INTO Zipcode (zipcode, zipcode_city, zipcode_state) VALUES (49690, 'Williamsburg', 'Michigan');

INSERT INTO Zipcode (zipcode, zipcode_city, zipcode_state) VALUES (49846, 'Traverse City', 'Michigan');

INSERT INTO Zipcode (zipcode, zipcode_city, zipcode_state) VALUES (49788, 'Kincheloe', 'Michigan');

INSERT INTO Zipcode (zipcode, zipcode_city, zipcode_state) VALUES (90045, 'Los Angeles', 'California');

INSERT INTO Zipcode (zipcode, zipcode_city, zipcode_state) VALUES (32830, 'Lake Buena Vista', 'Florida');

INSERT INTO User (zipcode_id, user_first_name, user_last_name, user_password, user_email, user_phone, user_address) VALUES (5, 'peter', 'steele', '1234', 'petersteele111@gmail.com', '231-357-1970', '6847 Cram Road');

INSERT INTO User (zipcode_id, user_first_name, user_last_name, user_password, user_email, user_phone, user_address) VALUES (3, 'mary', 'jones', '4321', 'mjones@yahoo.com', '906-357-1970', '14 Forest Lodge Road');

INSERT INTO User (zipcode_id, user_first_name, user_last_name, user_password, user_email, user_phone, user_address) VALUES (1, 'raphtalia', 'smith', '123asd', 'raphtalia@msn.com', '231-753-0791', '123 Fairy Tale Lane');

INSERT INTO User (zipcode_id, user_first_name, user_last_name, user_password, user_email, user_phone, user_address) VALUES (4, 'naofumi', 'smith', '7895red', 'naofumi@gmail.com', '709-492-8460', '57 Jacobs Ave');

INSERT INTO User (zipcode_id, user_first_name, user_last_name, user_password, user_email, user_phone, user_address) VALUES (2, 'katya', 'lingg', '4!wfr21', 'lingg.katya@aol.com', '231-946-0052', '84325 Sally Circle');

INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES (1, 'Paramount', '521-645-9642', 'info@paramount.com', '7954 Movie Lane');

INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES (4, '20th Century Fox', '632-452-5555', 'info@fox.com', '114 Cypress Road');

INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES (3, 'Lucas Films', '555-331-4485', 'george@lucasfilms.com', '904 Trebuchet Circle');

INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES (5, 'Takei Studios', '908-111-2477', 'info@takei.org', '664 Flice Fork');

INSERT INTO Studio (zipcode_id, studio_name, studio_phone, studio_email, studio_address) VALUES (2, 'Steele Productions', '448-454-0001', 'steele@example.com', '8642 Choctaw Road');

INSERT INTO Movie (studio_id, movie_name, movie_release_date, movie_description, movie_image_location, movie_thumbnail) VALUES (2, 'The Godfather', '1972-03-24', 'The Godfather Don Vito Corleone is the head of the Corleone mafia family in New York. He is at the event of his daughter''s wedding. Michael, Vito''s youngest son and a decorated WW II Marine is also present at the wedding. Michael seems to be uninterested in being a part of the family business. Vito is a powerful man, and is kind to all those who give him respect but is ruthless against those who do not. But when a powerful and treacherous rival wants to sell drugs and needs the Don''s influence for the same, Vito refuses to do it. What follows is a clash between Vito''s fading old values and the new ways which may cause Michael to do the thing he was most reluctant in doing and wage a mob war against all the other mafia families which could tear the Corleone family apart.','','');

INSERT INTO Movie (studio_id, movie_name, movie_release_date, movie_description, movie_image_location, movie_thumbnail) VALUES (1, 'The Wizard of Oz', '1939-08-25', 'When a tornado rips through Kansas, Dorothy and her dog, Toto, are whisked away in their house to the magical land of Oz. They follow the Yellow Brick Road toward the Emerald City to meet the Wizard, and en route they meet a Scarecrow that needs a brain, a Tin Man missing a heart, and a Cowardly Lion who wants courage. The wizard asks the group to bring him the broom of the Wicked Witch of the West to earn his help.','','');

INSERT INTO Movie (studio_id, movie_name, movie_release_date, movie_description, movie_image_location, movie_thumbnail) VALUES (3, 'The Shawshank Redemption', '1994-10-14', 'Chronicles the experiences of a formerly successful banker as a prisoner in the gloomy jailhouse of Shawshank after being found guilty of a crime he did not commit. The film portrays the man''s unique way of dealing with his new, torturous life along the way he befriends a number of fellow prisoners, most notably a wise long-term inmate named Red.','','');

INSERT INTO Movie (studio_id, movie_name, movie_release_date, movie_description, movie_image_location, movie_thumbnail) VALUES (5, 'Pulp Fiction', '1994-10-14', 'Jules Winnfield (Samuel L. Jackson) and Vincent Vega (John Travolta) are two hit men who are out to retrieve a suitcase stolen from their employer, mob boss Marsellus Wallace (Ving Rhames). Wallace has also asked Vincent to take his wife Mia (Uma Thurman) out a few days later when Wallace himself will be out of town. Butch Coolidge (Bruce Willis) is an aging boxer who is paid by Wallace to lose his fight. The lives of these seemingly unrelated people are woven together comprising of a series of funny, bizarre and uncalled-for incidents.','','');

INSERT INTO Movie (studio_id, movie_name, movie_release_date, movie_description, movie_image_location, movie_thumbnail) VALUES (4, 'Schindler''s List', '1993-02-04', 'Oskar Schindler is a vain and greedy German businessman who becomes an unlikely humanitarian amid the barbaric German Nazi reign when he feels compelled to turn his factory into a refuge for Jews. Based on the true story of Oskar Schindler who managed to save about 1100 Jews from being gassed at the Auschwitz concentration camp, it is a testament to the good in all of us.','','');

INSERT INTO User_Movie (user_id, movie_id) VALUES (1,5);

INSERT INTO User_Movie (user_id, movie_id) VALUES (5,1);

INSERT INTO User_Movie (user_id, movie_id) VALUES (2,4);

INSERT INTO User_Movie (user_id, movie_id) VALUES (4,2);

INSERT INTO User_Movie (user_id, movie_id) VALUES (3,3);