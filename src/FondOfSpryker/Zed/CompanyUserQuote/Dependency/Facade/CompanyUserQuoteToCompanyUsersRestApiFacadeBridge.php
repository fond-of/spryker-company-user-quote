<?php

namespace FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade;

use FondOfSpryker\Zed\CompanyUsersRestApi\Business\CompanyUsersRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyUserResponseTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;

class CompanyUserQuoteToCompanyUsersRestApiFacadeBridge implements CompanyUserQuoteToCompanyUsersRestApiFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUsersRestApi\Business\CompanyUsersRestApiFacadeInterface
     */
    protected $companyUsersRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyUsersRestApi\Business\CompanyUsersRestApiFacadeInterface $companyUsersRestApiFacade
     */
    public function __construct(CompanyUsersRestApiFacadeInterface $companyUsersRestApiFacade)
    {
        $this->companyUsersRestApiFacade = $companyUsersRestApiFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserResponseTransfer
     */
    public function findCompanyUserByCompanyUserReference(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyUserResponseTransfer {
        return $this->companyUsersRestApiFacade->findCompanyUserByCompanyUserReference($companyUserTransfer);
    }
}
