.. title:: Index

Index
=====

.. contents::
    :local:

===========
Basic Usage
===========

Setup

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Feedbackcompany\Client;
    
    // params
    $token = '{token}';
    $testModus = true;
    
    // setup client
    $client = new Client($token, $testModus);


========
Examples
========

* `Widget <widget.rst>`_
* `Webhook <webhook.rst>`_
* `Invitation <invitation.rst>`_
* `Result <result.rst>`_
* `Public Data <public_data.rst>`_
* `Product Review <product_review.rst>`_
