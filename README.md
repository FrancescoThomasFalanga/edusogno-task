# Task for Edusogno by Francesco Thomas Falanga

### Install
To install the repository, just:

- download it
- open the folder with the editor you prefer
- composer install (in the terminal)
- add the DB to MySQL. The file will be inside the "database" folder
- IMPORTANT ***Read About and P.S. sections***

### About
Within the database provided there are 4 already registered users + an admin user who will allow access to the area dedicated to events (create,edit,view,delete).
So, for the login use these credentials:

***Users:***
email: ulysses200915@varen8.com
password: Edusogno123

*the other users are those provided by edusogno in the task*


***Admin:***
email: admin@gmail.com
password: password


### P.S.

*As regards sending the email, I used PHPMailer since mail() appears to be a bit deprecated. To get everything sorted out properly, follow the steps below:*

- activate 2FA on your gmail account, to do this: (click on the profile photo, manage your google account, security)
- click on 2FA once activated and scroll down to the end where Password for apps will be written
- create a new password and keep it

Replace the following values ​​in the file: send-password-reset.php , with your email and your generated password.

- $mail->Username = 'yourEmail';
- $mail->Password = 'passwordCreated';
- $mail->addAddress("yourEmail", "yourName");
