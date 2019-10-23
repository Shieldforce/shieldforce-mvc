<?php


    namespace SF\Classes;

    use App\Config\Database;
    use SF\Model\Model;

    /**
     * Descrição para CRUDModel
     *
     * @autor Alexandre Ferreira
     *
     */
    class CRUDModel implements Model
    {
        protected $conn;

        protected $table = null;

        protected $fillable = [];

        public function __construct()
        {
            $conn = new Database();
            $this->conn = $conn->conn();
        }

        public function all()
        {
            try
            {
                $query = "SELECT * FROM $this->table";
                $stmt = $this->conn->query($query);
                $list = $stmt->fetchAll(\PDO::FETCH_OBJ);
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            return $list;
        }


        public function find($id)
        {
            try
            {
                $query = "SELECT * FROM $this->table WHERE id=:id ";
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            return $stmt->fetch(\PDO::FETCH_OBJ);
        }


        public function where(array $data)
        {
            try
            {
                $values = '';
                $array_keys = array_keys($data);
                foreach ($data as $key => $value)
                {
                    $comp = $value[0];
                    if ($key == end($array_keys)) {
                        $values .= "$key$comp:$key";
                    }
                    else
                    {
                        $values .= "$key$comp:$key AND ";
                    }
                }
                $query = "SELECT * FROM $this->table WHERE ($values) ";
                $stmt = $this->conn->prepare($query);
                foreach ($data as $key => $value)
                {
                    $stmt->bindValue(":$key", $value[1]);
                }
                $stmt->execute();
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        }


        public function store(array $data)
        {
            try
            {
                $values = '';
                $colunms = '';
                $array_keys = array_keys($data);
                foreach ($data as $key => $value)
                {
                    if ($key == end($array_keys)) {
                        $values .= ":$key";
                        $colunms .= "$key";
                    }
                    else
                    {
                        $values .= ":$key,";
                        $colunms .= "$key,";
                    }
                }
                $query = "INSERT INTO $this->table ($colunms) VALUES ($values) ";
                $stmt = $this->conn->prepare($query);
                foreach ($data as $key => $value)
                {
                    $stmt->bindValue(":$key", $value);
                }
                $exec = $stmt->execute();
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            if($exec > 0)
            {
                return
                    [
                        'code'       =>1001,
                        'status'     =>'success',
                        'msg'        =>'Cadastrado com sucesso!',
                        'data'       =>$this->find($this->conn->lastInsertId()),
                    ];
            }
            return
                [
                    'code'           =>2001,
                    'status'         =>'error',
                    'msg'            =>error_get_last()['message'],
                    'data'           =>null
                ];
        }

        public function update(array $data)
        {
            try
            {
                $values = '';
                $array_keys = array_keys($data);
                foreach ($data as $key => $value)
                {
                    if ($key == end($array_keys)) {
                        $values .= "`$key`=?";
                    }
                    else
                    {
                        $values .= "`$key`=?,";
                    }
                }
                $id = $data['id'];
                $query = "UPDATE $this->table SET $values WHERE `id`={$data['id']} ";
                $stmt = $this->conn->prepare($query);

                $number = 0;
                foreach ($data as $key => $value)
                {
                    $number += 1;
                    $stmt->bindValue($number, $value);
                }
                $exec = $stmt->execute();
            }
            catch (\PDOException $e)
            {
                $return =
                    [
                        'code'     =>$e->getCode(),
                        'status'   =>'error',
                        'mgs'      =>$e->getMessage(),
                        'line'     =>$e->getLine(),
                        'data'     =>null,
                    ];
                echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                print_r($return);
                echo "</pre>";
            }
            if($exec > 0)
            {
                return
                    [
                        'code'       =>1002,
                        'status'     =>'success',
                        'msg'        =>'Atualizado com sucesso!',
                        'data'       =>$this->find($id),
                    ];
            }
            return
                [
                    'code'           =>2002,
                    'status'         =>'error',
                    'msg'            =>'Erro ao atualizar!',
                    'data'           =>null
                ];
        }


        public function delete(int $id)
        {
            if($this->find($id))
            {
                try
                {
                    $query = "DELETE FROM $this->table WHERE `id`=:id ";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindValue(":id", $id);
                    $exec = $stmt->execute();
                }
                catch (\PDOException $e)
                {
                    $return =
                        [
                            'code'     =>$e->getCode(),
                            'status'   =>'error',
                            'mgs'      =>$e->getMessage(),
                            'line'     =>$e->getLine(),
                            'data'     =>null,
                        ];
                    echo "<pre style='background-color: black;color: red;padding: 20px;'>";
                    print_r($return);
                    echo "</pre>";
                }
                if($exec > 0)
                {
                    return
                        [
                            'code'       =>1003,
                            'status'     =>'success',
                            'msg'        =>'Deletado com sucesso!',
                            'data'       =>"Registro de id: $id deletado",
                        ];
                }
                return
                    [
                        'code'           =>2003,
                        'status'         =>'error',
                        'msg'            =>'Erro ao deletar!',
                        'data'           =>null
                    ];
            }
            return
                [
                    'code'           =>2003,
                    'status'         =>'error',
                    'msg'            =>'Registro não existe ou já foi deletado!',
                    'data'           =>null
                ];
        }


        /*
         *
         *
         * Exemplos Find ==== $users = $obj->find(1);
         *
         *
         * Exemplos Find ==== $users = $obj->all();
         *
         *
         *
         * $users = $obj->where(
                [
                    'id'                         =>['=','0'],
                    'first_name'                 =>['=','Alexandre'],
                    'last_name'                  =>['!=','Alexandre'],
                    'birth'                      =>['<','Alexandre']
                ]
            );
         *
         *
         *
         *
         *  $users = $obj->store(
                [
                    'first_name'                 =>'Olinda',
                    'last_name'                  =>'Ferreira',
                    'email'                      =>'olinda@gmail.com',
                    'password'                   =>'123456',
                ]
            );
         *
         *
         *
         *
         * $users = $obj->update(
                [
                    'id'=>1,
                    'first_name'                =>'Wallance',
                    'last_name'                 =>'Marques',
                    'email'                     =>'wall@gmail.com',
                    'password'                  =>'123456',
                ]
            );
         *
         *
         *
         *
         *  $users = $obj->delete(2);
         *
         */


    }