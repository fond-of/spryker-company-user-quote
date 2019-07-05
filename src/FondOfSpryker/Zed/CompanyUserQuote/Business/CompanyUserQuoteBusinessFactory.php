<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CompanyUserQuote\Business;

use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteExpander;
use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteExpanderInterface;
use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteReader;
use FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteReaderInterface;
use FondOfSpryker\Zed\CompanyUserQuote\CompanyUserQuoteDependencyProvider;
use FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeInterface;
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
        return new CompanyUserQuoteReader($this->getRepository(), $this->getQuoteExpanderPlugins());
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUserQuote\Business\Model\CompanyUserQuoteExpanderInterface
     */
    public function createCompanyUserQuoteExpander(): CompanyUserQuoteExpanderInterface
    {
        return new CompanyUserQuoteExpander($this->getCompanyUsersRestApiFacade());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeInterface
     */
    protected function getCompanyUsersRestApiFacade(): CompanyUserQuoteToCompanyUsersRestApiFacadeInterface
    {
        return $this->getProvidedDependency(CompanyUserQuoteDependencyProvider::FACADE_COMPANY_USERS_REST_API);
    }
}
