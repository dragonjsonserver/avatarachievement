<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAvatarachievement
 */

namespace DragonJsonServerAvatarachievement\Api;

/**
 * API Klasse zur Verwaltung von Avatarherausforderungen
 */
class Avatarachievement
{
	use \DragonJsonServer\ServiceManagerTrait;

	/**
	 * Gibt die Avatarherausforderungen des aktuellen Avatars zurück
	 * @return array
	 * @DragonJsonServerAccount\Annotation\Session
	 * @DragonJsonServerAvatar\Annotation\Avatar
	 */
	public function getAvatarachievements()
	{
		$serviceManager = $this->getServiceManager();

		$avatar = $serviceManager->get('\DragonJsonServerAvatar\Service\Avatar')->getAvatar();
		$avatarachievements = $serviceManager->get('\DragonJsonServerAvatarachievement\Service\Avatarachievement')->getAvatarachievementsByAvatarId($avatar->getAvatarId()); 
		return $serviceManager->get('\DragonJsonServerDoctrine\Service\Doctrine')->toArray($avatarachievements);
	}
}
