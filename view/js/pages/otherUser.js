/**
 * Created by Qiang on 24/03/2017.
 */
$(document).ready(function () {
        var str = window.location.search;
        var index = str.indexOf("=");
        var name = str.substring(index + 1);
        $.ajax("/friend/info/" + name, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#name').html(data.username);
                $('#gender').html(data.gender);
                $('#userLocation').html(data.location);
                $('#birth').html(data.birth);
                $('#interest').html(data.interest);
                $('#favourite').html(data.interest);
                $('#motto').html(data.motto);
                $('#avatar').attr('src', data.avatar)
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
                $('#follow').html(data);
            }
        });
        $('#follow').bind("click", function () {
            var action = $('#follow').html();
            $.ajax("/friend/follow/" + action + "/" + name, {
                type: 'GET',
                success: function (data) {
                    showSuccess(data);
                    history.go(0);
                }
            })
        });

    }
);