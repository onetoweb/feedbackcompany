.. _top:
.. title:: Result

`Back to index <index.rst>`_

======
Result
======

.. contents::
    :local:


Review Page
```````````

.. code-block:: php
    
    $result = $client->result->reviewPage();


Statistics Responses
````````````````````

.. code-block:: php
    
    $data = [
        'date_start' => '2025-04-20',
        'date_end' => '2025-09-01',
        'questionnaires' => ''
    ];
    $customerId = 2;
    $result = $client->result->responses($customerId, $data);


Statistics Results
``````````````````

.. code-block:: php
    
    $data = [
        'date_start' => '2025-04-20',
        'date_end' => '2025-09-01',
        'questionnaires' => ''
    ];
    $customerId = 2;
    $result = $client->result->statistics($customerId, $data);


Reviews
```````

.. code-block:: php
    
    $data = [
        'order_by' => 'score',
        'order_direction' => 'asc'
    ];
    $customerId = 2;
    $result = $client->result->reviews($customerId, $data);


Single Review
`````````````

.. code-block:: php
    
    $customerId = 2;
    $reviewId = 2;
    $result = $client->result->singleReview($customerId, $reviewId);


Reactions
`````````

.. code-block:: php
    
    $questionnaireId = 2;
    $query = [
        'date_start' => '2025-04-20',
        'date_end' => '2025-06-09',
    ];
    $result = $client->result->reactions($questionnaireId, $query);


`Back to top <#top>`_