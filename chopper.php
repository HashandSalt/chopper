<?php
/**
 *
 * Chopper Plugin for Kirby 2
 *
 * @version   1.0.0
 * @author    James Steel <https://hashandsalt.com>
 * @copyright James Steel <https://hashandsalt.com>
 * @link      https://github.com/HashandSalt/chopper
 * @license   MIT <http://opensource.org/licenses/MIT>
 */

require('lib/DOMLettersIterator.php');
require('lib/DOMWordsIterator.php');
require('lib/TruncateHTML.php');

field::$methods['chopper'] = function($field, $length = 250, $type = 'words', $elipses = '…') {

	$options = array(
		'html' => $field,
		'length' => $length,
		'type' => $type, // also 'words'
		'elipses' => $elipses
	);

	$result = '';

	switch ($options['type']) {
		case 'chars':
			$result = TruncateHTML::truncateChars($options['html']->kirbytext(), $options['length'], $options['elipses']);
			break;
		default:
			$result = TruncateHTML::truncateWords($options['html']->kirbytext(), $options['length'], $options['elipses']);
			break;
	}

	$keep = c::get('chopper.keep', '<p><a><strong><em><sub><sup><blockquote><figure><img><h1><h2><h3><h4><h5><h6>');

	$result = strip_tags($result, $keep);

	return $result;
};
