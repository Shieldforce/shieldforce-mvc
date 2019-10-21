<?php


    namespace SF\Traits;

    trait Compact
    {
        protected $compact = [];

        public function getCompact(): array{ return $this->compact; }
        public function setCompact(array $compact): void{ $this->compact = $compact; }

    }