<?php

declare(strict_types=1);

namespace App\Endpoint\GRPC\Interceptor;

use GRPC\Services\Common\v1\Exception;
use Spiral\Core\CoreInterceptorInterface;
use Spiral\Core\CoreInterface;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;
use Spiral\RoadRunner\GRPC\StatusCode;

final class HandleExceptionsInterceptor implements CoreInterceptorInterface
{
    public function process(
        string $controller,
        string $action,
        array $parameters,
        CoreInterface $core,
    ): mixed {
        try {
            return $core->callAction($controller, $action, $parameters);
        } catch (\Throwable $e) {
            throw new GRPCException(
                message: $e->getMessage(),
                code: StatusCode::NOT_FOUND,
                details: [
                    new Exception([
                        'message' => $e->getMessage(),
                        'code' => $e->getCode(),
                        'class' => $e::class,
                    ]),
                ],
            );
        }
    }
}
