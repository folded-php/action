<?php

declare(strict_types = 1);

use Folded\Action;
use function Folded\callAction;
use function Folded\setActionFolderPath;

beforeEach(function (): void {
    Action::clear();
});

it("should call the action using the function", function (): void {
    setActionFolderPath(__DIR__ . "/misc/actions");

    ob_start();

    callAction("home.index");

    $content = ob_get_clean();

    expect($content)->toBe("Hello world");
});
