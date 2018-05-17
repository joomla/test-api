# API testing package for Joomla

### Abstract

This repo is meant to hold the Joomla 4 API (webservices) tests.

### Installation

Run a `composer install` in the main direcotry and adjust the REST url in `tests/api.suite.yml`. 

Tests with authentication require a user admin and password admin as credentials for now. 

### Running

`vendor/bin/codecept run --debug`
