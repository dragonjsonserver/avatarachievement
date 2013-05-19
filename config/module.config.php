<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAvatarachievement
 */

/**
 * @return array
 */
return [
	'dragonjsonserveravatarachievement' => [
		'achievements' => [],
	],
	'dragonjsonserver' => [
	    'apiclasses' => [
	        '\DragonJsonServerAvatarachievement\Api\Avatarachievement' => 'Avatarachievement',
	    ],
	],
	'service_manager' => [
		'invokables' => [
            '\DragonJsonServerAvatarachievement\Service\Avatarachievement' => '\DragonJsonServerAvatarachievement\Service\Avatarachievement',
		],
	],
	'doctrine' => [
		'driver' => [
			'DragonJsonServerAvatarachievement_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [
					__DIR__ . '/../src/DragonJsonServerAvatarachievement/Entity'
				],
			],
			'orm_default' => [
				'drivers' => [
					'DragonJsonServerAvatarachievement\Entity' => 'DragonJsonServerAvatarachievement_driver'
				],
			],
		],
	],
];
