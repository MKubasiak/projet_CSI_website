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


    function register($nom, $prenom, $dob, $adresse, $cp, $ville, $mail, $pwd){
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
        $person->mail = $mail;
        $person->mdp = $pwd;
        $person->save();
    }

    function connect($mail, $pwd){
        $count = ORM::for_table('utilisateur')->where(array(
            'mail' => $mail,
            'mdp'  => $pwd
        ))->count('*');
        return $count;
    }

    function getComments($id){
        $test =    ORM::for_table('commente')->where('idEvenement', $id)->find_array();
        return $test;
    }

    function getNameFromComment($id){
        $user = ORM::for_table('utilisateur')->find_one($id);
        return $user->prenom;
    }

    function getTarifForUser($mail, $idevent){
        $count = ORM::for_table('utilisateur')->where(array(
            'mail' => $mail,
            'idStatut'  => '3'
        ))->count('*');
        if($count > 0){
            $event = ORM::for_table('evenement')->find_one($idevent);
            return $event['tarifMembre'];
        }else{
            $event = ORM::for_table('evenement')->find_one($idevent);
            return $event['tarifBase'];
        }
    }

    function createCommente($mail, $idevent,$comment){
        $user = ORM::for_table('utilisateur')->where('mail', $mail)->find_one();
       // return array($user['idUtilisateur'], $idevent, $comment);

        $commente = ORM::for_table('commente')->create();

        $commente['idUtilisateur'] = $user['idUtilisateur'];
        $commente->idEvenement = $idevent;
        $commente->texte = $comment;

        $commente->save();
    }

    function getNbParticipants($id){
        return ORM::for_table('participe')->where('idEvenement', $id)->count();
    }

    function addParticipe($idevent, $mail){
        $user = ORM::for_table('utilisateur')->where('mail', $mail)->find_one();
        $participe = ORM::for_table('participe')->create();

        $participe->idUtilisateur = $user['idUtilisateur'];
        $participe->idEvenement = $idevent;
        $particip['paye'] = 'true';

        $participe->save();
    }
}