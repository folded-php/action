<?php

declare(strict_types = 1);

namespace Folded;

use Folded\Exceptions\NotAFolderException;
use Folded\Exceptions\FolderNotFoundException;
use InvalidArgumentException;

/**
 * Represents a action to perform following a request.
 *
 * @since 0.1.0
 */
final class Action
{
    /**
     * The folder that contains the actions files.
     *
     * @since 0.1.0
     */
    private static string $folderPath = "";

    /**
     * Include the content of the file.
     * The parameters are passed using extract(), and keys are reflected as variable names.
     *
     * @param string              $path       The path to the file (can use dot syntax).
     * @param array<string,mixed> $parameters An array of key-value pairs to pass to the called action.
     *
     * @throws InvalidArgumentException If the action file is not found.
     *
     * @since 0.1.0
     *
     * @example
     * Action::call("home.index");
     */
    public static function call(string $path, array $parameters = []): void
    {
        if (count($parameters) > 0) {
            extract($parameters);
        }

        include self::getPath($path);
    }

    /**
     * Reset the state of the class.
     * Useful for unit testing.
     *
     * @since 0.1.0
     *
     * @example
     * Action::clear();
     */
    public static function clear(): void
    {
        self::$folderPath = "";
    }

    /**
     * Get the actions folder path.
     *
     * @since 0.1.0
     *
     * @example
     * echo Action::getFolderPath();
     */
    public static function getFolderPath(): string
    {
        return self::$folderPath;
    }

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
     * Action::setFolderPath(__DIR__ . "/actions");
     */
    public static function setFolderPath(string $path): void
    {
        if (!file_exists($path)) {
            throw (new FolderNotFoundException("folder $path not found"))->setFolder($path);
        }

        if (!is_dir($path)) {
            throw (new NotAFolderException("$path is not a folder"))->setFolder($path);
        }

        self::$folderPath = $path;
    }

    /**
     * Get the true path to the action file.
     *
     * @param string $path The path to the action file (can use dot syntax).
     *
     * @throws InvalidArgumentException If the file is not found.
     *
     * @since 0.1.0
     *
     * @example
     * echo Action::getPath("home.index");
     */
    private static function getPath(string $path): string
    {
        $resolvedPath = str_replace(".", DIRECTORY_SEPARATOR, $path);
        $actionPath = self::$folderPath . (mb_substr(self::$folderPath, -1) === "/" ? "" : "/") . "$resolvedPath.php";

        if (!file_exists($actionPath)) {
            // @todo Use Folded\Exceptions\FileNotFoundException instead.
            throw new InvalidArgumentException("file $actionPath not found");
        }

        return $actionPath;
    }
}
