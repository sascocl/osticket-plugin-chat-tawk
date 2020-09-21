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

require_once(INCLUDE_DIR.'/class.forms.php');

class TawkChatConfig extends PluginConfig
{

    // Provide compatibility function for versions of osTicket prior to
    // translation support (v1.9.4)
    public function translate()
    {
        if (!method_exists('Plugin', 'translate')) {
            return array(
                function($x) { return $x; },
                function($x, $y, $n) { return $n != 1 ? $y : $x; },
            );
        }
        return Plugin::translate('chat-tawk');
    }

    public function getOptions()
    {
        list($__, $_N) = self::translate();
        return [
            'tawk' => new SectionBreakField([
                'label' => $__('tawk.to'),
                'hint' => $__('Message your customers, they\'ll love you for it'),
            ]),
            'tawk-property_id' => new TextboxField([
                'label' => $__('Property ID'),
                'hint' => $__('Property ID from dashboard.tawk.to'),
                'configuration' => ['size'=>40, 'length'=>40],
            ]),
        ];
    }

    public function pre_save(&$config, &$errors)
    {
        global $msg;
        list($__, $_N) = self::translate();
        if (!$errors) {
            $msg = $__('Configuration updated successfully');
        }
        return true;
    }

}
