<?php


require_once 'idiorm-master/idiorm.php';


class db {



    function __construct()
    {
        //Config PDO
        ORM::configure('pgsql:host=localhost;port=5432;dbname=ProjetCSI;user=postgres;password=pmtlouor');
        ORM::configure('return_result_sets', true); // returns result sets
        ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

        //override cles primaires
        ORM::configure('id_column_overrides', array(
                'administre'    => array('idevenement','idutilisateur'),
                'commente'      => array('idevenement','idutilisateur'),
                'evenement'     => 'idevenement',
                'histBureau'    => 'idbureau',
                'participe'     => array('idevenement','idutilisateur'),
                'statut'        => 'idstatut',
                'utilisateur'   => 'idutilisateur'
        ));
    }



    function getLatestEvent(){
        return ORM::for_table('evenement')->find_one()->order_by_asc('datedebut')->where('valide', 'true');
    }

    function getAllEvents(){
        return ORM::for_table('evenement')->findArray();
    }


    function register($nom, $prenom, $dob, $adresse, $cp, $ville, $mail, $pwd){
        $id = ORM::for_table('utilisateur')->count();
        $id++;

        $person = ORM::for_table('utilisateur')->create();

        $person->idutilisateur = $id;
        $person->nom = $nom;
        $person->prenom = $prenom;
        $person->datenaiss = $dob;
        $person->adresse = $adresse;
        $person->codepostal = $cp;
        $person->ville = $ville;
        //$person->dateinscr = '19/10/1995';
        $person->idstatut = 2;
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
        $test =    ORM::for_table('commente')->where('idevenement', $id)->find_array();
        return $test;
    }

    function getNameFromComment($id){
        $user = ORM::for_table('utilisateur')->find_one($id);
        return $user->prenom;
    }

    function getTarifForUser($mail, $idevent){
        $count = ORM::for_table('utilisateur')->where(array(
            'mail' => $mail,
            'idstatut'  => '3'
        ))->count('*');
        if($count > 0){
            $event = ORM::for_table('evenement')->find_one($idevent);
            return $event['tarifmembre'];
        }else{
            $event = ORM::for_table('evenement')->find_one($idevent);
            return $event['tarifbase'];
        }
    }

    function createCommente($mail, $idevent,$comment){
        $user = ORM::for_table('utilisateur')->where('mail', $mail)->find_one();
       // return array($user['idUtilisateur'], $idevent, $comment);

        $commente = ORM::for_table('commente')->create();

        $commente['idutilisateur'] = $user['idutilisateur'];
        $commente->idevenement = $idevent;
        $commente->texte = $comment;

        $commente->save();
    }

    function getNbParticipants($id){
        return ORM::for_table('participe')->where('idevenement', $id)->count();
    }

    function addParticipe($idevent, $mail){
        $user = ORM::for_table('utilisateur')->where('mail', $mail)->find_one();
        $participe = ORM::for_table('participe')->create();

        $participe->idutilisateur = $user['idutilisateur'];
        $participe->idevenement = $idevent;
        $particip['paye'] = 'true';

        $participe->save();
    }
}