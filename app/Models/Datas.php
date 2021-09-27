<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Datas extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'datas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';


    public function getAllData()
    {
        return $this->findAll();
    }

    public function addData($nama)
    {
        $data = [
            'nama' => $nama,
        ];
        $this->insert($data);
    }

    public function getIdByName($nama)
    {
        $db = \config\Database::connect();
        $builder = $db->table("datas");
        $builder->select("id");
        $builder->where('nama', $nama);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function deleteDataById($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('datas');
        $builder->delete(['id' => $id]);
    }

    public function editNamaData($oldNama, $newNama)
    {
        $id = $this->getIdByName($oldNama)[0]['id'];
        $this->update($id, ['nama' => $newNama]);
    }
}
