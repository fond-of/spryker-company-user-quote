<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CompanyUserQuote;

use FondOfSpryker\Zed\CompanyUserQuote\Dependency\Facade\CompanyUserQuoteToCompanyUsersRestApiFacadeBridge;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Quote\QuoteDependencyProvider;

/**
 * @method \Spryker\Zed\Quote\QuoteConfig getConfig()
 */
class CompanyUserQuoteDependencyProvider extends QuoteDependencyProvider
{
    public const FACADE_COMPANY_USERS_REST_API = 'FACADE_COMPANY_USERS_REST_API';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCompanyUsersRestApiFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyUsersRestApiFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY_USERS_REST_API] = function (Container $container) {
            return new CompanyUserQuoteToCompanyUsersRestApiFacadeBridge(
                $container->getLocator()->companyUsersRestApi()->facade()
            );
        };

        return $container;
    }
}
