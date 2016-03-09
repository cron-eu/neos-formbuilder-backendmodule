<?php
namespace CRON\FormBuilder\BackendModule\Controller;

use CRON\FormBuilder\BackendModule\Domain\Model\FormSubmission;
use CRON\FormBuilder\BackendModule\Domain\Repository\FormSubmissionRepository;
use TYPO3\Neos\Controller\Module\AbstractModuleController;
use TYPO3\Flow\Annotations as Flow;

class FormSubmissionController extends AbstractModuleController {

	/**
	 * @Flow\Inject
	 * @var FormSubmissionRepository
	 */
	protected $formSubmissionRepository;

	public function indexAction() {
		$this->view->assign('formSubmissions', $this->formSubmissionRepository->findAll());
	}



	/**
	 * @param FormSubmission $formSubmission
	 */
	public function showAction($formSubmission) {
		$this->view->assign('formSubmission', $formSubmission);
	}



	/**
	 *
	 * @param FormSubmission $formSubmission
	 */
	public function deleteAction($formSubmission) {
		$this->formSubmissionRepository->remove($formSubmission);
		$this->redirect('index');
	}
}
