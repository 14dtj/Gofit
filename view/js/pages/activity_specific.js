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
                $('#type').html(data.type);
                $('#introduction').html(data.introduction);
                $('#time').html(data.start_time + " to " + data.end_time);
                $('#cover').attr('src', data.picture);
                $('#award').html(data.award);
                $('#number').append(data.number);
                $('#sports').append(data.sports);
            }
        });

        var userData;
        $.ajax("/getBriefInfo", {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                userData = data;
                $('#barUserName').html(data.username);
                $('#friends').append(data.friends);
                $('#credit').append(data.credit);
                $('#level').append(data.level);
                $('#avatar').append("<img src=\"images/avatar/" + data.avatar + "\" />");
            }
        });


        $("#button").on("click", function () {
            $.ajax("/activity/join/" + id, {
                type: 'GET',
                success: function (data) {
                    $('#joinedList').append('<tr> <td> <img src="' + userData.avatar + '" class="img-circle avatar hidden-phone" style="height: 50px"/> <a href="../myInfo.html" class="name">' + userData.username + '</a> </td> </tr>');
                }
            })
        });
        $.ajax("/activity/joinedUser/" + id, {
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    var userData = data[i];
                    $('#joinedList').append('<tr> <td> <img src="' + data[i].avatar + '" class="img-circle avatar hidden-phone" style="height: 50px"/> <a href="../otherUser.html?name='+data[i].username+  '" class="name">' + data[i].username + '</a> </td> </tr>');
                }
            }
        });

        $('#addComment').on('click', function (e) {
            e.preventDefault();
            var user = userData.username;
            var time = new Date().toLocaleString();
            var avatar = userData.avatar;
            var commentVal = $('#comment').val();

            // console.log($('#comment').val())
            $('#comment').val('');
            // console.log($('#comment').val())

            $('#commentsTable').append('<dl class="comment_item_comment_topic">  <dt class="comment_head"><a>' + user + '</a>&nbsp;&nbsp;' + time + '</dt> <dd class="comment_userface"><img src="'+ avatar + '" class="img-circle avatar hidden-phone" style="height: 60px"/></dd> <br> <dd class="comment_body"> ' + commentVal + '</dd> </dl>');
            showSuccess('Add Comment Success!')
        })

    }
);