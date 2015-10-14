# TACHYONS

## About

This is a verbose fork of Tachyons that I used to build the [Vanilla Milkshake](http://hongkonggong.github.io/vanilla-milkshake/) Wordpress theme. It has some minor adjustments, including some accessibilty enhancements, and is a work-in-progress.

For more information (and proper documentation) about Tachyons, go to [tachyons.io](http://tachyons.io/) or [its Github repo](https://github.com/mrmrs/tachyons).

## Verbose?

This fork of Tachyons uses a verbose and unambiguous naming formula:

`classname-value-screensize`

Examples:

* `{ clear: left }` is `clear-left`
* `{ max-width: 100% }` on large screens is `maxwidth-100p-l`
* `{ padding-bottom: 2rem }` for mobile and up is `paddingbottom-medium`

Of course, there are certain customizations. So specifying a value of `1` or `2` will give incrementally large sizes on certain properties.

Screen sizes fall under the following rules:

* `ns` is not small. Generally anything larger than mobile, where if no size is specified the mobile default/first style is used.
* `m` is medium (but not large, so you will need to specify large or it defaults back to the mobile first style for large sizes)
* `l` is large (but not medium)


## License

The MIT License (MIT)


Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
