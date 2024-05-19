# Webuscript

This silly webserver allows you to register users, set your language, and see other's languages.

# Usage

## Website setup

Install [XAMPP](https://www.apachefriends.org/download.html), and copy this repo into its `htdocs`.

## Database setup

Create a MySQL database, then run `init.sql` in it.

## Binding

In `htdocs`, create a file named `sql_credentials.json` in the following format:

```
{
	"ip": "[IP of MySQL database server]",
	"user": "[User of database server]"
	"password": "[Password for user]",
	"database": "[The database in which you ran init.sql]"
}
```

## Start

Lastly, use XAMPP to start Apache and MySQL.