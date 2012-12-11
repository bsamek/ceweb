<?php

/**
 * This interface represents classes that can verify that a given username
 * identifies with a given password.  Instances of this class do not
 * necessarily constitute an authentication workflow; therefore,
 * implementing classes should avoid side-effects.
 *
 * @author Mark Tomko, (c) 2010 Simmons College
 */
interface IAuthenticationStrategy {
    function authenticate($username, $password);
}

?>