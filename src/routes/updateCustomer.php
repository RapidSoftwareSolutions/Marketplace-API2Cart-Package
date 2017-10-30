<?php

$app->post('/api/API2Cart/updateCustomer', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','storeKey','email']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'api_key','storeKey'=>'store_key','email'=>'email'];
    $optionalParams = ['deleteAddress'=>'delete_address_{x}','firstName'=>'first_name','lastName'=>'last_name','group'=>'group','createdTime'=>'created_time','modifiedTime'=>'modified_time','login'=>'login','lastLogin'=>'last_login','birthDay'=>'birth_day','status'=>'status','newsLetterSubscription'=>'news_letter_subscription','gender'=>'gender','website'=>'website','fax'=>'fax','company'=>'company','phone'=>'phone','addressBookType'=>'address_book_type_{x}','addressBookFirstName'=>'address_book_first_name_{x}','addressBookLastName'=>'address_book_last_name_{x}','addressBookCompany'=>'address_book_company_{x}','addressBookFax'=>'address_book_fax_{x}','addressBookPhone'=>'address_book_phone_{x}','addressBookPhone'=>'address_book_phone_{x}','addressBookWebsite'=>'address_book_website_{x}','addressBookAddress1'=>'address_book_address1_{x}','addressBookAddress2'=>'address_book_address2_{x}','addressBookCity'=>'address_book_city_{x}','addressBookCountry'=>'address_book_country_{x}','addressBookState'=>'address_book_state_{x}','addressBookPostcode'=>'address_book_postcode_{x}','addressBookGender'=>'address_book_gender_{x}','addressBookRegion'=>'address_book_region_{x}','addressBookDefault'=>'address_book_default_{x}'];
    $bodyParams = [
       'query' => ['delete_address_{x}','address_book_default_{x}','address_book_region_{x}','address_book_gender_{x}','address_book_postcode_{x}','address_book_state_{x}','address_book_country_{x}','address_book_city_{x}','address_book_address2_{x}','address_book_address1_{x}','address_book_website_{x}','address_book_phone_{x}','address_book_fax_{x}','address_book_company_{x}','address_book_last_name_{x}','address_book_first_name_{x}','address_book_type_{x}','phone','company','fax','website','gender','news_letter_subscription','status','birth_day','last_login','login','modified_time','created_time','group','last_name','first_name','email','api_key','store_key']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    

    $client = $this->httpClient;
    $query_str = "https://api.api2cart.com/v1.0/customer.update.json";

    

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