/**
 * Created by tjDu on 2016/11/14.
 */
var myname;
$(document).ready(function () {
    $.ajax("/getBriefInfo", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            myname = data.username;
            $('#username').html(data.username);
            $('#friends').append(data.friends);
            $('#credit').append(data.credit);
            $('#level').append(data.level);
            $('#avatar').append("<img src=\"images/avatar/" + data.avatar + "\" />");
        }
    });
    $.ajax("/friend/today", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            displayData(data);
        }
    });
    $('#selectid').change(function () {
        var type = $('#selectid').val();
        switch (type) {
            case "today":
                $.ajax("/friend/today", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            case "7":
                $.ajax("/friend/week", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            case "30":
                $.ajax("/friend/month", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            default:
                break;
        }
    })
});
function displayData(data) {
    $('#list').empty();
    var myIndex = 0;
    for (var i = 0; i < data.length; i++) {
        var j = i + 1;
        var a = "<li class=\"w3-padding-16\">" +
            "<img src=\"images/avatar/" + data[i].avatar + "\"" +
            "class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\"> " +
            "<a href=\"other_profile.html?name=" + data[i].username + "\">" +
            "<span class=\"w3-xlarge\">" + j + " " + data[i].username + "</span></a><br>" +
            "<span>" + data[i].motto + "</span><span style='margin-left: 500px'>" + data[i].sum_distance + "km</span></li>";
        $('#list').append(a);
        if (data[i].username == myname) {
            myIndex = j;
        }
    }
    $('#head').html("You ranked " + myIndex + " in Gofit");
}