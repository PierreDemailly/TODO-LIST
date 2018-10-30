<?php
require 'model/binProjectModel.php';

$projects = getProjects();

$title = 'Mes projets supprimés';

require 'tpl/header.tpl';
require 'tpl/binProject.tpl';
require 'tpl/footer.tpl';
