<?php
return array(
    'CodeOrders\\V1\\Rest\\Ptypes\\Controller' => array(
        'description' => 'Handles payment types',
        'collection' => array(
            'description' => 'Collection of PaymantType',
            'GET' => array(
                'description' => 'List All Paymant types',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes"
       },
       "first": {
           "href": "/ptypes?page={page}"
       },
       "prev": {
           "href": "/ptypes?page={page}"
       },
       "next": {
           "href": "/ptypes?page={page}"
       },
       "last": {
           "href": "/ptypes?page={page}"
       }
   }
   "_embedded": {
       "ptypes": [
           {
               "_links": {
                   "self": {
                       "href": "/ptypes[/:ptypes_id]"
                   }
               }
              "name": ""
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Create new payment type',
                'request' => '{
   "name": "Name of payment type"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id": "id of payment type",
   "name": "Name of payment type"
}',
            ),
        ),
        'entity' => array(
            'description' => 'Payment Types',
            'GET' => array(
                'description' => 'Returns a payment type',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "id": "id",
   "name": "Name payment typ"
}',
            ),
            'PATCH' => array(
                'description' => 'Update partialy a payment type',
                'request' => '{
   "name": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/ptypes[/:ptypes_id]"
       }
   }
   "name": ""
}',
            ),
        ),
    ),
);
