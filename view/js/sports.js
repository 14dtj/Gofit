/**
 * Created by tjDu on 2016/11/13.
 */
$(document).ready(function () {
    $.ajax("/sports/record", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#goalNum').html("You have achieved " + data.goalSum + " goals");
            $('#distance').html(data.distanceSum + " km");
            $('#time').html(data.timeSum + " h");
            $('#calorie').html(data.calorieSum + " kcal");
        }
    });

    $('#sportsDate').bind('input onchange', function () {
        var date = $('#sportsDate').val();
        $.ajax("/sports/" + date, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#day_distance').html(data.distance + " km");
                $('#day_calorie').html(data.calorie + " kcal");
                $('#day_time').html(data.time + " h");
                $('#day_step').html(data.steps + " steps");
            }
        })
    });
});