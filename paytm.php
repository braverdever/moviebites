<?php
    //require_once("encdec_paytm.php");
	require_once("lib/encdec_paytm.php");
    define("merchantMid", "Cpxxwx81550760429816");
    // Key in your staging and production MID available in your dashboard
    define("merchantKey", "LYAHXyq@IpODA0Q&");
    // Key in your staging and production MID available in your dashboard
    define("orderId", "order1");
    define("channelId", "WAP");
    define("custId", "cust123");
    define("mobileNo", "7777777777");
    define("email", "username@emailprovider.com");
    define("txnAmount", "100.12");
    define("website", "WEBSTAGING");
    // This is the staging value. Production value is available in your dashboard
    define("industryTypeId", "Retail");
    // This is the staging value. Production value is available in your dashboard
    define("callbackUrl", "https://securegw-stage.paytm.in/theia/paytmCallback?ORDER_ID=order1");
    $paytmParams = array();
    $paytmParams["MID"] = merchantMid;
    $paytmParams["ORDER_ID"] = orderId;
    $paytmParams["CUST_ID"] = custId;
    $paytmParams["MOBILE_NO"] = mobileNo;
    $paytmParams["EMAIL"] = email;
    $paytmParams["CHANNEL_ID"] = channelId;
    $paytmParams["TXN_AMOUNT"] = txnAmount;
    $paytmParams["WEBSITE"] = website;
    $paytmParams["INDUSTRY_TYPE_ID"] = industryTypeId;
    $paytmParams["CALLBACK_URL"] = callbackUrl;
    $paytmChecksum = getChecksumFromArray($paytmParams, merchantKey);
	 print_r ($paytmChecksum);
?>