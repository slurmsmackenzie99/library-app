![Alt](https://i.imgur.com/Nb0yqKk.jpeg)
# Library Management System
## This Library Management System is designed to manage authors and various types of items such as books, comics, and short story collections.

### Implemented Features
 - Created models for Author, Book, Comic, and ShortStoryCollection
 - Developed controllers for Author and Item handling
 - Implemented request validation for creating and updating items
 - Created services for business logic encapsulation
 - Implemented repositories for database operations
 - Created migrations for database schema
 - Implemented seeders for initial data setup
 - Defined routes for RESTful API endpoints
 - Wrote automated tests for controllers, services, and repositories

## Directory Structure
```markdown 
- app/
    - Http/
        - Controllers/
            - AuthorController.php
            - ItemController.php
        - Requests/
            - CreateItemRequest.php
            - UpdateItemRequest.php
    - Models/
        - Author.php
        - Book.php
        - Comic.php
        - ShortStoryCollection.php
    - Services/
        - AuthorService.php
        - ItemService.php
    - Repositories/
        - AuthorRepository.php
        - ItemRepository.php
- database/
    - migrations/
        - create_authors_table.php
        - create_books_table.php
        - create_comics_table.php
        - create_short_story_collections_table.php
    - seeders/
        - DatabaseSeeder.php
```
## Instructions for Running the Application
1. Clone the repository.
2. Run composer install to install dependencies.
3. Set up your database configuration in .env file.
4. Run `php artisan migrate` to migrate the database.
5. Run `php artisan db:seed` to seed the database.
6. Run `php artisan test` to run tests.
7. Serve the application using `php artisan serve`.