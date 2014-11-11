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
# Filename: control/controller.php


namespace Framework\Control;

require_once '../config/site.php';


class Controller {
	public static function launch()
	{
		global $PATH_ARRAY;
		global $SITE_TITLE;
		$app = $PATH_ARRAY[0];
		$file_path = "../apps/$app/$app.php";
		if (file_exists($file_path)) {
			require_once $file_path;
			$app_data = $app::launch();
		} else {
			$app_data = 'file does not exist';
		}
		require_once '../view/view.php';
		$template = '../html/template.html';
		$app_keys = array('[@body]'=>$app_data);
		$site_keys = array('[@site_title]'=>$SITE_TITLE);
		$keys = array_merge($site_keys, $app_keys);
		\Framework\View\View::render($template, $keys);
	}
}

?>