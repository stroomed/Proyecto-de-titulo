<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/categoriasC.php";
require_once "Modelos/categoriasM.php";

require_once "Controladores/comidasC.php";
require_once "Modelos/comidasM.php";

require_once "Controladores/mesasC.php";
require_once "Modelos/mesasM.php";

require_once "Controladores/ordenesC.php";
require_once "Modelos/ordenesM.php";

require_once "Controladores/CocinaC.php";

$plantilla = new Plantilla();
$plantilla -> llamarPlantilla();
