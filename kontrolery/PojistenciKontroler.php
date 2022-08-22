<?php
class PojistenciKontroler extends Kontroler {

    
    public function zpracuj($parametry){
        $spravcePojistencu = new SpravcePojistencu();
        $spravcePojisteni = new SpravcePojisteni();
        $spravceUzivatelu = new SpravceUzivatelu();
        //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
        $this->overPrihlaseni();
        // Hlavička požadavku
        header("pojistenci");
        // Hlavička stránky
        $this->hlavicka['titulek'] = 'Pojištěnci';
        // Nastavení šablony
        $this->pohled = 'pojistenci';

        $pojistenci = $spravcePojistencu->vratPojistence();
        //var_dump($pojistenci);

        $this->data['pojistenci']=$pojistenci;
        //var_dump($parametry);
        
        
        if(isset($parametry[0]) == 'odstranit'){
            if((int)$_SESSION['uzivatel'][2] == 1){
            //var_dump((int)$parametry[1]);
            $spravcePojisteni->smazVsechnaPojisteni((int)$parametry[1]);
            $spravcePojistencu->smazPojistence((int)$parametry[1]);
            $this->pridejZpravu('Pojištěnec byl úspěšně smazán.');
            }else{
               $this->pridejZpravu('Pozor! Mazat pojištěnce může pouze admin, požádejte jej o přidělení práv.');
            }
            $this->presmeruj('pojistenci');
        }
    }

}