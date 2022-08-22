<?php
class RegistraceKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        // Hlavička stránky
        $this->hlavicka['titulek'] = 'Registrace';
        if ($_POST)
        {
            try
            {
                $spravceUzivatelu = new SpravceUzivatelu();
                $spravceUzivatelu->registruj($_POST['prihlasovaci_jmeno'], $_POST['heslo'], $_POST['heslo_znovu']);
                //$spravceUzivatelu->prihlas($_POST['prihlasovaci_jmeno'], $_POST['heslo']);
                $this->pridejZpravu('Byl jste úspěšně zaregistrován. Nyní se můžete přihlásit');
                $this->presmeruj('prihlaseni');
            }
            catch (ChybaUzivatele $chyba)
            {
                $this->pridejZpravu($chyba->getMessage());
            }
            
        }
        // Nastavení šablony
        $this->pohled = 'registrace';
    }
}