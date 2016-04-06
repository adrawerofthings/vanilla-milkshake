# TACHYONS

Functional CSS for humans.

Quickly build and design new UI without writing CSS.

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
* Single-purpose class structure
* Optimized for maximum gzip compression
* Usable across projects
* Infinitely nestable responsive grid system
* Built with Postcss

#### Build

##### First time

Tachyons is available as a series of small self contained css modules. They aren't dependent on eachother but
are designed to play well together. But tachyons is also just css. And you should feel free to edit css
that is in your project. The first time you build tachyons all of the css gets installed through npm, but the modules
then get copied over to your local src directory and then the tachyons-cli uses a series of postcss plugins to
compile the source down to vanilla css.

##### Updating

If you want to update a tachyons partial, update the module through npm and run the build command again. Note
this will copy over all source files, so if you've modified src/ your changes might be overwritten.
```npm run build```

#### Dev

If you want to just use src as a jumping off point and edit all the code yourself, you can compile all of your wonderful changes by running

```npm start```

This will output both minified and unminified versions of the css to the css directory.

## Verbose?

This fork of Tachyons uses an unambiguous naming formula designed for those of us who don't want to remember any more acronyms:

`classname-value-screensize`

Examples:

* `{ clear: left }` is `clear-left`
* `{ max-width: 100% }` on large screens is `maxwidth-100p-l`
* `{ padding-bottom: 2rem }` for mobile and up is `paddingbottom-medium`

## Some websites that use modules from the tachyons project

* http://bluebottlecoffee.com
* http://aboutlife.com
* http://clrs.cc
* http://mrmrs.io/gradients
* http://joinoneroom.com
* https://www.getnoodl.es
* https://natwelch.com
* http://mrmrs.io/profile/
* http://mn-ml.cc
* http://pesticide.io
* http://mrmrs.io/btns/
* http://zachhurd.com
* http://mrmrs.cc
* http://mrmrs.io/up/
* http://mrmrs.io/beats/
* http://mrmrs.io/writing
* http://fade.pics
* http://gfffs.com
* http://88-bar.com
* http://comics.hongkonggong.com

And of course...
* http://tachyons.io

## Help

If you have a question feel free to open an issue here or jump into the [Tachyons slack channel](http://tachyons-slack-invite.herokuapp.com).

## License

MIT

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request
