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
    var choices = $("input[name='app_badanie_badaniebundle_badanietype[papierosy][kind]']");
    function palenie_show_hide(val) {
        $(".form-palenie-switcher").hide();
        $(".form-palenie-switcher input").attr("disabled", true);
        $(".form-" + val)
            .show()
            .find("input")
            .attr("disabled", false)
        ;
    }
    choices.on("change", function () {
        palenie_show_hide($(this).val());
    });
    var active = $("input[name='app_badanie_badaniebundle_badanietype[papierosy][kind]']:checked");
    palenie_show_hide(active.val());
}
