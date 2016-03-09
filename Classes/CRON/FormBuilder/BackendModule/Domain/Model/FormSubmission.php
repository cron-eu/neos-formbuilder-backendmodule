<?php
namespace CRON\FormBuilder\BackendModule\Domain\Model;

use CRON\FormBuilder\BackendModule\Traits\FormNodeTrait;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class FormSubmission {

	use FormNodeTrait;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\CRON\FormBuilder\BackendModule\Domain\Model\FormElementValue>
	 * @ORM\OneToMany(mappedBy="formSubmission")
	 */
	protected $formElementValues;

	/**
	 * @var string
	 * @Flow\Validate(type="NotEmpty", validationGroups={"Persistence"})
	 */
	protected $nodeIdentifier;

	/**
	 * @var \DateTime
	 * @Flow\Validate(type="NotEmpty", validationGroups={"Persistence"})
	 */
	protected $createdAt;



	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFormElementValues() {

		return $this->formElementValues;
	}



	/**
	 * @param \Doctrine\Common\Collections\Collection $formElementValues
	 */
	public function setFormElementValues($formElementValues) {

		$this->formElementValues = $formElementValues;
	}



	/**
	 * @return string
	 */
	public function getNodeIdentifier() {

		return $this->nodeIdentifier;
	}



	/**
	 * @param string $nodeIdentifier
	 */
	public function setNodeIdentifier($nodeIdentifier) {

		$this->nodeIdentifier = $nodeIdentifier;
	}



	/**
	 * @return \DateTime
	 */
	public function getCreatedAt() {

		return $this->createdAt;
	}



	/**
	 * @param \DateTime $createdAt
	 */
	public function setCreatedAt($createdAt) {

		$this->createdAt = $createdAt;
	}




}
