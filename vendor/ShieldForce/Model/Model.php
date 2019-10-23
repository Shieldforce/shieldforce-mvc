<?php


    namespace SF\Model;

    /**
     * Descrição para Model
     *
     * @autor Alexandre Ferreira
     *
     */
    interface Model
    {
        public function __construct();

        public function all();

        public function find($id);

        public function where(array $data);

        public function store(array $data);

        public function update(array $data);

        public function delete(int $id);
    }