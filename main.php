<?php
    require_once("Command.php");

while (true) {
    $line = readline("Entrez votre commande : ");

    if ($line === "list") {

        Command::list();

//      REGEX!! /detail/ Recherche le mot "detail" puis \s* gestion des espaces après "detail".
//      Ensuite (\d+) récupère les chiffres et /i indique l'insensibilité à la case.
    } elseif (preg_match("/detail\s*(\d+)/i", $line, $matches)) {

        $id = intval($matches[1]);
        Command::detail($id);

    } elseif ($line === 'create') {

        $name = readline("Saisir le nom du nouveau contact: ");
        $email = readline("Saisir l'E-Mail du nouveau contact: ");
        $phoneNumber = readline("Saisir le numéro de téléphone du nouveau contact: ");

        $newContact = [
            'name' => $name,
            'email' => $email,
            'phoneNumber' => $phoneNumber
        ];

        Command::create($newContact);

    } elseif (preg_match("/delete\s*(\d+)/i", $line, $matches)){

        $id = intval($matches[1]);
        Command::delete($id);

    } elseif ($line == 'help') {

        echo "Liste des commandes disponible:
        list : permet d'afficher sous forme de liste l'ensemble des contacts.
        detail : permet quand elle est suivi d'un numéro de contact valide d'affiché les informations détaillés
        create : permet de créer un nouveau contact
        delete : permet de supprimer un contact quand il est suivi d'un numéro de contact valide\n";

    } else {
        echo "Vous avez saisi une commande incorrecte. help pour afficher les commandes disponible\n";
    }

}