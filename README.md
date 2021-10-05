### 4C Backend api for React Project

This app provides an api for your next react test project. This will help you to create "CRUD Post" and practice React skills.

## Api Endpoints

If you are using laravel internal dev server, then your api will be "localhost:8000/api/post

```bash
+-----------+---------------------+
| Method    | URI                 | 
+-----------+---------------------+
| GET|HEAD  | api/post            |
| POST      | api/post            |
| GET|HEAD  | api/post/{post}     |
| PUT|PATCH | api/post/{post}     |
| DELETE    | api/post/{post}     |
| GET|HEAD  | sanctum/csrf-cookie |
+-----------+---------------------+
```
I have updated the docs and you can get the latest swagger json docs from here. You also can also use 

```bash
storage\api-docs\api-docs.json
```
or goto url

```bash
url.test/api/documentation
```
For an api client and check the api.

## How do I install ?

Here is a blog post on how to install laravel on Heroku platform. This is very similer to the example bellow.

[Install Laravel on a live web server](https://debjit012.medium.com/how-did-i-host-my-blood-donation-diary-app-on-heroku-for-free-be03f8f4e1c9)

But you can also try it on your local machine.

```bash
git clone https://github.com/debjit/4c-backend.git
cd 4c-backend
composer install
```

Copy the env file 

```bash
copy .env.example .env
```
Generate key 

```bash
php artisan key:generate
```
Set the database value in your .env file or your deployment enviornment.

Migrate the database

```bash
php artisan migrate --seed
```

If you wanted to generate new api docs please run this command.

```bash
php artisan l5-swagger:generate 
```
Your app is ready to use.
