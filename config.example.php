<?php

return [

    // Call Service settings
    'callService' => [

        'driver' => 'twilio',

        'credentials' => [
            'accountSid' => 'XXXXXXXXXXXXXXXXX',
            'authToken' => 'XXXXXXXXXXXXXXXXX'
        ],

        'defaultFrom' => '5551234567'

    ],

    // File Store settings
    'fileStore' => [

        'driver' => 'S3',

        'credentials' => [
            'accessKey' => 'XXXXXXXXXXXXXXXXX',
            'secretKey' => 'XXXXXXXXXXXXXXXXX'
        ],

        'uploadDir' => 'https://s3.amazonaws.com/BUCKET_NAME'

    ],

    // Default timezone
    'timezone' => 'America/New_York',

    // Configured batches of calls
    'batches' => [
        [
            'to' => ['5551234567', '5551234567', '5551234567'],
            'script' => 'call-scripts/test-script.xml'
        ]
    ]
];