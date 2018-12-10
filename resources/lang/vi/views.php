<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
     */
    'overview'                      => 'Tổng quan',
    'addnew'                        => 'Thêm mới',
    'backups'                       => 'Sao lưu',
    'upload'                        => 'Phục hồi',

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
     */
    'title'                         => 'Trình chỉnh sửa file .env',

    /*
    |--------------------------------------------------------------------------
    | View overview
    |--------------------------------------------------------------------------
     */
    'overview_title'                => '.env hiện tại',
    'overview_text'                 => 'Tại đây bạn có thể thấy nội dung của file .env hiện tại của bạn<br>Click <strong>load</strong> để xem.',
    'overview_button'               => 'Load',
    'overview_table_key'            => 'Khóa',
    'overview_table_value'          => 'Giá trị',
    'overview_table_options'        => 'Tùy chọn',
    'overview_table_popover_edit'   => 'Sửa entry',
    'overview_table_popover_delete' => 'Xóa entry',
    'overview_delete_modal_text'    => 'Bạn có chắc chắn xóa chứ?',
    'overview_delete_modal_yes'     => 'Yes, xóa nó đi',
    'overview_delete_modal_no'      => 'No, đây là sai lầm :D',
    'overview_edit_modal_title'     => 'Sửa entry',
    'overview_edit_modal_save'      => 'Lưu',
    'overview_edit_modal_quit'      => 'Hủy bỏ',
    'overview_edit_modal_value'     => 'Giá trị mới',
    'overview_edit_modal_key'       => 'Khóa',

    /*
    |--------------------------------------------------------------------------
    | View add new
    |--------------------------------------------------------------------------
     */
    'addnew_title'                  => 'Thêm một cặp khóa-giá trị mới',
    'addnew_text'                   => 'Here you can add a new key-value-pair to your <strong>current</strong> .env-file.<br>To be sure, create a backup before under the backup-tab.',
    'addnew_label_key'              => 'Khóa',
    'addnew_label_value'            => 'Giá trị',
    'addnew_button_add'             => 'Thêm',

    /*
    |--------------------------------------------------------------------------
    | View backup
    |--------------------------------------------------------------------------
     */
    'backup_title_one'              => 'Sao lưu file .env hiện tại',
    'backup_create'                 => 'Tạo sao lưu',
    'backup_download'               => 'Tải xuống bản .env hiện tại',
    'backup_title_two'              => 'Sao lưu có sẵn của bạn',
    'backup_restore_text'           => 'Tại đây bạn có thể khôi phục một trong những bản sao lưu có sẵn của bạn.',
    'backup_restore_warning'        => 'This overwrites your active .env! Be sure to backup your currently active .env-file!',
    'backup_no_backups'             => 'Bạn không có bản sao lưu có sẵn nào.',
    'backup_table_nr'               => 'Nr.',
    'backup_table_date'             => 'Date',
    'backup_table_options'          => 'Options',
    'backup_table_options_show'     => 'Xem nội dung bản sao lưu',
    'backup_table_options_restore'  => 'Phục hồi phiên bản này',
    'backup_table_options_download' => 'Tải xuống',
    'backup_table_options_delete'   => 'Xóa',
    'backup_modal_title'            => 'Nội dung bản sao lưu',
    'backup_modal_key'              => 'Khóa',
    'backup_modal_value'            => 'Giá trị',
    'backup_modal_close'            => 'Đóng',
    'backup_modal_restore'          => 'Sao lưu',
    'backup_modal_delete'           => 'Xóa',

    /*
    |--------------------------------------------------------------------------
    | View upload
    |--------------------------------------------------------------------------
     */
    'upload_title'                  => 'Tải file đã sao lưu lên',
    'upload_text'                   => 'Tại đây bạn có thể tải lên bản sao lưu từ máy tính của mình.',
    'upload_warning'                => '<strong>Cảnh báo:</strong> Điều này sẽ ghi đè tệp .env hiện đang hoạt động của bạn. Hãy chắc chắn rằng bạn tạo một bản sao lưu trước khi tải lên.',
    'upload_label'                  => 'Chọn tệp',
    'upload_button'                 => 'Tải lên',

    /*
    |--------------------------------------------------------------------------
    | Messages from View
    |--------------------------------------------------------------------------
     */
    'new_entry_added'               => 'New key-value-pair was successfully added to your .env!',
    'entry_edited'                  => 'Key-value-pair was edited successfully!',
    'entry_deleted'                 => 'Key-value-pair was deleted successfully!',
    'delete_entry'                  => 'Delete an entry',
    'backup_created'                => 'New backup was created successfully!',
    'backup_restored'               => 'Backup was restored successfully!',

    /*
    |--------------------------------------------------------------------------
    | Messages from Controller
    |--------------------------------------------------------------------------
     */
    'controller_backup_deleted'     => 'Sao lưu đã bị xóa thành công!',
    'controller_backup_created'     => 'Sao lưu đã được tạo thành công!',
];
