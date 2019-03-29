<?php

declare(strict_types=1);

namespace FondOfSpryker\Zed\CompanyUserQuote\Business;

use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteReaderInterface;
use FondOfSpryker\Zed\Quote\Business\Model\CompanyUserQuoteReader;
use Spryker\Zed\Quote\Business\QuoteBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuoteEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\CompanyUserQuote\Persistence\CompanyUserQuoteRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\CompanyUserQuote\CompanyUserQuoteConfig getConfig()
 */
class CompanyUserQuoteBusinessFactory extends QuoteBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteReaderInterface
     */
    public function createCompanyUserQuoteReader(): CompanyUserQuoteReaderInterface
    {
        return new CompanyUserQuoteReader(
            $this->getRepository(),
            $this->getQuoteExpanderPlugins()
        );
    }
}
