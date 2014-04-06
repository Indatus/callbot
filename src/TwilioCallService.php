<?php

namespace Indatus\Callbot;

use Services_Twilio;
use Indatus\Callbot\Config;
use Indatus\Callbot\Contracts\CallServiceInterface;

class TwilioCallService implements CallServiceInterface
{
    public function __construct(Services_Twilio $twilio, Config $config)
    {
        $this->twilio = $twilio;
        $this->config = $config;
    }

    public function call($from, $to, $uploadName)
    {
        return $this->twilio->account->calls->create(
            $from,
            $to,
            'https://s3.amazonaws.com/' . $this->config->get('fileStore.credentials.bucketName') . '/' . $uploadName,
            array('Method' => 'GET')
        );
    }

    public function getResults($callIds)
    {
        // allow the client to pass in a single id or multiple
        if (!is_array($callIds)) {

            $callIds = array($callIds);

        }

        $results = array();

        foreach ($callIds as $id) {

            $results[] = $this->twilio->account->calls->get($id);

        }

        return $results;
    }

    public function getRange($range)
    {
        if (count($range) == 1) {

            $results = $this->twilio->account->calls->getIterator(0, 50, array(
                "StartTime>" => $range[0]
            ));

        }

        return $results;
    }
}