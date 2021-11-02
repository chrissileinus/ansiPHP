# ansiPHP

A simple Library with static classes they generate ANSI Control Sequences and return the code as a `string`.

It makes the code more readable as a lot of cryptic ANSI code in a long string.

[[_TOC_]]

## Clear

All Clear commands do have one param `$command`

`Clear::toEnd`

: Clears everything for the current cursor position to the end.

`Clear::toStart`: Clears everything for the current cursor position to the start.

`Clear::All`: Clears everything.

**`Clear::screen($command)`**: Manipulates the whole Screen dependent on the given parameter.

**`Clear::line($command)`**: Manipulates the current line dependent on the given parameter.

Example #1: Clear everything from the cursor to the end of the line.

```php
Ansi\Clear::line(Clear::toEnd)
```

Example #2: Clear the whole screen.

```php
Ansi\Clear::screen(Clear::All)
```

## Cursor

Move the cursor around on the whole srceen.

Every command has the parameter `$steps` and it controls how many steps the cursor moves.

**`Cursor::up($steps)`**: Moves the cursor up.

**`Cursor::down($steps)`**: Moves the cursor down.

**`Cursor::right($steps)`**: Moves the cursor right.

**`Cursor::left($steps)`**: Moves the cursor left.

## Text

**`Text::set(...$args)`**: Generates ANSI styling code dependent on the given `$args`.

**`Text::reset()`**: Resets the styling code.

**`Text::inject($string, ...$args)`**: Like `Text::set` but it wraps the styling code around the given `$string`.
