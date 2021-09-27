<?php

namespace App\Models;

use CodeIgniter\Model;

class Skor extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'skor';
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
        $builder->select('skor.id, skor.nilai, datas.nama, skor.datas_id');
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

    public function deleteNilai($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('skor');
        $builder->delete(['id' => $id]);
    }

    public function editNilai($id, $newNilai)
    {
        $this->update([$id], ['nilai' => $newNilai]);
    }

    public function getSkorAsArray($arr = [])
    {
        $content = [];
        foreach ($arr as $a) {
            array_push($content, $a['nilai']);
        }
        return $content;
    }

    public function getMinimum($arr = [])
    {
        $skor = $this->getSkorAsArray($arr);
        $min = min($skor);
        return $min;
    }

    public function getMaksimum($arr = [])
    {
        $skor = $this->getSkorAsArray($arr);
        $max = max($skor);
        return $max;
    }

    public function getRataRata($arr = [])
    {
        $skor = $this->getSkorAsArray($arr);
        $avg = floatval(array_sum($skor)) / count($skor);
        return $avg;
    }

    // Membuat Frekuensi Table
    public function getFrekuensiTable($arr = [])
    {
        $skor = $this->getSkorAsArray($arr);
        $key = array_unique($skor);
        sort($key);

        $res = [];
        foreach ($key as $k) {
            array_push($res, [
                "key" => $k,
                "value" => count(array_keys($skor, $k)),
            ]);
        }

        return $res;
    }
}
