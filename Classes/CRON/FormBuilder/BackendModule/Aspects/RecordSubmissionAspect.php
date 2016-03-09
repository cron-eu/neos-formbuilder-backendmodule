<?php
namespace CRON\FormBuilder\BackendModule\Aspects;

use CRON\FormBuilder\BackendModule\Domain\Model\FormElementValue;
use CRON\FormBuilder\BackendModule\Domain\Model\FormSubmission;
use CRON\FormBuilder\BackendModule\Domain\Repository\FormElementValueRepository;
use CRON\FormBuilder\BackendModule\Domain\Repository\FormSubmissionRepository;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Aop\JoinPointInterface;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;


/**
 * @Flow\Aspect
 */
class RecordSubmissionAspect {

	/**
	 * @Flow\InjectConfiguration(path="recordSubmissions")
	 * @var bool
	 */
	protected $recordSubmissions;

	/**
	 * @Flow\Inject
	 * @var FormSubmissionRepository
	 */
	protected $formSubmissionRepository;

	/**
	 * @Flow\Inject
	 * @var FormElementValueRepository
	 */
	protected $formElementValueRepository;

	/**
	 * Emails a notification about the placed order to customer
	 *
	 * @param \TYPO3\Flow\AOP\JoinPointInterface $joinPoint
	 * @Flow\After("method(CRON\FormBuilder\Controller\FormBuilderController->handleFormData())")
	 * @return void
	 */
	public function recordSubmission(JoinPointInterface $joinPoint) {

		if (!$this->recordSubmissions) return;

		/** @var NodeInterface $formNode */
		$formNode = $joinPoint->getMethodArgument('formNode');

		/* @var array $data */
		$data = $joinPoint->getMethodArgument('data');


		$formSubmission = new FormSubmission();

		$formSubmission->setNodeIdentifier($formNode->getIdentifier());
		$formSubmission->setCreatedAt(new \DateTime());

		$this->formSubmissionRepository->add($formSubmission);

		foreach($data as $key => $value) {
			$formElementValue = new FormElementValue();
			$formElementValue->setNodeIdentifier($key);
			$formElementValue->setValue(is_array($value) ? join(',',$value) : $value);
			$formElementValue->setFormSubmission($formSubmission);

			$this->formElementValueRepository->add($formElementValue);
		}



	}


}
