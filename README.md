# 🛒 Order Management System – CodeIgniter 4 + Tailwind CSS

## 📌 Overview

This project is a **simple order management system** built with **CodeIgniter 4**.  
It allows users to place product orders and automatically sends **email notifications** using **SMTP** once the order is successfully placed.

The system is designed with a **modern UI** powered by **Tailwind CSS**, ensuring a clean and responsive interface.

---

## ✨ Features

- ✅ Place product orders
- ✅ Automatic **email notifications** via SMTP after successful order
- ✅ Responsive design with **Tailwind CSS**
- ✅ Built on **CodeIgniter 4** framework
- ✅ Easy to customize and deploy

---

## 🛠️ Tech Stack

- **Backend:** CodeIgniter 4 (PHP 8+)
- **Frontend:** Tailwind CSS
- **Database:** MySQL/MariaDB
- **Email Service:** SMTP

---

## 🚀 Installation

### 1. Clone the repository

```bash
git clone https://github.com/your-username/ci4-order-system.git
cd ci4-order-system

2. composer install
3. Set up your .env file:
database.default.hostname = localhost
database.default.database = your_database
database.default.username = your_username
database.default.password = your_password
database.default.DBDriver = MySQLi

email.protocol = smtp
email.SMTPHost = smtp.yourhost.com
email.SMTPUser = your@email.com
email.SMTPPass = yourpassword
email.SMTPPort = 587
email.mailType = html

4. php spark migrate
5. php spark serve
6. http://localhost:8080
```

## NOTE!!!

```bash
Edit File App/Config/Email.php
public string $fromEmail = 'username@namadomain';
public string $fromName = 'Order System';

public string $protocol = 'smtp';
public string $SMTPHost = 'mail.namadomain';
public string $SMTPUser = 'username@namadomain';
public string $SMTPPass = 'PasswordemailHosting'; // pakai password email hosting
public int $SMTPPort = 465; // coba dulu SSL
public int $SMTPTimeout = 10;
public bool $SMTPKeepAlive = false;
public string $SMTPCrypto = 'ssl'; // gunakan ssl untuk port 465

public bool $wordWrap = true;
public int $wrapChars = 76;
public string $mailType = 'html';
public string $charset = 'UTF-8';
public bool $validate = true;
public int $priority = 3;
public string $CRLF = "\r\n";
public string $newline = "\r\n";
```
