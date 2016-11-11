/**
 * Created by tjDu on 2016/11/5.
 */
$(document).ready(function () {
    var url = "/health";
    $.ajax(url, {
        type: 'GET',
        success: function (data) {
            alert(data);
        }
    })
});