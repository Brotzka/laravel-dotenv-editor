<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 29.07.16
 * Time: 06:27
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'overview'  => 'Overview',
    'addnew'    => 'Add New',
    'backups'   => 'Backups',
    'upload'    => 'Upload',

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */
    'title'     => '.env-Editor',

    /*
    |--------------------------------------------------------------------------
    | View overview
    |--------------------------------------------------------------------------
    */
    'overview_title'                => 'Your current .env-file',
    'overview_text'                 => 'Here you can see the content of your current active .env.<br>Click <strong>load</strong> to show the content.',
    'overview_button'               => 'Load',
    'overview_table_key'            => 'Key',
    'overview_table_value'          => 'Value',
    'overview_table_options'        => 'Options',
    'overview_table_popover_edit'   => 'Edit entry',
    'overview_table_popover_delete' => 'Delete entry',
    'overview_delete_modal_text'    => 'Do you really want to delete this entry?',
    'overview_delete_modal_yes'     => 'Yes, delete entry',
    'overview_delete_modal_no'      => 'No, quit',
    'overview_edit_modal_title'     => 'Edit entry',
    'overview_edit_modal_save'      => 'Save',
    'overview_edit_modal_quit'      => 'Abort',
    'overview_edit_modal_value'     => 'New value',
    'overview_edit_modal_key'       => 'Key',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Add new key-value-pair',
    'addnew_text'       => 'Here you can add a new key-value-pair to your <strong>current</strong> .env-file.<br>To be sure, create a backup before under the backup-tab.',
    'addnew_label_key'  => 'Key',
    'addnew_label_value'=> 'Value',
    'addnew_button_add' => 'Add',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Save your current .env-file',
    'backup_create'                 => 'Create Backup',
    'backup_download'               => 'Download Current .env',
    'backup_title_two'              => 'Your available backups',
    'backup_restore_text'           => 'Here you can restore one of your available backups.',
    'backup_restore_warning'        => 'This overwrites your active .env! Be sure to backup your currently active .env-file!',
    'backup_no_backups'             => 'You have no backups available.',
    'backup_table_nr'               => 'Nr.',
    'backup_table_date'             => 'Date',
    'backup_table_options'          => 'Options',
    'backup_table_options_show'     => 'Show content of backup',
    'backup_table_options_restore'  => 'Restore this version',
    'backup_table_options_download' => 'Download this version',
    'backup_table_options_delete'   => 'Delete this version',
    'backup_modal_title'            => 'Content of backup',
    'backup_modal_key'              => 'Key',
    'backup_modal_value'            => 'Value',
    'backup_modal_close'            => 'Close',
    'backup_modal_restore'          => 'Restore',
    'backup_modal_delete'           => 'Delete',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Upload a backup',
    'upload_text'   => 'Here you can upload a backup from your computer.',
    'upload_warning'=> '<strong>Warning:</strong> This will override your currently active .env-file. Be sure, to create a backup before uploading.',
    'upload_label'  => 'Pick a file',
    'upload_button' => 'Upload',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'New key-value-pair was successfully added to your .env!',
    'entry_edited'      => 'Key-value-pair was edited successfully!',
    'entry_deleted'     => 'Key-value-pair was deleted successfully!',
    'delete_entry'      => 'Delete an entry',
    'backup_created'    => 'New backup was created successfully!',
    'backup_restored'   => 'Backup was restored successfully!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'Backup was deleted successfully!',
    'controller_backup_created' => 'Backup was created successfully!'
];
