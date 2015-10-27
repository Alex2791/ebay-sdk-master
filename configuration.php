<?php
/**
 * Copyright 2014 David T. Sadler
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
 */

/**
 * Configuration settings used by all of the examples.
 * 
 * Specify your eBay application keys in the appropriate places.
 *
 * Be careful not to commit this file into an SCM repository.
 * You risk exposing your eBay application keys to more people than intended.
 *
 * For more information about the configuration, see:
 * http://devbay.net/sdk/guides/sample-project/
 */
return array(
    'sandbox' => array(
        'devId' => 'YOUR_SANDBOX_DEVID_APPLICATION_KEY',
        'appId' => 'YOUR_SANDBOX_APPID_APPLICATION_KEY',
        'certId' => 'YOUR_SANDBOX_CERTID_APPLICATION_KEY',
        'userToken' => 'YOUR_SANDBOX_USER_TOKEN_APPLICATION_KEY'
    ),
    'production' => array(
        'devId' => '4dc39a23-287e-4586-a92f-677e8af2bdcd',
        'appId' => 'KKK6bb807-2fab-408e-aea4-9b2a2a89b87',
        'certId' => '17af0a88-e4d2-4ecc-8d57-6baa85680208',
        'userToken' => 'AgAAAA**AQAAAA**aAAAAA**pRQeVg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6AAkYugDZSFqQidj6x9nY+seQ**XAcDAA**AAMAAA**ZQgmLhi6jtAvEnURJp8rsjGbn8rXt4psjM8cO9VMz6OmBhdzVudLk+J894mKbM3D9z20psoAuu0SxrPIKdvW1359rtHsAcVgCm9o9pKGpjWc9vaxcn/dArouY8kqbF+tjW3akYY1nQUHPqBk9hqFvl8s05NfKiMcMTRRNv6sQ2I5T234Fer6rtXbbdyVCJkI8yfkvsuS738ksuJUQ177RaVXBm59e029JVJC9MYxdHWX9CwpAt/PXk8To6BhLdF7+ki6de3bMCsoHEsSXPaYSmEY8TsqPfx305CM+Yg/Y1j/D6l7DGCLdtz8Rwv/ZYhi7vK6vs69nRvRkyfz7yItqiFLNoBsQiw7+YO47uCTZzfeqyscOvlUn0j0rmXSezETsNa9vzlWCOhQ3B+rJUICgL59uhCVL4zgQiJ6LJWSaizCg50q+1dnyAjOYtplBeG1aQa8ccXqbJQqhtM5NwpsCXLgyake8hm7TfoE9ZsXbOKx8qGUwrXs9RWLGE06yBYX0vyJrG+jEnrY+2MfGV9xPRmse9+pyHOZ7z5x5HqxksLiUle7lrxUXs8RJzYHB8JNGnLig7lavoli7fYPk70alrCBF00FF0ppgCudS1yHMoWr222QzMN76KeA0hTk8w4udFjP6Tg6AbaYyPnusJN0xDaR3Uu6b
        caXmQm4L/BmSGDISDdm8Knfps3sV1orV55pIGGUKrC/V4HDnsHEB+kTygj+AiZTh6P0RGhys+eeL+hQ4uKGHhD8bt7JRYe41EAA'
    ),
    'findingApiVersion' => '1.12.0',
    'tradingApiVersion' => '871',
    'shoppingApiVersion' => '871',
    'halfFindingApiVersion' => '1.2.0'
);
