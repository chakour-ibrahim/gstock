<?php include('partials/header.php'); ?>
<title>Famille D'articles</title>

</head>

<br>
<body class="">
    <div class="container">
        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <button type="button" name="add" id="addApplication" class="btn btn-success btn-xs"><i class="bi bi-plus-circle-fill"></i> Nouvelle Famille </button>
                    </div>
                </div>
            </div>
            <br>
            <h3> Liste de familles d'articles </h3>
            <table id="dt-application" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Code de la famille</th>  
                        <th>Nom de la famille</th>
                        <th>Date Modification</th>
                        <th>Valorisation</th>
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
                            <h4 class="modal-title">
                                <i class="fa fa-plus"></i> Ajouter / Modification</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                             <div class="form-group">
                                <label for="Code" class="control-label">Code</label>
                                <input type="text" class="form-control" id="Code" name="Code" placeholder="Code de la famille" required>
                            </div>
                            <div class="form-group">
                                <label for="Nom" class="control-label">Nom</label>
                                <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom de la famille" required>
                            </div>
                            <div class="form-group">
                                <label for="Valorisation" class="control-label">Valorisation</label>
                                <input type="text" class="form-control" id="Valorisation" name="Valorisation" placeholder="Valorisation" required>
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