/**
 * Created by tjDu on 2016/11/13.
 */
$(document).ready(function () {
    $.ajax("/showBasicInfo", {
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#name').val(data.name);
            $('#gender').val(data.gender);
            $('#location').val(data.location);
            $('#birth').val(data.birth);
            $('#interest').val(data.interest);
            $('#motto').val(data.motto);
        }
    });
});
function previewImage() {

}