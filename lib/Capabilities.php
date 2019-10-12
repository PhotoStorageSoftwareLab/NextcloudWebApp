<?php
namespace OCA\PhotoStorage;

use OCP\Capabilities\ICapability;
use OCP\IURLGenerator;

class Capabilities implements ICapability {

	/** @var IURLGenerator */
	private $urlGenerator;

	public function __construct(IURLGenerator $urlGenerator) {
		$this->urlGenerator = $urlGenerator;
	}

	public function getCapabilities() {
		return [
			'photostorage' => [
				'enabled' => true,
				'upload' => [
					'files' => [
						'url' => $this->urlGenerator->linkToRouteAbsolute('photostorage.drop.upload'),
						'param' => 'data',
					],
				]
			],
		];
	}

}
