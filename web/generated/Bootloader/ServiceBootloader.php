<?php

declare(strict_types=1);

namespace GRPC\Bootloader;

use GRPC\Config\GRPCServicesConfig;
use GRPC\Services\Auth\v1\AuthServiceClient;
use GRPC\Services\Auth\v1\AuthServiceInterface;
use GRPC\Services\Payment\v1\PaymentServiceClient;
use GRPC\Services\Payment\v1\PaymentServiceInterface;
use GRPC\Services\Users\v1\UsersServiceClient;
use GRPC\Services\Users\v1\UsersServiceInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\EnvironmentInterface;
use Spiral\Config\ConfiguratorInterface;
use Spiral\Core\Container;
use Spiral\Core\InterceptableCore;
use Spiral\RoadRunnerBridge\GRPC\Interceptor\ServiceClientCore;

class ServiceBootloader extends Bootloader
{
    public function __construct(
        private readonly ConfiguratorInterface $config,
    ) {
    }

    public function init(EnvironmentInterface $env): void
    {
        $this->initConfig($env);
    }

    public function boot(Container $container): void
    {
        $this->initServices($container);
    }

    /**
     * Don't edit this method manually, it is generated by GRPC services generator.
     */
    private function initConfig(EnvironmentInterface $env): void
    {
        $this->config->setDefaults(
            GRPCServicesConfig::CONFIG,
            [
                'services' => [
                    UsersServiceClient::class => ['host' => $env->get('USERS_SERVICE_HOST', '127.0.0.1:9000')],
                    AuthServiceClient::class => ['host' => $env->get('AUTH_SERVICE_HOST', '127.0.0.1:9001')],
                    PaymentServiceClient::class => ['host' => $env->get('PAYMENT_SERVICE_HOST', '127.0.0.1:9002')],
                ],
            ]
        );
    }

    /**
     * Don't edit this method manually, it is generated by GRPC services generator.
     */
    private function initServices(Container $container): void
    {
        $container->bindSingleton(
            UsersServiceInterface::class,
            static function(GRPCServicesConfig $config) use($container): UsersServiceInterface
            {
                $service = $config->getService(UsersServiceClient::class);
                $core = new InterceptableCore(new ServiceClientCore(
                    $service['host'],
                    ['credentials' => $service['credentials'] ?? $config->getDefaultCredentials()]
                ));

                foreach ($config->getInterceptors() as $interceptor) {
                    $core->addInterceptor($container->get($interceptor));
                }

                return $container->make(UsersServiceClient::class, ['core' => $core]);
            }
        );
        $container->bindSingleton(
            AuthServiceInterface::class,
            static function(GRPCServicesConfig $config) use($container): AuthServiceInterface
            {
                $service = $config->getService(AuthServiceClient::class);
                $core = new InterceptableCore(new ServiceClientCore(
                    $service['host'],
                    ['credentials' => $service['credentials'] ?? $config->getDefaultCredentials()]
                ));

                foreach ($config->getInterceptors() as $interceptor) {
                    $core->addInterceptor($container->get($interceptor));
                }

                return $container->make(AuthServiceClient::class, ['core' => $core]);
            }
        );
        $container->bindSingleton(
            PaymentServiceInterface::class,
            static function(GRPCServicesConfig $config) use($container): PaymentServiceInterface
            {
                $service = $config->getService(PaymentServiceClient::class);
                $core = new InterceptableCore(new ServiceClientCore(
                    $service['host'],
                    ['credentials' => $service['credentials'] ?? $config->getDefaultCredentials()]
                ));

                foreach ($config->getInterceptors() as $interceptor) {
                    $core->addInterceptor($container->get($interceptor));
                }

                return $container->make(PaymentServiceClient::class, ['core' => $core]);
            }
        );
    }
}
