
function itemSelect() {
    $(document).ready(function () {
        item = $("#item").val();
        item_class = item + "_search_cl";
        $(".se-el").hide();
        $("." + item_class).attr('style','display: block !important');
    })
}

function showSection(e) {
    var t = e;
    $(document).ready(function () {
        $(".eName").slideUp("fast");
        $(".ePass").slideUp("fast");
        $(".ePInfo").slideUp("fast");
        $(".eCMthd").slideUp("fast");
        $(".eCloseAcc").slideUp("fast");
        $(".overview").slideUp("fast");
        switch (t) {
            case 100:
                $(".eName").slideDown("fast");
                break;
            case 200:
                $(".ePass").slideDown("fast");
                break;
            case 300:
                $(".ePInfo").slideDown("fast");
                break;
            case 400:
                $(".eCMthd").slideDown("fast");
                break;
            case 500:
                $(".eCloseAcc").slideDown("fast");
                break;
            default:
                $(".overview").slideDown("fast");
                break
        }
    })
}

function amharicJs() {
    $(document).ready(function () {
        $(".helpAmharic").show();
        $(".helpEnglish").hide()
    })
}

function englishJs() {
    $(document).ready(function () {
        $(".helpAmharic").hide();
        $(".helpEnglish").show()
    })
}

function amharicAboutUs() {
    $(document).ready(function () {
        $("#aboutUsAmharic").show();
        $("#aboutUsEnglish").hide()
    })
}

function englishAboutUs() {
    $(document).ready(function () {
        $("#aboutUsAmharic").hide();
        $("#aboutUsEnglish").show()
    })
}

function amharicTerms() {
    $(document).ready(function () {
        $("#termsDivEnglish").hide();
        $("#termsDivAmharic").show()
    })
}

function englishTerms() {
    $(document).ready(function () {
        $("#termsDivEnglish").show();
        $("#termsDivAmharic").hide()
    })
}

function amharicPrivacyPo() {
    $(document).ready(function () {
        $("#privacyPolicyEnglish").hide();
        $("#privacyPolicyAmharic").show()
    })
}

