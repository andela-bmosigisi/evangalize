<?php

namespace Burayan\Evangalize;

use Burayan\Evangalize\GithubApiClient;

class EvangelistAnalysis
{

    /**
     *  Expects an evangelist object as a dependency.
     *  @param Evangelist $evangelist
     *  @return void
     */
    public function __construct(Evangelist $evangelist)
    {
        $this->evangelist = $evangelist;
    }

    /**
     *  Run analysis on the evangelist .
     *  @return void
     */
    public function init()
    {
        $username = $this->evangelist->getUsername();

        $user_json = GithubApiClient::getUser($username);
        $repos_json = GithubApiClient::getRepos($username);

        $user = json_decode($user_json, true);
        $repos = json_decode($repos_json, true);

        if (!empty($user['email'])) {
            $this->evangelist->setEmail($user['email']);
        }

        $repos = count($repos);
        if ($repos >= 5 && $repos <= 10) {
            $this->evangelist->setStatus('Junior Evangelist');
        }
        else if ($repos > 10 && $repos <= 20) {
            $this->evangelist->setStatus('Associate Evangelist');
        }
        else if ($repos > 21) {
            $this->evangelist->setStatus('Most Senior Evangelist');
        }
        else {
            $this->evangelist->setStatus('Not an Evangelist'); 
        }
    }

    public function getEvangelistStatus()
    {
        $status = $this->evangelist->getStatus();
        $sentences = [
            'I now dub thee, ' . $status . ' ooh coder one.',
            'You are most definetely among the ' . $status . ' ones.',
            'Hey, ' . $status . ' I hope you enjoy code.'
        ];

        return $sentences[rand(0, 2)];
    }
}
