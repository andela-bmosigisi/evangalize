<?php

namespace Burayan\Evangalize;

/**
 *  @author brian.mosigisi
 *  An object from this class represents a single
 *  Evangelist.
 */
class Evangelist
{
    /**
     *  Evangelist username.
     *  @var string
     */
    protected $username;

    /**
     *  @var string
     */
    protected $email = 'default@default.com';

     /**
     *  Evangelist status. Either Junior, Senior or Most Superior.
     *  @var string
     */
    protected $status;

    /**
     *  Create an envangelist, with given username.
     *  @param string  username
     *  @return void
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     *  Get the username.
     *  @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     *  Set the email address.
     *  @param string  $email
     *  @return void
     */
    public function setEmail($email)
    {
        // Check if the provided is a valid email address
        if (!preg_match(
            '/[a-zA-Z0-9_\-.\+]+@[a-zA-Z0-9\-]+.[a-zA-Z]+/',
            $email
        )) {
            throw new \InvalidArgumentException("Invalid Email Address.");
        }
        $this->email = $email;
    }

    /**
     *  Get the email address.
     *  @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *  Set the Evangelist status.
     *  @param string  $status
     *  @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     *  Set the email address.
     *  @return void
     */
    public function getStatus()
    {
        return $this->status;
    }
}
