<?php include('partials/header.php'); ?>
<title>Gestion De Stock</title>

</head>

<body class="">
<!--<div class="topnav">
  <a class="active" href="index_application.php">Application</a>
  <a href="index_menu.php">Menu</a>
</div>-->

    <div class="container">
        <h3> Creation et mise à jour</h3>
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <button type="button" name="add" id="addApplication" class="btn btn-success btn-xs"><i class="bi bi-plus-circle-fill"></i> Nouvelle application</button>
                    </div>
                    <div class="col-md-2 pull-left">

                    </div>
                </div>
            </div>
            <table id="dt-application" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Repertoire</th>
                        <th>Email Alerte</th>
                        <th>Option</th>
                        <th>Bloque</th>
                        <th>Champs Recherche</th>
                        <th>Code Module</th>
                        <th>Est actif?</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="modal_application" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="form_application">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Ajout / Modification</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Nom" class="control-label">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="Descript" class="control-label">Description</label>
                                <input type="text" class="form-control" id="Descript" name="Descript" placeholder="Description" required>
                            </div>
                            <div class="form-group">
                                <label for="Repertoire" class="control-label">Repertoire</label>
                                <input type="text" class="form-control" id="Repertoire" name="Repertoire" placeholder="Repertoire" required>
                            </div>
                            <div class="form-group">
                                <label for="EmailAlerte" class="control-label">Email Alerte</label>
                                <input type="text" class="form-control" id="EmailAlerte" name="EmailAlerte" placeholder="Email Alerte" required>
                            </div>
                            <div class="form-group">
                                <label for="option1" class="control-label">option</label>
                                <input type="text" class="form-control" id="option1" name="option" placeholder="option1" required>
                            </div>
                            <div class="form-group">
                                <label for="Bloque" class="control-label">Bloque</label>
                                <input type="text" class="form-control" id="Bloque" name="Bloque" placeholder="Bloque" required>
                            </div>
                            <div class="form-group">
                                <label for="champRecherche" class="control-label">champ Recherche</label>
                                <input type="text" class="form-control" id="champRecherche" name="champRecherche" placeholder="Champ Recherche" required>
                            </div>
                            <div class="form-group">
                                <label for="modcode" class="control-label">Code Module</label>
                                <input type="text" class="form-control" id="modcode" name="modcode" placeholder="Code Module" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="actif"  id="actif">
                                <label class="form-check-label" for="actif">
                                    Est actif?
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_app" id="id_app" value="" />
                            <input type="hidden" name="action" id="action" value="" />
                            <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<?php include('partials/footer.php'); ?>
<script src="js/application_script.js"></script>


</body>

</html>