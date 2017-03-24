/**
 * Created by tjDu on 2016/11/13.
 */
$(document).ready(function () {
    $.ajax("/showBasicInfo", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#name').html(data.name);
            $('#gender').html(data.gender);
            $('#userLocation').html(data.location);
            $('#birth').html(data.birth);
            $('#interest').html(data.interest);
            $('#favourite').html(data.interest);
            $('#motto').html(data.motto);
            $('#avatar').attr('src', data.avatar)
        }
    });

    $.ajax("/activity/joined", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var a = "<div class=\"w3-container w3-section\">" +
                    "<div class=\"w3-border w3-round w3-padding w3-light-grey\">" +
                    "<ul style=\"list-style-type:none\">" +
                    "<img class=\"LinkUl\" src=\"images/activity/" + data[i].picture + "\" width=\"200px\" height=\"100px\">" +
                    "<li><h2>" + data[i].name + "</h2></li><hr>" +
                    "<li class=\"LinkUl\">number of people:" + data[i].number + "(" + data[i].type + ")" + "</li>" +
                    "<li><button id=" + data[i].id + " style=\"margin-left: 50px\">Quit</button></li></ul></div></div>";
                $('#joinedList').append(a);
            }
            $("#joinedList li").on("click", "button", function () {
                var id = $(this).attr("id");
                $.ajax("/activity/quit/" + id, {
                    type: 'GET',
                    success: function (data) {
                        location.reload();
                    }
                })
            });
        }
    });


});
