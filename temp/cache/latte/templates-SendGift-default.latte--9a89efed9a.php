<?php

use Latte\Runtime as LR;

/** source: D:\wamp64\www\formular\app\Presenters/templates/SendGift/default.latte */
final class Template9a89efed9a extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<body style="display: flex;align-items: center;justify-content: center;text-align: center;flex-direction: column;">
<h2 style="font-size: 2em">Děkujeme za vyplnění dotazníku.<br></h2>
';
		/* line 3 */ $_tmp = $this->global->uiControl->getComponent("sendGiftForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '</body>

<script>

    var request = new XMLHttpRequest();
    request.open("POST","",true)
    request.send(document.getElementById(\'frm-sendGiftForm-email\').innerHTML);

</script>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
