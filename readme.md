# import-exceldata-ci #
### A PHP (Codeigniter) code to read excel sheets and insert (or update) data to SQL table ###

### Technologies used ###
* [Codeigniter Version 3](https://codeigniter.com/) 
* PHP 7.2.7
* MySQL 5.0.12
* Uses [PhpSpreadsheet Library](https://github.com/PHPOffice/PhpSpreadsheet) 
* reference https://github.com/MazahirHaroon/Read_Excel-Codeigniter

### set up ###

* To run server side code locally you can use LAMP, WAMP, MAMP, or XAMP
* Clone the file and make the necessary changes. 
	
	- .\application\config\config.php
		* Change $base_url
    
 	- .\application\config\database.php
		* Change the databasse name, username and password
 
 * Create a database and import import-exceldata-ci.sql file into it, to create the table as per the sheet in the excel file. 
 
(Read this [Documentation](https://codeigniter.com/user_guide/) for issues regarding Codeigniter)
  
### How to run ###
Go to the link http://localhost/"your_base_url_here_if_any"/c_import
browse file and upload

### PhpSpreadsheet Library ###
Make sure that you download the latest version of `PhpSpreadsheet Library` file from
the releases section **[here](https://github.com/PHPOffice/PhpSpreadsheet)**.
(The vendor folder contains the downloaded PhpSpreadsheet Library files in this project)
