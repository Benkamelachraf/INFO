function confirmDelete(cin) {

    if (confirm("Voulez-vous vraiment supprimer CIN: " + cin + " ?")) {

        window.location.href = "action.php?delete=" + cin;

    }

}
