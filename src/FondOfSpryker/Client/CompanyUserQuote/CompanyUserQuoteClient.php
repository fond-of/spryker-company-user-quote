<?php

declare(strict_types = 1);

namespace FondOfSpryker\Client\CompanyUserQuote;

use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CompanyUserQuote\CompanyUserQuoteFactory getFactory()
 */
class CompanyUserQuoteClient extends AbstractClient implements CompanyUserQuoteClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getCompanyUserQuoteCollectionByCriteria(QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): QuoteCollectionTransfer
    {
        return $this->getFactory()
            ->createZedCompanyUserQuoteStub()
            ->getCompanyUserQuoteCollectionByCriteria($quoteCriteriaFilterTransfer);
    }
}
