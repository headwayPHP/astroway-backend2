<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Resources\Responsibility\Configuration;

use PagSeguro\Resources\Responsibility\Handler;

class Extensible implements Handler
{
    private $successor;

    public function successor($next)
    {
        $this->successor = $next;
        return $this;
    }

    public function handler($action, $class)
    {
        unset($action, $class);
        if (file_exists(PS_CONFIG)) {
            return array_merge(
                $this->environment(),
                $this->credentials(),
                $this->charset(),
                $this->log()
            );
        }
        throw new \InvalidArgumentException("Configuration not found.");
    }

    private function environment()
    {
        return [
            'environment' => lw_current_func(
                simplexml_load_file(PS_CONFIG)->environment
            )
        ];
    }

    private function credentials()
    {
        //Loading XML configuration file.
        $xml = simplexml_load_file(PS_CONFIG)->credentials;
        return [
            'credentials' => [
                'email' => lw_current_func($xml->account->email),
                'token' => [
                    'environment' => [
                        'production' => lw_current_func($xml->account->production->token),
                        'sandbox' => lw_current_func($xml->account->sandbox->token)
                    ]
                ],
                'appId' => [
                    'environment' => [
                        'production' => lw_current_func($xml->application->production->appId),
                        'sandbox' => lw_current_func($xml->application->sandbox->appId)
                    ]
                ],
                'appKey' => [
                    'environment' => [
                        'production' => lw_current_func($xml->application->production->appKey),
                        'sandbox' => lw_current_func($xml->application->sandbox->appKey)
                    ]
                ]
            ]
        ];
    }

    private function charset()
    {
        return [
            'charset' => lw_current_func(
                simplexml_load_file(PS_CONFIG)->charset
            )
        ];
    }

    private function log()
    {
        //Loading XML configuration file.
        $xml = simplexml_load_file(PS_CONFIG)->log;
        return [
            'log' => [
                'active' => lw_current_func($xml->active),
                'location' => lw_current_func($xml->location)
            ]
        ];
    }
}
