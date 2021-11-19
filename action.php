<?php
include('DBHelper.php');
include('Menu.php');
include('Application.php');
$menu = new Menu();
$app = new Application();

$action = isset($_POST['action']) && $_POST['action'] != '' ? $_POST['action'] : '';
switch ($action) {
	case "listMenu":
		$menu->list();
	  break;
	case "addMenu":
		$menu->add();
	  break;
	case "getMenu":
		$menu->get();
	  break;
	case "updateMenu":
		$menu->update();
	  break;
	case "deleteMenu":
		$menu->delete();
	  break;

	case "listApplication":
		$app->list();
	  break;
	case "addApplication":
		$app->add();
	  break;
	case "getApplication":
		$app->get();
	  break;
	case "updateApplication":
		$app->update();
	  break;
	case "deleteApplication":
		$app->delete();
	  break;
	default:
	  echo "Aucune action valide!";
  }
?>