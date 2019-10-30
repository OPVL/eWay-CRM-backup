# eWay CRM - Contact & Company Backup

## What is it

This is a simple php applet that is designed to be scheduled everyday to take a backup of all contacts and companies for a given user account.

This is to make up for the shortcomings of eWays current internal backup solution which only retains backups for 2 weeks at a time.

## How does it work

It initiates a simple eWay client that in turn gets a json blob of all the contacts and companies stored wihtin the specified account.

It then stores these versions in a json file that is versioned with the date & time that the backup was taken.

If there's such a time where data is lost and needs to be restored in to a database, you can simply select the backup from the list and restore it to a database of your definition.

## Requirements

* PHP 7.2 +
  * ext php-mysql
  * ext php-curl
* MySQL Server
* MySQL Client
* eWay Client <https://github.com/eway-crm/php-lib/releases>
