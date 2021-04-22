
<?php
include_once 'autoload.php';
class AdminRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('admin');
    }
}