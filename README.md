# Laravel GIT commit checker

## Installation

```bash
composer require zeroc0d3lab/commit-checker
```

For version <= 5.4:

Add to section `providers` of `config/app.php`:

```php
// config/app.php
'providers' => [
    ...
    Zerocod3lab\CommitChecker\Providers\CommitCheckerServiceProvider::class,
];
```

Publish configuration:

```bash
php artisan vendor:publish --provider="Zerocod3lab\CommitChecker\Providers\CommitCheckerServiceProvider" --tag=config
```

### Install GIT hooks
```bash
php artisan git:install-hooks
```

- Create default PSR config (It will be create phpcs.xml in your root project.).

```bash
php artisan git:create-phpcs
```

- Run test manually (made sure that you've added all changed files to git stage)

```bash
php artisan git:pre-commit
```
