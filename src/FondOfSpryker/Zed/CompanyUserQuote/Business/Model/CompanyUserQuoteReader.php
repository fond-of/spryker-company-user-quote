<?php

declare(strict_types=1);

namespace FondOfSpryker\Zed\Quote\Business\Model;

use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteReaderInterface;
use FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuoteRepositoryInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Zed\Quote\Business\Model\QuoteReader;

class CompanyUserQuoteReader extends QuoteReader implements CompanyUserQuoteReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuoteRepositoryInterface
     */
    protected $companyUserQuoteRepository;

    /**
     * @param \FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuoteRepositoryInterface $companyUserQuoteRepository
     * @param \Spryker\Zed\QuoteExtension\Dependency\Plugin\QuoteExpanderPluginInterface[] $quoteExpanderPlugins
     */
    public function __construct(CompanyUserQuoteRepositoryInterface $companyUserQuoteRepository, array $quoteExpanderPlugins)
    {
        parent::__construct($companyUserQuoteRepository, $quoteExpanderPlugins);
        $this->companyUserQuoteRepository = $companyUserQuoteRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getFilteredCompanyUserQuoteCollection(QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): QuoteCollectionTransfer
    {
        $quoteCollectionTransfer = $this->companyUserQuoteRepository->filterQuoteCollection($quoteCriteriaFilterTransfer);
        $quoteCollectionTransfer = $this->executeExpandQuotePluginsForQuoteCollection($quoteCollectionTransfer);

        return $quoteCollectionTransfer;
    }
}
