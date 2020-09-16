<?php

declare(strict_types = 1);

use Folded\Action;
use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;

beforeEach(function (): void {
    Action::clear();
});

it("should call the action", function (): void {
    Action::setFolderPath(__DIR__ . "/misc/actions");

    ob_start();

    Action::call("home.index");

    $content = ob_get_clean();

    expect($content)->toBe("Hello world");
});

it("should set the folder path", function (): void {
    $folder = __DIR__ . "/misc/actions";

    Action::setFolderPath($folder);

    expect(Action::getFolderPath())->toBe($folder);
});

it("should throw an exception when the folder is not found after setting the folder path", function (): void {
    $this->expectException(FolderNotFoundException::class);

    Action::setFolderPath(__DIR__ . "/not-found");
});

it("should throw an exception when the path is not a folder when setting the folder path", function (): void {
    $this->expectException(NotAFolderException::class);

    Action::setFolderPath(__DIR__ . "/misc/actions/home/index.php");
});

it("should throw an exception if the action is not found", function (): void {
    $this->expectException(InvalidArgumentException::class);

    Action::setFolderPath(__DIR__ . "/misc/actions");
    Action::call("account.create");
});
