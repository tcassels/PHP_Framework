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
# Filename: apps/page/control/controller.php


namespace Framework\Apps\Page\Control;


require_once '../lib/fio.php';
require_once '../lib/template.php';


class Controller {
	public static function display_page($page)
	{
		# Set the path to our html page we want to display.
		$file_path = "../apps/page/html/".$page.".html";
		# Read the html file
		$page_data = \Framework\Lib\FIO::fio_read($file_path);
		# Add our edit page hyperlink at the bottom
		$page_data = $page_data . "<br><br><a href='/page/".$page."/edit'>Edit</a>";
		return $page_data;
	}
	
	
	public static function edit_page($page)
	{
		# Path to our html file
		$file_path = "../apps/page/html/".$page.".html";
		# Read our html file
		$page_data = \Framework\Lib\FIO::fio_read($file_path);
		# Setup the keys to replace on the edit page template
		$keys = array('[@page]'=>$page, '[@page_contents]'=>$page_data);
		# Instantiate a new template instance and parse our template
		$template = new \Framework\Lib\Template();
		$page_data = $template->set_template('../apps/page/html/edit_form.html')->set_keys($keys)->parse();
		return $page_data;
	}
	
	public static function edit_submit($page, $page_contents, $return_page)
	{
		# If we can write the submitted changes to file, return a hyperlink to the original
		if (\Framework\Lib\FIO::fio_write($page, $page_contents) == 'File updated') {
			return "File Updated, <a href='/page/".$return_page."'>Return</a>";
		}
		# This needs an error clause
	}
	
	
	public static function launch()
	{
		# Bring in our path array from public/index.php
		global $PATH_ARRAY;
		# Ensure it's set and fetch the requested page. If no page is set, default to home
		if (isset($PATH_ARRAY[1])) {
			$page = $PATH_ARRAY[1];
		} else {
			$page = 'home';
		}
		# Check if the page action is set
		if (isset($PATH_ARRAY[2])) {
			if ($PATH_ARRAY[2] == 'edit') {
				# Run the edit page function above
				$return_data = self::edit_page($page);
			} else if ($PATH_ARRAY[2] == 'edit-submit') {
				# If we posted a page update here
				if (isset($_POST['page_contents'])) {
					# If the textarea had data, write it to the requested page
					$file_path = "../apps/page/html/".$page.".html";
					$page_contents = $_POST['page_contents'];
					$return_data = self::edit_submit($file_path, $page_contents, $page);
				} else {
					$return_data = 'Please submit data to update the page with';
				}
			}
		} else {
			# If no page action is chosen, default to display
			$return_data = self::display_page($page);
		}
		return $return_data;
	}
}

?>