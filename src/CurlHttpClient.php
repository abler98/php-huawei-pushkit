<?php

namespace MegaKit\Huawei\PushKit;

use MegaKit\Huawei\PushKit\Contracts\HttpClient;
use MegaKit\Huawei\PushKit\Data\Http\HttpRequest;
use MegaKit\Huawei\PushKit\Data\Http\HttpResponse;
use MegaKit\Huawei\PushKit\Exceptions\HuaweiHttpException;

class CurlHttpClient implements HttpClient
{
    /**
     * @var HttpConfig
     */
    private $config;

    /**
     * CurlHttpClient constructor.
     * @param HttpConfig $config
     */
    public function __construct(HttpConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @param HttpRequest $request
     * @return HttpResponse
     * @throws HuaweiHttpException
     */
    public function sendRequest(HttpRequest $request): HttpResponse
    {
        $url = $request->getUrl();

        if (! empty($request->getQuery())) {
            $url .= '?' . $this->formatQueryParams($request->getQuery());
        }

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_TIMEOUT => $this->config->getTimeout(),
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $headers = $request->getHeaders() ?? [];

        if (! empty($request->getJson())) {
            $headers['Content-Type'] = 'application/json';

            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $this->formatJsonBody($request->getJson()),
            ]);
        }

        else if (! empty($request->getBody())) {
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';

            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $this->formatQueryParams($request->getBody()),
            ]);
        }

        if (! empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->formatRequestHeaders($headers));
        }

        $proxy = $this->config->getProxy();

        if (! is_null($proxy)) {
            curl_setopt_array($ch, [
                CURLOPT_PROXY => $proxy,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
        }

        $responseBody = curl_exec($ch);

        $error = curl_error($ch);
        $errno = curl_errno($ch);
        $isError = $errno !== CURLE_OK;

        if (! $isError) {
            $statusCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        } else {
            $statusCode = null;
        }

        if (is_resource($ch)) {
            curl_close($ch);
        }

        if ($isError) {
            throw new HuaweiHttpException("Request error: $error ($errno)", $errno);
        }

        return new HttpResponse($statusCode, $responseBody);
    }

    /**
     * @param array $params
     * @return string
     */
    private function formatQueryParams(array $params): string
    {
        return http_build_query($params);
    }

    /**
     * @param array $headers
     * @return array
     */
    private function formatRequestHeaders(array $headers): array
    {
        $result = [];

        foreach ($headers as $key => $value) {
            $result[] = "$key: $value";
        }

        return $result;
    }

    /**
     * @param array $json
     * @return string
     */
    private function formatJsonBody(array $json): string
    {
        return json_encode($json);
    }
}
