<?php
$conn = new mysqli("localhost", "root", "", "centre");
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Initialisation
$editMode = false;
$cin = $nom = $prenom = $adresse = $filiere = "";

// Edit mode
if (isset($_GET['edit'])) {
    $editMode = true;
    $cin = $_GET['edit'];
    $res = $conn->query("SELECT * FROM etudiant WHERE cin='$cin'");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $adresse = $row['adresse'];
        $filiere = $row['filiere'];
    }
}

// Liste des étudiants
$etudiants = $conn->query("SELECT * FROM etudiant");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion Étudiants</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<h2><?= $editMode ? "Modifier" : "Ajouter" ?> un étudiant</h2>

<form action="action.php" method="POST">
    <input type="text" name="cin" placeholder="CIN" required value="<?= $cin ?>" <?= $editMode ? 'readonly' : '' ?>><br>
    <input type="text" name="nom" placeholder="Nom" required value="<?= $nom ?>"><br>
    <input type="text" name="prenom" placeholder="Prénom" required value="<?= $prenom ?>"><br>
    <input type="text" name="adresse" placeholder="Adresse" required value="<?= $adresse ?>"><br>
    <input type="text" name="filiere" placeholder="Filière" required value="<?= $filiere ?>"><br>
    <input type="submit" name="<?= $editMode ? 'modifier' : 'ajouter' ?>" value="<?= $editMode ? 'Modifier' : 'Ajouter' ?>">
</form>

<h2>Liste des étudiants</h2>

<table>
    <tr>
        <th>CIN</th><th>Nom</th><th>Prénom</th><th>Adresse</th><th>Filière</th><th>Actions</th>
    </tr>
    <?php while ($row = $etudiants->fetch_assoc()): ?>
    <tr>
        <td><?= $row['cin'] ?></td>
        <td><?= $row['nom'] ?></td>
        <td><?= $row['prenom'] ?></td>
        <td><?= $row['adresse'] ?></td>
        <td><?= $row['filiere'] ?></td>
        <td>
            <a href="index.php?edit=<?= $row['cin'] ?>">Modifier</a> |
            <a href="#" onclick="confirmDelete('<?= $row['cin'] ?>')">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>