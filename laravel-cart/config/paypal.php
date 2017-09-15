<?php
return array(
    // set your paypal credential
    'client_id' => 'Aesa4SgbyWHjYOHlxUTLru22KNDKzdPFuhS9n04AMwyv08dhTUlS84Piiih-R19g6uLAiMfYPt5mP3r8',
    'secret' => 'EPfbORv6ZZx9C_M1WSUKDk0NGqcS6-S4wE3XdjYQjXHvF1MnBJMNsinKgSICgrb2oV8Yrk85-99AuzBv',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        //'http.ConnectionTimeOut' => 30,  este es el valor original q tenia antes
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);