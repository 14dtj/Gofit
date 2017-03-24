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
    // $('select').on('change', function() {
    //     var type = this.val();
    //     alert('chafa');
    //     if (type == 'all' ) {
    //         $.ajax("/friend/month", {
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function (data) {
    //                 displayData(data);
    //             }
    //         });
    //     } else {
    //         $.ajax("/friend/friendsOnly", {
    //             type: 'GET',
    //             dataType: 'json',
    //             success: function (data) {
    //                 displayData(data);
    //             }
    //         });
    //     }
    // });
    $('#selectid').change(function () {
        // alert('show');
        var type = $('#selectid').val();
        switch (type) {
            case "all":
                $.ajax("/friend/month", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
            default:
                $.ajax("/friend/friendsOnly", {
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        displayData(data);
                    }
                });
                break;
        }
    })
});
function displayData(data) {
    $('#list').empty();
    var myIndex = 0;
    var j = i + 1;

    for (var i = 0; i < data.length; i++) {
        var a = '<tr class="first"> <td>'+ (i+1)+ '</td> <td> <img src="'+ data[i].avatar +'" class="img-circle avatar hidden-phone"/> <a href="../otherUser.html?name='+data[i].username+ '" class="name">'+data[i].username+ '</a> <span class="subtext">Graphic Design</span> </td> <td>Mar 13, 2012 </td> <td>'+data[i].sum_distance+ '</td> <td class="align-right">'+data[i].loca+ ' </td> </tr>';
        $('#list').append(a);
        if (data[i].username == myname) {
            myIndex = j;
        }
    }
    $('#head').html("You ranked " + myIndex + " in Gofit");
}