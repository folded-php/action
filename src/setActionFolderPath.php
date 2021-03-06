<?php

declare(strict_types = 1);

namespace Folded;

use Folded\Exceptions\NotAFolderException;
use Folded\Exceptions\FolderNotFoundException;

if (!function_exists("Folded\setActionFolderPath")) {
    /**
     * Set the folder to the actions files.
     *
     * @param string $path The path to the actions files.
     *
     * @throws FolderNotFoundException If the folder is not found.
     * @throws NotAFolderException     If the path is not a folder.
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
