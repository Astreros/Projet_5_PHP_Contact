<?php
    require_once("DBConnect.php");
    require_once("Contact.php");

class ContactManager
{
    public function findAll(): array
    {
        $dataBase = new DBConnect();
        $pdo = $dataBase->getPDO();

        $query = $pdo->prepare("SELECT * FROM contact");
        $query->execute();

        $contacts = array();

        while ($data = $query->fetch()) {
            $contacts[] = new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
        }

        return $contacts;
    }

    public function findById($id): false|Contact
    {
        $dataBase = new DBConnect();
        $pdo = $dataBase->getPDO();

        $query = $pdo->prepare("SELECT * FROM contact where id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch();

        if (!$data) {
            return false;
        }

        return new Contact($data['id'], $data['name'], $data['email'], $data['phone_number']);
    }

    public function add($data): string
    {
        $dataBase = new DBConnect();
        $pdo = $dataBase->getPDO();

        $contact = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber']
            ];

        $query = $pdo->prepare("INSERT INTO contact (name, email, phone_number) VALUE (:name, :email, :phoneNumber)");
        $query->execute($contact);

        return "Le contact {$data['name']} à bien été ajouté\n";
    }

    public function delete($id): string
    {
        $dataBase = new DBConnect();
        $pdo = $dataBase->getPDO();

        if (!$this->findById($id)) {
            return "Le contact {$id} n'existe pas (ou plus). Aucune entrée n'a été supprimé\n";
        }

        $query = $pdo->prepare("DELETE FROM contact where id = :id");
        $query->execute(['id' => $id]);
//        $query->fetch();

        return "Le contact {$id} à bien été supprimé\n";
    }

}