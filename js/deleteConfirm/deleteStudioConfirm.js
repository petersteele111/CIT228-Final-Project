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
                window.location.href = "https://cit228.pbsteele.com/FinalProject/CRUD/delete/deleteStudio.php?id="+id;
            },
            Cancel: function() {
                window.location.href = "../../CRUD/view/viewStudio-loggedin.php";
            }
        }
    });
});