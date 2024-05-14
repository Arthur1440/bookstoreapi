# Bookstore-api

## How to Run the Project

1. Make sure you have PHP 8 and Composer installed.
2. Clone this repository.
3. Install Composer dependencies:

```bash
composer install
```

4. Copy the `.env.example` file and rename it to `.env`.
5. Configure the database credentials in the `.env` file.
6. Run the migrations:

```bash
php artisan migrate
```

7. Generate the application key:

```bash
php artisan key:generate
```

8. Run the PHP built-in server:

```bash
php artisan serve --port=8888
```

You can now access the API at `http://localhost:8888`.

## How to Use

### Authentication

#### User Login
```bash
curl -X POST http://localhost:8888/api/v1/login \
  -H "Content-Type: application/json" \
  -d '{"email": "michel@dundermifflin.com", "password": "123123"}'
```

#### User Logout
```bash
curl -X POST http://localhost:8888/api/v1/logout \
  -H "Authorization: Bearer {token}"
```

### Books

#### List All Books
```bash
curl -H "Authorization: Bearer {token}" http://localhost:8888/api/v1/books
```

#### Get Book by ID
```bash
curl -H "Authorization: Bearer {token}" http://localhost:8888/api/v1/books/{id}
```

#### Create New Book
```bash
curl -X POST http://localhost:8888/api/v1/books \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}" \
  -d '{"name": "Test Book", "ISBN": "1234567890", "value": 29.99}'
```

#### Update Existing Book
```bash
curl -X PUT http://localhost:8888/api/v1/books/{id} \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}" \
  -d '{"name": "{token}"}'
```

#### Delete Book
```bash
curl -X DELETE http://localhost:8888/api/v1/books/{id} \
  -H "Authorization: Bearer {token}"
```

### Stores

#### List All Stores
```bash
curl -H "Authorization: Bearer {token}" http://localhost:8888/api/v1/stores
```

#### Get Store by ID
```bash
curl -H "Authorization: Bearer {token}" http://localhost:8888/api/v1/stores/{id}
```

#### Create New Store
```bash
curl -X POST http://localhost:8888/api/v1/stores \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}" \
  -d '{"name": "My Store", "address": "123 Test Street", "active": true}'
```

#### Update Existing Store
```bash
curl -X PUT http://localhost:8888/api/v1/stores/{id} \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}" \
  -d '{"name": "New Store Name"}'
```

#### Delete Store
```bash
curl -X DELETE http://localhost:8888/api/v1/stores/{id} \
  -H "Authorization: Bearer {token}"
```

Replace `{id}` with the corresponding ID and `{token}` with the authentication token obtained after login.

