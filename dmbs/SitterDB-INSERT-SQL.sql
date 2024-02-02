
-- -----------------------------------------------------
-- INSERT for Users Table
-- -----------------------------------------------------
INSERT INTO `SitterDB`.`Users` (`Username`, `Password`, `Role`, `FirstName`, `LastName`, `PhoneNumber`, `EmailAddress`, `IPAddress`) VALUES
('john_doe', 'pass123', 'S', 'John', 'Doe', '555-1234', 'john.doe@email.com', '192.168.1.101'),
('jane_smith', 'pass456', 'C', 'Jane', 'Smith', '555-5678', 'jane.smith@email.com', '192.168.1.102'),
('bob_jones', 'pass789', 'S', 'Bob', 'Jones', '555-9876', 'bob.jones@email.com', '192.168.1.103'),
('alice_white', 'abc123', 'S', 'Alice', 'White', '555-5432', 'alice.white@email.com', '192.168.1.104'),
('sam_black', 'xyz789', 'H', 'Sam', 'Black', '555-8765', 'sam.black@email.com', '192.168.1.105'),
('emily_green', 'pass321', 'S', 'Emily', 'Green', '555-4321', 'emily.green@email.com', '192.168.1.106'),
('charlie_brown', 'abc789', 'H', 'Charlie', 'Brown', '555-2345', 'charlie.brown@email.com', '192.168.1.107'),
('olivia_gray', 'xyz123', 'C', 'Olivia', 'Gray', '555-6789', 'olivia.gray@email.com', '192.168.1.108'),
('michael_adams', 'pass987', 'C', 'Michael', 'Adams', '555-3456', 'michael.adams@email.com', '192.168.1.109'),
('sophia_miller', 'pass654', 'C', 'Sophia', 'Miller', '555-7890', 'sophia.miller@email.com', '192.168.1.110');


-- -----------------------------------------------------
-- INSERT for Sitters Table
-- -----------------------------------------------------
INSERT INTO `SitterDB`.`Sitters` (`Specilization`, `UserID`) VALUES
('D', 1),
('C', 3),
('DC', 4),
('D', 6);

-- -----------------------------------------------------
-- INSERT for Clients Table
-- -----------------------------------------------------
INSERT INTO `SitterDB`.`Clients` (`petType`, `UserID`) VALUES
('D', 2),
('DC', 8),
('DC', 9),
('C', 10);

-- -----------------------------------------------------
-- INSERT for Requests Table
-- -----------------------------------------------------
INSERT INTO `SitterDB`.`Requests` (`TypeOfRequest`, `Date`, `ServiceState`, `SitterID`, `ClientID`) VALUES
('Grooming', '2023-01-15', 'P', 1, 1),
('Walking', '2023-02-20', 'A', 2, 2),
('Grooming', '2023-03-25', 'C', 3, 3),
('Sitting', '2023-04-10', 'P', 4, 4),
('Sitting', '2023-05-05', 'A', 3, 2),
('Walking', '2023-06-12', 'P', 4, 4),
('Grooming', '2023-07-08', 'A', 4, 3),
('Walking', '2023-08-14', 'C', 1, 2),
('Sitting', '2023-09-19', 'P', 1, 2),
('Walking', '2023-10-22', 'A', 2, 1);

-- -----------------------------------------------------
-- INSERT for Comments Table
-- -----------------------------------------------------
INSERT INTO `SitterDB`.`Comments` (`Comment`, `UserID`, `RequestNumber`) VALUES
('Great service! My pet loved it.', 1, 1),
('Excellent job taking care of my cat.', 3, 2),
('Make sure to take him to the park!', 2, 3),
('Grooming was awesome, dog hair looks great.', 6, 4),
('Sitting was a success. Thank you!', 8, 5),
('Fantastic walking session.', 10, 6);

