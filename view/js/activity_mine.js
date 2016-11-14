/**
 * Created by tjDu on 2016/11/14.
 */
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
    $.ajax("/activity/organized", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var a = "<div class=\"w3-container w3-section\">" +
                    "<div id=" + data[i].id + " class=\"w3-border w3-round w3-padding w3-light-grey\">" +
                    "<ol>" +
                    "<img class=\"LinkUl\" src=\"images/activity/" + data[i].picture + "\" width=\"200px\" height=\"100px\">" +
                    "<li><h2>" + data[i].name + "</h2></li><hr>" +
                    "<li class=\"LinkUl\">number of people:" + data[i].number + "(" + data[i].type + ")" + "</li>" +
                    "<li><button class=\"LinkUl\" style=\"margin-left: 50px\">Cancel</button></li>" +
                    "<li><button style=\"margin-left: 50px\">Edit</button></li></ol></div></div>";
                $('#organizedList').append(a);
            }
            // $("#list div").on("click", "div", function () {
            //     var id = $(this).attr("id");
            //
            //     $.ajax("/activity/join/" + id, {
            //         type: 'GET',
            //         success: function (data) {
            //         }
            //     })
            // });
        }
    });
    $.ajax("/activity/joined", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var a = "<div class=\"w3-container w3-section\">" +
                    "<div id=" + data[i].id + " class=\"w3-border w3-round w3-padding w3-light-grey\">" +
                    "<ol>" +
                    "<img class=\"LinkUl\" src=\"images/activity/" + data[i].picture + "\" width=\"200px\" height=\"100px\">" +
                    "<li><h2>" + data[i].name + "</h2></li><hr>" +
                    "<li class=\"LinkUl\">number of people:" + data[i].number + "(" + data[i].type + ")" + "</li>" +
                    "<li><button style=\"margin-left: 50px\">Quit</button></li></ol></div></div>";
                $('#joinedList').append(a);
            }
            // $("#list div").on("click", "div", function () {
            //     var id = $(this).attr("id");
            //     $(this).remove();
            //     $.ajax("/activity/join/" + id, {
            //         type: 'GET',
            //         success: function (data) {
            //             alert(data);
            //         }
            //     })
            // });
        }
    });

});
