<?php
/**
 *
 * Chopper Plugin for Kirby 3
 *
 * @version   2.0.2
 * @author    James Steel <https://hashandsalt.com>
 * @copyright James Steel <https://hashandsalt.com>
 * @link      https://github.com/HashandSalt/chopper
 * @license   MIT <http://opensource.org/licenses/MIT>
 */

@include_once __DIR__ . '/vendor/autoload.php';

require('lib/DOMLettersIterator.php');
require('lib/DOMWordsIterator.php');
require('lib/TruncateHTML.php');


Kirby::plugin('hashandsalt/chopper', [
	// Options
	'options' => [
		'keep' => '<p><a><strong><em><sub><sup><blockquote><figure><img><h1><h2><h3><h4><h5><h6>'
  ],

	'fieldMethods' => [
		'chopper' => function ($field, $length = 250, $type = 'words', $elipses = '…') {

            $html = $field->kt();
            return Chopper::excerpt($html, $length, $type, $elipses);

        }
    ]

]);

class Chopper {
    public static function excerpt($text, $length = 250, $type = 'words', $elipses = '…') {
        $chopped = strip_tags($text, option('hashandsalt.chopper.keep'));

        if($type == 'words') {
            $field = TruncateHTML::truncateWords($chopped, $length, $elipses);
        } else {
            $field = TruncateHTML::truncateChars($chopped, $length, $elipses);
        }

        return $chopped;
    }
}
