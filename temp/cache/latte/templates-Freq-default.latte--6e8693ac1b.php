<?php

use Latte\Runtime as LR;

/** source: D:\wamp64\www\formular\app\Presenters/templates/Freq/default.latte */
final class Template6e8693ac1b extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<body style="display: flex;align-items: center;justify-content: center;text-align: center;flex-direction: column;">
<h1>Jak často pijete pivo?<br></h1>
';
		/* line 3 */ $_tmp = $this->global->uiControl->getComponent("freqForm");
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
