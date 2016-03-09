<?php
namespace CRON\FormBuilder\BackendModule\Domain\Model;

use CRON\FormBuilder\BackendModule\Traits\FormNodeTrait;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* @Flow\Entity
* @ORM\Table(indexes={@ORM\Index(columns={"value"})})
*/
class FormElementValue {

	use FormNodeTrait;

	/**
	 * @var \CRON\FormBuilder\BackendModule\Domain\Model\FormSubmission
	 * @ORM\ManyToOne(inversedBy="formElementValues")
	 * @ORM\JoinColumn(onDelete="CASCADE")
	 */
	protected $formSubmission;

	/**
	 * @var string
	 * @Flow\Validate(type="NotEmpty", validationGroups={"Persistence"})
	 */
	protected $nodeIdentifier;

	/**
	 * @var string
	 */
	protected $value;



	/**
	 * @return \CRON\FormBuilder\BackendModule\Domain\Model\FormSubmission
	 */
	public function getFormSubmission() {

		return $this->formSubmission;
	}



	/**
	 * @param \CRON\FormBuilder\BackendModule\Domain\Model\FormSubmission $formSubmission
	 */
	public function setFormSubmission($formSubmission) {

		$this->formSubmission = $formSubmission;
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
	 * @return string
	 */
	public function getValue() {

		return $this->value;
	}



	/**
	 * @param string $value
	 */
	public function setValue($value) {

		$this->value = $value;
	}




}
