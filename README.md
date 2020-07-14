Description
-------------

DS test task

Installation
-------------
###### Environment

```composer install``` - install project dependencies

```cd <project_root>; cp .env.example .env``` - copy .env

Edit _.env_

```php bin/console doctrine:database:create``` - create database

```php bin/console list``` - show available commands

###### Migrations

```php bin/console doctrine:migrations:migrate``` - run migrations

###### How Run?

###### local
```php bin/console server:run```

API
-------------
#### [API docs](./docs/api/openapi.yaml)
