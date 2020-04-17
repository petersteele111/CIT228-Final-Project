$( function() {
    var id = $("#id").text();
    $( "#add-confirm" ).dialog({
        resizable: false,
        autoOpen: true,
        height: "auto",
        width: 400,
        modal: true,
        title: "Add Movie to User Confirmation",
        buttons: {
            "Yes": function() {
                window.location.href = "https://cit228.pbsteele.com/FinalProject/admin/user/addMovieToUser.php?id="+id;
            },
            Cancel: function() {
                window.location.href = "../../CRUD/view/movie/viewAll-loggedin.php";
            }
        }
    });
});