function englishPrivacyPo() {
    $(document).ready(function () {
        $("#privacyPolicyEnglish").show();
        $("#privacyPolicyAmharic").hide()
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

function showMsgBox(e, t) {
    $(document).ready(function () {
        $("#msgbox" + e).show();
        $("#innermsgbox" + e).show();
        $("#divListbox" + e).hide();
        $("#nameColumn" + e).css("font-weight", "normal");
        $("#subjectColumn" + e).css("font-weight", "normal");
        $.ajax({
            url: "/includes/actionOnMessage.php?idArray=" + e + "&action=" + t,
            method: "GET"
        })
    });
    return false
}

function closeMsgBox(e) {
    $(document).ready(function () {
        $("#msgbox" + e).hide();
        $("#innermsgbox" + e).hide();
        $("#divListbox" + e).show();
        $("#txtMsgSent" + e).hide()
    });
    return false
}

function showReplyBox(e) {
    $(document).ready(function () {
        $("#innerreplybox" + e).show();
        $("#msgReplyClose" + e).hide()
    });
    return false
}

function closeReplyBox(e) {
    $(document).ready(function () {
        $("#innerreplybox" + e).hide();
        $("#msgReplyClose" + e).show()
    });
    return false
}

function sendReplyMsg(e, t, n) {
    $(document).ready(function () {
        var r = "";
        r = $("#replyMsg" + n).val();
        if (r == "") {
            alert("Please enter a message.")
        } else {
            $("#innerreplybox" + n).hide();
            $("#msgReplyClose" + n).show();
            $("#txtMsgSent" + n).show();
            $.ajax({
                url: "/includes/actionOnMessage.php?msg=" + r + "&useremail=" + e + "&youremail=" + t + "&action=reply",
                method: "GET"
            });
            return false
        }
    })
}

function msgActions(e) {
    var t = "";
    $(document).ready(function () {
        $("#topButtons").hide();
        $("#nextopButtons").show();
        t = checkboxArray.join(",");
        $.ajax({
            url: "/includes/actionOnMessage.php?idArray=" + t + "&action=" + e,
            method: "GET",
            success: function (e) {
                $("#msgNumb").html(e)
            }
        });
        $("input:checkbox").each(function (t) {
            if ($(this).is(":checked") == true) {
                var n = $(this).val();
                switch (e) {
                    case "delete":
                        $("#divListbox" + n).hide();
                        break;
                    case "follow":
                        $("#followSign" + n).show();
                        break;
                    case "unfollow":
                        $("#followSign" + n).hide();
                        break
                }
            }
        })
    });
    $("input:checkbox").attr("checked", false)
}

function messagetype(e) {
    $(document).ready(function () {
        $.ajax({
            url: "../includes/message.php?mail_type=" + e,
            method: "GET",
            success: function (e) {
                $("#mainColumn").html(e)
            }
        })
    })
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

function func_moderatorShow(e, t, n) {
    $(document).ready(function () {
        $.ajax({
            url: "/includes/moderatorActions.php?actionType=" + e + "&itemtype=" + t + "&itemid=" + n,
            method: "GET",
            success: function (e) {
                alert(e)
            }
        })
    })
}

function swap(item, itemNumber) {
    $(document).ready(function () {
        var i;
        var thumbnailWidth;
        thumbnailWidth = ($('#divCommon').width() / $('#divCommon').parent().width()) * 100;
        
        // For bigger screens
        if (thumbnailWidth < 35) {
            if (itemNumber % 3 == 0) {
                
                for (i = itemNumber; i >= (itemNumber - 2); i--) {
                    $(".tn_" + item + "_" + i).css("border", "none");
                    $("#divDetail_" + item + "_" + i).slideUp("fast");
                }
                $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
            } else if (itemNumber % 3 == 2) {
                
                for (i = (itemNumber - 1); i <= (itemNumber + 1); i++) {
                    $(".tn_" + item + "_" + i).css("border", "none");
                    $("#divDetail_" + item + "_" + i).slideUp("fast");
                }
                $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
            } else {
                
                for (i = itemNumber; i <= (itemNumber + 2); i++) {
                    $(".tn_" + item + "_" + i).css("border", "none");
                    $("#divDetail_" + item + "_" + i).slideUp("fast");
                }
                $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
            }
        // For medium screens
        } else if ( thumbnailWidth < 60) {
            if (itemNumber % 2 == 0) {
                
                for (i = itemNumber; i >= (itemNumber - 1); i--) {
                    $(".tn_" + item + "_" + i).css("border", "none");
                    $("#divDetail_" + item + "_" + i).slideUp("fast");
                }
                $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
            } else {
                
                for (i = itemNumber; i <= (itemNumber + 2); i++) {
                    $(".tn_" + item + "_" + i).css("border", "none");
                    $("#divDetail_" + item + "_" + i).slideUp("fast");
                }
                $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
                $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
                
            }
        // For small screens
        } else {
            $(".tn_" + item + "_" + itemNumber).css("border", "1px solid #0080ff");
            $("#divDetail_" + item + "_" + itemNumber).slideDown("fast");
        }
       
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
        $(".reportbox_" + itemName + id).slideDown("fast");
        $(".contact_" + itemName + id).slideUp("fast")
    })
}

function closeAbusebox(e, t) {
    $(document).ready(function () {
        $(".reportbox_" + t + e).slideUp("fast");
        $(".contact_" + t + e).slideDown("fast");
        $(".errorabuse_" + t + e).slideUp("fast");
        $("#selectabuse_" + t + "_" + e).removeAttr("style");
        $("#selectabuse_" + t + "_" + e).val("")
    })
}

function swapabuseback(e, t) {
    $(document).ready(function () {
        var n = $("#selectabuse_" + t + e).val();
        if (n === "000") {
            $(".errorabuse_" + t + e).slideDown("fast");
            $("#selectabuse_" + t + e).css("border", "1px solid #D8000C");
        } else {
            $(".errorabuse_" + t + e).slideUp("fast");
            $.ajax({
                url: "/includes/report.php?itemid=" + e + "&selected=" + n + "&itemtype=" + t,
                method: "GET"
            });
            $(".reportbox_" + t + e).slideUp("fast");
            $(".reportcfrm_" + t + e).slideDown("fast");
        }
    })
}

function swapabuseclose(e, t) {
    $(document).ready(function () {
        $(".reportbox_" + t + e).slideUp("fast");
        $(".reportcfrm_" + t + e).slideUp("fast");
        $(".contact_" + t + e).slideDown("fast");
        $(".errorabuse_" + t + e).slideUp("fast");
        $("#selectabuse_" + t + "_" + e).removeAttr("style");
        $("#selectabuse_" + t + "_" + e).val("")
    })
}

function adminAccount() {
    $(document).ready(function () {
        $(".commonAccount").hide();
        $(".adminClass").show()
    })
}

function userAccount() {
    $(document).ready(function () {
        $(".commonAccount").show();
        $(".adminClass").hide()
    })
}

function ValidateUpload() {
    var e = document.getElementById("Item").value;
    switch (e) {
        case "000":
            clearError("myform_errorloc");
            $(document).ready(function () {
                $("#commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF")
            });
            var t = "Please choose Item type<br>የንብረት ዓይነት መምረጥ ረስተዋል <br><br>";
            $("#myform_errorloc").append("<li>" + t + "</li>");
            return false;
            break;
        case "phoneClass":
        case "computerClass":
        case "electronicsClass":
        case "householdClass":
        case "otherClass":
            clearError("myform_errorloc");
            var n = document.getElementById("commonprice").value;
            var r = document.getElementById("title").value;
            var i = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
            var s = "Please enter your Title<br>ርዕስ ማስገባት ረስተዋል <br><br>";
            var o = n == "" || n == null ? true : false;
            var u = r == "" ? true : false;
            if (!o & !u) {
                return true
            } else if (o & !u) {
                clearError("myform_errorloc");
                $(document).ready(function () {
                    $("#title").css("border", "1px solid #3399FF");
                    $("#commonprice").css("border", "1px solid #D8000C");
                    $("#myform_errorloc").append("<li>" + i + "</li>")
                });
                return false
            } else if (!o & u) {
                clearError("myform_errorloc");
                $(document).ready(function () {
                    $("#title").css("border", "1px solid #D8000C");
                    $("#commonprice").css("border", "1px solid #3399FF");
                    $("#myform_errorloc").append("<li>" + s + "</li>")
                });
                return false
            } else {
                clearError("myform_errorloc");
                $(document).ready(function () {
                    $("#commonprice").css("border", "1px solid #D8000C");
                    $("#title").css("border", "1px solid #D8000C");
                    $("#myform_errorloc").append("<li>" + i + "</li>");
                    $("#myform_errorloc").append("<li>" + s + "</li>")
                });
                return false
            }
            break;
        case "carClass":
            clearError("myform_errorloc");
            var a = document.getElementById("c_isrent").checked ? true : false;
            var f = document.getElementById("c_issell").checked ? true : false;
            var l = document.getElementById("c_isnego").checked ? true : false;
            var c = "Please Rent enter price<br>የኪራይ ዋጋ ማስገባት ረስተዋል <br><br>";
            var h = "Please enter Rent rate<br>የኪራይ እግድ መምረጥ ረስተዋል <br><br>";
            if (a || f || l) {
                if (a && f) {
                    clearError("myform_errorloc");
                    var p = document.getElementById("c_rent_amt_input").value;
                    var d = document.getElementById("c_rate_select").value;
                    var v = p == "" || p == null ? true : false;
                    var m = d == "000" ? true : false;
                    var g = document.getElementById("c_sell_amt_input").value;
                    var y = g == "" || g == null ? true : false;
                    var b = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
                    if (!v && !m && !y) {
                        clearError("myform_errorloc");
                        return true
                    } else if (v && !m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rate_select").css("border", "1px solid #3399FF");
                            $("#c_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (v && !m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#c_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#c_rate_select").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + c + "</li>")
                        });
                        return false
                    } else if (!v && !m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#c_rate_select").css("border", "1px solid #3399FF");
                            $("#c_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (!v && m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#c_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + h + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (!v && m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#c_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#c_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#c_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    }
                }
                if (!a && f) {
                    clearError("myform_errorloc");
                    var g = document.getElementById("c_sell_amt_input").value;
                    var y = g == "" || g == null ? true : false;
                    var b = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
                    if (y) {
                        $(document).ready(function () {
                            $("#c_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else {
                        return true
                    }
                }
                if (a && !f) {
                    clearError("myform_errorloc");
                    var p = document.getElementById("c_rent_amt_input").value;
                    var d = document.getElementById("c_rate_select").value;
                    var v = p == "" || p == null ? true : false;
                    var m = d == "000" ? true : false;
                    if (!v && !m) {
                        clearError("myform_errorloc");
                        return true
                    } else if (v && !m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rate_select").css("border", "1px solid #3399FF");
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>")
                        });
                        return false
                    } else if (!v && m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#c_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#c_rate_select").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    }
                }
            } else {
                clearError("myform_errorloc");
                var w = "Please Select at least 1 option for Price (Rent,sell or Negotiable) <br>" + " ቢያንስ አንድ የመሸጫ መንገድ ይምረጡ (ከሚከተሉት ኪራይ፣ ሽያጭ ወይም በዋጋው እንስማማለን) <br> ";
                $("#myform_errorloc").append("<li>" + w + "</li>");
                return false
            }
            break;
        case "houseClass":
            clearError("myform_errorloc");
            var a = document.getElementById("h_isrent").checked ? true : false;
            var f = document.getElementById("h_issell").checked ? true : false;
            var l = document.getElementById("h_isnego").checked ? true : false;
            var c = "Please Rent enter price<br>የኪራይ ዋጋ ማስገባት ረስተዋል <br><br>";
            var h = "Please enter Rent rate<br>የኪራይ እግድ መምረጥ ረስተዋል <br><br>";
            if (a || f || l) {
                if (a && f) {
                    clearError("myform_errorloc");
                    var p = document.getElementById("h_rent_amt_input").value;
                    var d = document.getElementById("h_rate_select").value;
                    var v = p == "" || p == null ? true : false;
                    var m = d == "000" ? true : false;
                    var g = document.getElementById("h_sell_amt_input").value;
                    var y = g == "" || g == null ? true : false;
                    var b = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
                    if (!v && !m && !y) {
                        clearError("myform_errorloc");
                        return true
                    } else if (v && !m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rate_select").css("border", "1px solid #3399FF");
                            $("#h_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (v && !m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#h_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#h_rate_select").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + c + "</li>")
                        });
                        return false
                    } else if (!v && !m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#h_rate_select").css("border", "1px solid #3399FF");
                            $("#h_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (!v && m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#h_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + h + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else if (!v && m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#h_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m && !y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#h_sell_amt_input").css("border", "1px solid #3399FF");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m && y) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#h_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    }
                }
                if (!a && f) {
                    clearError("myform_errorloc");
                    var g = document.getElementById("h_sell_amt_input").value;
                    var y = g == "" || g == null ? true : false;
                    var b = "Please enter price<br>የመሸጫ ዋጋ ማስገባት ረስተዋል <br><br>";
                    if (y) {
                        $(document).ready(function () {
                            $("#h_sell_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + b + "</li>")
                        });
                        return false
                    } else {
                        return true
                    }
                }
                if (a && !f) {
                    clearError("myform_errorloc");
                    var p = document.getElementById("h_rent_amt_input").value;
                    var d = document.getElementById("h_rate_select").value;
                    var v = p == "" || p == null ? true : false;
                    var m = d == "000" ? true : false;
                    if (!v && !m) {
                        clearError("myform_errorloc");
                        return true
                    } else if (v && !m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rate_select").css("border", "1px solid #3399FF");
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>")
                        });
                        return false
                    } else if (!v && m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #3399FF");
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    } else if (v && m) {
                        clearError("myform_errorloc");
                        $(document).ready(function () {
                            $("#h_rent_amt_input").css("border", "1px solid #D8000C");
                            $("#h_rate_select").css("border", "1px solid #D8000C");
                            $("#myform_errorloc").append("<li>" + c + "</li>");
                            $("#myform_errorloc").append("<li>" + h + "</li>")
                        });
                        return false
                    }
                }
            } else {
                clearError("myform_errorloc");
                var w = "Please Select at least 1 option for Price (Rent,sell or Negotiable) <br>" + " ቢያንስ አንድ የመሸጫ መንገድ ይምረጡ (ከሚከተሉት ኪራይ፣ ሽያጭ ወይም በዋጋው እንስማማለን) <br> ";
                $("#myform_errorloc").append("<li>" + w + "</li>");
                return false
            }
            break;
        default:
            break
    }
    return true
}

function clearError(e) {
    document.getElementById(e).innerHTML = ""
}

function usernumber_of_active_items(e, t) {
    $(document).ready(function () {
        $.ajax({
            url: "/kista507/kista507/trunk/js/useractiveview.php?numberofuseractiveitems=" + e + "&userid=" + t + "&action_type= 1",
            method: "GET",
            success: function (e) {
                $("#mainColumn").html(e)
            }
        })
    })
}

function usernumber_of_pending_items(e, t) {
    $(document).ready(function () {
        $.ajax({
            url: "/kista507/kista507/trunk/js/useractiveview.php?numberofuseractiveitems=" + e + "&userid=" + t + "&action_type= 2",
            method: "GET",
            success: function (e) {
                $("#mainColumn").html(e)
            }
        })
    })
}
$(".LeftNav li a").live("click", function () {
    $(".LeftNav li a").removeClass("selected");
    $(this).addClass("selected");
    return false
});
$(document).ready(function () {
    $("#help > li > a").click(function () {
        $(this).next("#help li ul").slideToggle("fast").siblings("#help li ul:visible").slideUp("fast");
        $(this).toggleClass("active");
        $(this).siblings("#help li ul").removeClass("active")
    });
    $("#menu_1 > li > a").click(function () {
        $(this).next("#menu_1 li ul").slideToggle("fast").siblings("#menu_1 li ul:visible").slideUp("fast");
        $(this).toggleClass("active");
        $(this).siblings("#menu_1 li ul").removeClass("active")
    })
});
$(document).ready(function () {
    function r(e) {
        e = e.toLowerCase();
        var t = false;
        for (var r = 0; r < n.length; r++) {
            if (e == n[r]) {
                t = true;
                break
            }
        }
        if (!t) {
            return false
        }
        return true
    }
    var e, t;
    var n = ["gif", "jpeg", "jpg", "png", "bmp"];
    $("#input1").change(function () {
        e = $("#input1").val().replace(/.+[\\\/]/, "");
        t = e.substring(e.lastIndexOf(".") + 1);
        if (r(t)) {
            $("#imgName1").text(e);
            $("#img1").show();
            freeSlot[0] = 1;
            inputFlag = 0;
            showInput();
            $("#input1").hide()
        } else {
            alert("Sorry, " + e + " is invalid, allowed extensions are: " + n.join(", "));
            input1.focus()
        }
    });
    $("#input2").change(function () {
        e = $("#input2").val().replace(/.+[\\\/]/, "");
        t = e.substring(e.lastIndexOf(".") + 1);
        if (r(t)) {
            $("#imgName2").text(e);
            $("#img2").show();
            freeSlot[1] = 1;
            inputFlag = 0;
            showInput();
            $("#input2").hide()
        } else {
            alert("Sorry, " + e + " is invalid, allowed extensions are: " + n.join(", "));
            input2.focus()
        }
    });
    $("#input3").change(function () {
        e = $("#input3").val().replace(/.+[\\\/]/, "");
        t = e.substring(e.lastIndexOf(".") + 1);
        if (r(t)) {
            $("#imgName3").text(e);
            $("#img3").show();
            freeSlot[2] = 1;
            inputFlag = 0;
            showInput();
            $("#input3").hide()
        } else {
            alert("Sorry, " + e + " is invalid, allowed extensions are: " + n.join(", "));
            input3.focus()
        }
    });
    $("#input4").change(function () {
        e = $("#input4").val().replace(/.+[\\\/]/, "");
        t = e.substring(e.lastIndexOf(".") + 1);
        if (r(t)) {
            $("#imgName4").text(e);
            $("#img4").show();
            freeSlot[3] = 1;
            inputFlag = 0;
            showInput();
            $("#input4").hide()
        } else {
            alert("Sorry, " + e + " is invalid, allowed extensions are: " + n.join(", "));
            input4.focus()
        }
    });
    $("#input5").change(function () {
        e = $("#input5").val().replace(/.+[\\\/]/, "");
        t = e.substring(e.lastIndexOf(".") + 1);
        if (r(t)) {
            $("#imgName5").text(e);
            $("#img5").show();
            freeSlot[4] = 1;
            inputFlag = 0;
            showInput();
            $("#input5").hide()
        } else {
            alert("Sorry, " + e + " is invalid, allowed extensions are: " + n.join(", "));
            input5.focus()
        }
    });
    $("#deleteBtn1").click(function () {
        $("#input1").val("");
        $("#img1").hide();
        freeSlot[0] = 0;
        showInput()
    });
    $("#deleteBtn2").click(function () {
        $("#input2").val("");
        $("#img2").hide();
        freeSlot[1] = 0;
        showInput()
    });
    $("#deleteBtn3").click(function () {
        $("#input3").val("");
        $("#img3").hide();
        freeSlot[2] = 0;
        showInput()
    });
    $("#deleteBtn4").click(function () {
        $("#input4").val("");
        $("#img4").hide();
        freeSlot[3] = 0;
        showInput()
    });
    $("#deleteBtn5").click(function () {
        $("#input5").val("");
        $("#img5").hide();
        freeSlot[4] = 0;
        showInput()
    });
    $("#submitBtn").click(function () {
        if (freeSlot[0] == 0) {
            $("#input1").attr("disabled", "")
        }
        if (freeSlot[1] == 0) {
            $("#input2").attr("disabled", "")
        }
        if (freeSlot[2] == 0) {
            $("#input3").attr("disabled", "")
        }
        if (freeSlot[3] == 0) {
            $("#input4").attr("disabled", "")
        }
        if (freeSlot[4] == 0) {
            $("#input5").attr("disabled", "")
        }
    })
});
$(document).ready(function () {
    $('.tabs li a [id^="active"]').click(function () {
        $(this).css("background-color", "#ccc")
    });
    $("a.login-window").click(function () {
        var e = $(this).attr("href");
        $(e).fadeIn(300);
        var t = ($(e).height() + 24) / 2;
        var n = ($(e).width() + 24) / 2;
        $(e).css({
            "margin-top": -t,
            "margin-left": -n
        });
        $("body").append('<div id="mask"></div>');
        $("#mask").fadeIn(300);
        return false
    });
    $("a.tou-window").click(function () {
        var e = $(this).attr("href");
        $(e).fadeIn(300);
        var t = $(e).height() / 2;
        var n = $(e).width() / 2;
        $(e).css({
            "margin-top": -t,
            "margin-left": -n
        });
        $("body").append('<div id="mask"></div>');
        $("#mask").fadeIn(300);
        return false
    });
    $("a.private-window").click(function () {
        var e = $(this).attr("href");
        $(e).fadeIn(300);
        var t = $(e).height() / 2;
        var n = $(e).width() / 2;
        $(e).css({
            "margin-top": -t,
            "margin-left": -n
        });
        $("body").append('<div id="mask"></div>');
        $("#mask").fadeIn(300);
        return false
    });
    $("a.close, #mask").live("click", function () {
        $("#mask , .login-popup").fadeOut(300, function () {
            $("#mask").remove()
        });
        $("#mask , .tou-popup").fadeOut(300, function () {
            $("#mask").remove()
        });
        $("#mask , .private-popup").fadeOut(300, function () {
            $("#mask").remove()
        });
        return false
    })
});
$(document).ready(function () {
    $("#Item").change(function () {
        clearError("myform_errorloc");
        $("#carContent").slideUp("fast");
        $("#houseContent").slideUp("fast");
        $("#compContent").slideUp("fast");
        $("#electronicContent").slideUp("fast");
        $("#phoneContent").slideUp("fast");
        $("#householdContent").slideUp("fast");
        $("#othersContent").slideUp("fast");
        $("#uploadImgBox").slideUp("fast");
        $("#priceCommon").slideUp("fast");
        $("input:checkbox").removeAttr("checked");
        $(".c_isAdvanced").slideUp();
        $(".h_isAdvanced").slideUp();
        $(".c_isrent").hide();
        $(".c_issell").hide();
        $(".h_isrent").hide();
        $(".h_issell").hide();
        var e = $(this).val();
        switch (e) {
            case "carClass":
                $("#carContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "computerClass":
                $("#compContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $("#priceCommon").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "houseClass":
                $("#houseContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "electronicsClass":
                $("#electronicContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $("#priceCommon").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "phoneClass":
                $("#phoneContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $("#priceCommon").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "householdClass":
                $("#householdContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $("#priceCommon").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            case "otherClass":
                $("#othersContent").slideDown("fast");
                $("#uploadImgBox").slideDown("fast");
                $("#priceCommon").slideDown("fast");
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break;
            default:
                $(".commonprice").css("border", "1px solid #3399FF");
                $("#title").css("border", "1px solid #3399FF");
                break
        }
    });
    $("input[type=checkbox]").change(function () {
        var e = $(this).attr("id");
        if ($(this).is(":checked")) {
            switch (e) {
                case "c_isrent":
                    $("." + e).show();
                    break;
                case "c_issell":
                    $("." + e).show();
                    break;
                case "h_isrent":
                    $("." + e).show();
                    break;
                case "h_issell":
                    $("." + e).show();
                    break;
                default:
                    break
            }
        } else {
            $("." + e).hide()
        }
    });
    $("input[type=checkbox]").change(function () {
        var e = $(this).attr("id");
        if ($(this).is(":checked")) {
            switch (e) {
                case "c_isAdvanced":
                    $("." + e).slideDown();
                    break;
                case "h_isAdvanced":
                    $("." + e).slideDown();
                    break;
                default:
                    break
            }
        } else {
            $("." + e).slideUp()
        }
    });
    $("#hcategory").change(function () {
        var e = $(this).val();
        switch (e) {
            case "4":
                $("#lotsize").show();
                $("#metersquare").show();
                $("#condeminiumFloor").hide();
                break;
            case "3":
                $("#lotsize").hide();
                $("#metersquare").hide();
                $("#condeminiumFloor").show();
                break;
            default:
                $("#lotsize").hide();
                $("#metersquare").hide();
                $("#condeminiumFloor").hide();
                break
        }
    });
    $("#computer").change(function () {
        var e = $(this).val();
        switch (e) {
            case "1":
                $("#computerBrand").show();
                $("#computeracc").hide();
                $("#computerBrand").slideDown("fast");
                $("#ram").slideDown("fast");
                $("#harddisk").slideDown("fast");
                $("#processor").slideDown("fast");
                $("#OS").slideDown("fast");
            case "2":
                $("#computerBrand").show();
                $("#computeracc").hide();
                $("#computerBrand").slideDown("fast");
                $("#ram").slideDown("fast");
                $("#harddisk").slideDown("fast");
                $("#processor").slideDown("fast");
                $("#OS").slideDown("fast");
            case "3":
                $("#computerBrand").show();
                $("#computeracc").hide();
                $("#computerBrand").slideDown("fast");
                $("#ram").slideDown("fast");
                $("#harddisk").slideDown("fast");
                $("#processor").slideDown("fast");
                $("#OS").slideDown("fast");
                break;
            case "4":
                $("#computeracc").slideDown("fast");
                $("#computerBrand").slideUp("fast");
                $("#ram").slideUp("fast");
                $("#harddisk").slideUp("fast");
                $("#processor").slideUp("fast");
                $("#OS").slideUp("fast");
                break;
            default:
                $("#computeracc").slideUp("fast");
                $("#computerBrand").slideUp("fast");
                break
        }
    });
    $("#ccolor").change(function () {
        var e = $(this).val();
        if (e !== "999") {
            $("#colorz").show();
            $("#colorz").css({
                "background-color": e
            })
        } else {
            $("#colorz").hide()
        }
    });
    $("#city").change(function () {
        var e = $(this).val();
        if (e == "Addis Ababa") $("#subcity").slideDown("fast");
        else $("#subcity").slideUp("fast")
    })
})

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