<?php
/**
 * Created by PhpStorm.
 * User: Mustafa Karagülle
 * Date: 01.12.2018
 * Time: 08:10.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */
    'overview'  => 'Genel',
    'addnew'    => 'Yeni Ekle',
    'backups'   => 'Yedekler',
    'upload'    => 'Yükle',

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
    'overview_title'                => 'Geçerli .env dosyanız',
    'overview_text'                 => 'Burada mevcut aktif .env. İçeriğini görebilirsiniz. İçeriği göstermek için <strong> yükle </ strong> \'yi tıklayın.',
    'overview_button'               => 'Yükle',
    'overview_table_key'            => 'Anahtar',
    'overview_table_value'          => 'Değer',
    'overview_table_options'        => 'Seçenekler',
    'overview_table_popover_edit'   => 'Kaydı Düzenle',
    'overview_table_popover_delete' => 'Kaydı Sil',
    'overview_delete_modal_text'    => 'Bu kaydı gerçekten silmek istiyor musunuz?',
    'overview_delete_modal_yes'     => 'Evet, Kaydı Sil',
    'overview_delete_modal_no'      => 'Hayır, çık',
    'overview_edit_modal_title'     => 'Kaydı Düzenle',
    'overview_edit_modal_save'      => 'Kaydet',
    'overview_edit_modal_quit'      => 'İptal',
    'overview_edit_modal_value'     => 'Yeni Değer',
    'overview_edit_modal_key'       => 'Anahtar',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
    */
    'addnew_title'      => 'Yeni anahtar / değer çiftini ekle',
    'addnew_text'       => 'Burada <strong> geçerli </ strong> .env dosyanıza yeni bir anahtar / değer çifti ekleyebilirsiniz. Emin olmak için, yedekleme sekmesinden önce bir yedek oluşturun.',
    'addnew_label_key'  => 'Anahtar',
    'addnew_label_value'=> 'Değer',
    'addnew_button_add' => 'Ekle',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
    */
    'backup_title_one'              => 'Geçerli .env dosyanızı kaydet',
    'backup_create'                 => 'Yedek Oluştur',
    'backup_download'               => 'Güncel .env indir',
    'backup_title_two'              => 'Mevcut yedekleriniz',
    'backup_restore_text'           => 'Buradan mevcut yedeklerinizden birini geri yükleyebilirsiniz.',
    'backup_restore_warning'        => 'Bu aktif .env\'in üzerine yazıyor! Şu anda aktif .env dosyanızı yedeklediğinizden emin olun!',
    'backup_no_backups'             => 'Yedeklemeniz yok.',
    'backup_table_nr'               => 'Sıra',
    'backup_table_date'             => 'Tarih',
    'backup_table_options'          => 'Seçenekler',
    'backup_table_options_show'     => 'Yedekleme içeriğini göster',
    'backup_table_options_restore'  => 'Bu sürümü geri yükle',
    'backup_table_options_download' => 'Bu sürümü indir',
    'backup_table_options_delete'   => 'Bu sürümü sil',
    'backup_modal_title'            => 'Yedekleme içeriği',
    'backup_modal_key'              => 'Anahtar',
    'backup_modal_value'            => 'Değer',
    'backup_modal_close'            => 'Kapat',
    'backup_modal_restore'          => 'Eski haline getir',
    'backup_modal_delete'           => 'Sil',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
    */
    'upload_title'  => 'Yedek yükle',
    'upload_text'   => 'Buradan bilgisayarınızdan bir yedek yükleyebilirsiniz.',
    'upload_warning'=> '<strong> Uyarı: </ strong> Bu, şu anda aktif olan .env dosyanızı geçersiz kılacaktır. Yüklemeden önce bir yedek oluşturduğunuzdan emin olun.',
    'upload_label'  => 'Dosya Seç',
    'upload_button' => 'Yükle',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
    */
    'new_entry_added'   => 'Yeni anahtar / değer çifti, .env\'inize başarıyla eklendi!',
    'entry_edited'      => 'Anahtar / değer çifti başarıyla düzenlendi!',
    'entry_deleted'     => 'Anahtar / değer çifti başarıyla silindi!',
    'delete_entry'      => 'Bir kayıt sil',
    'backup_created'    => 'Yeni yedekleme başarıyla oluşturuldu!',
    'backup_restored'   => 'Yedekleme başarıyla geri yüklendi!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
    */
    'controller_backup_deleted' => 'Yedekleme başarıyla silindi!',
    'controller_backup_created' => 'Yedekleme başarıyla oluşturuldu!',
];
