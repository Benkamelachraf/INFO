function confirmDelete(cin) {

  if (confirm("Voulez-vous vraiment supprimer CIN: " + cin + " ?")) {

    window.location.href = "action.php?delete=" + cin;
  }
}//action.php?delete=7352863
// en généralement Ouvre la page action.php et envoie-lui le cin pour suppression.

