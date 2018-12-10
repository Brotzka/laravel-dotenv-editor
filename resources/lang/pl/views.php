<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 21.06.18
 * Time: 18:42
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'overview'  => 'Przegląd',
    'addnew'    => 'Nowy rekord',
    'backups'   => 'Kopie zapasowe',
    'upload'    => 'Prześlij',

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
    'overview_title'                => 'Aktualny plik .env',
    'overview_text'                 => 'Kliknij <strong>Załaduj</strong> aby wczytać bieżący plik .env.',
    'overview_button'               => 'Załaduj',
    'overview_table_key'            => 'Klucz',
    'overview_table_value'          => 'Wartość',
    'overview_table_options'        => 'Opcje',
    'overview_table_popover_edit'   => 'Edytuj wpis',
    'overview_table_popover_delete' => 'Skasuj wpis',
    'overview_delete_modal_text'    => 'Czy na pewno chcesz usunąć ten wpis?',
    'overview_delete_modal_yes'     => 'Tak, usuń wpis',
    'overview_delete_modal_no'      => 'Nie, wyjdź',
    'overview_edit_modal_title'     => 'Edycja',
    'overview_edit_modal_save'      => 'Zapisz',
    'overview_edit_modal_quit'      => 'Anuluj',
    'overview_edit_modal_value'     => 'Nowa wartość',
    'overview_edit_modal_key'       => 'Klucz',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Dodaj nową parę klucz-wartość',
    'addnew_text'       => 'Tutaj możesz dodać nową parę klucz-wartość do <strong>aktualnego</strong> pliku .env.<br>Upewnij się, że wykonałeś kopie zapasową.',
    'addnew_label_key'  => 'Klucz',
    'addnew_label_value'=> 'Wartość',
    'addnew_button_add' => 'Dodaj',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Zapisz aktualny plik .env',
    'backup_create'                 => 'Wykonaj kopie',
    'backup_download'               => 'Pobierz aktualny plik .env',
    'backup_title_two'              => 'Dostępne kopie zapasowe',
    'backup_restore_text'           => 'Tutaj możesz przywrócić plik .env z kopii zapasowej.',
    'backup_restore_warning'        => 'Podczas przywracania aktualny plik .env zostanie nadpisany! Upewnij się że wykonałeś kopię zapasową!',
    'backup_no_backups'             => 'Brak kopii zapasowych.',
    'backup_table_nr'               => 'Nr.',
    'backup_table_date'             => 'Data',
    'backup_table_options'          => 'Opcje',
    'backup_table_options_show'     => 'Pokaż zawartość kopii',
    'backup_table_options_restore'  => 'Przywróć tę wersje',
    'backup_table_options_download' => 'Pobierz tę wersje',
    'backup_table_options_delete'   => 'Usuń',
    'backup_modal_title'            => 'Zawartość kopii',
    'backup_modal_key'              => 'Klucz',
    'backup_modal_value'            => 'Wartość',
    'backup_modal_close'            => 'Zamknij',
    'backup_modal_restore'          => 'Przywróć',
    'backup_modal_delete'           => 'Usuń',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Prześlij plik .env na serwer',
    'upload_text'   => 'Tutaj możesz przesłać swoją lokalną kopie na serwer',
    'upload_warning'=> '<strong>Uwaga:</strong> Ta operacja nadpisze aktualny plik .env. Upewnij się że przed przesłaniem pliku wykonałeś kopie.',
    'upload_label'  => 'Wybierz plik',
    'upload_button' => 'Wyślij',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'Nowa para klucz-wartość została dodana do pliku .env',
    'entry_edited'      => 'Para klucz-wartość została zapisana!',
    'entry_deleted'     => 'Para klucz-wartość została usunięta!',
    'delete_entry'      => 'Usuń rekord',
    'backup_created'    => 'Kopia zapasowa wykonana pomyślnie!',
    'backup_restored'   => 'Przywracanie kopi zakończyło się pomyślnie!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'Kopia zapasowa została usunięta!',
    'controller_backup_created' => 'Kopia zapasowa wykonana pomyślnie!'
];
