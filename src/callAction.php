<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("callAction")) {
    /**
     * Include the content of the file.
     *
     * @param string $path       The path to the file (can use dot syntax).
     * @param array  $parameters An array of key-value pairs to pass to the called action.
     *
     * @throws InvalidArgumentException If the action file is not found.
     *
     * @since 0.1.0
     *
     * @example
     * callAction("home.index");
     */
    function callAction(string $path, array $parameters = []): void
    {
        Action::call($path, $parameters);
    }
}
