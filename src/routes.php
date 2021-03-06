<?php
$routes = [
'webhookEvent',
    'metadata',
    'addStore',
    'validateCart',
    'listSupportedCarts',
    'getCartBridge',
    'deleteCart',
    'disconnectCart',
    'listCartMethods',
    'downloadBridge',
    'listCartConfigs',
    'getCartInfo',
    'updateCartConfig',
    'listCartPlugins',
    'countCartCoupons',
    'countCartGiftcards',
    'listCartGiftcards',
    'listCartCoupons',
    'addCartGiftcard',
    'addCartCoupon',
    'deleteCartCoupon',
    'clearCartCache',
    'listProducts',
    'countProducts',
    'getProductInfo',
    'findProduct',
    'listProductFields',
    'addProduct',
    'updateProduct',
    'addProductImage',
    'updateProductImage',
    'deleteProductImage',
    'addProductOption',
    'assignProductOption',
    'addProductOptionValue',
    'assignProductOptionValue',
    'addProductVariant',
    'listProductVariants',
    'countProductVariants',
    'updateProductVariant',
    'deleteProductVariant',
    'addProductTax',
    'addProductManufacturer',
    'addCurrency',
    'updateOptionValue',
    'deleteProduct',
    'getProductVariantInfo',
    'listProductOptions',
    'listCurrency',
    'listProductAttributes',
    'addProductPrice',
    'updateProductPrice',
    'deleteProductPrice',
    'addProductVariantPrice',
    'updateProductVariantPrice',
    'deleteProductVariantPrice',
    'setProductAttributeValue',
    'listProductChildItems',
    'listCategories',
    'countCategories',
    'getSingleCategory',
    'findCategory',
    'addCategory',
    'updateCategory',
    'deleteCategory',
    'assignCategory',
    'unassignCategory',
    'addImageToCategory',
    'updateImageForCategory',
    'deleteImageForCategory',
    'countOrders',
    'listOrders',
    'getSingleOrder',
    'findOrders',
    'addOrder',
    'updateOrder',
    'listOrderStatuses',
    'listAbandonedOrders',
    'listOrdersShipments',
    'addOrderShipment',
    'updateOrderShipment',
    'listFinancialStatuses',
    'listCustomers',
    'countCustomers',
    'getSingleCustomer',
    'findCustomer',
    'addCustomer',
    'updateCustomer',
    'deleteCustomer',
    'getTaxClassInfo',
    'listCarts',
    'updateConfig',
    'listFailedWebhooks',
    'listAttributes',
    'getSingleAttribute',
    'countAttributes',
    'listSupportedAttributes',
    'deleteAttribute',
    'addAttribute',
    'assignAttributeToGroup',
    'assignAttributeToSet',
    'unassignAttributeFromGroup',
    'unassignAttributeFromSet',
    'listAttributeGroups',
    'listAttributeSets',
    'listWebhooksEvents',
    'countWebhooks',
    'addWebhook',
    'listWebhooks',
    'updateWebhook',
    'deleteWebhook'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

