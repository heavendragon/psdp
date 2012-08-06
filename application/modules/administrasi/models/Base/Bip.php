<?php

/**
 * Administrasi_Model_Base_Bip
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $kode
 * @property string $nama
 * @property string $keterangan
 * @property string $catatan
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Administrasi_Model_Base_Bip extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('bip');
        $this->hasColumn('kode', 'string', 3, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '3',
             ));
        $this->hasColumn('nama', 'string', 30, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => '30',
             ));
        $this->hasColumn('keterangan', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('catatan', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}