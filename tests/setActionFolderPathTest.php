<?php

declare(strict_types = 1);

use Folded\Action;
use function Folded\setActionFolderPath;

beforeEach(function (): void {
    Action::clear();
});

it("should set the folder path using the function", function (): void {
    $folder = __DIR__ . "/misc/actions";

    setActionFolderPath($folder);

    expect(Action::getFolderPath())->toBe($folder);
});
