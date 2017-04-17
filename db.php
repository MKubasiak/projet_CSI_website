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



    function getLatestEvent(){
        return ORM::for_table('evenement')->find_one()->order_by_asc('dateDebut')->where('valide', 'true');
    }

    function getAllEvents(){
        return ORM::for_table('evenement')->findArray();
    }


    function register($nom, $prenom, $dob, $adresse, $cp, $ville){
        $id = ORM::for_table('utilisateur')->count();
        $id++;

        $person = ORM::for_table('utilisateur')->create();

        $person->idUtilisateur = $id;
        $person->nom = $nom;
        $person->prenom = $prenom;
        $person->datenaiss = $dob;
        $person->adresse = $adresse;
        $person->codePostal = $cp;
        $person->ville = $ville;
        //$person->dateinscr = '19/10/1995';
        $person->idStatut = 2;
        $person->save();
    }
}