$(".client-tabs ul li").click(function (e) {

    let $child = $(this).children("a");

    if ($child.length && !$child.hasClass("active")) {

        if($child.hasClass("disabled")) return;
        $($child.attr("href")).html("<div class=\"ph-item\">\n" +
            "    <div class=\"ph-col-12\">\n" +
            "        <div class=\"ph-picture\"></div>\n" +
            "        <div class=\"ph-row\">\n" +
            "            <div class=\"ph-col-6 big\"></div>\n" +
            "            <div class=\"ph-col-4 empty big\"></div>\n" +
            "            <div class=\"ph-col-2 big\"></div>\n" +
            "            <div class=\"ph-col-4\"></div>\n" +
            "            <div class=\"ph-col-8 empty\"></div>\n" +
            "            <div class=\"ph-col-6\"></div>\n" +
            "            <div class=\"ph-col-6 empty\"></div>\n" +
            "            <div class=\"ph-col-12\"></div>\n" +
            "        </div>\n" +
            "    </div>\n" +
            "</div>");
        window.location.href = $child.data("url");
        e.preventDefault();
    }

});
