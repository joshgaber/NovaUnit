# Changelog

All notable changes to NovaUnit will be documented in this file.

## 3.1

- Compatibility with Laravel 10

## 3.0.2

- Allow `FieldElement` as a valid field instance

## 3.0.1

- Use built-in `NovaRequest` for mocking components

## 3.0

- Compatibility with Laravel Nova 4

## 2.3

- Compatibility with Laravel 9

## 2.2

- Support for PHP 8

## 2.1

- Added assertion method for checking creation and update rules
- **bugfix**: Report invalid action response as an assertion failure

## 2.0

- Compatibility with Laravel 8

## 1.1 - 2020-06-22

- Added assertions on Lens query results have been moved to their own class
- Added assertions on the configuration of fields added to Actions, Lenses and Resources
- Added assertions on the configuration of actions added to Lenses and Resources
- Added assertions on Nova Filters
- Added assertions on filter sets on Lenses and Resources
- Minor bug fixes and refactor

## 1.0.2 - 2020-06-17

- Allow field assertions to read fields within panels on Resources and Lenses
- **bugfix**: prevent action assertions from accessing fields

## 1.0.1 - 2020-06-15

- **bugfix**: allow users to pass single model instances to Nova Action handle

## 1.0 - 2020-06-01

- initial release, with tests for Actions, Lenses and Resources.
