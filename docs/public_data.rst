.. _top:
.. title:: Public Data

`Back to index <index.rst>`_

===========
Public Data
===========

.. contents::
    :local:


All Shops and Results
`````````````````````

.. code-block:: php
    
    $query = [
        'page' => 1,
        'per_page' => 15,
        'min_avg_score' => 7.5,
        'max_avg_score' => 9.5,
        'city' => 'Amsterdam',
        'name' => 'Example Company'
    ];
    $result = $client->publicData->allShops($query);


`Back to top <#top>`_