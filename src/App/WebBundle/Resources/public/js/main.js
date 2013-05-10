var datepickers = $(".datepicker");
if (datepickers.length) {
    datepickers.datepicker({
        "format": "dd.mm.yyyy",
        "autoclose": true,
        "weekStart": 1,
        "language": "pl"
    });
}

var palenie_switcher = $(".palenie-switcher");
if (palenie_switcher.length) {
    var palenie_choices = $("input[name='app_badanie_badaniebundle_badanietype[papierosy][kind]']");
    function palenie_show_hide(val) {
        $(".form-palenie-switcher").hide();
        $(".form-palenie-switcher input").attr("disabled", true);
        $(".form-" + val)
            .show()
            .find("input")
            .attr("disabled", false)
        ;
    }
    palenie_choices.on("change", function () {
        palenie_show_hide($(this).val());
    });
    var palenie_active = $("input[name='app_badanie_badaniebundle_badanietype[papierosy][kind]']:checked");
    palenie_show_hide(palenie_active.val());
}

var alkohol_switcher = $(".alkohol-switcher");
if (alkohol_switcher.length) {
    var alkohol_choices = $("input[name='app_badanie_badaniebundle_badanietype[alkohol][kind]']");
    function alkohol_show_hide(val) {
        $(".form-alkohol-switcher").hide();
        $(".form-palenie-switcher input").attr("disabled", true);
        $(".form-" + val)
            .show()
            .find("input")
            .attr("disabled", false)
        ;
    }
    alkohol_choices.on("change", function () {
        alkohol_show_hide($(this).val());
    });
    var alkohol_active = $("input[name='app_badanie_badaniebundle_badanietype[alkohol][kind]']:checked");
    alkohol_show_hide(alkohol_active.val());

    $("#app_badanie_badaniebundle_badanietype_alkohol_pijacy_przedBadaniem")
        .on("change", function () {
            var el = $(".pijacy-additional");
            if ($(this).is(':checked')) {
                el.show();
            }
            else {
                el.hide().find("input").val(null);
            }
        })
        .trigger("change")
    ;
}
