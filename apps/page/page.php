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
# Filename: apps/page/page.php


class Page {
	public static function launch()
	{
		# All we do here is call our app specific OO code from this procedural
		# stuff. This way the framework doesn't have to know about the namespace
		# of the app.
		require_once '../apps/page/control/controller.php';
		return \Framework\Apps\Page\Control\Controller::launch();
	}
	
}

?>