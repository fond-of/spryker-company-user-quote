<?php

namespace FondOfSpryker\Zed\CompanyUserQuote\Business\Model;

use FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class CompanyUserQuoteExpander implements CompanyUserQuoteExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeInterface
     */
    protected $companyUsersRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeInterface $companyUsersRestApiFacade
     */
    public function __construct(CompanyUserQuoteToCompanyUsersRestApiFacadeInterface $companyUsersRestApiFacade)
    {
        $this->companyUsersRestApiFacade = $companyUsersRestApiFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function expand(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        if ($quoteTransfer->getCompanyUser() !== null || $quoteTransfer->getCompanyUserReference() === null) {
            return $quoteTransfer;
        }

        $companyUserTransfer = (new CompanyUserTransfer())
            ->setCompanyUserReference($quoteTransfer->getCompanyUserReference());

        $companyUserResponseTransfer = $this->companyUsersRestApiFacade
            ->findCompanyUserByCompanyUserReference($companyUserTransfer);

        $companyUserTransfer = $companyUserResponseTransfer->getCompanyUser();

        if ($companyUserResponseTransfer->getIsSuccessful() === false || $companyUserTransfer === null) {
            return $quoteTransfer;
        }

        return $quoteTransfer->setCompanyUser($companyUserTransfer);
    }
}
