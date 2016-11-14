/**
 * Created by tjDu on 2016/11/14.
 */
$(document).ready(function () {
        var str = window.location.search;
        var index = str.indexOf("=");
        var name = str.substring(index + 1);
        $.ajax("/friend/info/" + name, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#username').html(data.username);
                $('#motto').html(data.motto);
                $('#location').html(data.location);
                $('#level').append(data.level);
                $('#avatar').html("<img src=\"/view/images/avatar/" + data.avatar + "\" class=\"w3-left w3-circle w3-margin-right\" style=\"width:100px\">");
                $('#interest').html(data.interest);
            }
        });
        $.ajax("/friend/followerNum/" + name, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#follower').append(data.counts);
            }
        });
        $.ajax("/friend/followingNum/" + name, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#following').append(data.counts);
            }
        });
        $.ajax("/friend/sports/" + name, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#goal').html("Achieved " + data.goalSum + " goals");
                $('#distance').html(data.distanceSum + " km");
                $('#time').html(data.timeSum + " h");
                $('#calorie').html(data.calorieSum + " kcal");
            }
        });
        $.ajax("/friend/isFollow/" + name, {
            type: 'GET',
            success: function (data) {
                $('#actionBtn').html(data);
            }
        });
        $('#actionBtn').bind("click", function () {
            var action = $('#actionBtn').html();
            $.ajax("/friend/follow/" + action + "/" + name, {
                type: 'GET',
                success: function (data) {
                    alert(data);
                    history.go(0);
                }
            })
        });

    }
);