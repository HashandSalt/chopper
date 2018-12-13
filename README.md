# Kirby Chopper Plugin

Unlike Kirby's built in [Excerpt](https://getkirby.com/docs/cheatsheet/field-methods/excerpt) which only returns plain text, this plugin creates excerpts from fields via kirbytext but keeps HTML tags. This means all tags, including images. You can set a character or word limit.

## Installation

To use this plugin, place all the files in `site/plugins/chopper`.

## Usage

Defaults to words and an ellipsis, so if you just want 20 words and an ellipsis on the end:

```
<?= $page->text()->chopper(20) ?>
```

To trim to 200 characters and append ellipsis on the end:

```
<?= $page->text()->chopper(200, 'chars') ?>
```

To trim to 50 words and append an arrow on the on the end:

```
<?= $page->text()->chopper(500, 'words', '→') ?>
```

To change the default list of kept tags, add this line to your `config.php` and amend accordingly:

```
c::set('chopper.keep', '<p><a><strong><em><sub><sup><blockquote><figure><img><h1><h2><h3><h4><h5><h6>');
```

## Requirements

This plugin was built using Kirby 2.5+. May work on earlier versions.


## Credits
Based on the work of Partrick Galbraith (https://www.pjgalbraith.com/truncating-text-html-with-php/)
