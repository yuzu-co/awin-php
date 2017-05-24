<?php

namespace Yuzu\Awin;

use Yuzu\Awin\Http\Response;
use Yuzu\Awin\Request\GetAccountDefinition;
use Yuzu\Awin\Request\GetProgrammeDetailDefinition;
use Yuzu\Awin\Request\GetProgrammesDefinition;
use Yuzu\Awin\Request\RequestDefinitionInterface;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class Client
{
    private $endpoint = 'https://api.awin.com';

    private $apiToken;

    protected $httpClient;

    /**
     * Constructor.
     * @param $apiToken
     */
    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function getClient()
    {
        if (empty($this->httpClient)) {
            $this->httpClient = new GuzzleClient([
                'base_uri' => $this->endpoint,
                'headers' => ['Authorization' => sprintf('Bearer %s', $this->apiToken)]
            ]);
        }
        
        return $this->httpClient;
    }

    private function send(RequestDefinitionInterface $definition)
    {
        $response = $this->getClient()->request(
            $definition->getMethod(),
            $definition->getUrl(),
            [
                'body' => json_encode($definition->getBody())
            ]
        );

        return new Response($response->getStatusCode(), $response->getBody()->getContents());
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_accounts
     * @param array $options
     * @return Response
     */
    public function getAccounts(array $options = [])
    {
        return $this->send(new GetAccountDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmes
     * @param $publisherId
     * @param array $options
     * @return Http\Response
     */
    public function getProgrammes($publisherId, array $options = [])
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetProgrammesDefinition($options));
    }

    /**
     * @doc http://wiki.awin.com/index.php/API_get_programmedetails
     * @param $publisherId
     * @param array $options
     * @return Response
     */
    public function getProgrammeDetail($publisherId, array $options = [])
    {
        $options['publisherId'] = $publisherId;

        return $this->send(new GetProgrammeDetailDefinition($options));
    }
}
