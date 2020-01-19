<?php

use Zerocod3lab\CommitChecker\Commands\PreCommitHook;

return [
    'enabled' => env('COMMIT_CHECKER_ENABLED', true),
    'psr2'    => [
        'standard' => __DIR__ . '/../phpcs.xml',
        'ignored'  => [
            '*/database/*',
            '*/public/*',
            '*/assets/*',
            '*/vendor/*',
        ],
    ],
    'hooks'   => [
        'pre-commit' => PreCommitHook::class,
    ],
];
