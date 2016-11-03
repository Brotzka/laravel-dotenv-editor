<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 31.07.16
 * Time: 07:59
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'overview'  => 'Übersicht',
    'addnew'    => 'neuer Eintrag',
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
    'overview_title'                => 'Deine aktuelle .env-Datei',
    'overview_text'                 => 'Hier siehst du den Inhalt deiner aktiven .env-Datei.<br>Klicke auf <strong>laden</strong> um den Inhalt anzuzeigen.',
    'overview_button'               => 'Laden',
    'overview_table_key'            => 'Schlüssel',
    'overview_table_value'          => 'Wert',
    'overview_table_options'        => 'Optionen',
    'overview_table_popover_edit'   => 'Eintrag bearbeiten',
    'overview_table_popover_delete' => 'Eintrag löschen',
    'overview_delete_modal_text'    => 'Willst du diesen Eintrag wirklich löschen?',
    'overview_delete_modal_yes'     => 'Ja, Eintrag löschen',
    'overview_delete_modal_no'      => 'Nein, abbrechen',
    'overview_edit_modal_title'     => 'Eintrag bearbeiten',
    'overview_edit_modal_save'      => 'Speichern',
    'overview_edit_modal_quit'      => 'Abbrechen',
    'overview_edit_modal_value'     => 'Neuer Wert',
    'overview_edit_modal_key'       => 'Schlüssel',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Füge ein neues Schlüssel-Wert-Paar hinzu',
    'addnew_text'       => 'Hier kannst du einen neuen Eintrag zu deiner <strong>aktuellen</strong> .env-Datei hinzufügen.<br>Sicherheitshalber kannst du unter Backups eine Sicherung erstellen.',
    'addnew_label_key'  => 'Schlüssel',
    'addnew_label_value'=> 'Wert',
    'addnew_button_add' => 'Hinzufügen',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Speicher deine aktuelle .env-Datei',
    'backup_create'                 => 'Backup erstellen',
    'backup_download'               => 'aktuelle .env-Datei runterladen',
    'backup_title_two'              => 'Deine verfügbaren Backups',
    'backup_restore_text'           => 'Hier kannst du verfügabre Backups wieder herstellen.',
    'backup_restore_warning'        => 'Dies überschreibt deine aktuell aktive .env! Erstelle zuvor sicherheitshalber ein Backup!',
    'backup_no_backups'             => 'Keine Backups verfügbar.',
    'backup_table_nr'               => 'Nr.',
    'backup_table_date'             => 'Datum',
    'backup_table_options'          => 'Optionen',
    'backup_table_options_show'     => 'Inhalt des Backups anzeigen',
    'backup_table_options_restore'  => 'Dieses backup wiederherstellen',
    'backup_table_options_download' => 'Backup runterladen',
    'backup_table_options_delete'   => 'Backup löschen',
    'backup_modal_title'            => 'Inhalt des Backups',
    'backup_modal_key'              => 'Schlüssel',
    'backup_modal_value'            => 'Wert',
    'backup_modal_close'            => 'Schließen',
    'backup_modal_restore'          => 'Wiederherstellen',
    'backup_modal_delete'           => 'Löschen',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Backup hochladen',
    'upload_text'   => 'Hier kannst du ein Backup von deinem Computer hochladen.',
    'upload_warning'=> '<strong>Achtung:</strong> Dies überschreibt deine aktuell aktive .env! Erstelle sicherheitshalber ein Backup!',
    'upload_label'  => 'Datei auswählen',
    'upload_button' => 'Hochladen',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'Neues Schlüssel-Wert-Paar wurde erfolgreich hinzugefügt.',
    'entry_edited'      => 'Schlüssel-Wert-Paar wurde erfolgreich geändert.',
    'entry_deleted'     => 'Schlüssel-Wert-Paar wurde erfolgreich gelöscht.',
    'delete_entry'      => 'Eintrag löschen',
    'backup_created'    => 'Neues Backup wurde erfolgreich erstellt.',
    'backup_restored'   => 'Backup wurde erfolgreich wieder hergestellt.',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'Backup wurde erfolgreich gelöscht.',
    'controller_backup_created' => 'Backup wurde erfolgreich erstellt.'
];
