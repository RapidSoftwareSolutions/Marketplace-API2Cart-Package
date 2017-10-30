<?php
$app->post('/api/API2Cart/webhookEvent', function ($request, $response, $args) {

    $post_data = $request->getParsedBody();
    $reply = [
        "http_resp" => '',
        "client_msg" => $post_data,
        "params" => $post_data['args']['params']
    ];

    $result['callback'] = 'success';
    $result['contextWrites']['to'] = $reply;
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});