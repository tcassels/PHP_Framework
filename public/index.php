<?php
########################################################################
# One line to give the program's name and a brief idea of what it does.
# Copyright (C) 2014 Timothy Cassels <cassels2025@gmail.com
# 
# This program is free software; you can redistribute it and/or modify 
# it under the terms of the GNU General Public License version 2 as 
# published by the Free Software Foundation.
# 
# This program is distributed in the hope that it will be useful, but 
# WITHOUT ANY WARRANTY; without even the implied warranty of 
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU 
# General Public License for more details.
# 
# You should have received a copy of the GNU General Public License 
# along with this program; if not, write to the Free Software 
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
#########################################################################
# Filename: public/index.php


# Turn on increased error reporting. Only for now, will be moved to a config
error_reporting(6143);
ini_set('display_errors', 'On');

# Make sure .htaccess is passing us the parameters
if (isset($_GET['path'])) {
	# If we get the parameters, blow it up into an array
	$PATH_ARRAY = explode('/', $_GET['path']);
} else {
	# If we don't get the parameters set it to home. Needs to be a config option
	$PATH_ARRAY = array('page', 'home');
}

require_once '../bootstrap.php';

# Once we have all the details, fireoff the bootstrap.
# This will load the main controller.
\Framework\Bootstrap\Bootstrap::launch();

?>