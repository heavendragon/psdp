<?php

/**
 * Administrasi_Model_Base_PrestasiSiswa
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $nis
 * @property string $semester
 * @property string $kegiatan
 * @property string $prestasi
 * @property string $keterangan
 * @property string $catatan
 * @property Administrasi_Model_Bis $Nis
 * @property Administrasi_Model_Semester $Semester
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Administrasi_Model_Base_PrestasiSiswa extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('prestasi_siswa');
        $this->hasColumn('nis', 'integer', 6, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '6',
             ));
        $this->hasColumn('semester', 'string', 15, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '15',
             ));
        $this->hasColumn('kegiatan', 'string', 50, array(
             'type' => 'string',
             'length' => '50',
             ));
        $this->hasColumn('prestasi', 'string', 30, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '30',
             ));
        $this->hasColumn('keterangan', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('catatan', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Administrasi_Model_Bis as Nis', array(
             'local' => 'nis',
             'foreign' => 'nis',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Administrasi_Model_Semester as Semester', array(
             'local' => 'kode_semester',
             'foreign' => 'kode',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}