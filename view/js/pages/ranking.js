/**
 * Created by tjDu on 2016/11/14.
 */
var myname;
$(document).ready(function () {
    $.ajax("/friend/month", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            displayData(data);
        }
    });
    $('#selectid').change(function () {
        var type = $('#selectid').val();
        switch (type) {
            case "today":
                $.ajax("/friend/today", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            case "7":
                $.ajax("/friend/week", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            case "30":
                $.ajax("/friend/month", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            default:
                break;
        }
    })
});
function displayData(data) {
    $('#list').empty();
    var myIndex = 0;
    var j = i + 1;

    for (var i = 0; i < data.length; i++) {
        var a = '<tr class="first"> <td>'+ (i+1)+ '</td> <td> <img src="'+ data[i].avatar +'" class="img-circle avatar hidden-phone"/> <a href="../otherUser.html?name='+data[i].username+ '" class="name">'+data[i].username+ '</a> <span class="subtext">Graphic Design</span> </td> <td>Mar 13, 2012 </td> <td>'+data[i].sum_distance+ '</td> <td class="align-right">'+data[i].location+ ' </td> </tr>';
        $('#list').append(a);
        if (data[i].username == myname) {
            myIndex = j;
        }
    }
    $('#head').html("You ranked " + myIndex + " in Gofit");
}