/**
 * Created by tjDu on 2016/11/29.
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
        var str = window.location.search;
        var index = str.indexOf("=");
        var id = str.substring(index + 1);
        $.ajax("/activity/specific/" + id, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var start = data.start_time;
                var end = data.end_time;
                var array1 = start.split(" ", 2);
                var array2 = end.split(" ", 2);
                $('#name').val(data.name);
                $('#type').val(data.type);
                $('#introduction').val(data.introduction);
                $('#award').val(data.award);
                $('#number').val(data.number);
                $('#sports').val(data.sports);
                $('#start_date').val(array1[0]);
                $('#end_date').val(array2[0]);
                $('#start_time').val(array1[1]);
                $('#end_time').val(array2[1]);
            }
        });
        $('#form').submit(function (e) {
            e.preventDefault();
            $.ajax("/activity/edit/" + id, {
                type: 'POST',
                data: $('#form').serialize(),
                success:function (data) {
                    alert(data);
                }
            });
        });
    }
);