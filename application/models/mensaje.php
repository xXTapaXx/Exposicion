<?php
Class Mensaje extends CI_Model
{
    function insertar($mensaje,$timestamp,$status,$tipo,$user)
    {
        $data = array(
            'mensaje' => $mensaje,
            'timestamp' => $timestamp,
            'status' => $status,
            'tipo' => $tipo,
            'user' => $user
        );

        $this->db->insert('mensajes', $data);
    }

    function selectMensaje()
    {
        /*$this -> db -> select('mensaje,timestamp,status ');
        $this -> db -> from('mensajes');
        $this -> db -> where('tipo', '1');*/


        $query = $this -> db -> get('mensajes');

        if($query -> num_rows() > 0 )
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}
?>