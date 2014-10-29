<?php return array (
  'be_groups' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'default_sortby' => 'ORDER BY title',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'type' => 'inc_access_lists',
          'typeicon_column' => 'inc_access_lists',
          'typeicons' =>
            array (
              1 => 'be_groups_lists.gif',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'status-user-group-backend',
            ),
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups',
          'useColumnsForDefaultValues' => 'lockToDomain, fileoper_perms',
          'dividers2tabs' => true,
          'versioningWS_alwaysAllowLiveEdit' => true,
          'searchFields' => 'title',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title, db_mountpoints, file_mountpoints, fileoper_perms, inc_access_lists, tables_select, tables_modify, pagetypes_select, non_exclude_fields, groupMods, lockToDomain, description',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '50',
                  'eval' => 'trim,required',
                ),
            ),
          'db_mountpoints' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:db_mountpoints',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '3',
                  'maxitems' => 25,
                  'autoSizeMax' => 10,
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'file_mountpoints' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_filemounts',
                  'foreign_table_where' => ' AND sys_filemounts.pid=0 ORDER BY sys_filemounts.title',
                  'size' => '3',
                  'maxitems' => 25,
                  'autoSizeMax' => 10,
                  'iconsInOptionTags' => 1,
                  'wizards' =>
                    array (
                      '_PADDING' => 1,
                      '_VERTICAL' => 1,
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_edit_title',
                          'script' => 'wizard_edit.php',
                          'popup_onlyOpenIfSelected' => 1,
                          'icon' => 'edit2.gif',
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_add_title',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'sys_filemounts',
                              'pid' => '0',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                      'list' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_list_title',
                          'icon' => 'list.gif',
                          'params' =>
                            array (
                              'table' => 'sys_filemounts',
                              'pid' => '0',
                            ),
                          'script' => 'wizard_list.php',
                        ),
                    ),
                ),
            ),
          'fileoper_perms' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms_general',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms_unzip',
                          1 => 0,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms_diroper_perms',
                          1 => 0,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms_diroper_perms_copy',
                          1 => 0,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.fileoper_perms_diroper_perms_delete',
                          1 => 0,
                        ),
                    ),
                  'default' => '7',
                ),
            ),
          'workspace_perms' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:workspace_perms',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:workspace_perms_live',
                          1 => 0,
                        ),
                    ),
                  'default' => 0,
                ),
            ),
          'pagetypes_select' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.pagetypes_select',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'pagetypes',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => 20,
                  'renderMode' => 'checkbox',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'tables_modify' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.tables_modify',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'tables',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => 100,
                  'renderMode' => 'checkbox',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'tables_select' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.tables_select',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'tables',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => 100,
                  'renderMode' => 'checkbox',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'non_exclude_fields' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.non_exclude_fields',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'exclude',
                  'size' => '25',
                  'maxitems' => 1000,
                  'autoSizeMax' => 50,
                  'renderMode' => 'checkbox',
                  'itemListStyle' => 'width:500px',
                ),
            ),
          'explicit_allowdeny' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.explicit_allowdeny',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'explicitValues',
                  'maxitems' => 1000,
                  'renderMode' => 'checkbox',
                ),
            ),
          'allowed_languages' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:allowed_languages',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'languages',
                  'maxitems' => 1000,
                  'renderMode' => 'checkbox',
                ),
            ),
          'custom_options' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.custom_options',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'custom',
                  'maxitems' => 1000,
                  'renderMode' => 'checkbox',
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'lockToDomain' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:lockToDomain',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '50',
                  'softref' => 'substitute',
                ),
            ),
          'groupMods' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:userMods',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'modListGroup',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => 100,
                  'renderMode' => 'checkbox',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'inc_access_lists' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.inc_access_lists',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 5,
                  'cols' => 30,
                ),
            ),
          'TSconfig' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:TSconfig',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '5',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:TSconfig_title',
                          'script' => 'wizard_tsconfig.php?mode=beuser',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'TSconfig',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'hide_in_lists' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.hide_in_lists',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'subgroup' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_groups.subgroup',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'be_groups',
                  'foreign_table_where' => 'AND NOT(be_groups.uid = ###THIS_UID###) AND be_groups.hidden=0 ORDER BY be_groups.title',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => 20,
                  'iconsInOptionTags' => 1,
                ),
            ),
          'tx_templavoila_access' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:be_groups.tx_templavoila_access',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'tx_templavoila_datastructure,tx_templavoila_tmplobj',
                  'prepend_tname' => 1,
                  'size' => 5,
                  'autoSizeMax' => 15,
                  'multiple' => 1,
                  'minitems' => 0,
                  'maxitems' => 1000,
                  'show_thumbs' => 1,
                ),
            ),
          'tx_news_categorymounts' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:be_user.tx_news_categorymounts',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'tx_news_domain_model_category',
                  'foreign_table_where' => ' AND (tx_news_domain_model_category.sys_language_uid = 0 OR tx_news_domain_model_category.l10n_parent = 0) ORDER BY tx_news_domain_model_category.sorting',
                  'renderMode' => 'tree',
                  'subType' => 'db',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parentcategory',
                      'appearance' =>
                        array (
                          'expandAll' => true,
                          'showHeader' => false,
                          'maxLevels' => 99,
                        ),
                    ),
                  'size' => 10,
                  'autoSizeMax' => 20,
                  'minitems' => 0,
                  'maxitems' => 99,
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'hidden;;;;1-1-1, title;;;;2-2-2, description, subgroup;;;;3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.base_rights, inc_access_lists;;;;1-1-1,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.mounts_and_workspaces, workspace_perms;;;;1-1-1, db_mountpoints;;;;2-2-2, file_mountpoints;;;;3-3-3, fileoper_perms,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.options, lockToDomain;;;;1-1-1, hide_in_lists;;;;2-2-2, TSconfig;;;;3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.extended, tx_news_categorymounts;;;;1-1-1',
            ),
          1 =>
            array (
              'showitem' => 'hidden;;;;1-1-1, title;;;;2-2-2, description, subgroup;;;;3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.base_rights, inc_access_lists;;;;1-1-1, groupMods, tables_select, tables_modify, pagetypes_select, non_exclude_fields, explicit_allowdeny , allowed_languages;;;;2-2-2, custom_options;;;;3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.mounts_and_workspaces, workspace_perms;;;;1-1-1, db_mountpoints;;;;2-2-2, file_mountpoints;;;;3-3-3, fileoper_perms,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.options, lockToDomain;;;;1-1-1, hide_in_lists;;;;2-2-2, TSconfig;;;;3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_groups.tabs.extended, tx_templavoila_access;;;;1-1-1, tx_news_categorymounts;;;;1-1-1',
            ),
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => ',tx_templavoila_access,tx_news_categorymounts',
        ),
    ),
  'be_users' =>
    array (
      'ctrl' =>
        array (
          'label' => 'username',
          'tstamp' => 'tstamp',
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'default_sortby' => 'ORDER BY admin, username',
          'enablecolumns' =>
            array (
              'disabled' => 'disable',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'type' => 'admin',
          'typeicon_column' => 'admin',
          'typeicons' =>
            array (
              0 => 'be_users.gif',
              1 => 'be_users_admin.gif',
            ),
          'typeicon_classes' =>
            array (
              0 => 'status-user-backend',
              1 => 'status-user-admin',
              'default' => 'status-user-backend',
            ),
          'mainpalette' => '1',
          'useColumnsForDefaultValues' => 'usergroup,lockToDomain,options,db_mountpoints,file_mountpoints,fileoper_perms,userMods',
          'dividers2tabs' => true,
          'versioningWS_alwaysAllowLiveEdit' => true,
          'searchFields' => 'username,email,realName',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'username,usergroup,db_mountpoints,file_mountpoints,admin,options,fileoper_perms,userMods,lockToDomain,realName,email,disable,starttime,endtime,lastlogin',
        ),
      'columns' =>
        array (
          'username' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.username',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'max' => '50',
                  'eval' => 'nospace,lower,unique,required',
                ),
            ),
          'password' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.password',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'max' => 100,
                  'eval' => 'required,md5,password',
                ),
            ),
          'usergroup' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'be_groups',
                  'foreign_table_where' => 'ORDER BY be_groups.title',
                  'size' => '5',
                  'maxitems' => '20',
                  'iconsInOptionTags' => 1,
                  'wizards' =>
                    array (
                      '_PADDING' => 1,
                      '_VERTICAL' => 1,
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_edit_title',
                          'script' => 'wizard_edit.php',
                          'popup_onlyOpenIfSelected' => 1,
                          'icon' => 'edit2.gif',
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_add_title',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'be_groups',
                              'pid' => '0',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                      'list' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.usergroup_list_title',
                          'icon' => 'list.gif',
                          'params' =>
                            array (
                              'table' => 'be_groups',
                              'pid' => '0',
                            ),
                          'script' => 'wizard_list.php',
                        ),
                    ),
                ),
            ),
          'lockToDomain' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:lockToDomain',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '50',
                  'softref' => 'substitute',
                ),
            ),
          'db_mountpoints' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.options_db_mounts',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '3',
                  'maxitems' => 25,
                  'autoSizeMax' => 10,
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'file_mountpoints' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.options_file_mounts',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_filemounts',
                  'foreign_table_where' => ' AND sys_filemounts.pid=0 ORDER BY sys_filemounts.title',
                  'size' => '3',
                  'maxitems' => 25,
                  'autoSizeMax' => 10,
                  'iconsInOptionTags' => 1,
                  'wizards' =>
                    array (
                      '_PADDING' => 1,
                      '_VERTICAL' => 1,
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_edit_title',
                          'script' => 'wizard_edit.php',
                          'icon' => 'edit2.gif',
                          'popup_onlyOpenIfSelected' => 1,
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_add_title',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'sys_filemounts',
                              'pid' => '0',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                      'list' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:file_mountpoints_list_title',
                          'icon' => 'list.gif',
                          'params' =>
                            array (
                              'table' => 'sys_filemounts',
                              'pid' => '0',
                            ),
                          'script' => 'wizard_list.php',
                        ),
                    ),
                ),
            ),
          'email' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '80',
                  'softref' => 'email[subst]',
                ),
            ),
          'realName' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '80',
                ),
            ),
          'disable' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'disableIPlock' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.disableIPlock',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'admin' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.admin',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'options' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.options',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.options_db_mounts',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.options_file_mounts',
                          1 => 0,
                        ),
                    ),
                  'default' => '3',
                ),
            ),
          'fileoper_perms' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms_general',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms_unzip',
                          1 => 0,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms_diroper_perms',
                          1 => 0,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms_diroper_perms_copy',
                          1 => 0,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:be_users.fileoper_perms_diroper_perms_delete',
                          1 => 0,
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'workspace_perms' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:workspace_perms',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:workspace_perms_live',
                          1 => 0,
                        ),
                    ),
                  'default' => 1,
                ),
            ),
          'starttime' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 2145913200,
                    ),
                ),
            ),
          'lang' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:be_users.lang',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'English',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'Afrikaans',
                          1 => 'af',
                        ),
                      2 =>
                        array (
                          0 => 'Albanian',
                          1 => 'sq',
                        ),
                      3 =>
                        array (
                          0 => 'Arabic',
                          1 => 'ar',
                        ),
                      4 =>
                        array (
                          0 => 'Basque',
                          1 => 'eu',
                        ),
                      5 =>
                        array (
                          0 => 'Bosnian',
                          1 => 'bs',
                        ),
                      6 =>
                        array (
                          0 => 'Brazilian Portuguese',
                          1 => 'pt_BR',
                        ),
                      7 =>
                        array (
                          0 => 'Bulgarian',
                          1 => 'bg',
                        ),
                      8 =>
                        array (
                          0 => 'Catalan',
                          1 => 'ca',
                        ),
                      9 =>
                        array (
                          0 => 'Chinese (Simpl.)',
                          1 => 'ch',
                        ),
                      10 =>
                        array (
                          0 => 'Chinese (Trad.)',
                          1 => 'zh',
                        ),
                      11 =>
                        array (
                          0 => 'Croatian',
                          1 => 'hr',
                        ),
                      12 =>
                        array (
                          0 => 'Czech',
                          1 => 'cs',
                        ),
                      13 =>
                        array (
                          0 => 'Danish',
                          1 => 'da',
                        ),
                      14 =>
                        array (
                          0 => 'Dutch',
                          1 => 'nl',
                        ),
                      15 =>
                        array (
                          0 => 'Esperanto',
                          1 => 'eo',
                        ),
                      16 =>
                        array (
                          0 => 'Estonian',
                          1 => 'et',
                        ),
                      17 =>
                        array (
                          0 => 'Faroese',
                          1 => 'fo',
                        ),
                      18 =>
                        array (
                          0 => 'Finnish',
                          1 => 'fi',
                        ),
                      19 =>
                        array (
                          0 => 'French',
                          1 => 'fr',
                        ),
                      20 =>
                        array (
                          0 => 'French (Canada)',
                          1 => 'fr_CA',
                        ),
                      21 =>
                        array (
                          0 => 'Galician',
                          1 => 'gl',
                        ),
                      22 =>
                        array (
                          0 => 'Georgian',
                          1 => 'ka',
                        ),
                      23 =>
                        array (
                          0 => 'German',
                          1 => 'de',
                        ),
                      24 =>
                        array (
                          0 => 'Greek',
                          1 => 'el',
                        ),
                      25 =>
                        array (
                          0 => 'Greenlandic',
                          1 => 'kl',
                        ),
                      26 =>
                        array (
                          0 => 'Hebrew',
                          1 => 'he',
                        ),
                      27 =>
                        array (
                          0 => 'Hindi',
                          1 => 'hi',
                        ),
                      28 =>
                        array (
                          0 => 'Hungarian',
                          1 => 'hu',
                        ),
                      29 =>
                        array (
                          0 => 'Icelandic',
                          1 => 'is',
                        ),
                      30 =>
                        array (
                          0 => 'Italian',
                          1 => 'it',
                        ),
                      31 =>
                        array (
                          0 => 'Japanese',
                          1 => 'ja',
                        ),
                      32 =>
                        array (
                          0 => 'Khmer',
                          1 => 'km',
                        ),
                      33 =>
                        array (
                          0 => 'Korean',
                          1 => 'ko',
                        ),
                      34 =>
                        array (
                          0 => 'Latvian',
                          1 => 'lv',
                        ),
                      35 =>
                        array (
                          0 => 'Lithuanian',
                          1 => 'lt',
                        ),
                      36 =>
                        array (
                          0 => 'Malay',
                          1 => 'ms',
                        ),
                      37 =>
                        array (
                          0 => 'Norwegian',
                          1 => 'no',
                        ),
                      38 =>
                        array (
                          0 => 'Persian',
                          1 => 'fa',
                        ),
                      39 =>
                        array (
                          0 => 'Polish',
                          1 => 'pl',
                        ),
                      40 =>
                        array (
                          0 => 'Portuguese',
                          1 => 'pt',
                        ),
                      41 =>
                        array (
                          0 => 'Romanian',
                          1 => 'ro',
                        ),
                      42 =>
                        array (
                          0 => 'Russian',
                          1 => 'ru',
                        ),
                      43 =>
                        array (
                          0 => 'Serbian',
                          1 => 'sr',
                        ),
                      44 =>
                        array (
                          0 => 'Slovak',
                          1 => 'sk',
                        ),
                      45 =>
                        array (
                          0 => 'Slovenian',
                          1 => 'sl',
                        ),
                      46 =>
                        array (
                          0 => 'Spanish',
                          1 => 'es',
                        ),
                      47 =>
                        array (
                          0 => 'Swedish',
                          1 => 'sv',
                        ),
                      48 =>
                        array (
                          0 => 'Thai',
                          1 => 'th',
                        ),
                      49 =>
                        array (
                          0 => 'Turkish',
                          1 => 'tr',
                        ),
                      50 =>
                        array (
                          0 => 'Ukrainian',
                          1 => 'uk',
                        ),
                      51 =>
                        array (
                          0 => 'Vietnamese',
                          1 => 'vi',
                        ),
                    ),
                ),
            ),
          'userMods' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:userMods',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'modListUser',
                  'size' => '5',
                  'autoSizeMax' => 50,
                  'maxitems' => '100',
                  'renderMode' => 'checkbox',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'allowed_languages' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:allowed_languages',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'languages',
                  'maxitems' => '1000',
                  'renderMode' => 'checkbox',
                ),
            ),
          'TSconfig' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:TSconfig',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '5',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:TSconfig_title',
                          'script' => 'wizard_tsconfig.php?mode=beuser',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'TSconfig',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'createdByAction' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'lastlogin' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.lastlogin',
              'config' =>
                array (
                  'type' => 'input',
                  'readOnly' => '1',
                  'size' => '12',
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'tx_news_categorymounts' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:be_user.tx_news_categorymounts',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'tx_news_domain_model_category',
                  'foreign_table_where' => ' AND (tx_news_domain_model_category.sys_language_uid = 0 OR tx_news_domain_model_category.l10n_parent = 0) ORDER BY tx_news_domain_model_category.sorting',
                  'renderMode' => 'tree',
                  'subType' => 'db',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parentcategory',
                      'appearance' =>
                        array (
                          'expandAll' => true,
                          'showHeader' => false,
                          'maxLevels' => 99,
                        ),
                    ),
                  'size' => 10,
                  'autoSizeMax' => 20,
                  'minitems' => 0,
                  'maxitems' => 99,
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'disable;;;;1-1-1, username;;;;2-2-2, password, usergroup;;;;3-3-3, admin;;;;1-1-1, realName;;;;3-3-3, email, lang, lastlogin;;;;1-1-1,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.rights, userMods;;;;2-2-2, allowed_languages,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.mounts_and_workspaces, workspace_perms;;;;1-1-1, db_mountpoints;;;;2-2-2, options, file_mountpoints;;;;3-3-3, fileoper_perms,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.options, lockToDomain;;;;1-1-1, disableIPlock, TSconfig;;;;2-2-2,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.access, starttime;;;;1-1-1,endtime,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.extended, tx_news_categorymounts;;;;1-1-1',
            ),
          1 =>
            array (
              'showitem' => 'disable;;;;1-1-1, username;;;;2-2-2, password, usergroup;;;;3-3-3, admin;;;;1-1-1, realName;;;;3-3-3, email, lang, lastlogin;;;;1-1-1,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.options, disableIPlock;;;;1-1-1, TSconfig;;;;2-2-2, db_mountpoints;;;;3-3-3, options, file_mountpoints;;;;4-4-4,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.access, starttime;;;;1-1-1,endtime,
			--div--;LLL:EXT:lang/locallang_tca.xlf:be_users.tabs.extended, tx_news_categorymounts;;;;1-1-1',
            ),
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => ',tx_news_categorymounts',
        ),
    ),
  'pages' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'sortby' => 'sorting',
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:pages',
          'type' => 'doktype',
          'versioningWS' => 2,
          'origUid' => 't3_origuid',
          'delete' => 'deleted',
          'crdate' => 'crdate',
          'hideAtCopy' => 1,
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'cruser_id' => 'cruser_id',
          'editlock' => 'editlock',
          'useColumnsForDefaultValues' => 'doktype,fe_group,hidden',
          'dividers2tabs' => 1,
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
              'fe_group' => 'fe_group',
            ),
          'transForeignTable' => 'pages_language_overlay',
          'typeicon_column' => 'doktype',
          'typeicon_classes' =>
            array (
              1 => 'apps-pagetree-page-default',
              '1-hideinmenu' => 'apps-pagetree-page-not-in-menu',
              '1-root' => 'apps-pagetree-page-domain',
              3 => 'apps-pagetree-page-shortcut-external',
              '3-hideinmenu' => 'apps-pagetree-page-shortcut-external-hideinmenu',
              '3-root' => 'apps-pagetree-page-shortcut-external-root',
              4 => 'apps-pagetree-page-shortcut',
              '4-hideinmenu' => 'apps-pagetree-page-shortcut-hideinmenu',
              '4-root' => 'apps-pagetree-page-shortcut-root',
              6 => 'apps-pagetree-page-backend-users',
              '6-hideinmenu' => 'apps-pagetree-page-backend-users-hideinmenu',
              '6-root' => 'apps-pagetree-page-backend-users-root',
              7 => 'apps-pagetree-page-mountpoint',
              '7-hideinmenu' => 'apps-pagetree-page-mountpoint-hideinmenu',
              '7-root' => 'apps-pagetree-page-mountpoint-root',
              199 => 'apps-pagetree-spacer',
              '199-hideinmenu' => 'apps-pagetree-spacer',
              '199-root' => 'apps-pagetree-page-domain',
              254 => 'apps-pagetree-folder-default',
              '254-hideinmenu' => 'apps-pagetree-folder-default',
              '254-root' => 'apps-pagetree-page-domain',
              255 => 'apps-pagetree-page-recycler',
              '255-hideinmenu' => 'apps-pagetree-page-recycler',
              'contains-shop' => 'apps-pagetree-folder-contains-shop',
              'contains-approve' => 'apps-pagetree-folder-contains-approve',
              'contains-fe_users' => 'apps-pagetree-folder-contains-fe_users',
              'contains-board' => 'apps-pagetree-folder-contains-board',
              'contains-news' => 'tcarecords-pages-contains-news',
              'default' => 'apps-pagetree-page-default',
              'contains-formlogs' => 'tcarecords-pages-contains-formlogs',
            ),
          'typeicons' =>
            array (
              1 => 'pages.gif',
              254 => 'sysf.gif',
              255 => 'recycler.gif',
            ),
          'searchFields' => 'title,alias,nav_title,subtitle,url,keywords,description,abstract,author,author_email',
          'requestUpdate' => ',tx_realurl_exclude',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'doktype,title,alias,hidden,starttime,endtime,fe_group,url,target,no_cache,shortcut,keywords,description,abstract,newUntil,lastUpdated,cache_timeout,cache_tags,backend_layout,backend_layout_next_level',
          'maxDBListItems' => 30,
          'maxSingleDBListItems' => 50,
        ),
      'columns' =>
        array (
          'doktype' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.page',
                          1 => '--div--',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.0',
                          1 => '1',
                          2 => 'i/pages.gif',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.4',
                          1 => '6',
                          2 => 'i/be_users_section.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.link',
                          1 => '--div--',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.2',
                          1 => '4',
                          2 => 'i/pages_shortcut.gif',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.5',
                          1 => '7',
                          2 => 'i/pages_mountpoint.gif',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.8',
                          1 => '3',
                          2 => 'i/pages_link.gif',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.special',
                          1 => '--div--',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.folder',
                          1 => '254',
                          2 => 'i/sysf.gif',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.2',
                          1 => '255',
                          2 => 'i/recycler.gif',
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.7',
                          1 => '199',
                          2 => 'i/spacer_icon.gif',
                        ),
                    ),
                  'default' => '1',
                  'iconsInOptionTags' => 1,
                  'noIconsBelowSelect' => 1,
                ),
            ),
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => 'trim,required',
                ),
            ),
          'TSconfig' =>
            array (
              'exclude' => 1,
              'label' => 'TSconfig:',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '5',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'type' => 'popup',
                          'title' => 'TSconfig QuickReference',
                          'script' => 'wizard_tsconfig.php?mode=page',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'TSconfig',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'php_tree_stop' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:php_tree_stop',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'storage_pid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:storage_pid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'tx_impexp_origuid' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'max' => '255',
                ),
            ),
          'editlock' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:editlock',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '1',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.hidden_checkbox_1_formlabel',
                        ),
                    ),
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 2145913200,
                    ),
                ),
            ),
          'layout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.layout',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.layout.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.layout.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.layout.I.3',
                          1 => '3',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'url_scheme' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.url_scheme',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.url_scheme.http',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.url_scheme.https',
                          1 => 2,
                        ),
                    ),
                  'default' => 0,
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 7,
                  'maxitems' => 20,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
                          1 => -2,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'exclusiveKeys' => '-1,-2',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                ),
            ),
          'extendToSubpages' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.extendToSubpages',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'nav_title' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.nav_title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => 'trim',
                ),
            ),
          'nav_hide' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.nav_hide',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.nav_hide_checkbox_1_formlabel',
                        ),
                    ),
                ),
            ),
          'subtitle' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.subtitle',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => '',
                ),
            ),
          'target' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.target',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '80',
                  'eval' => 'trim',
                ),
            ),
          'alias' =>
            array (
              'exclude' => 1,
              'displayCond' => 'VERSION:IS:false',
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.alias',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '32',
                  'eval' => 'nospace,alphanum_x,lower,unique',
                  'softref' => 'notify',
                ),
            ),
          'url' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.url',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'max' => '255',
                  'eval' => 'trim,required',
                  'softref' => 'url',
                ),
            ),
          'urltype' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.automatic',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'http://',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'https://',
                          1 => '4',
                        ),
                      3 =>
                        array (
                          0 => 'ftp://',
                          1 => '2',
                        ),
                      4 =>
                        array (
                          0 => 'mailto:',
                          1 => '3',
                        ),
                    ),
                  'default' => '1',
                ),
            ),
          'lastUpdated' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.lastUpdated',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'newUntil' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.newUntil',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                ),
            ),
          'cache_timeout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.1',
                          1 => 60,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.2',
                          1 => 300,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.3',
                          1 => 900,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.4',
                          1 => 1800,
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.5',
                          1 => 3600,
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.6',
                          1 => 14400,
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.7',
                          1 => 86400,
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.8',
                          1 => 172800,
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.9',
                          1 => 604800,
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout.I.10',
                          1 => 2678400,
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'cache_tags' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.cache_tags',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                  'eval' => '',
                ),
            ),
          'no_cache' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.no_cache',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.no_cache_checkbox_1_formlabel',
                        ),
                    ),
                ),
            ),
          'no_search' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.no_search',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.no_search_checkbox_1_formlabel',
                        ),
                    ),
                ),
            ),
          'shortcut' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.shortcut_page',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'shortcut_mode' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.2',
                          1 => 2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.3',
                          1 => 3,
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'content_from_pid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.content_from_pid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'mount_pid' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'keywords' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.keywords',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag',
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag',
                ),
            ),
          'abstract' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.abstract',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag',
                ),
            ),
          'author' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.author',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'eval' => 'trim',
                  'max' => '80',
                ),
            ),
          'author_email' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'eval' => 'trim',
                  'max' => '80',
                  'softref' => 'email[subst]',
                ),
            ),
          'media' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.media',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'sys_file_reference',
                  'foreign_field' => 'uid_foreign',
                  'foreign_sortby' => 'sorting_foreign',
                  'foreign_table_field' => 'tablenames',
                  'foreign_match_fields' =>
                    array (
                      'fieldname' => 'media',
                    ),
                  'foreign_label' => 'uid_local',
                  'foreign_selector' => 'uid_local',
                  'foreign_selector_fieldTcaOverride' =>
                    array (
                      'config' =>
                        array (
                          'appearance' =>
                            array (
                              'elementBrowserType' => 'file',
                              'elementBrowserAllowed' => '',
                            ),
                        ),
                    ),
                  'filter' =>
                    array (
                      0 =>
                        array (
                          'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                          'parameters' =>
                            array (
                              'allowedFileExtensions' => '',
                              'disallowedFileExtensions' => '',
                            ),
                        ),
                    ),
                  'appearance' =>
                    array (
                      'useSortable' => true,
                      'headerThumbnail' =>
                        array (
                          'field' => 'uid_local',
                          'width' => '64',
                          'height' => '64',
                        ),
                      'showPossibleLocalizationRecords' => true,
                      'showRemovedLocalizationRecords' => true,
                      'showSynchronizationLink' => true,
                      'enabledControls' =>
                        array (
                          'info' => false,
                          'new' => false,
                          'dragdrop' => true,
                          'sort' => false,
                          'hide' => true,
                          'delete' => true,
                          'localize' => true,
                        ),
                    ),
                  'behaviour' =>
                    array (
                      'localizationMode' => 'select',
                      'localizeChildrenAtParentLocalization' => true,
                    ),
                ),
            ),
          'is_siteroot' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.is_siteroot',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'mount_pid_ol' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol',
              'config' =>
                array (
                  'type' => 'radio',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol.I.1',
                          1 => 1,
                        ),
                    ),
                ),
            ),
          'module' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.module',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                          2 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.module.I.4',
                          1 => 'fe_users',
                          2 => 'i/fe_users.gif',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:formhandler/Resources/Language/locallang.xml:title',
                          1 => 'formlogs',
                          2 => '../typo3conf/ext/formhandler/ext_icon.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xml:news-folder',
                          1 => 'news',
                          2 => '../typo3conf/ext/news/Resources/Public/Icons/folder.gif',
                        ),
                    ),
                  'default' => '',
                  'iconsInOptionTags' => 1,
                  'noIconsBelowSelect' => 1,
                ),
            ),
          'fe_login_mode' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode.enable',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode.disableAll',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode.disableGroups',
                          1 => 3,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode.enableAgain',
                          1 => 2,
                        ),
                    ),
                ),
            ),
          'l18n_cfg' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.l18n_cfg',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.l18n_cfg.I.1',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.l18n_cfg.I.2',
                          1 => '',
                        ),
                    ),
                ),
            ),
          'backend_layout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.backend_layout_formlabel',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'backend_layout',
                  'foreign_table_where' => 'AND ( ( ###PAGE_TSCONFIG_ID### = 0 AND ###STORAGE_PID### = 0 ) OR ( backend_layout.pid = ###PAGE_TSCONFIG_ID### OR backend_layout.pid = ###STORAGE_PID### ) OR ( ###PAGE_TSCONFIG_ID### = 0 AND backend_layout.pid = ###THIS_UID### ) ) AND backend_layout.hidden = 0 ORDER BY backend_layout.sorting',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.backend_layout.none',
                          1 => -1,
                        ),
                    ),
                  'selicon_cols' => 5,
                  'size' => 1,
                  'maxitems' => 1,
                  'default' => '',
                ),
            ),
          'backend_layout_next_level' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.backend_layout_next_level_formlabel',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'backend_layout',
                  'foreign_table_where' => 'AND ( ( ###PAGE_TSCONFIG_ID### = 0 AND ###STORAGE_PID### = 0 ) OR ( backend_layout.pid = ###PAGE_TSCONFIG_ID### OR backend_layout.pid = ###STORAGE_PID### ) OR ( ###PAGE_TSCONFIG_ID### = 0 AND backend_layout.pid = ###THIS_UID### ) ) AND backend_layout.hidden = 0 ORDER BY backend_layout.sorting',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.backend_layout.none',
                          1 => -1,
                        ),
                    ),
                  'selicon_cols' => 5,
                  'size' => 1,
                  'maxitems' => 1,
                  'default' => '',
                ),
            ),
          'tx_templavoila_ds' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:pages.tx_templavoila_ds',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'allowNonIdValues' => 1,
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->dataSourceItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'suppress_icons' => 'ONLY_SELECTED',
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_to' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:pages.tx_templavoila_to',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->templateObjectItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'suppress_icons' => 'ONLY_SELECTED',
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_next_ds' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:pages.tx_templavoila_next_ds',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'allowNonIdValues' => 1,
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->dataSourceItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'suppress_icons' => 'ONLY_SELECTED',
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_next_to' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:pages.tx_templavoila_next_to',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->templateObjectItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'suppress_icons' => 'ONLY_SELECTED',
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_flex' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:pages.tx_templavoila_flex',
              'config' =>
                array (
                  'type' => 'flex',
                  'ds_pointerField' => 'tx_templavoila_ds',
                  'ds_pointerField_searchParent' => 'pid',
                  'ds_pointerField_searchParent_subField' => 'tx_templavoila_next_ds',
                  'ds_tableField' => 'tx_templavoila_datastructure:dataprot',
                ),
            ),
          'tx_realurl_pathsegment' =>
            array (
              'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_pathsegment',
              'displayCond' => 'FIELD:tx_realurl_exclude:!=:1',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'input',
                  'max' => 255,
                  'eval' => 'trim,nospace,lower',
                ),
            ),
          'tx_realurl_pathoverride' =>
            array (
              'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_path_override',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                        ),
                    ),
                ),
            ),
          'tx_realurl_exclude' =>
            array (
              'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_exclude',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                        ),
                    ),
                ),
            ),
          'tx_realurl_nocache' =>
            array (
              'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_nocache',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                        ),
                    ),
                ),
            ),
          'PublicationTitle' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - titel',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationAuthor' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - forfatter',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationYear' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - Ã¥rstal',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationPublisher' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - udgiver',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationIntroduction' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - introduktion',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 40,
                  'rows' => 15,
                  'eval' => 'trim',
                  'wizards' =>
                    array (
                      'RTE' =>
                        array (
                          'icon' => 'wizard_rte2.gif',
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'script' => 'wizard_rte.php',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                          'type' => 'script',
                        ),
                    ),
                ),
              'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
            ),
          'PublicationImage' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - billede',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'uploadfolder' => 'uploads/tx_templavoila',
                  'show_thumbs' => 1,
                  'size' => 1,
                  'maxitems' => 1,
                  'allowed' => 'jpg,jpeg,png,gif',
                  'disallowed' => '',
                ),
            ),
          'PublicationISBN' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - ISBN',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationElectronicISBN' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - elektronisk ISBN',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationPages' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - antal sider',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationFormat' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - format',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationType' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - publikationstype',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationFile' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - PDF version',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'uploadfolder' => 'uploads/tx_templavoila',
                  'show_thumbs' => 1,
                  'size' => 1,
                  'maxitems' => 1,
                  'allowed' => 'pdf',
                  'disallowed' => '',
                ),
            ),
          'PublicationHTMLLink' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - link til HTML version',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationOrderLink' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - bestillingslink',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationBuyLink' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - k&oslash;bslink',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'PublicationIsActive' =>
            array (
              'exclude' => 0,
              'label' => 'PublicationIsActive',
              'config' =>
                array (
                  'type' => 'check',
                  'eval' => 'trim',
                ),
            ),
          'PublicationPublishingForm' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - udgivelsesform',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_pages_publicationpublishingform_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
          'PublicationAcquisition' =>
            array (
              'exclude' => 0,
              'label' => 'Publikation - akkvisition',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_pages_publicationacquisition_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
          'BoardDescription' =>
            array (
              'exclude' => 0,
              'label' => 'BoardDescription',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 40,
                  'rows' => 15,
                  'eval' => 'trim',
                  'wizards' =>
                    array (
                      'RTE' =>
                        array (
                          'icon' => 'wizard_rte2.gif',
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'script' => 'wizard_rte.php',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                          'type' => 'script',
                        ),
                    ),
                ),
              'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
            ),
          'foundation_short' =>
            array (
              'exclude' => 0,
              'label' => 'Fond - kort',
              'config' =>
                array (
                  'type' => 'text',
                  'eval' => 'trim',
                  'max' => 250,
                ),
            ),
          'foundation_long' =>
            array (
              'exclude' => 0,
              'label' => 'Fond - lang',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 80,
                  'rows' => 10,
                  'eval' => 'trim',
                  'max' => 3000,
                  'softref' => 'rtehtmlarea',
                ),
            ),
          'foundation_link' =>
            array (
              'exclude' => 0,
              'label' => 'Link',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                ),
            ),
          'foundation_image' =>
            array (
              'exclude' => 0,
              'label' => 'Billede',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'jpg,jpeg,png,gif',
                  'show_thumbs' => 1,
                  'uploadfolder' => 'uploads/tx_kumfoundations/',
                  'eval' => 'trim',
                  'max_size' => '1096000',
                ),
            ),
          'categories' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.categories',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
                  'MM' => 'sys_category_record_mm',
                  'MM_opposite_field' => 'items',
                  'MM_match_fields' =>
                    array (
                      'tablenames' => 'pages',
                    ),
                  'size' => 10,
                  'autoSizeMax' => 50,
                  'maxitems' => 9999,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'appearance' =>
                        array (
                          'expandAll' => true,
                          'showHeader' => true,
                        ),
                    ),
                  'wizards' =>
                    array (
                      '_PADDING' => 1,
                      '_VERTICAL' => 1,
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Edit',
                          'script' => 'wizard_edit.php',
                          'icon' => 'edit2.gif',
                          'popup_onlyOpenIfSelected' => 1,
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'Create new',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'sys_category',
                              'pid' => '###CURRENT_PID###',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment;;137;;,tx_realurl_exclude, tx_templavoila_flex;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;visibility, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.metatags;metatags, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.appearance, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.layout;layout, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.replace;replace, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.links;links, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.caching;caching, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.language;language, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.module;module, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.storage;storage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.config;config, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          3 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.external;external, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_templavoila_flex;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;visibility, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.appearance, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.layout;layout, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.links;links, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.language;language, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.storage;storage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.config;config, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          4 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.shortcut;shortcut, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.shortcutpage;shortcutpage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment;;137;;,tx_realurl_exclude, tx_templavoila_flex;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;visibility, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.appearance, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.layout;layout, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.links;links, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.language;language, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.storage;storage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.config;config, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          7 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.mountpoint;mountpoint, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.mountpage;mountpage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_templavoila_flex;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;visibility, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.appearance, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.layout;layout, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.links;links, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.language;language, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;miscellaneous, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.config;config, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          199 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;adminsonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_templavoila_flex;;;;1-1-1, tx_realurl_pathsegment;;137;;,tx_realurl_exclude, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          254 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;adminsonly,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.module;module,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.storage;storage,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.config;config,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_templavoila_flex;;;;1-1-1, tx_realurl_pathsegment;;137;;,tx_realurl_exclude, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
          255 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.behaviour,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.miscellaneous;adminsonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_templavoila_flex;;;;1-1-1, --div--;Publikation,PublicationTitle,PublicationAuthor,PublicationYear,PublicationPublisher,PublicationIntroduction,PublicationImage,PublicationISBN,PublicationElectronicISBN,PublicationPages,PublicationFormat,PublicationType,PublicationPublishingForm,PublicationAcquisition,PublicationFile,PublicationHTMLLink,PublicationOrderLink,PublicationBuyLink,PublicationIsActive, --div--;Fond,foundation_short,foundation_long,foundation_amount,foundation_hasform,foundation_deadline,foundation_link,foundation_image, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'starttime, endtime, extendToSubpages',
            ),
          2 =>
            array (
              'showitem' => 'layout, lastUpdated, newUntil, no_search',
            ),
          3 =>
            array (
              'showitem' => 'alias, target, no_cache, cache_timeout, tx_realurl_nocache, cache_tags, url_scheme',
            ),
          5 =>
            array (
              'showitem' => 'author, author_email',
              'canNotCollapse' => 1,
            ),
          6 =>
            array (
              'showitem' => 'php_tree_stop, editlock',
            ),
          7 =>
            array (
              'showitem' => 'is_siteroot',
            ),
          8 =>
            array (
              'showitem' => 'backend_layout_next_level',
            ),
          'standard' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel',
              'canNotCollapse' => 1,
            ),
          'shortcut' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, shortcut_mode;LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode_formlabel',
              'canNotCollapse' => 1,
            ),
          'shortcutpage' =>
            array (
              'showitem' => 'shortcut;LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_formlabel',
              'canNotCollapse' => 1,
            ),
          'mountpoint' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, mount_pid_ol;LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_ol_formlabel',
              'canNotCollapse' => 1,
            ),
          'mountpage' =>
            array (
              'showitem' => 'mount_pid;LLL:EXT:cms/locallang_tca.xlf:pages.mount_pid_formlabel',
              'canNotCollapse' => 1,
            ),
          'external' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, urltype;LLL:EXT:cms/locallang_tca.xlf:pages.urltype_formlabel, url;LLL:EXT:cms/locallang_tca.xlf:pages.url_formlabel',
              'canNotCollapse' => 1,
            ),
          'title' =>
            array (
              'showitem' => 'title;LLL:EXT:cms/locallang_tca.xlf:pages.title_formlabel, --linebreak--, nav_title;LLL:EXT:cms/locallang_tca.xlf:pages.nav_title_formlabel, --linebreak--, subtitle;LLL:EXT:cms/locallang_tca.xlf:pages.subtitle_formlabel',
              'canNotCollapse' => 1,
            ),
          'titleonly' =>
            array (
              'showitem' => 'title;LLL:EXT:cms/locallang_tca.xlf:pages.title_formlabel',
              'canNotCollapse' => 1,
            ),
          'visibility' =>
            array (
              'showitem' => 'hidden;LLL:EXT:cms/locallang_tca.xlf:pages.hidden_formlabel, nav_hide;LLL:EXT:cms/locallang_tca.xlf:pages.nav_hide_formlabel',
              'canNotCollapse' => 1,
            ),
          'hiddenonly' =>
            array (
              'showitem' => 'hidden;LLL:EXT:cms/locallang_tca.xlf:pages.hidden_formlabel',
              'canNotCollapse' => 1,
            ),
          'access' =>
            array (
              'showitem' => 'starttime;LLL:EXT:cms/locallang_tca.xlf:pages.starttime_formlabel, endtime;LLL:EXT:cms/locallang_tca.xlf:pages.endtime_formlabel, extendToSubpages;LLL:EXT:cms/locallang_tca.xlf:pages.extendToSubpages_formlabel, --linebreak--, fe_group;LLL:EXT:cms/locallang_tca.xlf:pages.fe_group_formlabel, --linebreak--, fe_login_mode;LLL:EXT:cms/locallang_tca.xlf:pages.fe_login_mode_formlabel',
              'canNotCollapse' => 1,
            ),
          'abstract' =>
            array (
              'showitem' => 'abstract;LLL:EXT:cms/locallang_tca.xlf:pages.abstract_formlabel',
              'canNotCollapse' => 1,
            ),
          'metatags' =>
            array (
              'showitem' => 'keywords;LLL:EXT:cms/locallang_tca.xlf:pages.keywords_formlabel, --linebreak--, description;LLL:EXT:cms/locallang_tca.xlf:pages.description_formlabel',
              'canNotCollapse' => 1,
            ),
          'editorial' =>
            array (
              'showitem' => 'author;LLL:EXT:cms/locallang_tca.xlf:pages.author_formlabel, author_email;LLL:EXT:cms/locallang_tca.xlf:pages.author_email_formlabel, lastUpdated;LLL:EXT:cms/locallang_tca.xlf:pages.lastUpdated_formlabel',
              'canNotCollapse' => 1,
            ),
          'layout' =>
            array (
              'showitem' => 'layout;LLL:EXT:cms/locallang_tca.xlf:pages.layout_formlabel, newUntil;LLL:EXT:cms/locallang_tca.xlf:pages.newUntil_formlabel, --linebreak--, tx_templavoila_to;;;;1-1-1, tx_templavoila_next_to;;;;1-1-1',
              'canNotCollapse' => 1,
            ),
          'module' =>
            array (
              'showitem' => 'module;LLL:EXT:cms/locallang_tca.xlf:pages.module_formlabel',
              'canNotCollapse' => 1,
            ),
          'replace' =>
            array (
              'showitem' => 'content_from_pid;LLL:EXT:cms/locallang_tca.xlf:pages.content_from_pid_formlabel',
              'canNotCollapse' => 1,
            ),
          'links' =>
            array (
              'showitem' => 'alias;LLL:EXT:cms/locallang_tca.xlf:pages.alias_formlabel, --linebreak--, target;LLL:EXT:cms/locallang_tca.xlf:pages.target_formlabel, --linebreak--, url_scheme;LLL:EXT:cms/locallang_tca.xlf:pages.url_scheme_formlabel',
              'canNotCollapse' => 1,
            ),
          'caching' =>
            array (
              'showitem' => 'cache_timeout;LLL:EXT:cms/locallang_tca.xlf:pages.cache_timeout_formlabel, cache_tags, no_cache;LLL:EXT:cms/locallang_tca.xlf:pages.no_cache_formlabel',
              'canNotCollapse' => 1,
            ),
          'language' =>
            array (
              'showitem' => 'l18n_cfg;LLL:EXT:cms/locallang_tca.xlf:pages.l18n_cfg_formlabel',
              'canNotCollapse' => 1,
            ),
          'miscellaneous' =>
            array (
              'showitem' => 'is_siteroot;LLL:EXT:cms/locallang_tca.xlf:pages.is_siteroot_formlabel, no_search;LLL:EXT:cms/locallang_tca.xlf:pages.no_search_formlabel, editlock;LLL:EXT:cms/locallang_tca.xlf:pages.editlock_formlabel, php_tree_stop;LLL:EXT:cms/locallang_tca.xlf:pages.php_tree_stop_formlabel',
              'canNotCollapse' => 1,
            ),
          'adminsonly' =>
            array (
              'showitem' => 'editlock;LLL:EXT:cms/locallang_tca.xlf:pages.editlock_formlabel',
              'canNotCollapse' => 1,
            ),
          'media' =>
            array (
              'showitem' => 'media;LLL:EXT:cms/locallang_tca.xlf:pages.media_formlabel',
              'canNotCollapse' => 1,
            ),
          'storage' =>
            array (
              'showitem' => 'storage_pid;LLL:EXT:cms/locallang_tca.xlf:pages.storage_pid_formlabel',
              'canNotCollapse' => 1,
            ),
          'config' =>
            array (
              'showitem' => 'TSconfig;LLL:EXT:cms/locallang_tca.xlf:pages.TSconfig_formlabel',
              'canNotCollapse' => 1,
            ),
          137 =>
            array (
              'showitem' => 'tx_realurl_pathoverride',
            ),
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => ',tx_templavoila_ds,tx_templavoila_to,tx_templavoila_next_ds,tx_templavoila_next_to,tx_templavoila_flex',
        ),
    ),
  'sys_category' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'default_sortby' => 'ORDER BY title ASC',
          'dividers2tabs' => true,
          'versioningWS' => 2,
          'rootLevel' => -1,
          'versioning_followPages' => true,
          'origUid' => 't3_origuid',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'searchFields' => 'title,description',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-sys_category',
            ),
          'security' =>
            array (
              'ignoreRootLevelRestriction' => true,
            ),
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,description',
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'title;;1, parent,description,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.items,items,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
            ),
          'Tx_Lfinstitution_Category' =>
            array (
              'showitem' => 'title;;1, parent,description,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.items,items,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime,--div--;LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_category,',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'sys_language_uid, l10n_parent, hidden',
            ),
        ),
      'columns' =>
        array (
          't3ver_label' =>
            array (
              'displayCond' => 'FIELD:t3ver_label:REQ:true',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'none',
                  'cols' => 27,
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_category',
                  'foreign_table_where' => 'AND sys_category.uid=###REC_FIELD_l10n_parent### AND sys_category.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '10',
                  'max' => '20',
                  'eval' => 'datetime',
                  'checkbox' => '0',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'datetime',
                  'checkbox' => '0',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 2145913200,
                    ),
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.title',
              'config' =>
                array (
                  'type' => 'input',
                  'width' => '200',
                  'eval' => 'trim,required',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.description',
              'config' =>
                array (
                  'type' => 'text',
                ),
            ),
          'parent' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.parent',
              'config' =>
                array (
                  'minitems' => 0,
                  'maxitems' => 1,
                  'type' => 'select',
                  'renderMode' => 'tree',
                  'foreign_table' => 'sys_category',
                  'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1,0) ORDER BY sys_category.title ASC',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                    ),
                ),
            ),
          'items' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.items',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => '*',
                  'MM' => 'sys_category_record_mm',
                  'size' => 10,
                  'show_thumbs' => false,
                ),
            ),
          '' =>
            array (
              'config' =>
                array (
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:sys_category.tx_extbase_type.Tx_Lfinstitution_Category',
                          1 => 'Tx_Lfinstitution_Category',
                        ),
                    ),
                ),
            ),
        ),
    ),
  'sys_collection' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY crdate',
          'delete' => 'deleted',
          'type' => 'type',
          'rootLevel' => -1,
          'searchFields' => 'title,description',
          'typeicon_column' => 'type',
          'typeicon_classes' =>
            array (
              'default' => 'apps-clipboard-list',
              'static' => 'apps-clipboard-list',
              'filter' => 'actions-system-tree-search-open',
            ),
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
              'fe_group' => 'fe_group',
            ),
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title, description, table_name, items',
        ),
      'columns' =>
        array (
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '30',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_file_collection',
                  'foreign_table_where' => 'AND sys_file_collection.pid=###CURRENT_PID### AND sys_file_collection.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'checkbox' => '0',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 2145913200,
                    ),
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
                          1 => -1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
                          1 => -2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'foreign_table' => 'fe_groups',
                ),
            ),
          'table_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.table_name',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'tables',
                ),
            ),
          'items' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.items',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'prepend_tname' => true,
                  'allowed' => '*',
                  'MM' => 'sys_collection_entries',
                  'MM_hasUidField' => true,
                  'multiple' => true,
                  'size' => 5,
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '60',
                  'eval' => 'required',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '60',
                  'rows' => '5',
                ),
            ),
          'type' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_collection.type.static',
                          1 => 'static',
                        ),
                    ),
                  'default' => 'static',
                ),
            ),
        ),
      'types' =>
        array (
          'static' =>
            array (
              'showitem' => 'title;;1,type, description,table_name, items',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'starttime, endtime, fe_group, sys_language_uid, l10n_parent, l10n_diffsource, hidden',
            ),
        ),
    ),
  'sys_file' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file',
          'label' => 'name',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'type',
          'hideTable' => true,
          'rootLevel' => true,
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'default_sortby' => 'ORDER BY crdate DESC',
          'dividers2tabs' => true,
          'typeicon_column' => 'type',
          'typeicon_classes' =>
            array (
              1 => 'mimetypes-text-text',
              2 => 'mimetypes-media-image',
              3 => 'mimetypes-media-audio',
              4 => 'mimetypes-media-video',
              5 => 'mimetypes-application',
              'default' => 'mimetypes-other-other',
            ),
          'security' =>
            array (
              'ignoreWebMountRestriction' => true,
              'ignoreRootLevelRestriction' => true,
            ),
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'storage, name, description, alternative, type, mime_type, size, sha1',
        ),
      'columns' =>
        array (
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '30',
                ),
            ),
          'fileinfo' =>
            array (
              'config' =>
                array (
                  'type' => 'user',
                  'userFunc' => 'typo3/sysext/core/Classes/Resource/Hook/FileInfoHook.php:TYPO3\\CMS\\Core\\Resource\\Hook\\FileInfoHook->renderFileInfo',
                ),
            ),
          'storage' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.storage',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_file_storage',
                  'foreign_table_where' => 'ORDER BY sys_file_storage.name',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'identifier' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.identifier',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'required',
                  'readOnly' => true,
                ),
            ),
          'title' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'placeholder' => '__row|name',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                ),
            ),
          'alternative' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.alternative',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                ),
            ),
          'type' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'select',
                  'size' => '1',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.unknown',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.text',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.image',
                          1 => 2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.audio',
                          1 => 3,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.video',
                          1 => 4,
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.type.software',
                          1 => 5,
                        ),
                    ),
                ),
            ),
          'mime_type' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.mime_type',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'sha1' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.sha1',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'size' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file.size',
              'config' =>
                array (
                  'readOnly' => 1,
                  'type' => 'input',
                  'size' => '8',
                  'max' => '30',
                  'eval' => 'int',
                  'default' => 0,
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'fileinfo, name, title, description, alternative, storage',
            ),
        ),
      'palettes' =>
        array (
        ),
    ),
  'sys_file_collection' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY crdate',
          'delete' => 'deleted',
          'type' => 'type',
          'typeicon_column' => 'type',
          'typeicon_classes' =>
            array (
              'default' => 'apps-filetree-folder-media',
              'static' => 'apps-clipboard-images',
              'folder' => 'apps-filetree-folder-media',
            ),
          'requestUpdate' => 'storage',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,files,title',
        ),
      'columns' =>
        array (
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '30',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_file_collection',
                  'foreign_table_where' => 'AND sys_file_collection.pid=###CURRENT_PID### AND sys_file_collection.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'checkbox' => '0',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 2145913200,
                    ),
                ),
            ),
          'type' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.type.0',
                          1 => 'static',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.type.1',
                          1 => 'folder',
                        ),
                    ),
                ),
            ),
          'files' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.files',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'sys_file_reference',
                  'foreign_field' => 'uid_foreign',
                  'foreign_sortby' => 'sorting_foreign',
                  'foreign_table_field' => 'tablenames',
                  'foreign_match_fields' =>
                    array (
                      'fieldname' => 'files',
                    ),
                  'foreign_label' => 'uid_local',
                  'foreign_selector' => 'uid_local',
                  'foreign_selector_fieldTcaOverride' =>
                    array (
                      'config' =>
                        array (
                          'appearance' =>
                            array (
                              'elementBrowserType' => 'file',
                              'elementBrowserAllowed' => '',
                            ),
                        ),
                    ),
                  'filter' =>
                    array (
                      0 =>
                        array (
                          'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                          'parameters' =>
                            array (
                              'allowedFileExtensions' => '',
                              'disallowedFileExtensions' => '',
                            ),
                        ),
                    ),
                  'appearance' =>
                    array (
                      'useSortable' => true,
                      'headerThumbnail' =>
                        array (
                          'field' => 'uid_local',
                          'width' => '64',
                          'height' => '64',
                        ),
                      'showPossibleLocalizationRecords' => true,
                      'showRemovedLocalizationRecords' => true,
                      'showSynchronizationLink' => true,
                      'enabledControls' =>
                        array (
                          'info' => false,
                          'new' => false,
                          'dragdrop' => true,
                          'sort' => false,
                          'hide' => true,
                          'delete' => true,
                          'localize' => true,
                        ),
                    ),
                  'behaviour' =>
                    array (
                      'localizationMode' => 'select',
                      'localizeChildrenAtParentLocalization' => true,
                    ),
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'required',
                ),
            ),
          'storage' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.storage',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_file_storage',
                  'foreign_table_where' => 'ORDER BY sys_file_storage.name',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'folder' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_collection.folder',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                    ),
                  'itemsProcFunc' => 'typo3/sysext/core/Classes/Resource/Service/UserFileMountService.php:TYPO3\\CMS\\Core\\Resource\\Service\\UserFileMountService->renderTceformsSelectDropdown',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, type, files',
            ),
          'static' =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, type, files',
            ),
          'folder' =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, title;;1, type, storage, folder',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'hidden, starttime, endtime',
            ),
        ),
    ),
  'sys_file_reference' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference',
          'label' => 'uid',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'uid_local:type',
          'hideTable' => true,
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'versioningWS' => true,
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'shadowColumnsForNewPlaceholders' => 'tablenames,fieldname,uid_local,uid_foreign',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'security' =>
            array (
              'ignoreWebMountRestriction' => true,
              'ignoreRootLevelRestriction' => true,
            ),
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,uid_local,uid_foreign,tablenames,fieldname,sorting_foreign,table_local,title,description',
        ),
      'columns' =>
        array (
          't3ver_label' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '30',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_file_reference',
                  'foreign_table_where' => 'AND sys_file_reference.uid=###REC_FIELD_l10n_parent### AND sys_file_reference.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'exclude' => 0,
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'uid_local' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.uid_local',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'size' => 1,
                  'maxitems' => 1,
                  'minitems' => 0,
                  'allowed' => 'sys_file',
                ),
            ),
          'uid_foreign' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.uid_foreign',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '10',
                  'eval' => 'int',
                ),
            ),
          'tablenames' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.tablenames',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'trim',
                ),
            ),
          'fieldname' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.fieldname',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'sorting_foreign' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.sorting_foreign',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '4',
                  'max' => '4',
                  'eval' => 'int',
                  'checkbox' => '0',
                  'range' =>
                    array (
                      'upper' => '1000',
                      'lower' => '10',
                    ),
                  'default' => 0,
                ),
            ),
          'table_local' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.table_local',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'default' => 'sys_file',
                ),
            ),
          'title' =>
            array (
              'l10n_mode' => 'mergeIfNotBlank',
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.title',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'null',
                  'size' => '20',
                  'placeholder' => '__row|uid_local|title',
                ),
            ),
          'link' =>
            array (
              'l10n_mode' => 'mergeIfNotBlank',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.link',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'typolink',
                ),
            ),
          'description' =>
            array (
              'l10n_mode' => 'mergeIfNotBlank',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.description',
              'config' =>
                array (
                  'type' => 'text',
                  'eval' => 'null',
                  'cols' => '20',
                  'rows' => '5',
                  'placeholder' => '__row|uid_local|description',
                ),
            ),
          'alternative' =>
            array (
              'l10n_mode' => 'mergeIfNotBlank',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.alternative',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'null',
                  'size' => '20',
                  'placeholder' => '__row|uid_local|alternative',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
          1 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
          2 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
          3 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
          4 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
          5 =>
            array (
              'showitem' => '
				--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.basicoverlayPalette;basicoverlayPalette,
				--palette--;;filePalette',
            ),
        ),
      'palettes' =>
        array (
          'basicoverlayPalette' =>
            array (
              'showitem' => 'title,description',
              'canNotCollapse' => true,
            ),
          'imageoverlayPalette' =>
            array (
              'showitem' => '
				title,alternative;;;;3-3-3,--linebreak--,
				link,description
				',
              'canNotCollapse' => true,
            ),
          'filePalette' =>
            array (
              'showitem' => 'uid_local, hidden, sys_language_uid, l10n_parent',
              'isHiddenPalette' => true,
            ),
        ),
    ),
  'sys_file_storage' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage',
          'label' => 'name',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'default_sortby' => 'ORDER BY name',
          'delete' => 'deleted',
          'rootLevel' => true,
          'versioningWS_alwaysAllowLiveEdit' => true,
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dividers2tabs' => true,
          'requestUpdate' => 'driver',
          'iconfile' => '_icon_ftp.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,name,description,driver,processingfolder,configuration',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'required',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '5',
                ),
            ),
          'is_browsable' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.is_browsable',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 1,
                ),
            ),
          'is_public' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.is_public',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 1,
                ),
            ),
          'is_writable' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.is_writable',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 1,
                ),
            ),
          'is_online' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.is_online',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 1,
                ),
            ),
          'processingfolder' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.processingfolder',
              'config' =>
                array (
                  'type' => 'input',
                  'placeholder' => '_processed_',
                  'size' => '20',
                ),
            ),
          'driver' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.driver',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'Local filesystem',
                          1 => 'Local',
                        ),
                    ),
                  'default' => 'Local',
                  'onChange' => 'reload',
                ),
            ),
          'configuration' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_file_storage.configuration',
              'config' =>
                array (
                  'type' => 'flex',
                  'ds_pointerField' => 'driver',
                  'ds' =>
                    array (
                      'Local' => 'FILE:EXT:core/Configuration/Resource/Driver/LocalDriverFlexForm.xml',
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'name, description, hidden, --div--;Configuration, driver, configuration, processingfolder, --div--;Access, --palette--;Capabilities;capabilities, is_online',
            ),
        ),
      'palettes' =>
        array (
          'capabilities' =>
            array (
              'showitem' => 'is_browsable, is_public, is_writable',
              'canNotCollapse' => true,
            ),
        ),
    ),
  'sys_filemounts' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'sortby' => 'sorting',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_filemounts',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'iconfile' => '_icon_ftp_2.gif',
          'useColumnsForDefaultValues' => 'path,base',
          'versioningWS_alwaysAllowLiveEdit' => true,
          'searchFields' => 'title,path',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,hidden,path,base',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_filemounts.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'max' => '30',
                  'eval' => 'required,trim',
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'base' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.baseStorage',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_file_storage',
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'path' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.folder',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                    ),
                  'itemsProcFunc' => 'typo3/sysext/core/Classes/Resource/Service/UserFileMountService.php:TYPO3\\CMS\\Core\\Resource\\Service\\UserFileMountService->renderTceformsSelectDropdown',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => '--palette--;;mount, base, path',
            ),
        ),
      'palettes' =>
        array (
          'mount' =>
            array (
              'showitem' => 'title,hidden',
              'canNotCollapse' => 1,
            ),
        ),
    ),
  'sys_history' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_history',
          'label' => 'tablename',
          'tstamp' => 'tstamp',
          'adminOnly' => true,
          'rootLevel' => true,
          'hideTable' => true,
          'default_sortby' => 'uid DESC',
        ),
      'columns' =>
        array (
          'sys_log_uid' =>
            array (
              'label' => 'sys_log_uid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'history_data' =>
            array (
              'label' => 'history_data',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'fieldlist' =>
            array (
              'label' => 'fieldlist',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'recuid' =>
            array (
              'label' => 'recuid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'tablename' =>
            array (
              'label' => 'tablename',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'history_files' =>
            array (
              'label' => 'history_files',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'snapshot' =>
            array (
              'label' => 'snapshot',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'sys_log_uid, history_data, fieldlist, recuid, tablename, tstamp, history_files, snapshot',
            ),
        ),
    ),
  'sys_language' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'default_sortby' => 'ORDER BY title',
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_language',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-sys_language',
              'mask' => 'flags-###TYPE###',
            ),
          'versioningWS_alwaysAllowLiveEdit' => true,
          'typeicon_column' => 'flag',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,title',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '35',
                  'max' => '80',
                  'eval' => 'trim,required',
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'static_lang_isocode' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_language.isocode',
              'displayCond' => 'EXT:static_info_tables:LOADED:true',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'static_languages',
                  'foreign_table_where' => 'AND static_languages.pid=0 ORDER BY static_languages.lg_name_en',
                  'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateLanguagesSelector',
                  'size' => '1',
                  'minitems' => '0',
                  'maxitems' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                          'default' =>
                            array (
                              'receiverClass' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\SuggestReceiver',
                            ),
                        ),
                    ),
                ),
            ),
          'flag' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_language.flag',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                          2 => '',
                        ),
                      1 =>
                        array (
                          0 => 'multiple',
                          1 => 'multiple',
                          2 => 'EXT:t3skin/images/flags/multiple.png',
                        ),
                      2 =>
                        array (
                          0 => 'ad',
                          1 => 'ad',
                          2 => 'EXT:t3skin/images/flags/ad.png',
                        ),
                      3 =>
                        array (
                          0 => 'ae',
                          1 => 'ae',
                          2 => 'EXT:t3skin/images/flags/ae.png',
                        ),
                      4 =>
                        array (
                          0 => 'af',
                          1 => 'af',
                          2 => 'EXT:t3skin/images/flags/af.png',
                        ),
                      5 =>
                        array (
                          0 => 'ag',
                          1 => 'ag',
                          2 => 'EXT:t3skin/images/flags/ag.png',
                        ),
                      6 =>
                        array (
                          0 => 'ai',
                          1 => 'ai',
                          2 => 'EXT:t3skin/images/flags/ai.png',
                        ),
                      7 =>
                        array (
                          0 => 'al',
                          1 => 'al',
                          2 => 'EXT:t3skin/images/flags/al.png',
                        ),
                      8 =>
                        array (
                          0 => 'am',
                          1 => 'am',
                          2 => 'EXT:t3skin/images/flags/am.png',
                        ),
                      9 =>
                        array (
                          0 => 'an',
                          1 => 'an',
                          2 => 'EXT:t3skin/images/flags/an.png',
                        ),
                      10 =>
                        array (
                          0 => 'ao',
                          1 => 'ao',
                          2 => 'EXT:t3skin/images/flags/ao.png',
                        ),
                      11 =>
                        array (
                          0 => 'ar',
                          1 => 'ar',
                          2 => 'EXT:t3skin/images/flags/ar.png',
                        ),
                      12 =>
                        array (
                          0 => 'as',
                          1 => 'as',
                          2 => 'EXT:t3skin/images/flags/as.png',
                        ),
                      13 =>
                        array (
                          0 => 'at',
                          1 => 'at',
                          2 => 'EXT:t3skin/images/flags/at.png',
                        ),
                      14 =>
                        array (
                          0 => 'au',
                          1 => 'au',
                          2 => 'EXT:t3skin/images/flags/au.png',
                        ),
                      15 =>
                        array (
                          0 => 'aw',
                          1 => 'aw',
                          2 => 'EXT:t3skin/images/flags/aw.png',
                        ),
                      16 =>
                        array (
                          0 => 'ax',
                          1 => 'ax',
                          2 => 'EXT:t3skin/images/flags/ax.png',
                        ),
                      17 =>
                        array (
                          0 => 'az',
                          1 => 'az',
                          2 => 'EXT:t3skin/images/flags/az.png',
                        ),
                      18 =>
                        array (
                          0 => 'ba',
                          1 => 'ba',
                          2 => 'EXT:t3skin/images/flags/ba.png',
                        ),
                      19 =>
                        array (
                          0 => 'bb',
                          1 => 'bb',
                          2 => 'EXT:t3skin/images/flags/bb.png',
                        ),
                      20 =>
                        array (
                          0 => 'bd',
                          1 => 'bd',
                          2 => 'EXT:t3skin/images/flags/bd.png',
                        ),
                      21 =>
                        array (
                          0 => 'be',
                          1 => 'be',
                          2 => 'EXT:t3skin/images/flags/be.png',
                        ),
                      22 =>
                        array (
                          0 => 'bf',
                          1 => 'bf',
                          2 => 'EXT:t3skin/images/flags/bf.png',
                        ),
                      23 =>
                        array (
                          0 => 'bg',
                          1 => 'bg',
                          2 => 'EXT:t3skin/images/flags/bg.png',
                        ),
                      24 =>
                        array (
                          0 => 'bh',
                          1 => 'bh',
                          2 => 'EXT:t3skin/images/flags/bh.png',
                        ),
                      25 =>
                        array (
                          0 => 'bi',
                          1 => 'bi',
                          2 => 'EXT:t3skin/images/flags/bi.png',
                        ),
                      26 =>
                        array (
                          0 => 'bj',
                          1 => 'bj',
                          2 => 'EXT:t3skin/images/flags/bj.png',
                        ),
                      27 =>
                        array (
                          0 => 'bm',
                          1 => 'bm',
                          2 => 'EXT:t3skin/images/flags/bm.png',
                        ),
                      28 =>
                        array (
                          0 => 'bn',
                          1 => 'bn',
                          2 => 'EXT:t3skin/images/flags/bn.png',
                        ),
                      29 =>
                        array (
                          0 => 'bo',
                          1 => 'bo',
                          2 => 'EXT:t3skin/images/flags/bo.png',
                        ),
                      30 =>
                        array (
                          0 => 'br',
                          1 => 'br',
                          2 => 'EXT:t3skin/images/flags/br.png',
                        ),
                      31 =>
                        array (
                          0 => 'bs',
                          1 => 'bs',
                          2 => 'EXT:t3skin/images/flags/bs.png',
                        ),
                      32 =>
                        array (
                          0 => 'bt',
                          1 => 'bt',
                          2 => 'EXT:t3skin/images/flags/bt.png',
                        ),
                      33 =>
                        array (
                          0 => 'bv',
                          1 => 'bv',
                          2 => 'EXT:t3skin/images/flags/bv.png',
                        ),
                      34 =>
                        array (
                          0 => 'bw',
                          1 => 'bw',
                          2 => 'EXT:t3skin/images/flags/bw.png',
                        ),
                      35 =>
                        array (
                          0 => 'by',
                          1 => 'by',
                          2 => 'EXT:t3skin/images/flags/by.png',
                        ),
                      36 =>
                        array (
                          0 => 'bz',
                          1 => 'bz',
                          2 => 'EXT:t3skin/images/flags/bz.png',
                        ),
                      37 =>
                        array (
                          0 => 'ca',
                          1 => 'ca',
                          2 => 'EXT:t3skin/images/flags/ca.png',
                        ),
                      38 =>
                        array (
                          0 => 'catalonia',
                          1 => 'catalonia',
                          2 => 'EXT:t3skin/images/flags/catalonia.png',
                        ),
                      39 =>
                        array (
                          0 => 'cc',
                          1 => 'cc',
                          2 => 'EXT:t3skin/images/flags/cc.png',
                        ),
                      40 =>
                        array (
                          0 => 'cd',
                          1 => 'cd',
                          2 => 'EXT:t3skin/images/flags/cd.png',
                        ),
                      41 =>
                        array (
                          0 => 'cf',
                          1 => 'cf',
                          2 => 'EXT:t3skin/images/flags/cf.png',
                        ),
                      42 =>
                        array (
                          0 => 'cg',
                          1 => 'cg',
                          2 => 'EXT:t3skin/images/flags/cg.png',
                        ),
                      43 =>
                        array (
                          0 => 'ch',
                          1 => 'ch',
                          2 => 'EXT:t3skin/images/flags/ch.png',
                        ),
                      44 =>
                        array (
                          0 => 'ci',
                          1 => 'ci',
                          2 => 'EXT:t3skin/images/flags/ci.png',
                        ),
                      45 =>
                        array (
                          0 => 'ck',
                          1 => 'ck',
                          2 => 'EXT:t3skin/images/flags/ck.png',
                        ),
                      46 =>
                        array (
                          0 => 'cl',
                          1 => 'cl',
                          2 => 'EXT:t3skin/images/flags/cl.png',
                        ),
                      47 =>
                        array (
                          0 => 'cm',
                          1 => 'cm',
                          2 => 'EXT:t3skin/images/flags/cm.png',
                        ),
                      48 =>
                        array (
                          0 => 'cn',
                          1 => 'cn',
                          2 => 'EXT:t3skin/images/flags/cn.png',
                        ),
                      49 =>
                        array (
                          0 => 'co',
                          1 => 'co',
                          2 => 'EXT:t3skin/images/flags/co.png',
                        ),
                      50 =>
                        array (
                          0 => 'cr',
                          1 => 'cr',
                          2 => 'EXT:t3skin/images/flags/cr.png',
                        ),
                      51 =>
                        array (
                          0 => 'cs',
                          1 => 'cs',
                          2 => 'EXT:t3skin/images/flags/cs.png',
                        ),
                      52 =>
                        array (
                          0 => 'cu',
                          1 => 'cu',
                          2 => 'EXT:t3skin/images/flags/cu.png',
                        ),
                      53 =>
                        array (
                          0 => 'cv',
                          1 => 'cv',
                          2 => 'EXT:t3skin/images/flags/cv.png',
                        ),
                      54 =>
                        array (
                          0 => 'cx',
                          1 => 'cx',
                          2 => 'EXT:t3skin/images/flags/cx.png',
                        ),
                      55 =>
                        array (
                          0 => 'cy',
                          1 => 'cy',
                          2 => 'EXT:t3skin/images/flags/cy.png',
                        ),
                      56 =>
                        array (
                          0 => 'cz',
                          1 => 'cz',
                          2 => 'EXT:t3skin/images/flags/cz.png',
                        ),
                      57 =>
                        array (
                          0 => 'de',
                          1 => 'de',
                          2 => 'EXT:t3skin/images/flags/de.png',
                        ),
                      58 =>
                        array (
                          0 => 'dj',
                          1 => 'dj',
                          2 => 'EXT:t3skin/images/flags/dj.png',
                        ),
                      59 =>
                        array (
                          0 => 'dk',
                          1 => 'dk',
                          2 => 'EXT:t3skin/images/flags/dk.png',
                        ),
                      60 =>
                        array (
                          0 => 'dm',
                          1 => 'dm',
                          2 => 'EXT:t3skin/images/flags/dm.png',
                        ),
                      61 =>
                        array (
                          0 => 'do',
                          1 => 'do',
                          2 => 'EXT:t3skin/images/flags/do.png',
                        ),
                      62 =>
                        array (
                          0 => 'dz',
                          1 => 'dz',
                          2 => 'EXT:t3skin/images/flags/dz.png',
                        ),
                      63 =>
                        array (
                          0 => 'ec',
                          1 => 'ec',
                          2 => 'EXT:t3skin/images/flags/ec.png',
                        ),
                      64 =>
                        array (
                          0 => 'ee',
                          1 => 'ee',
                          2 => 'EXT:t3skin/images/flags/ee.png',
                        ),
                      65 =>
                        array (
                          0 => 'eg',
                          1 => 'eg',
                          2 => 'EXT:t3skin/images/flags/eg.png',
                        ),
                      66 =>
                        array (
                          0 => 'eh',
                          1 => 'eh',
                          2 => 'EXT:t3skin/images/flags/eh.png',
                        ),
                      67 =>
                        array (
                          0 => 'england',
                          1 => 'england',
                          2 => 'EXT:t3skin/images/flags/england.png',
                        ),
                      68 =>
                        array (
                          0 => 'er',
                          1 => 'er',
                          2 => 'EXT:t3skin/images/flags/er.png',
                        ),
                      69 =>
                        array (
                          0 => 'es',
                          1 => 'es',
                          2 => 'EXT:t3skin/images/flags/es.png',
                        ),
                      70 =>
                        array (
                          0 => 'et',
                          1 => 'et',
                          2 => 'EXT:t3skin/images/flags/et.png',
                        ),
                      71 =>
                        array (
                          0 => 'europeanunion',
                          1 => 'europeanunion',
                          2 => 'EXT:t3skin/images/flags/europeanunion.png',
                        ),
                      72 =>
                        array (
                          0 => 'fam',
                          1 => 'fam',
                          2 => 'EXT:t3skin/images/flags/fam.png',
                        ),
                      73 =>
                        array (
                          0 => 'fi',
                          1 => 'fi',
                          2 => 'EXT:t3skin/images/flags/fi.png',
                        ),
                      74 =>
                        array (
                          0 => 'fj',
                          1 => 'fj',
                          2 => 'EXT:t3skin/images/flags/fj.png',
                        ),
                      75 =>
                        array (
                          0 => 'fk',
                          1 => 'fk',
                          2 => 'EXT:t3skin/images/flags/fk.png',
                        ),
                      76 =>
                        array (
                          0 => 'fm',
                          1 => 'fm',
                          2 => 'EXT:t3skin/images/flags/fm.png',
                        ),
                      77 =>
                        array (
                          0 => 'fo',
                          1 => 'fo',
                          2 => 'EXT:t3skin/images/flags/fo.png',
                        ),
                      78 =>
                        array (
                          0 => 'fr',
                          1 => 'fr',
                          2 => 'EXT:t3skin/images/flags/fr.png',
                        ),
                      79 =>
                        array (
                          0 => 'ga',
                          1 => 'ga',
                          2 => 'EXT:t3skin/images/flags/ga.png',
                        ),
                      80 =>
                        array (
                          0 => 'gb',
                          1 => 'gb',
                          2 => 'EXT:t3skin/images/flags/gb.png',
                        ),
                      81 =>
                        array (
                          0 => 'gd',
                          1 => 'gd',
                          2 => 'EXT:t3skin/images/flags/gd.png',
                        ),
                      82 =>
                        array (
                          0 => 'ge',
                          1 => 'ge',
                          2 => 'EXT:t3skin/images/flags/ge.png',
                        ),
                      83 =>
                        array (
                          0 => 'gf',
                          1 => 'gf',
                          2 => 'EXT:t3skin/images/flags/gf.png',
                        ),
                      84 =>
                        array (
                          0 => 'gh',
                          1 => 'gh',
                          2 => 'EXT:t3skin/images/flags/gh.png',
                        ),
                      85 =>
                        array (
                          0 => 'gi',
                          1 => 'gi',
                          2 => 'EXT:t3skin/images/flags/gi.png',
                        ),
                      86 =>
                        array (
                          0 => 'gl',
                          1 => 'gl',
                          2 => 'EXT:t3skin/images/flags/gl.png',
                        ),
                      87 =>
                        array (
                          0 => 'gm',
                          1 => 'gm',
                          2 => 'EXT:t3skin/images/flags/gm.png',
                        ),
                      88 =>
                        array (
                          0 => 'gn',
                          1 => 'gn',
                          2 => 'EXT:t3skin/images/flags/gn.png',
                        ),
                      89 =>
                        array (
                          0 => 'gp',
                          1 => 'gp',
                          2 => 'EXT:t3skin/images/flags/gp.png',
                        ),
                      90 =>
                        array (
                          0 => 'gq',
                          1 => 'gq',
                          2 => 'EXT:t3skin/images/flags/gq.png',
                        ),
                      91 =>
                        array (
                          0 => 'gr',
                          1 => 'gr',
                          2 => 'EXT:t3skin/images/flags/gr.png',
                        ),
                      92 =>
                        array (
                          0 => 'gs',
                          1 => 'gs',
                          2 => 'EXT:t3skin/images/flags/gs.png',
                        ),
                      93 =>
                        array (
                          0 => 'gt',
                          1 => 'gt',
                          2 => 'EXT:t3skin/images/flags/gt.png',
                        ),
                      94 =>
                        array (
                          0 => 'gu',
                          1 => 'gu',
                          2 => 'EXT:t3skin/images/flags/gu.png',
                        ),
                      95 =>
                        array (
                          0 => 'gw',
                          1 => 'gw',
                          2 => 'EXT:t3skin/images/flags/gw.png',
                        ),
                      96 =>
                        array (
                          0 => 'gy',
                          1 => 'gy',
                          2 => 'EXT:t3skin/images/flags/gy.png',
                        ),
                      97 =>
                        array (
                          0 => 'hk',
                          1 => 'hk',
                          2 => 'EXT:t3skin/images/flags/hk.png',
                        ),
                      98 =>
                        array (
                          0 => 'hm',
                          1 => 'hm',
                          2 => 'EXT:t3skin/images/flags/hm.png',
                        ),
                      99 =>
                        array (
                          0 => 'hn',
                          1 => 'hn',
                          2 => 'EXT:t3skin/images/flags/hn.png',
                        ),
                      100 =>
                        array (
                          0 => 'hr',
                          1 => 'hr',
                          2 => 'EXT:t3skin/images/flags/hr.png',
                        ),
                      101 =>
                        array (
                          0 => 'ht',
                          1 => 'ht',
                          2 => 'EXT:t3skin/images/flags/ht.png',
                        ),
                      102 =>
                        array (
                          0 => 'hu',
                          1 => 'hu',
                          2 => 'EXT:t3skin/images/flags/hu.png',
                        ),
                      103 =>
                        array (
                          0 => 'id',
                          1 => 'id',
                          2 => 'EXT:t3skin/images/flags/id.png',
                        ),
                      104 =>
                        array (
                          0 => 'ie',
                          1 => 'ie',
                          2 => 'EXT:t3skin/images/flags/ie.png',
                        ),
                      105 =>
                        array (
                          0 => 'il',
                          1 => 'il',
                          2 => 'EXT:t3skin/images/flags/il.png',
                        ),
                      106 =>
                        array (
                          0 => 'in',
                          1 => 'in',
                          2 => 'EXT:t3skin/images/flags/in.png',
                        ),
                      107 =>
                        array (
                          0 => 'io',
                          1 => 'io',
                          2 => 'EXT:t3skin/images/flags/io.png',
                        ),
                      108 =>
                        array (
                          0 => 'iq',
                          1 => 'iq',
                          2 => 'EXT:t3skin/images/flags/iq.png',
                        ),
                      109 =>
                        array (
                          0 => 'ir',
                          1 => 'ir',
                          2 => 'EXT:t3skin/images/flags/ir.png',
                        ),
                      110 =>
                        array (
                          0 => 'is',
                          1 => 'is',
                          2 => 'EXT:t3skin/images/flags/is.png',
                        ),
                      111 =>
                        array (
                          0 => 'it',
                          1 => 'it',
                          2 => 'EXT:t3skin/images/flags/it.png',
                        ),
                      112 =>
                        array (
                          0 => 'jm',
                          1 => 'jm',
                          2 => 'EXT:t3skin/images/flags/jm.png',
                        ),
                      113 =>
                        array (
                          0 => 'jo',
                          1 => 'jo',
                          2 => 'EXT:t3skin/images/flags/jo.png',
                        ),
                      114 =>
                        array (
                          0 => 'jp',
                          1 => 'jp',
                          2 => 'EXT:t3skin/images/flags/jp.png',
                        ),
                      115 =>
                        array (
                          0 => 'ke',
                          1 => 'ke',
                          2 => 'EXT:t3skin/images/flags/ke.png',
                        ),
                      116 =>
                        array (
                          0 => 'kg',
                          1 => 'kg',
                          2 => 'EXT:t3skin/images/flags/kg.png',
                        ),
                      117 =>
                        array (
                          0 => 'kh',
                          1 => 'kh',
                          2 => 'EXT:t3skin/images/flags/kh.png',
                        ),
                      118 =>
                        array (
                          0 => 'ki',
                          1 => 'ki',
                          2 => 'EXT:t3skin/images/flags/ki.png',
                        ),
                      119 =>
                        array (
                          0 => 'km',
                          1 => 'km',
                          2 => 'EXT:t3skin/images/flags/km.png',
                        ),
                      120 =>
                        array (
                          0 => 'kn',
                          1 => 'kn',
                          2 => 'EXT:t3skin/images/flags/kn.png',
                        ),
                      121 =>
                        array (
                          0 => 'kp',
                          1 => 'kp',
                          2 => 'EXT:t3skin/images/flags/kp.png',
                        ),
                      122 =>
                        array (
                          0 => 'kr',
                          1 => 'kr',
                          2 => 'EXT:t3skin/images/flags/kr.png',
                        ),
                      123 =>
                        array (
                          0 => 'kw',
                          1 => 'kw',
                          2 => 'EXT:t3skin/images/flags/kw.png',
                        ),
                      124 =>
                        array (
                          0 => 'ky',
                          1 => 'ky',
                          2 => 'EXT:t3skin/images/flags/ky.png',
                        ),
                      125 =>
                        array (
                          0 => 'kz',
                          1 => 'kz',
                          2 => 'EXT:t3skin/images/flags/kz.png',
                        ),
                      126 =>
                        array (
                          0 => 'la',
                          1 => 'la',
                          2 => 'EXT:t3skin/images/flags/la.png',
                        ),
                      127 =>
                        array (
                          0 => 'lb',
                          1 => 'lb',
                          2 => 'EXT:t3skin/images/flags/lb.png',
                        ),
                      128 =>
                        array (
                          0 => 'lc',
                          1 => 'lc',
                          2 => 'EXT:t3skin/images/flags/lc.png',
                        ),
                      129 =>
                        array (
                          0 => 'li',
                          1 => 'li',
                          2 => 'EXT:t3skin/images/flags/li.png',
                        ),
                      130 =>
                        array (
                          0 => 'lk',
                          1 => 'lk',
                          2 => 'EXT:t3skin/images/flags/lk.png',
                        ),
                      131 =>
                        array (
                          0 => 'lr',
                          1 => 'lr',
                          2 => 'EXT:t3skin/images/flags/lr.png',
                        ),
                      132 =>
                        array (
                          0 => 'ls',
                          1 => 'ls',
                          2 => 'EXT:t3skin/images/flags/ls.png',
                        ),
                      133 =>
                        array (
                          0 => 'lt',
                          1 => 'lt',
                          2 => 'EXT:t3skin/images/flags/lt.png',
                        ),
                      134 =>
                        array (
                          0 => 'lu',
                          1 => 'lu',
                          2 => 'EXT:t3skin/images/flags/lu.png',
                        ),
                      135 =>
                        array (
                          0 => 'lv',
                          1 => 'lv',
                          2 => 'EXT:t3skin/images/flags/lv.png',
                        ),
                      136 =>
                        array (
                          0 => 'ly',
                          1 => 'ly',
                          2 => 'EXT:t3skin/images/flags/ly.png',
                        ),
                      137 =>
                        array (
                          0 => 'ma',
                          1 => 'ma',
                          2 => 'EXT:t3skin/images/flags/ma.png',
                        ),
                      138 =>
                        array (
                          0 => 'mc',
                          1 => 'mc',
                          2 => 'EXT:t3skin/images/flags/mc.png',
                        ),
                      139 =>
                        array (
                          0 => 'md',
                          1 => 'md',
                          2 => 'EXT:t3skin/images/flags/md.png',
                        ),
                      140 =>
                        array (
                          0 => 'me',
                          1 => 'me',
                          2 => 'EXT:t3skin/images/flags/me.png',
                        ),
                      141 =>
                        array (
                          0 => 'mg',
                          1 => 'mg',
                          2 => 'EXT:t3skin/images/flags/mg.png',
                        ),
                      142 =>
                        array (
                          0 => 'mh',
                          1 => 'mh',
                          2 => 'EXT:t3skin/images/flags/mh.png',
                        ),
                      143 =>
                        array (
                          0 => 'mk',
                          1 => 'mk',
                          2 => 'EXT:t3skin/images/flags/mk.png',
                        ),
                      144 =>
                        array (
                          0 => 'ml',
                          1 => 'ml',
                          2 => 'EXT:t3skin/images/flags/ml.png',
                        ),
                      145 =>
                        array (
                          0 => 'mm',
                          1 => 'mm',
                          2 => 'EXT:t3skin/images/flags/mm.png',
                        ),
                      146 =>
                        array (
                          0 => 'mn',
                          1 => 'mn',
                          2 => 'EXT:t3skin/images/flags/mn.png',
                        ),
                      147 =>
                        array (
                          0 => 'mo',
                          1 => 'mo',
                          2 => 'EXT:t3skin/images/flags/mo.png',
                        ),
                      148 =>
                        array (
                          0 => 'mp',
                          1 => 'mp',
                          2 => 'EXT:t3skin/images/flags/mp.png',
                        ),
                      149 =>
                        array (
                          0 => 'mq',
                          1 => 'mq',
                          2 => 'EXT:t3skin/images/flags/mq.png',
                        ),
                      150 =>
                        array (
                          0 => 'mr',
                          1 => 'mr',
                          2 => 'EXT:t3skin/images/flags/mr.png',
                        ),
                      151 =>
                        array (
                          0 => 'ms',
                          1 => 'ms',
                          2 => 'EXT:t3skin/images/flags/ms.png',
                        ),
                      152 =>
                        array (
                          0 => 'mt',
                          1 => 'mt',
                          2 => 'EXT:t3skin/images/flags/mt.png',
                        ),
                      153 =>
                        array (
                          0 => 'mu',
                          1 => 'mu',
                          2 => 'EXT:t3skin/images/flags/mu.png',
                        ),
                      154 =>
                        array (
                          0 => 'mv',
                          1 => 'mv',
                          2 => 'EXT:t3skin/images/flags/mv.png',
                        ),
                      155 =>
                        array (
                          0 => 'mw',
                          1 => 'mw',
                          2 => 'EXT:t3skin/images/flags/mw.png',
                        ),
                      156 =>
                        array (
                          0 => 'mx',
                          1 => 'mx',
                          2 => 'EXT:t3skin/images/flags/mx.png',
                        ),
                      157 =>
                        array (
                          0 => 'my',
                          1 => 'my',
                          2 => 'EXT:t3skin/images/flags/my.png',
                        ),
                      158 =>
                        array (
                          0 => 'mz',
                          1 => 'mz',
                          2 => 'EXT:t3skin/images/flags/mz.png',
                        ),
                      159 =>
                        array (
                          0 => 'na',
                          1 => 'na',
                          2 => 'EXT:t3skin/images/flags/na.png',
                        ),
                      160 =>
                        array (
                          0 => 'nc',
                          1 => 'nc',
                          2 => 'EXT:t3skin/images/flags/nc.png',
                        ),
                      161 =>
                        array (
                          0 => 'ne',
                          1 => 'ne',
                          2 => 'EXT:t3skin/images/flags/ne.png',
                        ),
                      162 =>
                        array (
                          0 => 'nf',
                          1 => 'nf',
                          2 => 'EXT:t3skin/images/flags/nf.png',
                        ),
                      163 =>
                        array (
                          0 => 'ng',
                          1 => 'ng',
                          2 => 'EXT:t3skin/images/flags/ng.png',
                        ),
                      164 =>
                        array (
                          0 => 'ni',
                          1 => 'ni',
                          2 => 'EXT:t3skin/images/flags/ni.png',
                        ),
                      165 =>
                        array (
                          0 => 'nl',
                          1 => 'nl',
                          2 => 'EXT:t3skin/images/flags/nl.png',
                        ),
                      166 =>
                        array (
                          0 => 'no',
                          1 => 'no',
                          2 => 'EXT:t3skin/images/flags/no.png',
                        ),
                      167 =>
                        array (
                          0 => 'np',
                          1 => 'np',
                          2 => 'EXT:t3skin/images/flags/np.png',
                        ),
                      168 =>
                        array (
                          0 => 'nr',
                          1 => 'nr',
                          2 => 'EXT:t3skin/images/flags/nr.png',
                        ),
                      169 =>
                        array (
                          0 => 'nu',
                          1 => 'nu',
                          2 => 'EXT:t3skin/images/flags/nu.png',
                        ),
                      170 =>
                        array (
                          0 => 'nz',
                          1 => 'nz',
                          2 => 'EXT:t3skin/images/flags/nz.png',
                        ),
                      171 =>
                        array (
                          0 => 'om',
                          1 => 'om',
                          2 => 'EXT:t3skin/images/flags/om.png',
                        ),
                      172 =>
                        array (
                          0 => 'pa',
                          1 => 'pa',
                          2 => 'EXT:t3skin/images/flags/pa.png',
                        ),
                      173 =>
                        array (
                          0 => 'pe',
                          1 => 'pe',
                          2 => 'EXT:t3skin/images/flags/pe.png',
                        ),
                      174 =>
                        array (
                          0 => 'pf',
                          1 => 'pf',
                          2 => 'EXT:t3skin/images/flags/pf.png',
                        ),
                      175 =>
                        array (
                          0 => 'pg',
                          1 => 'pg',
                          2 => 'EXT:t3skin/images/flags/pg.png',
                        ),
                      176 =>
                        array (
                          0 => 'ph',
                          1 => 'ph',
                          2 => 'EXT:t3skin/images/flags/ph.png',
                        ),
                      177 =>
                        array (
                          0 => 'pk',
                          1 => 'pk',
                          2 => 'EXT:t3skin/images/flags/pk.png',
                        ),
                      178 =>
                        array (
                          0 => 'pl',
                          1 => 'pl',
                          2 => 'EXT:t3skin/images/flags/pl.png',
                        ),
                      179 =>
                        array (
                          0 => 'pm',
                          1 => 'pm',
                          2 => 'EXT:t3skin/images/flags/pm.png',
                        ),
                      180 =>
                        array (
                          0 => 'pn',
                          1 => 'pn',
                          2 => 'EXT:t3skin/images/flags/pn.png',
                        ),
                      181 =>
                        array (
                          0 => 'pr',
                          1 => 'pr',
                          2 => 'EXT:t3skin/images/flags/pr.png',
                        ),
                      182 =>
                        array (
                          0 => 'ps',
                          1 => 'ps',
                          2 => 'EXT:t3skin/images/flags/ps.png',
                        ),
                      183 =>
                        array (
                          0 => 'pt',
                          1 => 'pt',
                          2 => 'EXT:t3skin/images/flags/pt.png',
                        ),
                      184 =>
                        array (
                          0 => 'pw',
                          1 => 'pw',
                          2 => 'EXT:t3skin/images/flags/pw.png',
                        ),
                      185 =>
                        array (
                          0 => 'py',
                          1 => 'py',
                          2 => 'EXT:t3skin/images/flags/py.png',
                        ),
                      186 =>
                        array (
                          0 => 'qa',
                          1 => 'qa',
                          2 => 'EXT:t3skin/images/flags/qa.png',
                        ),
                      187 =>
                        array (
                          0 => 'qc',
                          1 => 'qc',
                          2 => 'EXT:t3skin/images/flags/qc.png',
                        ),
                      188 =>
                        array (
                          0 => 're',
                          1 => 're',
                          2 => 'EXT:t3skin/images/flags/re.png',
                        ),
                      189 =>
                        array (
                          0 => 'ro',
                          1 => 'ro',
                          2 => 'EXT:t3skin/images/flags/ro.png',
                        ),
                      190 =>
                        array (
                          0 => 'rs',
                          1 => 'rs',
                          2 => 'EXT:t3skin/images/flags/rs.png',
                        ),
                      191 =>
                        array (
                          0 => 'ru',
                          1 => 'ru',
                          2 => 'EXT:t3skin/images/flags/ru.png',
                        ),
                      192 =>
                        array (
                          0 => 'rw',
                          1 => 'rw',
                          2 => 'EXT:t3skin/images/flags/rw.png',
                        ),
                      193 =>
                        array (
                          0 => 'sa',
                          1 => 'sa',
                          2 => 'EXT:t3skin/images/flags/sa.png',
                        ),
                      194 =>
                        array (
                          0 => 'sb',
                          1 => 'sb',
                          2 => 'EXT:t3skin/images/flags/sb.png',
                        ),
                      195 =>
                        array (
                          0 => 'sc',
                          1 => 'sc',
                          2 => 'EXT:t3skin/images/flags/sc.png',
                        ),
                      196 =>
                        array (
                          0 => 'scotland',
                          1 => 'scotland',
                          2 => 'EXT:t3skin/images/flags/scotland.png',
                        ),
                      197 =>
                        array (
                          0 => 'sd',
                          1 => 'sd',
                          2 => 'EXT:t3skin/images/flags/sd.png',
                        ),
                      198 =>
                        array (
                          0 => 'se',
                          1 => 'se',
                          2 => 'EXT:t3skin/images/flags/se.png',
                        ),
                      199 =>
                        array (
                          0 => 'sg',
                          1 => 'sg',
                          2 => 'EXT:t3skin/images/flags/sg.png',
                        ),
                      200 =>
                        array (
                          0 => 'sh',
                          1 => 'sh',
                          2 => 'EXT:t3skin/images/flags/sh.png',
                        ),
                      201 =>
                        array (
                          0 => 'si',
                          1 => 'si',
                          2 => 'EXT:t3skin/images/flags/si.png',
                        ),
                      202 =>
                        array (
                          0 => 'sj',
                          1 => 'sj',
                          2 => 'EXT:t3skin/images/flags/sj.png',
                        ),
                      203 =>
                        array (
                          0 => 'sk',
                          1 => 'sk',
                          2 => 'EXT:t3skin/images/flags/sk.png',
                        ),
                      204 =>
                        array (
                          0 => 'sl',
                          1 => 'sl',
                          2 => 'EXT:t3skin/images/flags/sl.png',
                        ),
                      205 =>
                        array (
                          0 => 'sm',
                          1 => 'sm',
                          2 => 'EXT:t3skin/images/flags/sm.png',
                        ),
                      206 =>
                        array (
                          0 => 'sn',
                          1 => 'sn',
                          2 => 'EXT:t3skin/images/flags/sn.png',
                        ),
                      207 =>
                        array (
                          0 => 'so',
                          1 => 'so',
                          2 => 'EXT:t3skin/images/flags/so.png',
                        ),
                      208 =>
                        array (
                          0 => 'sr',
                          1 => 'sr',
                          2 => 'EXT:t3skin/images/flags/sr.png',
                        ),
                      209 =>
                        array (
                          0 => 'st',
                          1 => 'st',
                          2 => 'EXT:t3skin/images/flags/st.png',
                        ),
                      210 =>
                        array (
                          0 => 'sv',
                          1 => 'sv',
                          2 => 'EXT:t3skin/images/flags/sv.png',
                        ),
                      211 =>
                        array (
                          0 => 'sy',
                          1 => 'sy',
                          2 => 'EXT:t3skin/images/flags/sy.png',
                        ),
                      212 =>
                        array (
                          0 => 'sz',
                          1 => 'sz',
                          2 => 'EXT:t3skin/images/flags/sz.png',
                        ),
                      213 =>
                        array (
                          0 => 'tc',
                          1 => 'tc',
                          2 => 'EXT:t3skin/images/flags/tc.png',
                        ),
                      214 =>
                        array (
                          0 => 'td',
                          1 => 'td',
                          2 => 'EXT:t3skin/images/flags/td.png',
                        ),
                      215 =>
                        array (
                          0 => 'tf',
                          1 => 'tf',
                          2 => 'EXT:t3skin/images/flags/tf.png',
                        ),
                      216 =>
                        array (
                          0 => 'tg',
                          1 => 'tg',
                          2 => 'EXT:t3skin/images/flags/tg.png',
                        ),
                      217 =>
                        array (
                          0 => 'th',
                          1 => 'th',
                          2 => 'EXT:t3skin/images/flags/th.png',
                        ),
                      218 =>
                        array (
                          0 => 'tj',
                          1 => 'tj',
                          2 => 'EXT:t3skin/images/flags/tj.png',
                        ),
                      219 =>
                        array (
                          0 => 'tk',
                          1 => 'tk',
                          2 => 'EXT:t3skin/images/flags/tk.png',
                        ),
                      220 =>
                        array (
                          0 => 'tl',
                          1 => 'tl',
                          2 => 'EXT:t3skin/images/flags/tl.png',
                        ),
                      221 =>
                        array (
                          0 => 'tm',
                          1 => 'tm',
                          2 => 'EXT:t3skin/images/flags/tm.png',
                        ),
                      222 =>
                        array (
                          0 => 'tn',
                          1 => 'tn',
                          2 => 'EXT:t3skin/images/flags/tn.png',
                        ),
                      223 =>
                        array (
                          0 => 'to',
                          1 => 'to',
                          2 => 'EXT:t3skin/images/flags/to.png',
                        ),
                      224 =>
                        array (
                          0 => 'tr',
                          1 => 'tr',
                          2 => 'EXT:t3skin/images/flags/tr.png',
                        ),
                      225 =>
                        array (
                          0 => 'tt',
                          1 => 'tt',
                          2 => 'EXT:t3skin/images/flags/tt.png',
                        ),
                      226 =>
                        array (
                          0 => 'tv',
                          1 => 'tv',
                          2 => 'EXT:t3skin/images/flags/tv.png',
                        ),
                      227 =>
                        array (
                          0 => 'tw',
                          1 => 'tw',
                          2 => 'EXT:t3skin/images/flags/tw.png',
                        ),
                      228 =>
                        array (
                          0 => 'tz',
                          1 => 'tz',
                          2 => 'EXT:t3skin/images/flags/tz.png',
                        ),
                      229 =>
                        array (
                          0 => 'ua',
                          1 => 'ua',
                          2 => 'EXT:t3skin/images/flags/ua.png',
                        ),
                      230 =>
                        array (
                          0 => 'ug',
                          1 => 'ug',
                          2 => 'EXT:t3skin/images/flags/ug.png',
                        ),
                      231 =>
                        array (
                          0 => 'um',
                          1 => 'um',
                          2 => 'EXT:t3skin/images/flags/um.png',
                        ),
                      232 =>
                        array (
                          0 => 'us',
                          1 => 'us',
                          2 => 'EXT:t3skin/images/flags/us.png',
                        ),
                      233 =>
                        array (
                          0 => 'uy',
                          1 => 'uy',
                          2 => 'EXT:t3skin/images/flags/uy.png',
                        ),
                      234 =>
                        array (
                          0 => 'uz',
                          1 => 'uz',
                          2 => 'EXT:t3skin/images/flags/uz.png',
                        ),
                      235 =>
                        array (
                          0 => 'va',
                          1 => 'va',
                          2 => 'EXT:t3skin/images/flags/va.png',
                        ),
                      236 =>
                        array (
                          0 => 'vc',
                          1 => 'vc',
                          2 => 'EXT:t3skin/images/flags/vc.png',
                        ),
                      237 =>
                        array (
                          0 => 've',
                          1 => 've',
                          2 => 'EXT:t3skin/images/flags/ve.png',
                        ),
                      238 =>
                        array (
                          0 => 'vg',
                          1 => 'vg',
                          2 => 'EXT:t3skin/images/flags/vg.png',
                        ),
                      239 =>
                        array (
                          0 => 'vi',
                          1 => 'vi',
                          2 => 'EXT:t3skin/images/flags/vi.png',
                        ),
                      240 =>
                        array (
                          0 => 'vn',
                          1 => 'vn',
                          2 => 'EXT:t3skin/images/flags/vn.png',
                        ),
                      241 =>
                        array (
                          0 => 'vu',
                          1 => 'vu',
                          2 => 'EXT:t3skin/images/flags/vu.png',
                        ),
                      242 =>
                        array (
                          0 => 'wales',
                          1 => 'wales',
                          2 => 'EXT:t3skin/images/flags/wales.png',
                        ),
                      243 =>
                        array (
                          0 => 'wf',
                          1 => 'wf',
                          2 => 'EXT:t3skin/images/flags/wf.png',
                        ),
                      244 =>
                        array (
                          0 => 'ws',
                          1 => 'ws',
                          2 => 'EXT:t3skin/images/flags/ws.png',
                        ),
                      245 =>
                        array (
                          0 => 'ye',
                          1 => 'ye',
                          2 => 'EXT:t3skin/images/flags/ye.png',
                        ),
                      246 =>
                        array (
                          0 => 'yt',
                          1 => 'yt',
                          2 => 'EXT:t3skin/images/flags/yt.png',
                        ),
                      247 =>
                        array (
                          0 => 'za',
                          1 => 'za',
                          2 => 'EXT:t3skin/images/flags/za.png',
                        ),
                      248 =>
                        array (
                          0 => 'zm',
                          1 => 'zm',
                          2 => 'EXT:t3skin/images/flags/zm.png',
                        ),
                      249 =>
                        array (
                          0 => 'zw',
                          1 => 'zw',
                          2 => 'EXT:t3skin/images/flags/zw.png',
                        ),
                    ),
                  'selicon_cols' => 16,
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,title;;;;2-2-2,static_lang_isocode,flag',
            ),
        ),
    ),
  'sys_log' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_log',
          'label' => 'details',
          'tstamp' => 'tstamp',
          'adminOnly' => true,
          'rootLevel' => true,
          'hideTable' => true,
          'default_sortby' => 'uid DESC',
        ),
      'columns' =>
        array (
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'userid' =>
            array (
              'label' => 'userid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'action' =>
            array (
              'label' => 'action',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'recuid' =>
            array (
              'label' => 'recuid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'tablename' =>
            array (
              'label' => 'tablename',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'recpid' =>
            array (
              'label' => 'recpid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'error' =>
            array (
              'label' => 'error',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'details' =>
            array (
              'label' => 'details',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'type' =>
            array (
              'label' => 'type',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'details_nr' =>
            array (
              'label' => 'details_nr',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'IP' =>
            array (
              'label' => 'IP',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'log_data' =>
            array (
              'label' => 'log_data',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'event_pid' =>
            array (
              'label' => 'event_pid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'workspace' =>
            array (
              'label' => 'workspace',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'NEWid' =>
            array (
              'label' => 'NEWid',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'tstamp, userid, action, recuid, tablename, recpid, error, details, type, details_nr, IP, log_data, event_pid, workspace, NEWid',
            ),
        ),
    ),
  'sys_news' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lang/locallang_tca.xlf:sys_news',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'adminOnly' => true,
          'rootLevel' => true,
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'default_sortby' => 'crdate DESC',
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-sys_news',
            ),
          'dividers2tabs' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,title,content,starttime,endtime',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                  'eval' => 'required',
                ),
            ),
          'content' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.text',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '48',
                  'rows' => '5',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      '_VALIGN' => 'middle',
                      'RTE' =>
                        array (
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'type' => 'script',
                          'title' => 'LLL:EXT:cms/locallang_ttc.php:bodytext.W.RTE',
                          'icon' => 'wizard_rte2.gif',
                          'script' => 'wizard_rte.php',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => '
			hidden, title, content;;9;richtext:rte_transform[flag=rte_enabled|mode=ts_css];3-3-3,
			--div--;LLL:EXT:lang/locallang_tca.xlf:sys_news.tabs.access, starttime, endtime',
            ),
        ),
    ),
  'backend_layout' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'iconfile' => 'backend_layout.gif',
          'selicon_field' => 'icon',
          'selicon_field_path' => 'uploads/media',
          'thumbnail' => 'resources',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,config,description,hidden,icon',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '256',
                  'eval' => 'required',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => '5',
                  'cols' => '25',
                ),
            ),
          'config' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout.config',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => '5',
                  'cols' => '25',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'title' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout.wizard',
                          'type' => 'popup',
                          'icon' => 'sysext/cms/layout/wizard_backend_layout.png',
                          'script' => 'sysext/cms/layout/wizard_backend_layout.php',
                          'JSopenParams' => 'height=800,width=800,status=0,menubar=0,scrollbars=0',
                        ),
                    ),
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'icon' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:backend_layout.icon',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'jpg,gif,png',
                  'uploadfolder' => 'uploads/media',
                  'show_thumbs' => 1,
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'hidden,title;;1;;2-2-2, icon, description, config',
            ),
        ),
    ),
  'fe_groups' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:fe_groups',
          'typeicon_classes' =>
            array (
              'default' => 'status-user-group-frontend',
            ),
          'useColumnsForDefaultValues' => 'lockToDomain',
          'dividers2tabs' => 1,
          'searchFields' => 'title,description',
          'type' => 'tx_extbase_type',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,hidden,subgroup,lockToDomain,description',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'title' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_groups.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'max' => '50',
                  'eval' => 'trim,required',
                ),
            ),
          'subgroup' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_groups.subgroup',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'AND NOT(fe_groups.uid = ###THIS_UID###) AND fe_groups.hidden=0 ORDER BY fe_groups.title',
                  'size' => 6,
                  'autoSizeMax' => 10,
                  'minitems' => 0,
                  'maxitems' => 20,
                ),
            ),
          'lockToDomain' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_groups.lockToDomain',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '50',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 5,
                  'cols' => 48,
                ),
            ),
          'TSconfig' =>
            array (
              'exclude' => 1,
              'label' => 'TSconfig:',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '10',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'title' => 'TSconfig QuickReference',
                          'script' => 'wizard_tsconfig.php?mode=fe_users',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'TSconfig',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'tx_extbase_type' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_groups.tx_extbase_type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_groups.tx_extbase_type.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_groups.tx_extbase_type.Tx_Extbase_Domain_Model_FrontendUserGroup',
                          1 => 'Tx_Extbase_Domain_Model_FrontendUserGroup',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                  'default' => '0',
                ),
            ),
          'felogin_redirectPid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:felogin/locallang_db.xlf:felogin_redirectPid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'hidden;;;;1-1-1, title;;;;2-2-2, description, subgroup;;;;3-3-3, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_groups.tabs.options, lockToDomain;;;;1-1-1, TSconfig;;;;2-2-2, felogin_redirectPid;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_groups.tabs.extended, tx_extbase_type',
            ),
          'Tx_Extbase_Domain_Model_FrontendUserGroup' =>
            array (
              'showitem' => 'hidden;;;;1-1-1, title;;;;2-2-2, description, subgroup;;;;3-3-3, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_groups.tabs.options, lockToDomain;;;;1-1-1, TSconfig;;;;2-2-2, felogin_redirectPid;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_groups.tabs.extended, tx_extbase_type',
            ),
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => ',tx_extbase_type,felogin_redirectPid',
        ),
    ),
  'fe_users' =>
    array (
      'ctrl' =>
        array (
          'label' => 'username',
          'default_sortby' => 'ORDER BY username',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'fe_cruser_id' => 'fe_cruser_id',
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'disable',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'status-user-frontend',
            ),
          'useColumnsForDefaultValues' => 'usergroup,lockToDomain,disable,starttime,endtime',
          'dividers2tabs' => 1,
          'searchFields' => 'username,name,first_name,last_name,middle_name,address,telephone,fax,email,title,zip,city,country,company',
          'type' => 'tx_extbase_type',
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => 'username,password,usergroup,name,address,telephone,fax,email,title,zip,city,country,www,company,tx_extbase_type,felogin_redirectPid,felogin_forgotHash,tx_lffeedit_perm',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'username,password,usergroup,lockToDomain,name,first_name,middle_name,last_name,title,company,address,zip,city,country,email,www,telephone,fax,disable,starttime,endtime,lastlogin',
        ),
      'columns' =>
        array (
          'username' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users.username',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'max' => '50',
                  'eval' => 'nospace,lower,uniqueInPid,required',
                ),
            ),
          'password' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users.password',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '10',
                  'max' => 100,
                  'eval' => 'nospace,required,password',
                ),
            ),
          'usergroup' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users.usergroup',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                  'size' => '6',
                  'minitems' => '1',
                  'maxitems' => '50',
                ),
            ),
          'lockToDomain' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:fe_users.lockToDomain',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '50',
                  'softref' => 'substitute',
                ),
            ),
          'name' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '80',
                ),
            ),
          'first_name' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.first_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'eval' => 'trim',
                  'max' => '50',
                ),
            ),
          'middle_name' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.middle_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'eval' => 'trim',
                  'max' => '50',
                ),
            ),
          'last_name' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.last_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'eval' => 'trim',
                  'max' => '50',
                ),
            ),
          'address' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.address',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '20',
                  'rows' => '3',
                ),
            ),
          'telephone' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.phone',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '20',
                ),
            ),
          'fax' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fax',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '20',
                ),
            ),
          'email' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '80',
                ),
            ),
          'title' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.title_person',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '40',
                ),
            ),
          'zip' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.zip',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '10',
                  'max' => '10',
                ),
            ),
          'city' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.city',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '50',
                ),
            ),
          'country' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.country',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '40',
                ),
            ),
          'www' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.www',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '80',
                ),
            ),
          'company' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.company',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '80',
                ),
            ),
          'image' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.image',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'max_size' => '15360',
                  'uploadfolder' => 'uploads/pics',
                  'show_thumbs' => '1',
                  'size' => '3',
                  'maxitems' => '6',
                  'minitems' => '0',
                ),
            ),
          'disable' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 1609369200,
                    ),
                ),
            ),
          'TSconfig' =>
            array (
              'exclude' => 1,
              'label' => 'TSconfig:',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '10',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'title' => 'TSconfig QuickReference',
                          'script' => 'wizard_tsconfig.php?mode=fe_users',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'TSconfig',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'lastlogin' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.lastlogin',
              'config' =>
                array (
                  'type' => 'input',
                  'readOnly' => '1',
                  'size' => '12',
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'tx_extbase_type' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:extbase/Resources/Private/Language/locallang_db.xml:fe_users.tx_extbase_type.Tx_Extbase_Domain_Model_FrontendUser',
                          1 => 'Tx_Extbase_Domain_Model_FrontendUser',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                  'default' => '0',
                ),
            ),
          'felogin_redirectPid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:felogin/locallang_db.xlf:felogin_redirectPid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'felogin_forgotHash' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:felogin/locallang_db.xlf:felogin_forgotHash',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tx_lffeedit_perm' =>
            array (
              'exclude' => 0,
              'label' => 'Rettigheder til at redigere indhold i frontend',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'tx_lffeedit_perm',
                  'foreign_table_where' => 'AND tt_address.pid=###CURRENT_PID### and tt_address.type in (2,3)',
                  'maxitems' => 10,
                  'appearance' =>
                    array (
                      'collapseAll' => 1,
                      'expandSingle' => 1,
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'disable, username;;;;1-1-1, password, usergroup, lastlogin;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.personelData, company;;1;;1-1-1, name;;2;;2-2-2, address, zip, city, country, telephone, fax, email, www, image;;;;2-2-2, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.options, lockToDomain;;;;1-1-1, TSconfig;;;;2-2-2, felogin_redirectPid;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.access, starttime, endtime, tx_lffeedit_perm;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.extended, tx_extbase_type',
            ),
          'Tx_Extbase_Domain_Model_FrontendUser' =>
            array (
              'showitem' => 'disable, username;;;;1-1-1, password, usergroup, lastlogin;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.personelData, company;;1;;1-1-1, name;;2;;2-2-2, address, zip, city, country, telephone, fax, email, www, image;;;;2-2-2, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.options, lockToDomain;;;;1-1-1, TSconfig;;;;2-2-2, felogin_redirectPid;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.access, starttime, endtime, tx_lffeedit_perm;;;;1-1-1, --div--;LLL:EXT:cms/locallang_tca.xlf:fe_users.tabs.extended, tx_extbase_type',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'title',
            ),
          2 =>
            array (
              'showitem' => 'first_name,--linebreak--,middle_name,--linebreak--,last_name',
            ),
        ),
    ),
  'pages_language_overlay' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:pages_language_overlay',
          'versioningWS' => true,
          'versioning_followPages' => true,
          'origUid' => 't3_origuid',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'transOrigPointerField' => 'pid',
          'transOrigPointerTable' => 'pages',
          'transOrigDiffSourceField' => 'l18n_diffsource',
          'shadowColumnsForNewPlaceholders' => 'title',
          'languageField' => 'sys_language_uid',
          'mainpalette' => 1,
          'type' => 'doktype',
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-content-page-language-overlay',
            ),
          'dividers2tabs' => true,
          'searchFields' => 'title,subtitle,nav_title,keywords,description,abstract,author,author_email,url',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,hidden,starttime,endtime,keywords,description,abstract',
        ),
      'columns' =>
        array (
          'doktype' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.page',
                          1 => '--div--',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.0',
                          1 => '1',
                          2 => 'i/pages.gif',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.4',
                          1 => '6',
                          2 => 'i/be_users_section.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.link',
                          1 => '--div--',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.2',
                          1 => '4',
                          2 => 'i/pages_shortcut.gif',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.5',
                          1 => '7',
                          2 => 'i/pages_mountpoint.gif',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.8',
                          1 => '3',
                          2 => 'i/pages_link.gif',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.div.special',
                          1 => '--div--',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.folder',
                          1 => '254',
                          2 => 'i/sysf.gif',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_tca.xlf:doktype.I.2',
                          1 => '255',
                          2 => 'i/recycler.gif',
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.doktype.I.7',
                          1 => '199',
                          2 => 'i/spacer_icon.gif',
                        ),
                    ),
                  'default' => '1',
                  'iconsInOptionTags' => 1,
                  'noIconsBelowSelect' => 1,
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.hidden_checkbox_1_formlabel',
                        ),
                    ),
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 1609369200,
                    ),
                ),
            ),
          'title' =>
            array (
              'l10n_mode' => 'prefixLangTitle',
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:title',
              'l10n_cat' => 'text',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => 'trim,required',
                ),
            ),
          'subtitle' =>
            array (
              'exclude' => 1,
              'l10n_cat' => 'text',
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.subtitle',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => 'trim',
                ),
            ),
          'nav_title' =>
            array (
              'exclude' => 1,
              'l10n_cat' => 'text',
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.nav_title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '255',
                  'eval' => 'trim',
                ),
            ),
          'keywords' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.keywords',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                ),
            ),
          'abstract' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.abstract',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '3',
                ),
            ),
          'author' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.author',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'eval' => 'trim',
                  'max' => '80',
                ),
            ),
          'author_email' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'eval' => 'trim',
                  'max' => '80',
                  'softref' => 'email[subst]',
                ),
            ),
          'media' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.media',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'sys_file_reference',
                  'foreign_field' => 'uid_foreign',
                  'foreign_sortby' => 'sorting_foreign',
                  'foreign_table_field' => 'tablenames',
                  'foreign_match_fields' =>
                    array (
                      'fieldname' => 'media',
                    ),
                  'foreign_label' => 'uid_local',
                  'foreign_selector' => 'uid_local',
                  'foreign_selector_fieldTcaOverride' =>
                    array (
                      'config' =>
                        array (
                          'appearance' =>
                            array (
                              'elementBrowserType' => 'file',
                              'elementBrowserAllowed' => '',
                            ),
                        ),
                    ),
                  'filter' =>
                    array (
                      0 =>
                        array (
                          'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                          'parameters' =>
                            array (
                              'allowedFileExtensions' => '',
                              'disallowedFileExtensions' => '',
                            ),
                        ),
                    ),
                  'appearance' =>
                    array (
                      'useSortable' => true,
                      'headerThumbnail' =>
                        array (
                          'field' => 'uid_local',
                          'width' => '64',
                          'height' => '64',
                        ),
                      'showPossibleLocalizationRecords' => true,
                      'showRemovedLocalizationRecords' => true,
                      'showSynchronizationLink' => true,
                      'enabledControls' =>
                        array (
                          'info' => false,
                          'new' => false,
                          'dragdrop' => true,
                          'sort' => false,
                          'hide' => true,
                          'delete' => true,
                          'localize' => true,
                        ),
                    ),
                  'behaviour' =>
                    array (
                      'localizationMode' => 'select',
                      'localizeChildrenAtParentLocalization' => true,
                    ),
                ),
            ),
          'url' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.url',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '23',
                  'max' => '255',
                  'eval' => 'trim',
                  'softref' => 'url',
                ),
            ),
          'urltype' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.automatic',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'http://',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'https://',
                          1 => '4',
                        ),
                      3 =>
                        array (
                          0 => 'ftp://',
                          1 => '2',
                        ),
                      4 =>
                        array (
                          0 => 'mailto:',
                          1 => '3',
                        ),
                    ),
                  'default' => '1',
                ),
            ),
          'shortcut' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.shortcut_page',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'shortcut_mode' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.2',
                          1 => 2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode.I.3',
                          1 => 3,
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'sys_language_uid' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'tx_impexp_origuid' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'l18n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                ),
            ),
          'tx_realurl_pathsegment' =>
            array (
              'label' => 'LLL:EXT:realurl/locallang_db.xml:pages.tx_realurl_pathsegment',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'input',
                  'max' => 255,
                  'eval' => 'trim,nospace,lower',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.metatags;metatags, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended',
            ),
          3 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.external;external, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended',
            ),
          4 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.shortcut;shortcut, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.shortcutpage;shortcutpage, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended',
            ),
          7 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;title, tx_realurl_pathsegment, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.abstract;abstract, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.editorial;editorial, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources, --palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media, --div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended',
            ),
          199 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.access;access,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_realurl_pathsegment',
            ),
          254 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.resources,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.media;media,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_realurl_pathsegment',
            ),
          255 =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.standard;standard,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.title;titleonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.visibility;hiddenonly,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.extended,, tx_realurl_pathsegment',
            ),
        ),
      'palettes' =>
        array (
          5 =>
            array (
              'showitem' => 'author,author_email',
              'canNotCollapse' => true,
            ),
          'standard' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, sys_language_uid',
              'canNotCollapse' => 1,
            ),
          'shortcut' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, sys_language_uid, shortcut_mode;LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_mode_formlabel',
              'canNotCollapse' => 1,
            ),
          'shortcutpage' =>
            array (
              'showitem' => 'shortcut;LLL:EXT:cms/locallang_tca.xlf:pages.shortcut_formlabel',
              'canNotCollapse' => 1,
            ),
          'external' =>
            array (
              'showitem' => 'doktype;LLL:EXT:cms/locallang_tca.xlf:pages.doktype_formlabel, sys_language_uid, urltype;LLL:EXT:cms/locallang_tca.xlf:pages.urltype_formlabel, url;LLL:EXT:cms/locallang_tca.xlf:pages.url_formlabel',
              'canNotCollapse' => 1,
            ),
          'title' =>
            array (
              'showitem' => 'title;LLL:EXT:cms/locallang_tca.xlf:pages.title_formlabel, --linebreak--, nav_title;LLL:EXT:cms/locallang_tca.xlf:pages.nav_title_formlabel, --linebreak--, subtitle;LLL:EXT:cms/locallang_tca.xlf:pages.subtitle_formlabel',
              'canNotCollapse' => 1,
            ),
          'titleonly' =>
            array (
              'showitem' => 'title;LLL:EXT:cms/locallang_tca.xlf:pages.title_formlabel',
              'canNotCollapse' => 1,
            ),
          'hiddenonly' =>
            array (
              'showitem' => 'hidden;LLL:EXT:cms/locallang_tca.xlf:pages.hidden_formlabel',
              'canNotCollapse' => 1,
            ),
          'access' =>
            array (
              'showitem' => 'starttime;LLL:EXT:cms/locallang_tca.xlf:pages.starttime_formlabel, endtime;LLL:EXT:cms/locallang_tca.xlf:pages.endtime_formlabel',
              'canNotCollapse' => 1,
            ),
          'abstract' =>
            array (
              'showitem' => 'abstract;LLL:EXT:cms/locallang_tca.xlf:pages.abstract_formlabel',
              'canNotCollapse' => 1,
            ),
          'metatags' =>
            array (
              'showitem' => 'keywords;LLL:EXT:cms/locallang_tca.xlf:pages.keywords_formlabel, --linebreak--, description;LLL:EXT:cms/locallang_tca.xlf:pages.description_formlabel',
              'canNotCollapse' => 1,
            ),
          'editorial' =>
            array (
              'showitem' => 'author;LLL:EXT:cms/locallang_tca.xlf:pages.author_formlabel, author_email;LLL:EXT:cms/locallang_tca.xlf:pages.author_email_formlabel',
              'canNotCollapse' => 1,
            ),
          'language' =>
            array (
              'showitem' => 'l18n_cfg;LLL:EXT:cms/locallang_tca.xlf:pages.l18n_cfg_formlabel',
              'canNotCollapse' => 1,
            ),
          'media' =>
            array (
              'showitem' => 'media;LLL:EXT:cms/locallang_tca.xlf:pages.media_formlabel',
              'canNotCollapse' => 1,
            ),
        ),
    ),
  'sys_domain' =>
    array (
      'ctrl' =>
        array (
          'label' => 'domainName',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'sortby' => 'sorting',
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain',
          'iconfile' => 'domain.gif',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-content-domain',
            ),
          'searchFields' => 'domainName,redirectTo',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,domainName,redirectTo',
        ),
      'columns' =>
        array (
          'domainName' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.domainName',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '35',
                  'max' => '80',
                  'eval' => 'required,unique,lower,trim,domainname',
                  'softref' => 'substitute',
                ),
            ),
          'redirectTo' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectTo',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '35',
                  'max' => '255',
                  'default' => '',
                  'eval' => 'trim',
                  'softref' => 'substitute',
                ),
            ),
          'redirectHttpStatusCode' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectHttpStatusCode',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectHttpStatusCode.301',
                          1 => '301',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectHttpStatusCode.302',
                          1 => '302',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectHttpStatusCode.303',
                          1 => '303',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.redirectHttpStatusCode.307',
                          1 => '307',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'prepend_params' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.prepend_params',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'forced' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_domain.forced',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '1',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,domainName;;1;;3-3-3,prepend_params,forced;;;;4-4-4',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'redirectTo, redirectHttpStatusCode',
            ),
        ),
    ),
  'sys_template' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'sortby' => 'sorting',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'delete' => 'deleted',
          'adminOnly' => 1,
          'iconfile' => 'template.gif',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'typeicon_column' => 'root',
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-content-template-extension',
              1 => 'mimetypes-x-content-template',
            ),
          'typeicons' =>
            array (
              0 => 'template_add.gif',
            ),
          'dividers2tabs' => 1,
          'searchFields' => 'title,constants,config',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,clear,root,basedOn,nextLevel,sitetitle,description,hidden,starttime,endtime',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '256',
                  'eval' => 'required',
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'starttime' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
            ),
          'endtime' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 1609369200,
                    ),
                ),
            ),
          'root' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.root',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'clear' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.clear',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'Constants',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'Setup',
                          1 => '',
                        ),
                    ),
                  'cols' => 2,
                ),
            ),
          'sitetitle' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.sitetitle',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '256',
                ),
            ),
          'constants' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.constants',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '48',
                  'rows' => '10',
                  'wrap' => 'OFF',
                  'softref' => 'TStemplate,email[subst],url[subst]',
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'nextLevel' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.nextLevel',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'sys_template',
                  'show_thumbs' => '1',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                  'default' => '',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'include_static_file' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.include_static_file',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 10,
                  'maxitems' => 100,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'Fluid: (Optional) default ajax configuration (fluid)',
                          1 => 'EXT:fluid/Configuration/TypoScript',
                        ),
                      1 =>
                        array (
                          0 => 'CSS Styled Content (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/',
                        ),
                      2 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v3.8 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v3.8/',
                        ),
                      3 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v3.9 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v3.9/',
                        ),
                      4 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.2 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.2/',
                        ),
                      5 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.3 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.3/',
                        ),
                      6 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.4 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.4/',
                        ),
                      7 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.5 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.5/',
                        ),
                      8 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.6 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.6/',
                        ),
                      9 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v4.7 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v4.7/',
                        ),
                      10 =>
                        array (
                          0 => 'CSS Styled Content TYPO3 v6.0 (css_styled_content)',
                          1 => 'EXT:css_styled_content/static/v6.0/',
                        ),
                      11 =>
                        array (
                          0 => 'Addresses (tt_address)',
                          1 => 'EXT:tt_address/static/pi1/',
                        ),
                      12 =>
                        array (
                          0 => 'Addresses (!!!old, only use if you need to!!!) (tt_address)',
                          1 => 'EXT:tt_address/static/old/',
                        ),
                      13 =>
                        array (
                          0 => 'Clickenlarge Rendering (rtehtmlarea)',
                          1 => 'EXT:rtehtmlarea/static/clickenlarge/',
                        ),
                      14 =>
                        array (
                          0 => 'Default TS (form)',
                          1 => 'EXT:form/Configuration/TypoScript/',
                        ),
                      15 =>
                        array (
                          0 => 'Example Configuration (formhandler)',
                          1 => 'EXT:formhandler/Configuration/Settings/',
                        ),
                      16 =>
                        array (
                          0 => 'Static Info Tables (static_info_tables)',
                          1 => 'EXT:static_info_tables/Configuration/TypoScript/Static',
                        ),
                      17 =>
                        array (
                          0 => 'News (news)',
                          1 => 'EXT:news/Configuration/TypoScript',
                        ),
                      18 =>
                        array (
                          0 => 'persons (lfpersons)',
                          1 => 'EXT:lfpersons/Configuration/TypoScript',
                        ),
                      19 =>
                        array (
                          0 => 'Institutions LF (lfinstitution)',
                          1 => 'EXT:lfinstitution/Configuration/TypoScript',
                        ),
                    ),
                  'softref' => 'ext_fileref',
                ),
            ),
          'basedOn' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.basedOn',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'sys_template',
                  'show_thumbs' => '1',
                  'size' => '3',
                  'maxitems' => '50',
                  'autoSizeMax' => 10,
                  'minitems' => '0',
                  'default' => '',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      '_VERTICAL' => 1,
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Edit template',
                          'script' => 'wizard_edit.php',
                          'popup_onlyOpenIfSelected' => 1,
                          'icon' => 'edit2.gif',
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.basedOn_add',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'sys_template',
                              'pid' => '###CURRENT_PID###',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                    ),
                ),
            ),
          'includeStaticAfterBasedOn' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.includeStaticAfterBasedOn',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'config' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.config',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 10,
                  'cols' => 48,
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      0 =>
                        array (
                          'title' => 'TSref online',
                          'script' => 'wizard_tsconfig.php?mode=tsref',
                          'icon' => 'wizard_tsconfig.gif',
                          'JSopenParams' => 'height=500,width=780,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'wrap' => 'OFF',
                  'softref' => 'TStemplate,email[subst],url[subst]',
                  'readOnly' => 1,
                ),
              'defaultExtras' => 'fixed-font : enable-tab',
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 5,
                  'cols' => 48,
                ),
            ),
          'static_file_mode' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.static_file_mode',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.static_file_mode.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.static_file_mode.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.static_file_mode.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_tca.xlf:sys_template.static_file_mode.3',
                          1 => '3',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'tx_impexp_origuid' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => '
			hidden,title;;1;;2-2-2, sitetitle, constants;;;;3-3-3, config, description;;;;4-4-4,
			--div--;LLL:EXT:cms/locallang_tca.xlf:sys_template.tabs.options, clear, root, nextLevel,
			--div--;LLL:EXT:cms/locallang_tca.xlf:sys_template.tabs.include, includeStaticAfterBasedOn,6-6-6, include_static_file, basedOn, static_file_mode,
			--div--;LLL:EXT:cms/locallang_tca.xlf:sys_template.tabs.access, starttime, endtime',
            ),
        ),
    ),
  'tt_content' =>
    array (
      'ctrl' =>
        array (
          'label' => 'header',
          'label_alt' => 'subheader,bodytext',
          'sortby' => 'sorting',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'title' => 'LLL:EXT:cms/locallang_tca.xlf:tt_content',
          'delete' => 'deleted',
          'versioningWS' => 2,
          'versioning_followPages' => true,
          'origUid' => 't3_origuid',
          'type' => 'CType',
          'hideAtCopy' => true,
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'copyAfterDuplFields' => 'colPos,sys_language_uid',
          'useColumnsForDefaultValues' => 'colPos,sys_language_uid',
          'shadowColumnsForNewPlaceholders' => 'colPos',
          'transOrigPointerField' => 'l18n_parent',
          'transOrigDiffSourceField' => 'l18n_diffsource',
          'languageField' => 'sys_language_uid',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
              'fe_group' => 'fe_group',
            ),
          'typeicon_column' => 'CType',
          'typeicon_classes' =>
            array (
              'header' => 'mimetypes-x-content-header',
              'textpic' => 'mimetypes-x-content-text-picture',
              'image' => 'mimetypes-x-content-image',
              'bullets' => 'mimetypes-x-content-list-bullets',
              'table' => 'mimetypes-x-content-table',
              'uploads' => 'mimetypes-x-content-list-files',
              'multimedia' => 'mimetypes-x-content-multimedia',
              'media' => 'mimetypes-x-content-multimedia',
              'menu' => 'mimetypes-x-content-menu',
              'list' => 'mimetypes-x-content-plugin',
              'mailform' => 'mimetypes-x-content-form',
              'search' => 'mimetypes-x-content-form-search',
              'login' => 'mimetypes-x-content-login',
              'shortcut' => 'mimetypes-x-content-link',
              'script' => 'mimetypes-x-content-script',
              'div' => 'mimetypes-x-content-divider',
              'html' => 'mimetypes-x-content-html',
              'text' => 'mimetypes-x-content-text',
              'default' => 'mimetypes-x-content-text',
              'templavoila_pi1' => 'extensions-templavoila-type-fce',
            ),
          'typeicons' =>
            array (
              'header' => 'tt_content_header.gif',
              'textpic' => 'tt_content_textpic.gif',
              'image' => 'tt_content_image.gif',
              'bullets' => 'tt_content_bullets.gif',
              'table' => 'tt_content_table.gif',
              'uploads' => 'tt_content_uploads.gif',
              'multimedia' => 'tt_content_mm.gif',
              'media' => 'tt_content_mm.gif',
              'menu' => 'tt_content_menu.gif',
              'list' => 'tt_content_list.gif',
              'mailform' => 'tt_content_form.gif',
              'search' => 'tt_content_search.gif',
              'login' => 'tt_content_login.gif',
              'shortcut' => 'tt_content_shortcut.gif',
              'script' => 'tt_content_script.gif',
              'div' => 'tt_content_div.gif',
              'html' => 'tt_content_html.gif',
              'templavoila_pi1' => '../typo3conf/ext/templavoila//icon_fce_ce.png',
            ),
          'thumbnail' => 'image',
          'requestUpdate' => 'list_type,rte_enabled,menu_type',
          'dividers2tabs' => 1,
          'searchFields' => 'header,header_link,subheader,bodytext,pi_flexform',
        ),
      'interface' =>
        array (
          'always_description' => 0,
          'showRecordFieldList' => 'CType,header,header_link,bodytext,image,imagewidth,imageorient,media,records,colPos,starttime,endtime,fe_group',
        ),
      'columns' =>
        array (
          'CType' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.div.standard',
                          1 => '--div--',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.0',
                          1 => 'header',
                          2 => 'i/tt_content_header.gif',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.1',
                          1 => 'text',
                          2 => 'i/tt_content.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.2',
                          1 => 'textpic',
                          2 => 'i/tt_content_textpic.gif',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.3',
                          1 => 'image',
                          2 => 'i/tt_content_image.gif',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.div.lists',
                          1 => '--div--',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.4',
                          1 => 'bullets',
                          2 => 'i/tt_content_bullets.gif',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.5',
                          1 => 'table',
                          2 => 'i/tt_content_table.gif',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.6',
                          1 => 'uploads',
                          2 => 'i/tt_content_uploads.gif',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.div.forms',
                          1 => '--div--',
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.8',
                          1 => 'mailform',
                          2 => 'i/tt_content_form.gif',
                        ),
                      11 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:CType.I.10',
                          1 => 'login',
                          2 => 'i/tt_content_login.gif',
                        ),
                      12 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.9',
                          1 => 'search',
                          2 => 'i/tt_content_search.gif',
                        ),
                      13 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.div.special',
                          1 => '--div--',
                        ),
                      14 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.7',
                          1 => 'multimedia',
                          2 => 'i/tt_content_mm.gif',
                        ),
                      15 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.18',
                          1 => 'media',
                          2 => 'i/tt_content_mm.gif',
                        ),
                      16 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.12',
                          1 => 'menu',
                          2 => 'i/tt_content_menu.gif',
                        ),
                      17 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.13',
                          1 => 'shortcut',
                          2 => 'i/tt_content_shortcut.gif',
                        ),
                      18 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.14',
                          1 => 'list',
                          2 => 'i/tt_content_list.gif',
                        ),
                      19 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.16',
                          1 => 'div',
                          2 => 'i/tt_content_div.gif',
                        ),
                      20 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:CType.I.17',
                          1 => 'html',
                          2 => 'i/tt_content_html.gif',
                        ),
                      21 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tt_content.CType_pi1',
                          1 => 'templavoila_pi1',
                          2 => 'EXT:templavoila/icon_fce_ce.png',
                        ),
                    ),
                  'default' => 'text',
                  'authMode' => 'explicitDeny',
                  'authMode_enforce' => 'strict',
                  'iconsInOptionTags' => 1,
                  'noIconsBelowSelect' => 1,
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:hidden.I.0',
                        ),
                    ),
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                ),
              'l10n_mode' => 'exclude',
              'l10n_display' => 'defaultAsReadonly',
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 1609369200,
                    ),
                ),
              'l10n_mode' => 'exclude',
              'l10n_display' => 'defaultAsReadonly',
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 5,
                  'maxitems' => 20,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
                          1 => -2,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'exclusiveKeys' => '-1,-2',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l18n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tt_content',
                  'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.sys_language_uid IN (-1,0)',
                ),
            ),
          'layout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.layout',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:layout.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:layout.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:layout.I.3',
                          1 => '3',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'colPos' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:colPos',
              'config' =>
                array (
                  'type' => 'select',
                  'itemsProcFunc' => 'EXT:cms/classes/class.tx_cms_backendlayout.php:TYPO3\\CMS\\Backend\\View\\BackendLayoutView->colPosListItemProcFunc',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:colPos.I.0',
                          1 => '1',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.normal',
                          1 => '0',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:colPos.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:colPos.I.3',
                          1 => '3',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'date' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:date',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '13',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                ),
            ),
          'header' =>
            array (
              'l10n_mode' => 'prefixLangTitle',
              'l10n_cat' => 'text',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:header',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '256',
                  'softref' => 'typolink_tag',
                ),
            ),
          'header_position' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:header_position',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_position.I.1',
                          1 => 'center',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_position.I.2',
                          1 => 'right',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_position.I.3',
                          1 => 'left',
                        ),
                    ),
                  'default' => '',
                ),
            ),
          'header_link' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:header_link',
              'exclude' => 1,
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '256',
                  'eval' => 'trim',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'typolink',
                ),
            ),
          'header_layout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.5',
                          1 => '5',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:header_layout.I.6',
                          1 => '100',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'subheader' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.subheader',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '256',
                  'softref' => 'email[subst]',
                ),
            ),
          'bodytext' =>
            array (
              'l10n_mode' => 'prefixLangTitle',
              'l10n_cat' => 'text',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.text',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '80',
                  'rows' => '15',
                  'wizards' =>
                    array (
                      '_PADDING' => 4,
                      '_VALIGN' => 'middle',
                      'RTE' =>
                        array (
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'type' => 'script',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
                          'icon' => 'wizard_rte2.gif',
                          'script' => 'wizard_rte.php',
                        ),
                      'table' =>
                        array (
                          'notNewRecords' => 1,
                          'enableByTypeConfig' => 1,
                          'type' => 'script',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.table',
                          'icon' => 'wizard_table.gif',
                          'script' => 'wizard_table.php',
                          'params' =>
                            array (
                              'xmlOutput' => 0,
                            ),
                        ),
                      'forms' =>
                        array (
                          'notNewRecords' => 1,
                          'enableByTypeConfig' => 1,
                          'type' => 'script',
                          'title' => 'Form wizard',
                          'icon' => 'wizard_forms.gif',
                          'script' => 'sysext/form/Classes/Controller/Wizard.php',
                          'params' =>
                            array (
                              'xmlOutput' => 0,
                            ),
                        ),
                      't3editor' =>
                        array (
                          'enableByTypeConfig' => 1,
                          'type' => 'userFunc',
                          'userFunc' => 'EXT:t3editor/Classes/class.tx_t3editor_tceforms_wizard.php:TYPO3\\CMS\\T3Editor\\FormWizard->main',
                          'title' => 't3editor',
                          'icon' => 'wizard_table.gif',
                          'script' => 'wizard_table.php',
                          'params' =>
                            array (
                              'format' => 'html',
                              'style' => 'width:98%; height: 60%;',
                            ),
                        ),
                    ),
                  'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                  'search' =>
                    array (
                      'andWhere' => 'CType=\'text\' OR CType=\'textpic\'',
                    ),
                ),
            ),
          'text_align' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:text_align',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_align.I.1',
                          1 => 'center',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_align.I.2',
                          1 => 'right',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_align.I.3',
                          1 => 'left',
                        ),
                    ),
                  'default' => '',
                ),
            ),
          'text_face' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:text_face',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'Times',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'Verdana',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'Arial',
                          1 => '3',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'text_size' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:text_size',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.5',
                          1 => '5',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.6',
                          1 => '10',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_size.I.7',
                          1 => '11',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'text_color' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:text_color',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.3',
                          1 => '200',
                        ),
                      4 =>
                        array (
                          0 => '-----',
                          1 => '--div--',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.5',
                          1 => '240',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.6',
                          1 => '241',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.7',
                          1 => '242',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.8',
                          1 => '243',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.9',
                          1 => '244',
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.10',
                          1 => '245',
                        ),
                      11 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.11',
                          1 => '246',
                        ),
                      12 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.12',
                          1 => '247',
                        ),
                      13 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.13',
                          1 => '248',
                        ),
                      14 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.14',
                          1 => '249',
                        ),
                      15 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_color.I.15',
                          1 => '250',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'text_properties' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:text_properties',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_properties.I.0',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_properties.I.1',
                          1 => '',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_properties.I.2',
                          1 => '',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:text_properties.I.3',
                          1 => '',
                        ),
                    ),
                  'cols' => 4,
                ),
            ),
          'image' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.images',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'sys_file_reference',
                  'foreign_field' => 'uid_foreign',
                  'foreign_sortby' => 'sorting_foreign',
                  'foreign_table_field' => 'tablenames',
                  'foreign_match_fields' =>
                    array (
                      'fieldname' => 'image',
                    ),
                  'foreign_label' => 'uid_local',
                  'foreign_selector' => 'uid_local',
                  'foreign_selector_fieldTcaOverride' =>
                    array (
                      'config' =>
                        array (
                          'appearance' =>
                            array (
                              'elementBrowserType' => 'file',
                              'elementBrowserAllowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                            ),
                        ),
                    ),
                  'filter' =>
                    array (
                      0 =>
                        array (
                          'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                          'parameters' =>
                            array (
                              'allowedFileExtensions' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                              'disallowedFileExtensions' => '',
                            ),
                        ),
                    ),
                  'appearance' =>
                    array (
                      'useSortable' => true,
                      'headerThumbnail' =>
                        array (
                          'field' => 'uid_local',
                          'width' => '64',
                          'height' => '64',
                        ),
                      'showPossibleLocalizationRecords' => true,
                      'showRemovedLocalizationRecords' => true,
                      'showSynchronizationLink' => true,
                      'enabledControls' =>
                        array (
                          'info' => false,
                          'new' => false,
                          'dragdrop' => true,
                          'sort' => false,
                          'hide' => true,
                          'delete' => true,
                          'localize' => true,
                        ),
                      'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference',
                    ),
                  'behaviour' =>
                    array (
                      'localizationMode' => 'select',
                      'localizeChildrenAtParentLocalization' => true,
                    ),
                  'foreign_types' =>
                    array (
                      0 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                      1 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                      2 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                      3 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                      4 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                      5 =>
                        array (
                          'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette',
                        ),
                    ),
                ),
            ),
          'imagewidth' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '4',
                  'max' => '4',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'upper' => '999',
                      'lower' => '25',
                    ),
                  'default' => 0,
                ),
            ),
          'imageheight' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '4',
                  'max' => '4',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'upper' => '700',
                      'lower' => '25',
                    ),
                  'default' => 0,
                ),
            ),
          'imageorient' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0',
                          1 => 0,
                          2 => 'selicons/above_center.gif',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1',
                          1 => 1,
                          2 => 'selicons/above_right.gif',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2',
                          1 => 2,
                          2 => 'selicons/above_left.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3',
                          1 => 8,
                          2 => 'selicons/below_center.gif',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4',
                          1 => 9,
                          2 => 'selicons/below_right.gif',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5',
                          1 => 10,
                          2 => 'selicons/below_left.gif',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6',
                          1 => 17,
                          2 => 'selicons/intext_right.gif',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7',
                          1 => 18,
                          2 => 'selicons/intext_left.gif',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8',
                          1 => '--div--',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9',
                          1 => 25,
                          2 => 'selicons/intext_right_nowrap.gif',
                        ),
                      10 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10',
                          1 => 26,
                          2 => 'selicons/intext_left_nowrap.gif',
                        ),
                    ),
                  'selicon_cols' => 6,
                  'default' => '0',
                  'iconsInOptionTags' => 1,
                ),
            ),
          'imageborder' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'image_noRows' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows.I.0',
                        ),
                    ),
                ),
            ),
          'image_link' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '3',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'typolink[linkList]',
                ),
            ),
          'image_zoom' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'image_effects' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2',
                          1 => 2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3',
                          1 => 3,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4',
                          1 => 10,
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5',
                          1 => 11,
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6',
                          1 => 20,
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7',
                          1 => 23,
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8',
                          1 => 25,
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9',
                          1 => 26,
                        ),
                    ),
                ),
            ),
          'image_frames' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2',
                          1 => 2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3',
                          1 => 3,
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4',
                          1 => 4,
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5',
                          1 => 5,
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6',
                          1 => 6,
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7',
                          1 => 7,
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8',
                          1 => 8,
                        ),
                    ),
                ),
            ),
          'image_compression' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'GIF/256',
                          1 => 10,
                        ),
                      3 =>
                        array (
                          0 => 'GIF/128',
                          1 => 11,
                        ),
                      4 =>
                        array (
                          0 => 'GIF/64',
                          1 => 12,
                        ),
                      5 =>
                        array (
                          0 => 'GIF/32',
                          1 => 13,
                        ),
                      6 =>
                        array (
                          0 => 'GIF/16',
                          1 => 14,
                        ),
                      7 =>
                        array (
                          0 => 'GIF/8',
                          1 => 15,
                        ),
                      8 =>
                        array (
                          0 => 'PNG',
                          1 => 39,
                        ),
                      9 =>
                        array (
                          0 => 'PNG/256',
                          1 => 30,
                        ),
                      10 =>
                        array (
                          0 => 'PNG/128',
                          1 => 31,
                        ),
                      11 =>
                        array (
                          0 => 'PNG/64',
                          1 => 32,
                        ),
                      12 =>
                        array (
                          0 => 'PNG/32',
                          1 => 33,
                        ),
                      13 =>
                        array (
                          0 => 'PNG/16',
                          1 => 34,
                        ),
                      14 =>
                        array (
                          0 => 'PNG/8',
                          1 => 35,
                        ),
                      15 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15',
                          1 => 21,
                        ),
                      16 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16',
                          1 => 22,
                        ),
                      17 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17',
                          1 => 24,
                        ),
                      18 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18',
                          1 => 26,
                        ),
                      19 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19',
                          1 => 28,
                        ),
                    ),
                ),
            ),
          'imagecols' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '1',
                          1 => 1,
                        ),
                      1 =>
                        array (
                          0 => '2',
                          1 => 2,
                        ),
                      2 =>
                        array (
                          0 => '3',
                          1 => 3,
                        ),
                      3 =>
                        array (
                          0 => '4',
                          1 => 4,
                        ),
                      4 =>
                        array (
                          0 => '5',
                          1 => 5,
                        ),
                      5 =>
                        array (
                          0 => '6',
                          1 => 6,
                        ),
                      6 =>
                        array (
                          0 => '7',
                          1 => 7,
                        ),
                      7 =>
                        array (
                          0 => '8',
                          1 => 8,
                        ),
                    ),
                  'default' => 1,
                ),
            ),
          'imagecaption' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.caption',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                ),
            ),
          'imagecaption_position' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1',
                          1 => 'center',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2',
                          1 => 'right',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3',
                          1 => 'left',
                        ),
                    ),
                  'default' => '',
                ),
            ),
          'altText' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_altText',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag',
                ),
            ),
          'titleText' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_titleText',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '3',
                  'softref' => 'rtehtmlarea_images,typolink_tag',
                ),
            ),
          'longdescURL' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_longdescURL',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '3',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'params' =>
                            array (
                              'blindLinkOptions' => 'folder,file,mail,spec',
                              'blindLinkFields' => 'target,title,class,params',
                            ),
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'softref' => 'typolink[linkList]',
                ),
            ),
          'cols' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:cols',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:cols.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => '1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => '2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => '3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => '4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => '5',
                          1 => '5',
                        ),
                      6 =>
                        array (
                          0 => '6',
                          1 => '6',
                        ),
                      7 =>
                        array (
                          0 => '7',
                          1 => '7',
                        ),
                      8 =>
                        array (
                          0 => '8',
                          1 => '8',
                        ),
                      9 =>
                        array (
                          0 => '9',
                          1 => '9',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'pages' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.startingpoint',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '3',
                  'maxitems' => '22',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'recursive' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.recursive',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:recursive.I.5',
                          1 => '250',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'menu_type' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:menu_type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.2',
                          1 => '4',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.3',
                          1 => '7',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.4',
                          1 => '2',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.8',
                          1 => '8',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.5',
                          1 => '3',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.6',
                          1 => '5',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:menu_type.I.7',
                          1 => '6',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'list_type' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:list_type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                          2 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang.php:mod_indexed_search',
                          1 => 'indexed_search',
                          2 => 'sysext/indexed_search/ext_icon.gif',
                        ),
                      2 =>
                        array (
                          0 => 'Indexed Search (experimental)',
                          1 => 'indexedsearch_pi2',
                          2 => 'sysext/indexed_search/ext_icon.gif',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:tt_address/locallang_tca.xml:pi_tt_address',
                          1 => 'tt_address_pi1',
                          2 => '../typo3conf/ext/tt_address/ext_icon.gif',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:tscobj/locallang_db.php:tt_content.list_type_pi1',
                          1 => 'tscobj_pi1',
                          2 => '../typo3conf/ext/tscobj/ext_icon.gif',
                        ),
                      5 =>
                        array (
                          0 => 'Formhandler',
                          1 => 'formhandler_pi1',
                          2 => '../typo3conf/ext/formhandler/ext_icon.gif',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_be.xml:pi1_title',
                          1 => 'news_pi1',
                          2 => '../typo3conf/ext/news/ext_icon.gif',
                        ),
                      7 =>
                        array (
                          0 => 'LF Persons',
                          1 => 'lfpersons_lfpersons',
                          2 => '../typo3conf/ext/lfpersons/ext_icon.gif',
                        ),
                      8 =>
                        array (
                          0 => 'Liste institutioner',
                          1 => 'lfinstitution_institutions',
                          2 => '../typo3conf/ext/lfinstitution/ext_icon.gif',
                        ),
                      9 =>
                        array (
                          0 => 'feedit pi1',
                          1 => 'lf_feedit_pi1',
                          2 => '../typo3conf/ext/lf_feedit/ext_icon.gif',
                        ),
                      10 =>
                        array (
                          0 => 'Liste publikationer',
                          1 => 'lfpagelist_pi1',
                          2 => '../typo3conf/ext/lfpagelist/res/images/ext_icon.gif',
                        ),
                      11 =>
                        array (
                          0 => 'Combined select field',
                          1 => 'kultur_combinedselectfield_pi1',
                          2 => '../typo3conf/ext/kultur_combinedselectfield/res/images/ext_icon.gif',
                        ),
                    ),
                  'itemsProcFunc' => 'user_sortPluginList',
                  'default' => '',
                  'authMode' => 'explicitDeny',
                  'iconsInOptionTags' => 1,
                  'noIconsBelowSelect' => 1,
                ),
            ),
          'select_key' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.code',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '50',
                  'max' => '80',
                  'eval' => 'trim',
                ),
            ),
          'table_bgColor' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.3',
                          1 => '200',
                        ),
                      4 =>
                        array (
                          0 => '-----',
                          1 => '--div--',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.5',
                          1 => '240',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.6',
                          1 => '241',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.7',
                          1 => '242',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.8',
                          1 => '243',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:table_bgColor.I.9',
                          1 => '244',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'table_border' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:table_border',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '3',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'upper' => '20',
                      'lower' => '0',
                    ),
                  'default' => 0,
                ),
            ),
          'table_cellspacing' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:table_cellspacing',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '3',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'upper' => '200',
                      'lower' => '0',
                    ),
                  'default' => 0,
                ),
            ),
          'table_cellpadding' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:table_cellpadding',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '3',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'upper' => '200',
                      'lower' => '0',
                    ),
                  'default' => 0,
                ),
            ),
          'media' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:media',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'sys_file_reference',
                  'foreign_field' => 'uid_foreign',
                  'foreign_sortby' => 'sorting_foreign',
                  'foreign_table_field' => 'tablenames',
                  'foreign_match_fields' =>
                    array (
                      'fieldname' => 'media',
                    ),
                  'foreign_label' => 'uid_local',
                  'foreign_selector' => 'uid_local',
                  'foreign_selector_fieldTcaOverride' =>
                    array (
                      'config' =>
                        array (
                          'appearance' =>
                            array (
                              'elementBrowserType' => 'file',
                              'elementBrowserAllowed' => '',
                            ),
                        ),
                    ),
                  'filter' =>
                    array (
                      0 =>
                        array (
                          'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
                          'parameters' =>
                            array (
                              'allowedFileExtensions' => '',
                              'disallowedFileExtensions' => '',
                            ),
                        ),
                    ),
                  'appearance' =>
                    array (
                      'useSortable' => true,
                      'headerThumbnail' =>
                        array (
                          'field' => 'uid_local',
                          'width' => '64',
                          'height' => '64',
                        ),
                      'showPossibleLocalizationRecords' => true,
                      'showRemovedLocalizationRecords' => true,
                      'showSynchronizationLink' => true,
                      'enabledControls' =>
                        array (
                          'info' => false,
                          'new' => false,
                          'dragdrop' => true,
                          'sort' => false,
                          'hide' => true,
                          'delete' => true,
                          'localize' => true,
                        ),
                      'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:media.addFileReference',
                    ),
                  'behaviour' =>
                    array (
                      'localizationMode' => 'select',
                      'localizeChildrenAtParentLocalization' => true,
                    ),
                ),
            ),
          'file_collections' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xlf:file_collections',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'localizeReferencesAtParentLocalization' => true,
                  'allowed' => 'sys_file_collection',
                  'foreign_table' => 'sys_file_collection',
                  'maxitems' => 999,
                  'minitems' => 0,
                  'size' => 5,
                ),
            ),
          'multimedia' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:multimedia',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'txt,html,htm,class,swf,swa,dcr,wav,avi,au,mov,asf,mpg,wmv,mp3,mp4,m4v',
                  'max_size' => '15360',
                  'uploadfolder' => 'uploads/media',
                  'size' => '2',
                  'maxitems' => '1',
                  'minitems' => '0',
                ),
            ),
          'filelink_size' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'filelink_sorting' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_sorting',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:filelink_sorting.none',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:filelink_sorting.extension',
                          1 => 'extension',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:filelink_sorting.name',
                          1 => 'name',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:filelink_sorting.type',
                          1 => 'type',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xlf:filelink_sorting.size',
                          1 => 'size',
                        ),
                    ),
                ),
            ),
          'target' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:target',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                  'eval' => 'trim',
                  'wizards' =>
                    array (
                      'target_picker' =>
                        array (
                          'type' => 'select',
                          'mode' => '',
                          'items' =>
                            array (
                              0 =>
                                array (
                                  0 => 'LLL:EXT:cms/locallang_ttc.xml:target.I.1',
                                  1 => '_blank',
                                ),
                            ),
                        ),
                    ),
                  'default' => '',
                ),
            ),
          'records' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:records',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'tt_content,tt_address',
                  'size' => '5',
                  'maxitems' => '200',
                  'minitems' => '0',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'spaceBefore' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:spaceBefore',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '5',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'lower' => '0',
                    ),
                  'default' => 0,
                ),
            ),
          'spaceAfter' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:spaceAfter',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '5',
                  'eval' => 'int',
                  'range' =>
                    array (
                      'lower' => '0',
                    ),
                  'default' => 0,
                ),
            ),
          'section_frame' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:section_frame',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:css_styled_content/locallang_db.xlf:tt_content.tx_cssstyledcontent_section_frame.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.2',
                          1 => '5',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.3',
                          1 => '6',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.4',
                          1 => '10',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.5',
                          1 => '11',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.6',
                          1 => '12',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.7',
                          1 => '20',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:section_frame.I.8',
                          1 => '21',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:css_styled_content/locallang_db.xlf:tt_content.tx_cssstyledcontent_section_frame.I.9',
                          1 => '66',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'sectionIndex' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:sectionIndex',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 1,
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'linkToTop' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:linkToTop',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'rte_enabled' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:rte_enabled',
              'config' =>
                array (
                  'type' => 'check',
                  'showIfRTE' => 1,
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:rte_enabled.I.0',
                        ),
                    ),
                ),
            ),
          'pi_flexform' =>
            array (
              'l10n_display' => 'hideDiff',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:pi_flexform',
              'config' =>
                array (
                  'type' => 'flex',
                  'ds_pointerField' => 'list_type,CType',
                  'ds' =>
                    array (
                      'default' => '
						<T3DataStructure>
						  <ROOT>
						    <type>array</type>
						    <el>
								<!-- Repeat an element like "xmlTitle" beneath for as many elements you like. Remember to name them uniquely  -->
						      <xmlTitle>
								<TCEforms>
									<label>The Title:</label>
									<config>
										<type>input</type>
										<size>48</size>
									</config>
								</TCEforms>
						      </xmlTitle>
						    </el>
						  </ROOT>
						</T3DataStructure>
					',
                      ',media' => '<?xml version="1.0" encoding="utf-8"?>
<T3DataStructure>
	<meta>
		<langDisable>1</langDisable>
	</meta>
	<sheets>
		<sGeneral>
			<ROOT>
				<TCEforms>
					<sheetTitle>LLL:EXT:cms/locallang_ttc.xml:media.options</sheetTitle>
				</TCEforms>
				<type>array</type>
				<el>
					<mmType>
						<TCEforms>
							<onChange>reload</onChange>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.type</label>
							<config>
								<type>select</type>
								<items>
									<numIndex index="0">
										<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.type.video</numIndex>
										<numIndex index="1">video</numIndex>
									</numIndex>
									<numIndex index="1">
										<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.type.audio</numIndex>
										<numIndex index="1">audio</numIndex>
									</numIndex>
								</items>
							</config>
						</TCEforms>
					</mmType>
					<mmUseHTML5>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.useHTML5</label>
							<displayCond>FIELD:mmType:!=:audio</displayCond>
							<onChange>reload</onChange>
							<config>
								<type>check</type>
								<default>0</default>
							</config>
						</TCEforms>
					</mmUseHTML5>
					<mmWidth>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.width</label>
							<config>
								<type>input</type>
								<size>8</size>
								<max>5</max>
								<eval>trim,num</eval>
							</config>
						</TCEforms>
					</mmWidth>
					<mmHeight>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.height</label>
							<config>
								<type>input</type>
								<size>8</size>
								<max>5</max>
								<eval>trim,num</eval>
							</config>
						</TCEforms>
					</mmHeight>
					<mmRenderType>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.renderType</label>
							<displayCond>FIELD:mmType:!=:audio</displayCond>
							<config>
								<type>select</type>
								<items>
									<numIndex index="0">
										<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.renderType.auto</numIndex>
										<numIndex index="1">auto</numIndex>
									</numIndex>
									<numIndex index="1">
										<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.renderType.qt</numIndex>
										<numIndex index="1">qt</numIndex>
									</numIndex>
									<numIndex index="2">
										<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.renderType.embed</numIndex>
										<numIndex index="1">embed</numIndex>
									</numIndex>
								</items>
								<itemsProcFunc>tx_cms_mediaItems->customMediaRenderTypes</itemsProcFunc>
							</config>
						</TCEforms>
					</mmRenderType>
					<mmMediaOptions>
						<title>LLL:EXT:cms/locallang_ttc.xml:media.additionalOptions</title>
						<type>array</type>
						<section>1</section>
						<el>
							<mmMediaOptionsContainer>
								<type>array</type>
								<title>LLL:EXT:cms/locallang_ttc.xml:media.params</title>
								<el>
									<mmParamName>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.params.option</label>
											<config>
												<type>select</type>
												<items>
													<numIndex index="0">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.autoPlay</numIndex>
														<numIndex index="1">autoPlay</numIndex>
													</numIndex>
													<numIndex index="1">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.loop</numIndex>
														<numIndex index="1">loop</numIndex>
													</numIndex>
													<numIndex index="2">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.quality</numIndex>
														<numIndex index="1">quality</numIndex>
													</numIndex>
													<numIndex index="3">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.preview</numIndex>
														<numIndex index="1">preview</numIndex>
													</numIndex>
													<numIndex index="4">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.allowScriptAccess</numIndex>
														<numIndex index="1">allowScriptAccess</numIndex>
													</numIndex>
													<numIndex index="5">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.allowFullScreen</numIndex>
														<numIndex index="1">allowFullScreen</numIndex>
													</numIndex>
													<numIndex index="6">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.preload</numIndex>
														<numIndex index="1">preload</numIndex>
													</numIndex>
													<numIndex index="7">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.controlsBelow</numIndex>
														<numIndex index="1">controlsBelow</numIndex>
													</numIndex>
													<numIndex index="8">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.controlsAtStart</numIndex>
														<numIndex index="1">controlsAtStart</numIndex>
													</numIndex>
													<numIndex index="9">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.controlsHiding</numIndex>
														<numIndex index="1">controlsHiding</numIndex>
													</numIndex>
													<numIndex index="10">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.defaultVolume</numIndex>
														<numIndex index="1">defaultVolume</numIndex>
													</numIndex>
												</items>
												<itemsProcFunc>tx_cms_mediaItems->customMediaParams</itemsProcFunc>
											</config>
										</TCEforms>
									</mmParamName>
									<mmParamSet>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.params.setTo</label>
											<config>
												<type>select</type>
												<items>
													<numIndex index="0">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.on</numIndex>
														<numIndex index="1">1</numIndex>
													</numIndex>
													<numIndex index="1">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.off</numIndex>
														<numIndex index="1">0</numIndex>
													</numIndex>
													<numIndex index="2">
														<numIndex index="0">LLL:EXT:cms/locallang_ttc.xml:media.params.valueEntry</numIndex>
														<numIndex index="1">2</numIndex>
													</numIndex>
												</items>
											</config>
										</TCEforms>
									</mmParamSet>
									<mmParamValue>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.params.value</label>
											<config>
												<type>input</type>
												<size>16</size>
												<default></default>
											</config>
										</TCEforms>
									</mmParamValue>
								</el>
							</mmMediaOptionsContainer>
							<mmMediaCustomParameterContainer>
								<type>array</type>
								<title>LLL:EXT:cms/locallang_ttc.xml:media.params.customEntry</title>
								<el>
									<mmParamCustomEntry>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.params.customEntryLabel</label>
											<config>
												<type>text</type>
												<rows>6</rows>
												<cols>60</cols>
											</config>
										</TCEforms>
									</mmParamCustomEntry>
								</el>
							</mmMediaCustomParameterContainer>
						</el>
					</mmMediaOptions>
				</el>
			</ROOT>
		</sGeneral>
		<sVideo>
			<ROOT>
				<TCEforms>
					<sheetTitle>LLL:EXT:cms/locallang_ttc.xml:media.tabVideo</sheetTitle>
					<displayCond>FIELD:sGeneral.mmType:!=:audio</displayCond>
				</TCEforms>
				<type>array</type>
				<el>
					<mmFile>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.fallbackUrl</label>
							<config>
								<type>input</type>
								<size>60</size>
								<eval>trim,required</eval>
								<default></default>
								<wizards type="array">
									<_PADDING>2</_PADDING>
									<link type="array">
										<type>popup</type>
										<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
										<icon>link_popup.gif</icon>
										<script>browse_links.php?mode=wizard&amp;act=file|url</script>
										<params type="array">
											<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
											<allowedExtensions>class,swa,dcr,wav,avi,au,mov,asf,mpg,wmv,mp3,mp4,m4v,m4a,flv,ogg,ogv,swf,webm</allowedExtensions>
										</params>
										<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
									</link>
								</wizards>
							</config>
						</TCEforms>
					</mmFile>
				</el>
			</ROOT>
		</sVideo>
		<sVideoAccessible>
			<ROOT>
				<TCEforms>
					<sheetTitle>LLL:EXT:cms/locallang_ttc.xml:media.tabVideoAccessible</sheetTitle>
					<displayCond>FIELD:sGeneral.mmUseHTML5:=:1</displayCond>
				</TCEforms>
				<type>array</type>
				<el>
					<mmSources>
						<title>LLL:EXT:cms/locallang_ttc.xml:media.sources</title>
						<type>array</type>
						<section>1</section>
						<el>
							<mmSourcesContainer>
								<type>array</type>
								<title>LLL:EXT:cms/locallang_ttc.xml:media.media.url</title>
								<el>
									<mmSource>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.url</label>
											<config>
												<type>input</type>
												<size>60</size>
												<eval>trim,required</eval>
												<default></default>
												<wizards type="array">
													<_PADDING>2</_PADDING>
													<link type="array">
														<type>popup</type>
														<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
														<icon>link_popup.gif</icon>
														<script>browse_links.php?mode=wizard&amp;act=file|url</script>
														<params type="array">
															<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
															<allowedExtensions>mov,mpg,mp4,m4a,m4v,ogg,ogv,swf,webm</allowedExtensions>
														</params>
														<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
													</link>
												</wizards>
											</config>
										</TCEforms>
									</mmSource>
								</el>
							</mmSourcesContainer>
						</el>
					</mmSources>
					<mmCaption>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.captionUrl</label>
							<config>
								<type>input</type>
								<size>60</size>
								<eval>trim</eval>
								<default></default>
								<wizards type="array">
									<_PADDING>2</_PADDING>
									<link type="array">
										<type>popup</type>
										<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
										<icon>link_popup.gif</icon>
										<script>browse_links.php?mode=wizard&amp;act=file|url</script>
										<params type="array">
											<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
											<allowedExtensions>srt</allowedExtensions>
										</params>
										<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
									</link>
								</wizards>
							</config>
						</TCEforms>
					</mmCaption>
					<mmAudioSources>
						<title>LLL:EXT:cms/locallang_ttc.xml:media.audioDescription</title>
						<type>array</type>
						<section>1</section>
						<el>
							<mmAudioSourcesContainer>
								<type>array</type>
								<title>LLL:EXT:cms/locallang_ttc.xml:media.media.browseUrl</title>
								<el>
									<mmAudioSource>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.browseUrl</label>
											<config>
												<type>input</type>
												<size>60</size>
												<eval>trim,required</eval>
												<default></default>
												<wizards type="array">
													<_PADDING>2</_PADDING>
													<link type="array">
														<type>popup</type>
														<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
														<icon>link_popup.gif</icon>
														<script>browse_links.php?mode=wizard&amp;act=file|url</script>
														<params type="array">
															<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
															<allowedExtensions>au,asf,mp3,m4a,oga,ogg, wav,webm,wmv</allowedExtensions>
														</params>
														<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
													</link>
												</wizards>
											</config>
										</TCEforms>
									</mmAudioSource>
								</el>
							</mmAudioSourcesContainer>
						</el>
					</mmAudioSources>

				</el>
			</ROOT>
		</sVideoAccessible>
		<sAudio>
			<ROOT>
				<TCEforms>
					<sheetTitle>LLL:EXT:cms/locallang_ttc.xml:media.tabAudio</sheetTitle>
					<displayCond>FIELD:sGeneral.mmType:=:audio</displayCond>
				</TCEforms>
				<type>array</type>
				<el>
					<mmAudioFallback>
						<TCEforms>
							<label>LLL:EXT:cms/locallang_ttc.xml:media.audioFallbackUrl</label>
							<config>
								<type>input</type>
								<size>60</size>
								<eval>trim</eval>
								<default></default>
								<wizards type="array">
									<_PADDING>2</_PADDING>
									<link type="array">
										<type>popup</type>
										<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
										<icon>link_popup.gif</icon>
										<script>browse_links.php?mode=wizard&amp;act=file|url</script>
										<params type="array">
											<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
											<allowedExtensions>au,asf,mp3,m4a,oga,swa,wav,webm,wmv</allowedExtensions>
										</params>
										<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
									</link>
								</wizards>
							</config>
						</TCEforms>
					</mmAudioFallback>
					<mmAudioSources>
						<title>LLL:EXT:cms/locallang_ttc.xml:media.audioSources</title>
						<type>array</type>
						<section>1</section>
						<el>
							<mmAudioSourcesContainer>
								<type>array</type>
								<title>LLL:EXT:cms/locallang_ttc.xml:media.media.url</title>
								<el>
									<mmAudioSource>
										<TCEforms>
											<label>LLL:EXT:cms/locallang_ttc.xml:media.url</label>
											<config>
												<type>input</type>
												<size>60</size>
												<eval>trim,required</eval>
												<default></default>
												<wizards type="array">
													<_PADDING>2</_PADDING>
													<link type="array">
														<type>popup</type>
														<title>LLL:EXT:cms/locallang_ttc.xml:media.browseUrlTitle</title>
														<icon>link_popup.gif</icon>
														<script>browse_links.php?mode=wizard&amp;act=file|url</script>
														<params type="array">
															<blindLinkOptions>page,folder,mail,spec</blindLinkOptions>
															<allowedExtensions>au,asf,mp3,m4a,oga,ogg, wav,webm,wmv</allowedExtensions>
														</params>
														<JSopenParams>height=300,width=500,status=0,menubar=0,scrollbars=1</JSopenParams>
													</link>
												</wizards>
											</config>
										</TCEforms>
									</mmAudioSource>
								</el>
							</mmAudioSourcesContainer>
						</el>
					</mmAudioSources>
				</el>
			</ROOT>
		</sAudio>
	</sheets>
</T3DataStructure>
',
                      '*,table' => 'FILE:EXT:css_styled_content/flexform_ds.xml',
                      'tt_address_pi1,list' => 'FILE:EXT:tt_address/pi1/flexform.xml',
                      'tscobj_pi1,list' => 'FILE:EXT:tscobj/flexform_ds_pi1.xml',
                      '*,login' => 'FILE:EXT:felogin/flexform.xml',
                      'formhandler_pi1,list' => 'FILE:EXT:formhandler/Resources/XML/flexform_ds.xml',
                      'news_pi1,list' => 'FILE:EXT:news/Configuration/FlexForms/flexform_news.xml',
                      'lfpersons_lfpersons,list' => 'FILE:EXT:lfpersons/Configuration/FlexForms/flexform_lfpersons.xml',
                      'lfinstitution_institutions,list' => 'FILE:EXT:lfinstitution/Configuration/FlexForms/flexform.xml',
                      'lfpagelist_pi1,list' => 'FILE:EXT:lfpagelist/Configuration/FlexForms/flexform_lfpagelist.xml',
                    ),
                  'search' =>
                    array (
                      'andWhere' => 'CType=\'list\'',
                    ),
                ),
            ),
          'tx_impexp_origuid' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'accessibility_title' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:accessibility_title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                  'eval' => 'trim',
                  'default' => '',
                ),
            ),
          'accessibility_bypass' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:accessibility_bypass',
              'config' =>
                array (
                  'type' => 'check',
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled',
                        ),
                    ),
                ),
            ),
          'accessibility_bypass_text' =>
            array (
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:accessibility_bypass_text',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                  'eval' => 'trim',
                  'default' => '',
                ),
            ),
          'l18n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                ),
            ),
          'tx_templavoila_ds' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tt_content.tx_templavoila_ds',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'allowNonIdValues' => 1,
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->dataSourceItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_to' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tt_content.tx_templavoila_to',
              'displayCond' => 'FIELD:CType:=:templavoila_pi1',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->templateObjectItemsProcFunc',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'selicon_cols' => 10,
                ),
            ),
          'tx_templavoila_flex' =>
            array (
              'l10n_cat' => 'text',
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tt_content.tx_templavoila_flex',
              'displayCond' => 'FIELD:tx_templavoila_ds:REQ:true',
              'config' =>
                array (
                  'type' => 'flex',
                  'ds_pointerField' => 'tx_templavoila_ds',
                  'ds_tableField' => 'tx_templavoila_datastructure:dataprot',
                ),
            ),
          'tx_templavoila_pito' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tt_content.tx_templavoila_pito',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->pi_templates',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'selicon_cols' => 10,
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'CType',
            ),
          'header' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.headers;headers,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'text' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
					bodytext;LLL:EXT:cms/locallang_ttc.xml:bodytext_formlabel;;richtext:rte_transform[flag=rte_enabled|mode=ts_css],
					rte_enabled;LLL:EXT:cms/locallang_ttc.xml:rte_enabled_formlabel,
					--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
						--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
						--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.textlayout;textlayout,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'textpic' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
					bodytext;Text;;richtext:rte_transform[flag=rte_enabled|mode=ts_css],
					rte_enabled;LLL:EXT:cms/locallang_ttc.xml:rte_enabled_formlabel,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,
					image,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.textlayout;textlayout,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'image' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,
					image,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'bullets' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
					bodytext;LLL:EXT:cms/locallang_ttc.xml:bodytext.ALT.bulletlist_formlabel;;nowrap,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.textlayout;textlayout,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'table' =>
            array (
              'showitem' => 'CType;;4;;1-1-1, hidden, header;;3;;2-2-2, linkToTop;;;;4-4-4,
			--div--;LLL:EXT:cms/locallang_ttc.xml:CType.I.5, layout;;10;;3-3-3, cols, bodytext;;9;nowrap:wizards[table], text_properties, pi_flexform,
			--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access, starttime, endtime, fe_group',
            ),
          'uploads' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:media;uploads,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.uploads_layout;uploadslayout,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'multimedia' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.multimediafiles;multimediafiles,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'media' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,
					pi_flexform; ;,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.behaviour,
					bodytext;LLL:EXT:cms/locallang_ttc.xml:bodytext.ALT.media_formlabel;;richtext:rte_transform[flag=rte_enabled|mode=ts_css],
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'menu' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.menu;menu,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.menu_accessibility;menu_accessibility,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
              'subtype_value_field' => 'menu_type',
              'subtypes_excludelist' =>
                array (
                  2 => 'pages',
                ),
            ),
          'mailform' =>
            array (
              'showitem' => '
	CType;;4;;1-1-1,
	hidden,
	header;;3;;2-2-2,
	linkToTop;;;;3-3-3,
	--div--;LLL:EXT:cms/locallang_ttc.xml:CType.I.8,
	bodytext;LLL:EXT:cms/locallang_ttc.php:bodytext.ALT.mailform;;nowrap:wizards[forms];3-3-3,
	--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.access,
	starttime,
	endtime,
	fe_group
',
            ),
          'search' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.behaviour,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.searchform;searchform,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'shortcut' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					header;LLL:EXT:cms/locallang_ttc.xml:header.ALT.shortcut_formlabel,
					records;LLL:EXT:cms/locallang_ttc.xml:records_formlabel,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'list' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.plugin,
					list_type;LLL:EXT:cms/locallang_ttc.xml:list_type_formlabel,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.behaviour,
					select_key;LLL:EXT:cms/locallang_ttc.xml:select_key_formlabel,
					pages;LLL:EXT:cms/locallang_ttc.xml:pages.ALT.list_formlabel,
					recursive,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
              'subtype_value_field' => 'list_type',
              'subtypes_excludelist' =>
                array (
                  3 => 'layout',
                  2 => 'layout',
                  5 => 'layout',
                  9 => 'layout',
                  0 => 'layout',
                  6 => 'layout',
                  7 => 'layout',
                  1 => 'layout',
                  8 => 'layout',
                  11 => 'layout',
                  20 => 'layout',
                  21 => 'layout',
                  'indexed_search' => 'layout,select_key,pages',
                  'indexedsearch_pi2' => 'layout,select_key,pages,recursive',
                  'tt_address_pi1' => 'layout,select_key,pages,recursive',
                  'tscobj_pi1' => 'layout,select_key,pages,recursive',
                  'formhandler_pi1' => 'layout,select_key,pages',
                  'news_pi1' => 'layout,recursive,select_key,pages',
                  'lf_feedit_pi1' => 'layout,select_key',
                  'lfpagelist_pi1' => 'layout,select_key',
                  'kultur_combinedselectfield_pi1' => 'layout,select_key',
                ),
              'subtypes_addlist' =>
                array (
                  'tt_address_pi1' => 'pi_flexform',
                  'tscobj_pi1' => 'pi_flexform',
                  'formhandler_pi1' => 'pi_flexform',
                  'news_pi1' => 'pi_flexform',
                  'lfpersons_lfpersons' => 'pi_flexform',
                  'lfinstitution_institutions' => 'pi_flexform',
                  'lfpagelist_pi1' => 'pi_flexform',
                ),
            ),
          'div' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					header;LLL:EXT:cms/locallang_ttc.xml:header.ALT.div_formlabel,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'html' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
					header;LLL:EXT:cms/locallang_ttc.xml:header.ALT.html_formlabel,
					bodytext;LLL:EXT:cms/locallang_ttc.xml:bodytext.ALT.html_formlabel;;nowrap:wizards[t3editor],
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'templavoila_pi1' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.headers;headers, tx_templavoila_flex;;;;1-1-1, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance, --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames, tx_templavoila_to, --div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended',
            ),
          'login' =>
            array (
              'showitem' => '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
													--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
													--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.plugin,
													pi_flexform;;;;1-1-1,
													--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
													--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
													--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
													--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
													--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
													--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.behaviour,
													--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'starttime, endtime',
            ),
          2 =>
            array (
              'showitem' => 'imagecols, image_noRows, imageborder',
            ),
          3 =>
            array (
              'showitem' => 'header_position, header_layout, header_link, date',
            ),
          4 =>
            array (
              'showitem' => 'sys_language_uid, l18n_parent, colPos, spaceBefore, spaceAfter, section_frame, sectionIndex',
            ),
          5 =>
            array (
              'showitem' => 'imagecaption_position',
            ),
          6 =>
            array (
              'showitem' => 'imagewidth,image_link',
            ),
          7 =>
            array (
              'showitem' => 'image_link, image_zoom',
              'canNotCollapse' => 1,
            ),
          8 =>
            array (
              'showitem' => 'layout',
            ),
          9 =>
            array (
              'showitem' => 'text_align,text_face,text_size,text_color',
            ),
          10 =>
            array (
              'showitem' => 'table_bgColor, table_border, table_cellspacing, table_cellpadding',
            ),
          11 =>
            array (
              'showitem' => 'image_compression, image_effects, image_frames',
              'canNotCollapse' => 1,
            ),
          12 =>
            array (
              'showitem' => 'recursive',
            ),
          13 =>
            array (
              'showitem' => 'imagewidth, imageheight',
              'canNotCollapse' => 1,
            ),
          14 =>
            array (
              'showitem' => 'sys_language_uid, l18n_parent, colPos',
            ),
          'general' =>
            array (
              'showitem' => 'CType;LLL:EXT:cms/locallang_ttc.xml:CType_formlabel, colPos;LLL:EXT:cms/locallang_ttc.xml:colPos_formlabel, sys_language_uid;LLL:EXT:cms/locallang_ttc.xml:sys_language_uid_formlabel',
              'canNotCollapse' => 1,
            ),
          'header' =>
            array (
              'showitem' => 'header;LLL:EXT:cms/locallang_ttc.xml:header_formlabel, --linebreak--, header_layout;LLL:EXT:cms/locallang_ttc.xml:header_layout_formlabel, header_position;LLL:EXT:cms/locallang_ttc.xml:header_position_formlabel, date;LLL:EXT:cms/locallang_ttc.xml:date_formlabel, --linebreak--, header_link;LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
              'canNotCollapse' => 1,
            ),
          'headers' =>
            array (
              'showitem' => 'header;LLL:EXT:cms/locallang_ttc.xml:header_formlabel, --linebreak--, header_layout;LLL:EXT:cms/locallang_ttc.xml:header_layout_formlabel, header_position;LLL:EXT:cms/locallang_ttc.xml:header_position_formlabel, date;LLL:EXT:cms/locallang_ttc.xml:date_formlabel, --linebreak--, header_link;LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel, --linebreak--, subheader;LLL:EXT:cms/locallang_ttc.xml:subheader_formlabel',
              'canNotCollapse' => 1,
            ),
          'multimediafiles' =>
            array (
              'showitem' => 'multimedia;LLL:EXT:cms/locallang_ttc.xml:multimedia_formlabel, bodytext;LLL:EXT:cms/locallang_ttc.xml:bodytext.ALT.multimedia_formlabel;;nowrap',
              'canNotCollapse' => 1,
            ),
          'imagelinks' =>
            array (
              'showitem' => 'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel',
              'canNotCollapse' => 1,
            ),
          'image_accessibility' =>
            array (
              'showitem' => 'altText;LLL:EXT:cms/locallang_ttc.xml:altText_formlabel, titleText;LLL:EXT:cms/locallang_ttc.xml:titleText_formlabel, --linebreak--, longdescURL;LLL:EXT:cms/locallang_ttc.xml:longdescURL_formlabel',
              'canNotCollapse' => 1,
            ),
          'image_settings' =>
            array (
              'showitem' => 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel, imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel, imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel, --linebreak--, image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel, image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel, image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
              'canNotCollapse' => 1,
            ),
          'imageblock' =>
            array (
              'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel, imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel, --linebreak--, image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel, imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
              'canNotCollapse' => 1,
            ),
          'uploads' =>
            array (
              'showitem' => 'media;LLL:EXT:cms/locallang_ttc.xml:media.ALT.uploads_formlabel, --linebreak--, file_collections;LLL:EXT:cms/locallang_ttc.xml:file_collections.ALT.uploads_formlabel, --linebreak--, filelink_sorting, target',
              'canNotCollapse' => 1,
            ),
          'mailform' =>
            array (
              'showitem' => 'pages;LLL:EXT:cms/locallang_ttc.xml:pages.ALT.mailform, --linebreak--, subheader;LLL:EXT:cms/locallang_ttc.xml:subheader.ALT.mailform_formlabel',
              'canNotCollapse' => 1,
            ),
          'searchform' =>
            array (
              'showitem' => 'pages;LLL:EXT:cms/locallang_ttc.xml:pages.ALT.searchform',
              'canNotCollapse' => 1,
            ),
          'menu' =>
            array (
              'showitem' => 'menu_type;LLL:EXT:cms/locallang_ttc.xml:menu_type_formlabel, --linebreak--, pages;LLL:EXT:cms/locallang_ttc.xml:pages.ALT.menu_formlabel',
              'canNotCollapse' => 1,
            ),
          'menu_accessibility' =>
            array (
              'showitem' => 'accessibility_title;LLL:EXT:cms/locallang_ttc.xml:menu.ALT.accessibility_title_formlabel, --linebreak--, accessibility_bypass;LLL:EXT:cms/locallang_ttc.xml:menu.ALT.accessibility_bypass_formlabel, accessibility_bypass_text;LLL:EXT:cms/locallang_ttc.xml:menu.ALT.accessibility_bypass_text_formlabel',
              'canNotCollapse' => 1,
            ),
          'visibility' =>
            array (
              'showitem' => 'hidden;LLL:EXT:cms/locallang_ttc.xml:hidden_formlabel, sectionIndex;LLL:EXT:cms/locallang_ttc.xml:sectionIndex_formlabel, linkToTop;LLL:EXT:cms/locallang_ttc.xml:linkToTop_formlabel',
              'canNotCollapse' => 1,
            ),
          'access' =>
            array (
              'showitem' => 'starttime;LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel, endtime;LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel, --linebreak--, fe_group;LLL:EXT:cms/locallang_ttc.xml:fe_group_formlabel',
              'canNotCollapse' => 1,
            ),
          'frames' =>
            array (
              'showitem' => 'layout;LLL:EXT:cms/locallang_ttc.xml:layout_formlabel, spaceBefore;LLL:EXT:cms/locallang_ttc.xml:spaceBefore_formlabel, spaceAfter;LLL:EXT:cms/locallang_ttc.xml:spaceAfter_formlabel, section_frame;LLL:EXT:cms/locallang_ttc.xml:section_frame_formlabel',
              'canNotCollapse' => 1,
            ),
          'textlayout' =>
            array (
              'showitem' => 'text_align;LLL:EXT:cms/locallang_ttc.xml:text_align_formlabel, text_face;LLL:EXT:cms/locallang_ttc.xml:text_face_formlabel, text_size;LLL:EXT:cms/locallang_ttc.xml:text_size_formlabel, text_color;LLL:EXT:cms/locallang_ttc.xml:text_color_formlabel, --linebreak--, text_properties;LLL:EXT:cms/locallang_ttc.xml:text_properties_formlabel',
              'canNotCollapse' => 1,
            ),
          'tablelayout' =>
            array (
              'showitem' => 'table_bgColor;LLL:EXT:cms/locallang_ttc.xml:table_bgColor_formlabel, table_border;LLL:EXT:cms/locallang_ttc.xml:table_border_formlabel, table_cellspacing;LLL:EXT:cms/locallang_ttc.xml:table_cellspacing_formlabel, table_cellpadding;LLL:EXT:cms/locallang_ttc.xml:table_cellpadding_formlabel',
              'canNotCollapse' => 1,
            ),
          'uploadslayout' =>
            array (
              'showitem' => 'filelink_size;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
              'canNotCollapse' => 1,
            ),
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => ',tx_templavoila_ds,tx_templavoila_to,tx_templavoila_flex,tx_templavoila_pito',
        ),
    ),
  'tx_extensionmanager_domain_model_extension' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang_db.xml:tx_extensionmanager_domain_model_extension',
          'label' => 'uid',
          'default_sortby' => '',
          'hideTable' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'extension_key,version,integer_version,title,description,state,category,last_updated,update_comment,author_name,author_email,md5hash,serialized_dependencies',
        ),
      'columns' =>
        array (
          'extension_key' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.extensionkey',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'version' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.version',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'alldownloadcounter' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'integer_version' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.integerversion',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '5',
                ),
            ),
          'state' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.state',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'range' =>
                    array (
                      'lower' => 0,
                      'upper' => 1000,
                    ),
                  'eval' => 'int',
                ),
            ),
          'category' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.category',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'range' =>
                    array (
                      'lower' => 0,
                      'upper' => 1000,
                    ),
                  'eval' => 'int',
                ),
            ),
          'last_updated' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.lastupdated',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'datetime',
                ),
            ),
          'update_comment' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.updatecomment',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '5',
                ),
            ),
          'author_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.authorname',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'author_email' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.authoremail',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'current_version' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.currentversion',
              'config' =>
                array (
                  'type' => 'check',
                  'size' => '1',
                ),
            ),
          'review_state' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.reviewstate',
              'config' =>
                array (
                  'type' => 'check',
                  'size' => '1',
                ),
            ),
          'md5hash' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.md5hash',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '1',
                ),
            ),
          'serialized_dependencies' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_extension.serializedDependencies',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'extensionkey;;;;1-1-1, version, integer_version, title;;;;2-2-2, description;;;;3-3-3, state, category, last_updated, update_comment, author_name, author_email, review_state, md5hash, serialized_dependencies',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
    ),
  'tx_extensionmanager_domain_model_repository' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:extensionmanager/Resources/Private/Language/locallang_db.xml:tx_extensionmanager_domain_model_repository',
          'label' => 'uid',
          'default_sortby' => '',
          'hideTable' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,description,wsdl_url_mirror_list_url,last_update,extension_count',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.description',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'wsdl_url' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.wsdlUrl',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'mirror_list_url' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.mirrorListUrl',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                ),
            ),
          'last_update' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.lastUpdate',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'extension_count' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:extensionmanager/Resources/Private/locallang_db.xml:tx_extensionmanager_domain_model_repository.extensionCount',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;;;1-1-1, description;;;;1-1-1, wsdl_url, mirror_list_url, last_update, extension_count',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
    ),
  'sys_note' =>
    array (
      'ctrl' =>
        array (
          'label' => 'subject',
          'default_sortby' => 'ORDER BY crdate',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note',
          'iconfile' => 'sysext/sys_note/ext_icon.gif',
          'sortby' => 'sorting',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'category,subject,message,personal',
        ),
      'columns' =>
        array (
          'category' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.category',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.category.I.1',
                          1 => '1',
                          2 => 'sysext/t3skin/icons/ext/sys_note/icon-instruction.png',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.category.I.3',
                          1 => '3',
                          2 => 'sysext/t3skin/icons/ext/sys_note/icon-note.png',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.category.I.4',
                          1 => '4',
                          2 => 'sysext/t3skin/icons/ext/sys_note/icon-todo.png',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.category.I.2',
                          1 => '2',
                          2 => 'sysext/t3skin/icons/ext/sys_note/icon-template.png',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'subject' =>
            array (
              'label' => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.subject',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'max' => '256',
                ),
            ),
          'message' =>
            array (
              'label' => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.message',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '40',
                  'rows' => '15',
                ),
            ),
          'personal' =>
            array (
              'label' => 'LLL:EXT:sys_note/Resources/Private/Language/locallang_tca.xlf:sys_note.personal',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'category;;;;2-2-2, personal, subject;;;;3-3-3, message',
            ),
        ),
    ),
  'sys_action' =>
    array (
      'ctrl' =>
        array (
          'label' => 'title',
          'tstamp' => 'tstamp',
          'default_sortby' => 'ORDER BY title',
          'sortby' => 'sorting',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xlf:LGL.prependAtCopy',
          'title' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'adminOnly' => 1,
          'rootLevel' => -1,
          'setToDefaultOnCopy' => 'assign_to_groups',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'typeicon_classes' =>
            array (
              'default' => 'mimetypes-x-sys_action',
            ),
          'type' => 'type',
          'iconfile' => 'sysext/sys_action/x-sys_action.png',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,title,type,description,assign_to_groups',
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '256',
                  'eval' => 'trim,required',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 10,
                  'cols' => 48,
                ),
            ),
          'hidden' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.hidden',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'type' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.type.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.type.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.type.3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.type.4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.type.5',
                          1 => '5',
                        ),
                    ),
                ),
            ),
          'assign_to_groups' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.assign_to_groups',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'be_groups',
                  'foreign_table_where' => 'ORDER BY be_groups.title',
                  'MM' => 'sys_action_asgr_mm',
                  'size' => '10',
                  'minitems' => '0',
                  'maxitems' => '200',
                  'autoSizeMax' => '10',
                ),
            ),
          't1_userprefix' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t1_userprefix',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '10',
                  'eval' => 'trim',
                ),
            ),
          't1_allowed_groups' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t1_allowed_groups',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'be_groups',
                  'foreign_table_where' => 'ORDER BY be_groups.title',
                  'size' => '10',
                  'maxitems' => '20',
                  'autoSizeMax' => '10',
                ),
            ),
          't1_create_user_dir' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t1_create_user_dir',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          't1_copy_of_user' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t1_copy_of_user',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'be_users',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '1',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          't3_listPid' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t3_listPid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '1',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          't3_tables' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t3_tables',
              'config' =>
                array (
                  'type' => 'select',
                  'special' => 'tables',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '',
                        ),
                    ),
                ),
            ),
          't4_recordsToEdit' =>
            array (
              'label' => 'LLL:EXT:sys_action/locallang_tca.xlf:sys_action.t4_recordsToEdit',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => '*',
                  'prepend_tname' => 1,
                  'size' => '5',
                  'maxitems' => '50',
                  'minitems' => '1',
                  'show_thumbs' => '1',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,',
            ),
          1 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,--div--,t1_userprefix;;;;5-5-5,t1_copy_of_user,t1_allowed_groups,t1_create_user_dir',
            ),
          2 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,--div--,',
            ),
          3 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,--div--,t3_listPid;;;;5-5-5,t3_tables;',
            ),
          4 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,--div--,t4_recordsToEdit;;;;5-5-5',
            ),
          5 =>
            array (
              'showitem' => 'hidden;;;;1-1-1,type,title;;;;2-2-2,description;;;;3-3-3,assign_to_groups,--div--,t3_listPid;Where to create records:;;;5-5-5,t3_tables;Create records in table:',
            ),
        ),
    ),
  'index_config' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:indexed_search/locallang_db.php:index_config',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'type',
          'default_sortby' => 'ORDER BY crdate',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
            ),
          'iconfile' => 'default.gif',
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => 'hidden, starttime, title, description, type, depth, table2index, alternative_source_pid, get_params, chashcalc, filepath, extensions',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,starttime,title,description,type,depth,table2index,alternative_source_pid,get_params,chashcalc,filepath,extensions',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.disable',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '1',
                ),
            ),
          'starttime' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'title' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'required',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '2',
                ),
            ),
          'type' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.type.I.5',
                          1 => '5',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'depth' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.0',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.depth.I.3',
                          1 => '3',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'table2index' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.table2index',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.table2index.I.0',
                          1 => '0',
                        ),
                    ),
                  'special' => 'tables',
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'alternative_source_pid' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.alternative_source_pid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'indexcfgs' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.indexcfgs',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'index_config,pages',
                  'size' => 5,
                  'minitems' => 0,
                  'maxitems' => 200,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'get_params' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.get_params',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'fieldlist' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.fields',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'externalUrl' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.externalUrl',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'chashcalc' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.chashcalc',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'filepath' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.filepath',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'extensions' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.extensions',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                ),
            ),
          'url_deny' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.url_deny',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '2',
                ),
            ),
          'records_indexonchange' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.records_indexonchange',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'timer_next_indexing' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_next_indexing',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '12',
                  'max' => '20',
                  'eval' => 'datetime',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'timer_offset' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_offset',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'time',
                  'default' => 3600,
                ),
            ),
          'timer_frequency' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_frequency',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_frequency.I.0',
                          1 => '3600',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_frequency.I.1',
                          1 => '86400',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:indexed_search/locallang_db.php:index_config.timer_frequency.I.2',
                          1 => '604800',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                  'default' => 86400,
                ),
            ),
          'recordsbatch' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.recordsbatch',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'int',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'set_id' =>
            array (
              'label' => 'LLL:EXT:indexed_search/locallang_db.php:index_config.set_id',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;1;;2-2-2, description, timer_next_indexing, timer_offset, timer_frequency, set_id, type;;;;3-3-3',
            ),
          1 =>
            array (
              'showitem' => 'title;;1;;2-2-2, description, timer_next_indexing, timer_offset, timer_frequency, set_id, type;;;;3-3-3, table2index;;;;3-3-3, alternative_source_pid, fieldlist, get_params, chashcalc,recordsbatch,records_indexonchange',
            ),
          2 =>
            array (
              'showitem' => 'title;;1;;2-2-2, description, timer_next_indexing, timer_offset, timer_frequency, set_id, type;;;;3-3-3, filepath;;;;3-3-3, extensions, depth',
            ),
          3 =>
            array (
              'showitem' => 'title;;1;;2-2-2, description, timer_next_indexing, timer_offset, timer_frequency, set_id, type;;;;3-3-3, externalUrl;;;;3-3-3, depth, url_deny',
            ),
          4 =>
            array (
              'showitem' => 'title;;1;;2-2-2, description, timer_next_indexing, timer_offset, timer_frequency, set_id, type;;;;3-3-3, alternative_source_pid;LLL:EXT:indexed_search/locallang_db.php:index_config.rootpage;;;3-3-3, depth',
            ),
          5 =>
            array (
              'showitem' => 'title;;;;2-2-2, description, type;;;;3-3-3, indexcfgs;;;;3-3-3',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'starttime,hidden',
            ),
        ),
    ),
  'tx_rtehtmlarea_acronym' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym',
          'label' => 'term',
          'default_sortby' => 'ORDER BY term',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'iconfile' => 'sysext/rtehtmlarea/extensions/Acronym/skin/images/acronym.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,sys_language_uid,term,acronym',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'default' => '0',
                  'checkbox' => '0',
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'date',
                  'checkbox' => '0',
                  'default' => '0',
                  'range' =>
                    array (
                      'upper' => 1609369200,
                      'lower' => 1411768800,
                    ),
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => '-1',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => '0',
                        ),
                    ),
                ),
            ),
          'type' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.type',
              'config' =>
                array (
                  'type' => 'radio',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.type.I.1',
                          1 => '2',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.type.I.0',
                          1 => '1',
                        ),
                    ),
                  'default' => '2',
                ),
            ),
          'term' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.term',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'trim,required',
                ),
            ),
          'acronym' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.acronym',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'trim,required',
                ),
            ),
          'static_lang_isocode' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:rtehtmlarea/locallang_db.xml:tx_rtehtmlarea_acronym.static_lang_isocode',
              'displayCond' => 'EXT:static_info_tables:LOADED:true',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'static_languages',
                  'foreign_table_where' => 'ORDER BY static_languages.lg_name_en',
                  'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateLanguagesSelector',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                          'default' =>
                            array (
                              'receiverClass' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\SuggestReceiver',
                            ),
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'hidden;;1;;1-1-1, sys_language_uid, type, term, acronym, static_lang_isocode',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'starttime, endtime',
            ),
        ),
    ),
  'tx_templavoila_tmplobj' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj',
          'label' => 'title',
          'label_userFunc' => 'EXT:templavoila/classes/class.tx_templavoila_label.php:&tx_templavoila_label->getLabel',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'sortby' => 'sorting',
          'default_sortby' => 'ORDER BY title',
          'delete' => 'deleted',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/templavoila/tca.php',
          'iconfile' => '../typo3conf/ext/templavoila/icon_to.gif',
          'selicon_field' => 'previewicon',
          'selicon_field_path' => 'uploads/tx_templavoila',
          'type' => 'parent',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'shadowColumnsForNewPlaceholders' => 'title,datastructure,rendertype,sys_language_uid,parent,rendertype_ref',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,datastructure,fileref',
          'maxDBListItems' => 60,
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'eval' => 'required,trim',
                ),
            ),
          'parent' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.parent',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'tx_templavoila_tmplobj',
                  'foreign_table_where' => 'AND tx_templavoila_tmplobj.parent=0 AND tx_templavoila_tmplobj.uid!=\'###REC_FIELD_uid###\' ORDER BY tx_templavoila_tmplobj.title',
                  'suppress_icons' => 'ONLY_SELECTED',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'rendertype_ref' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.rendertype_ref',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'tx_templavoila_tmplobj',
                  'foreign_table_where' => 'AND tx_templavoila_tmplobj.parent=0 AND tx_templavoila_tmplobj.uid!=\'###REC_FIELD_uid###\' ORDER BY tx_templavoila_tmplobj.title',
                  'suppress_icons' => 'ONLY_SELECTED',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                ),
              'displayCond' => 'FIELD:parent:=:0',
            ),
          'datastructure' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.datastructure',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_templavoila_datastructure',
                  'foreign_table_where' => 'AND tx_templavoila_datastructure.pid=###CURRENT_PID### ORDER BY tx_templavoila_datastructure.uid',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'itemsProcFunc' => 'tx_templavoila_handleStaticdatastructures->main',
                  'allowNonIdValues' => 1,
                  'suppress_icons' => 'ONLY_SELECTED',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      '_VERTICAL' => 1,
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.ds_createnew',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'tx_templavoila_datastructure',
                              'pid' => '###CURRENT_PID###',
                              'setValue' => 'set',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                    ),
                ),
              'displayCond' => 'FIELD:parent:=:0',
            ),
          'fileref' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.fileref',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                          'params' =>
                            array (
                              'blindLinkOptions' => 'page,url,mail,spec,folder',
                              'allowedExtensions' => NULL,
                            ),
                        ),
                    ),
                  'eval' => 'required,nospace',
                  'softref' => 'typolink',
                ),
            ),
          'belayout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.belayout',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard&amp;act=file',
                          'params' =>
                            array (
                              'blindLinkOptions' => 'page,folder,mail,spec,url',
                              'allowedExtensions' => NULL,
                            ),
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'eval' => 'nospace',
                  'softref' => 'typolink',
                ),
            ),
          'previewicon' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.previewicon',
              'displayCond' => 'FIELD:parent:=:0',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,png',
                  'max_size' => '100',
                  'uploadfolder' => 'uploads/tx_templavoila',
                  'show_thumbs' => '1',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                ),
            ),
          'description' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.description',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'max' => '256',
                  'eval' => 'trim',
                ),
              'displayCond' => 'FIELD:parent:=:0',
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                ),
              'displayCond' => 'FIELD:parent:!=:0',
            ),
          'rendertype' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.rendertype',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.rendertype.I.0',
                          1 => '',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.rendertype.I.1',
                          1 => 'print',
                        ),
                    ),
                ),
              'displayCond' => 'FIELD:parent:!=:0',
            ),
          'templatemapping' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'fileref_mtime' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'fileref_md5' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'localprocessing' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.localProc',
              'config' =>
                array (
                  'type' => 'text',
                  'wrap' => 'OFF',
                  'cols' => '30',
                  'rows' => '2',
                ),
              'defaultExtras' => 'fixed-font:enable-tab',
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;;;2-2-2, parent, fileref, belayout, datastructure;;;;3-3-3, sys_language_uid;;;;3-3-3, rendertype, rendertype_ref, previewicon, description, localprocessing;;;;1-1-1',
            ),
          1 =>
            array (
              'showitem' => 'title;;;;2-2-2, parent, fileref, belayout, datastructure;;;;3-3-3, sys_language_uid;;;;3-3-3, rendertype, rendertype_ref, previewicon, description, localprocessing;;;;1-1-1',
            ),
        ),
    ),
  'tx_templavoila_datastructure' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure',
          'label' => 'title',
          'label_userFunc' => 'EXT:templavoila/classes/class.tx_templavoila_label.php:&tx_templavoila_label->getLabel',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'sortby' => 'sorting',
          'default_sortby' => 'ORDER BY title',
          'delete' => 'deleted',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/templavoila/tca.php',
          'iconfile' => '../typo3conf/ext/templavoila/icon_ds.gif',
          'selicon_field' => 'previewicon',
          'selicon_field_path' => 'uploads/tx_templavoila',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'shadowColumnsForNewPlaceholders' => 'scope,title',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'title,dataprot',
          'maxDBListItems' => 60,
        ),
      'columns' =>
        array (
          'title' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'eval' => 'required,trim',
                ),
            ),
          'dataprot' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure.dataprot',
              'config' =>
                array (
                  'type' => 'text',
                  'wrap' => 'OFF',
                  'cols' => '48',
                  'rows' => '20',
                ),
              'defaultExtras' => 'fixed-font:enable-tab',
            ),
          'scope' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure.scope',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datasource.scope.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure.scope.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_datastructure.scope.I.2',
                          1 => 2,
                        ),
                    ),
                ),
            ),
          'previewicon' =>
            array (
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.previewicon',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,png',
                  'max_size' => '100',
                  'uploadfolder' => 'uploads/tx_templavoila',
                  'show_thumbs' => '1',
                  'size' => '1',
                  'maxitems' => '1',
                  'minitems' => '0',
                ),
            ),
          'belayout' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:templavoila/locallang_db.xml:tx_templavoila_tmplobj.belayout',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '48',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard&amp;act=file',
                          'params' =>
                            array (
                              'blindLinkOptions' => 'page,folder,mail,spec,url',
                              'allowedExtensions' => NULL,
                            ),
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                  'eval' => 'nospace',
                  'softref' => 'typolink',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;;;2-2-2, scope, previewicon, belayout, dataprot;;;;3-3-3',
            ),
        ),
    ),
  'tt_address' =>
    array (
      'ctrl' =>
        array (
          'label' => 'name',
          'label_alt' => 'email',
          'default_sortby' => 'ORDER BY name',
          'tstamp' => 'tstamp',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address',
          'thumbnail' => 'image',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/tt_address/tca.php',
          'iconfile' => '../typo3conf/ext/tt_address/ext_icon.gif',
          'searchFields' => 'name, first_name, middle_name, last_name, email',
          'sortby' => 'sorting',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'name,first_name,middle_name,last_name,address,building,room,city,zip,region,country,phone,fax,email,www,title,company,image',
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => 'pid,hidden,gender,name,first_name,middle_name,last_name,title,address,building,room,birthday,phone,fax,mobile,www,email,city,zip,company,region,country,image,description',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'gender' =>
            array (
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender',
              'config' =>
                array (
                  'type' => 'radio',
                  'default' => 'm',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender.m',
                          1 => 'm',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.gender.f',
                          1 => 'f',
                        ),
                    ),
                ),
            ),
          'name' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'first_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.first_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'middle_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.middle_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'last_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.last_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'birthday' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.birthday',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'date',
                  'size' => '8',
                  'max' => '20',
                ),
            ),
          'title' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.title_person',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'address' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.address',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '20',
                  'rows' => '3',
                ),
            ),
          'building' =>
            array (
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.building',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '20',
                ),
            ),
          'room' =>
            array (
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.room',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '15',
                ),
            ),
          'phone' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.phone',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '30',
                ),
            ),
          'fax' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fax',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '30',
                ),
            ),
          'mobile' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.mobile',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '30',
                ),
            ),
          'www' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.www',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '255',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard&act=page|url',
                          'params' =>
                            array (
                              'blindLinkOptions' => 'mail,file,spec,folder',
                            ),
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                ),
            ),
          'email' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'company' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.organization',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '20',
                  'max' => '255',
                ),
            ),
          'city' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.city',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'zip' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.zip',
              'config' =>
                array (
                  'type' => 'input',
                  'eval' => 'trim',
                  'size' => '10',
                  'max' => '20',
                ),
            ),
          'region' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.region',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '255',
                ),
            ),
          'country' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.country',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '20',
                  'eval' => 'trim',
                  'max' => '128',
                ),
            ),
          'image' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.image',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'max_size' => '1000',
                  'uploadfolder' => 'uploads/pics',
                  'show_thumbs' => '1',
                  'size' => '3',
                  'maxitems' => 6,
                  'minitems' => '0',
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'rows' => 5,
                  'cols' => 48,
                ),
            ),
          'addressgroup' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address.addressgroup',
              'config' =>
                array (
                  'type' => 'select',
                  'form_type' => 'user',
                  'userFunc' => 'tx_ttaddress_treeview->displayGroupTree',
                  'treeView' => 1,
                  'foreign_table' => 'tt_address_group',
                  'size' => 5,
                  'autoSizeMax' => 25,
                  'minitems' => 0,
                  'maxitems' => 50,
                  'MM' => 'tt_address_group_mm',
                ),
            ),
          'salary' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address_extend/Resources/Private/Language/locallang_db.xlf:tx_ttaddressextend_domain_model_address.salary',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'appointed_from' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address_extend/Resources/Private/Language/locallang_db.xlf:tx_ttaddressextend_domain_model_address.appointed_from',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 7,
                  'eval' => 'date',
                  'checkbox' => 1,
                  'default' => 1414505622,
                ),
            ),
          'appointed_to' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:tt_address_extend/Resources/Private/Language/locallang_db.xlf:tx_ttaddressextend_domain_model_address.appointed_to',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 7,
                  'eval' => 'date',
                  'checkbox' => 1,
                  'default' => 1414505622,
                ),
            ),
          'categories' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lang/locallang_tca.xlf:sys_category.categories',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
                  'MM' => 'sys_category_record_mm',
                  'MM_opposite_field' => 'items',
                  'MM_match_fields' =>
                    array (
                      'tablenames' => 'tt_address',
                    ),
                  'size' => 10,
                  'autoSizeMax' => 50,
                  'maxitems' => 9999,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'appearance' =>
                        array (
                          'expandAll' => true,
                          'showHeader' => true,
                        ),
                    ),
                  'wizards' =>
                    array (
                      '_PADDING' => 1,
                      '_VERTICAL' => 1,
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Edit',
                          'script' => 'wizard_edit.php',
                          'icon' => 'edit2.gif',
                          'popup_onlyOpenIfSelected' => 1,
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                      'add' =>
                        array (
                          'type' => 'script',
                          'title' => 'Create new',
                          'icon' => 'add.gif',
                          'params' =>
                            array (
                              'table' => 'sys_category',
                              'pid' => '###CURRENT_PID###',
                              'setValue' => 'prepend',
                            ),
                          'script' => 'wizard_add.php',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'hidden;;;;1-1-1, gender;;;;3-3-3, name, salary, appointed_from, appointed_to, first_name, middle_name, last_name;;2;;, birthday, address;;6, zip, city;;3, email;;5, phone;;4, image;;;;4-4-4, description, addressgroup;;;;1-1-1, --div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category, categories',
            ),
        ),
      'palettes' =>
        array (
          2 =>
            array (
              'showitem' => 'title, company',
            ),
          3 =>
            array (
              'showitem' => 'country, region',
            ),
          4 =>
            array (
              'showitem' => 'mobile, fax',
            ),
          5 =>
            array (
              'showitem' => 'www',
            ),
          6 =>
            array (
              'showitem' => 'building, room',
            ),
        ),
    ),
  'tt_address_group' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address_group',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'treeParentField' => 'parent_group',
          'transOrigPointerField' => 'l18n_parent',
          'transOrigDiffSourceField' => 'l18n_diffsource',
          'languageField' => 'sys_language_uid',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'fe_group' => 'fe_group',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/tt_address/tca.php',
          'iconfile' => '../typo3conf/ext/tt_address/icon_tt_address_group.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,fe_group,title,parent_group,description',
        ),
      'feInterface' =>
        array (
          'fe_admin_fieldList' => 'hidden, fe_group, title, parent_group, description',
        ),
      'columns' =>
        array (
          'hidden' =>
            array (
              'l10n_mode' => 'mergeIfNotBlank',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '1',
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
                          1 => -1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
                          1 => -2,
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'foreign_table' => 'fe_groups',
                ),
            ),
          'title' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'eval' => 'required',
                ),
            ),
          'parent_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:tt_address/locallang_tca.xml:tt_address_group.parent_group',
              'config' =>
                array (
                  'type' => 'select',
                  'form_type' => 'user',
                  'userFunc' => 'tx_ttaddress_treeview->displayGroupTree',
                  'treeView' => 1,
                  'size' => 1,
                  'autoSizeMax' => 10,
                  'minitems' => 0,
                  'maxitems' => 2,
                  'foreign_table' => 'tt_address_group',
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => '30',
                  'rows' => '5',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.php:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.php:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l18n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tt_address_group',
                  'foreign_table_where' => 'AND tt_address_group.uid=###REC_FIELD_l18n_parent### AND tt_address_group.sys_language_uid IN (-1,0)',
                ),
            ),
          'l18n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, parent_group;;;;3-3-3, description',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'fe_group',
            ),
        ),
    ),
  'tx_mnepiserver2typo3_episerver' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver',
          'label' => 'domain',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY crdate',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/mn_episerver2typo3/tca.php',
          'iconfile' => '../typo3conf/ext/mn_episerver2typo3/icon_tx_mnepiserver2typo3_episerver.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,domain,ws_username,ws_password,episerver_startpage_id,t3_root_page_id,episerver_content_fields,episerver_languages',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_mnepiserver2typo3_episerver',
                  'foreign_table_where' => 'AND tx_mnepiserver2typo3_episerver.pid=###CURRENT_PID### AND tx_mnepiserver2typo3_episerver.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'domain' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.domain',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                  'eval' => 'required',
                ),
            ),
          'ws_username' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.ws_username',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                  'eval' => 'required',
                ),
            ),
          'ws_password' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.ws_password',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                  'eval' => 'required',
                ),
            ),
          'episerver_startpage_id' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.episerver_startpage_id',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'eval' => 'required',
                ),
            ),
          't3_root_page_id' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.t3_root_page_id',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'eval' => 'required',
                ),
            ),
          'episerver_content_fields' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.episerver_content_fields',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '40',
                  'wizards' =>
                    array (
                      'uproc' =>
                        array (
                          'type' => 'userFunc',
                          'userFunc' => 'tx_propertyfields_tca->user_renderPropertyFields',
                          'params' =>
                            array (
                            ),
                        ),
                    ),
                ),
            ),
          'episerver_languages' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver.episerver_languages',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'sys_language',
                  'prepend_tname' => 1,
                  'size' => 5,
                  'maxitems' => 9999,
                  'MM' => 'tx_mnepiserver2typo3_episerver_language_mm',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, domain, ws_username, ws_password, episerver_startpage_id, t3_root_page_id, episerver_content_fields, episerver_languages',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
    ),
  'tx_mnepiserver2typo3_episerver_installation_languages' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver_installation_languages',
          'label' => 'installation_uid',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY crdate',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/mn_episerver2typo3/tca.php',
          'iconfile' => '../typo3conf/ext/mn_episerver2typo3/icon_tx_mnepiserver2typo3_episerver_language_translation.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,domain,episerver_language_code,typo3_language_code,installation_uid',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_mnepiserver2typo3_episerver_installation_languages',
                  'foreign_table_where' => 'AND tx_mnepiserver2typo3_episerver_installation_languages.pid=###CURRENT_PID### AND tx_mnepiserver2typo3_episerver_installation_languages.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'episerver_language_code' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver_language_translation.episerver_language_code',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '30',
                  'max' => '255',
                ),
            ),
          'typo3_language_code' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver_language_translation.typo3_language_code',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'English',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'sys_language',
                ),
            ),
          'installation_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:mn_episerver2typo3/locallang_db.xml:tx_mnepiserver2typo3_episerver_installation_languages.installation_uid',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_mnepiserver2typo3_episerver',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, domain, episerver_language_code, typo3_language_code, installation_uid',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
    ),
  'tx_formhandler_log' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:formhandler/Resources/Language/locallang_db.xml:tx_formhandler_log',
          'label' => 'uid',
          'default_sortby' => 'ORDER BY crdate DESC',
          'crdate' => 'crdate',
          'tstamp' => 'tstamp',
          'iconfile' => '../typo3conf/ext/formhandler/ext_icon.gif',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/formhandler/tca.php',
          'adminOnly' => 1,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'crdate,ip,params,is_spam,key_hash',
        ),
      'columns' =>
        array (
          'crdate' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:formhandler/Resources/Language/locallang_db.xml:tx_formhandler_log.submission_date',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '10',
                  'max' => '20',
                  'eval' => 'datetime',
                  'checkbox' => '0',
                  'default' => '0',
                ),
            ),
          'ip' =>
            array (
              'label' => 'LLL:EXT:formhandler/Resources/Language/locallang_db.xml:tx_formhandler_log.ip',
              'config' =>
                array (
                  'type' => 'input',
                ),
            ),
          'params' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:formhandler/Resources/Language/locallang_db.xml:tx_formhandler_log.params',
              'config' =>
                array (
                  'type' => 'user',
                  'userFunc' => 'tx_formhandler_tcafuncs->user_getParams',
                ),
            ),
          'is_spam' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:formhandler/Resources/Language/locallang_db.xml:tx_formhandler_log.is_spam',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'uid' =>
            array (
              'label' => '',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
          'pid' =>
            array (
              'label' => '',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
          'tstamp' =>
            array (
              'label' => '',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
          'key_hash' =>
            array (
              'label' => '',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
          'unique_hash' =>
            array (
              'label' => '',
              'config' =>
                array (
                  'type' => 'none',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'crdate,ip,params,is_spam',
            ),
        ),
    ),
  'static_countries' =>
    array (
      'ctrl' =>
        array (
          'label' => 'cn_short_en',
          'label_alt' => 'cn_iso_2',
          'label_alt_force' => 1,
          'label_userFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->addIsoCodeToLabel',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'is_static' => 1,
          'readOnly' => 1,
          'default_sortby' => 'ORDER BY cn_short_en',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries.title',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/static_info_tables/Configuration/Tca/Country.php',
          'iconfile' => '../typo3conf/ext/static_info_tables/Resources/Public/Images/Icons/icon_static_countries.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'cn_iso_2,cn_iso_3,cn_iso_nr,cn_official_name_local,cn_official_name_en,cn_capital,cn_tldomain,cn_currency_iso_3,cn_currency_iso_nr,cn_phone,cn_uno_member,cn_eu_member,cn_address_format,cn_short_en',
        ),
      'columns' =>
        array (
          'deleted' =>
            array (
              'readonly' => 1,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:deleted',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'cn_iso_2' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_iso_2',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '4',
                  'max' => '2',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cn_iso_3' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_iso_3',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '3',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cn_iso_nr' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_iso_nr',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '7',
                  'max' => '7',
                  'eval' => 'int',
                  'default' => '0',
                ),
            ),
          'cn_parent_territory_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_parent_territory_uid',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'static_territories',
                  'foreign_table_where' => 'ORDER BY static_territories.tr_name_en',
                  'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateTerritoriesSelector',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'cn_parent_tr_iso_nr' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'cn_official_name_local' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_official_name_local',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '128',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cn_official_name_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_official_name_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '50',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cn_capital' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_capital',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '15',
                  'max' => '45',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cn_tldomain' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_tldomain',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cn_currency_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_currency_uid',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'static_currencies',
                  'foreign_table_where' => 'ORDER BY static_currencies.cu_name_en',
                  'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateCurrenciesSelector',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                          'default' =>
                            array (
                              'receiverClass' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\SuggestReceiver',
                            ),
                        ),
                    ),
                ),
            ),
          'cn_currency_iso_nr' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'cn_currency_iso_3' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'cn_phone' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_phone',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '10',
                  'max' => '20',
                  'eval' => '',
                  'default' => '0',
                ),
            ),
          'cn_eu_member' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_eu_member',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'cn_uno_member' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_uno_member',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'cn_address_format' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => '0',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_1',
                          1 => '1',
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_2',
                          1 => '2',
                        ),
                      3 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_3',
                          1 => '3',
                        ),
                      4 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_4',
                          1 => '4',
                        ),
                      5 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_5',
                          1 => '5',
                        ),
                      6 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_6',
                          1 => '6',
                        ),
                      7 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_7',
                          1 => '7',
                        ),
                      8 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_8',
                          1 => '8',
                        ),
                      9 =>
                        array (
                          0 => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_address_format_9',
                          1 => '9',
                        ),
                    ),
                  'default' => '0',
                ),
            ),
          'cn_zone_flag' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_zone_flag',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'cn_short_local' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_short_local',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '50',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cn_short_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_short_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '50',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cn_country_zones' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_country_zones',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_table' => 'static_country_zones',
                  'foreign_field' => 'zn_country_uid',
                  'foreign_table_field' => 'zn_country_table',
                  'foreign_default_sortby' => 'zn_name_local',
                  'maxitems' => '100',
                  'appearance' =>
                    array (
                      'expandSingle' => 1,
                      'newRecordLinkAddTitle' => 1,
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'cn_short_local,cn_official_name_local,cn_official_name_en,--palette--;;1;;,--palette--;;5;;,--palette--;;2;;,--palette--;;3;;,--palette--;;4;;,cn_short_en,cn_country_zones',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'cn_iso_nr,cn_iso_2,cn_iso_3',
              'canNotCollapse' => '1',
            ),
          2 =>
            array (
              'showitem' => 'cn_currency_uid,cn_currency_iso_nr,cn_currency_iso_3',
              'canNotCollapse' => '1',
            ),
          3 =>
            array (
              'showitem' => 'cn_capital,cn_uno_member,cn_eu_member,cn_phone,cn_tldomain',
              'canNotCollapse' => '1',
            ),
          4 =>
            array (
              'showitem' => 'cn_address_format,cn_zone_flag',
              'canNotCollapse' => '1',
            ),
          5 =>
            array (
              'showitem' => 'cn_parent_territory_uid,cn_parent_tr_iso_nr',
              'canNotCollapse' => '1',
            ),
        ),
    ),
  'static_country_zones' =>
    array (
      'ctrl' =>
        array (
          'label' => 'zn_name_local',
          'label_alt' => 'zn_name_local,zn_code',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'is_static' => 1,
          'readOnly' => 1,
          'default_sortby' => 'ORDER BY zn_name_local',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_country_zones.title',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/static_info_tables/Configuration/Tca/CountryZone.php',
          'iconfile' => '../typo3conf/ext/static_info_tables/Resources/Public/Images/Icons/icon_static_countries.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'zn_country_iso_nr,zn_country_iso_2,zn_country_iso_3,zn_code,zn_name_local,zn_name_en',
        ),
      'columns' =>
        array (
          'deleted' =>
            array (
              'readonly' => 1,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:deleted',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'zn_country_uid' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'zn_country_table' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'zn_country_iso_nr' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'zn_country_iso_2' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'zn_country_iso_3' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'zn_code' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_country_zones_item.zn_code',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '45',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'zn_name_local' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.name',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '45',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'zn_name_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_country_zones_item.zn_name_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '45',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'zn_name_local,zn_code,--palette--;;1;;,zn_name_en',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'zn_country_uid,zn_country_iso_nr,zn_country_iso_2,zn_country_iso_3',
              'canNotCollapse' => '1',
            ),
        ),
    ),
  'static_currencies' =>
    array (
      'ctrl' =>
        array (
          'label' => 'cu_name_en',
          'label_alt' => 'cu_iso_3',
          'label_alt_force' => 1,
          'label_userFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->addIsoCodeToLabel',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'is_static' => 1,
          'readOnly' => 1,
          'default_sortby' => 'ORDER BY cu_name_en',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies.title',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/static_info_tables/Configuration/Tca/Currency.php',
          'iconfile' => '../typo3conf/ext/static_info_tables/Resources/Public/Images/Icons/icon_static_currencies.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'cu_iso_3,cu_iso_nr,cu_name_en,cu_symbol_left,cu_symbol_right,cu_thousands_point,cu_decimal_point,cu_decimal_digits,cu_sub_name_en,cu_sub_divisor,cu_sub_symbol_left,cu_sub_symbol_right',
        ),
      'columns' =>
        array (
          'deleted' =>
            array (
              'readonly' => 1,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:deleted',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'cu_iso_3' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_iso_3',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '3',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cu_iso_nr' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_iso_nr',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '7',
                  'max' => '3',
                  'eval' => '',
                  'default' => '0',
                ),
            ),
          'cu_name_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_name_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '40',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cu_sub_name_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_sub_name_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '20',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cu_symbol_left' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_symbol_left',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '12',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cu_symbol_right' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_symbol_right',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '12',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cu_thousands_point' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_thousands_point',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '1',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cu_decimal_point' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_decimal_point',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '1',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'cu_decimal_digits' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_decimal_digits',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '',
                  'eval' => 'int',
                  'default' => '',
                ),
            ),
          'cu_sub_divisor' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_sub_divisor',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '20',
                  'eval' => 'int',
                  'default' => '1',
                ),
            ),
          'cu_sub_symbol_left' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_sub_symbol_left',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '12',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'cu_sub_symbol_right' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_currencies_item.cu_sub_symbol_right',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '8',
                  'max' => '12',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'cu_name_en,--palette--;;1;;,--palette--;;2;;,cu_sub_name_en,--palette--;;3;;',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'cu_iso_nr,cu_iso_3',
              'canNotCollapse' => '1',
            ),
          2 =>
            array (
              'showitem' => 'cu_symbol_left,cu_symbol_right,cu_thousands_point,cu_decimal_point',
              'canNotCollapse' => '1',
            ),
          3 =>
            array (
              'showitem' => 'cu_sub_symbol_left,cu_sub_symbol_right,cu_decimal_digits,cu_sub_divisor',
              'canNotCollapse' => '1',
            ),
        ),
    ),
  'static_languages' =>
    array (
      'ctrl' =>
        array (
          'label' => 'lg_name_en',
          'label_alt' => 'lg_iso_2',
          'label_alt_force' => 1,
          'label_userFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->addIsoCodeToLabel',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'is_static' => 1,
          'readOnly' => 1,
          'default_sortby' => 'ORDER BY lg_name_en',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages.title',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/static_info_tables/Configuration/Tca/Language.php',
          'iconfile' => '../typo3conf/ext/static_info_tables/Resources/Public/Images/Icons/icon_static_languages.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'lg_name_local,lg_name_en,lg_iso_2,lg_typo3,lg_country_iso_2,lg_collate_locale,lg_sacred,lg_constructed',
        ),
      'columns' =>
        array (
          'deleted' =>
            array (
              'readonly' => 1,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:deleted',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'lg_iso_2' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_iso_2',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '4',
                  'max' => '2',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'lg_name_local' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.name',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '25',
                  'max' => '50',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'lg_name_en' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_name_en',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '40',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
          'lg_typo3' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_typo3',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '2',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'lg_country_iso_2' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_countries_item.cn_iso_2',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '3',
                  'max' => '2',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'lg_collate_locale' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_collate_locale',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '5',
                  'max' => '5',
                  'eval' => '',
                  'default' => '',
                ),
            ),
          'lg_sacred' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_sacred',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
          'lg_constructed' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_languages_item.lg_constructed',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => '0',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'lg_name_local,lg_name_en,lg_iso_2,lg_typo3,lg_country_iso_2,lg_collate_locale,lg_sacred,lg_constructed',
            ),
        ),
    ),
  'static_territories' =>
    array (
      'ctrl' =>
        array (
          'label' => 'tr_name_en',
          'label_alt' => 'tr_iso_nr',
          'label_alt_force' => 1,
          'label_userFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->addIsoCodeToLabel',
          'adminOnly' => 1,
          'rootLevel' => 1,
          'is_static' => 1,
          'readOnly' => 1,
          'default_sortby' => 'ORDER BY tr_name_en',
          'delete' => 'deleted',
          'title' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_territories.title',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/static_info_tables/Configuration/Tca/Territory.php',
          'iconfile' => '../typo3conf/ext/static_info_tables/Resources/Public/Images/Icons/icon_static_territories.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'tr_iso_nr,tr_parent_iso_nr,tr_name_en',
        ),
      'columns' =>
        array (
          'deleted' =>
            array (
              'readonly' => 1,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:deleted',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'tr_iso_nr' =>
            array (
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_territories_item.tr_iso_nr',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '7',
                  'max' => '7',
                  'eval' => 'int',
                  'default' => '0',
                ),
            ),
          'tr_parent_territory_uid' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:static_info_tables/Resources/Private/Language/locallang_db.xlf:static_territories_item.tr_parent_territory_uid',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'static_territories',
                  'foreign_table_where' => 'ORDER BY static_territories.tr_name_en',
                  'itemsProcFunc' => 'SJBR\\StaticInfoTables\\Hook\\Backend\\Form\\ElementRenderingHelper->translateTerritoriesSelector',
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'tr_parent_iso_nr' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tr_name_en' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.name',
              'exclude' => '0',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => '18',
                  'max' => '45',
                  'eval' => 'trim',
                  'default' => '',
                  '_is_string' => '1',
                ),
            ),
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'tr_iso_nr,tr_name_en,fk_billing_country,--palette--;;1;;',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => 'tr_parent_territory_uid,tr_parent_iso_nr',
              'canNotCollapse' => '1',
            ),
        ),
    ),
  'tx_news_domain_model_news' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news',
          'label' => 'title',
          'prependAtCopy' => 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
          'hideAtCopy' => true,
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'editlock' => 'editlock',
          'type' => 'type',
          'typeicon_column' => 'type',
          'typeicons' =>
            array (
              1 => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_news_internal.gif',
              2 => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_news_external.gif',
            ),
          'dividers2tabs' => true,
          'useColumnsForDefaultValues' => 'type',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY datetime DESC',
          'sortby' => '',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
              'fe_group' => 'fe_group',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/news.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_news.gif',
          'searchFields' => 'uid,title',
          'requestUpdate' => 'rte_disabled',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'cruser_id,pid,sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,fe_group,title,teaser,bodytext,datetime,archive,author,author_email,categories,related,type,keywords,media,internalurl,externalurl,istopnews,related_files,related_links,content_elements,tags,path_segment,alternative_title',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:sys_language_uid_formlabel',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_news_domain_model_news',
                  'foreign_table_where' => 'AND tx_news_domain_model_news.pid=###CURRENT_PID### AND tx_news_domain_model_news.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'cruser_id' =>
            array (
              'label' => 'cruser_id',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'is_dummy_record' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 8,
                  'max' => 20,
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 8,
                  'max' => 20,
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 5,
                  'maxitems' => 20,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
                          1 => -2,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'exclusiveKeys' => '-1,-2',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:header_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'required',
                ),
            ),
          'alternative_title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.alternative_title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'teaser' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'noCopy',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.teaser',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'bodytext' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'noCopy',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext_formlabel',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                  'softref' => 'rtehtmlarea_images,typolink_tag,images,email[subst],url',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'RTE' =>
                        array (
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'type' => 'script',
                          'title' => 'Full screen Rich Text Editing',
                          'icon' => 'wizard_rte2.gif',
                          'script' => 'wizard_rte.php',
                        ),
                    ),
                ),
            ),
          'rte_disabled' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:rte_enabled',
              'config' =>
                array (
                  'type' => 'check',
                  'showIfRTE' => 1,
                  'items' =>
                    array (
                      1 =>
                        array (
                          0 => 'LLL:EXT:cms/locallang_ttc.xml:rte_enabled.I.0',
                        ),
                    ),
                ),
            ),
          'datetime' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.datetime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 12,
                  'max' => 20,
                  'eval' => 'datetime,required',
                  'default' => 1414505580,
                ),
            ),
          'archive' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.archive',
              'config' =>
                array (
                  'type' => 'input',
                  'placeholder' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.archive.placeholder',
                  'size' => 30,
                  'max' => 20,
                  'eval' => 'date',
                  'default' => 0,
                ),
            ),
          'author' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.author_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'author_email' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.author_email_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'categories' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.categories',
              'config' =>
                array (
                  'type' => 'select',
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'dataProvider' => 'Tx_News_TreeProvider_DatabaseTreeDataProvider',
                      'parentField' => 'parentcategory',
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'allowRecursiveMode' => true,
                          'expandAll' => true,
                          'maxLevels' => 99,
                        ),
                    ),
                  'MM' => 'tx_news_domain_model_news_category_mm',
                  'foreign_table' => 'tx_news_domain_model_category',
                  'foreign_table_where' => ' AND (tx_news_domain_model_category.sys_language_uid = 0 OR tx_news_domain_model_category.l10n_parent = 0) ORDER BY tx_news_domain_model_category.sorting',
                  'size' => 10,
                  'autoSizeMax' => 20,
                  'minitems' => 0,
                  'maxitems' => 20,
                ),
            ),
          'related' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.related',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'tx_news_domain_model_news',
                  'foreign_table' => 'tx_news_domain_model_news',
                  'MM_opposite_field' => 'related_from',
                  'size' => 5,
                  'minitems' => 0,
                  'maxitems' => 100,
                  'MM' => 'tx_news_domain_model_news_related_mm',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'related_from' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.related_from',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'foreign_table' => 'tx_news_domain_model_news',
                  'allowed' => 'tx_news_domain_model_news',
                  'size' => 5,
                  'maxitems' => 100,
                  'MM' => 'tx_news_domain_model_news_related_mm',
                  'readOnly' => 1,
                ),
            ),
          'related_files' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.related_files',
              'config' =>
                array (
                  'type' => 'inline',
                  'allowed' => 'tx_news_domain_model_file',
                  'foreign_table' => 'tx_news_domain_model_file',
                  'foreign_sortby' => 'sorting',
                  'foreign_field' => 'parent',
                  'size' => 5,
                  'minitems' => 0,
                  'maxitems' => 10,
                  'appearance' =>
                    array (
                      'collapseAll' => 1,
                      'expandSingle' => 1,
                      'levelLinksPosition' => 'bottom',
                      'useSortable' => 1,
                      'showPossibleLocalizationRecords' => 1,
                      'showRemovedLocalizationRecords' => 1,
                      'showAllLocalizationLink' => 1,
                      'showSynchronizationLink' => 1,
                      'enabledControls' =>
                        array (
                          'info' => false,
                        ),
                    ),
                ),
            ),
          'related_links' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.related_links',
              'config' =>
                array (
                  'type' => 'inline',
                  'allowed' => 'tx_news_domain_model_link',
                  'foreign_table' => 'tx_news_domain_model_link',
                  'foreign_sortby' => 'sorting',
                  'foreign_field' => 'parent',
                  'size' => 5,
                  'minitems' => 0,
                  'maxitems' => 10,
                  'appearance' =>
                    array (
                      'collapseAll' => 1,
                      'expandSingle' => 1,
                      'levelLinksPosition' => 'bottom',
                      'useSortable' => 1,
                      'showPossibleLocalizationRecords' => 1,
                      'showRemovedLocalizationRecords' => 1,
                      'showAllLocalizationLink' => 1,
                      'showSynchronizationLink' => 1,
                      'enabledControls' =>
                        array (
                          'info' => false,
                        ),
                    ),
                ),
            ),
          'type' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.doktype_formlabel',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.type.I.0',
                          1 => 0,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.type.I.1',
                          1 => 1,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.type.I.2',
                          1 => 2,
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'keywords' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.keywords',
              'config' =>
                array (
                  'type' => 'text',
                  'placeholder' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.keywords.placeholder',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xlf:pages.description_formlabel',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'media' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.media',
              'l10n_mode' => 'mergeIfNotBlank',
              'config' =>
                array (
                  'type' => 'inline',
                  'foreign_sortby' => 'sorting',
                  'foreign_table' => 'tx_news_domain_model_media',
                  'foreign_field' => 'parent',
                  'size' => 5,
                  'minitems' => 0,
                  'maxitems' => 99,
                  'appearance' =>
                    array (
                      'collapseAll' => 1,
                      'expandSingle' => 1,
                      'levelLinksPosition' => 'bottom',
                      'useSortable' => 1,
                      'showPossibleLocalizationRecords' => 1,
                      'showRemovedLocalizationRecords' => 1,
                      'showAllLocalizationLink' => 1,
                      'showSynchronizationLink' => 1,
                      'enabledControls' =>
                        array (
                          'info' => false,
                        ),
                    ),
                ),
            ),
          'internalurl' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.palettes.links',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'maxitems' => 1,
                  'minitems' => 1,
                  'show_thumbs' => 1,
                  'softref' => 'typolink',
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'externalurl' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_tca.xml:pages.doktype.I.8',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 50,
                  'eval' => 'required',
                  'softref' => 'news_externalurl',
                ),
            ),
          'istopnews' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.istopnews',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'editlock' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_tca.xml:editlock',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'tags' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tags',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'tx_news_domain_model_tag',
                  'MM' => 'tx_news_domain_model_news_tag_mm',
                  'foreign_table' => 'tx_news_domain_model_tag',
                  'foreign_table_where' => 'ORDER BY tx_news_domain_model_tag.title',
                  'size' => 10,
                  'autoSizeMax' => 20,
                  'minitems' => 0,
                  'maxitems' => 20,
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      '_VERTICAL' => 1,
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                          'default' =>
                            array (
                              'receiverClass' => 'Tx_News_Hooks_SuggestReceiver',
                            ),
                        ),
                      'list' =>
                        array (
                          'type' => 'script',
                          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tags.list',
                          'icon' => 'list.gif',
                          'params' =>
                            array (
                              'table' => 'tx_news_domain_model_tag',
                              'pid' => 1,
                            ),
                          'script' => 'wizard_list.php',
                        ),
                      'edit' =>
                        array (
                          'type' => 'popup',
                          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tags.edit',
                          'script' => 'wizard_edit.php',
                          'popup_onlyOpenIfSelected' => 1,
                          'icon' => 'edit2.gif',
                          'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                ),
            ),
          'path_segment' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.path_segment',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'nospace,alphanum_x,lower,unique',
                ),
            ),
          'import_id' =>
            array (
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.import_id',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'import_source' =>
            array (
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.import_source',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'l10n_parent, l10n_diffsource,
					title;;paletteCore,;;;;2-2-2, teaser,;;;;3-3-3,author;;paletteAuthor,datetime;;paletteArchive,
					bodytext;;;richtext::rte_transform[flag=rte_disabled|mode=ts_css],
					rte_disabled;LLL:EXT:cms/locallang_ttc.xml:rte_enabled_formlabel,
					content_elements,

				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,

				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options,categories,tags,
				--div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tabs.relations,media,related_files,related_links,related,related_from,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.metatags;metatags,
					--palette--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.palettes.alternativeTitles;alternativeTitles,
				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.extended,',
            ),
          1 =>
            array (
              'showitem' => 'l10n_parent, l10n_diffsource,
					title;;paletteCore,;;;;2-2-2, teaser,;;;;3-3-3,author;;paletteAuthor,datetime;;paletteArchive,internalurl,

				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,

				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options,categories,tags,
				--div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tabs.relations,media,related_files,related_links,related,related_from,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.metatags;metatags,
					--palette--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.palettes.alternativeTitles;alternativeTitles,
				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.extended,',
            ),
          2 =>
            array (
              'showitem' => 'l10n_parent, l10n_diffsource,
					title;;paletteCore,;;;;2-2-2, teaser,;;;;3-3-3,author;;paletteAuthor,datetime;;paletteArchive,externalurl,

				--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
					--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,

				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options,categories,tags,
				--div--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.tabs.relations,media,related_files,related_links,related,related_from,
				--div--;LLL:EXT:cms/locallang_tca.xlf:pages.tabs.metadata,
					--palette--;LLL:EXT:cms/locallang_tca.xlf:pages.palettes.metatags;metatags,
					--palette--;LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.palettes.alternativeTitles;alternativeTitles,
				--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.extended,',
            ),
        ),
      'palettes' =>
        array (
          'paletteAuthor' =>
            array (
              'showitem' => 'author_email,',
              'canNotCollapse' => true,
            ),
          'paletteArchive' =>
            array (
              'showitem' => 'archive,',
              'canNotCollapse' => true,
            ),
          'paletteCore' =>
            array (
              'showitem' => 'istopnews, type, sys_language_uid, hidden,',
              'canNotCollapse' => false,
            ),
          'paletteNavtitle' =>
            array (
              'showitem' => 'alternative_title,path_segment',
              'canNotCollapse' => false,
            ),
          'paletteAccess' =>
            array (
              'showitem' => 'starttime;LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel,
					endtime;LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel,
					--linebreak--, fe_group;LLL:EXT:cms/locallang_ttc.xml:fe_group_formlabel,
					--linebreak--,editlock,',
              'canNotCollapse' => true,
            ),
          'metatags' =>
            array (
              'showitem' => 'keywords,--linebreak--,description,',
              'canNotCollapse' => 1,
            ),
          'alternativeTitles' =>
            array (
              'showitem' => 'alternative_title,--linebreak--,path_segment',
              'canNotCollapse' => 1,
            ),
        ),
    ),
  'tx_news_domain_model_category' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category',
          'label' => 'title',
          'label_alt' => 'parentcategory,sys_language_uid',
          'label_alt_force' => 1,
          'label_userFunc' => 'Tx_News_Hooks_Labels->getUserLabelCategory',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'dividers2tabs' => true,
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'default_sortby' => 'ORDER BY crdate',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
              'fe_group' => 'fe_group',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/category.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_category.gif',
          'treeParentField' => 'parentcategory',
          'searchFields' => 'uid,title',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sorting,sys_language_uid,l10n_parent,l10n_diffsource,hidden,starttime,endtime,fe_group,title,description,image,parentcategory,single_pid,shortcut,',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sorting' =>
            array (
              'label' => 'sorting',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_news_domain_model_category',
                  'foreign_table_where' => 'AND tx_news_domain_model_category.pid=###CURRENT_PID### AND tx_news_domain_model_category.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 8,
                  'max' => 20,
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 8,
                  'max' => 20,
                  'eval' => 'datetime',
                  'default' => 0,
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 5,
                  'maxitems' => 20,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
                          1 => -2,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'exclusiveKeys' => '-1,-2',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'required',
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'image' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.image',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'max_size' => '15360',
                  'uploadfolder' => 'uploads/tx_news',
                  'show_thumbs' => 1,
                  'size' => 3,
                  'minitems' => 0,
                  'maxitems' => 5,
                ),
            ),
          'parentcategory' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'exclude',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.parentcategory',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'tx_news_domain_model_category',
                  'foreign_table_where' => ' AND (tx_news_domain_model_category.sys_language_uid = 0 OR tx_news_domain_model_category.l10n_parent = 0) AND tx_news_domain_model_category.pid = ###CURRENT_PID### AND tx_news_domain_model_category.uid != ###THIS_UID### ORDER BY tx_news_domain_model_category.sorting',
                  'renderMode' => 'tree',
                  'subType' => 'db',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parentcategory',
                      'appearance' =>
                        array (
                          'expandAll' => true,
                          'showHeader' => false,
                          'maxLevels' => 99,
                        ),
                    ),
                  'size' => 10,
                  'autoSizeMax' => 20,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'single_pid' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.single_pid',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'maxitems' => 1,
                  'minitems' => 0,
                  'show_thumbs' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'shortcut' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_category.shortcut',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages',
                  'size' => 1,
                  'maxitems' => 1,
                  'minitems' => 0,
                  'show_thumbs' => 1,
                  'wizards' =>
                    array (
                      'suggest' =>
                        array (
                          'type' => 'suggest',
                        ),
                    ),
                ),
            ),
          'import_id' =>
            array (
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.import_id',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'import_source' =>
            array (
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_news.import_source',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;paletteCore, parentcategory, ;;;;3-3-3,
			--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.options, image, description;;;;3-3-3,single_pid;;;;3-3-3,shortcut,
			--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
				--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;paletteAccess,
			--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.extended,',
            ),
        ),
      'palettes' =>
        array (
          'paletteCore' =>
            array (
              'showitem' => 'hidden,sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,',
              'canNotCollapse' => true,
            ),
          'paletteAccess' =>
            array (
              'showitem' => 'starttime;LLL:EXT:cms/locallang_ttc.xml:starttime_formlabel, endtime;LLL:EXT:cms/locallang_ttc.xml:endtime_formlabel,
					--linebreak--, fe_group;LLL:EXT:cms/locallang_ttc.xml:fe_group_formlabel',
              'canNotCollapse' => true,
            ),
        ),
    ),
  'tx_news_domain_model_media' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media',
          'label' => 'caption',
          'label_alt' => 'type, showinpreview',
          'label_alt_force' => 1,
          'label_userFunc' => 'Tx_News_Hooks_Labels->getUserLabelMedia',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'type',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'dividers2tabs' => true,
          'default_sortby' => 'ORDER BY sorting',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/media.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_media.gif',
          'hideTable' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,title,media,type,video,showInPreview, width, height, description',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sorting' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_news_domain_model_media',
                  'foreign_table_where' => 'AND tx_news_domain_model_media.pid=###CURRENT_PID### AND tx_news_domain_model_media.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'caption' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'noCopy',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.caption',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'title' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'noCopy',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_titleText',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                ),
            ),
          'alt' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'noCopy',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_altText',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                ),
            ),
          'image' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'copy',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.media',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'max_size' => '15360',
                  'uploadfolder' => 'uploads/tx_news',
                  'show_thumbs' => 1,
                  'size' => 1,
                  'minitems' => 1,
                  'maxitems' => 1,
                ),
            ),
          'multimedia' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'copy',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.multimedia',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim,required',
                  'softref' => 'news_externalurl',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                ),
            ),
          'showinpreview' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.showinpreview',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'type' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:media.type',
              'config' =>
                array (
                  'type' => 'select',
                  'itemsProcFunc' => 'Tx_News_Hooks_ItemsProcFunc->user_MediaType',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.type.I.0',
                          1 => '0',
                          2 => '../typo3conf/ext/news/Resources/Public/Icons/media_type_image.png',
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.type.I.1',
                          1 => '1',
                          2 => '../typo3conf/ext/news/Resources/Public/Icons/media_type_multimedia.png',
                        ),
                    ),
                  'size' => 1,
                  'maxitems' => 1,
                ),
            ),
          'width' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 3,
                  'eval' => 'int',
                ),
            ),
          'height' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 3,
                  'eval' => 'int',
                ),
            ),
          'copyright' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_media.copyright',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 20,
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'type;;palettteCore,image;;paletteWidthHeight,caption,title;;paletteAlt,copyright,description;;;richtext::rte_transform[flag=rte_disabled|mode=ts_css],',
            ),
          1 =>
            array (
              'showitem' => 'type;;palettteCore,multimedia,caption,copyright,description,',
            ),
          3 =>
            array (
              'showitem' => 'type;;palettteCore,dam,caption,title;;paletteAlt,copyright,',
            ),
        ),
      'palettes' =>
        array (
          'paletteWidthHeight' =>
            array (
              'showitem' => 'width,height,',
              'canNotCollapse' => true,
            ),
          'palettteCore' =>
            array (
              'showitem' => 'showinpreview, hidden,sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,',
              'canNotCollapse' => true,
            ),
          'paletteAlt' =>
            array (
              'showitem' => 'alt',
              'canNotCollapse' => false,
            ),
        ),
    ),
  'tx_news_domain_model_file' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_file',
          'label' => 'title',
          'label_alt' => 'file',
          'label_alt_force' => 1,
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'type',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'dividers2tabs' => true,
          'default_sortby' => 'ORDER BY sorting',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'fe_group' => 'fe_group',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/file.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_file.gif',
          'hideTable' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid,l10n_parent,l10n_diffsource,hidden,title,description,file',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_news_domain_model_news',
                  'foreign_table_where' => 'AND tx_news_domain_model_news.pid=###CURRENT_PID### AND tx_news_domain_model_news.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_file.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_file.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'file' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_file.file',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'allowed' => '',
                  'disallowed' => 'php,php3',
                  'max_size' => '15360',
                  'uploadfolder' => 'uploads/tx_news',
                  'show_thumbs' => 1,
                  'size' => 1,
                  'minitems' => 0,
                  'maxitems' => 1,
                ),
            ),
          'fe_group' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
              'config' =>
                array (
                  'type' => 'select',
                  'size' => 5,
                  'maxitems' => 20,
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.any_login',
                          1 => -2,
                        ),
                      2 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.usergroups',
                          1 => '--div--',
                        ),
                    ),
                  'exclusiveKeys' => '-1,-2',
                  'foreign_table' => 'fe_groups',
                  'foreign_table_where' => 'ORDER BY fe_groups.title',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'file;;palettteCore,title;;palettteDescription,fe_group',
            ),
        ),
      'palettes' =>
        array (
          'palettteCore' =>
            array (
              'showitem' => 'hidden,sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,',
              'canNotCollapse' => true,
            ),
          'palettteDescription' =>
            array (
              'showitem' => 'description',
              'canNotCollapse' => false,
            ),
        ),
    ),
  'tx_news_domain_model_link' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_link',
          'label' => 'title',
          'label_alt' => 'uri',
          'label_alt_force' => 1,
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'type' => 'type',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'versioningWS' => true,
          'origUid' => 't3_origuid',
          'dividers2tabs' => true,
          'default_sortby' => 'ORDER BY sorting',
          'sortby' => 'sorting',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/link.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_link.gif',
          'hideTable' => true,
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,title,description,uri',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xml:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_news_domain_model_link',
                  'foreign_table_where' => 'AND tx_news_domain_model_link.pid=###CURRENT_PID### AND tx_news_domain_model_link.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_link.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                ),
            ),
          'description' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_link.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 30,
                  'rows' => 5,
                ),
            ),
          'uri' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_link.uri',
              'config' =>
                array (
                  'type' => 'input',
                  'placeholder' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_link.uri.placeholder',
                  'size' => 30,
                  'eval' => 'trim,required',
                  'softref' => 'news_externalurl',
                  'wizards' =>
                    array (
                      '_PADDING' => 2,
                      'link' =>
                        array (
                          'type' => 'popup',
                          'title' => 'Link',
                          'icon' => 'link_popup.gif',
                          'script' => 'browse_links.php?mode=wizard',
                          'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
                        ),
                    ),
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'uri;;palettteCore,title;;palettteDescription,',
            ),
        ),
      'palettes' =>
        array (
          'palettteCore' =>
            array (
              'showitem' => 'hidden,sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource,',
              'canNotCollapse' => true,
            ),
          'palettteDescription' =>
            array (
              'showitem' => 'description',
              'canNotCollapse' => false,
            ),
        ),
    ),
  'tx_news_domain_model_tag' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_tag',
          'label' => 'title',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'dividers2tabs' => true,
          'default_sortby' => 'ORDER BY title',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
            ),
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/news/Configuration/Tca/tag.php',
          'iconfile' => '../typo3conf/ext/news/Resources/Public/Icons/news_domain_model_tag.png',
          'searchFields' => 'uid,title',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'hidden,title',
        ),
      'feInterface' => NULL,
      'columns' =>
        array (
          'pid' =>
            array (
              'label' => 'pid',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'crdate' =>
            array (
              'label' => 'crdate',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'tstamp' =>
            array (
              'label' => 'tstamp',
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:news/Resources/Private/Language/locallang_db.xml:tx_news_domain_model_tag.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'required,unique,trim',
                ),
            ),
        ),
      'types' =>
        array (
          0 =>
            array (
              'showitem' => 'title;;palletteCore,',
            ),
        ),
      'palettes' =>
        array (
          'palletteCore' =>
            array (
              'showitem' => 'hidden,',
              'canNotCollapse' => true,
            ),
        ),
    ),
  'tx_lfpersons_domain_model_person' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person',
          'label' => 'first_name',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'dividers2tabs' => true,
          'versioningWS' => 2,
          'versioning_followPages' => true,
          'origUid' => 't3_origuid',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'searchFields' => 'first_name,last_name,phone_number,email,title,is_boss,photo,alttext,is_on_leave,is_active,categories,',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/lfpersons/Configuration/TCA/Person.php',
          'iconfile' => '../typo3conf/ext/lfpersons/Resources/Public/Icons/tx_lfpersons_domain_model_person.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, first_name, last_name, phone_number, email, title, is_boss, photo, alttext, is_on_leave, is_active, areasofresponsibility, departments',
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, first_name, last_name, phone_number, email, title, is_boss, photo, alttext, is_on_leave, is_active, areasofresponsibility, departments,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
      'columns' =>
        array (
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_lfpersons_domain_model_person',
                  'foreign_table_where' => 'AND tx_lfpersons_domain_model_person.pid=###CURRENT_PID### AND tx_lfpersons_domain_model_person.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'max' => 255,
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 13,
                  'max' => 20,
                  'eval' => 'datetime',
                  'checkbox' => 0,
                  'default' => 0,
                  'range' =>
                    array (
                      'lower' => 1414450800,
                    ),
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 13,
                  'max' => 20,
                  'eval' => 'datetime',
                  'checkbox' => 0,
                  'default' => 0,
                  'range' =>
                    array (
                      'lower' => 1414450800,
                    ),
                ),
            ),
          'first_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.first_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'last_name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.last_name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'phone_number' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.phone_number',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'email' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'title' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.title',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'is_boss' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.is_boss',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'photo' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.photo',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'uploadfolder' => 'uploads/tx_lfpersons',
                  'show_thumbs' => 1,
                  'size' => 5,
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'disallowed' => '',
                ),
            ),
          'alttext' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.alttext',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'is_on_leave' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.is_on_leave',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'is_active' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.is_active',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'departments' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.departments',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_lfpersons_departments_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
          'areasofresponsibility' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfpersons/Resources/Private/Language/locallang_db.xlf:tx_lfpersons_domain_model_person.areasOfResponsibility',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_lfpersons_areasofresponsibility_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
        ),
    ),
  'tx_lfinstitution_domain_model_institution' =>
    array (
      'ctrl' =>
        array (
          'title' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution',
          'label' => 'name',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'dividers2tabs' => true,
          'versioningWS' => 2,
          'versioning_followPages' => true,
          'origUid' => 't3_origuid',
          'languageField' => 'sys_language_uid',
          'transOrigPointerField' => 'l10n_parent',
          'transOrigDiffSourceField' => 'l10n_diffsource',
          'delete' => 'deleted',
          'enablecolumns' =>
            array (
              'disabled' => 'hidden',
              'starttime' => 'starttime',
              'endtime' => 'endtime',
            ),
          'searchFields' => 'name,description,logo,alt,phone,email,website,is_active,address,postal_code,city,post_address,post_postal_code,post_city,fax,status,tasks,',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/lfinstitution/Configuration/TCA/Institution.php',
          'iconfile' => '../typo3conf/ext/lfinstitution/Resources/Public/Icons/tx_lfinstitution_domain_model_institution.gif',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, logo, alt, phone, email, website, is_active, address, postal_code, city, post_address, post_postal_code, post_city, fax, status, tasks,categories',
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, description, logo, alt, phone, email, website, is_active, address, postal_code, city, post_address, post_postal_code, post_city, fax, status, tasks,categories,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime',
            ),
        ),
      'palettes' =>
        array (
          1 =>
            array (
              'showitem' => '',
            ),
        ),
      'columns' =>
        array (
          'sys_language_uid' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_language',
                  'foreign_table_where' => 'ORDER BY sys_language.title',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                          1 => -1,
                        ),
                      1 =>
                        array (
                          0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                          1 => 0,
                        ),
                    ),
                ),
            ),
          'l10n_parent' =>
            array (
              'displayCond' => 'FIELD:sys_language_uid:>:0',
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
              'config' =>
                array (
                  'type' => 'select',
                  'items' =>
                    array (
                      0 =>
                        array (
                          0 => '',
                          1 => 0,
                        ),
                    ),
                  'foreign_table' => 'tx_lfinstitution_domain_model_institution',
                  'foreign_table_where' => 'AND tx_lfinstitution_domain_model_institution.pid=###CURRENT_PID### AND tx_lfinstitution_domain_model_institution.sys_language_uid IN (-1,0)',
                ),
            ),
          'l10n_diffsource' =>
            array (
              'config' =>
                array (
                  'type' => 'passthrough',
                ),
            ),
          't3ver_label' =>
            array (
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'max' => 255,
                ),
            ),
          'hidden' =>
            array (
              'exclude' => 1,
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
          'starttime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 13,
                  'max' => 20,
                  'eval' => 'datetime',
                  'checkbox' => 0,
                  'default' => 0,
                  'range' =>
                    array (
                      'lower' => 1414450800,
                    ),
                ),
            ),
          'endtime' =>
            array (
              'exclude' => 1,
              'l10n_mode' => 'mergeIfNotBlank',
              'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 13,
                  'max' => 20,
                  'eval' => 'datetime',
                  'checkbox' => 0,
                  'default' => 0,
                  'range' =>
                    array (
                      'lower' => 1414450800,
                    ),
                ),
            ),
          'name' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.name',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'description' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.description',
              'config' =>
                array (
                  'type' => 'text',
                  'cols' => 40,
                  'rows' => 15,
                  'eval' => 'trim',
                  'wizards' =>
                    array (
                      'RTE' =>
                        array (
                          'icon' => 'wizard_rte2.gif',
                          'notNewRecords' => 1,
                          'RTEonly' => 1,
                          'script' => 'wizard_rte.php',
                          'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                          'type' => 'script',
                        ),
                    ),
                ),
              'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
            ),
          'logo' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.logo',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'file',
                  'uploadfolder' => 'uploads/tx_lfinstitution',
                  'show_thumbs' => 1,
                  'size' => 5,
                  'allowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai',
                  'disallowed' => '',
                ),
            ),
          'alt' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.alt',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'phone' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.phone',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'email' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.email',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'website' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.website',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'is_active' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.is_active',
              'config' =>
                array (
                  'type' => 'check',
                  'default' => 0,
                ),
            ),
          'address' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.address',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'postal_code' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.postal_code',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'city' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.city',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'post_address' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.post_address',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'post_postal_code' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.post_postal_code',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'post_city' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.post_city',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'fax' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.fax',
              'config' =>
                array (
                  'type' => 'input',
                  'size' => 30,
                  'eval' => 'trim',
                ),
            ),
          'status' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.status',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_lfinstitution_institution_category_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
          'tasks' =>
            array (
              'exclude' => 0,
              'label' => 'LLL:EXT:lfinstitution/Resources/Private/Language/locallang_db.xlf:tx_lfinstitution_domain_model_institution.tasks',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_lfinstitution_institution_tasks_category_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
          'categories' =>
            array (
              'exclude' => 0,
              'label' => 'Categories',
              'config' =>
                array (
                  'type' => 'select',
                  'foreign_table' => 'sys_category',
                  'MM' => 'tx_lfinstitution_institution_categories_category_mm',
                  'size' => 10,
                  'autoSizeMax' => 30,
                  'maxitems' => 9999,
                  'multiple' => 0,
                  'renderMode' => 'tree',
                  'treeConfig' =>
                    array (
                      'parentField' => 'parent',
                      'rootUid' => 1,
                      'appearance' =>
                        array (
                          'showHeader' => true,
                          'nonSelectableLevels' => '0',
                          'expandAll' => '1',
                        ),
                    ),
                ),
            ),
        ),
    ),
  'tx_lffeedit_perm' =>
    array (
      'ctrl' =>
        array (
          'title' => 'Rettigheder til at redigere indhold i frontend',
          'label' => 'uid',
          'label_userFunc' => 'tx_lffeedit->getPermLabel',
          'tstamp' => 'tstamp',
          'crdate' => 'crdate',
          'cruser_id' => 'cruser_id',
          'sortby' => 'uid',
          'dynamicConfigFile' => '/home/lars/sites/kum_dk/http/typo3conf/ext/lf_feedit/tca.php',
        ),
      'interface' =>
        array (
          'showRecordFieldList' => '',
        ),
      'types' =>
        array (
          1 =>
            array (
              'showitem' => 'uid, feusers, records, edit',
            ),
        ),
      'columns' =>
        array (
          'records' =>
            array (
              'exclude' => 1,
              'label' => 'Elementer som kan redigeres',
              'config' =>
                array (
                  'type' => 'group',
                  'internal_type' => 'db',
                  'allowed' => 'pages,tt_content,tt_address',
                  'size' => 5,
                ),
            ),
          'edit' =>
            array (
              'exclude' => 1,
              'label' => 'Kan redigere',
              'config' =>
                array (
                  'type' => 'check',
                ),
            ),
        ),
    ),
);
