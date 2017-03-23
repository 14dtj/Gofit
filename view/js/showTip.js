/**
 * Created by Qiang on 22/03/2017.
 */
Messenger.options = {
    extraClasses: 'messenger-fixed messenger-on-top messenger-on-right',
    theme: 'flat',
    hideAfter: 1

};
function showError(msg) {
    Messenger().post({
        message: msg,
        type: 'error',
        showCloseButton: true,
        hideAfter:1
    });
}
function showSuccess(msg) {

    Messenger().post({
        message: msg,
        showCloseButton: true,
        hideAfter:1


    });
}