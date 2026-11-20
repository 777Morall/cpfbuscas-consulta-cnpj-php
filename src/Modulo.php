<?php
declare(strict_types=1);

/** Monta parâmetros; não realiza chamadas de rede. */
function prepararConsulta(array $args): array
{
    $command=$args[0] ?? '';
    $module=match($command) { 'cnpj'=>'cnpj','base'=>'cnpj_base',default=>throw new InvalidArgumentException('Escolha cnpj ou base.') };
    $cnpj=strtoupper(str_replace(['.','/','-',' '],'',$args[1] ?? ''));
    if (!preg_match('/^[A-Z0-9]{12}[0-9]{2}$/D',$cnpj)) throw new InvalidArgumentException('Informe CNPJ de 14 posições; somente formato é conferido.');
    return [$module,['cnpj'=>$cnpj]];
}
