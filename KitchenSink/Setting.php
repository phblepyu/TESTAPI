<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace LINE\LINEBot\KitchenSink;

class Setting
{
    public static function getSetting()
    {
        return [
            'settings' => [
                'displayErrorDetails' => true, // set to false in production

                'logger' => [
                    'name' => 'slim-app',
                    'path' => __DIR__ . '/../../../logs/app.log',
                ],

                'bot' => [
                    'channelToken' => getenv('LINEBOT_CHANNEL_TOKEN') ?: 'omUZsqxWgzt/wC8KFJONbC6hOrz4i9mgqAfP+Tkrw37mv/Y9E+lZBHFo60pYFhBdvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXXgJzRVUMXHFZizLUq1VeeV5cFYaNq6Ush23Jmdgtz7owdB04t89/1O/w1cDnyilFU=',
                    'channelSecret' => getenv('LINEBOT_CHANNEL_SECRET') ?: 'b5c852f75b9ef71bfa8e27eb9f8df893',
                ],

                'apiEndpointBase' => getenv('LINEBOT_API_ENDPOINT_BASE'),
            ],
        ];
    }
}
