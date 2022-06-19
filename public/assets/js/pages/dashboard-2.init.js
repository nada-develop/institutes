$(document).ready(function () {
    function e() {
        var a,
            e = ["#00acc1", "#f1556c"];


            (e = ["#00acc1"]),
            (a = $("#income-amounts").data("colors")) && (e = a.split(",")),
            (e = ["#00acc1", "#4b88e4", "#e3eaef", "#fd7e14"]),
            (a = $("#total-users").data("colors")) && (e = a.split(","))
    }
    var t;
    e(),
        $(window).resize(function (a) {
            clearTimeout(t),
                (t = setTimeout(function () {
                    e();
                }, 300));
        });
});
var colors = ["#6658dd"],
    dataColors = $("#world-map-markers").data("colors");
function hexToRGB(a, e) {
    var t = parseInt(a.slice(1, 3), 16),
        o = parseInt(a.slice(3, 5), 16),
        n = parseInt(a.slice(5, 7), 16);
    return e ? "rgba(" + t + ", " + o + ", " + n + ", " + e + ")" : "rgb(" + t + ", " + o + ", " + n + ")";
}

