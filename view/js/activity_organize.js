/**
 * Created by tjDu on 2016/11/14.
 */
$(document).ready(function () {
    $.ajax("/getBriefInfo", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#username').html(data.username);
            $('#friends').append(data.friends);
            $('#credit').append(data.credit);
            $('#level').append(data.level);
            $('#avatar').append("<img src=\"images/avatar/" + data.avatar + "\" />");
        }
    });


});