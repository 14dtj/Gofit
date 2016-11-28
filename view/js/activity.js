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
    $.ajax("/activity/getAll", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var a = "<div class=\"w3-container w3-section\">" +
                    "<div class=\"w3-border w3-round w3-padding w3-light-grey\">" +
                    "<ul style=\"list-style-type:none\">" +
                    "<img class=\"LinkUl\" src=\"images/activity/" + data[i].picture + "\" width=\"200px\" height=\"100px\">" +
                    "<li><a href=\"/view/activity_specific.html?id="+data[i].id+"\">" + data[i].name + "</a></li><hr>" +
                    "<li class=\"LinkUl\">number of people:" + data[i].number + "(" + data[i].type + ")" + "</li>" +
                    "<li><button id=" + data[i].id + " style=\"margin-left: 50px\">Join</button></li></ul></div></div>";
                $('#list').append(a);
            }
            $("#list li").on("click", "button", function () {
                var id = $(this).attr("id");
                $.ajax("/activity/join/" + id, {
                    type: 'GET',
                    success: function (data) {
                        alert(data);
                    }
                })
            });
        }
    });

});
