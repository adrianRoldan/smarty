<?php

/*
 *  Routes for WebSocket to cloud
 *
 * Add route (Symfony Routing Component)
 * $socket->route('/myclass', new MyClass, ['*']);
 */


use App\Http\Sockets\ServerSocket;

$socket->route('/listencloud', new ServerSocket, ['*']);
