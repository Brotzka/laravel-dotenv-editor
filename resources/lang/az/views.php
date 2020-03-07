<?php
/**
 * Created by sado729.
 * Date: 08.03.20
 * Time: 00:42
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'overview'  => 'Ümumi baxış',
    'addnew'    => 'Yenisini əlavə edin',
    'backups'   => 'Ehtiyat Nüsxələri',
    'upload'    => 'Yüklə',

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
    'overview_title'                => 'Cari .env-faylınız',
    'overview_text'                 => 'Burada cari aktiv .env. Məzmununuzu görə bilərsiniz. Məzmunu göstərmək üçün <strong> yükləyin </strong> vurun.',
    'overview_button'               => 'Yükləyin',
    'overview_table_key'            => 'Açar',
    'overview_table_value'          => 'Dəyər',
    'overview_table_options'        => 'Seçimlər',
    'overview_table_popover_edit'   => 'Girişləri redaktə edin',
    'overview_table_popover_delete' => 'Girişi silmək',
    'overview_delete_modal_text'    => 'Bu girişi həqiqətən silmək istəyirsiniz?',
    'overview_delete_modal_yes'     => 'Bəli, girişi silin',
    'overview_delete_modal_no'      => 'Xeyr, çıxın',
    'overview_edit_modal_title'     => 'Girişləri redaktə edin',
    'overview_edit_modal_save'      => 'Yadda saxla',
    'overview_edit_modal_quit'      => 'Dayandırmaq',
    'overview_edit_modal_value'     => 'Yeni dəyər',
    'overview_edit_modal_key'       => 'Açar',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Yeni açar-dəyər cütü əlavə edin',
    'addnew_text'       => 'Burada <strong> cari </strong> .env-faylınıza yeni açar-dəyər cütü əlavə edə bilərsiniz.',
    'addnew_label_key'  => 'Açar',
    'addnew_label_value'=> 'Dəyər',
    'addnew_button_add' => 'Əlavə edin',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Cari .env faylınızı qeyd edin',
    'backup_create'                 => 'Ehtiyat nüsxəsi yaradın',
    'backup_download'               => 'Cari .env faylınızı yükləyin',
    'backup_title_two'              => 'Mövcud ehtiyat nüsxələriniz',
    'backup_restore_text'           => 'Burada mövcud ehtiyat nüsxələrdən birini bərpa edə bilərsiniz.',
    'backup_restore_warning'        => 'Bu aktiv .env faylının üzərinə yazır. Hal-hazırda fəaliyyət göstərən .env faylın ehtiyat nüsxəsini çıxarmağınızdan əmin olun!',
    'backup_no_backups'             => 'Ehtiyat nüsxələriniz yoxdur.',
    'backup_table_nr'               => '№',
    'backup_table_date'             => 'Tarix',
    'backup_table_options'          => 'Seçimlər',
    'backup_table_options_show'     => 'Ehtiyat nüsxələrinin məzmununu göstərin',
    'backup_table_options_restore'  => 'Bu versiyanı yenidən bərpa edin',
    'backup_table_options_download' => 'Bu versiyanı yükləyin',
    'backup_table_options_delete'   => 'Bu versiyanı silin',
    'backup_modal_title'            => 'Ehtiyat nüsxələrinin məzmunu',
    'backup_modal_key'              => 'Açar',
    'backup_modal_value'            => 'Dəyər',
    'backup_modal_close'            => 'Bağla',
    'backup_modal_restore'          => 'Yenidən bərpa et',
    'backup_modal_delete'           => 'Sil',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Bir ehtiyat nüsxəsi yüklə',
    'upload_text'   => 'Burada kompüterinizdən bir ehtiyat nüsxəsi yükləyə bilərsiniz.',
    'upload_warning'=> '<strong> Diqqət: </strong> Bu, hazırda fəaliyyət göstərən .env faylın üzərinə yazacaqdır. Yükləmədən əvvəl bir ehtiyat nüsxəsi yaratmağınızdan əmin olun.',
    'upload_label'  => 'Fayl seçin',
    'upload_button' => 'Yükləyin',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'Yeni açar-dəyər cütlüyü .env-ə uğurla əlavə edildi.',
    'entry_edited'      => 'Açar-dəyər cütü uğurla düzəldildi!',
    'entry_deleted'     => 'Açar-dəyər cütü uğurla silindi!',
    'delete_entry'      => 'Girişi silmək',
    'backup_created'    => 'Ehtiyat nüsxəsi uğurla yaradıldı!',
    'backup_restored'   => 'Ehtiyat nüsxəsi uğurla bərpa edildi!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'Ehtiyat nüsxəsi uğurla yaradıldı!',
    'controller_backup_created' => 'Ehtiyat nüsxəsi uğurla bərpa edildi!',
];
