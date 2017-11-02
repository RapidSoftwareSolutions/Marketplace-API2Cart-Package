[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/API2Cart/functions?utm_source=RapidAPIGitHub_API2CartFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# API2Cart Package
Connect your app with shopping carts. As many as you need. Via one integration.
* Domain: [API2Cart](http://www.api2cart.com/)
* Credentials: apiKey

## How to get credentials: 
0. Browse to [API2Cart website](https://api2cart.com)
1. Register or log in
2. Go to [Stores page](https://app.api2cart.com/stores) to get your apiKey 



## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 

## API2Cart.addStore
Add store to the account

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| Your API key
| cartId           | String     | Store’s identifier which you can get from cart_list method
| storeUrl         | String     | A web address of a store that you would like to connect to API2Cart
| bridgeUrl        | String     | This parameter allows to set up store with custom bridge url
| storeRoot        | String     | Absolute path to the store root directory 
| storeKey         | String     | Set this parameter if bridge is already uploaded to store
| validateVersion  | Select     | Specify if api2cart should validate cart version
| verify           | Select     | Enables or disables cart's verification
| ftpHost          | String     | FTP connection host
| ftpUser          | String     | FTP user
| ftpPassword      | String     | FTP password
| ftpPort          | String     | FTP port
| ftpStoreDir      | String     | FTP Store dir
| eliteApiKey      | String     | Shopping Cart Elite API Key
| adminAccount     | String     | It's a BigCommerce account for which API is enabled
| apiPath          | String     | BigCommerce API URL
| bigcommerceApiKey| String     | BigCommerce API Key
| clientId         | String     | Client ID of the requesting app.
| accessToken      | String     | Access token authorizing the app to access resources on behalf of a user
| apiPassword      | String     | Shopify API Password
| encryptedPassword| String     | Volusion API Password
| login            | String     | It's a Volusion account for which API is enabled
| apiUser          | String     | It's a AspDotNetStorefront account for which API is available
| apiPass          | String     | AspDotNetStorefront API Password
| userName         | String     | MobiCart User Name
| accessKey        | String     | Shopping Cart Elite Access Key
| apiSecretKey     | String     | Shopping Cart Elite API Secret Key
| privateKey       | String     | 3DCart Application Private Key
| appToken         | String     | 3DCart Token from Application
| etsyKeystring    | String     | Etsy keystring
| etsySharedSecret | String     | Etsy shared secret
| tokenSecret      | String     | Secret token authorizing the app to access resources on behalf of a user
| ebayClientId     | String     | Application ID (AppID)
| ebayClientSecret | String     | Shared Secret from eBay application
| ebayRuname       | String     | The RuName value that eBay assigns to your application.
| ebayAccessToken  | String     | Used to authenticate API requests.
| ebayRefreshToken | String     | Used to renew the access token.
| ebayEnvironment  | String     | Ebay environment
| dwClientId       | String     | Demandware client id
| dwApiPass        | String     | Demandware api password

## API2Cart.validateCart
Check store availability, bridge connection for the downloadable carts etc

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| storeKey       | String     | API2Cart store key
| validateVersion| Select     | Specify if api2cart should validate cart version

## API2Cart.listSupportedCarts
Get list of supported carts

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Your API key

## API2Cart.getCartBridge
Get bridge key and store key

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Your API key

## API2Cart.deleteCart
Remove store from API2Cart

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.disconnectCart
Disconnect with the store and clear store session data.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| deleteBridge| Select     | Identifies if there is a necessity to delete bridge

## API2Cart.listCartMethods
Get list of cart methods

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.listCartConfigs
Get list of cart configs

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.getCartInfo
Get info about cart

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| storeId | String     | Store Id

## API2Cart.updateCartConfig
Use this API method to update custom data in client database

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| customFields| String     | This parameter sets the list of params to the shopping cart.
| storeId     | String     | Store Id

## API2Cart.listCartPlugins
Get list of installed plugins

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| start   | Number     | This parameter sets the number from which you want to get entities
| count   | Number     | This parameter sets the entity amount that has to be retrieved
| storeId | String     | Store Id

## API2Cart.countCartCoupons
Get cart coupons count

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| dateStartFrom| DatePicker | Filter entity by date_start (greater or equal)
| dateStartTo  | DatePicker | Filter entity by date_start (less or equal)
| dateEndFrom  | DatePicker | Filter entity by date_end (greater or equal)
| dateEndTo    | DatePicker | Filter entity by date_end (less or equal)
| storeId      | String     | Store Id
| avail        | Select     | Defines category's visibility status

## API2Cart.countCartGiftcards
Get gift cards count

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| storeId | String     | Store Id

## API2Cart.listCartGiftcards
Get gift cards list

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| storeId | String     | Store Id
| start   | Number     | This parameter sets the number from which you want to get entities
| count   | Number     | This parameter sets the entity amount that has to be retrieved
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.listCartCoupons
Get cart coupons list

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| dateStartFrom| DatePicker | Filter entity by date_start (greater or equal)
| dateStartTo  | DatePicker | Filter entity by date_start (less or equal)
| dateEndFrom  | DatePicker | Filter entity by date_end (greater or equal)
| dateEndTo    | DatePicker | Filter entity by date_end (less or equal)
| storeId      | String     | Store Id
| avail        | Select     | Defines category's visibility status
| start        | Number     | This parameter sets the number from which you want to get entities
| count        | Number     | This parameter sets the entity amount that has to be retrieved
| langId       | Number     | Language id
| params       | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude      | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.addCartGiftcard
Create new gift card

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| amount    | String     | Defines the gift card amount value.
| code      | String     | Gift card code
| ownerEmail| String     | Gift card owner email

## API2Cart.addCartCoupon
Create new coupon

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Your API key
| storeKey               | String     | API2Cart store key
| code                   | String     | Coupon code
| actionType             | String     | Coupon discount type
| actionApplyTo          | String     | Defines where discount should be applied
| actionScope            | String     | Specify how discount should be applied.
| actionAmount           | String     | Defines the discount amount value.
| dateStart              | DatePicker | Defines when discount code will be available.
| dateEnd                | DatePicker | Defines when discount code will be expired.
| usageLimit             | Number     | Usage limit for coupon.
| usageLimitPerCustomer  | Number     | Usage limit per customer.
| actionConditionEntity  | String     | Defines entity for action condition.
| actionConditionKey     | String     | Defines entity attribute code for action condition.
| actionConditionOperator| String     | Defines condition operator
| actionConditionValues  | List       | Defines condition attribute value/s. Can be comma separated string.

## API2Cart.deleteCartCoupon
Delete coupon

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| couponId| String     | Id of the coupon

## API2Cart.clearCartCache
Clear cache on store

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| cacheType| String     | Defines which cache should be cleared.

## API2Cart.listProducts
Get list of products from your store. Returns 4 products by default.

| Field               | Type       | Description
|---------------------|------------|----------
| apiKey              | credentials| Your API key
| storeKey            | String     | Set this parameter if bridge is already uploaded to store
| start               | Number     | This parameter sets the number from which you want to get entities
| count               | Number     | This parameter sets the entity amount that has to be retrieved
| params              | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude             | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| categoryId          | String     | Retrieves products specified by category id
| createdFrom         | DatePicker | Retrieve entities from their creation date
| createdTo           | DatePicker | Retrieve entities to their creation date
| modifiedFrom        | DatePicker | Retrieve entities from their modification date
| modifiedTo          | DatePicker | Retrieve entities to their modification date
| availView           | Select     | Specifies the set of visible/invisible products
| availSale           | Select     | Specifies the set of available/not available products for sale
| storeId             | String     | Store Id
| langId              | Number     | Language id
| productIds          | List       | Retrieves products specified by product ids
| productVariantParams| List       | Set this parameter in product to choose which entity fields product variants you want to retrieve
| sinceId             | Number     | Retrieve products starting from the specified product id

## API2Cart.countProducts
Get count of products from your store.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | Set this parameter if bridge is already uploaded to store
| categoryId  | String     | Retrieves products specified by category id
| createdFrom | DatePicker | Retrieve entities from their creation date
| createdTo   | DatePicker | Retrieve entities to their creation date
| modifiedFrom| DatePicker | Retrieve entities from their modification date
| modifiedTo  | DatePicker | Retrieve entities to their modification date
| availView   | Select     | Specifies the set of visible/invisible products
| availSale   | Select     | Specifies the set of available/not available products for sale
| storeId     | String     | Store Id
| langId      | Number     | Language id
| productIds  | List       | Retrieves products specified by product ids

## API2Cart.getProductInfo
Get product info 

| Field               | Type       | Description
|---------------------|------------|----------
| apiKey              | credentials| Your API key
| storeKey            | String     | API2Cart store key
| params              | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude             | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| productId           | String     | Product Id
| storeId             | String     | Store Id
| langId              | Number     | Language id
| productVariantParams| List       | Set this parameter in product to choose which entity fields product variants you want to retrieve

## API2Cart.findProduct
Search product in store catalog. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| findValue  | String     | Entity search that is specified by some value
| findWhere  | List       | Entity search that is specified by list of unique fields
| find_params| List       | Entity search that is specified by list of parameters
| findWhat   | String     | Parameter's value specifies the entity that has to be found

## API2Cart.listProductFields
This method returns all available fields for product in the store.  

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.addProduct
Add product to store catalog. 

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Your API key
| storeKey          | String     | API2Cart store key
| name              | String     | Defines product's name that has to be added
| model             | String     | Defines product's model that has to be added
| price             | String     | Defines product's price that has to be added
| description       | String     | Defines product's description that has to be added
| sku               | String     | Defines product's sku  that has to be added
| specialPrice      | String     | Defines product's special price  that has to be added
| spriceCreate      | DatePicker | Defines the date of special price creation
| spriceModified    | DatePicker | Defines the date of special price modification
| spriceExpire      | DatePicker | Defines the date of special price expiration
| tierPrices        | String     | Defines product's tier prices
| groupPrices       | String     | Defines product's group prices
| availableForView  | Select     | Specifies the set of visible/invisible products for users
| availableForSale  | Select     | Specifies the set of visible/invisible products for sale
| weight            | String     | Defines product's weight
| shortDescription  | String     | Defines product's short description
| quantity          | String     | Defines product's quantity
| downloadable      | Select     | Defines whether the product is downloadable
| wholesalePrice    | String     | Defines product's wholesale price
| createdAt         | DatePicker | Defines product's creation date
| manufacturer      | String     | Defines product's manufacturer
| categoriesIds     | List       | Defines product categories id
| taxClassId        | Number     | Defines product's tax class id
| type              | String     | Defines product's type
| metaTitle         | String     | Defines product's meta title
| metaKeywords      | String     | Defines product's meta keywords
| metaDescription   | String     | Defines product's meta description
| url               | String     | Defines product's url
| langId            | Number     | Defines product's lang id
| viewedCount       | Number     | Specifies the number of product's reviews
| orderedCount      | Number     | Specifies the number of product's orders
| attributeSetName  | String     | Defines product’s attribute set name in Magento
| attributeSetName  | String     | Defines product’s attribute name in Magento
| shippingTemplateId| Number     | The numeric ID of the shipping template associated with the products in Etsy.
| condition         | String     | The human-readable label for the condition (e.g., "New").
| listingDuration   | String     | Describes the number of days the seller wants the listing to be active.
| paymentMethods    | List       | Identifies the payment method (such as PayPal) that the seller will accept when the buyer pays for the item.
| returnAccepted    | Select     | Indicates whether the seller allows the buyer to return the item.
| shippingDetails   | Number     | The numeric ID of the shipping template associated with the products in Etsy.
| paypalEmail       | String     | Valid PayPal email address for the PayPal account that the seller will use if they offer PayPal as a payment method for the listing.

## API2Cart.updateProduct
Update product in store catalog. 

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| id              | String     | ID of the product
| name            | String     | Defines product's name that has to be added
| model           | String     | Defines product's model that has to be added
| price           | String     | Defines product's price that has to be added
| description     | String     | Defines product's description that has to be added
| sku             | String     | Defines product's sku  that has to be added
| specialPrice    | String     | Defines product's special price  that has to be added
| costPrice       | String     | Defines product's cost price  that has to be added
| retailPrice     | String     | Defines product's retail price  that has to be added
| weight          | String     | Defines product's weight
| shortDescription| String     | Defines product's short description
| quantity        | String     | Defines product's quantity
| increaseQuantity| String     | Defines product's quantity
| reduceQuantity  | String     | Defines the decrement changes in product quantity
| increaseQuantity| String     | Defines the incremental changes in product quantity
| metaTitle       | String     | Defines product's meta title
| metaKeywords    | String     | Defines product's meta keywords
| metaDescription | String     | Defines product's meta description
| seoUrl          | String     | Defines product's seo url
| langId          | Number     | Defines product's lang id
| manageStock     | Select     | Defines inventory tracking for product
| inStock         | Select     | Set stock status

## API2Cart.addProductImage
Add image to product

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | ID of the product
| imageName| String     | Defines image's name
| type     | List       | Defines image's types that are specified by list
| url      | String     | Defines URL of the image that has to be added
| label    | String     | Defines alternative text that has to be attached to the picture
| mime     | String     | Mime type of the image (http://en.wikipedia.org/wiki/Internet_media_type)
| position | Number     | Defines image’s position in the list
| image    | File       | Image

## API2Cart.updateProductImage
Update image of the product

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | ID of the product
| imageId  | String     | ID of the image
| imageName| String     | Defines image's name
| type     | List       | Defines image's types that are specified by list
| label    | String     | Defines alternative text that has to be attached to the picture
| storeID  | String     | Store id
| hidden   | Select     | Define is hide image

## API2Cart.deleteProductImage
Delete image of the product

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | ID of the product
| imageId  | String     | ID of the image
| storeID  | String     | Store id
| imageName| String     | Defines image's name


## API2Cart.addProductOption
Add product option from store

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| name        | String     | Defines option's name
| type        | String     | Defines option's type that has to be added
| productId   | String     | ID of the product
| optionValues| String     | Defines option values that has to be added in Magento
| description | String     | Defines option's description
| avail       | Select     | Defines option's visibility status
| sortOrder   | Number     | Sort number in the list
| required    | Select     | Defines if the option is required

## API2Cart.assignProductOption
Assign option from produc

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | ID of the product
| optionId | String     | ID of the option

## API2Cart.addProductOptionValue
Add product option item from option.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| optionValue| String     | Value of the option
| optionId   | String     | ID of the option
| sortOrder  | Number     | Sort number in the list

## API2Cart.assignProductOptionValue
Assign product option item from option.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| storeKey       | String     | API2Cart store key
| productOptionId| String     | Defines product's option id where the value has to be assigned
| optionValueId  | Number     | Defines value id that has to be assigned

## API2Cart.addProductVariant
Add variant to product

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| productId       | String     | Id of the product
| name            | String     | Defines variant's's name that has to be added
| model           | String     | Defines variant's's model that has to be added
| price           | String     | Defines variant's's price that has to be added
| attributes      | String     | Defines variant's's attributes that has to be added
| description     | String     | Defines variant's's description that has to be added
| specialPrice    | String     | Defines variant's 's special price  that has to be added
| spriceCreate    | DatePicker | Defines the date of special price creation
| spriceModified  | DatePicker | Defines the date of special price modification
| spriceExpire    | DatePicker | Defines the date of special price expiration
| availableForView| Select     | Specifies the set of visible/invisible variants for users
| availableForSale| Select     | Specifies the set of visible/invisible variants for sale
| weight          | String     | Defines variants's weight
| shortDescription| String     | Defines variants's short description
| quantity        | String     | Defines variants's quantity
| createdAt       | DatePicker | Defines variants's creation date
| manufacturer    | String     | Defines variants's manufacturer
| taxClassId      | String     | Defines variants's tax class id
| metaTitle       | String     | Defines variants's meta title
| metaKeywords    | String     | Defines variants's meta keywords
| metaDescription | String     | Defines variants's meta description
| url             | String     | Defines product's url

## API2Cart.listProductVariants
Get list of product cariants from your store

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | Set this parameter if bridge is already uploaded to store
| start       | Number     | This parameter sets the number from which you want to get entities
| count       | Number     | This parameter sets the entity amount that has to be retrieved
| params      | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude     | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| categoryId  | String     | Retrieves products specified by category id
| createdFrom | DatePicker | Retrieve entities from their creation date
| createdTo   | DatePicker | Retrieve entities to their creation date
| modifiedFrom| DatePicker | Retrieve entities from their modification date
| modifiedTo  | DatePicker | Retrieve entities to their modification date
| storeId     | String     | Store Id
| productId   | String     | Retrieves products' variants specified by product id

## API2Cart.countProductVariants
Get count of product variants from your store

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | Set this parameter if bridge is already uploaded to store
| categoryId  | String     | Retrieves products specified by category id
| createdFrom | DatePicker | Retrieve entities from their creation date
| createdTo   | DatePicker | Retrieve entities to their creation date
| modifiedFrom| DatePicker | Retrieve entities from their modification date
| modifiedTo  | DatePicker | Retrieve entities to their modification date
| storeId     | String     | Store Id
| productId   | String     | Retrieves products' variants specified by product id

## API2Cart.updateProductVariant
Update variant to product

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| id              | String     | Id of the variant
| price           | String     | Defines variant's's price that has to be added
| description     | String     | Defines variant's's description that has to be added
| specialPrice    | String     | Defines variant's 's special price  that has to be added
| shortDescription| String     | Defines variants's short description
| quantity        | String     | Defines variants's quantity
| metaTitle       | String     | Defines variants's meta title
| metaKeywords    | String     | Defines variants's meta keywords
| metaDescription | String     | Defines variants's meta description
| sku             | String     | Defines variants's sku
| visible         | String     | Set visibility status
| status          | String     | Defines product variant's status

## API2Cart.deleteProductVariant
Delete variant to product

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| id      | String     | Id of the variant


## API2Cart.addProductManufacturer
Add manufacturer to store and assign to product

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| productId   | String     | Id of the product
| manufacturer| String     | Defines product’s manufacturer's name

## API2Cart.addCurrency
Add currency and/or set default in store

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| iso3       | String     | Specifies standardized currency code
| rate       | String     | Defines the numerical identifier against to the major currency
| name       | String     | Defines currency's name
| avail      | Select     | Specifies whether the currency is available
| symbolLeft | String     | Defines the symbol that is located before the currency
| symbolRight| String     | Defines the symbol that is located after the currency
| default    | Select     | Specifies currency's default meaning

## API2Cart.updateOptionValue
Update product option item from option

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| optionValueId| Number     | Defines value id that has to be assigned
| price        | String     | Defines new product option price
| quantity     | String     | Defines new products' options quantity



## API2Cart.getProductVariantInfo
Get variant info

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| id      | String     | Id of the variant
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| storeId | String     | Store Id

## API2Cart.listProductOptions
Get list of options

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | Id of the product
| params   | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude  | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| start    | Number     | This parameter sets the number from which you want to get entities
| count    | Number     | This parameter sets the entity amount that has to be retrieved

## API2Cart.listCurrency
Get list of currencies

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| start   | Number     | This parameter sets the number from which you want to get entities
| count   | Number     | This parameter sets the entity amount that has to be retrieved
| default | Select     | Specifies currency's default meaning
| avail   | Select     | Defines category's visibility status

## API2Cart.listProductAttributes
Get list of attributes

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| productId       | String     | Id of the product
| params          | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude         | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| start           | Number     | This parameter sets the number from which you want to get entities
| count           | Number     | This parameter sets the entity amount that has to be retrieved
| sortBy          | String     | Set field to sort by
| sortDirection   | String     | Set sorting direction
| langId          | Number     | Language id
| storeId         | String     | Store Id
| attributeId     | String     | Retrieves info for specified attributeId
| attributeGroupId| String     | Filter by attributeGroupId
| setName         | String     | Retrieves attributes specified by set_name in Magento

## API2Cart.addProductPrice
Add some prices to the produc

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| productId  | String     | Id of the product
| groupPrices| String     | Defines product's group prices

## API2Cart.updateProductPrice
Update product price

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| productId  | String     | Id of the product
| groupPrices| String     | Defines product's group prices

## API2Cart.deleteProductPrice
Delete product price

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| productId  | String     | Id of the product
| groupPrices| String     | Defines product's group prices

## API2Cart.addProductVariantPrice
Add some prices to the product variant

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| variantId  | String     | Id of the variant
| groupPrices| String     | Defines product's group prices

## API2Cart.updateProductVariantPrice
Update some prices of the product variant

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| variantId  | String     | Id of the variant
| groupPrices| String     | Defines product's group prices

## API2Cart.deleteProductVariantPrice
Delete some prices of the product variant

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| variantId  | String     | Id of the variant
| groupPrices| String     | Defines product's group prices

## API2Cart.setProductAttributeValue
Set attribute value to product.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| productId       | String     | Id of the product
| attributeId     | String     | Filter by attributeId
| attributeGroupId| String     | Filter by attributeGroupId
| attributeName   | String     | Define attribute name
| value           | String     | Define attribute value
| valueId         | Number     | Define attribute value id
| langId          | Number     | Language id
| storeId         | String     | Store Id

## API2Cart.listProductChildItems
Get child items list of specific product

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | Id of the product
| langId   | Number     | Language id
| storeId  | String     | Store Id
| start    | Number     | This parameter sets the number from which you want to get entities
| count    | Number     | This parameter sets the entity amount that has to be retrieved
| params   | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude  | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.listCategories
Get list of categories from store. Returns 4 categories by default.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| parentId| String     | Retrieves categories specified by parent id
| langId  | Number     | Language id
| storeId | String     | Store Id
| start   | Number     | This parameter sets the number from which you want to get entities
| count   | Number     | This parameter sets the entity amount that has to be retrieved
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.countCategories
Count categories in store

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| productId| String     | Retrieves categories specified by parent id
| langId   | Number     | Language id
| storeId  | String     | Store Id

## API2Cart.getSingleCategory
Get category info about category ID

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| categoryId| String     | Id of the category
| langId    | Number     | Language id
| storeId   | String     | Store Id
| params    | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude   | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.findCategory
Search category in store. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| findValue  | String     | Entity search that is specified by some value
| findWhere  | List       | Entity search that is specified by list of unique fields
| find_params| List       | Entity search that is specified by list of parameters

## API2Cart.addCategory
Add new category in store

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| storeKey       | String     | API2Cart store key
| name           | String     | Name of the category
| parentId       | String     | Retrieves categories specified by parent id
| storesIds      | List       | Create category in the stores that is specified by list of store ids
| storeId        | String     | Store Id
| avail          | Select     | Defines category's visibility status
| sortOrder      | Number     | Sort number in the list
| createdTime    | DatePicker | Entity's date creation
| modifiedTime   | DatePicker | Entity's date modofication
| description    | String     | Defines category's description that has to be added
| metaTitle      | String     | Defines category's meta title
| metaKeywords   | String     | Defines category's meta keywords
| metaDescription| String     | Defines category's meta description
| seoUrl         | String     | Defines category's seo url

## API2Cart.updateCategory
Update existing category in store

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| storeKey       | String     | API2Cart store key
| name           | String     | Name of the category
| categoryId     | String     | ID of the category
| storesIds      | List       | Create category in the stores that is specified by list of store ids
| parentId       | String     | Retrieves categories specified by parent id
| avail          | Select     | Defines category's visibility status
| sortOrder      | Number     | Sort number in the list
| createdTime    | DatePicker | Entity's date creation
| modifiedTime   | DatePicker | Entity's date modofication
| description    | String     | Defines category's description that has to be added
| metaTitle      | String     | Defines category's meta title
| metaKeywords   | String     | Defines category's meta keywords
| metaDescription| String     | Defines category's meta description
| seoUrl         | String     | Defines category's seo url

## API2Cart.deleteCategory
Delete existing category in store


| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| categoryId| String     | ID of the category

## API2Cart.assignCategory
Assign category to product

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| productId| String     | ID of the product
| categoryId| String     | Id of the category

## API2Cart.unassignCategory
Unassign category to product

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| productId| String     | ID of the product
| categoryId| String     | Id of the category

## API2Cart.addImageToCategory
Add image to category

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| categoryId| String     | ID of the category
| imageName | String     | Defines image's name
| url       | String     | Defines URL of the image that has to be added
| label     | String     | Defines alternative text that has to be attached to the picture
| mime      | String     | Mime type of image (http://en.wikipedia.org/wiki/Internet_media_type)
| type      | List       | Defines image's types that are specified by list
| position  | Number     | Defines image’s position in the list
| storeId   | String     | Store Id

## API2Cart.updateImageForCategory
Update image for category

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| categoryId| String     | ID of the category
| imageName | String     | Defines image's name
| label     | String     | Defines alternative text that has to be attached to the picture
| type      | List       | Defines image's types that are specified by list
| position  | Number     | Defines image’s position in the list
| storeId   | String     | Store Id

## API2Cart.deleteImageForCategory
Delete image for category

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| categoryId| String     | ID of the category
| image_id  | String     | Id of the image
| storeId   | String     | Store Id

## API2Cart.countOrders
Count orders in store

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| customerId   | String     | Counts orders quantity specified by customer id
| customerEmail| String     | Counts orders quantity specified by customer email
| orderStatus  | String     | Counts orders quantity specified by order status
| createdTo    | String     | Retrieve entities to their creation date
| createdFrom  | String     | Retrieve entities from their creation date
| modifiedTo   | String     | Retrieve entities to their modification date
| modifiedFrom | String     | Retrieve entities from their modification date
| storeId      | String     | Store Id
| orderIds     | List       | Counts orders specified by order ids

## API2Cart.listOrders
Get list of orders from store. Returns 4 orders by default

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| customerId   | String     | Counts orders quantity specified by customer id
| customerEmail| String     | Counts orders quantity specified by customer email
| orderStatus  | String     | Counts orders quantity specified by order status
| createdTo    | String     | Retrieve entities to their creation date
| createdFrom  | String     | Retrieve entities from their creation date
| modifiedTo   | String     | Retrieve entities to their modification date
| modifiedFrom | String     | Retrieve entities from their modification date
| storeId      | String     | Store Id
| orderIds     | List       | Counts orders specified by order ids
| start        | Number     | This parameter sets the number from which you want to get entities
| count        | Number     | This parameter sets the entity amount that has to be retrieved
| params       | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude      | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.getSingleOrder
Get order info about order ID

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| orderId | String     | Id of the order
| storeId | String     | Store Id
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.findOrders
Find orders

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| customerId   | String     | Counts orders quantity specified by customer id
| customerEmail| String     | Counts orders quantity specified by customer email
| orderStatus  | String     | Counts orders quantity specified by order status
| createdTo    | String     | Retrieve entities to their creation date
| createdFrom  | String     | Retrieve entities from their creation date
| modifiedTo   | String     | Retrieve entities to their modification date
| modifiedFrom | String     | Retrieve entities from their modification date
| start        | Number     | This parameter sets the number from which you want to get entities
| count        | Number     | This parameter sets the entity amount that has to be retrieved
| params       | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude      | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.addOrder
Add a new order to the cart

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Your API key
| storeKey               | String     | API2Cart store key
| orderId                | String     | Defines the order id if it is supported by the cart
| storeId                | String     | Defines store id where the order should be assigned
| orderStatus            | String     | Defines order status.
| sendNotifications      | Select     | Send notifications to customer after order was created
| customerEmail          | String     | Defines the customer specified by email for whom order has to be created
| billFirstName          | String     | Specifies billing first name
| billLastName           | String     | Specifies billing last name
| billLastName           | String     | Specifies billing last name
| billAddress1           | String     | Specifies first billing address
| billCity               | String     | Specifies billing city
| billPostcode           | String     | Specifies billing postcode
| billState              | String     | Specifies billing state
| billCountry            | String     | Specifies billing country
| shippFirstName         | String     | Specifies shipping first name
| shippLastName          | String     | Specifies shipping last name
| shippAddress1          | String     | Specifies first shipping address
| shippCity              | String     | Specifies shipping city
| shippPostcode          | String     | Specifies shipping postcode
| shipp_state            | String     | Specifies shipping state
| shippCountry           | String     | Specifies shipping country
| totalPrice             | String     | Defines order's total price
| date                   | DatePicker | Specifies an order creation date in format Y-m-d H:i:s
| orderItemId            | String     | Defines orders specified by order item id
| orderItemName          | String     | Defines orders specified by order item name
| orderItemModel         | String     | Defines orders specified by order item model
| orderItemPrice         | String     | Defines orders specified by order item price
| orderItemQuantity      | Number     | Defines orders specified by order item quantity
| orderItemVariantId     | String     | Ordered product variant.
| orderPaymentMethod     | String     | Defines order payment method
| orderShippingMethod    | String     | Defines order shipping method
| currency               | String     | Currency code of order
| billAddress2           | String     | Specifies second billing address
| billCompany            | String     | Specifies billing company
| billPhone              | String     | Specifies billing phone
| billFax                | String     | Specifies billing fax
| comment                | String     | Specifies order comment
| adminComment           | String     | Specifies admin's order comment
| customerFirstName      | String     | Specifies customer's first name
| customerLastName       | String     | Specifies customer's last name
| customerBirthday       | String     | Specifies customer's birthday
| customerFax            | String     | Specifies customer's fax
| customerPhone          | String     | Specifies customer's phone
| shippAddress2          | String     | Specifies second shipping address
| shippCompany           | String     | Specifies shipping company
| shippPhone             | String     | Specifies shipping phone
| shippFax               | String     | Specifies shipping fax
| dateModified           | DatePicker | Specifies order's modification date
| dateFinished           | DatePicker | Specifies order's finished date
| subtotalPrice          | String     | Total price of all ordered products multiplied by their number, excluding tax, shipping price and discounts
| taxPrice               | String     | The value of tax cost for order
| shippingPrice          | String     | Specifies order's shipping price
| discount               | String     | Specifies order's discount
| couponDiscount         | String     | Specifies order's coupon discount
| giftCertificateDiscount| String     | Specifies order's gift certificate discount
| giftCertificateDiscount| String     | Specifies order's gift certificate discount
| orderItemTax           | String     | Percentage of tax for product order
| orderItemOptionName    | String     | Ordered Product Option Name.
| orderItemOptionValue   | String     | Ordered Product Option value.
| orderItemOptionPrice   | String     | Ordered Product Option price.
| fulfillmentStatus      | String     | Create order with fulfillment status
| financialStatus        | String     | Create order with financial status

## API2Cart.updateOrder
Update existing order.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| storeKey       | String     | API2Cart store key
| orderId        | String     | Id of the order
| storeId        | String     | Store Id
| orderStatus    | String     | Defines new order's status
| comment        | String     | Specifies order comment
| dateModified   | DatePicker | Specifies order's modification date
| dateFinished   | DatePicker | Specifies order's finished date
| financialStatus| String     | Create order with financial status

## API2Cart.listOrderStatuses
Retrieve list of statuses

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.listAbandonedOrders
Get list of orders that were left by customers before completing the order.

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Your API key
| storeKey     | String     | API2Cart store key
| customerId   | String     | Retrieves orders specified by customer id
| customerEmail| String     | Retrieves orders specified by customer email
| start        | Number     | This parameter sets the number from which you want to get entities
| count        | Number     | This parameter sets the entity amount that has to be retrieved
| params       | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude      | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| createdFrom  | DatePicker | Retrieve entities from their creation date
| createdTo    | DatePicker | Retrieve entities to their creation date
| modifiedFrom | DatePicker | Retrieve entities from their modification date
| modifiedTo   | DatePicker | Retrieve entities to their modification date

## API2Cart.listOrdersShipments
Get list of shipments by orders

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| start      | Number     | This parameter sets the number from which you want to get entities
| count      | Number     | This parameter sets the entity amount that has to be retrieved
| params     | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude    | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| createdFrom| DatePicker | Retrieve entities from their creation date
| createdTo  | DatePicker | Retrieve entities to their creation date

## API2Cart.addOrderShipment
Add a shipment to the order.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| orderId         | String     | Id of the order
| shipmentProvider| String     | Defines company name that provide tracking of shipment
| items           | List       | Defines items in the order that will be shipped
| exclude         | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.updateOrderShipment
Update a shipment to the order.

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Your API key
| storeKey        | String     | API2Cart store key
| orderId         | String     | Id of the order
| shipmentId      | String     | Id of the shipment
| shipmentProvider| String     | Defines company name that provide tracking of shipment
| trackingNumbers | List       | Defines shipment's tracking numbers that have to be added

## API2Cart.listFinancialStatuses
Retrieve list of financial statuses

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.listCustomers
Get list of customers from store

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| createdTo     | String     | Retrieve entities to their creation date
| createdFrom   | String     | Retrieve entities from their creation date
| modifiedTo    | String     | Retrieve entities to their modification date
| modifiedFrom  | String     | Retrieve entities from their modification date
| storeId       | String     | Store Id
| groupId       | String     | Customer group Id
| customerListId| String     | The numeric ID of the customer list in Demandware.
| start         | Number     | This parameter sets the number from which you want to get entities
| count         | Number     | This parameter sets the entity amount that has to be retrieved
| params        | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude       | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.countCustomers
Get number of customers from store

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| createdTo     | String     | Retrieve entities to their creation date
| createdFrom   | String     | Retrieve entities from their creation date
| modifiedTo    | String     | Retrieve entities to their modification date
| modifiedFrom  | String     | Retrieve entities from their modification date
| storeId       | String     | Store Id
| groupId       | String     | Customer group Id
| customerListId| String     | The numeric ID of the customer list in Demandware.

## API2Cart.getSingleCustomer
Get customers' details from store

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| storeId   | String     | Store Id
| customerID| String     | Customer Id
| params    | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude   | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.findCustomer
Search customer in store. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| findValue  | String     | Entity search that is specified by some value
| findWhere  | List       | Entity search that is specified by list of unique fields
| find_params| List       | Entity search that is specified by list of parameters

## API2Cart.addCustomer
Add customer into store.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Your API key
| storeKey              | String     | API2Cart store key
| email                 | String     | Defines customer's email
| firstName             | String     | Defines customer's first name
| lastName              | String     | Defines customer's last name
| password              | String     | Defines customer's password
| group                 | String     | Defines customer's group
| createdTime           | DatePicker | Entity's date creation
| modifiedTime          | DatePicker | Entity's date modification
| login                 | String     | Specifies customer's login name
| lastLogin             | DatePicker | Defines customer's last login time
| birthDay              | DatePicker | Defines customer's birthday
| status                | String     | Defines customer's status
| newsLetterSubscription| Select     | Defines whether the newsletter subscription is available for the user
| gender                | String     | Defines customer's gender
| website               | String     | Defines customer's website
| fax                   | String     | Defines customer's fax
| company               | String     | Defines customer's company
| phone                 | String     | Defines customer's phone
| addressBookType       | String     | Specifies customer's address type
| addressBookFirstName  | String     | Specifies customer's address book first name
| addressBookLastName   | String     | Specifies customer's address book last name
| addressBookCompany    | String     | Specifies customer's address book company
| addressBookFax        | String     | Specifies customer's address book fax
| addressBookPhone      | String     | Specifies customer's address book phone
| addressBookPhone      | String     | Specifies customer's address book phone
| addressBookWebsite    | String     | Specifies customer's address website
| addressBookAddress1   | String     | Specifies customer's first address in the address book
| addressBookAddress2   | String     | Specifies customer's second address in the address book
| addressBookCity       | String     | Specifies customer's city in the address book
| addressBookCountry    | String     | ISO code or name of country
| addressBookState      | String     | ISO code or name of state
| addressBookPostcode   | String     | Specifies customer's postcode
| addressBookGender     | String     | Specifies customer's gender
| addressBookRegion     | String     | Specifies customer's region
| addressBookDefault    | Select     | Defines whether the address is used by default

## API2Cart.updateCustomer
Update existing customer in store.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Your API key
| storeKey              | String     | API2Cart store key
| email                 | String     | Defines customer's email
| deleteAddress         | Select     | Delete customer’s address item from address book by ID.
| firstName             | String     | Defines customer's first name
| lastName              | String     | Defines customer's last name
| group                 | String     | Defines customer's group
| createdTime           | DatePicker | Entity's date creation
| modifiedTime          | DatePicker | Entity's date modification
| login                 | String     | Specifies customer's login name
| lastLogin             | DatePicker | Defines customer's last login time
| birthDay              | DatePicker | Defines customer's birthday
| status                | String     | Defines customer's status
| newsLetterSubscription| Select     | Defines whether the newsletter subscription is available for the user
| gender                | String     | Defines customer's gender
| website               | String     | Defines customer's website
| fax                   | String     | Defines customer's fax
| company               | String     | Defines customer's company
| phone                 | String     | Defines customer's phone
| addressBookType       | String     | Specifies customer's address type
| addressBookFirstName  | String     | Specifies customer's address book first name
| addressBookLastName   | String     | Specifies customer's address book last name
| addressBookCompany    | String     | Specifies customer's address book company
| addressBookFax        | String     | Specifies customer's address book fax
| addressBookPhone      | String     | Specifies customer's address book phone
| addressBookWebsite    | String     | Specifies customer's address website
| addressBookAddress1   | String     | Specifies customer's first address in the address book
| addressBookAddress2   | String     | Specifies customer's second address in the address book
| addressBookCity       | String     | Specifies customer's city in the address book
| addressBookCountry    | String     | ISO code or name of country
| addressBookState      | String     | ISO code or name of state
| addressBookPostcode   | String     | Specifies customer's postcode
| addressBookGender     | String     | Specifies customer's gender
| addressBookRegion     | String     | Specifies customer's region
| addressBookDefault    | Select     | Defines whether the address is used by default

## API2Cart.deleteCustomer
Delete existing customer in store.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| customerId| String     | Customer Id

## API2Cart.getTaxClassInfo
Get info about tax

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| taxClassId| String     | Retrieves taxes specified by class id
| params    | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude   | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.listCarts
Get list of carts

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Your API key
| params         | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude        | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| requestFromDate| DatePicker | Retrieve entities from their creation date
| requestToDate  | DatePicker | Retrieve entities to their creation date

## API2Cart.updateConfig
Update configs in the API2Cart database

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| clientId | String     | Client ID of the requesting app.
| bridgeUrl| String     | This parameter allows to set up store with custom bridge url
| storeRoot| String     | Absolute path to the store root directory 

## API2Cart.listFailedWebhooks
List webhooks that was not delivered to the callback

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| start     | Number     | This parameter sets the number from which you want to get entities
| count     | Number     | This parameter sets the entity amount that has to be retrieved
| webhookIds| List       | List of webhook ids

## API2Cart.listAttributes
Get attributes list

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| start       | Number     | This parameter sets the number from which you want to get entities
| count       | Number     | This parameter sets the entity amount that has to be retrieved
| type        | Number     | Defines attribute's type
| attributeIds| List       | List of attribute ids
| storeId     | String     | Store Id
| langId      | Number     | Language id
| params      | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude     | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| visible     | Select     | Filter items by visibility status
| required    | Select     | Defines if the option is required
| system      | Select     | True if attribute is system

## API2Cart.getSingleAttribute
Get attribute info

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| attributeId| String     | Id of the attribute
| langId     | Number     | Language id
| storeId    | String     | Store Id
| params     | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude    | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.countAttributes
Get attributes count

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Your API key
| storeKey    | String     | API2Cart store key
| type        | Number     | Defines attribute's type
| attributeIds| List       | List of attribute ids
| storeId     | String     | Store Id
| langId      | Number     | Language id
| visible     | Select     | Filter items by visibility status
| required    | Select     | Defines if the option is required

## API2Cart.listSupportedAttributes
Get supported attributes list

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.deleteAttribute
Delete attribute

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| storeId    | String     | Store Id
| attributeId| String     | Attribute Id

## API2Cart.addAttribute
Add new attribute

| Field                    | Type       | Description
|--------------------------|------------|----------
| apiKey                   | credentials| Your API key
| storeKey                 | String     | API2Cart store key
| storeId                  | String     | Store Id
| type                     | String     | Attribute type
| name                     | String     | Attribute name
| langId                   | Number     | Language id
| visible                  | Select     | Filter items by visibility status
| required                 | Select     | Defines if the option is required
| position                 | Number     | Defines attribute position in the list
| isGlobal                 | Select     | Attribute saving scope
| isSearchable             | Select     | Use attribute in Quick Search
| isFilterable             | Select     | Use In Layered Navigation
| isComparable             | Select     | Comparable on Front-end
| isHtmlAllowedOnFront     | Select     | Allow HTML Tags on Frontend
| isFilterableInSearch     | Select     | Use In Search Results Layered Navigation
| isConfigurable           | Select     | Use To Create Configurable Product
| isVisibleInAdvancedSearch| Select     | Use in Advanced Search
| isUsedForPromoRules      | Select     | Use for Promo Rule Conditions
| usedInProductListing     | Select     | Used in Product Listing
| usedForSortBy            | Select     | Used for Sorting in Product Listing
| applyTo                  | String     | Types of products which can have this attribute

## API2Cart.assignAttributeToGroup
Assign attribute to the group

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| attributeId   | String     | ID of the attribute
| groupId       | Number     | ID of the group
| attributeSetId| String     | Attribute set id

## API2Cart.assignAttributeToSet
Assign attribute to the set

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| attributeId   | String     | ID of the attribute
| groupId       | Number     | ID of the group
| attributeSetId| String     | Attribute set id

## API2Cart.unassignAttributeFromGroup
Unassign attribute from the group

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Your API key
| storeKey   | String     | API2Cart store key
| attributeId| String     | ID of the attribute
| groupId    | Number     | ID of the group

## API2Cart.unassignAttributeFromSet
Unassign attribute from the set

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| attributeId   | String     | ID of the attribute
| attributeSetId| String     | Attribute set id

## API2Cart.listAttributeGroups
Get attribute group list

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Your API key
| storeKey      | String     | API2Cart store key
| start         | Number     | This parameter sets the number from which you want to get entities
| count         | Number     | This parameter sets the entity amount that has to be retrieved
| params        | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude       | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all
| attributeSetId| String     | Attribute set id

## API2Cart.listAttributeSets
Get attribute_set list

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| start   | Number     | This parameter sets the number from which you want to get entities
| count   | Number     | This parameter sets the entity amount that has to be retrieved
| params  | String     | Set this parameter in order to choose which entity fields you want to retrieve
| exclude | String     | Set this parameter in order to choose which entity fields you want to ignore. Works only if parameter `params` equal force_all

## API2Cart.listWebhooksEvents
List all Webhooks that are available on this store.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key

## API2Cart.countWebhooks
Count registered webhooks on the store

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| entity  | String     | The entity you want to filter webhooks by (e.g. order or product)
| action  | String     | The action you want to filter webhooks by (e.g. order or product)
| active  | Select     | The webhook status you want to filter webhooks by

## API2Cart.addWebhook
Create webhook on the store and subscribe to it

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| Your API key
| storeKey| String     | API2Cart store key
| entity  | String     | Specify the entity that you want to enable webhooks for (e.g product, order, customer, category)
| action  | String     | Specify what action (event) will trigger the webhook (e.g add, delete, or update)
| callback| String     | Callback where the webhook should send the POST request when the event occurs
| label   | String     | The name you give to the webhook
| fields  | List       | Fields the webhook should send
| active  | Select     | The webhook status you want to filter webhooks by
| storeId | String     | Store Id

## API2Cart.listWebhooks
List registered webhooks on the store

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Your API key
| storeKey  | String     | API2Cart store key
| entity    | String     | The entity you want to filter webhooks by (e.g. order or product)
| action    | String     | The action you want to filter webhooks by (e.g. order or product)
| active    | Select     | The webhook status you want to filter webhooks by
| start     | Number     | This parameter sets the number from which you want to get entities
| count     | Number     | This parameter sets the entity amount that has to be retrieved
| params    | String     | Set this parameter in order to choose which entity fields you want to retrieve
| webhookIds| List       | List of webhook ids

## API2Cart.updateWebhook
Update webhook on the store 

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| webhookId| String     | Id of the webhook
| callback | String     | Callback where the webhook should send the POST request when the event occurs
| label    | String     | The name you give to the webhook
| fields   | List       | Fields the webhook should send
| active   | Select     | The webhook status you want to filter webhooks by

## API2Cart.deleteWebhook
Delete webhook on the store 

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Your API key
| storeKey | String     | API2Cart store key
| webhookId| String     | Id of the webhook

