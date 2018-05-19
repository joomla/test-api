# API testing package for Joomla

### Abstract

This repo is meant to hold the Joomla 4 API (webservices) tests.

### Installation

#### A) From Joomla Main repo

Run a `composer install` in the joomla directory and adjust the REST url in 
`libraries/vendor/joomla/test-api/tests/api.suite.yml` and copy the `codeception.yml` to the Joomla main directory. 

#### B) Standalone
Run a `composer install` and adjust the paths in the codeception.yml (to `tests`). Also adjust the REST url in 
`libraries/vendor/joomla/test-api/tests/api.suite.yml`

>Tests with authentication require a user `admin` with password `admin` as credentials for now. 

### Running

`vendor/bin/codecept run api`

You can also run the command with `--debug` to get some extended information.
