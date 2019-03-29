<?php

declare(strict_types=1);

namespace FondOfSpryker\Zed\CompanyUserQuote\Persistence;

use DateTime;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Orm\Zed\Quote\Persistence\SpyQuoteQuery;
use Spryker\Zed\Quote\Persistence\QuoteRepository;

/**
 * @method \FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuotePersistenceFactory getFactory()
 */
class CompanyUserQuoteRepository extends QuoteRepository implements CompanyUserQuoteRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function filterCompanyUserQuoteCollection(QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): QuoteCollectionTransfer
    {
        $quoteQuery = $this->getFactory()
            ->createQuoteQuery()
            ->joinWithSpyStore();

        $quoteQuery = $this->applyCompanyUserQuoteCriteriaFilters($quoteQuery, $quoteCriteriaFilterTransfer);
        $quoteEntityCollectionTransfer = $this->buildQueryFromCriteria($quoteQuery, $quoteCriteriaFilterTransfer->getFilter())->find();

        $quoteCollectionTransfer = new QuoteCollectionTransfer();
        $quoteMapper = $this->getFactory()->createQuoteMapper();
        foreach ($quoteEntityCollectionTransfer as $quoteEntityTransfer) {
            $quoteCollectionTransfer->addQuote($quoteMapper->mapQuoteTransfer($quoteEntityTransfer));
        }

        return $quoteCollectionTransfer;
    }

    /**
     * @param \Orm\Zed\Quote\Persistence\SpyQuoteQuery $quoteQuery
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Orm\Zed\Quote\Persistence\SpyQuoteQuery
     */
    protected function applyCompanyUserQuoteCriteriaFilters(SpyQuoteQuery $quoteQuery, QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): SpyQuoteQuery
    {
        $quoteQuery = $this->applyQuoteCriteriaFilters($quoteQuery, $quoteCriteriaFilterTransfer);

        if ($quoteCriteriaFilterTransfer->getCompanyUserReference()) {
            $quoteQuery->filterByCompanyUserReference($quoteCriteriaFilterTransfer->getCompanyUserReference());
        }

        return $quoteQuery;
    }
}
