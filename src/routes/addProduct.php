<?php

$app->post('/api/API2Cart/addProduct', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','storeKey','name','model','price','description','attributeSetName','shippingTemplateId','condition','listingDuration','paymentMethods','returnAccepted','shippingDetails','paypalEmail']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'api_key','storeKey'=>'store_key','name'=>'name','model'=>'model','price'=>'price','description'=>'description','attributeSetName'=>'attribute_name','shippingTemplateId'=>'shipping_template_id','condition'=>'condition','listingDuration'=>'listing_duration','paymentMethods'=>'payment_methods','returnAccepted'=>'return_accepted','shippingDetails'=>'shipping_details','paypalEmail'=>'paypal_email'];
    $optionalParams = ['sku'=>'sku','specialPrice'=>'special_price','spriceCreate'=>'sprice_create','spriceModified'=>'sprice_modified','spriceExpire'=>'sprice_expire','tierPrices'=>'tier_prices','groupPrices'=>'group_prices','availableForView'=>'available_for_view','availableForSale'=>'available_for_sale','weight'=>'weight','shortDescription'=>'short_description','quantity'=>'quantity','downloadable'=>'downloadable','wholesalePrice'=>'wholesale_price','createdAt'=>'created_at','manufacturer'=>'manufacturer','categoriesIds'=>'categories_ids','taxClassId'=>'tax_class_id','type'=>'type','metaTitle'=>'meta_title','metaKeywords'=>'meta_keywords','metaDescription'=>'meta_description','url'=>'url','langId'=>'lang_id','viewedCount'=>'viewed_count','orderedCount'=>'ordered_count','attributeSetName'=>'attribute_set_name'];
    $bodyParams = [
       'query' => ['paypal_email','shipping_details','return_accepted','payment_methods','listing_duration','condition','shipping_template_id','attribute_name','attribute_set_name','ordered_count','viewed_count','lang_id','url','meta_description','meta_keywords','meta_title','type','tax_class_id','categories_ids','manufacturer','created_at','wholesale_price','downloadable','quantity','short_description','weight','available_for_sale','available_for_view','group_prices','tier_prices','sprice_expire','sprice_modified','sprice_create','special_price','sku','price','description','model','name','api_key','store_key']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    
    $data['categories_ids'] = \Models\Params::toString($data['categories_ids'], ','); 

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/product.add.json";

    

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