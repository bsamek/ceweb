<?php

/**
 * This implementation of the IAuthorizationStrategy interface represents
 * a fixed strategy based on a table.  Each known user has a list of
 * authorized actions.  Unknown users or actions are rejected.
 *
 * @author Mark Tomko, (c) 2010 Simmons College
 */
class FixedAuthorizationStrategy implements IAuthorizationStrategy {
    protected $m_userActions;

    /**
     * Constructs a new FixedAuthorizationStrategy based on the provided
     * table of authorized user actions.  The table takes the form of an
     * associative array whose keys are known user names and whose values
     * are arrays containing the names of authorized actions.
     * @param array $userActions
     */
    function __construct(array $userActions) {
        $this->m_userActions = $userActions;
    }

    public function isAuthorized($user, $action) {
        if (array_key_exists($user, $this->m_userActions)) {
            return in_array($action, $this->m_userActions[$user]);
        }
        return false;
    }
}

?>
