url-shortener
=============

A basic url-shortener.  Provide a unique set of characters to convert from and to.  Basically a base conversion.

Use: Connect the class to a database by implementing the methods in the DAO class.  The database should provide a primary key, a field to store the shortened url, and the original url.

Instantiate the DAO class, and pass it into the URLShortenerFactory.

Possible todos: Make it work for international characters.  Add error handling.
