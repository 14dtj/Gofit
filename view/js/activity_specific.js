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
    }
);