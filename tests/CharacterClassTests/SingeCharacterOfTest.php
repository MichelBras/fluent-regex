<?php

declare(strict_types=1);

use VincentVanWijk\FluentRegex\FluentRegex;

it('returns the correct regex', function () {
    $regex = new FluentRegex('foo bar baz');
    $regexString = $regex->anyCharacterOf('bar')
        ->get();

    expect($regexString)->toBeString()
        ->toBe('/[bar]/');
});

it('returns the correct match', function () {
    $regex = new FluentRegex('foo bar baz');
    $match = $regex->anyCharacterOf('bar')
        ->match();

    expect($match)->toBeArray()
        ->toBe(['b']);
});

it('returns the correct matches', function () {
    $regex = new FluentRegex('foo bar baz');
    $matches = $regex->anyCharacterOf('bar')
        ->matchAll();

    expect($matches)->toBeArray()
        ->toBe([['b', 'a', 'r', 'b', 'a']]);
});
