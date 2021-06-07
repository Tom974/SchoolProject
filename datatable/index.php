
<html lang="en">
    <?php
        # Session starten ivm inloggen.
        session_start();
        require __DIR__."/../assets/classes/School.php";
        $School = new School(); 
        # Controle of we al ingelogd zijn
        $login = $School->checkIfLoggedIn();
        # Head met script en meta info includen
        $School->includeHead();
        
    ?>
    <?php
include 'backend/database.php';
?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="css/style.css">
	<script src="ajax/ajax.js"></script>
    <body>
        <div id="page-container" class="enable-page-overlay side-scroll main-content-boxed">
            <!-- Zorgen dat de header geinclude wordt. -->
            <?= $School->includeHeader() ?>
            <main id="main-container">
                <div class="bg-body-light border-top border-bottom">
                    <div class="content content-full py-1">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill font-size-sm text-uppercase font-w700 mt-2 mb-0 mb-sm-2">
                                <i class="fa fa-angle-right fa-fw text-primary"></i> Welkom, <?= $_SESSION['naam'] ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="content">
                <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Alle Gebruikers</h3>
                            
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						
                        </div>
                        
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 70px;">#</th>
                                        <th>Naam</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Achternaam</th>
                                        <th class="d-none d-sm-table-cell" style="width: 25%;">Telfoonnummer</th>
                                        <th style="width: 10%;">Actie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $gebruikers = $School->execute('SELECT * FROM `contacten` ORDER BY ID DESC', [], 'fetchAll');
                                    foreach($gebruikers as $gebruiker) {
                                        echo '

                                        <tr id="'.$gebruiker["id"].'">
                                        <td>
                                        '.$gebruiker['id'].'
                                                </td>
                                        <td class="font-w600">
                                            <a class="text-muted">'.$gebruiker['naam'].'</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a class="text-muted">'.$gebruiker['achternaam'].'</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                        '.$gebruiker['telefoonnummer'].'
                                        </td>
                                        <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                        <i class="material-icons update" data-toggle="tooltip" 
                                        data-id="'.$gebruiker["id"] .'" 
                                        data-naam="'.$gebruiker["naam"].'" 
                                        data-achternaam="'.$gebruiker["achternaam"].'" 
                                        data-telefoonnummer="'.$gebruiker["telefoonnummer"].'"  
                                        title="Edit">&#xE254;</i>
                                    </a>

                                    <a href="#deleteEmployeeModal" class="delete" data-id="'.$gebruiker["id"].'" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                        
                                        ';
                                    }
                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>



	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>naam</label>
							<input type="text" id="naam" name="naam" class="form-control" required>
						</div>
						<div class="form-group">
							<label>achternaam</label>
							<input type="text" id="achternaam" name="achternaam" class="form-control" required>
						</div>
						<div class="form-group">
							<label>telefoonnummer</label>
							<input type="text" id="telefoonnummer" name="telefoonnummer" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>naam</label>
							<input type="text" id="naam_u" name="naam" class="form-control" required>
						</div>
						<div class="form-group">
							<label>achternaam</label>
							<input type="text" id="achternaam_u" name="achternaam" class="form-control" required>
						</div>
						<div class="form-group">
							<label>telefoonnummer</label>
							<input type="text" id="telefoonnummer_u" name="telefoonnummer" class="form-control" required>
						</div>				
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
                    </div>
            </main>
            <?php
                # Zorgen dat de footer gezien kan worden
                $School->includeFooter(); 
            ?>
        </div>
        <script src="http://school/assets/js/dashmix.core.min.js"></script>
        <script src="http://school/assets/js/dashmix.app.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="http://school/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="http://school/assets/js/pages/be_tables_datatables.min.js"></script>
        <!-- Page JS helpers includen -->
        <script>jQuery(function(){Dashmix.helpers('sparkline');});</script>
    </body>
</html>
