<?php
	require_once 'Model/CrudModel.php';
	require_once 'config/lib.php';
	class CrudController extends CrudModel
	{
		
		function __construct() {
			parent::__construct();
			if (isset($_SERVER['PATH_INFO'])) {
				
				switch ($_SERVER['PATH_INFO']) {
					case '/add':
						if (isset($_POST['submit'])) {
							
							$data = array(
								'size' => $_POST['size'],
								'status' => 1,
							);

							$result = $this->insertData($data, 'sizes');

							if ($result) {
								
								$sMessage = "Data Inserted";

							} else {
								$eMessage = "Something Error";
							}
						}
						include_once 'View/create.php';
						break;
					case '/edit':
						if (isset($_GET['id'])) {
							
							$result = $this->editById($_GET['id'], 'sizes');

							include_once 'View/edit.php';

						} else {
							include_once 'View/404.php';
						}
						break;
					case '/update':
							if (isset($_POST['update'])) {
								
								$data = array(
									'id' => $_POST['id'],
									'size' =>$_POST['size'],
									'status' =>$_POST['status'],
								);

								$result = $this->updateData($data, 'sizes');

								if ($result) {
									header("Location: ".WEBSITE_URL);
								} else {
									echo "Error";
								}

							} else {
								include_once 'View/404.php';
							}
						break;
					case '/delete':

						if (isset($_GET['id'])) {
							
							$result = $this->deleteData($_GET['id'], 'sizes');
							if($result) {
								header("Location: ".WEBSITE_URL);
							} else {
								echo "Error";
							}
						}

						break;
					case '/view':
						# code...
						break;
					
					default:
						include_once 'View/404.php';
						break;
				}
			} else {
				$result = $this->getAllDetails("sizes");
				include_once 'View/index.php';
			}		 
		}
	}

	$object = new CrudController;


?>