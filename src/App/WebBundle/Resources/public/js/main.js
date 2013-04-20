var datepickers = $(".datepicker");
if (datepickers.length) {
    datepickers.datepicker({
        "format": "dd.mm.yyyy",
        "autoclose": true,
        "weekStart": 1,
        "language": "pl"
    });
}
