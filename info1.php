<?php
$conn = new mysqli("localhost", "root", "", "centre");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if (isset($_POST['ajouter'])) {
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $filiere = $_POST['filiere'];

    $sql = "INSERT INTO etudiant (cin, nom, prenom, adresse, filiere)
            VALUES ('$cin', '$nom', '$prenom', '$adresse', '$filiere')";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

if (isset($_POST['modifier'])) {
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $filiere = $_POST['filiere'];

    $sql = "UPDATE Etudiant SET nom='$nom', prenom='$prenom', adresse='$adresse', filiere='$filiere'
            WHERE cin='$cin'";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

if (isset($_GET['delete'])) {
    $cin = $_GET['delete'];
    $conn->query("DELETE FROM etudiant WHERE cin='$cin'");
    header("Location: index.php");
    exit();
}