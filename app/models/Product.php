<?php


namespace app\models;


class Product extends AppModel
{
    public $attributes = [
        'productCode' => '',
        'productName' => '',
        'productLine' => '',
        'productScale' => '',
        'productVendor' => '',
        'productDescription' => '',
        'quantityInStock' => '',
        'buyPrice' => '',
        'msrp' => '',
    ];

    public $rules = [
        'required' => [
            [
                'productCode',
                'productName',
                'productLine',
                'productScale',
                'productVendor',
                'quantityInStock',
                'buyPrice',
                'msrp'
            ],
        ]
    ];

    public function tableName()
    {
        return 'products';
    }
}