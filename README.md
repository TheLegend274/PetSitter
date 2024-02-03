# PetSitter

The Pet Sitter Response Tracking System (PSRTS) logs the services rendered to cats and dogs.

A special identification number is given to each pet-sitting request and kept in a database. The order number, kind of order (selected from a list that may vary dynamically), service condition ('pending,' 'assigned,' or 'finished'), an in-built date function, and a list of free-form comments are all tracked by the system for each service. The name of the respondent who wrote each comment is linked to it.

There are three categories of responders in the PSIRT system: handlers, sitters, and clients. Clients can post comments to the service as well as create and manage requests. Clients are referred to pet sitters by handlers, who have the option to accept or reject requests for services. A service is accepted when the order status is changed to "Assigned," and the sitter receives access to the client's contact details to add a service report. The sitter changes the order status after the service is finished, and the client verifies it once more. Once "Completed," the order status is updated and preserved.


For the project to run please download XXAMP, copy all the content from SitterDB-INSERT-SQL.sql, insert it into the database, and change the passwords.
