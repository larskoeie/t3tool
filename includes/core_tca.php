<?php
  /**
   * Created by PhpStorm.
   * User: Lars
   * Date: 08-07-14
   * Time: 17:31
   */

  /* Base TCA - from core
  */
  $tca = array(
    'pages' => array(
      'ctrl' => array(),
      'columns' => array(
        'title' => array(
          'insertOnly' => TRUE,
        ),
        'storage_pid' => array(
          'foreign_table' => 'pages',
        ),
        'url' => array(),
      ),
    ),

    'sys_template' => array(
      'constants' => array(
        'fileMove' => TRUE,
      ),
      'config' => array(
        'fileMove' => TRUE,
      ),
    ),

    'tt_content' => array(
      'pi_flexform' => array(
        'fileMove' => TRUE,
      ),

    ),


  );

// $this->all_tables is merged into all tables in $tca
  $all_tables = array(
    'pid' => array(
      'foreign_table' => 'pages',
      'insertOnly' => TRUE,
    ),
    'cruser_id' => array(
      'foreign_table' => 'be_users',
    ),

  );


  /* If Templavoila is installed, add the relevant tables and fields
   * We don't actually check, just assume.
  */
  if (TRUE) {
    $tables_tv = array(
      'pages' => array(
        'tx_templavoila_flex' => array(
          'type' => 'flex',
          'ds_pointerfield' => 'tx_templavoila_ds',
          'ds_pointerfield_searchParent' => 'pid',
          'ds_pointerfield_searchParent_subfield' => 'tx_templavoila_next_ds',
          'ds_tablefield' => 'tx_templavoila_datastructure:dataprot',
        ),
        'tx_templavoila_ds' => array(
          'foreign_table' => 'tx_templavoila_datastructure',
        ),
        'tx_templavoila_to' => array(
          'foreign_table' => 'tx_templavoila_tmplobj',
        ),
        'tx_templavoila_next_ds' => array(
          'foreign_table' => 'tx_templavoila_datastructure',
        ),
        'tx_templavoila_next_to' => array(
          'foreign_table' => 'tx_templavoila_tmplobj',
        ),

      ),
      'tt_content' => array(
        'tx_templavoila_flex' => array(
          'type' => 'flex',
          'ds_pointerfield' => 'tx_templavoila_ds',
          'ds_tablefield' => 'tx_templavoila_datastructure:dataprot',
        ),
        'tx_templavoila_ds' => array(
          'foreign_table' => 'tx_templavoila_datastructure',
        ),
        'tx_templavoila_to' => array(
          'foreign_table' => 'tx_templavoila_tmplobj',
        ),

      ),

      'tx_templavoila_datastructure' => array(
        'dataprot' => array(
          'type' => 't3ds',
        )
      ),


      'tx_templavoila_tmplobj' => array(
        'cruser_id' => array(
          'foreign_table' => 'be_users',
        ),
        'datastructure' => array(
          'foreign_table' => 'tx_templavoila_datastructure',
        ),
      ),

    );
    $tca = array_replace_recursive($tca, $tables_tv);
  }

  foreach ($tca as $table => $fields) {
    $tca[$table] = array_replace_recursive($tca[$table], $all_tables);
  }

  return $tca;