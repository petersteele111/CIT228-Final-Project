$( function() {
    $( "#logout-confirm" ).dialog({
        resizable: false,
        autoOpen: false,
        height: "auto",
        width: 400,
        modal: true,
        title: "Logout Confirmation",
        buttons: {
            "Logout": function() {
                window.location.href = "https://cit228.pbsteele.com/FinalProject/admin/user/auth/logout.php";

            },
            Cancel: function() {
                $( this ).dialog( "close" );
            }
        }
    });
    $("#logout").click(function (e) {
        $("#logout-confirm").dialog('open');
        e.preventDefault();
    });
});

