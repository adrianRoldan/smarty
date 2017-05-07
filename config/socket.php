<?php


return array(
    /*
     * $httpHost HTTP hostname clients intend to connect to.
     * MUST match JS `new WebSocket('ws://$httpHost')`.
     */

    'httpHost' => env('SOCKET_HTTP_HOST', '127.0.0.1'),

    /*
     * Port to listen on. If 80, assuming production,
     * Flash on 843 otherwise expecting Flash to be proxied through 8843
     */
    'port' => env('SOCKET_PORT', "10000"),

    /*
     * IP address to bind to. Default is localhost/proxy only.
     * `0.0.0.0` for any machine.
     */
    'address' => env('SOCKET_ADDRESS', '127.0.0.1'),
);