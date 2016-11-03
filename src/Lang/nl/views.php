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
    'overview'  => 'Overzicht',
    'addnew'    => 'Toevoegen',
    'backups'   => 'Backups',
    'upload'    => 'Uploaden',

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
    'overview_title'                => ' .env-file',
    'overview_text'                 => 'Hier kunt u de inhoud van uw huidige actieve .env zien. <br> Klik op <strong> laden </strong> om de inhoud te laten zien.',
    'overview_button'               => 'Laden',
    'overview_table_key'            => 'Sleutel',
    'overview_table_value'          => 'Waarde',
    'overview_table_options'        => 'Opties',
    'overview_table_popover_edit'   => 'Wijzig waarde',
    'overview_table_popover_delete' => 'Verwijder waarde',
    'overview_delete_modal_text'    => 'Bent u zeker dat u deze waarde wilt verwijderen?',
    'overview_delete_modal_yes'     => 'Ja, Verwijder waarde',
    'overview_delete_modal_no'      => 'Nee, eindig',
    'overview_edit_modal_title'     => 'Wijzig waarde',
    'overview_edit_modal_save'      => 'Opslaan',
    'overview_edit_modal_quit'      => 'Annuleren',
    'overview_edit_modal_value'     => 'Nieuwe waarde',
    'overview_edit_modal_key'       => 'Sleutel',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Voeg een nieuwe sleutel en waarde toe.',
    'addnew_text'       => 'Hier kunt u een nieuwe sleutel-waarde-paar toe te voegen aan uw <strong> actuele </strong> .env-file. <br> Om zeker te zijn, voordat een back-up in het kader van de back-up-tabblad.',
    'addnew_label_key'  => 'Sleutel',
    'addnew_label_value'=> 'Waarde',
    'addnew_button_add' => 'Toevoegen',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Sla uw huidige .env bastand op.',
    'backup_create'                 => 'créér een Backup',
    'backup_download'               => 'Download Current .env',
    'backup_title_two'              => 'Your available backups',
    'backup_restore_text'           => 'Here you can restore one of your available backups.',
    'backup_restore_warning'        => 'This overwrites your active .env! Be sure to backup your currently active .env-file!',
    'backup_no_backups'             => 'You have no backups available.',
    'backup_table_nr'               => 'Nr.',
    'backup_table_date'             => 'Datum',
    'backup_table_options'          => 'Opties',
    'backup_table_options_show'     => 'Geef inhoud van de backup weer.',
    'backup_table_options_restore'  => 'Restore this version',
    'backup_table_options_download' => 'Download deze versie',
    'backup_table_options_delete'   => 'Verwijder deze version',
    'backup_modal_title'            => 'Inhoud van de backup',
    'backup_modal_key'              => 'Sleutel',
    'backup_modal_value'            => 'Waarde',
    'backup_modal_close'            => 'Sluit',
    'backup_modal_restore'          => 'Herstel',
    'backup_modal_delete'           => 'Verwijder',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Upload een backip',
    'upload_text'   => 'Hier kunt een backup uploaden vanaf jouw computer.',
    'upload_warning'=> '<strong>Waarschuwing:</strong> Dit zal je actieve .env-bestand overschrijven. Zorg ervoor, om een ​​back-up voordat het uploaden van te maken.',
    'upload_label'  => 'Kies een bestand.',
    'upload_button' => 'Upload',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'Het nieuwe item is succesvol opgeslagen in je .env bestand!',
    'entry_edited'      => 'Item succesvol gewijzigd!!',
    'entry_deleted'     => 'Item succesvol verwijderd!',
    'delete_entry'      => 'Verwijder een item',
    'backup_created'    => 'De niewe backup is gecréérd!',
    'backup_restored'   => 'De backup herstel is gelukt!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'De backup is verwijderd!',
    'controller_backup_created' => 'De backup is gecréérd!'
];
