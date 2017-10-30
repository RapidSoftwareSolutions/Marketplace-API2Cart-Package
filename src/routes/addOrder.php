<?php

$app->post('/api/API2Cart/addOrder', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','storeKey','orderStatus','customerEmail','billFirstName','billLastName','billLastName','billAddress1','billCity','billPostcode','billState','billCountry','totalPrice','orderItemId','orderItemName','orderItemModel','orderItemPrice','orderItemQuantity']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'apiKey','storeKey'=>'storeKey','orderStatus'=>'orderStatus','customerEmail'=>'customerEmail','billFirstName'=>'billFirstName','billLastName'=>'billLastName','billLastName'=>'billLastName','billAddress1'=>'billAddress1','billCity'=>'billCity','billPostcode'=>'billPostcode','billState'=>'billState','billCountry'=>'billCountry','totalPrice'=>'totalPrice','orderItemId'=>'orderItemId','orderItemName'=>'orderItemName','orderItemModel'=>'orderItemModel','orderItemPrice'=>'orderItemPrice','orderItemQuantity'=>'orderItemQuantity'];
    $optionalParams = ['orderId'=>'orderId','storeId'=>'storeId','sendNotifications'=>'sendNotifications','shippFirstName'=>'shippFirstName','shippLastName'=>'shippLastName','shippAddress1'=>'shippAddress1','shippCity'=>'shippCity','shippPostcode'=>'shippPostcode','shipp_state'=>'shipp_state','shippCountry'=>'shippCountry','date'=>'date','orderItemVariantId'=>'orderItemVariantId','orderPaymentMethod'=>'orderPaymentMethod','orderShippingMethod'=>'orderShippingMethod','currency'=>'currency','billAddress2'=>'billAddress2','billCompany'=>'billCompany','billPhone'=>'billPhone','billFax'=>'billFax','comment'=>'comment','adminComment'=>'adminComment','customerFirstName'=>'customerFirstName','customerLastName'=>'customerLastName','customerBirthday'=>'customerBirthday','customerFax'=>'customerFax','customerPhone'=>'customerPhone','shippAddress2'=>'shippAddress2','shippCompany'=>'shippCompany','shippPhone'=>'shippPhone','shippFax'=>'shippFax','dateModified'=>'dateModified','dateFinished'=>'dateFinished','subtotalPrice'=>'subtotalPrice','taxPrice'=>'taxPrice','shippingPrice'=>'shippingPrice','discount'=>'discount','couponDiscount'=>'couponDiscount','giftCertificateDiscount'=>'giftCertificateDiscount','giftCertificateDiscount'=>'giftCertificateDiscount','orderItemTax'=>'orderItemTax','orderItemOptionName'=>'orderItemOptionName','orderItemOptionValue'=>'orderItemOptionValue','orderItemOptionPrice'=>'orderItemOptionPrice','fulfillmentStatus'=>'fulfillmentStatus','financialStatus'=>'financialStatus'];
    $bodyParams = [
       'query' => ['financial_status','fulfillment_status','order_item_option_price_{x}_{y}','order_item_option_value_{x}_{y}','order_item_option_name_{x}_{y}','order_item_tax_{x}','gift_certificate_discount','coupon_discount','discount','shipping_price','tax_price','subtotal_price','date_finished','date_modified','shipp_fax','shipp_phone','shipp_company','shipp_address_2','customer_phone','customer_fax','customer_birthday','customer_last_name','customer_first_name','admin_comment','comment','bill_fax','bill_phone','bill_company','bill_address_2','currency','order_shipping_method','order_payment_method','order_item_variant_id_{x}','order_item_quantity_{x}','order_item_price_{x}','order_item_model_{x}','order_item_name_{x}','order_item_id_{x}','date','total_price','shipp_country','shipp_state','shipp_postcode','shipp_city','shipp_address_1','shipp_last_name','shipp_first_name','bill_country','bill_state','bill_postcode','bill_city','bill_address_1','bill_last_name','bill_first_name','customer_email','send_notifications','order_status','store_id','order_id','api_key','store_key']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/order.add.json";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = [];
     

    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
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