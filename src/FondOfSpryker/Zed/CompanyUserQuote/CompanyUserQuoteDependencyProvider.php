<?php

declare(strict_types=1);

namespace FondOfSpryker\Zed\CompanyUserQuote;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Quote\QuoteDependencyProvider;

/**
 * @method \Spryker\Zed\Quote\QuoteConfig getConfig()
 */
class CompanyUserQuoteDependencyProvider extends QuoteDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        return $container;
    }
}
