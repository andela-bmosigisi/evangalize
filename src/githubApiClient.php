<?php

namespace Burayan\Evangalize;

class GithubApiClient
{

    /**
     *  Github API root domain.
     *  @var string
     */
    protected static $api_domain = 'https://api.github.com';

    /**
     *  Connect to github and return the user details.
     *  @param string     $username
     *  @return string    $json
     */
    public static function getUser($username = null)
    {
        if (empty($username)) {
            throw new \InvalidArgumentException('Username required.');
        }
        $json = file_get_contents(
            self::$api_domain . '/users/' . $username,
            false,
            self::getStreamContext()
        );

        return $json;
    }

    /**
     *  Connect to github and return the repo number.
     *  @param string     $username
     *  @return int    $repos
     */
    public static function getRepos($username = null)
    {
        if (empty($username)) {
            throw new \InvalidArgumentException('Username required.');
        }
        $repos = file_get_contents(
            self::$api_domain . '/users/' . $username . '/repos',
            false,
            self::getStreamContext()
            );

        return $repos;
    }

    /**
     *  @return resource $context
     */
    public static function getStreamContext()
    {
        // Github fails (403) API requests which do not have a
        // user agent. This useragent string is for this particular 
        // application, according to RFC standards.
        // RFC link => http://tools.ietf.org/html/rfc7231#section-5.5.3
        $options  = [
                'http' => [
                    'user_agent' => 'BurayanEvangalize/1.0.0'
                ]
            ];
        return stream_context_create($options);
    }
}
