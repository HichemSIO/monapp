<?php
switch ($action) {
    case 'accueil':
    {
        $message="C'est la page d'accueil";
        include("views/v_accueil.php");
        break;
    }
    case 'lister': {
        $les_membres=$pdo->getLesMembres();
        require 'views/v_listemembres.php';
        break;
    }
    case 'saisir': {
    
        require 'views/v_saisiemembre.php';
        break;
    }
    case 'ctrlsaisir':{
      
       if(!empty($_REQUEST)){
       
        if(isset($_REQUEST['nom'], $_REQUEST['prenom'])
            && !empty($_REQUEST['nom']) && !empty ($_REQUEST['prenom']))
            {
               
                $nom = strip_tags($_POST['nom']);
                $prenom = strip_tags($_POST['prenom']);
            } 

        $_nom =$_REQUEST['nom'];
        $_prenom =$_REQUEST['prenom'];
       $rep=$pdo->setLesMembres($_nom,$_prenom);
       if ($rep!= true)
       {$message=$rep;}
       else{
        $message=" $nom et  $prenom ont etait ajoute ";

    }
            include("views/v_accueil.php");
        break;
        }
    }  

    case 'supprimer':{
           
            $lesMembres = $pdo->getInfoMembres();
            require 'views\v_deletemembre.php';
    }

    case 'controledelete':{
                if (isset($_POST['id']))
                {
               
                $id = strip_tags($_POST['id']);
                }
            @$_id = $_POST['id'];
            $pdo->deleteMembre($_id);
            
            break; 
    }
}
