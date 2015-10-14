var _ = require('lodash')
var fs = require('fs')
var filesize = require('filesize')
var tachyons = require('./package.json')
var srcDir = fs.readdirSync('./src/')

var filesCount = srcDir.length - 3

var postcss = require('postcss')
var cssstats = require('cssstats')
//var parseColors = require('./lib/parse-colors')
//var parseCombos = require('./lib/parse-combos')

var css = fs.readFileSync('./css/tachyons.min.css', 'utf8')
//var colors = parseColors(css)
//var combos = parseCombos(colors)

var ast = postcss.parse(css)
var obj = cssstats(ast)

var astObj = JSON.stringify(ast, null, '\t')
var stats = JSON.stringify(obj, null, '\t')

var size = filesize(obj.gzipSize)

//console.log(astObj)
