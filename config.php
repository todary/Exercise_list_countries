<?php

define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASSWORD","root");
define("DB_NAME","jumia");
define("PS",PATH_SEPARATOR);
define("DS",DIRECTORY_SEPARATOR);

define('Index',"index.php?r=");

define("CONTROLLERS_DIR",__DIR__.DS."controllers");
define("TRANSFORMER_DIR",__DIR__.DS."transformers");
define("FACTORY_DIR",__DIR__.DS."packages".DS."countriesValidation".DS."src".DS."countriesValidation");
define("PACKAGE_DIR",__DIR__.DS."packages".DS."countriesValidation".DS."src".DS."factory");
define("LIBS_DIR",__DIR__.DS."libs");
define("MODELS_DIR",__DIR__.DS."models");
define("VIEW_DIR",__DIR__.DS."views");
define("CDN",__DIR__.DS."cdn");


//define("CLASS_OBJECT","Courses");


class Path {

    function __construct() {
        
    }
    function Ratev_Path() {
        
        return "http://localhost/server/";
        
    }

}

?>
