/* Download GAIA Desktop logic */
function downloadGaia() {
    setTimeout(function () {
        location.href = downloadUrl;
    }, 2750);
}

$(".btn-circle-download").click(function () {
    $(this).addClass("load");
    setTimeout(function () {
        $(".btn-circle-download").addClass("done");
        downloadGaia();
    }, 1000);
    setTimeout(function () {
        $(".btn-circle-download").removeClass("load done");
    }, 5000);
});


