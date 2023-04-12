$(document).ready(function (e) {
    $(".grid-view table tbody td> a[target='_blank']").click(function (e) {


        let src = $(this).attr("href");
        window.open(src, "_blank").focus();
        e.preventDefault();


    });


    $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert-dismissible").alert('close');
    });

    $(".notification-button").click(function () {

        $(this).removeClass("blink");

        $.ajax({

            url: "./index.php?r=dashboard/read-notifications",
            success: function (res) {
                console.log(res);
            },
            error: function (msg) {
                console.log(msg)
            }
        });

    });


});
