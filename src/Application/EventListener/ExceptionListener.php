<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof \TypeError) {
            $message = sprintf(
                '%s with code: %s',
                $exception->getMessage(),
                $exception->getCode()
            );

            $response = new Response();
            $response->setContent($message);

            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            $event->setResponse($response);
        }
    }
}
