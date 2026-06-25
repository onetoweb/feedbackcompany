.. _top:
.. title:: Invitation

`Back to index <index.rst>`_

==========
Invitation
==========

.. contents::
    :local:


Schedule Invitations (Product Reviews)
``````````````````````````````````````

.. code-block:: php
    
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
    $result = $client->invitation->schedule($data);


Schedules invitations with optional reminders
`````````````````````````````````````````````

.. code-block:: php
    
    $data = [
        'questionnaire_id' => 4,
        'language' => 'en',
        'respondents' => [
            [
                'email' => 'example@example.com',
                'fullname' => 'John Doe',
                'extra_attribute' => 'extra_value'
            ],
            [
                'email' => 'example2@example.com',
                'fullname' => 'Jane Doe'
            ]
        ],
        'invitation' => [
            'delay' => [
                'unit' => 'days',
                'amount' => 2
            ],
            'reminder' => [
                'unit' => 'hours',
                'amount' => 1
            ]
        ]
    ];
    $result = $client->invitation->scheduleWithReminders($data);


Receive link(s) to questionnaire
````````````````````````````````

.. code-block:: php
    
    $data = [
        'questionnaire_id' => 4,
        'language' => 'nl',
        'respondents' => [
            [
                'email' => 'jeremy@example.com',
                'name' => 'Jeremy'
            ], [
                'email' => 'klaas@example.com',
                'name' => 'Klaas'
            ]
        ]
    ];
    $result = $client->invitation->questionnaireUrl($data);


`Back to top <#top>`_