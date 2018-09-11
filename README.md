# Laravel webshipper integration
# laravel-webshipper


### Creating and using webshipper api:
To instantiate and create api instance  
```
use Webshipper\Webshipper';
$api = new Webshipper();
```

#### Using api to create orders
Api has an exposed property called orders
`$this->api->orders`  
This property is used to manipualte orders

Creating webshipper order $data object  
```
[
        'billing_address' =>
            [
                'address_1' => 'Test Road 66',
                'address_2' => 'Test Road 120',
                'city' => 'Test City',
                'company_name' => 'webshipr Aps',
                'contact_name' => 'mathias',
                'country_code' => 'DK',
                'email' => 'info@webshipr.com',
                'phone' => '66666666',
                'phone_area' => '+45',
                'zip' => '8230',
            ],
        'delivery_address' =>
            [
                'address_1' => 'Test Road 66',
                'address_2' => 'Test Road 120',
                'city' => 'Test City',
                'company_name' => 'webshipr Aps',
                'contact_name' => 'mathias',
                'country_code' => 'DK',
                'email' => 'info@webshipr.com',
                'phone' => '66666666',
                'phone_area' => '+45',
                'zip' => '8230',
            ],
        'dynamic_address' =>
            [
                'address_1' => 'GLS Pakkeshop XX',
                'address_2' => '',
                'city' => 'Åbyhøj',
                'company_name' => 'GLS Pakkeshop XX',
                'contact_name' => '',
                'country_code' => 'DK',
                'email' => 'info@webshipr.com',
                'phone' => '',
                'phone_area' => '',
                'zip' => '8230',
            ],
        'custom_pickup_identifier' => '341',
        'items' =>
            [
                [
                    'description' => 'Testdesc1',
                    'product_name' => 'TestName1',
                    'product_no' => 12,
                    'quantity' => 45,
                    'uom' => 'pcs',
                    'weight' => 500,
                    'location' => 'EP432S2',
                    'sub_total_price' => 50,
                    'total_price' => 60,
                    'currency' => 'EUR',
                    'tarif_number' => '1234',
                    'origin_country_code' => 'NO',
                    'ext_ref' => 'myitemref1',
                ],
                [
                    'description' => 'Testdesc1',
                    'product_name' => 'TestName1',
                    'product_no' => 12,
                    'quantity' => 45,
                    'uom' => 'pcs',
                    'weight' => 500,
                    'location' => 'EP432S2',
                    'sub_total_price' => 50,
                    'total_price' => 60,
                    'currency' => 'EUR',
                    'tarif_number' => '1234',
                    'origin_country_code' => 'NO',
                    'ext_ref' => 'myitemref2',
                ],
            ],
        'webshop_id' => 3752,
        'ext_ref' => '00929812',
        'shipping_rate_id' => 983,
        'user_id' => 123,
        'comment' => 'Sample Comment',
    ]
```

Full create order will look like:
```angular2html
$this->api->orders->create(
    [
            'billing_address' =>
                [
                    'address_1' => 'Test Road 66',
                    'address_2' => 'Test Road 120',
                    'city' => 'Test City',
                    'company_name' => 'webshipr Aps',
                    'contact_name' => 'mathias',
                    'country_code' => 'DK',
                    'email' => 'info@webshipr.com',
                    'phone' => '66666666',
                    'phone_area' => '+45',
                    'zip' => '8230',
                ],
            'delivery_address' =>
                [
                    'address_1' => 'Test Road 66',
                    'address_2' => 'Test Road 120',
                    'city' => 'Test City',
                    'company_name' => 'webshipr Aps',
                    'contact_name' => 'mathias',
                    'country_code' => 'DK',
                    'email' => 'info@webshipr.com',
                    'phone' => '66666666',
                    'phone_area' => '+45',
                    'zip' => '8230',
                ],
            'dynamic_address' =>
                [
                    'address_1' => 'GLS Pakkeshop XX',
                    'address_2' => '',
                    'city' => 'Åbyhøj',
                    'company_name' => 'GLS Pakkeshop XX',
                    'contact_name' => '',
                    'country_code' => 'DK',
                    'email' => 'info@webshipr.com',
                    'phone' => '',
                    'phone_area' => '',
                    'zip' => '8230',
                ],
            'custom_pickup_identifier' => '341',
            'items' =>
                [
                    [
                        'description' => 'Testdesc1',
                        'product_name' => 'TestName1',
                        'product_no' => 12,
                        'quantity' => 45,
                        'uom' => 'pcs',
                        'weight' => 500,
                        'location' => 'EP432S2',
                        'sub_total_price' => 50,
                        'total_price' => 60,
                        'currency' => 'EUR',
                        'tarif_number' => '1234',
                        'origin_country_code' => 'NO',
                        'ext_ref' => 'myitemref1',
                    ],
                    [
                        'description' => 'Testdesc1',
                        'product_name' => 'TestName1',
                        'product_no' => 12,
                        'quantity' => 45,
                        'uom' => 'pcs',
                        'weight' => 500,
                        'location' => 'EP432S2',
                        'sub_total_price' => 50,
                        'total_price' => 60,
                        'currency' => 'EUR',
                        'tarif_number' => '1234',
                        'origin_country_code' => 'NO',
                        'ext_ref' => 'myitemref2',
                    ],
                ],
            'webshop_id' => 3752,
            'ext_ref' => '00929812',
            'shipping_rate_id' => 983,
            'user_id' => 123,
            'comment' => 'Sample Comment',
        ]
)
```

#### Updating order is done by using this code:
```angular2html
$this->api->orders->update($id, $data)
```
`$data` in update is the same as in create  
#### Finding order is done by following code:
```angular2html
$this->api->orders-find($id)
```
#### Deleting order is done by following code:
```angular2html
$this->api->orders-delete($id)
```