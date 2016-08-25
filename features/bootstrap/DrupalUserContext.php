<?php

/**
 * @file
 *
 * @copyright Copyright (c) 2016 Palantir.net
 */

use Behat\Gherkin\Node\TableNode;
use Drupal\user\Entity\Role;
use Palantirnet\PalantirBehatExtension\Context\SharedDrupalContext;

class DrupalUserContext extends SharedDrupalContext {
  /**
   * Asserts a role has a list of permissions
   *
   * @Then the :role role should have the permission(s):
   *
   * @param String    $role_id
   * @param TableNode $perms
   *
   * @throws \Exception
   */
  public function assertRoleHasPermission($role_id = null, TableNode $perms) {
    // Get the role storage object so we can query it for permissions.
    /** @var Role $role */
    $role = Role::load($role_id);
    foreach ($perms->getHash() as $row) {
      // Check the permission against the role(s).
      if (false === $role->hasPermission($row['permission'])) {
        throw new Exception("User does not have \"{$row['permission']}\" permission");
      }
    }
  }
}
