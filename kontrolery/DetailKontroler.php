<?php
class DetailKontroler extends Kontroler {

    public function zpracuj($parametry){
        
        //var_dump('Ahoj jsem v detailu');
        //var_dump($parametry);
        $spravceDetailu = new SpravceDetailu();
        $spravcePojistencu = new SpravcePojistencu();
        $spravcePojisteni = new SpravcePojisteni();
        $spravceUzivatelu = new SpravceUzivatelu();
        
         //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
         $this->overPrihlaseni();
         // Hlavička požadavku
        header("detail");
        // Hlavička stránky
        $this->hlavicka['titulek'] = 'Detail';
        // Nastavení šablony
        $this->pohled = 'detail';

        $detail = $spravceDetailu->vratPojistenceDetail($parametry[1]);
        $pojisteniPojistenec = $spravceDetailu->vratPojisteniPojistence($parametry[1]);
        //var_dump($parametry);
        //var_dump($pojisteniPojistenec);

        $this->data['detail']=$detail;
        $this->data['pojisteniPojistenec'] = $pojisteniPojistenec;
        //var_dump($detail);

        //Smaže pojištění pojištěnce
        if(isset($parametry[2]) == 'odstranit' && $parametry[3] > 0){
            //var_dump((int)$parametry[1]);
            $spravceDetailu->smazPojisteni((int)($parametry[3]));
            $this->pridejZpravu('Pojištění bylo úspěšně smazáno!');
            $this->presmeruj("detail/$parametry[1]");
        }elseif(isset($parametry[2]) == 'odstranit'){
            if((int)$_SESSION['uzivatel'][2] == 1){
            $spravcePojisteni->smazVsechnaPojisteni($parametry[1]);
            $spravcePojistencu->smazPojistence($parametry[1]);
            $this->pridejZpravu('Pojištěnec byl úspěšně smazán');
            $this->presmeruj('pojistenci');
            }else{
                $this->pridejZpravu('Pozor! Mazat pojištěnce může pouze admin. Požádejte jej o přidělení práv.');
                $this->presmeruj("detail/$parametry[1]");
            }
        }

        //Odhlásí uživatele pomocí tlačítka

        if(in_array('odhlasit', $parametry)){
            $spravceUzivatelu->odhlas();
            $this->presmeruj('prihlaseni');
        }
    }

}