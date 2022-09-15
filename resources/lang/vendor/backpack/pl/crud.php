<?php
return [
    // Forms
    'save_action_save_and_new'         => 'Zapisz i utwórz nowy element',
    'save_action_save_and_edit'        => 'Zapisz i kontynuuj edycję',
    'save_action_save_and_back'        => 'Zapisz i zakończ edycję',
    'save_action_save_and_preview'     => 'Save and preview',
    'save_action_changed_notification' => 'Zachowanie domyślne po zapisaniu zostało zmienione.',

    // Create form
    'add'         => 'Dodaj',
    'back_to_all' => 'Wróć do wszystkich - ',
    'cancel'      => 'Anuluj',
    'add_a_new'   => 'Dodaj nowy',

    // Edit form
    'edit' => 'Edytuj',
    'save' => 'Zapisz',
    'apply' => 'Zapisz',

    // Translatable models
    'edit_translations' => 'Tłumaczenia',
    'language'          => 'Język',

    // CRUD table view
    'all'                       => 'Wszystkie',
    'in_the_database'           => 'w bazie danych',
    'list'                      => 'Lista',
    'reset'                     => 'Resetuj filtry',
    'actions'                   => 'Działania',
    'preview'                   => 'Podgląd',
    'delete'                    => 'Usuń',
    'admin'                     => 'Administrator',
    'details_row'               => 'To jest wiersz szczegółów. Zmodyfikuj, jak chcesz. ',
    'details_row_loading_error' => 'Wystąpił błąd podczas ładowania szczegółów. Proszę spróbuj ponownie.',
    'clone' => 'Clone',
    'clone_success' => '<strong>Entry cloned</strong><br>A new entry has been added, with the same information as this one.',
    'clone_failure' => '<strong>Cloning failed</strong><br>The new entry could not be created. Please try again.',

    // Confirmation messages and bubbles
    'delete_confirm'                          => 'Czy na pewno chcesz usunąć ten element?',
    'delete_confirmation_title'               => 'Item Deleted',
    'delete_confirmation_message'             => 'Element został usunięty pomyślnie.',
    'delete_confirmation_not_title'           => 'NIE usunięte',
    'delete_confirmation_not_message'         => 'Wystąpił błąd, Twój produkt mógł nie zostać usunięty.',
    'delete_confirmation_not_deleted_title'  =>' Nie usunięto ',
    'delete_confirmation_not_deleted_message' => 'Nic się nie stało. Twój przedmiot jest bezpieczny. ',

    // Bulk actions
    'bulk_no_entries_selected_title'  =>' Nie wybrano żadnych wpisów ',
    'bulk_no_entries_selected_message' => 'Wybierz jeden lub więcej elementów, aby wykonać na nich akcję zbiorczą.',

    // Bulk confirmation
    'bulk_delete_are_you_sure'   => 'Czy na pewno chcesz usunąć te: wpisy liczbowe?',
    'bulk_delete_sucess_title'   => 'Wpisy usunięte',
    'bulk_delete_sucess_message' => 'elementy zostały usunięte',
    'bulk_delete_error_title'    => 'Delete failed ',
    'bulk_delete_error_message'  => 'Nie można usunąć jednego lub więcej elementów',

    // Ajax errors
    'ajax_error_title' => 'Błąd',
    'ajax_error_text'  => 'Błąd ładowania strony. Odśwież stronę. ',

    // DataTables translation
    'emptyTable'            => 'Brak danych w tabeli',
    'info'                  => 'Pokazuje _START_ do _END_ z _TOTAL_ wpisów',
    'infoEmpty'             => 'Pokazuje 0 do 0 z 0 wpisów',
    'infoFiltered'          => '(filtrowane z _MAX_ wszystkich wpisów)',
    'infoPostFix'           => '',
    'thousands'             => ',',
    'lengthMenu'            => '_MENU_ zapisów na stronę',
    'loadingRecords'        => 'Ładowanie ...',
    'processing'            => 'Processing ...',
    'search'                => 'Szukaj:',
    'zeroRecords'           => 'Nie znaleziono pasujących rekordów',
    'paginate'              => [
        'first'    => 'Pierwszy',
        'last'     => 'Last',
        'next'     => 'Dalej',
        'previous' => 'Poprzedni',
    ],
    'aria'                  => [
        'sortAscending'  => ': aktywuj sortowanie kolumny rosnąco ',
        'sortDescending' => ': aktywuj aby posortować kolumnę malejąco ',
    ],
    'export'                => [
        'export'            => 'Eksportuj',
        'copy'              => 'Copy',
        'excel'             => 'Excel',
        'csv'               => 'CSV',
        'pdf'               => 'PDF',
        'print'             => 'Drukuj',
        'column_visibility' => 'Widoczność kolumny',
    ],

    // global crud - errors
    'unauthorized_access'   => 'Nieautoryzowany dostęp - nie masz wymaganych uprawnień, aby zobaczyć tę stronę.',
    'please_fix'            => 'Napraw następujące błędy:',

    // global crud - success / error notification bubbles
    'insert_success' => 'Produkt został pomyślnie dodany.',
    'update_success' => 'Element został zmodyfikowany pomyślnie.',

    // CRUD reorder view
    'reorder'                 => 'Zmień kolejność',
    'reorder_text'            => 'Użyj metody przeciągnij i upuść, aby zmienić kolejność.',
    'reorder_success_title'   => 'Gotowe',
    'reorder_success_message' => 'Twoje zamówienie zostało zapisane.',
    'reorder_error_title'     => 'Błąd',
    'reorder_error_message'   => 'Twoje zamówienie nie zostało zapisane.',

    // CRUD yes/no
    'yes'   => 'Tak',
    'no'    => 'Nie',

    // CRUD filters navbar view
    'filters'           => 'Filtry',
    'toggle_filters'    => 'Przełącz filtry',
    'remove_filters'    => 'Usuń filtry',

    // Fields
    'browse_uploads'            => 'Przeglądaj przesyłki',
    'select_all'                => 'Wybierz wszystko',
    'select_files'              => 'Wybierz pliki',
    'select_file'               => 'Wybierz plik',
    'clear'                     => 'Wyczyść',
    'page_link'                 => 'Treść na stronie',
    'page_link_placeholder'     => 'http://example.com/nazwa-potrzebna-strona',
    'internal_link'             => 'Wewnętrzny link',
    'internal_link_placeholder' => 'Wewnętrzny błąd. Przykład: \'admin/page\' (bez cudzysłowów) dla \':url\' ',
    'external_link'             => 'Link zewnętrzny',
    'choose_file'               => 'Wybierz plik',
    'new_item'                  => 'Nowa pozycja',
    'select_entry'              => 'Wybierz wpis',
    'select_entries'            => 'Wybierz wpisy',

    // Table field
    'table_cant_add'    => 'Nie można dodać nowego: podmiot',
    'table_max_reached' => 'Maksymalna liczba: maks. osiągnięty',

    // File manager
    'file_manager' => 'Menedżer plików',

    // InlineCreateOperation
    'related_entry_created_success' => 'Powiązany wpis został utworzony i wybrany.',
    'related_entry_created_error' => 'Nie można utworzyć powiązanego wpisu.',

    'dropzone' => [
        'click' => 'Upuść pliki tutaj lub kliknij, aby przesłać.',
        'save' => 'Zapisz tytuły',
    ],
];
