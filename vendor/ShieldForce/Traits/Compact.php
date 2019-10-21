<?php


    namespace SF\Traits;

    /**
     * Descrição para Compact
     *
     * @autor Alexandre Ferreira
     *
     */
    trait Compact
    {
        protected $compact = [];

        public function getCompact(): array{ return $this->compact; }
        public function setCompact(array $compact): void{ $this->compact = $compact; }

    }