<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAvatarachievement
 */

namespace DragonJsonServerAvatarachievement\Entity;

/**
 * Entityklasse einer Avatarherausforderung
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="avatarachievements")
 */
class Avatarachievement extends \DragonJsonServerAchievement\Entity\AbstractAchievement
	implements \DragonJsonServerAchievement\Entity\LevelInterface
{
	use \DragonJsonServerAvatar\Entity\AvatarIdTrait;
	use \DragonJsonServerAchievement\Entity\LevelTrait;
	
	/**
	 * @Doctrine\ORM\Mapping\Id 
	 * @Doctrine\ORM\Mapping\Column(type="integer")
	 * @Doctrine\ORM\Mapping\GeneratedValue
	 **/
	protected $avatarachievement_id;
	
	/**
	 * Setzt die ID der Avatarherausforderung
	 * @param integer $avatarachievement_id
	 * @return Avatarachievement
	 */
	protected function setAvatarachievementId($avatarachievement_id)
	{
		$this->avatarachievement_id = $avatarachievement_id;
		return $this;
	}
	
	/**
	 * Gibt die ID der Avatarherausforderung zurück
	 * @return integer
	 */
	public function getAvatarachievementId()
	{
		return $this->avatarachievement_id;
	}
	
	/**
	 * Setzt die Attribute der Avatarherausforderung aus dem Array
	 * @param array $array
	 * @return Avatarachievement
	 */
	public function fromArray(array $array)
	{
		return parent::fromArray($array)
			->setAvatarachievementId($array['avatarachievement_id'])
			->setAvatarId($array['avatar_id']);
	}
	
	/**
	 * Gibt die Attribute der Avatarherausforderung als Array zurück
	 * @return array
	 */
	public function toArray()
	{
		return parent::toArray() + [
			'avatarachievement_id' => $this->getAvatarachievementId(),
			'avatar_id' => $this->getAvatarId(),
		];
	}
}
