<?php
class HtGlobal
{
    private static $htGlobal;

    public function __construct(){
        self::init();
    }

    public static function get($var)
    {
        return self::$htGlobal[$var];
    }

    public static function init()
    {
        self::$htGlobal = [
            "LOGIN_SUCCESS"
            => 20,
            "ERR_ENTER_EMAIL"
            => 21,
            "ERR_ENTER_PASS"
            => 22,
            "ERR_ENTER_EMAIL_AND_PASS"
            => 23,
            "ERR_INVALID_EMAIL"
            => 24,
            "ERR_WORNG_EMAIL_OR_PASS"
            => 25,
            "ERR_USER_NOT_EXIST"
            => 26,
            "MESSAGE_TYPE_SENT_SUCCESS"
            => "Your message has been sent. Please close to contuine ...",
            "MESSAGE_TYPE_ABUSE_SENT_SUCCESS"
            => "Thank you for your cooperation. We take missuse of our service seriously. Please close to contuine ... ",
            "MESSAGE_TYPE_ITEM_NOT_FOUND"
            => "Sorry! There is no item to display.<div id=>spanColumnXamharic>ይቅርታ!የሚታይ ምንም ንብረት የለም</div>",
            "rent"
            => "rent",
            "sell"
            => "sell",
            "rentOrSell"
            => "sell or Rent",
            "noAction"
            => "No Action",
            "email"
            => 1,
            "phone"
            => 2,
            "emailAndPhone"
            => 3,
            "birr"
            => "Birr",
            "dollar"
            => "USD",
            "nego"
            => "Negotiable",
            "status"
            => "pending",
            "CImage"
            => "carimages",
            "DImage"
            => "computerimages",
            "HImage"
            => "houseimages",
            "PImage"
            => "phoneimages",
            "EImage"
            => "electronicsimages",
            "HHImage"
            => "householdimages",
            "OImage"
            => "othersimages",
            "THUMBNAIL"
            => "thumbnail",
            "SCALE"
            => 45,
            "ACTIVE"
            => 'active',
            "PENDING"
            => 'pending',
            "DELETED"
            => 'deleted',
            "sentmsg"
            => 'Your message has been sent. Please close to contuine ...',
            "abusemsg"
            => 'Thank you for your cooperation. We take missuse of our service seriously. Please close to contuine ... ',
            "emptymsg"
            => 'Sorry! There is no item to display.<div id=spanColumnXamharic>ይቅርታ!የሚታይ ምንም ንብረት የለም</div>',
            "itemPerPage"
            => 30,
            "imagePerItem"
            => 5,
            "noItemToShow"
             => "Sorry! There is no item to display.<div id=\"spanColumnXamharic\">ይቅርታ!የሚታይ ምንም ንብረት የለም</div>"

        ];
    }
}
