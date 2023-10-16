$(document).ready(function () {
    $(".admin-form, .employee-form").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
                if (form.hasClass("admin-form")) {
                    if (response.success) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    } else if (response.error) {
                        $("#admin-error").text(response.error).show();
                    }
                } else if (form.hasClass("employee-form")) {
                    if (response.success) {
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    } else if (response.error) {
                        $("#employee-error").text(response.error).show();
                    }
                }
            },
        });
    });
});
