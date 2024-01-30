<?php
require_once('ContactManager.php');
class Command
{
    public static function list(): void
    {
        $contactManager = new ContactManager();
        $contacts = $contactManager->findAll();

        if (!$contacts) {
            echo "Il n'y a aucun contact à afficher pour le moment.\n";
        } else {
            foreach ($contacts as $contact) {
                echo "-> $contact\n";
            }
        }
    }

    public static function detail($id): void
    {
        $contactManager = new ContactManager();
        $contact = $contactManager->findById($id);

        if ($contact === false) {
            echo "Aucun contact avec l'ID N°{$id} n'a été trouvé.\n";
        } else {
            echo "Contact N°{$contact->getId()} - {$contact->getName()}
        E-Mail : {$contact->getEmail()}
        Numéro de téléphone : {$contact->getPhoneNumber()}\n";
        }
    }

    public static function create($data): void
    {
        $contactManager = new ContactManager();
        echo $contactManager->add($data);
    }

    public static function delete($id): void
    {
        $contactManager = new ContactManager();
        echo $contactManager->delete($id);
    }
}