function confirmDelete(cin) {

  if (confirm("Voulez-vous vraiment supprimer CIN: " + cin + " ?")) {

    window.location.href = "action.php?delete=" + cin;
  }
}

function validateForm() {
  const nom = document.querySelector('[name="nom"]').value;
  const prenom = document.querySelector('[name="prenom"]').value;
  const adresse = document.querySelector('[name="adresse"]').value;

  if (nom.length < 2) {
      alert('Nom doit avoir au moins 3 caractères.');
      return false;
  }
  if (nom.length > 50) {
      alert('Nom ne peut pas dépasser 50 caractères.');
      return false;
  }

  if (prenom.length < 2) {
      alert('Prénom doit avoir au moins 3 caractères.');
      return false;
  }
  if (prenom.length > 50) {
      alert('Prénom ne peut pas dépasser 50 caractères.');
      return false;
  }

  if (adresse.length < 5) {
      alert('Adresse doit avoir au moins 5 caractères.');
      return false;
  }
  if (adresse.length > 50) {
      alert('Adresse ne peut pas dépasser 100 caractères.');
      return false;
  }

  return true;
}
