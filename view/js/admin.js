/**
 * Created by tjDu on 2016/11/30.
 */
$(document).ready(function () {
    $.ajax("/user/getAll", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            displayData(data);
        }
    });
});
function displayData(data) {
    $('#list').empty();
    for (var i = 0; i < data.length; i++) {
        var a = "<li class=\"w3-padding-16\"><form method='post' action='/user/changeLevel'>" +
            "username:<input type='text' name='name' value=" + data[i].username + "><br>" +
            "password:<input type='text' name='password' value=" + data[i].password + "><br>level:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name='level' value=" + data[i].level + " type='text'>" +
            "<button type='submit' id=" + data[i].username + " style='margin-left: 50%' class=\"w3-btn w3-red\">Save</button></form></li>";
        $('#list').append(a);
    }
}