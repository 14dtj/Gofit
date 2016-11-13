/**
 * Created by tjDu on 2016/11/5.
 */
$(document).ready(function () {
    $.ajax("/health/bmi", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('#weight').val(data.weight);
            $('#height').val(data.height);
            var temp = (data.height / 100) * (data.height / 100);
            var bmi = data.weight / temp;
            $('#bmi').html("BMI:" + bmi);
            if (bmi < 18.5) {
                $('#advice').html("You should put on some weight!");
            } else if (bmi > 24.99) {
                $('#advice').html("You should exercise more and pay attention on a healthy diet!");
            } else {
                $('#advice').html("Good job! Keep healthy!");
            }
        }
    });

    $.ajax("/health/sleepNights", {
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('#wellSleep').html("Well sleep: " + data.counts + " nights");
        }
    });


    $('#sleepDate').bind('input onchange', function () {
        var date = $('#sleepDate').val();
        $.ajax("/health/sleep/" + date, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#rate').html(data.rate * 100 + "%");
                $('#startTime').html(data.start_time);
                $('#endTime').html(data.end_time);
                $('#sleepTime').html(data.sleep_time + "h");
                $('#highTime').html(data.rate * data.sleep_time + "h");
            }
        })
    });

});
