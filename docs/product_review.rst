.. _top:
.. title:: Product Review

`Back to index <index.rst>`_

==============
Product Review
==============

.. contents::
    :local:


List widgets
````````````

.. code-block:: php
    
    $query = [
        'status' => 'Published',
        'widget_type' => 'bar',
        'page' => 1,
        'per_page' => 50
    ];
    
    $result = $client->productReview->listWidgets($query);


Get widget details
``````````````````

.. code-block:: php
    
    $widgetId = '1f0c0af2-2a16-4dca-9c8b-7e0a5e46d19c';
    $result = $client->productReview->widgetDetails($widgetId);


List products
`````````````

.. code-block:: php
    
    $query = [
        'page' => 1,
        'per_page' => 50
    ];
    $result = $client->productReview->listProducts($query);


Product review summary
``````````````````````

.. code-block:: php
    
    $query = [
        'from' => '2025-01-01',
        'to' => '2025-12-31'
    ];
    $productId = 42;
    $result = $client->productReview->summary($productId, $query);


List product reviews
````````````````````

.. code-block:: php
    
    $query = [
        'status' => 'Published',
        'product_id' => 42,
        'page' => 1,
        'per_page' => 50,
    ];
    $result = $client->productReview->list($query);


Get a single product review
```````````````````````````

.. code-block:: php
    
    $reviewId = 42;
    $result = $client->productReview->get($reviewId);


List product images
```````````````````

.. code-block:: php
    
    $query = [
        'entity_type' => 'review',
        'entity_id' => 987,
        'status' => 'active',
        'source' => 'shopify',
        'image_type' => 'image/jpeg',
        'rating' => 5,
        'uploaded_from' => '2025-01-01',
        'uploaded_to' => '2025-12-31',
        'page' => 1,
        'per_page' => 20
    ];
    $result = $client->productReview->listImages($query);


Get a single image's metadata
`````````````````````````````

.. code-block:: php
    
    $imageId = '1f0c0af2-2a16-4dca-9c8b-7e0a5e46d19c';
    $result = $client->productReview->imageMetadata($imageId);


Stream the binary image file
````````````````````````````

.. code-block:: php
    
    
    
    


`Back to top <#top>`_