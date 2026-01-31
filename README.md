# Example Laravel Project Generation Showcase

[![Coverage Report](https://img.shields.io/badge/Coverage-Latest-brightgreen)](./storage/coverage/html/index.html)

## Test Coverage

**View the latest test coverage report:**  
[Click here to open the full coverage report](./storage/coverage/html/index.html)

> This project is an example to showcase what would be generated using  
> [quintenmbusiness/laravel-project-generation](https://packagist.org/packages/quintenmbusiness/laravel-project-generation).

No manual code is written in this repository; the only manually created file is the migration, which is used to generate all application code automatically.

---

## Overview

This repository demonstrates a fully generated Laravel application structure.  
All models, controllers, factories, and other components are automatically generated based on the provided migrations.

- **Automatic code generation** via migrations
- **Test coverage available** for all generated code
- **No manual edits needed**

---

## How to Use
Delete all classes that are expected to be generated first like models/tests ect

1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Set up your `.env.ci` file.
4. Run tests and generate coverage:

```bash
php artisan key:generate
php artisan migrate --force
vendor/bin/phpunit --coverage-html=storage/coverage/html
