<?php
class OdhlaseniKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
		$spravceUzivatelu = new SpravceUzivatelu();
		
		$this->hlavicka['titulek'] = 'Odhlášení';
		
        if (in_array('odhlaseni', $parametry))
		{
            $spravceUzivatelu->odhlas();
 
		}
		// Nastavení šablony
		$this->pohled = 'odhlaseni';
    }
}