## Library API
The Library API is a RESTful API built with Laravel to manage library operations. This project offers features for user authentication, book management, author and genre administration, and book reservations. Regular users can browse, reserve books, and leave reviews. Librarians and administrators have additional capabilities, including adding, updating, and deleting records related to books, authors, and genres, as well as managing book issuance and returns. An email verification process ensures secure access to the system.

### Key Features
- User Authentication: Registration, login, logout, and profile information.

- User Roles: Standard users can view and reserve books, while librarians/administrators can perform full CRUD operations and manage book lending.

- Genres and Authors: Full CRUD operations for managing genres and authors (admin-only).

- Books: CRUD operations for adding and maintaining book records (admin-only).

- Book Reservations and Issuance: Users can make and view reservations; librarians handbook lending and returns.

- Reviews: Polymorphic review functionality, implemented for books (can be quickly added for another model if needed).

- Email Verification: Verify user email status and resend verification links.
## Documentation and Example Requests

Comprehensive documentation and examples of API requests and responses have been created using Postman. This documentation is available in Ukrainian and provides detailed examples of how to interact with the Library API effectively.

[View the Postman Documentation](https://documenter.getpostman.com/view/37298452/2sAY55Zd62)

