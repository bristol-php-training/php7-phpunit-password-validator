# Password Validator kata

The purpose of this project is to introduce developers to mocking using PHPUnit.


## Setup

Here are the steps you need to go through to get the tests running. If you are having trouble then refer to the project [Sample PHPUnit Setup](https://github.com/bristol-php-training/phpunit-sample-setup)

### Requirements

#### Virtual Machine (preference)

You need to install [vagrant](https://www.vagrantup.com/) on your machine.

Then from this directory provision the VM and log in to it:

```
vagrant up
vagrant ssh
```

This will provision a VM running Ubuntu 17.10. It will install PHP 7.1 and composer. Finally it will run composer.

Once logged into the VM run PHPUnit:

```
cd /vagrant/sample-unit-test-project
./vendor/bin/phpunit
```


You should see an output along the lines of:

```
PHPUnit 7.0.1 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 193 ms, Memory: 4.00MB

OK (1 test, 1 assertion)
```

The important bit is the `OK (1 test, 1 assertion)`. If you see that then you've installed everything correctly to run PHPUnit!





#### Local
Install the following:

- PHP 7.0 or higher
- [Composer](https://getcomposer.org/) 


In the root directory of the project run composer. This will pull down all the dependencies:

```
composer install
```


You should now be able to run the unit tests. From the root directory of this project run:

```
./vendor/bin/phpunit
```

You should see an output like this:

```
PHPUnit 7.0.1 by Sebastian Bergmann and contributors.



Time: 56 ms, Memory: 2.75MB

OK (1 test, 1 assertion)
```

The important bit is `OK (1 test, 1 assertion)` this means the tests have run successfully. 



## Challenge 1

Write tests and code to fulfil the functionality as per comment in `src/PasswordValidator/PasswordValidator.php`. 


## Challenge 2

A team has developed a password strength calculator. The interface to which can be found at `src/PasswordStrengthCalculator/PasswordStrengthCalculator.php`.
Add an additional requirement that the password's strength must be 3 or greater for the password to be deemed valid.


## Challenge 3

Add an additional requirement that the password can not be one of the User's previous 5 passwords. 

For the scope of this just create a dummy `User` class and an interface `PreviousPasswordCheckerInterface` for checking the the password has been previously used. 
