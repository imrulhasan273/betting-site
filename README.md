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
