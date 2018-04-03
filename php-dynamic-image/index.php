<?php
include_once('classes/Facade.php');

$level = str_replace("levelup_", "", $_GET["file"]);
$level = str_replace(".png", "", $level);

$applicationFacade = new Facade();
$applicationFacade->outputLevelUpImage($level);