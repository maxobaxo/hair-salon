# Hair Salon
#### PHP exercise, using SQL databases with one-to-many relationships |  7.14.2017

by Max Scher

## Description
This web application is for a hair salon, allowing the owner to add stylists, and for each stylist, add clients who see that stylist. The stylists work independently, so each client only belongs to one stylist.

## Setup
Download and Install MAMP:
* Download the free version of MAMP from the [MAMP Downloads Page](https://www.mamp.info/en/downloads). Both Mac OS X and Windows are available. (You'll need to have version 4.1.0 or higher for Mac and 3.3.0 or higher for Windows).
* Once downloaded, open the file:
    * For Mac: This is a.pkg file.
    * For Windows: This is an .exe file.
* At this point, Mac installation is actually complete.
* Windows users will be prompted with an installation wizard. The default values and settings suggested at each step are just fine (You may specify a different location for your MAMP installation, if you prefer, just remember exactly where it is; we'll need to locate our MAMP installation in the next step).

Configure Port Numbers:  
_You must configure Apache and MySQL to use the correct port numbers in MAMP._

* Launch your newly-installed MAMP program.
* A popup may appear upon first launch. If so, uncheck the option reading Check for MAMP Pro when starting MAMP (You may upgrade to MAMP Pro later, but the free version meets all requirements for our course) then click Launch MAMP.
* When MAMP launches you will be greeted by a small window with several options. Click Preferences.
* In the Preferences window, select the Ports tab.
* Set the Apache Port to 8888.
* Set the MySQL Port to 8889.
* Click OK to save your new port configurations.

Access Project Repository & Open Project
* Open GitHub site on your browser: https://github.com/maxobaxo/hair-salon
* Select the green dropdown menu to clone this repository.
* Copy the link for the GitHub repository.
* Open Terminal on your computer.
* In Terminal, perform the following steps:
    * type 'cd desktop' and press enter
    * type 'git clone' then paste the repository link, and press enter
    * type 'cd hair-salon' to access the path on your computer
    * type 'composer install' in terminal to download dependencies
* In MAMP, perform the following steps:
    * Select the Start Servers option.
    * Go to preferences>web server and click on the folder icon next to 'document root'.
    * Click on 'web' folder of project and hit 'select'.
    * Hit ok at the bottom of the preferences window.
* In your browser, enter the url 'localhost:8888' to view the webpage.

## Specifications
* It can allow the salon manager to do the following:
    * add and edit stylist information.
    * add a new (or assign an existing) client to a given stylist.
    * delete a client from a stylist's record.
    * delete a stylist from the salon database.
    * delete all of the clients of a given stylist.
    * delete all stylists in the database.
    * delete all clients in the database.

## Languages/Technologies Used
Git, HTML, PHP, Silex, Twig, PHPUnit, CSS, SQL, MySQL, Apache, MAMP

## License Information
This application is licensed under the MIT license.

Copyright &copy; Max Scher 2017
