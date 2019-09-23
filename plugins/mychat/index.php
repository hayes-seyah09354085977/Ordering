<?php

/**
 * Index
 * 
 * @package WaterCooler Chat
 * @author Jo�o Ferreira <jflei@sapo.pt>
 * @copyright (c) 2018, Jo�o Ferreira
 * @since 1.1
 */

	include 'wcchat.class.php';    # Change this to match your server's path to "chat.class.php" file
	$chat = new WcChat();
      echo $chat->printIndex();

?>	
