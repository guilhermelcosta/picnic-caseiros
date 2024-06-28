<?php

return [
    'page_title_suffix' => 'Craftable',

    'operation' => [
        'succeeded' => 'Operation successful',
        'failed' => 'Operation failed',
        'not_allowed' => 'Operation not allowed',
        'publish_now' => 'Publish now',
        'unpublish_now' => 'Unpublish now',
        'publish_later' => 'Publish later',
    ],

    'dialogs' => [
        'duplicateDialog' => [
            'title' => 'Warning!',
            'text' => 'Do you really want to duplicate this item?',
            'yes' => 'Yes, duplicate.',
            'no' => 'No, cancel.',
            'success_title' => 'Success!',
            'success' => 'Item successfully duplicated.',
            'error_title' => 'Error!',
            'error' => 'An error has occured.',
        ],
        'deleteDialog' => [
            'title' => 'Warning!',
            'text' => 'Do you really want to delete this item?',
            'yes' => 'Yes, delete.',
            'no' => 'No, cancel.',
            'success_title' => 'Success!',
            'success' => 'Item successfully deleted.',
            'error_title' => 'Error!',
            'error' => 'An error has occured.',
        ],
        'publishNowDialog' => [
            'title' => 'Warning!',
            'text' => 'Do you really want to publish this item now?',
            'yes' => 'Yes, publish now.',
            'no' => 'No, cancel.',
            'success_title' => 'Success!',
            'success' => 'Item successfully published.',
            'error_title' => 'Error!',
            'error' => 'An error has occured.',
        ],
        'unpublishNowDialog' => [
            'title' => 'Warning!',
            'text' => 'Do you really want to unpublish this item now?',
            'yes' => 'Yes, unpublish now.',
            'no' => 'No, cancel.',
            'success_title' => 'Success!',
            'success' => 'Item successfully published.',
            'error_title' => 'Error!',
            'error' => 'An error has occured.',
        ],
        'publishLaterDialog' => [
            'text' => 'Please choose the date when the item should be published:',
            'yes' => 'Save',
            'no' => 'Cancel',
            'success_title' => 'Success!',
            'success' => 'Item was successfully saved.',
            'error_title' => 'Error!',
            'error' => 'An error has occured.',
        ],
    ],

    'btn' => [
        'save' => 'Salvar',
        'cancel' => 'Cancelar',
        'edit' => 'Editar',
        'delete' => 'Excluir',
        'search' => 'Pesquisar',
        'new' => 'Novo',
        'saved' => 'Salvo',
        'shopping_cart' => 'Compras do insumo',
    ],

    'index' => [
        'no_items' => 'Nenhum item encontrado',
        'try_changing_items' => 'Tente alterar os filtros ou adicionar um novo item',
    ],

    'listing' => [
        'selected_items' => '{{ clickedBulkItemsCount > 1 ? "itens selecionados" : "item selecionado" }}',
        'uncheck_all_items' => 'Desmarcar todos os itens',
        'check_all_items' => 'Selecionar todos os itens',
    ],

    'forms' => [
        'select_a_date' => 'Select date',
        'select_a_time' => 'Select time',
        'select_date_and_time' => 'Select date and time',
        'choose_translation_to_edit' => 'Choose translation to edit:',
        'manage_translations' => 'Manage translations',
        'more_can_be_managed' => '({{ otherLocales.length }} more can be managed)',
        'currently_editing_translation' => 'Currently editing {{ this.defaultLocale.toUpperCase() }} (default) translation',
        'hide' => 'Hide Translations',
        'select_an_option' => 'Selecione uma opção',
        'select_options' => 'Select options',
        'publish' => 'Publish',
        'history' => 'History',
        'created_by' => 'Created by',
        'updated_by' => 'Updated by',
        'created_on' => 'Created on',
        'updated_on' => 'Updated on'
    ],

    'placeholder' => [
        'search' => 'Pesquisar'
    ],

    'pagination' => [
        'overview' => 'Exibindo do item {{ pagination.state.from }} ao item {{ pagination.state.to }} do total de {{ pagination.state.total }} {{ pagination.state.total > 1 ? "itens." : "item." }}'
    ],

    'logo' => [
        'title' => 'Craftable',
    ],

    'profile_dropdown' => [
        'account' => 'Account',
    ],

    'sidebar' => [
        'content' => 'Cadastros',
        'settings' => 'Configurações',
    ],

    'media_uploader' => [
        'max_number_of_files' => '(max no. of files: :maxNumberOfFiles files)',
        'max_size_pre_file' => '(max size per file: :maxFileSize MB)',

        'private_title' => 'Files are not accessible for public',
    ],

    'footer' => [
        'powered_by' => 'Powered by',
    ]

];
