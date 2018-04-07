<?php
class MMiddleware extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->BI = $this->load->database('BI', TRUE);
				$this->SETA = $this->load->database('SETA', TRUE);
                $this->BI_VIEW = $this->load->database('BI_VIEW', TRUE);
                $this->BI_VIEWFG = $this->load->dbforge($this->BI_VIEW, TRUE);
                $this->SETAFG = $this->load->dbforge($this->SETA, TRUE);
        }
        public function ProximaExecucao($processo){
            $middleware = $this->BI->query("SELECT M.PERIODICIDADE, L.FIM_INSERCAO AS ULTIMA_EXECUCAO 
                                            FROM BI_MIDDLEWARE M, BI_MIDDLEWARE_LOGS L 
                                            WHERE M.ID = L.ID_PROCESSO AND M.ID = $processo ORDER BY L.FIM_INSERCAO DESC LIMIT 1");
            if($middleware->num_rows() == 0){return true;die;}
            foreach ($middleware->result() as $m) {
                if($m->PERIODICIDADE != NULL){
                $periodicidade = explode('/',$m->PERIODICIDADE);
                $periodo = $periodicidade[1];
                $time = $periodicidade[0];
                if($m->ULTIMA_EXECUCAO != NULL){
                    if($periodo == 'M'){
                        $periodo_n = 'minute';
                    }elseif($periodo == 'H'){
                        $periodo_n = 'hour';
                    }elseif ($periodo == 'D'){
                        $periodo_n = 'day';
                    }else{
                        return false;
                    }
                    $proxima_execucao = date('Y-m-d H:i:s', strtotime($m->ULTIMA_EXECUCAO. ' + '.$time.' '.$periodo_n));
                    if(date('Y-m-d H:i:s') < $proxima_execucao){
                        return false;
                    }else{
                        return true;
                    }
                }else{
                    return true;
                }
                }else{
                    return false;
                }
            }
        }
        public function CriaTabela($db_origem,$origem,$db_destino,$destino){
            $db_destino = $db_destino.'FG';
            //Prevenção de dados
            if($destino == 'SETA'){
               exit;
            }
            $this->$db_destino->drop_table(strtoupper($destino), true);
            $campos = array();
            $fields = $this->$db_origem->field_data(strtoupper($origem));
            foreach ($fields as $field)
            {
                    if($field->type == 'double precision'){
                        $campos[strtoupper($field->name)]['type'] = 'INT';
                    }else{
                        $campos[strtoupper($field->name)]['type'] = $field->type;
                    }
                        $campos[strtoupper($field->name)]['constraint'] = $field->max_length;
                        //$campos[strtoupper($field->name)]['primary_key'] = $field->primary_key;
                        $campos[strtoupper($field->name)]['null'] = TRUE;
            }
            //var_dump($campos);
            $this->$db_destino->add_field($campos);
            $this->$db_destino->create_table(strtoupper($destino));
        }
        public function StartMiddlewareT()
        {
            $limite = 3;
            $inicio_c = date('Y-m-d H:i:s');
            $middleware = $this->BI->query("SELECT W.ID, W.ID_MODULO, W.DB_ORIGEM, W.VIEW_ORIGEM, D.NOME AS DB_DESTINO, M.TABELA_DADOS AS TABELA_DESTINO 
                                            FROM BI_MIDDLEWARE W, BI_MODULOS M, BI_DATABASE D 
                                            WHERE W.ID_MODULO = M.ID AND M.ID_BANCO_DADOS = D.ID AND W.STATUS = 1 ");
            foreach ($middleware->result() as $m) {
                if($this->ProximaExecucao($m->ID) == true){
                    $data = array();
                    $processo = $m->ID;
                    $modulo = $m->ID_MODULO;
                    $db_origem = $m->DB_ORIGEM;
                    $db_destino = $m->DB_DESTINO;
                    $origem = $m->VIEW_ORIGEM;
                    $destino = $m->TABELA_DESTINO;
                $i = 1;
                //var_dump($processo);
                //Cria tabela
                $this->CriaTabela($db_origem,$origem,$db_destino,$destino);
                //$campos = $this->BI->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' ");
                $fields = $this->$db_origem->field_data($origem);
                $campos = array();
                foreach ($fields as $field){
                    $campos[] = $field->name;
                }
                //print_r($campos).'<BR>';
                //var_dump($fields);
                $numrows = $this->$db_origem->get(strtolower($origem))->num_rows();
                if($numrows <= $limite){
                    $results = 1;
                }else{
                    $results = intval(round($numrows / $limite, 0, PHP_ROUND_HALF_UP));
                }
                
                var_dump($results);
                //$linha = 0;
                for($b = 1;$b <= $results; $b++){
                    $prox = ($limite * $b);
                    if($numrows <= $limite){
                        $offset = 0;
                    }else{
                        $offset = $prox;
                    }
                    $query = $this->$db_origem->get($origem, $limite, $offset);
                    var_dump($this->$db_origem->last_query());
                    foreach ($query->result() as $x) {
                        //foreach ($campos->result() as $c) {
                        for ($g = 1; $g < count($campos); $g++) {
                            
                            $c_name = strtolower($campos[$g]);
                            //var_dump($c_name);
                            if(trim($x->$c_name) == ''){
                                $data[$i][strtoupper($campos[$g])] = 0;
                            }else{
                                $data[$i][strtoupper($campos[$g])] = trim($x->$c_name);
                            }
                        }
                        $i++;
                    }
                    var_dump(count($data));
                    //var_dump($data);
                    $insert = $this->$db_destino->insert_batch($destino, $data);
                    //$linha = $linhas + $linha;
                    
                    //$data = array();
                }
                //$query = $this->$db_origem->query("SELECT * FROM $origem");
                $fim_c = date('Y-m-d H:i:s');
                $inicio_i = date('Y-m-d H:i:s');
                //var_dump($data);

                if($insert){
                    $erro = 1;
                }else{
                    $erro = $this->$db_destino->_error_message();
                }
                $fim_i = date('Y-m-d H:i:s');
                $logs = array(
                    'ID_PROCESSO' => $processo,
                    'INICIO_CONSULTA' => $inicio_c,
                    'FIM_CONSULTA' => $fim_c,
                    'INICIO_INSERCAO' => $inicio_i,
                    'FIM_INSERCAO' => $fim_i,
                    'LINHAS' => $i,
                    'ERRO' => $erro,
                );
                var_dump($erro);
                $this->BI->insert('BI_MIDDLEWARE_LOGS', $logs);
                    //continue;
                }

            }
        }
        public function StartMiddlewareP()
        {
            $limite = 100;
            $limite1 = $limite;
            var_dump($limite);
            $inicio_c = date('Y-m-d H:i:s');
            $middleware = $this->BI->query("SELECT W.ID, W.ID_MODULO, W.DB_ORIGEM, W.VIEW_ORIGEM, D.NOME AS DB_DESTINO, M.TABELA_DADOS AS TABELA_DESTINO FROM BI_MIDDLEWARE W, BI_MODULOS M, BI_DATABASE D 
                                        WHERE W.TIPO = 'P' AND W.ID_MODULO = M.ID AND M.ID_BANCO_DADOS = D.ID AND W.STATUS = 1 ");
            foreach ($middleware->result() as $m) {
                if($this->ProximaExecucao($m->ID) == true){
                    $data = array();
                    $processo = $m->ID;
                    $modulo = $m->ID_MODULO;
                    $db_origem = $m->DB_ORIGEM;
                    $db_destino = $m->DB_DESTINO;
                    $origem = $m->VIEW_ORIGEM;
                    $destino = $m->TABELA_DESTINO;
                $i = 1;
                $fields = $this->$db_origem->field_data($origem);
                $campos = array();
                foreach ($fields as $field){
                    $campos[] = $field->name;
                }
                $numrows1 = $this->$db_destino->get($destino)->num_rows();
                $numrows = $this->$db_origem->get(strtolower($origem))->num_rows();
                if($numrows == $numrows1){
                    die;
                }
                $clear = $this->$db_origem->flush_cache();
                if(($numrows - $numrows1) <= $limite){
                    $results = 1;
                    $limite = $numrows - $numrows1;
                }else{
                    $results = intval(round($numrows / $limite, 0, PHP_ROUND_HALF_UP));
                }      
                //var_dump($results).'<BR>';
                //$linha = 0;
                for($b = 1;$b <= $results; $b++){
                    $queryY = $this->$db_destino->select('CODIGO')->order_by('CODIGO','DESC')->limit(1)->get($destino);
                    $row = $queryY->row();
                    if (isset($row))
                    {
                        $partida = $row->CODIGO;
                    }else{
                        $partida = 0;
                    }
                    /*
                    $queryZ = $this->$db_origem->select('codigo')->order_by('codigo','DESC')->limit(1)->get(strtolower($origem));
                    $rowZ = $queryZ->row();
                    if(isset($row->CODIGO)){
                        if($row->CODIGO == $rowZ->codigo){
                        die; 
                        }
                    }
                    */
                    $prox = ($limite * $b);
                    if($numrows <= $limite){
                        $offset = 0;
                    }else{
                        $offset = $prox;
                    }
                    if($limite1 == $limite){
                        $offset = 0;
                    }
                    $query = $this->$db_origem->where('codigo >',$partida)->get(strtolower($origem), $limite, $offset);
                    var_dump($this->$db_origem->last_query()).'<BR>';
                    foreach ($query->result() as $x) {
                        //foreach ($campos->result() as $c) {
                        for ($g = 0; $g < count($campos); $g++) {
                            
                            $c_name = strtolower($campos[$g]);
                            //var_dump($c_name);
                            if(trim($x->$c_name) == ''){
                                $data[$i][strtoupper($campos[$g])] = 0;
                            }else{
                                $data[$i][strtoupper($campos[$g])] = trim($x->$c_name);
                            }
                        }
                        $i++;
                    }
                    $clear = $this->$db_origem->flush_cache();
                    $close = $this->$db_origem->close();
                    $inicio_i = date('Y-m-d H:i:s');
                    var_dump(count($data)).'<BR>';
                    $insert = $this->$db_destino->insert_batch($destino, $data);
                    //var_dump($this->$db_destino->last_query()).'<BR>';
                    $data = array();
                    clearstatcache(); 
                    $clear = $this->$db_destino->flush_cache();
                    $close = $this->$db_destino->close();
                }
                    

                $fim_c = date('Y-m-d H:i:s');
                
                //var_dump($data);

                if($insert){
                    $erro = 1;
                }else{
                    $erro = $this->$db_destino->_error_message();
                }
                $fim_i = date('Y-m-d H:i:s');
                $logs = array(
                    'ID_PROCESSO' => $processo,
                    'INICIO_CONSULTA' => $inicio_c,
                    'FIM_CONSULTA' => $fim_c,
                    'INICIO_INSERCAO' => $inicio_i,
                    'FIM_INSERCAO' => $fim_i,
                    'LINHAS' => $i,
                    'ERRO' => $erro,
                );
                var_dump($erro);
                $this->BI->insert('BI_MIDDLEWARE_LOGS', $logs);
                    //continue;
                }

            }
        }
        public function StartMiddleware()
        {
            //Define Inicio da Consulta
            $inicio_c = date('Y-m-d H:i:s');
            $middleware = $this->BI->query("SELECT W.ID, W.TBL_DESTINO, W.ID_MODULO, W.DB_ORIGEM, W.VIEW_ORIGEM, D.NOME AS DB_DESTINO, M.TABELA_DADOS AS TABELA_DESTINO, M.ID AS MID FROM BI_MIDDLEWARE W, BI_MODULOS M, BI_DATABASE D 
                                        WHERE W.ID_MODULO = M.ID AND M.ID_BANCO_DADOS = D.ID AND W.STATUS = 1 ");
            foreach ($middleware->result() as $m) {
                //Verifica se deve seguir com a transferência de dados
                if($this->ProximaExecucao($m->ID) == true){
                    $data = array();
                    $db_destino = $m->DB_DESTINO;
                    $origem = $m->VIEW_ORIGEM;
                    $destino = 'wmocbi_'.$m->TBL_DESTINO;
                    $db_destino1 = $db_destino.'FG';
                    $tbl_temp = $destino.'1';
                        $table_existe = $this->$db_destino->query("SELECT table_name FROM information_schema.tables WHERE table_name = '".$destino."';");
                        if ($table_existe->num_rows() > 0)
                        {
                            //Altera nome da tabela
                            $this->$db_destino1->rename_table($destino, $tbl_temp, TRUE);
                            //Altera no banco nome da tabela
                            $set = array('TABELA_DADOS' => $tbl_temp);
                            $where = array('ID' => $m->MID);
                            $this->db->update('BI_MODULOS',$where, $set);
                            //Limpa cache de execução
                            $clear = $this->$db_destino->flush_cache();
                            $close = $this->$db_destino->close();
                        }
                        //Define fim e Inicio
                        $fim_c = date('Y-m-d H:i:s');
                        $inicio_i = date('Y-m-d H:i:s');
                        //Cria tabela definitiva
                        $query = 'SELECT * INTO '.$destino.' FROM '.$origem.'';
                        $this->$db_destino->query($query);
                        $i = $this->$db_destino->affected_rows();
                        //Limpa cache de execução
                        $clear = $this->$db_destino->flush_cache();
                        $close = $this->$db_destino->close();
                        if ($table_existe->num_rows() > 0)
                        {
                            //Altera no banco a tabela definitiva
                            $set = array('TABELA_DADOS' => $destino);
                            $where = array('ID' => $m->MID);
                            $this->db->update('BI_MODULOS',$where, $set);
                            //Deleta tabela temporaria
                            $this->$db_destino1->drop_table($tbl_temp, true);
                            $clear = $this->$db_destino->flush_cache();
                            $close = $this->$db_destino->close();
                        }
                        //Define fim do processo
                        $fim_i = date('Y-m-d H:i:s');
                        $logs = array(
                            'ID_PROCESSO' => $m->ID,
                            'INICIO_CONSULTA' => $inicio_c,
                            'FIM_CONSULTA' => $fim_c,
                            'INICIO_INSERCAO' => $inicio_i,
                            'FIM_INSERCAO' => $fim_i,
                            'LINHAS' => $i
                        );
                        var_dump($logs);
                        //Insere Logs
                        $this->BI->insert('BI_MIDDLEWARE_LOGS', $logs);
                            //continue;
                        }else{
                            'Não executar';
                        }
            }

            }
        }