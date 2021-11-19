<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <style>
            .btn-group-xs>.btn,.btn-xs {
                padding: .25rem .4rem;
                font-size: .875rem;
                line-height: .5;
                border-radius: .2rem;
            }
            /* Add a black background color to the top navigation */
            .topnav{
                width: 100%; 
                height: 60px; 
                margin: 0;
                z-index: 99; 
                position: relative; 
                background-color: #74992e;
                }
            .navbar{
                height: 60px;
                padding:0;
                float: right;
                margin: 0px 30px 0px;
                } 
            .navbar li {
                height: auto;
                width: 160px; 
                float: right;  
                text-align: center; 
                list-style: none;  
                font: normal bold 15px/1em Arial, Verdana, Helvetica;  
                padding: 0;
                margin: 0;
                background-color: #444444;
                border-radius : 10px;
                }
            .navbar a{							
                padding: 18px 0;  
                /*border-left: 1px solid #ccc9c9;*/
                text-decoration: none; 
                color: white; 
                display: block;
                font-size: 16px;
                }
            .navbar li:hover, a:hover {
                background-color: #444444;
                }
            .navbar li ul{
                display: none;
                height: auto;									
                margin: 0; 
                padding: 0; 
                }
            .navbar li:hover ul{
                display: block;
                }
            .navbar li ul li{
                background-color: #444444;
                }
            .navbar li ul li a{
                border-left: 1px solid #444444; 
                border-right: 1px solid #444444; 
                border-top: 1px solid #c9d4d8; 
                border-bottom: 1px solid #444444; 
                }
            .navbar li ul li a:hover{
            background-color: #74992e;
            }
        </style>
        <body class="">
        <div class="topnav">
            <ul class="navbar">
                <li>
                    <a class="active" href="#">Données De Base </a>
                    <ul>
                        <li><a href="index_application.php">Magasin</a></li>
                        <li><a href="#">Categorie</a></li>
                        <li><a href="#">Rayon</a></li>
                        <li> <a href="familleArticicle.php">Famille Articles</a></li>  
                        <li> <a href="#">Sous Famille</a></li>
                        <li> <a href="index_donnees_base.php">Quitter</a></li>  
                    </ul>
                </li>
            </ul>
        </div>
    <!--<div>
        <img src="img\logiciels-gestion-stock.jpg" alt=""> 
    </div>
        -->

    <!-- jQuery -->



