<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importacao extends CI_Controller {

    public function __construct(){
      parent::__construct();
    }

    public function index(){
      $this->load->view('importacao_view',$data);
    }

    public function envia(){

        $abraArq = fopen("./importacao/disciplinas_curso_fama.csv", "r");

        if (!$abraArq){
          echo ("<p>Arquivo não encontrado</p>");
        }else{
          while ($v = fgetcsv ($abraArq, 2048, ",")) 
          {
            $pontos = array("-", ".");
            $cpf = str_replace($pontos, "", $v[1]);
            $data = array(
                          'id_disciplina' => $v[2],
                          'descricao'     => $v[3]
                          );
            //$this->db->insert('usuario',$data);
            echo "<pre>";
            print_r($data);
            echo "</pre>";
          }
        }     
        fclose($abraArq);
    }
}