<?php
require_once("lib/encdec_paytm.php");
    //require_once("encdec_paytm.php");
    define("merchantMid", "rxazcv89315285244163");
    // Key in your staging and production MID available in your dashboard
    define("merchantKey", "gKpu7IKaLSbkchFS");
    // Key in your staging and production merchant key available in your dashboard
    define("orderId", "order1");
    define("channelId", "WEB");
    define("custId", "cust123");
    define("mobileNo", "7777777777");
    define("email", "username@emailprovider.com");
    define("txnAmount", "100.12");
    define("website", "WEBSTAGING");
    // This is the staging value. Production value is available in your dashboard
    define("industryTypeId", "Retail");
    // This is the staging value. Production value is available in your dashboard
    define("callbackUrl", "https://<Merchant_Response_URL>");
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
    $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
	
	print_r ($paytmChecksum);
    // $transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>