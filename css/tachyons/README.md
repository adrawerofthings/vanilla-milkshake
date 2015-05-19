# TACHYONS

## About

Tachyons is a work in progress and still heavily in flux.
The important parts of tachyons are the separation of concerns and the mobile-first
and modular architecture.

More documentation and examples will be coming. For now - reading the source files
in the src directory are a great way to get up to speed. I promise they are not complicated.

## TLDR;

Build responsive, performant, and easy to maintain interfaces faster than the speed of light.

## Principles

* Everything should be 100% responsive
* Everything should be readable on any device
* Everything should be as performant as possible
* Designing in the browser should be easy
* It should be easy to change any interface or part of an interface without breaking any existing interfaces
* Doing one thing extremely well promotes reusability and reduces repetition
* CSS is global. HTML is not. Send the smallest amount of code to the user as possible.

## Features

* Mobile-first css
* Single-purpose class architecture
* Optimized for maximum gzip compression
* Less than 20kB when minified and gzipped
* Usable across projects
* Infinitely nestable responsive grid system
* Several color palettes
* Currently built on rework

## Getting started

The easiest way to use tachyons is to include the minified file in the head.
If you want to reduce the size of the library greatly on production I suggest
using [uncss](https://github.com/giakki/uncss) to remove styles you aren't referencing.

### Modify the source
Set up the project by cloning the repo, navigating into it, and installing the necessary dependencies by running the following commands:

```
 git clone git@github.com:mrmrs/tachyons.git yourProject
 cd yourProject
 rm -rf .git
 git init
 git add remote git@github.com/yourUserName/yourProject.git
 npm install . && npm start
```

You can alternatively fork the repo and clone your own version of it.

### To run the development environment
```
npm start
```
This will watch the src directory and do the following on file change:
* Compile rework css files
* Run autoprefixer (this allows you to keep vendor prefixes out of your source files)
* Run an instance of browser-sync - this causes any browsers or devices pointing to your local server to reload on file change. It will also keep all browsers in sync with eachother i.e. they will all scroll simultaneously. If you fill out a form on one device all devices will be updated with that content. It can be a huge help if you are testing multiple browsers or devices.

## Some things built with Tachyons

* http://88-bar.com
* http://joinoneroom.com
* http://mn-ml.cc
* http://clrs.cc
* http://gfffs.com
* http://pesticide.io
* http://mrmrs.io/btns/
* http://zachhurd.com
* http://mrmrs.cc
* http://mrmrs.io
* http://mrmrs.io/up/
* http://mrmrs.io/beats/
* http://designbytyping.com
* http://☠☣.ws

## A Note on Class Names

This fork of Tachyons uses a more verbose and unambiguous naming convention that uses the following structure:

`classname-value-screensize`

Examples:

* `{ clear: left }` is `clear-left`
* `{ max-width: 100% }` on large screens is `maxwidth-100p-l`
* `{ padding-bottom: 2rem }` on mobile is `paddingbottom-medium`

Of course, there are certain customizations. So specifying a value of `1` or `2` will give incrementally large sizes on certain properties.

Screen sizes fall under the following rules:

* `ns` is not small. Generally anything larger than mobile, where if no size is specified the mobile default/first style is used.
* 'm' is medium (but not large, so you will need to specify large or it defaults back to the mobile first style for large sizes)
* 'l' is large (but not medium)

## License

The MIT License (MIT)


Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
