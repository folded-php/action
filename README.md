# folded/action

A pattern to organize your controllers with functions for you web app.

[![Build Status](https://travis-ci.com/folded-php/action.svg?branch=master)](https://travis-ci.com/folded-php/action) [![Maintainability](https://api.codeclimate.com/v1/badges/abb7867ef7c3c0d21214/maintainability)](https://codeclimate.com/github/folded-php/action/maintainability) [![TODOs](https://img.shields.io/endpoint?url=https://api.tickgit.com/badge?repo=github.com/folded-php/action)](https://www.tickgit.com/browse?repo=github.com/folded-php/action)

## Summary

- [About](#about)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Examples](#examples)
- [Version support](#version-support)

## About

I created this package to organize my controllers by files. It also helps not loading all the resources needed for all my routes at each requests.

Folded is a constellation of packages to help you setting up a web app easily, using ready to plug in packages.

- [folded/config](https://github.com/folded-php/config): Configuration utilities for your PHP web app.
- [folded/crypt](https://github.com/folded-php/crypt): Encrypt and decrypt strings for your web app.
- [folded/exception](https://github.com/folded-php/exception): Various kind of exception to throw for your web app.
- [folded/history](https://github.com/folded-php/history): Manipulate the browser history for your web app.
- [folded/http](https://github.com/folded-php/http): HTTP utilities for your web app.
- [folded/orm](https://github.com/folded-php/orm): An ORM for you web app.
- [folded/session](https://github.com/folded-php/session): Session functions for your web app.
- [folded/request](https://github.com/folded-php/request): Request utilities, including a request validator, for your PHP web app.
- [folded/routing](https://github.com/folded-php/routing): Routing functions for your PHP web app.
- [folded/view](https://github.com/folded-php/view): View utilities for your PHP web app.

## Features

- Include the content of a file (can use dot syntax)

## Requirements

- PHP version >= 7.4.0
- Composer installed

## Installation

- [1. Install the package](#1-install-the-package)
- [2. Add the setup code](#2-add-the-setup-code)

### 1. Install the package

In your root folder, run this command:

```bash
composer require folded/action
```

### 2. Add the setup code

As soon as possible, include this code:

```php
use function Folded\setActionFolderPath;

setActionFolderPath(__DIR__  . "/actions");
```

## Examples

- [1. Call an action](#1-call-an-action)
- [2. Call an action by dot syntax](#2-call-an-action-by-dot-syntax)

### 1. Call an action

In this example, we will "call" (understand, including the content of the file) a file by its path.

```php
use function Folded\callAction;

callAction("home/index");
```

Which assumes your "action" file is located at `actions/home/index.php`.

### 2. Call an action by dot syntax

In this example, we will call an action by dot syntax. This is equivalent to swapping `/` for `.`.

```php
use function Folded\callAction;

callAction("home.index");
```

Which assumes your "action" file is located at `actions/home/index.php`.

## Version support

|        | 7.3 | 7.4 | 8.0 |
| ------ | --- | --- | --- |
| v0.1.0 | ❌  | ✔️  | ❓  |
| v0.1.1 | ❌  | ✔️  | ❓  |
