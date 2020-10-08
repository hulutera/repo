
function itemSelect() {
    $(document).ready(function () {
        item = $("#item").val();
        item_class = item + "_search_cl";
        $(".se-el").hide();
        $("." + item_class).attr('style', 'display: block !important');
        item_array = ['car', 'house', 'computer', 'phone', 'electronic', 'household', 'other'];
        $.each(item_array, function (i, value) {
            $("." + value + '_select').attr('disabled', 'disabled');
        });
        $("." + item + "_select").removeAttr('disabled', 'disabled');
    })
}

function imgnumber(dir, file_name, id, item) {
    var i = "largeImg" + item + id;
    var des = dir + file_name;
    document.getElementById(i).src = des;
}

function item_action(action_type, item, id) {
    $(document).ready(function () {
        $.ajax({
            url: "/includes/action.on.item.php?actionType=" + action_type + "&itemtype=" + item + "&itemid=" + id,
            method: "GET"
        });
        return false
    })
}

function swap(item, itemNumber) {
    $(document).ready(function () {
        var i, thumbnailWidth;
        thumbnailWidth = ($('#divCommon').width() / $('#divCommon').parent().width()) * 100;

        $.each(['car', 'house', 'computer', 'phone', 'electronic', 'household', 'other'], function (index, value) {

            // For bigger screens
            if (thumbnailWidth < 35) {
                if (itemNumber % 3 == 0) {

                    for (i = itemNumber; i >= (itemNumber - 2); i--) {
                        $(".tn_" + value + "_" + i).css("border", "none");
                        $("#divDetail_" + value + "_" + i).slideUp("fast");
                    }
                    $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                    $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");
                } else if (itemNumber % 3 == 2) {

                    for (i = (itemNumber - 1); i <= (itemNumber + 1); i++) {
                        $(".tn_" + value + "_" + i).css("border", "none");
                        $("#divDetail_" + value + "_" + i).slideUp("fast");
                    }
                    $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                    $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");
                } else {

                    for (i = itemNumber; i <= (itemNumber + 2); i++) {
                        $(".tn_" + value + "_" + i).css("border", "none");
                        $("#divDetail_" + value + "_" + i).slideUp("fast");
                    }
                    $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                    $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");
                }
                // For medium screens
            } else if (thumbnailWidth < 60) {
                if (itemNumber % 2 == 0) {

                    for (i = itemNumber; i >= (itemNumber - 1); i--) {
                        $(".tn_" + value + "_" + i).css("border", "none");
                        $("#divDetail_" + value + "_" + i).slideUp("fast");
                    }
                    $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                    $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");
                } else {

                    for (i = itemNumber; i <= (itemNumber + 2); i++) {
                        $(".tn_" + value + "_" + i).css("border", "none");
                        $("#divDetail_" + value + "_" + i).slideUp("fast");
                    }
                    $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                    $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");

                }
                // For small screens
            } else {
                $(".tn_" + value + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + value + "_" + itemNumber).slideDown("fast");
            }
        });
    })
}

function swapback(item, itemNumber) {
    $(document).ready(function () {
        $(".thumblist_" + item + "_" + itemNumber).slideDown("fast");
        $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #ddd");
        $("#divDetail_" + item + "_" + itemNumber).slideUp("fast");
    })
}

// show item specification
function showspec(item, id) {
    $(document).ready(function () {
        $("#spec_" + item + id).slideDown("fast");
        $("#spec_up_" + item + id).show();
        $("#spec_down_" + item + id).hide()
    })
}

// hide item specification
function hidespec(item, id) {
    $(document).ready(function () {
        $("#spec_" + item + id).slideUp("fast");
        $("#spec_up_" + item + id).hide();
        $("#spec_down_" + item + id).show()
    })
}

function swapmail(id, item) {
    $(document).ready(function () {
        $(".message_" + item + "-" + id).slideDown("fast");
        $(".contact_" + item +  "-" + id).slideUp("fast");
        $(".showbutton_hide").slideUp("fast")
    })
}

function closeMsgbox(id, item) {
    $(document).ready(function () {
        $(".message_" + item + "-" + id).slideUp("fast");
        $(".contact_" + item + "-" + id).slideDown("fast");
        $(".showbutton_hide").slideDown("fast");
        $(".error_1" + item + "-" + id).slideUp("fast");
        $(".error_2" + item + "-" + id).slideUp("fast");
        $("#name_" + item + "-" + id).removeAttr("style");
        $("#email_" + item + "-" + id).removeAttr("style");
        $("#description_" + item + "-" + id).removeAttr("style")
    })
}

