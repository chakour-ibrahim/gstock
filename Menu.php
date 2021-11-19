<?php
class Menu  {	
	private $model = 't_menu';
		
	public function list_old(){
		$where = $sqlTot = $sqlRec = "";

		if( !empty($_POST['search']['value']) ) {   
			$where .=" WHERE ";
			$where .=" ( menu_name LIKE '".$_POST['search']['value']."%' ";    
			$where .=" OR menu_salary LIKE '".$_POST['search']['value']."%' ";
	
			$where .=" OR menu_age LIKE '".$_POST['search']['value']."%' )";
		}

		// getting total number records without any search
		$sql = "SELECT * FROM ".$this->model." ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;

		//concatenate search sql if value exist
		if(isset($where) && $where != '') {
			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		
		if(!empty($_POST["order"])){
			$sqlRec .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlRec .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlRec .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$queryRecords = mysqli_query($this->dbConnect, $sqlRec);
		
		$queryTot = mysqli_query($this->dbConnect, $sqlTot);
		$numRows = mysqli_num_rows($queryTot);
		
		$data_model = array();	
		while( $item = mysqli_fetch_assoc($queryRecords) ) {		
			$rows = array();			
			$rows[] = $item['id'];
			$rows[] = ucfirst($item['menu_name']);
			$rows[] = $item['menu_age'];
			$rows[] = $item['menu_salary'];						
			$rows[] = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
			<button type="button" name="update" id="'.$item["id"].'" class="btn btn-warning btn-xs update"><i class="bi bi-pencil-square"></i> Edit</button>
			<button type="button" name="delete" id="'.$item["id"].'" class="btn btn-danger btn-xs delete" ><i class="bi bi-trash"></i> Delete</button></div>';
			
			$data_model[] = $rows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$data_model
		);
		echo json_encode($output);
	}

	public function list(){
		$sql = "SELECT * FROM ".$this->model." ";
		$data_model = array();
		$items = BDH::execSelectAll($sql)??[];
		foreach($items as  $item) {	
			$rows = array();			
			$rows[] = $item['id_menu'];
			$rows[] = $item['nom'];
			$rows[] = BDH::execSelectOne("select Nom from t_application where id_app={$item['id_app']}")['Nom'];
			$rows[] = $item['url'];
			$rows[] = ($item['admin']=="Y")? "Oui": "Non";	
			$rows[] = $item['sousMenu'];
			$rows[] = $item['icone'];
			$rows[] = ($item['active']=="Y")? "Oui": "Non";						
			$rows[] = '<div class="btn-group" role="group" aria-label=" ">
			<button type="button" name="update" id="'.$item["id_menu"].'" class="btn btn-warning btn-xs update"><i class="bi bi-pencil-square"></i> Modifier</button>
			<button type="button" name="delete" id="'.$item["id_menu"].'" class="btn btn-danger btn-xs delete" ><i class="bi bi-trash"></i> Supprimer</button></div>';
			$data_model[] = $rows;
		}

		$output = array("data" => $data_model);
		echo json_encode($output);
	}

	public function get(){
		if($_POST["id_menu"]) {
			echo json_encode(BDH::get($this->model, "id_menu", $_POST["id_menu"]));
		}
	}

	public function update(){
		if($_POST['id_menu']) {	
			$data = [
				'nom' =>$_POST['nom'],
				'id_app' =>$_POST['id_app'],
				'icone' =>$_POST['icone'],
				'sousMenu' =>$_POST['sousMenu'],
				'url' =>$_POST['url'],
				'admin' => (isset($_POST['admin']))?(($_POST['admin']=='on')?"Y":"N"):"N",
				'active' => (isset($_POST['actif']))?(($_POST['actif']=='on')?"Y":"N"):"N",
			];
			BDH::update($this->model, "id_menu", $_POST['id_menu'], $data);		
		}	
	}

	public function add(){
		$data = [
			'nom' =>$_POST['nom'],
			'id_app' =>$_POST['id_app'],
			'icone' =>$_POST['icone'],
			'sousMenu' =>$_POST['sousMenu'],
			'url' =>$_POST['url'],
			'admin' => (isset($_POST['admin']))?(($_POST['admin']=='on')?"Y":"N"):"N",
			'active' => (isset($_POST['actif']))?(($_POST['actif']=='on')?"Y":"N"):"N",
		];
		BDH::insert($this->model, $data);		
	}

	public function delete(){
		if($_POST["id_menu"]) {
			BDH::delete($this->model, "id_menu", $_POST["id_menu"]);		
		}
	}
	
}
?>