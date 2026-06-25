.. _top:
.. title:: Webhook

`Back to index <index.rst>`_

=======
Webhook
=======

.. contents::
    :local:


schedule invitations
````````````````````

.. code-block:: php
    
    $id = '13a23516-e39e-4e51-ac1b-861e5f64e2c0';
    $data = [
        'email' => 'gbailey@example.net',
        'name' => 'm',
        'currency' => 'ZMI',
        'line_items' => [
            [
                'sku' => 'architecto',
                'title' => 'architecto',
                'variant_title' => 'architecto'
            ]
        ],
        'register_sale_products' => [
            [
                'product_id' => 'architecto',
                'quantity' => 16
            ]
        ]
    ];
    $result = $client->webhook->scheduleInvitations($id, $data);


`Back to top <#top>`_