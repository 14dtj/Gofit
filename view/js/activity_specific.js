/**
 * Created by tjDu on 2016/11/28.
 */
$(document).ready(function () {
        var str = window.location.search;
        var index = str.indexOf("=");
        var id = str.substring(index + 1);
        $.ajax("/activity/specific/" + id, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#name').html(data.name);
                $('#type').append(data.type);
                $('#introduction').html(data.introduction);
                $('#time').append(data.start_time + " to " + data.end_time);
                $('#cover').append("<img width='700' height='400' src=\"images/activity/" + data.picture + "\" />");
                $('#award').append(data.award);
                $('#number').append(data.number);
                $('#sports').append(data.sports);
            }
        });
        $("#button").on("click", function () {
            $.ajax("/activity/join/" + id, {
                type: 'GET',
                success: function (data) {
                    alert(data);
                }
            })
        });
        $.ajax("/activity/joinedUser/" + id, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    var a = "<li class=\"w3-padding-16\">" +
                        "<img src=\"images/avatar/" + data[i].avatar + "\"" +
                        "class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\"> " +
                        "<a href=\"other_profile.html?name=" + data[i].username + "\">" +
                        "<span class=\"w3-xlarge\">" + data[i].username + "</span></a><br></li>";
                    $('#list').append(a);
                }
            }
        });
    }
);