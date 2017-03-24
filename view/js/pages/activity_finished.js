/**
 * Created by Qiang on 24/03/2017.
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
                    var a = "<li class=\"w3-padding-16\">" +
                        "<img src=\"images/avatar/" + data[i].avatar + "\"" +
                        "class=\"w3-left w3-circle w3-margin-right\" style=\"width:60px\"> " +
                        "<a href=\"other_profile.html?name=" + data[i].username + "\">" +
                        "<span class=\"w3-xlarge\">" + data[i].username + "</span></a><br></li>";
                    $('#list').append(a);
                }
            }
        });

        $('#addComment').on('click', function (e) {
            e.preventDefault();
            var user = userData.username;
            var time = new Date().toLocaleString();
            var avatar = userData.avatar;
            var commentVal = $('#comment').val();
            $('#comment').html('');
            $('#commentsTable').append('<dl class="comment_item_comment_topic">  <dt class="comment_head"><a>' + user + '</a>&nbsp;&nbsp;' + time + '</dt> <dd class="comment_userface"><img src="'+ avatar + '" class="img-circle avatar hidden-phone" style="height: 60px"/></dd> <br> <dd class="comment_body"> ' + commentVal + '</dd> </dl>');
            showSuccess('Add Comment Success!')
        })

    }
);