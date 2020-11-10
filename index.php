<?php
include_once("helper/Configuration.php");

session_start();
$configuration = new Configuration();

$urlHelper = $configuration->getUrlHelper();
$module = $urlHelper->getModuleFromRequestOr("inicio");
$action = $urlHelper->getActionFromRequestOr("execute");


$router = $configuration->getRouter();
$router->executeActionFromModule($action, $module);
