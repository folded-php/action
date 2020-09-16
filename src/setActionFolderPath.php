<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("setActionFolderPath")) {
    /**
     * Set the folder to the actions files.
     *
     * @param string $path The path to the actions files.
     *
     * @throws Folded\Exceptions\FolderNotFoundException If the folder is not found.
     * @throws Folded\Exceptions\NotAFolderException     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * setActionFolderPath(__DIR__ . "/actions");
     */
    function setActionFolderPath(string $path): void
    {
        Action::setFolderPath($path);
    }
}
