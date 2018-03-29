# Project Siller
Online Scouting Platform for FRC Robotics

![PHP7.1](https://img.shields.io/badge/php-7.2-blue.svg)
![version Beta](https://img.shields.io/badge/Beta-V1.1.0-yellow.svg)

# Introduction
Official URL: [Siller.io](https://siller.io)

Project Phase: Early Beta

This project is maintained by members of **The Metal Moose** 1391 of Westtown School and **Unity Networks LLC**

All hosting and security is provided by **Unity Networks LLC**

# Installation

Requirements:
* Nginx 1.11.0 or above
* Nginx HTTP2 Module
* PHP 7.2-fpm
* Percona Server for MySQL 5.7 or above
* Percona TokuDB Addon
* PHP Libraries:
	* Social Connect Auth Library 1.6 or above
	* Symfony Var-Dumper 3.2.2 or above
	* Guzzlehttp 6.2.2 or above
	* Google Apiclient 2.0 or above
	* Php-Whois 2.3 or above



Nginx Rewrite Rules
```
location / {
	try_files $uri $uri/ =404;
	rewrite ^/([a-zA-Z]+)$ /index.php?action=$1 last;
	rewrite ^/([a-zA-Z]+)/([a-zA-Z0-9]+)$ /index.php?action=$1&request=$2 last;
	rewrite ^/([a-zA-Z]+)/([a-zA-Z0-9]+)/([a-zA-Z0-9]+)$ /index.php?action=$1&request=$2&detail=$3 last;
}
````

Nginx Maintenance Mode (Place above all other location blocks)
```
# Maintenance Mode

allow 185.92.24.75;
allow 192.30.252.0/22;
allow 185.199.108.0/22;
deny all;

error_page 403 @maintenance;

location @maintenance {
    rewrite ^(.*)$ /pages/_error/maintenance.html break;
    allow all;
}
```
f
# Todo

- [ ] Rewrite entire source code
- [x] ~~Add router support~~
- [ ] Team authentication via social media
- [ ] Add direct FRC API support
- [ ] Add public API support
- [ ] Add QR code scan on local devices via PGP encryption method and compression
- [x] ~~Move hosting services from Amazon Lightsail to Unity Infrastructure~~

# License
This project does not currently have a license. The source code of this project is private.

# Disclaimer
**Unity Networks LLC** does not have any affilation with **The Metal Moose**, **Westtown School**, or **FRC**.

**Unity Networks LLC** is a private cloud security company operating in Seychelles and only assists in the hosting, security, and development of Project Siller.