function swapmailback(id, email, item) {
    $(document).ready(function () {
        var i = $("#name_" + item + "-" + id).val();
        var s = $("#email_" + item + "-" + id).val();
        var o = $("#description_" + item + "-" + id).val();
        if (i === "" || s === "" || o === "") {
            $(".error_1" + item + "-" + id).slideDown("fast");
            $("#name_" + item + "-" + id).css("border", "1px solid #D8000C");
            $("#email_" + item + "-" + id).css("border", "1px solid #D8000C");
            $("#description_" + item + "-" + id).css("border", "1px solid #D8000C");
        } else if (validateEmail(s)) {
            $(".error_1" + item + "-" + id).slideUp("fast");
            $(".message_" + item + "-" + id).slideUp("fast");
            $(".sent_" + item + "-" + id).slideDown("fast");
            $.ajax({
                url: "/includes/sendMessage.php?itemid=" + id + "&name=" + i + "&email=" + s + "&msg=" + o + "&uemail=" + email + "&itemtype=" + item,
                method: "GET",
            });
            $("#name_" + item + "-" + id).val("");
            $("#email_" + item + "-" + id).val("");
            $("#description_" + item + "-" + id).val("");
            $(".error_2" + item + "-" + id).slideUp("fast")
        } else {
            $(".error_1" + item + "-" + id).slideUp("fast");
            $(".error_2" + item + "-" + id).slideDown("fast");
            $("#name_" + item + "-" + id).css("border", "1px solid #4F8A10");
            $("#email_" + item + "-" + id).css({
                "background-color": "#FFBABA",
                border: "1px solid #D8000C"
            });
            $("#description_" + item + "-" + id).css("border", "1px solid #4F8A10")
        }
    })
}

function swapmailclose(id, item) {
    $(document).ready(function () {
        $(".message_" + item + "-" + id).slideUp("fast");
        $(".sent_" + item + "-" + id).slideUp("fast");
        $(".contact_" + item + "-" + id).slideDown("fast");
        $(".showbutton_hide").slideDown("fast");
        $("#name_" + item + "-" + id).removeAttr("style");
        $("#email_" + item + "-" + id).removeAttr("style");
        $("#description_" + item + "-" + id).removeAttr("style")
    })
}

function swapabuse(id, itemName) {
    $(document).ready(function () {
        $(".reportbox_" + itemName + "-" + id).slideDown("fast");
        $(".contact_" + itemName + "-" + id).slideUp("fast")
    })
}

function closeAbusebox(id, itemName) {
    $(document).ready(function () {
        $(".reportbox_" + itemName + "-" + id).slideUp("fast");
        $(".contact_" + itemName + "-" + id).slideDown("fast");
        $(".errorabuse_" + itemName + "-" + id).slideUp("fast");
        $("#selectabuse_" + itemName + "-" + id).removeAttr("style");
        $("#selectabuse_" + itemName + "-" + id).val("")
    })
}

function swapabuseback(id, itemName) {
    $(document).ready(function () {
        var n = $("#selectabuse_" + itemName + "-" + id).val();
        if (n === "000") {
            $(".errorabuse_" + itemName + "-" + id).slideDown("fast");
            $("#selectabuse_" + itemName + "-" + id).css("border", "1px solid #D8000C");
        } else {
            $(".errorabuse_" + itemName + "-" + id).slideUp("fast");
            $.ajax({
                url: "/includes/report.php?itemid=" + id + "&selected=" + n + "&itemtype=" + itemName,
                method: "GET"
            });
            $(".reportbox_" + itemName + "-" + id).slideUp("fast");
            $(".reportcfrm_" + itemName + "-" + id).slideDown("fast");
        }
    })
}

function swapabuseclose(id, itemName) {
    $(document).ready(function () {
        $(".reportbox_" + itemName + "-" + id).slideUp("fast");
        $(".reportcfrm_" + itemName + "-" + id).slideUp("fast");
        $(".contact_" + itemName + "-" + id).slideDown("fast");
        $(".errorabuse_" + itemName + "-" + id).slideUp("fast");
        $("#selectabuse_" + itemName + "-" + id).removeAttr("style");
        $("#selectabuse_" + itemName + "-" + id).val("")
    })
}

function mobSidelist() {
    $(document).ready(function () {
        $('#sidelist ul').toggle();
    })
}

function mobMyItem() {
    $(document).ready(function () {
        $('#modnav ul').toggle();
    })
}

function toggleDivs(key) {
    $(document).ready(function () {
        innerDiv = $('.help-' + key).css('display');
        if (innerDiv == 'none') {
            $('.help-' + key).hide();
        } else {
            $('.help-' + key).show();
        }
        $('.help-' + key).toggle();
        $('.help-minus-' + key).toggle();
        $('.help-plus-' + key).toggle();
        if ($('.help-tabs-' + key).css('background-color') == 'white' || $('.help-tabs-' + key).css('background-color') == 'rgb(255, 255, 255)') {
            $('.help-tabs-' + key).css('background-color', '#0080ff');
            $('.help-tabs-' + key).css('color', 'white');
        } else {
            $('.help-tabs-' + key).css('background-color', 'white');
            $('.help-tabs-' + key).css('color', 'black');
        }

    });

    var reg = document.getElementById("help-" + key).style.display;
    if (reg == 'none') {
        var div = document.getElementById("vid-" + key);
        div.pause();
    }
}

function playVideo(key) {
    var div = document.getElementById("vid-" + key);
    if (div.paused) {
        div.play();
    } else if (!(div.paused)) {
        div.pause();
    }
}

function hideShowSingleDivs(hideDiv, showDiv) {
    $(document).ready(function () {
        $("." + hideDiv).hide();
        $("." + showDiv).show();
    })
}