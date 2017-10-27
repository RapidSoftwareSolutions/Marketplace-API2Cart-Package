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

    $requiredParams = ['apiKey'=>'apiKey','storeKey'=>'storeKey','name'=>'name','model'=>'model','price'=>'price','description'=>'description','attributeSetName'=>'attributeSetName','shippingTemplateId'=>'shippingTemplateId','condition'=>'condition','listingDuration'=>'listingDuration','paymentMethods'=>'paymentMethods','returnAccepted'=>'returnAccepted','shippingDetails'=>'shippingDetails','paypalEmail'=>'paypalEmail'];
    $optionalParams = ['sku'=>'sku','specialPrice'=>'specialPrice','spriceCreate'=>'spriceCreate','spriceModified'=>'spriceModified','spriceExpire'=>'spriceExpire','tierPrices'=>'tierPrices','groupPrices'=>'groupPrices','availableForView'=>'availableForView','availableForSale'=>'availableForSale','weight'=>'weight','shortDescription'=>'shortDescription','quantity'=>'quantity','downloadable'=>'downloadable','wholesalePrice'=>'wholesalePrice','createdAt'=>'createdAt','manufacturer'=>'manufacturer','categoriesIds'=>'categoriesIds','taxClassId'=>'taxClassId','type'=>'type','metaTitle'=>'metaTitle','metaKeywords'=>'metaKeywords','metaDescription'=>'metaDescription','url'=>'url','langId'=>'langId','viewedCount'=>'viewedCount','orderedCount'=>'orderedCount','attributeSetName'=>'attributeSetName'];
    $bodyParams = [
       'query' => ['paypal_email','shipping_details','return_accepted','payment_methods','listing_duration','condition','shipping_template_id','attribute_name','attribute_set_name','ordered_count','viewed_count','lang_id','url','meta_description','meta_keywords','meta_title','type','tax_class_id','categories_ids','manufacturer','created_at','wholesale_price','downloadable','quantity','short_description','weight','available_for_sale','available_for_view','group_prices','tier_prices','sprice_expire','sprice_modified','sprice_create','special_price','sku','price','description','model','name','api_key','store_key']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/product.add.json";

    

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