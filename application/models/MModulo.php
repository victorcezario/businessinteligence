<?php
class mModulo extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->BI = $this->load->database('BI', TRUE);
        $this->BI_VIEW = $this->load->database('BI_VIEW', TRUE);
        $this->SETA = $this->load->database('SETA', TRUE);
    }
    public function arrayminusculo($array, $case = CASE_LOWER){
        if ( ! is_array($array)) return false;
        foreach ($array as $key => &$value){
            if (is_array($value))
            call_user_func_array(__function__, array (&$value, $case ) ) ;
            else
            $array[$key] = ($case == CASE_UPPER )
            ? strtoupper($array[$key])
            : strtolower($array[$key]);
        }
        return $array;
    }
    public function DadosModulo($modulo){
        $query = $this->db->query("SELECT M.ID, M.NOME, D.NOME AS BANCO, M.TABELA_DADOS, M.ICONE, M.STATUS, M.ID_BANCO_DADOS AS ID_BANCO
                                   FROM BI_MODULOS M, BI_DATABASE D WHERE M.ID_BANCO_DADOS = D.ID AND M.ID = '".$modulo."'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data = array(
                'ID' => $x->ID,
                'NOME' => $x->NOME,
                'BANCO' => $x->BANCO,
                'TABELA' => $x->TABELA_DADOS,
                'ICONE' => $x->ICONE,
                'STATUS' => $x->STATUS,
                'ID_BANCO' => $x->ID_BANCO
            );
        }
        if(count($data) == 0){
           return FALSE;
        }else{
            return $data;
        }
    }
    public function CriarKPI(){
        $modulo = $this->input->post('modulo');
        if($this->input->post('colorpik') != ""){
            $color = $this->input->post('colorpik');
        }else{
            $color = $this->input->post('color');
        }
        $link = '?d='.$this->input->post('dados_ant').'&v='.$this->input->post('valores_ant').'&f='.$this->input->post('filtros_ant');
        $data = array(
             'ID_DASHBOARD' => $this->input->post('dashboard'),
             'ID_MODULO' => $modulo,
             'ID_KPI' => $this->input->post('kpi'),
             'FILTRO' => $this->input->post('filtros_ant'),
             'COR' => $color,
             'CAMPO' => $this->input->post('campo'),
             'DATA' => $this->input->post('data'),
             'TITULO' => $this->input->post('titulo'),
             'LINK' => $link,
        );
        $this->db->insert('BI_KPI',$data);
        if($this->input->post('submit1') != null){
            redirect(base_url().'/dashboard/visualizar/'.$this->input->post('dashboard'));
        }else{
            redirect(base_url().'modulo/visualizar/'.$modulo.'/?d='.$this->input->post('dados_ant').'&v='.$this->input->post('valores_ant').'&f='.$this->input->post('filtros_ant'));
        }
    }
    public function TipoCampo($modulo,$campo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND NOME = '".$campo."' ");
        foreach ($query->result() as $x)
        {
            $data = $x->TIPO;
        }
        return $data;
    }
    public function RemoveFiltro(){
        $dados   = $this->input->post('DADOS');
        $valores = $this->input->post('VALORES');
        $modulo = $this->input->post('MODULO');
        //var_dump($valores);
        redirect(base_url().'modulo/visualizar/'.$modulo.'/?d='.$dados.'&v='.$valores.'&f='.$this->input->post('FILTROS'));
    }
    public function AtualizarFiltros($modulo){
            $filtros = $this->input->post('filtros_ant');
            $dados   = implode(',', $this->input->post('DADOS'));
            $valores = implode(',', $this->input->post('VALORES'));
            if($this->input->post('campo') != "" AND $this->input->post('condicao') != 0){
                $filtros = $this->input->post('campo').';'.$this->input->post('condicao').';'.$this->input->post('string').','.$filtros;
            }else{
                $filtros = $filtros;
            }
            redirect(base_url().'modulo/visualizar/'.$modulo.'/?d='.$dados.'&v='.$valores.'&f='.$filtros);
    }
    public function ListarCabecalho($nome){
        if($nome != NULL){
            $query = $this->db->select('APELIDO')->from('BI_MODULOS_CAMPOS')->where('NOME',$nome)->get();
            $row = $query->row();
            return $row->APELIDO;
        }
    }
    public function ListarFiltros($tipo){
        if($tipo == 'DADOS'){
            $var = $this->input->get('d');
            $var = explode(',',$var);
            if($var[0] == ''){
                return NULL;
            }else{
                return $var;
            }
        }elseif($tipo == 'VALORES'){
            $var = $this->input->get('v');
            $var = explode(',',$var);
            if($var[0] == ''){
                return NULL;
            }else{
                return $var;
            }
        }elseif($tipo == 'FILTROS'){
            $var = $this->input->get('f');
            $var = explode(',',$var);
            return $var;
        }
    }
    public function ListarFiltrosAplicados($modulo,$filtros){
        $filtros_a = $filtros;
        $filtros = explode(',',$filtros);
        $data = '<h4>Filtros Aplicados:</h4><table class="table table-condensed">';
        for ($f = 0; $f < count($filtros); $f++) {
            $filtro_a = explode(';',$filtros[$f]);
            //var_dump($filtro_a);
            if($filtro_a[0] != ""){
                if($filtro_a[1] == 1){
                    $filtro_b = ' IGUAL A ';
                }elseif($filtro_a[1] == 2){
                    $filtro_b = ' DIFERENTE ';
                }elseif($filtro_a[1] == 3){
                    $filtro_b = ' MAIOR QUE ';
                }elseif($filtro_a[1] == 4){
                    $filtro_b = ' MENOR QUE ';
                }elseif($filtro_a[1] == 5){
                    $filtro_b = ' MAIOR OU IGUAL A ';
                }elseif($filtro_a[1] == 6){
                    $filtro_b = ' MENOR OU IGUAL A ';
                }
                $url = str_replace($filtros[$f],'',$filtros_a);
                $data .= '<tr>';
                $data .= '<form method="POST" action="'.base_url().'modulo/post">';
                $data .= '<input type="hidden" name="tipo" value="remover">';
                $data .= '<input type="hidden" name="DADOS" value="'.$this->input->get('d').'">';
                $data .= '<input type="hidden" name="VALORES" value="'.$this->input->get('v').'">';
                $data .= '<input type="hidden" name="FILTROS" value="'.$url.'">';
                $data .= '<input type="hidden" name="MODULO" value="'.$modulo.'">';
                $data .= '<td class="text-center"><button type="submit" class="btn btn-xs btn-danger fa fa-close"></button></td>';
                $data .= '<td class="text-center">'.$filtro_a[0].'</td>';
                $data .= '<td class="text-center">'.$filtro_b.'</td>';
                $data .= '<td class="text-center">'.$filtro_a[2].'</td>';
                $data .= '</form>';
                $data .= '</tr>';
            }
        }
        $data .= '</table>';
        return $data;
    }
    public function ListarFormatoCampo($modulo,$campo){
        $array = array(
            'ID_MODULO' => $modulo,
            'NOME' => $campo
        );
        $query = $this->db->select('TIPO')->from('BI_MODULOS_CAMPOS')->where($array)->get();
        foreach ($query->result() as $x) {
            return $x->TIPO;
        }
    }
    public function ListarOptionCamposData($modulo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND TIPO = 'DATA' ");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<option>'.$x->NOME.'</option>';
        }
        return $data;
    }
    public function ListarOptionModelosKPI(){
        $query = $this->db->query("SELECT * FROM BI_KPI_MODELOS WHERE STATUS = 1");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<option value="'.$x->ID.'">'.$x->NOME.'</option>';
        }
        return $data;
    }
    public function ListarOptionDashboards($usuario){
        $query = $this->db->query("SELECT * FROM BI_DASHBOARDS  ");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<option value="'.$x->ID.'">'.$x->NOME.'</option>';
        }
        return $data;
    }
    public function ListarOptionDados($modulo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND TIPO != 'DECIMAL' ORDER BY APELIDO  ");
        if($query->num_rows() == 0){
            return false;
            exit;
        }
        $data = '';
        $dados = $this->ListarFiltros('DADOS');
        foreach ($query->result() as $x)
        {
            if($dados != NULL){
            if(in_array($x->NOME, $dados) > 0){
                $selected = 'selected';
            }else{
                $selected = '';
            }
            }else{
                $selected = '';
            }
            $data .= '<option value="'.$x->NOME.'" '.$selected.'>'.$x->APELIDO.'</option>';
        }
        return $data;
    }
    public function ListarOptionValores($modulo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND TIPO = 'DECIMAL' ORDER BY APELIDO ");
        $data = '';
        $dados = $this->ListarFiltros('VALORES');
        foreach ($query->result() as $x)
        {
            if($dados != NULL) {
                if (in_array($x->NOME, $dados) > 0) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
            }else{
                $selected = '';
            }
            $data .= '<option value="'.$x->NOME.'" '.$selected.'>'.$x->APELIDO.'</option>';
        }
        return $data;
    }
    public function ListarOptionFiltros($modulo){
        $data = '';
        $query = $this->db->select('APELIDO,NOME')->from('BI_MODULOS_CAMPOS')->where('ID_MODULO',$modulo)->get();
        foreach ($query->result() as $x) {
            $data .= '<option value="'.$x->NOME.'">'.$x->APELIDO.'</option>';
        }
        return $data;
    }
    public function Query($tabela){
        $data = '';
        //Busca Filtros já selecionados
        $dados = $this->ListarFiltros('DADOS');
        $valores = $this->ListarFiltros('VALORES');
        $filtros = $this->ListarFiltros('FILTROS');
        //var_dump($dados);
        //var_dump($valores);
        if($dados != NULL AND $valores != NULL){
            $marge = array_merge($dados,$valores);
        }elseif($dados != NULL){
            $marge = $dados;
            $valores = NULL;
        }elseif($valores != NULL){
            $marge = $valores;
        }else{
            $marge = NULL;
        }
        //var_dump($dados);
        if($marge != NULL){
            if(count($filtros) > 0 AND $this->input->get('f') != NULL){
                $this->db->select($marge)->from($tabela);
                for ($f = 0; $f < count($filtros); $f++) {
                    $filtro_a = explode(';',$filtros[$f]);
                    //var_dump($filtro_a);
                    if($filtro_a[0] != ""){
                        if($filtro_a[1] == 1){
                            $filtro_b = ' = ';
                        }elseif($filtro_a[1] == 2){
                            $filtro_b = ' != ';
                        }elseif($filtro_a[1] == 3){
                            $filtro_b = ' > ';
                        }elseif($filtro_a[1] == 4){
                            $filtro_b = ' < ';
                        }elseif($filtro_a[1] == 5){
                            $filtro_b = ' >= ';
                        }elseif($filtro_a[1] == 6){
                            $filtro_b = ' <= ';
                        }
                        $this->db->where($filtro_a[0].$filtro_b,$filtro_a[2]);
                    }
                    //var_dump($valor);
                }
                $query = $this->db->get();
                //var_dump($query);
            }else{
                $query = $this->db->select($marge)->from($tabela)->get();
            }
            $output = $this->db->last_query();
        }
        return $output;
    }
    public function DadosDB($id){
        $query = $this->db->query("SELECT * FROM BI_DATABASE WHERE ID = '".$id."'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data = array(
                'ID' => $x->ID,
                'NOME' => $x->NOME,
                'DESCRICAO' => $x->DESCRICAO,
                'TIPO' => $x->TIPO,
            );
        }
        return $data;
    }
    public function ListarDrillDown($modulo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND TIPO != 'DECIMAL' ");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<a href="#" class="drilldowne" op="'.$x->NOME.'"><li>'.$x->APELIDO.'</li></a>';
        }
        return $data;
    }
    public function MontaTabela($tabela,$modulo,$excel,$export = false){
        $return = array();
        $dados = array();
        $url = base_url().'modulo/visualizar/'.$modulo.'/?';
        $dados_modulo = $this->DadosModulo($modulo);
        $dados_db = $this->DadosDB($dados_modulo['ID_BANCO']);
        $banco = $dados_db['NOME'];
        //Busca Filtros já selecionados
        $dados = $this->ListarFiltros('DADOS');
        $valores = $this->ListarFiltros('VALORES');
        $filtros = $this->ListarFiltros('FILTROS');
        //var_dump($dados);
        //var_dump($valores);
        if($dados != NULL AND $valores != NULL){
            $marge = array_merge($dados,$valores);
        }elseif($dados != NULL){
            $marge = $dados;
            $valores = NULL;
        }elseif($valores != NULL){
            $marge = $valores;
        }else{
            $marge = NULL;
        }
            if($marge != NULL){
                $marge = $this->arrayminusculo($marge);
                if(count($filtros) > 0 AND $this->input->get('f') != NULL){
                    $this->$banco->distinct();
                    //$this->$banco->select('total AS x');
                    $this->$banco->select($dados);
                    for ($j = 0; $j < count($valores); $j++) {
                       $this->$banco->select_sum($valores[$j]);
                    }
                    $this->$banco->from($tabela);
                    //$this->$banco->join('wmocbi_vendas_produtos', 'wmocbi_vendas.codigo = wmocbi_vendas_produtos.vcodigo');
                    for ($f = 0; $f < count($filtros); $f++) {
                        $filtro_a = explode(';',$filtros[$f]);
                        //var_dump($filtro_a);
                        if($filtro_a[0] != ""){
                            if($filtro_a[1] == 1){
                                $filtro_b = ' = ';
                            }elseif($filtro_a[1] == 2){
                                $filtro_b = ' != ';
                            }elseif($filtro_a[1] == 3){
                                $filtro_b = ' > ';
                            }elseif($filtro_a[1] == 4){
                                $filtro_b = ' < ';
                            }elseif($filtro_a[1] == 5){
                                $filtro_b = ' >= ';
                            }elseif($filtro_a[1] == 6){
                                $filtro_b = ' <= ';
                            }
                            if($export == false){
                                $this->$banco->where($filtro_a[0].$filtro_b,$filtro_a[2])->limit(1000);
                            }else{
                                $this->$banco->where($filtro_a[0].$filtro_b,$filtro_a[2]);
                            }
                        }
                        //var_dump($valor);
                    }
                    //$this->$banco->group_by('total');
                     $this->$banco->group_by($dados);
                     //$numrows =  $this->$banco->count_all_results();
                    $query = $this->$banco->get();
                    //var_dump($query);
                }else{
                     $this->$banco->distinct();
                     $this->$banco->select($dados);
                    for ($j = 0; $j < count($valores); $j++) {
                    $this->$banco->select_sum($valores[$j]);
                    }
                    $this->$banco->from($tabela);
                    $this->$banco->group_by($dados);
                    //$numrows =  $this->$banco->count_all_results();
                    //$this->db->join('wmocbi_vendas_produtos', 'wmocbi_vendas.codigo = wmocbi_vendas_produtos.ccodigo');
                            if($export == false){
                                $query = $this->$banco->limit(1000)->get();
                            }else{
                                $query = $this->$banco->get();
                            }
                }
                $numrows = $query->num_rows();
                $return['registros'] = $numrows;
                if($return['registros'] >= 1000){
                    $limited = '<div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                                    <h3 style="color:#fff">Consulta muito grande!</h3>
                                    <p>A consulta realizada retornou muitas linhas, para melhorar a visualização dos dados será exibido somente 10000 linhas, recomendamos que exporte os mesmos para o excel ou pdf.</p>
                                    <br>
                                    <p><a class="btn btn-danger" href="'.$excel.'" target="Blank">Baixar Planilha</a></p>
                                </div>';
                }else{
                    $limited = '';
                }
                $return['limited'] = $limited;
                $return['query'] = $query;
                $return['banco'] = $banco;
                $return['marge'] = $marge;
                $return['dados'] = $dados;
                $return['url'] = $url;
                $return['valores'] = $valores;
        }
        return $return;
    }
    public function ListarTabela($tabela,$modulo,$excel,$export = false){
            $data = '';
            $dados_tabela = $this->MontaTabela($tabela,$modulo,$excel,$export);
            
            $query_retorno = $dados_tabela['query'];
            $banco = $dados_tabela['banco'];
            $marge = $dados_tabela['marge'];
            $url = $dados_tabela['url'];
            $dados = $dados_tabela['dados'];
            $valores = $dados_tabela['valores'];
            //var_dump($query_retorno);
            $query = $query_retorno;
            if($export == false){
                $tableclass = 'id="demo-dt-selection" class="table table-striped table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="demo-dt-selection_info" style="width: 98%;overflow-x: hidden;"';
            }else{
                $tableclass = 'border="1" class="table striped"';
            }
            $data .= '<table '.$tableclass.'>';
            $data .= '<thead><tr>';
            for ($z = 0; $z < count($marge); $z++) {
                $data .= '<th>' .$this->ListarCabecalho($marge[$z]). '</th>';
            }
            //var_dump($buscaheader);
            $data .= '</tr></thead>';
            $data .= '<tbody>';
            $b = 100;
            $f = '';
            for ($v = 0; $v < count($valores); $v++) {
                    $campo = strtolower($valores[$v]);
                    ${"vt" . $campo} = 0;
            }
            foreach ($query->result() as $x) {
                $col_valores = implode(',', $valores);
                $data .= '<tr id="'.$b.'"">';
                if(count($dados) > 0){
                    for ($i = 0; $i < count($dados); $i++) {
                        $campo = strtolower($dados[$i]);
                        if($this->ListarFormatoCampo($modulo,$campo) == 'DATA'){
                            $datetime = date_format(new DateTime($x->$campo), 'd/m/Y');
                            $data .= '<td id="line" data-id="'.$campo.'" class="seletor">' .$datetime. '</td>';
                        }else{
                            $data .= '<td id="line" data-id="'.$campo.'" class="seletor">' . $x->$campo. '</td>';
                        }
                         $f .= $campo.';1;'.$x->$campo.',';
                    }
                }
                for ($u = 0; $u < count($valores); $u++) {
                    $campo = strtolower($valores[$u]);
                    if($this->ListarFormatoCampo($modulo,$campo) == 'DECIMAL'){
                        if($x->$campo < 0){
                            $color = 'text-danger';
                        }else{
                            $color = 'btn-link';
                        }
                        if($export == false){
                            $tablehref = '<a href="#" class="drilldown '.$color.'" data="'.$b.'" filtros="'.$_GET['f'].','.$f.'" column="'.$campo.'" valores="'.$col_valores.'" url="'.$url.'" style="text-align: right;">' .number_format($x->$campo, 2, ',','.'). '</a>';
                        }else{
                            $tablehref = number_format($x->$campo, 2, ',','.');
                        }
                        $data .= '<td style="text-align: right;" data-id="'.$campo.'" class="seletor">'.$tablehref.'</td>';
                    }
                    ${"vt" . $campo} = ${"vt" . $campo} + $x->$campo;
                    //var_dump(${"vt" . $campo});
                }
                $data .= '</tr>';
                $b++;
                $f = '';
            }
            $data .= '</tbody>';
            $data .= '<tfoot><tr>';
                if(count($dados) > 0){
                    for ($i = 0; $i < count($dados); $i++) {
                        $data .= '<td></td>';
                    }
                }
                for ($v = 0; $v < count($valores); $v++) {
                    $campo = strtolower($valores[$v]);
                    $data .= '<td style="text-align: right;"><b>'.number_format(${"vt" . $campo}, 2, ',','.').'</b></td>';
                }
                $data .= '</tr></tfoot>';
            $data .= '</tbody></table>';
            return $data;
        }
    }
        
