<?php

$app->post('/api/API2Cart/addCartCoupon', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','storeKey','code','actionType','actionApplyTo','actionScope','actionAmount']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'api_key','storeKey'=>'store_key','code'=>'code','actionType'=>'action_type','actionApplyTo'=>'action_apply_to','actionScope'=>'action_scope','actionAmount'=>'action_amount'];
    $optionalParams = ['dateStart'=>'date_start','dateEnd'=>'date_end','usageLimit'=>'usage_limit','usageLimitPerCustomer'=>'usage_limit_per_customer','actionConditionEntity'=>'action_condition_entity','actionConditionKey'=>'action_condition_key','actionConditionOperator'=>'action_condition_operator','actionConditionValues'=>'action_condition_value'];
    $bodyParams = [
       'query' => ['action_condition_value','action_condition_operator','action_condition_key','action_condition_entity','usage_limit_per_customer','usage_limit','date_end','date_start','action_amount','action_scope','action_apply_to','action_type','code','api_key','store_key']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['action_condition_value'] = \Models\Params::toString($data['action_condition_value'], ','); 

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/cart.coupon.add.json";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = [];
     

    try {
        $resp = $client->post($query_str, $requestParams);
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