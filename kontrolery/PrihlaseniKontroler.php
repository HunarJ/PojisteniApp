<?php
class PrihlaseniKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
		$spravceUzivatelu = new SpravceUzivatelu();

		if ($spravceUzivatelu->vratUzivatele())
			$this->presmeruj('pojistenci');
		// Hlavička stránky
		$this->hlavicka['titulek'] = 'Přihlášení';
		
        if ($_POST)
		{
          try{
				$spravceUzivatelu->prihlas($_POST['prihlasovaci_jmeno'], $_POST['heslo']);				
				$this->pridejZpravu('Byl jste úspěšně přihlášen.');
				$this->presmeruj('pojistenci');
				//$_SESSION['post-data'] = $_POST;
			}
			catch (ChybaUzivatele $chyba)
            {
                $this->pridejZpravu($chyba->getMessage());
            }
		}
		// Nastavení šablony
		$this->pohled = 'prihlaseni';
    }

}