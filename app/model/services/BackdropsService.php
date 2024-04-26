<?php
class BackdropsService
{
    public static function getBackdrops(): array
    {
        $daoMovie = new DaoBackdrops();
        return $daoMovie->findAll();
    }
}