<?php

namespace MegaKit\Huawei\PushKit\Contracts;

use MegaKit\Huawei\PushKit\Data\Http\HttpRequest;
use MegaKit\Huawei\PushKit\Data\Http\HttpResponse;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiHttpException;

interface HttpClient
{
    /**
     * @param HttpRequest $request
     * @return HttpResponse
     * @throws HuaweiHttpException
     */
    public function sendRequest(HttpRequest $request): HttpResponse;
}
