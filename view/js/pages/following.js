/**
 * Created by Qiang on 24/03/2017.
 */
/**
 * Created by tjDu on 2016/11/14.
 */
var myname;
$(document).ready(function () {
    $.ajax("/friend/following", {
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
    var jobType = ['Graphic Designer', 'Lawyer', 'Doctor' , 'Undergraduate' , 'IT Coder'];
    var joinedDate = ['2015-3-23', '2016-3-24', '2016-5-14', '2015-6-17','2017-5-14' ];
    for (var i = 0; i < data.length; i++) {
        var a = '<tr class="first"> <td>'+ (i+1)+ '</td> <td> <img src="'+ data[i].avatar +'" class="img-circle avatar hidden-phone"/> <a href="../otherUser.html?name='+data[i].username+ '" class="name">'+data[i].username+ '</a> <span class="subtext">'+  jobType[i%5] +  '</span> </td> <td>'+ joinedDate[i%5]+'</td> <td>'+data[i].motto+ '</td> <td class="align-right">'+data[i].location+ ' </td> </tr>';
        $('#list').append(a);
        if (data[i].username == myname) {
            myIndex = j;
        }
    }
    $('#head').html("You ranked " + myIndex + " in Gofit");
}/**
 * Created by Qiang on 24/03/2017.
 */
