<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-events
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileEvents\Domain\Model\Dto\Request;

trait RequestArgumentIdentifierTrait
{
    protected string $requestArgumentIdentifier = '';

    /**
     * @return string
     */
    public function getRequestArgumentIdentifier(): string
    {
        return $this->requestArgumentIdentifier;
    }

    /**
     * @param string $requestArgumentIdentifier
     */
    public function setRequestArgumentIdentifier($requestArgumentIdentifier = ''): void
    {
        $this->requestArgumentIdentifier = $requestArgumentIdentifier;
    }
}
