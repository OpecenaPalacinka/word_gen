<?php

use Latte\Runtime as LR;

/** source: D:\wamp64\www\formular\app\Presenters/templates/Homepage/default.latte */
final class Templateed79bc7b4d extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<body style="display: flex;align-items: center;justify-content: center;text-align: center;flex-direction: column;">
<h1>Vítejte, děkujeme že se účastníte průzkumu pro naši novou restauraci.<br></h1>
';
		/* line 3 */ $_tmp = $this->global->uiControl->getComponent("startForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '</body>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
