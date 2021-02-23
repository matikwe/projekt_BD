<?php
session_start();

define('_ROOT_PATH', dirname(__FILE__));

$actions = array('home', 'login', 'registration', 'logout', 'adminPanel', 'moviesList', 'actorsList', 'addActor', 'rolesList', 'employeesList', 'editPassword' , 'partnerProgram', 'search', 'order', 'addActor', 'editActor', 'categoriesList', 'editCategory', 'addCategories', 'deleteActor', 'deleteCategory', 'addMovie', 'castList', 'deleteCast', 'addCast', 'editMovie', 'deleteMovie', 'directorsList', 'addDirector', 'editDirector', 'deleteDirector'); //wpisywać stworzone podstrony
$action = 'home'; //zaczyna od...

if(array_key_exists('action', $_GET))
{
    if(in_array($_GET['action'], $actions))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'pageNotFound';
    }
}

include(_ROOT_PATH.DIRECTORY_SEPARATOR.'actions'.DIRECTORY_SEPARATOR.$action.'.php');
include(_ROOT_PATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$action.'.php');