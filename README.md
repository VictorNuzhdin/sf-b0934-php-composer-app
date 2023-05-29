# sf-b0927-nodejs-app
For Skill Factory study project (B9, Task B9.3.4)

<br>

### 01. Установка зависимостей вручную (Ubuntu 22.04)

```bash
..обновить ОС, установить PHP, установить extensions php (опционально)
$ sudo apt update
$ sudo apt-get install -y php7.3
$ sudo apt install -y php7.3-cli php7.3-fpm php7.3-json php7.3-pdo php7.3-mysql php7.3-zip php7.3-gd php7.3-mbstring php7.3-curl php7.3-xml php7.3-bcmath
$ apt policy php7.3-cli
$ php -v

..установить Composer
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php composer-setup.php --install-dir=bin --filename=composer
$ php -r "unlink('composer-setup.php');"
$ composer --version

..инициализировать Composer в проекте (будет создан файл "composer.json"), установить библиотеку "swiftmailer"
$ composer init
$ composer require swiftmailer/swiftmailer

..добавить необходимые переменные окружения с секретами и применить их к текущей сессии
$ nano .env
$ source .env
$ cat .env

=OUTPUT:
export MAIL_AUTH_USERNAME="<SET_your_gmail_login_mail>"
export MAIL_AUTH_PASSWORD="<SET_your_gmail_2factor_app_password>"

export MAIL_FROM="<SET_your_gmail_login_mail>"
export MAIL_FROM_NAME="PHP SwiftMailer"
export MAIL_TO="<SET_receiver_mail>"
export MAIL_TO_NAME="<SET_receiver_name>"

export MAIL_MSG_TITLE="Example msg using the SwiftMailer PHP Lib"
export MAIL_MSG_BODY_TEXT="Plain text message body"
export MAIL_MSG_BODY_HTML="<h1>HTML message version</h1>"

(!) в качестве MAIL_AUTH_PASSWORD выступает "Пароль приложения" который необходимо предварительно создать
    пароль от учетной записи gmail для входа через веб-интерфейс gmail использовать запрещено
    https://security.google.com/settings/security/apppasswords
```

### 01. Установка зависимостей автоматически с помощью composer.json

```bash
$ composer install
```

### 02. Запуск приложения

```bash
$ php mailer.php

=OUTPUT:
Message successfully sent
```

### 03. Результат работы приложения

Скриншот1: отправка сообщения с помощью "mailer.php"
![screen](_screens/01_mail-sent.png?raw=true)

Скриншот2: сообщение принято получателем на gmail.com: общий вид
![screen](_screens/02_mail-received.png?raw=true)

Скриншот3: сообщение принято получателем на gmail.com: вложение 1 (текст)
![screen](_screens/03_mail-received_attachment1.png?raw=true)

Скриншот4: сообщение принято получателем на gmail.com: вложение 2 (изображение)
![screen](_screens/04_mail-received_attachment2.png?raw=true)
