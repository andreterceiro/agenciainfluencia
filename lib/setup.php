<?php
session_start();

global $registry;
$registry->set('view/erro500', 'erro/500.phtml');
