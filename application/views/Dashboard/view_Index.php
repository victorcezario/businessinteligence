<?php //$eixox = $this->mDashboard->ListaEixo('1','anoatual','0','X'); ?>
<?php //$eixoy = $this->mDashboard->ListaEixo('1','anoatual','0','Y'); ?>
<?php echo $script_charts; ?>

<div id="page-content">
    <div class="row">
        <div class="col-md-12">

            <div class="row">
             <?php echo $lista_kpi; ?>
            </div>
        </div>
        <?php //var_dump($this->mDashboard->ListaEixo('1','anoatual','0','X')); ?>
        <?php echo $charts; ?>
    </div>
</div>
