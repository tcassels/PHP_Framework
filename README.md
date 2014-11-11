Framework
=========

Thank you for using this framework, it is still very much a work in progress.
The goal of this framework is to provide lightweight yet feature rich base
to build upon. It differs from traditional frameworks that you use to to add
features to your own code. This framework is it's own stand alone application
with modular features. The intention is to install this on your webserver,
add the applications you want, configure, and you are off.


Directory Structure
-------------------

```
apps/
	appname/
			appname.php
			control/
			model/
			view/
			html/
config/
control/
doc/
html/
lib/
model/
public/
view/
```


Requirements
------------

The minimum requirements are a webserver capable of running PHP 5.6.


Documentation
-------------

As this is currently still an extreen work in progress all documentation is located under the doc directory within the source.


Install
-------

Installation is simple. 
1. Copy everything to your desired directory and set your webservers document root to the public directory.
2. Edit html/template.html with your desired changes and place your page html documents in apps/page/html.


How to Participate
------------------

**Participation is extremely welcomed!**

You may participate in the following ways:

* Submit name ideas
* Report issues
* Give us feedback
* Fix issues, develop features, or write documentation