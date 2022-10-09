# PHP-Proficiency-test
### First install *phpoffice/phpspreadsheet* using composer
	 composer require phpoffice/phpspreadsheet

### Database
##### Database name: hr-project
#### You can migrate database by running:
	 php spark migrate
#### Or use the uplouded sql file *hr-project.sql* inside the project 

### Start project by running:
	 php spark serve

### *And you are ready to go.*

### API Endpoint
#### For all employees:
	 localhost:8080/employees

#### For single employee:
	 localhost:8080/employees/{id}


### Start unit test by running:
	 vendor/bin/phpunit
