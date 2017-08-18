<?php


namespace App\Services;


interface WorkShiftService
{

    public function getActiveWorkShift();

    public function openShift();

    public function closeShift();

    public function getAll();

}