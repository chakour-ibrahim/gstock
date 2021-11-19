<?php
class Application
{	
	private $model = 't_application';
   
	public function list(){
		$sql = "SELECT * FROM ".$this->model." ";
		$data_model = array();
		$items = BDH::execSelectAll($sql)??[];
		foreach($items as  $item) {	
			$rows = array();			
			$rows[] = $item['id_app'];
			$rows[] = $item['Nom'];
			$rows[] = $item['Descript'];
			$rows[] = $item['Repertoire'];
			$rows[] = $item['EmailAlerte'];
			$rows[] = $item['option1'];
			$rows[] = $item['Bloque'];
			$rows[] = $item['champRecherche'];
			$rows[] = $item['modcode'];		
			$rows[] = ($item['active']=="Y")? "Oui": "Non";						
			$rows[] = '<div class="btn-group" role="group" aria-label=" ">
			<button type="button" name="update" id="'.$item["id_app"].'" class="btn btn-warning btn-xs update"><i class="bi bi-pencil-square"></i> Modifier</button>
			<button type="button" name="delete" id="'.$item["id_app"].'" class="btn btn-danger btn-xs delete" ><i class="bi bi-trash"></i> Supprimer</button></div>';
			$data_model[] = $rows;
		}

		$output = array("data" => $data_model);
		echo json_encode($output);
	}

	public function get(){
		if($_POST["id_app"]) {
			echo json_encode(BDH::get($this->model, "id_app", $_POST["id_app"]));
		}
	}

	public function update(){
		if($_POST['id_app']) {	
			$data = [
				'Nom' =>$_POST['Nom'],
				'Descript' =>$_POST['Descript'],
				'Repertoire' =>$_POST['Repertoire'],
				'EmailAlerte' =>$_POST['EmailAlerte'],
				'option1' =>$_POST['option'],
				'Bloque' =>$_POST['Bloque'],
				'champRecherche' =>$_POST['champRecherche'],
				'modcode' =>$_POST['modcode'],
				'active' => (isset($_POST['actif']))?(($_POST['actif']=='on')?"Y":"N"):"N",
			];
			BDH::update($this->model, "id_app", $_POST['id_app'], $data);		
		}	
	}

	public function add(){
		$data = [
			'Nom' =>$_POST['Nom'],
			'Descript' =>$_POST['Descript'],
			'Repertoire' =>$_POST['Repertoire'],
			'EmailAlerte' =>$_POST['EmailAlerte'],
			'option1' =>$_POST['option'],
			'Bloque' =>$_POST['Bloque'],
			'champRecherche' =>$_POST['champRecherche'],
			'modcode' =>$_POST['modcode'],
			'active' => (isset($_POST['actif']))?(($_POST['actif']=='on')?"Y":"N"):"N",
		];
		BDH::insert($this->model, $data);		
	}

	public function delete(){
		if($_POST["id_app"]) {
			BDH::delete($this->model, "id_app", $_POST["id_app"]);		
		}
	}
}
?>