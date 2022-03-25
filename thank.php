<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = array_map('trim', $_POST);

    if (empty($contact['firstName'])) {
        $errors[] = 'Le prenom est obligatoire';
    }
    $firstNameMaxLength = 70;
    if (strlen($contact['firstName']) > $firstNameMaxLength) {
        $errors[] = 'Le prénom doit faire mois de ' . $firstNameMaxLength . ' caractères';
    }
    if (empty($contact['lastName'])) {
        $errors[] = 'Le prenom est obligatoire';
    }
    if (strlen($contact['lastName']) > $firstNameMaxLength) {
        $errors[] = 'Le Nom doit faire moins de ' . $firstNameMaxLength . ' caractères';
    }
    if (empty($contact['user_email'])) {
        $errors[] = 'L\'email est obligatoire';
    }
    $emailMaxLength = 255;
    if (strlen($contact['user_email']) > $emailMaxLength) {
        $errors[] = 'Le mail doit faire moins de ' . $emailMaxLength . ' caractères';
    }
    if (!filter_var($contact['user_email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Mauvais format pour le mail ' . htmlentities($contact['user_email']);
    }
    if (empty($contact['user_phone'])) {
        $errors[] = 'Le numéro de téléphone est obligatoire';
    }
    if (empty($contact['user_message'])) {
        $errors[] = 'Le message est obligatoire';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MErci</title>
</head>

<body>
    <ul>
        <?php if (empty($errors)) { ?>
             <p> Merci <?php echo $_POST["lastName"] . " " . $_POST["firstName"] ?> de nous avoir contacté à propos de . <?php echo $_POST["liste"] ?>

             Un de nos conseiller vous contactera soit à l’adresse <?php echo $_POST["user_email"] ?> ou par téléphone au <?php echo $_POST["user_phone"] ?> dans les plus brefs délais pour traiter votre demande :
     
             <?php echo $_POST["user_message"] ;
        } else {
        
         foreach ($errors as $error) : ?>
            <li><?= $error ?> </li>
        <?php endforeach;} ?>
    </ul>

   


</body>

</html>