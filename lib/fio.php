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
# Filename: lib/fio.php


namespace Framework\lib;

class FIO {
	public static function fio_read($filename)
	{
		if (file_exists($filename)) {
			try {
				$file_data = file_get_contents($filename);
			} catch (exception $e) {
				$file_data = 'File Read Failed';
			}
		} else {
			$file_data = 'File Does not exist';
		}
		return $file_data;
	}
	
	public static function fio_write($filename, $file_data)
	{
		if (file_exists($filename)) {
			try {
				file_put_contents($filename, $file_data);
			} catch (exception $e) {
				$return_data = 'File Write Failed';
			}
			$return_data = 'File updated';
		} else {
			$return_data = 'File Does not exist';
		}
		return $return_data;
	}
}

?>