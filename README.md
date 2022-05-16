# ansiPHP

A simple Library with static classes they generate ANSI Control Sequences and return the code as a `string`.

It makes the code more readable as a lot of cryptic ANSI code in a long string.

https://misc.flogisoft.com/bash/tip_colors_and_formatting

## Clear

All Clear commands do have one param `$command`

### `Clear::screen($command)`

Manipulates the whole Screen dependent on the given parameter.

### `Clear::line($command)`

Manipulates the current line dependent on the given parameter.

### The `$command`s are

- `Clear::toEnd`: Clears everything for the current cursor position to the end.

- `Clear::toStart`: Clears everything for the current cursor position to the start.

- `Clear::All`: Clears everything.

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

### `Cursor::up($steps)`

Moves the cursor up.

### `Cursor::down($steps)`

Moves the cursor down.

### `Cursor::right($steps)`

Moves the cursor right.

### `Cursor::left($steps)`

Moves the cursor left.

## Text

### `Text::set(...$args)`

Generates ANSI styling code dependent on the given `$args`.

### `Text::reset()`

Resets the styling code.

### `Text::inject($string, ...$args)`

Like `Text::set` but it wraps the styling code around the given `$string`.

### List of all possible `$args`

And all dose what they say.

#### Style

- default
- bold
- dim
- italic
- underline
- blink
- inverse
- hidden

#### Text color

- f_default
- f_black
- f_red
- f_green
- f_yellow
- f_blue
- f_magenta
- f_cyan
- f_lightGray
- f_darkGray
- f_lightRed
- f_lightGreen
- f_lightYellow
- f_lightBlue
- f_lightMagenta
- f_lightCyan
- f_white

#### Background color

- b_default
- b_black
- b_red
- b_green
- b_yellow
- b_blue
- b_magenta
- b_cyan
- b_lightGray
- b_darkGray
- b_lightRed
- b_lightGreen
- b_lightYellow
- b_lightBlue
- b_lightMagenta
- b_lightCyan
- b_white
