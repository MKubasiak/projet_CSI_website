<?php


require_once 'idiorm-master/idiorm.php';


class db {



    function __construct()
    {
        //Config PDO
        ORM::configure('pgsql:host=localhost;port=5432;dbname=csi;user=postgres;password=');
        ORM::configure('return_result_sets', true); // returns result sets
        ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        //override cles primaires
        ORM::configure('id_column_overrides', array(
                'administre'    => array('idEvenement','idUtilisateur'),
                'commente'      => array('idEvenement','idUtilisateur'),
                'evenement'     => 'idEvenement',
                'histBureau'    => 'idBureau',
                'participe'     => array('idEvenement','idUtilisateur'),
                'statut'        => 'idStatut',
                'utilisateur'   => 'idUtilisateur'
        ));
    }


    function test(){
        return ORM::for_table('utilisateur')->find_one(1);
    }

}