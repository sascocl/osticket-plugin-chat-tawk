osTicket Plugin Chat with tawk.to
=================================

Plugin for using a chat with tawk.to in the support web page.

For using this plugin you need to modify two files in osTicket core:

1. In `include/class.plugin.php` add this to `PluginManager`:

    ```php
    /**
     * getExtraHeaders
     *
     * Used to add extra headers from all the plugins currently enabled.
     */
    function getExtraHeaders() {
        $headers = [];
        foreach ($this->allActive() as $p) {
            if (method_exists($p, 'getExtraHeaders')) {
                $headers = array_merge($headers, $p->getExtraHeaders());
            }
        }
        return $headers;
    }
    ```

2.  In `include/client/header.inc.php` add this inside the head tag:

    ```php
    if ($ost && ($headers=$ost->plugins->getExtraHeaders())) {
        echo "\n\t".implode("\n\t", array_map(function($h) {return str_replace("\n", "\n\t", $h);}, $headers))."\n";
    }
    ```

License of the project: AGPL
