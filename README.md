# Symfony 5 Fullstack Skeleton
A pre-configured Symfony 5 Skeleton with User Auth, Api and SQLite Database for an easy kickstart.

## Included
- Symfony 5
- Symfony Webpack Encore
  - Sass loader enabled
  - Vue ^2.6 enabled
  - Vue-Axios bridge 
- symfony/messenger
- symfony/workflow
- Api Platform
- User Auth
- Bootstrap 5 

## Requirements
- Symfony 5 Requirements
- Symfony CLI
- yarn

## Installation
- clone the repo
- ``composer install``
- ``yarn install``
- create ``local.env`` add your ``DATABASE_URL``
- ``php bin/console doctrine:migrations:migrate``

## Start your local machine
- ``symfony serve -d && yarn dev-server``

## Commands
- ``app:create:user <email> <password>`` to create a new User from the Command Line
