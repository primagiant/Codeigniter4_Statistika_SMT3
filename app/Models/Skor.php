<?php

namespace App\Models;

use CodeIgniter\Model;

class Skor extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'skors';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['datas_id', 'nilai'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';


    public function getDataById($id)
    {
        $db = \config\Database::connect();
        $builder = $db->table('skor');
        $builder->select('*');
        $builder->join('datas', 'datas.id = skor.datas_id');
        $builder->where('datas.id', $id);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function addMultipleNilai($dataId, $arr = [])
    {
        $db = \config\Database::connect();

        foreach ($arr as $a) {
            $data = [
                "datas_id" => $dataId,
                "nilai" => $a,
            ];
            $builder = $db->table('skor');
            $builder->insert($data);
        }
    }
}
