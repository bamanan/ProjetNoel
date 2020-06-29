"use strict";

$(window).ready(function () {
    $('.carousel-item').height($(window).height());
    $(window).resize(function () {
        $('.carousel-item').height($(window).height());
    });

    $(".custom-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html("" + fileName + "");
    });
});
