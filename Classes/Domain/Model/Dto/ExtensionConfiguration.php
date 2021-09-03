<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-events
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileEvents\Domain\Model\Dto;

use Exception;
use Slub\SlubProfileEvents\Utility\ConstantsUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration as CoreExtensionConfiguration;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ExtensionConfiguration implements SingletonInterface
{
    protected string $requestUrl;

    public function __construct()
    {
        $configuration = $this->getConfiguration(ConstantsUtility::EXTENSION_KEY);

        if (count($configuration) > 0) {
            $this->setRequestUrl($configuration['requestUrl']);
        }
    }

    /**
     * @return string
     */
    public function getRequestUrl(): string
    {
        return $this->requestUrl;
    }

    /**
     * @param string $requestUrl
     */
    public function setRequestUrl($requestUrl = ''): void
    {
        $this->requestUrl = $requestUrl;
    }

    /**
     * @param string $extensionKey
     * @return array
     */
    protected function getConfiguration($extensionKey = ''): array
    {
        /** @var CoreExtensionConfiguration $coreExtensionConfiguration */
        $coreExtensionConfiguration = GeneralUtility::makeInstance(CoreExtensionConfiguration::class);

        try {
            return $coreExtensionConfiguration->get($extensionKey);
        } catch (Exception $e) {
            return [];
        }
    }
}
