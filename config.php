<?php

// Config database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbwahanda');
define('DB_USER', 'root');
define('DB_PASS', '');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'dvlGroupbestgroupITinVietNam');

// eVoucher due date
define('EVOUCHER_DUE_DATE', 5);

// Max eVoucher quantity
define('MAX_QUANTITY_EVOUCHER', 9);

// Max pagination item
define('MAX_PAGINATION_ITEM', 5);

//IDLE TIME (secs)
define('IDLE_TIME', 60 * 20);

//IDLE TIME (milisecs)
define('IDLE_CHECK', 60000 * 1);

//RESULT PER SHOW MORE
define('RESULT_PER_SHOW_MORE', 5);

// Set sandbox (test mode) to true/false.
define('SAND_BOX', TRUE);

// Set PayPal API version and credentials.
define('API_VERSION', '85.0');
define('API_END_POINT', SAND_BOX ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp');
define('API_USERNAME', SAND_BOX ? 'vietnt134_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE');
define('API_PASSWORD', SAND_BOX ? 'SKXHT6CJKQTZZSB7' : 'LIVE_PASSWORD_GOES_HERE');
define('API_SIGNATURE', SAND_BOX ? 'AxYj8i8Y3XRWBeDYoQRjdYoO6OmOAE-pUEmKpvi2o7uovkdol3uNuFnx' : 'LIVE_SIGNATURE_GOES_HERE');
define('CURRENCYCODE', 'USD');
define('COUNTRYCODE', 'US');

// Admin email
define('ADMIN_MAIL', 'vietnt134@gmail.com');

// Mail server info
define('SMTP_MAIL', 'smtp.zoho.com');
define('INFO_MAIL', 'info@beleza.vn');
define('PASS_MAIL', '12345678');
// 1 USD = ? VNĐ
define('TRAN_CURRENCY', 21000);
// App secret App id FB login
define('APP_ID', '1519995188216019');
define('APP_SECRET', 'b8c037c995dcee5e43bc6d1038f68606');
