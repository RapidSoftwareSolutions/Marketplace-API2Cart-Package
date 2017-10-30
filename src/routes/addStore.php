<?php

$app->post('/api/API2Cart/addStore', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','cartId','storeUrl','eliteApiKey','adminAccount','apiPath','bigcommerceApiKey','clientId','accessToken','apiPassword','encryptedPassword','login','apiUser','apiPass','userName','accessKey','apiSecretKey','appToken','etsyKeystring','etsySharedSecret','tokenSecret','ebayClientId','ebayClientSecret','ebayRuname','ebayAccessToken','ebayRefreshToken','dwClientId','dwApiPass']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'api_key','cartId'=>'cart_id','storeUrl'=>'store_url','eliteApiKey'=>'apiKey','adminAccount'=>'AdminAccount','apiPath'=>'ApiPath','bigcommerceApiKey'=>'ApiKey','clientId'=>'client_id','accessToken'=>'accessToken','apiPassword'=>'apiPassword','encryptedPassword'=>'EncryptedPassword','login'=>'Login','apiUser'=>'apiUser','apiPass'=>'apiPass','userName'=>'userName','accessKey'=>'accessKey','apiSecretKey'=>'apiSecretKey','appToken'=>'appToken','etsyKeystring'=>'etsy_keystring','etsySharedSecret'=>'etsy_shared_secret','tokenSecret'=>'tokenSecret','ebayClientId'=>'ebay_client_id','ebayClientSecret'=>'ebay_client_secret','ebayRuname'=>'ebay_runame','ebayAccessToken'=>'ebay_access_token','ebayRefreshToken'=>'ebay_refresh_token','dwClientId'=>'dw_client_id','dwApiPass'=>'dw_api_pass'];
    $optionalParams = ['bridgeUrl'=>'bridge_url','storeRoot'=>'store_root','storeKey'=>'store_key','validateVersion'=>'validate_version','verify'=>'verify','ftpHost'=>'ftp_host','ftpUser'=>'ftp_user','ftpPassword'=>'ftp_password','ftpPort'=>'ftp_port','ftpStoreDir'=>'ftp_store_dir','privateKey'=>'privateKey','ebayEnvironment'=>'ebay_environment'];
    $bodyParams = [
       'query' => ['dw_api_pass','dw_client_id','ebay_environment','ebay_refresh_token','ebay_access_token','ebay_runame','ebay_client_secret','ebay_client_id','tokenSecret','etsy_shared_secret','etsy_keystring','appToken','privateKey','apiSecretKey','accessKey','userName','apiPass','apiUser','Login','EncryptedPassword','apiPassword','accessToken','client_id','ApiKey','ApiPath','AdminAccount','apiKey','ftp_store_dir','ftp_port','ftp_password','ftp_user','ftp_host','verify','validate_version','store_key','store_root','api_key','cart_id','store_url','bridge_url']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/cart.create.json";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = [];
     

    try {
        $resp = $client->get($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(json_decode($responseBody, true)['return_code'] == 0 && in_array($resp->getStatusCode() , ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});