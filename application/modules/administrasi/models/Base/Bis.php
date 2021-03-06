<?php

/**
 * Administrasi_Model_Base_Bis
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $nis
 * @property string $nama
 * @property enum $jk
 * @property sring $catatan
 * @property Doctrine_Collection $Administrasi_Model_StatusSiswa
 * @property Doctrine_Collection $Administrasi_Model_PrestasiSiswa
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Administrasi_Model_Base_Bis extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('bis');
        $this->hasColumn('nis', 'integer', 6, array(
             'type' => 'integer',
             'unique' => true,
             'notnull' => true,
             'length' => '6',
             ));
        $this->hasColumn('nama', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '50',
             ));
        $this->hasColumn('jk', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'L',
              1 => 'P',
             ),
             ));
        $this->hasColumn('catatan', 'sring', 255, array(
             'type' => 'sring',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Administrasi_Model_StatusSiswa', array(
             'local' => 'nis',
             'foreign' => 'nis'));

        $this->hasMany('Administrasi_Model_PrestasiSiswa', array(
             'local' => 'nis',
             'foreign' => 'nis'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}