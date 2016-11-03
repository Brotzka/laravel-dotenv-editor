<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 29.07.16
 * Time: 08:03
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Exceptions
    |--------------------------------------------------------------------------
    |
    | Contains all exceptions which could be thrown through the class itself.
    |
    */
    'requested_value_not_available' => 'The value you requested does not exist!',
    'autobackup_wrong_value'        => 'Only true or false is accepted for this function!',
    'requested_backup_not_found'    => 'The backup you requested does not exist!',
    'no_backups_available'          => 'There are no available backups!',
    'backup_not_deletable'          => 'Backup could not be deleted because file was not found!',
    'array_needed'                  => 'Function does only accept an array!',
    'numeric_array_needed'          => 'Function does only accept a numeric array containing only the deletable keys!'
];
