<?php

declare(strict_types=1);

namespace FondOfSpryker\Zed\CompanyUserQuote\Business;

use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Zed\Quote\Business\QuoteFacadeInterface;

interface CompanyUserQuoteFacadeInterface extends QuoteFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getCompanyUserQuoteCollection(QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): QuoteCollectionTransfer;
}
