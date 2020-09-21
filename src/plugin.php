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

return [
    'id'            => 'chat:tawk', # notrans
    'version'       => '1.0.0',
    'name'          => /* trans */ 'Chat with tawk.to',
    'author'        => 'Esteban De La Fuente Rubio',
    'description'   => /* trans */ 'Allows the use of a tawk.to widget for chat in the support web page.',
    'url'           => 'https://github.com/sascocl/osticket-plugin-chat-tawk',
    'plugin'        => 'chat-tawk.php:TawkChatPlugin'
];
