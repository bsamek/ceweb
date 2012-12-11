<?php

/**
 * LDAP login module.
 *
 * @author Mark Tomko (c) 2010, Simmons College
 */
class LDAPAuthenticationStrategy implements IAuthenticationStrategy {
    protected $m_ldapServer;
    protected $m_baseOu;
    protected $m_error;

    function __construct($ldapServer, $baseOu) {
        $this->m_ldapServer = $ldapServer;
        $this->m_baseOu;
    }

    function authenticate($username, $password) {
        $ldap = new LDAP($this->m_ldapServer);

        $resourceId = $ldap->query($this->m_baseOu, "uid=$username");

        $numEntries = $ldap->countEntries($resourceId);
        if ($numEntries == 1) {
            $entry = $ldap->getFirstEntry($resourceId);
            $dn = $ldap->getDN($entry);

            if ($ldap->bind($dn, $password)) {
                return true;
            }
            else {
                $this->m_error = $ldap->error();
                return false;
            }
        }
        else {
            return false;
        }
    }

    function error() {
        return $this->m_error;
    }
}

/**
 * This class madels an LDAP server connection.  Rather than provide an
 * abstraction layer, its design is largely intended to provide a
 * "resource allocation is initialization" (RAII) model for an LDAP connection
 * to ensure that the connection is released (PHP has no try/finally).
 *
 * @author Mark Tomko (c) 2010, Simmons College
 */
class LDAP {
    protected $m_ldap;

    function __construct($server) {
        $this->m_ldap = ldap_connect($server);
        if ($this->m_ldap) {
            if (!ldap_bind($this->m_ldap)) {
                throw new Exception("Unable to bind to LDAP server $server");
            }
        }
    }

    function __destruct() {
        ldap_close($this->m_ldap);
    }

    function query($ou, $query) {
        return ldap_search($this->m_ldap, $ou, $query);
    }

    function countEntries($resourceId) {
        return ldap_count_entries($this->m_ldap, $resourceId);
    }

    function getFirstEntry($resourceId) {
        return ldap_first_entry($this->m_ldap, $resourceId);
    }

    function getDN($entry) {
        return ldap_get_dn($this->m_ldap, $entry);
    }

    function bind($dn, $password) {
        // suppress warning output - it will be handled elsewhere
        return @ldap_bind($this->m_ldap, $dn, $password);
    }

    function error() {
        return ldap_error($this->m_ldap);
    }
}

?>
