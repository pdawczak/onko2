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
    var choices = $("#app_badanie_badaniebundle_badanietype_papierosy_kind input");
//    var choices = $("input[name='app_badanie_badaniebundle_badanietype[papierosy][kind]']");
    choices.on("change", function () {
        $(".form-palenie-switcher").hide();
        $(".form-palenie-switcher input").attr("disabled", true);
        $(".form-" + $(this).val())
            .show()
            .find("input")
            .attr("disabled", false)
        ;
        console.log(".form-" + $(this).val());
    });
    choices.trigger("change");
}
