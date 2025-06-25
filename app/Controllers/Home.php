<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function armarPagina($nombre) {

        $data = ['titulo' => $nombre];
        echo view("front/header", $data);
        echo view("front/navbar");

        switch ($nombre) {
            case "inicio":
                echo view("front/principal");
                break;
            case "quienes":
            case "acerca":
            case "login":
            case "registro":
                echo view("front/".$nombre);
                break;
            case "terminos":
            case "contacto":
            case "politica":
                echo view("front/construccion");
                break;
            default:
                echo view("front/404");
                break;
        }
        echo view("front/footer");
    }
}
