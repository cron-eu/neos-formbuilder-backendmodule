<?php
namespace CRON\FormBuilder\BackendModule\Traits;

use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\Flow\Annotations as Flow;

trait FormNodeTrait {

	/**
	 * @Flow\Transient
	 * @var NodeInterface
	 */
	protected $node;

	/**
	 * @Flow\Transient
	 * @Flow\Inject
	 * @var \CRON\FormBuilder\Service\SiteService
	 */
	protected $siteService;


	/**
	 * @return null|object|\TYPO3\TYPO3CR\Domain\Model\NodeInterface
	 */
	public function getNode() {

		if ($this->node === NULL && !empty($this->getNodeIdentifier())) {
			$this->node = $this->siteService->getSiteNode()->getContext()->getNodeByIdentifier($this->getNodeIdentifier());
		}

		return $this->node;
	}
}
