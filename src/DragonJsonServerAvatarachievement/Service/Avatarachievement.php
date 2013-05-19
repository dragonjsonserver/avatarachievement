<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAvatarachievement
 */

namespace DragonJsonServerAvatarachievement\Service;

/**
 * Serviceklasse zur Verwaltung von Avatarherausforderungen
 */
class Avatarachievement
{
	use \DragonJsonServer\ServiceManagerTrait;
	use \DragonJsonServer\EventManagerTrait;
	use \DragonJsonServerDoctrine\EntityManagerTrait;

	/**
	 * Entfernt alle Avatarherausforderungen mit der AvatarID
	 * @param integer $avatar_id
	 * @return Avatarachievement
	 */
	public function removeAvatarachievementsByAvatarId($avatar_id)
	{
		$entityManager = $this->getEntityManager();
		
		$entityManager
			->createQuery('
				DELETE FROM \DragonJsonServerAvatarachievement\Entity\Avatarachievement avatarachievement
				WHERE avatarachievement.avatar_id = :avatar_id
			')
			->execute(['avatar_id' => $avatar_id]);
	}
	
	/**
	 * Gibt die Avatarherausforderung mit der AvatarID und dem Gamedesign Identifier zurück
	 * @param integer $avatar_id
	 * @param string $gamedesign_identifier
	 * @return \DragonJsonServerAvatarachievement\Entity\Avatarachievement
	 * @throws \DragonJsonServer\Exception
	 */
	public function getAvatarachievementByAvatarIdAndGamedesignIdentifier($avatar_id, $gamedesign_identifier)
	{
		$entityManager = $this->getEntityManager();
	
		$avatarachievement = $entityManager
			->getRepository('\DragonJsonServerAvatarachievement\Entity\Avatarachievement')
		    ->findOneBy(['avatar_id' => $avatar_id, 'gamedesign_identifier' => $gamedesign_identifier]);
		if (null === $avatarachievement) {
			$achievements = $this->getServiceManager()->get('Config')['dragonjsonserveravatarachievement']['achievements'];
			if (!in_array($gamedesign_identifier, $achievements)) {
				throw new \DragonJsonServer\Exception('invalid gamedesign_identifier', ['gamedesign_identifier' => $gamedesign_identifier]);
			}
			$avatarachievement = (new \DragonJsonServerAvatarachievement\Entity\Avatarachievement())
				->setAvatarId($avatar_id)
				->setGamedesignIdentifier($gamedesign_identifier);
		}
		return $avatarachievement;
	}

	/**
	 * Gibt die Avatarherausforderungen mit der AvatarID zurück
	 * @param integer $avatar_id
	 * @return array
	 */
	public function getAvatarachievementsByAvatarId($avatar_id)
	{
		$entityManager = $this->getEntityManager();
	
		return $entityManager
			->getRepository('\DragonJsonServerAvatarachievement\Entity\Avatarachievement')
		    ->findBy(['avatar_id' => $avatar_id]);
	}
	
	/**
	 * Aktualisiert die Avatarherausforderung mit den übergebenen Daten
	 * @param integer $avatar_id
	 * @param string $gamedesign_identifier
	 * @param mixed $data
	 * @return \DragonJsonServerAvatarachievement\Entity\Avatarachievement
	 */
	public function changeAvatarachievement($avatar_id, $gamedesign_identifier, $data)
	{
		$avatarachievement = $this->getAvatarachievementByAvatarIdAndGamedesignIdentifier($avatar_id, $gamedesign_identifier);
		$this->getServiceManager()->get('\DragonJsonServerAchievement\Service\Achievement')->changeAchievement($avatarachievement, $data);
		return $avatarachievement;
	}
}
