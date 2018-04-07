<?php
$mod['modulo_id'] = $modulo_id;
$this->load->view('Modulo/view_DrillDown', $mod);
?>
<script type="text/javascript">
function setvalor() {
    //alert('Teste');
    var cor = document.getElementById("color").value;
    var html = document.getElementById("color").value;
    document.getElementById("exemplo").style.backgroundColor = cor;
    document.getElementById("exemplo").innerHTML = "novo conteudo";
} 
function settema(tema) {
    //alert('Teste');
    document.getElementById("exemplo").innerHTML = tema;
} 
</script>
<div id="page-title">
    <h1 class="page-header text-overflow"><?php echo $modulo_nome; ?></h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">

                <!--Panel heading-->
                <div class="panel-heading">
                    <div class="panel-control">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#demo-tabs2-box-1" aria-expanded="true">
                                    <i class="fa fa-table"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#demo-tabs2-box-2" aria-expanded="false">
                                    <i class="fa fa-database"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#demo-tabs2-box-3" aria-expanded="false">
                                    <i class="fa fa-pie-chart"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#demo-tabs2-box-4" aria-expanded="false">
                                    <i class="fa fa-dashboard"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <h3 class="panel-title">Parametros</h3>
                </div>

                <!--Panel Body-->
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="demo-tabs2-box-1" class="tab-pane fade active in">
                            <div class="media">
                                <div class="media-body">
                                    <div class="panel-body">
                                        <div class="pad-btm form-inline">
                                            <div class="row">
                                                <div class="col-sm-6 table-toolbar-left">
                                                    <a href="<?php echo $url_excel ;?>" class="btn btn-success" target="Blank"><i class="fa fa-file-excel-o"></i> Excel</a>
                                                    <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                                                    <div class="btn-group">
                                                        <button class="btn btn-default"><i class="demo-pli-information"></i></button>
                                                        <button class="btn btn-default"><i class="demo-pli-recycling"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 table-toolbar-right">
                                                    <div class="btn-group">
                                                        <button class="btn btn-default"><i class="demo-pli-download-from-cloud"></i></button>
                                                        <div class="btn-group">
                                                            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                                <i class="demo-pli-gear"></i>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                                <li><a href="#">Action</a></li>
                                                                <li><a href="#">Another action</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <?php echo $limited; ?>
                                        <div class="table">
                                            <?php echo $tabela; ?>
                                        </div>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="demo-tabs2-box-2" class="tab-pane fade">
                            <div class="media">
                                <div class="media-body">
                                    <div class="panel-body col-md-7">
                                        <form method="POST" action="../../../../Modulo/Post" class="">
                                            <input type="hidden" name="modulo_id" value="<?php echo $modulo_id; ?>">
                                            <input type="hidden" name="tipo" value="buscadados">
                                            <input type="hidden" class="form-control" name="filtros_ant" value="<?php echo $this->input->get('f'); ?>">
                                            <h4>Seletor de Dados:</h4>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-2 control-label">
                                                    Dados
                                                </label>
                                                <div class="col-md-9">
                                                    <select name="DADOS[]" id="dados" data-placeholder="Selecione os dados a serem exibidos..." multiple tabindex="4" required>
                                                        <?php echo $dados; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <h4>Seletor de Valores:</h4>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-2 control-label">
                                                    Valores
                                                </label>
                                                <div class="col-md-9">
                                                <select name="VALORES[]" id="valores" data-placeholder="Selecione os valores a serem exibidos..." multiple tabindex="4" required>
                                                        <?php echo $valores; ?>
                                                    </select>
                                            
                                                </div>
                                            </div>
                                            <h4>Seletor de Filtros:</h4>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-2 control-label">
                                                    Campo
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="filtro" name="campo" data-placeholder="Selecione o filtro..."  tabindex="2">
                                                        <option value=""></option>
                                                        <?php echo $filtros; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-2 control-label">
                                                    Condição
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="condicao" name="condicao" data-placeholder="Selecione a Condição..."  tabindex="2">
                                                        <option value="0"></option>
                                                        <option value="1">Igual á</option>
                                                        <option value="2">Diferente de</option>
                                                        <option value="3">Maior que</option>
                                                        <option value="4">Menor que</option>
                                                        <option value="5">Maior ou igual a</option>
                                                        <option value="6">Menor ou igual a</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-2 control-label">
                                                    Value
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="string">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="form-group text-right">
                                                    <button class="btn btn-primary" type="submit">Buscar Dados</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="panel-body col-md-5">
                                        <?php echo $listar_filtros; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="demo-tabs2-box-3" class="tab-pane fade">
                            <div class="media">
                                <div class="media-body">
                                    <div class="panel-body">
                                        <div class="panel-body col-md-6">
                                          <h4>Geração de KPI's:</h4>
                                            <form method="POST" action="<?php echo base_url(); ?>modulo/post" class="">
                                                <input type="hidden" name="tipo" value="gerarkpi">
                                                <input type="hidden" name="modulo" value="<?php echo $modulo_id; ?>">
                                                <input type="hidden" class="form-control" name="valores_ant" value="<?php echo $this->input->get('v'); ?>">
                                                <input type="hidden" class="form-control" name="dados_ant" value="<?php echo $this->input->get('d'); ?>">
                                                <input type="hidden" class="form-control" name="filtros_ant" value="<?php echo $this->input->get('f'); ?>">
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Dashboard de Destino
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="dashboard" class="form-control">
                                                            <?php echo $listar_dashboards; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Valor a Exibir
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="campo" onchange="setvalor()" class="form-control">
                                                            <?php echo $valores; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Cor do KPI
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input class="form-control jscolor" id="color" name="color" value="1858AB">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Modelo
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="kpi" onchange="settema(this.value)"  class="form-control">
                                                            <?php echo $modelos_kpi; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Titulo KPI
                                                    </label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="titulo" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-3 control-label">
                                                        Data Dinâmica
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select name="data" class="form-control">
                                                            <option value="0">Sem Data Dinâmica</option>
                                                            <?php echo $listar_datas; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="submit" name="submit1" class="btn btn-primary">Criar KPI</button>
                                                <button type="submit" name="submit2" class="btn btn-primary">Criar KPI e Ir Para Dashboard</button>
                                            </form>
                                        </div>
                                        <div class="panel-body col-md-6">
                                            <div id="exemplo" class="col-md-8 offset-2">
                                            <h4>Exemplo:</h4>
                                            
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="demo-tabs2-box-4" class="tab-pane fade">
                            <div class="media">
                                <div class="media-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="modal-drilldown" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalDados" aria-hidden="true">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-eye"></i>Drill-down</span>
        </div>
        <!-- end .panel-heading section -->



        <div class="panel-body p25">
            <ul class="lista-campos lista-drill">

            </ul>


            <?php if (count($detalhamentos) > 0): ?>

                <h3>Detalhar informação:</h3>
                <ul class="lista-modulos">
                    <?php foreach($detalhamentos as $x) : ?>
                        <li><a href="#" data-id="<?php echo $x['ID']?>" class="detalha-modulo"><?php echo $x['NOME']?></a> </li>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>

        </div>
        <!-- end .form-body section -->
        <!-- end .form-footer section -->


    </div>
    <!-- end: .panel -->
</div>