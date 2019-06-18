<?php

namespace App\Listener;


use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpFoundation\HeaderBag;

class AuthenticationHeaderListener
{
    public function onKernelRequest( RequestEvent $request)
    {

        $this->fixAuthHeader($request->getRequest()->headers);
    }

    protected function fixAuthHeader(HeaderBag $headers)
    {
        if (!$headers->has('Authorization') && function_exists('apache_request_headers')) {

            $all = apache_request_headers();

            if (isset($all['Authorization'])) {
                $headers->set('Authorization', $all['Authorization']);
            }
        }
    }
}

