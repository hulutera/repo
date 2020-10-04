
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

function imgnumber(e, t, n, r) {
    var i = "largeImg" + r + n;
    var des = e + t;
    document.getElementById(i).src = des;
}

function mouseOver(e, t, n, r, s) {
    var i = "largeImg" + r + n;
    var des = e + t;
    $("#" + s)
        .mouseover(function () {
            document.getElementById(i).src = des;
        });
}

function insertimg(e, t, n, r) {
    var i = r.split(",");
    var bottom = "bottomimg" + n + t;
    var z = 0;
    for (var s = 0; s < i.length; s++) {
        j = s + 1;
        z = i[s];
        var q = 'thumbnail/thumbnail';
        document.getElementById(bottom + j).src = e + q + z;
    }
}

function func_moderatorActions(e, t, n, r, i, s) {
    $(document).ready(function () {
        $(".thumblist_" + t + n).hide();
        $.ajax({
            url: "/includes/moderatorActions.php?actionType=" + e + "&itemtype=" + t + "&itemid=" + n + "&time=" + r + "&user=" + i + "&link=" + s,
            method: "GET",
            success: function (e) {
                $("#" + s).html(e)
            }
        })
    })
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
        var i;
        var thumbnailWidth;
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

function swapmail(e, t) {
    $(document).ready(function () {
        $(".message_" + t + e).slideDown("fast");
        $(".contact_" + t + e).slideUp("fast");
        $(".showbutton_hide").slideUp("fast")
    })
}

function closeMsgbox(e, t) {
    $(document).ready(function () {
        $(".message_" + t + e).slideUp("fast");
        $(".contact_" + t + e).slideDown("fast");
        $(".showbutton_hide").slideDown("fast");
        $(".error_1" + t + e).slideUp("fast");
        $(".error_2" + t + e).slideUp("fast");
        $("#name_" + t + e).removeAttr("style");
        $("#email_" + t + e).removeAttr("style");
        $("#description_" + t + e).removeAttr("style")
    })
}

function validateEmail(e) {
    var t = e.indexOf("@");
    var n = e.lastIndexOf(".");
    if (t < 1 || n < t + 2 || n + 2 >= e.length) {
        return false
    }
    return true
}

function swapmailback(e, t, n) {
    $(document).ready(function () {
        var r = $("#msgcontainer1");
        var i = $("#name_" + n + e).val();
        var s = $("#email_" + n + e).val();
        var o = $("#description_" + n + e).val();
        if (i === "" || s === "" || o === "") {
            $(".error_1" + n + e).slideDown("fast");
            $("#name_" + n + e).css("border", "1px solid #D8000C");
            $("#email_" + n + e).css("border", "1px solid #D8000C");
            $("#description_" + n + e).css("border", "1px solid #D8000C");
        } else if (validateEmail(s)) {
            $(".error_1" + n + e).slideUp("fast");
            $(".message_" + n + e).slideUp("fast");
            $(".sent_" + n + e).slideDown("fast");
            $.ajax({
                url: "/includes/sendMessage.php?itemid=" + e + "&name=" + i + "&email=" + s + "&msg=" + o + "&uemail=" + t + "&itemtype=" + n,
                method: "GET",
                success: function (e) { }
            });
            $("#name_" + n + e).val("");
            $("#email_" + n + e).val("");
            $("#description_" + n + e).val("");
            $(".error_2" + n + e).slideUp("fast")
        } else {
            $(".error_1" + n + e).slideUp("fast");
            $(".error_2" + n + e).slideDown("fast");
            $("#name_" + n + e).css("border", "1px solid #4F8A10");
            $("#email_" + n + e).css({
                "background-color": "#FFBABA",
                border: "1px solid #D8000C"
            });
            $("#description_" + n + e).css("border", "1px solid #4F8A10")
        }
    })
}

function swapmailclose(e, t) {
    $(document).ready(function () {
        $(".message_" + t + e).slideUp("fast");
        $(".sent_" + t + e).slideUp("fast");
        $(".contact_" + t + e).slideDown("fast");
        $(".showbutton_hide").slideDown("fast");
        $("#name_" + t + e).removeAttr("style");
        $("#email_" + t + e).removeAttr("style");
        $("#description_" + t + e).removeAttr("style")
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