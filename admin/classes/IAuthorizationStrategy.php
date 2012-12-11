<?php

/**
 * This interface represents an authorization strategy; that is, a mechanism
 * by which a program may determine whether a particular user is permitted to
 * perform an action.  Here, actions are represented by a name to avoid the
 * need for domain-specific types.
 *
 * Implementing classes should avoid side-effects.
 *
 * @author Mark Tomko, (c) 2010 Simmons College
 */
interface IAuthorizationStrategy {
    /**
     * Returns true iff the user is authorized to perform the action.
     * @param string $user
     * @param string $action
     */
    function isAuthorized($user, $action);
}

?>