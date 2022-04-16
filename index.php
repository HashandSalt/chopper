<?php

load([
    'hashandsalt\\chopper\\chopper' => 'src/Chopper.php'
], __DIR__);

use HashAndSalt\Chopper\Chopper;

Kirby::plugin('hashandsalt/chopper', [
   

    'options' => [
        'ellipsis' => '…',
        'exact' => true,
        'html' => true,
        'trimWidth' => false,
        'keep' => '<p><a><strong><em><sub><sup><blockquote><figure><img><h1><h2><h3><h4><h5><h6>',
    ],

    'fieldMethods' => [
		'chopper' => function ($field, $length = 250, $options = []) {
            
            $options += [
                'ellipsis' => option('hashandsalt.chopper.ellipsis'), 'exact' => option('hashandsalt.chopper.exact'), 'html' => option('hashandsalt.chopper.html'), 'trimWidth' => option('hashandsalt.chopper.trimWidth'),
            ];

            $chopper = $field->kt();
            $field = Chopper::truncate($chopper, $length, $options);

            $field = strip_tags($field, option('hashandsalt.chopper.keep'));

            return $field;		
	}
 ]

]);
