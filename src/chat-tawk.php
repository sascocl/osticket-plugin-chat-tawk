<?php

/**
 * Plugin for osTicket for using a chat with tawk.to in the support web page
 * Copyright (C) 2020 SASCO SpA (https://sasco.cl)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

require_once(INCLUDE_DIR.'class.plugin.php');
require_once('config.php');

define('CHAT_TAWK_PLUGIN_ROOT', dirname(__FILE__));

/**
 * Clase que permite agregar y usar el widget a la página de soporte
 * @author Esteban De La Fuente Rubio, DeLaF (esteban[at]sasco.cl)
 * @version 2020-09-21
 */
class TawkChatPlugin extends Plugin
{

    public $config_class = 'TawkChatConfig';

    public function bootstrap()
    {
    }

    public function getExtraHeaders()
    {
        $headers = [];
        $config = $this->getConfig();
        if (!empty($config->get('tawk-property_id'))) {
            $header = file_get_contents(CHAT_TAWK_PLUGIN_ROOT . '/include/header.html');
            if ($header) {
                $headers[] = str_replace('{property_id}', $config->get('tawk-property_id'), $header);
            }
        }
        return $headers;
    }

}
