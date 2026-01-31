# Example Laravel Project Generation Showcase

## 🚀 Live Test Coverage

### https://quintenmbusiness.github.io/laravel-project-generation-example-project/

The link above always shows the latest automatically generated test coverage report from the most recent build on GitHub.

---

## About This Project

This project is an example to showcase what would be generated using:

https://packagist.org/packages/quintenmbusiness/laravel-project-generation

No manual code is written in this repository.  
The only manually created file is the migration, which is used as the source for generating all application code automatically.

---

## Overview

This repository demonstrates a fully generated Laravel application structure.

Everything you see in the application is produced automatically from the migration files:

- Models
- Controllers
- Factories
- Tests
- DTOs
- Repositories
- And more

### Key Points

- Fully automatic code generation via migrations
- 100% generated application structure
- No manual edits required
- Test coverage is generated and published automatically
- CI pipeline validates all generated code

---

## How to Use

Before generating new code, delete all classes that are expected to be generated first, such as:

- Models
- Tests
- Controllers
- Factories
- Other generated artifacts

Then follow these steps:

1. Clone the repository
2. Run composer install to install dependencies
3. Set up your .env.ci file
4. Run the following commands:

php artisan key:generate  
php artisan migrate --force  
vendor/bin/phpunit --coverage-html=storage/coverage/html

After running locally, you can open the coverage report at:

storage/coverage/html/index.html

---

## Continuous Integration

This repository automatically runs the following on every push:

- PHPUnit tests
- Code coverage generation
- Publishing of coverage to GitHub Pages

The published coverage link at the top of this README always reflects the latest state of the project.

---

## Purpose

The purpose of this repository is purely to demonstrate and validate the output of the Laravel Project Generation package.

It exists as:

- A reference project
- A testing ground
- A proof of concept
- An example of what fully generated Laravel code can look like

No custom application logic is intended to be added manually.
