
# Library Catalog

![library-catalog](https://socialify.git.ci/krios2146/library-catalog/image?description=1&font=Inter&language=1&name=1&owner=1&pattern=Solid&theme=Dark)

## Features

- Users can add new books to the catalog
- Users can view the list of books in the catalog
- Users can edit book information
- Users can remove books from the catalog

## Acknowledgements

This project was developed for learning purposes only and doesn't specifically follow any PHP best practices

## Lessons Learned

I wasn't familiar with PHP until this project; in fact, I hadn't used it at all. After writing a simple app, I understand why so many web apps are written in this language. It's really not that difficult, and, in a nutshell, it's just server-side rendering with HTML.

I don't really like the $ syntax for variable declarations and access at the same time. Also, typing -> instead of just . seems weird to me.

But in the end, developing a CRUD app with zero experience in PHP was really fast, and I had fun doing this.

## Run Locally

> **Note**
> I built this project in the WSL (Windows Subsystem for Linux). So the following instructions are for WSL or Linux users

1. Clone the project

```bash
git clone https://github.com/krios2146/library-catalog.git
```

2. Ensure you have PHP installed

```bash
sudo apt install php
```

3. Ensure you have apache2 server installed & running

```bash
sudo systemctl start apache2
sudo systemctl status apache2
```

4. Configure apache2

> By default, Ubuntu does not allow access through the web browser to _any_ file outside of those located in /var/www, [public_html](http://httpd.apache.org/docs/2.4/mod/mod_userdir.html) directories (when enabled) and /usr/share (for web applications). If your site is using a web document root located elsewhere (such as in /srv) you may need to whitelist your document root directory in /etc/apache2/apache2.conf.
> 
> The default Ubuntu document root is /var/www/html. You can make your own virtual hosts under /var/www.

4.1 Change the `DocumentRoot` from the standard `/var/www/html` to the path where you have cloned the repository that contains the `index.php` file. For example, `/home/krios2146/projects/library-catalog/app`

```bash
sudo vim /etc/apache2/sites-available/000-default.conf
```
![image](https://github.com/krios2146/library-catalog/assets/91407999/a8ad62b3-fc5c-4c8b-b638-07cc32841df4)

4.2 Grants permission

```bash
sudo vim /etc/apache2/apache2.conf
```

4.2.1 Add the new directory tag with path that has been defined in a previous step

4.2.2 Delete global level directory tag `/` that has “access denied” or something like that in options

![image](https://github.com/krios2146/library-catalog/assets/91407999/ac8efd3b-bf69-4e1e-9a77-8c0e4465b0d9)

4.2.3 [Give apache access to the root folder](https://stackoverflow.com/a/42396350/18731154)

```bash
chmod 711 /home/krios2146
```

5. Ensure you have installed MySQL server

```bash
sudo apt install mysql-server
```

```bash
sudo systemctl start mysql 
sudo systemctl enable mysql
sudo systemctl status mysql
```
5.1 Configuring MySQL on Ubuntu

On Ubuntu, you can't run `mysql` without `sudo`

This is due to the fact that `plugin` for user `root` is set to `auth_socket` instead of default `caching_sha2_password`

```bash
sudo mysql

UPDATE mysql.user SET plugin='caching_sha2_password' WHERE User='root';
FLUSH PRIVILEGES;
\q

sudo systemctl restart mysql
```
6. After all has been set you should be able to access the app on the `localhost`

## Roadmap (very low chance to be done)

- Implement user authentication to manage who can add, update, or delete books.
- Allow users to leave reviews and ratings for books.
- Track the borrowing history of books, showing who checked out a book and when.
- Generate reports on the most popular genres, authors, or borrowed books.
