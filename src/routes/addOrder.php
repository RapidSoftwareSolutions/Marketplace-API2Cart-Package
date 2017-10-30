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

    $requiredParams = ['apiKey'=>'api_key','storeKey'=>'store_key','orderStatus'=>'order_status','customerEmail'=>'customer_email','billFirstName'=>'bill_first_name','billLastName'=>'bill_last_name','billLastName'=>'bill_last_name','billAddress1'=>'bill_address_1','billCity'=>'bill_city','billPostcode'=>'bill_postcode','billState'=>'bill_state','billCountry'=>'bill_country','totalPrice'=>'total_price','orderItemId'=>'order_item_id_{x}','orderItemName'=>'order_item_name_{x}','orderItemModel'=>'order_item_model_{x}','orderItemPrice'=>'order_item_price_{x}','orderItemQuantity'=>'order_item_quantity_{x}'];
    $optionalParams = ['orderId'=>'order_id','storeId'=>'store_id','sendNotifications'=>'send_notifications','shippFirstName'=>'shipp_first_name','shippLastName'=>'shipp_last_name','shippAddress1'=>'shipp_address_1','shippCity'=>'shipp_city','shippPostcode'=>'shipp_postcode','shipp_state'=>'shipp_state','shippCountry'=>'shipp_country','date'=>'date','orderItemVariantId'=>'order_item_variant_id_{x}{x}','orderPaymentMethod'=>'order_payment_method','orderShippingMethod'=>'order_shipping_method','currency'=>'currency','billAddress2'=>'bill_address_2','billCompany'=>'bill_company','billPhone'=>'bill_phone','billFax'=>'bill_fax','comment'=>'comment','adminComment'=>'admin_comment','customerFirstName'=>'customer_first_name','customerLastName'=>'customer_last_name','customerBirthday'=>'customer_birthday','customerFax'=>'customer_fax','customerPhone'=>'customer_phone','shippAddress2'=>'shipp_address_2','shippCompany'=>'shipp_company','shippPhone'=>'shipp_phone','shippFax'=>'shipp_fax','dateModified'=>'date_modified','dateFinished'=>'date_finished','subtotalPrice'=>'subtotal_price','taxPrice'=>'tax_price','shippingPrice'=>'shipping_price','discount'=>'discount','couponDiscount'=>'coupon_discount','giftCertificateDiscount'=>'gift_certificate_discount','giftCertificateDiscount'=>'gift_certificate_discount','orderItemTax'=>'order_item_tax_{x}','orderItemOptionName'=>'order_item_option_name_{x}_{y}','orderItemOptionValue'=>'order_item_option_value_{x}_{y}','orderItemOptionPrice'=>'order_item_option_price_{x}_{y}','fulfillmentStatus'=>'fulfillment_status','financialStatus'=>'financial_status'];
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