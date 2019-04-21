<?php
class test extends CI_Controller{
    function index($id=null)
    {
        echo $id;
    }
    function detailproduct($id=null)
    {
        echo $id."pro";
    }
    function detailcategotynew($id=null)
    {
        echo $id."cat";
    }
    function detailcategotyproduct($id=null)
    {
        echo $id."cat";
    }
    function detailnew($id)
    {
        echo $id."new";
    }
}