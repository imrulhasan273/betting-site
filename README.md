---
# Documentation
---

### Laravel Betting Script

```cmd
~$ php artisan make:migration create_role_user_table
$ php artisan make:middleware RoleChecker

```

# Custom MIddlewire

```php
middleware(['roleChecker:super_admin,admin,club']);
```

# **IMPORTANT COMMAND AFTER**

```cmd
~$ php artisan migrate:refresh --seed
```

# Image Package

```cmd
~$ composer require intervention/image
```

# Email Send

```cmd
~$ php artisan make:mail ForgetPassword --markdown=mail.forget.userPassword
```
