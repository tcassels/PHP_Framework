<?php
########################################################################
# One line to give the program's name and a brief idea of what it does.
# Copyright (C) 2014 Timothy Cassels <cassels2025@gmail.com>
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
# Filename: control/controller.php


namespace Framework\Control;

require_once '../config/site.php';


class Controller {
	public static function launch()
	{
		# Bring in the globals we will be using
		global $PATH_ARRAY;
		global $SITE_TITLE;
		# $PATH_ARRAY is a global array provided to us by public/index.php
		$app = $PATH_ARRAY[0];
		# Path to our application, the .. will be replaced by a config option
		$file_path = "../apps/$app/$app.php";
		# Ensure our app exists
		if (file_exists($file_path)) {
			# If it exists, require it and launch it saving the output to send to
			# the view for "rendering"
			require_once $file_path;
			$app_data = $app::launch();
		} else {
			# If the app doesn't exist, error
			$app_data = 'file does not exist';
		}
		# Require the view and set our chosen template, config....
		require_once '../view/view.php';
		$template = '../html/template.html';
		# Turn the output of the app into an array to be included in our template
		$app_keys = array('[@body]'=>$app_data);
		# Build the array of site config items. This needs to be "fixed"
		$site_keys = array('[@site_title]'=>$SITE_TITLE);
		# Merge the two arrays and pass everything to the view for rendering
		$keys = array_merge($site_keys, $app_keys);
		\Framework\View\View::render($template, $keys);
	}
}

?>