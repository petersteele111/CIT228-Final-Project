$( function() {
    var id = $("#id").text();
    $( "#delete-confirm" ).dialog({
        resizable: false,
        autoOpen: true,
        height: "auto",
        width: 400,
        modal: true,
        title: "Delete Confirmation",
        buttons: {
            "Yes": function() {
                window.location.href = "https://cit228.pbsteele.com/FinalProject/CRUD/delete/deleteUser.php?id="+id;
            },
            Cancel: function() {
                window.location.href = "https://cit228.pbsteele.com/FinalProject/CRUD/view/viewUser.php";
            }
        }
    });
});