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

		$avatar = $serviceManager->get('Avatar')->getAvatar();
		$avatarachievements = $serviceManager->get('Avatarachievement')->getAvatarachievementsByAvatarId($avatar->getAvatarId()); 
		return $serviceManager->get('Doctrine')->toArray($avatarachievements);
	}
}
