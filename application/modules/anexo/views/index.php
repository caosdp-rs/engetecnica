<!-- MAIN CONTENT-->
<div id="anexo_index" class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1"></h2>
                        <?php
                            $url = "";
                            if (isset($id_modulo)) {
                                $url .= "/{$id_modulo}";
                                if (isset($id_modulo_item)) {
                                    $url .= "/{$id_modulo_item}";
                                    if (isset($id_modulo_subitem)) {
                                        $url .= "/{$id_modulo_subitem}";
                                    }
                                }
                            }
                        ?>
                        <a href="<?php echo base_url("anexo/adicionar{$url}"); ?>">
                        <button class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>Adicionar</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Anexos</h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-40">
                        <h3 class="title-1 m-b-25">Anexos</h3>
                        <table class="table table-borderless table-striped table-earning" id="lista">
                            <thead>
                                <tr>
                                    <th>Prévia</th>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Modulo</th>
                                    <th>Tipo</th>
                                    <th>Data de Inclusão</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($anexos as $anexo){ ?>
                                <tr id="<?php echo "anexo-{$anexo->id_anexo}"; ?>">
                                    <td class="preview"> 
                                        <?php if (file_exists($anexo->anexo) && explode('/', mime_content_type($anexo->anexo))[0] == "image") { ?>
                                            <img src="<?php echo $anexo->anexo;?>" />
                                        <?php } elseif (!file_exists($anexo->anexo)) { ?>
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $anexo->id_anexo; ?></td>
                                    <td><?php echo $anexo->titulo; ?></td>
                                    <td><?php echo $anexo->descricao; ?></td>
                                    <td><?php echo $anexo->modulo_titulo; ?></td>
                                    <td><?php echo ucfirst($anexo->tipo); ?></td>
                                    <td><?php echo date('d/m/Y H:i:s', strtotime($anexo->data_inclusao)); ?></td>
                                    <td>
                                      
                                        <a target="_black" href="<?php echo base_url("assets/uploads/{$anexo->anexo}"); ?>"><i class="fa fa-eye"></i></a>
                                        <a download href="<?php echo base_url("assets/uploads/{$anexo->anexo}"); ?>"><i class="fa fa-download"></i></a>
                                 
                                        <?php if ($anexo->id_usuario == $user->id_usuario) {?>
                                        <a href="javascript:void(0)" 
                                            data-href="<?php echo base_url("anexo/deletar/{$anexo->id_anexo}"); ?>" 
                                            data-registro="<?php echo $anexo->id_anexo;?>" 
                                            data-tabela="anexo" class="deletar_registro"
                                        >
                                            <i class="fas fa-remove"></i>
                                        </a>
                                        <?php  } ?> 
                                    </td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?php echo date("Y"); ?>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->

