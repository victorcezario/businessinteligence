<?php
class MDashboard extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->BI = $this->load->database('BI', TRUE);
        $this->BI_VIEW = $this->load->database('BI_VIEW', TRUE);
        $this->SETA = $this->load->database('SETA', TRUE);
        $this->load->model('mModulo');
    }
    public function ApelidoCampo($modulo,$campo){
        $query = $this->db->query("SELECT * FROM BI_MODULOS_CAMPOS WHERE ID_MODULO = '".$modulo."' AND NOME = '".$campo."' ");
        $data = 'Campo não encontrado';
        foreach ($query->result() as $x)
        {
            $data = $x->APELIDO;
        }
        //var_dump($data);
        return $data;
        
    }
    public function DadosChart($chart){
        $query = $this->db->query("SELECT * FROM BI_CHARTS WHERE ID = '".$chart."'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data = array(
                'ID' => $x->ID,
                'ID_MODULO' => $x->ID_MODULO,
                'DESCRICAO' => $x->DESCRICAO,
                'TIPO' => $x->TIPO,
                'QUERY' => $x->QUERY,
                'EIXOY' => $x->EIXOY,
                'EIXOX' => $x->EIXOX,
                'FILTRO' => $x->FILTRO,
                'DATADINAMICA' => $x->DATADINAMICA
            );
        }
        return $data;
    }
    public function FormatoKPI($valor,$formato){
        if($formato == 'MONEY'){
            $valor = 'R$ '.number_format($valor,2,',','.');
        }elseif($formato == 'INT'){
            $valor = substr($valor,0,8);
        }else{
            $valor = $valor;
        }
        return $valor;
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
    public function DadosKPI($id){
        $query = $this->db->query("SELECT * FROM BI_KPI_MODELOS WHERE ID = '".$id."'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data = array(
                'ID' => $x->ID,
                'NOME' => $x->NOME,
                'HTML' => $x->HTML,
                'STATUS' => $x->STATUS,
            );
        }
        return $data;
    }
    public function ListarKPI($dashboard,$padrao,$empresa){
        $query = $this->db->query("SELECT * FROM BI_KPI WHERE ID_DASHBOARD = '".$dashboard."' ORDER BY ORDEM ASC");
        $dados = '';
        foreach ($query->result() as $x)
        {
            $data = $this->DataDinamica($padrao);
            if($x->QUERY != NULL){
                $empresa = str_pad($empresa, 2, '0', STR_PAD_LEFT);
                $dados_banco = $this->DadosDB($x->ID_BANCO);
                $banco = $dados_banco['NOME'];
                $squery = str_replace('{$de}', $data['de'], $x->QUERY);
                $squery = str_replace('{$ate}', $data['ate'], $squery);
                $squery = str_replace('{$empresa}', $empresa, $squery);
                $query = $this->$banco->query($squery);
                //var_dump($squery);
                $row = $query->row();
                    if(isset($row)) {
                        $valor = $this->FormatoKPI($row->total,$x->MASCARA);
                    }else{
                        $valor = 0;
                    }
            }else{
                $campo = $x->CAMPO;
                $filtros = $x->FILTRO;
                $filtros = explode(',', $filtros);
                $dados_modulo = $this->mModulo->DadosModulo($x->ID_MODULO);
                //var_dump($dados_modulo);
                //$dados_dashboard = $this->DadosDashboard($x->ID_DASHBOARD);
                $tabela = $dados_modulo['TABELA'];
                $banco = $dados_modulo['BANCO'];
                $this->$banco->select_sum($campo);
                $this->$banco->from($tabela);
                if($x->DATA != NULL){
                    $dat = $x->DATA;
                    $this->$banco->where($x->DATA.' >=',$data['de']);
                    $this->$banco->where($x->DATA.' <=',$data['ate']);
                    $data_dinamica = ','.$dat.';5;'.$data['de'].','.$dat.';6;'.$data['ate'];
                }
                if($empresa != 0){
                    $this->$banco->where('empresa =',$empresa);
                }
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
                            $this->$banco->where($filtro_a[0].$filtro_b,$filtro_a[2]);
                        }
                        //var_dump($valor);
                    }
                    //$this->$banco->group_by($campo);
                $sum = $this->$banco->get();
                $output = $this->$banco->last_query();
                //var_dump($output);
                foreach ($sum->result() as $z) {
                    $valor = $this->FormatoKPI($z->$campo,$x->MASCARA);
                }
                }
                $descricao = $x->TITULO;
                $icone = $x->ICONE;
                $color = $x->COR;
                $dados_kpi = $this->DadosKPI($x->ID_KPI);
                $link = base_url().'modulo/visualizar/'.$x->ID_MODULO.''.$x->LINK.'empresa;1;'.$empresa.$data_dinamica;
                $html = $dados_kpi['HTML'];
                $html = str_replace('{$link}', $link, $html);
                $html = str_replace('{$color}', $color, $html);
                $html = str_replace('{$icone}', $icone, $html);
                $html = str_replace('{$valor}', $valor, $html);
                $html = str_replace('{$descricao}', $descricao, $html);
                $dados .= $html;
        }
        return $dados;
    }
    public function DadosEixosChart($id_chart,$padrao,$empresa){
        $dados_chart = $this->DadosChart($id_chart);
        $dados_modulo = $this->mModulo->DadosModulo($dados_chart['ID_MODULO']);
        $data = $this->DataDinamica($padrao);
            if($dados_chart['QUERY'] != NULL){
                $empresa = str_pad($empresa, 2, '0', STR_PAD_LEFT);
                $dados_banco = $this->DadosDB($dados_modulo['ID_MODULO']);
                $banco = $dados_banco['NOME'];
                $squery = str_replace('{$de}', $data['de'], $x->QUERY);
                $squery = str_replace('{$ate}', $data['ate'], $squery);
                $squery = str_replace('{$empresa}', $empresa, $squery);
                $query = $this->$banco->query($squery.' LIMIT 10');
                
            }else{
                $filtros = $dados_chart['FILTRO'];
                $filtros = explode(',', $filtros);
                 //var_dump($filtros);
                $dados_modulo = $this->mModulo->DadosModulo($dados_chart['ID_MODULO']);
                $tabela = $dados_modulo['TABELA'];
                $banco = $dados_modulo['BANCO'];
                $columns[] = $dados_chart['EIXOX'];
                $columns[] = $dados_chart['EIXOY'];
                $this->$banco->distinct();
                $this->$banco->select($dados_chart['EIXOY']);
                $this->$banco->select_sum($dados_chart['EIXOX']);
                $this->$banco->from($tabela);
                //Caso possuir data dinamica aplica o filtro
                if($dados_chart['DATADINAMICA'] != NULL){
                    $this->$banco->where($dados_chart['DATADINAMICA'].' >=',$data['de']);
                    $this->$banco->where($dados_chart['DATADINAMICA'].' <=',$data['ate']);
                }
                //Caso for escolhido a empresa aplica o filtro
                if($empresa != 0){
                    $empresa = str_pad($empresa, 2, '0', STR_PAD_LEFT);
                    $this->$banco->where('empresa =',$empresa);
                }
                //Aplica Filtros da coluna filtro do banco
                for ($f = 0; $f < count($filtros); $f++) {
                    //var_dump(count($filtros));
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
                            $this->$banco->where($filtro_a[0].$filtro_b,$filtro_a[2]);
                        }
                        //var_dump($valor);
                }
                    $this->$banco->group_by($dados_chart['EIXOY']);
                    $query = $this->$banco->order_by($dados_chart['EIXOX'], 'DESC')->limit(10)->get();
            }
                //var_dump($output = $this->$banco->last_query());
                $eixos = '';
                $ap_eixox = $this->ApelidoCampo($dados_chart['ID_MODULO'],$dados_chart['EIXOX']);
                $ap_eixoy = $this->ApelidoCampo($dados_chart['ID_MODULO'],$dados_chart['EIXOY']);
                foreach ($query->result() as $y)
                {
                    $eixos .= "{name: '".$y->$dados_chart['EIXOY']."', y: ".$y->$dados_chart['EIXOX']."},";
                    //var_dump($y->$dados_chart['EIXOY']);
                }
                    //echo $eixos;
                $eixos = trim($eixos,',');
                //var_dump($eixos);
        return $eixos;
    }
    public function ModelosCharts($id,$modelo,$dados,$titulo,$desc_eixox,$desc_eixoy){
        $script = '';
        if($modelo == 'BARRAS'){
            $script .=   ' <script type="text/javascript">';
            $script .=  "google.charts.load('current', {packages: ['corechart', 'bar']});
                         google.charts.setOnLoadCallback(drawBasic);
                            function drawBasic() {
                            var data = google.visualization.arrayToDataTable([
                                ".$dados."
                            ]);

                            var options = {
                                title: '".$titulo."',
                                chartArea: {width: '50%'},
                                hAxis: {
                                    title: '".$desc_eixox."',
                                    minValue: 0
                                },
                                vAxis: {
                                    title: '".$desc_eixoy."'
                                }
                            };
                        var chart = new google.visualization.BarChart(document.getElementById('chart-".$id."'));
                        chart.draw(data, options);
                        }";
            $script .= '</script>';
        }elseif($modelo == 'PIE'){
            $script .= '<script type="text/javascript">';
            $script .=  "$(document).ready(function () {
                         Highcharts.chart('chart-".$id."', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: '".$titulo."'
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false
                                    },
                                    showInLegend: true
                                }
                            },
                            series: [{
                                name: 'Percentual',
                                colorByPoint: true,
                                data: [".$dados."]
                            }]
                        });
                    });";
            $script .= '</script>';
        }
        return $script;
    }
    public function ListarScriptChart($dashboard,$padrao,$empresa){
        $query = $this->db->query("SELECT * FROM BI_CHARTS WHERE ID_DASHBOARD = '".$dashboard."' ORDER BY ORDEM ASC");
        $charts = '';
        foreach ($query->result() as $x)
        {
            $ap_eixox = $this->ApelidoCampo($x->ID_MODULO,$x->EIXOX);
            $ap_eixoy = $this->ApelidoCampo($x->ID_MODULO,$x->EIXOY);
            $dados_eixos = $this->DadosEixosChart($x->ID,$padrao,$empresa);
            $charts .= $this->ModelosCharts($x->ID,$x->TIPO,$dados_eixos,$x->DESCRICAO,$ap_eixox,$ap_eixoy);
        }
        return $charts;
        //var_dump($charts);  
    }
    public function ListarCharts($dashboard,$padrao,$empresa){
        $query = $this->db->query("SELECT * FROM BI_CHARTS WHERE ID_DASHBOARD = '".$dashboard."' ORDER BY ORDEM ASC");
        $charts = '';
        foreach ($query->result() as $x)
        {
            $charts .= '<div class="col-lg-6">
                        <div class="panel">
                        <div class="panel-heading">
                                <h3 class="panel-title">'.$x->DESCRICAO.'</h3>
                        </div>
                        <div id="chart-'.$x->ID.'" class="panel-body"></div>
                        </div>
                        </div>';
        }
        return $charts;
        //var_dump($charts);  
    }
    public function DadosDashboard($dashboard){
        $query = $this->db->query("SELECT * FROM BI_DASHBOARDS WHERE ID = '".$dashboard."'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data = array(
                'ID' => $x->ID,
                'NOME' => $x->NOME,
                'PADRAO' => $x->PADRAO,
                'ICONE' => $x->ICONE,
                'EMPRESA' => $x->EMPRESA,
                'STATUS' => $x->STATUS,
            );
        }
        return $data;
    }
    public function DataDinamica($tipo){
        $data = array();
        if($tipo == 'hoje'){
            $datade  = date('Y-m-d');
            $dataate = $datade;
        }elseif($tipo == 'ontem'){
            $datade  = date('Y-m-d', strtotime("-1 days",strtotime(date('Y-m-d'))));
            $dataate = $datade;
        }elseif($tipo == 'anteontem'){
            $datade  = date('Y-m-d', strtotime("-2 days",strtotime(date('Y-m-d'))));
            $dataate = $datade;
        }elseif($tipo == 'mesatehoje'){
            $datade  = date('Y-m-').'01';
            $dataate = date('Y-m-d');
        }elseif($tipo == 'mesatual'){
            $datade  = date('Y-m-').'01';
            $dataate = date('Y-m-').date("t", mktime(0,0,0,date('m'),'01',date('Y')));
            //var_dump($dataate);
        }elseif($tipo == 'anoatual'){
            $datade  = date('Y-').'01-01';
            $dataate = date('Y-').'12-31';
        }elseif($tipo == 'anoanterior'){
            $ano = date('Y') - 1;
            $datade  = $ano.'-01-01';
            $dataate = $ano.'-12-31';
        }else{
            $data = $this->uri->segment(4);
            $data = explode('-',$data);
            $datade = substr($data[0],4,4).'-'.substr($data[0],2,2).'-'.substr($data[0],0,2);
            $dataate = substr($data[1],4,4).'-'.substr($data[1],2,2).'-'.substr($data[1],0,2);
            //var_dump($datade);
        }
        $data['de'] = date("Y-m-d", strtotime($datade));
        $data['ate'] = date("Y-m-d", strtotime($dataate));
        return $data;
    }
    /*
    public function ListaEixo($id_chart,$padrao,$empresa,$eixo = 'Y'){
        $eixo = 'EIXO'.$eixo;
        $dados_chart = $this->DadosChart($id_chart);
        $dados_modulo = $this->mModulo->DadosModulo($dados_chart['ID_MODULO']);
        $data = $this->DataDinamica($padrao);
            if($dados_chart['QUERY'] != NULL){
                $empresa = str_pad($empresa, 2, '0', STR_PAD_LEFT);
                $dados_banco = $this->DadosDB($dados_modulo['ID_MODULO']);
                $banco = $dados_banco['NOME'];
                $squery = str_replace('{$de}', $data['de'], $x->QUERY);
                $squery = str_replace('{$ate}', $data['ate'], $squery);
                $squery = str_replace('{$empresa}', $empresa, $squery);
                $query = $this->$banco->query($squery.' LIMIT 10');
                
            }else{
                $filtros = $dados_chart['FILTRO'];
                $filtros = explode(',', $filtros);
                 //var_dump($filtros);
                $campo = $dados_chart[$eixo];
                $dados_modulo = $this->mModulo->DadosModulo($dados_chart['ID_MODULO']);
                $tabela = $dados_modulo['TABELA'];
                $banco = $dados_modulo['BANCO'];
                $this->$banco->select($campo);
                $this->$banco->from($tabela);
                //Caso possuir data dinamica aplica o filtro
                if($dados_chart['DATADINAMICA'] != NULL){
                    $this->$banco->where($dados_chart['DATADINAMICA'].' >=',$data['de']);
                    $this->$banco->where($dados_chart['DATADINAMICA'].' <=',$data['ate']);
                }
                //Caso for escolhido a empresa aplica o filtro
                if($empresa != 0){
                    $this->$banco->where('EMPRESA =',$empresa);
                }
                //Aplica Filtros da coluna filtro do banco
                for ($f = 0; $f < count($filtros); $f++) {
                    //var_dump(count($filtros));
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
                            }
                            $this->$banco->where($filtro_a[0].$filtro_b,$filtro_a[2]);
                        }
                        //var_dump($valor);
                }
                $query = $this->$banco->order_by($dados_chart['EIXOX'], 'DESC')->limit(10)->get();
                
            }
            $output = $this->$banco->last_query();
                foreach ($query->result() as $x)
                {
                    $eixox[] = $x->$campo;
                }
            
        return $eixox;
    }
    */


}