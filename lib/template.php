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
# Filename: lib/template.php


namespace Framework\Lib;


require_once '../lib/fio.php';


class Template {
	private $_template_file;
	private $_keys;
	private $_error;
	
	public function get_error()
	{
		return $this->_error;
	}
	
	public function set_template($template)
	{
		if (file_exists($template)) {
			$this->_template_file = $template;
		} else {
			$this->_error += ':File does not exist';
		}
		return $this;
	}
	
	public function set_keys($keys)
	{
		if (is_array($keys)) {
			$this->_keys = $keys;
		} else {
			$this->_error += ':Key input must be array';
		}
		return $this;
	}
	
	public function parse()
	{
		# Read the template file
		$file_data = \Framework\Lib\FIO::fio_read($this->_template_file);
		# Rename it while preserving the original, for the future.
		$parsed_data = $file_data;
		# Iterate over each item in the array of keys provided
		foreach ($this->_keys as $key=>$value) {
			# Find each instance of the provided key and replace it with the
			# provided value
			$parsed_data = str_replace($key, $value, $parsed_data);
		}
		return $parsed_data;
 	}
}

?>