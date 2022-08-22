<?php
class PojisteniDruhyKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $spravcePojisteniDruhy = new SpravcePojisteniDruhy();
         //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
         $this->overPrihlaseni();
        
         // Hlavička požadavku
         header("pojisteniDruhy");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Nový druh pojištění';
         // Nastavení šablony
         $this->pohled = 'novyDruhyPojisteni';

         $pojisteniDruh = array(
            'pojisteni_druh' => ''
         );

        $this->data['pojisteniDruh'] = $pojisteniDruh;

        
        if((int)$_SESSION['uzivatel'][2] == 1){
            if($_POST){
                //Získání dat z $_POST
                $klice = array('pojisteni_druh');
                $pojisteniDruh = array_intersect_key($_POST, array_flip($klice));
                //Uložení pojištěnce do databáze
                $spravcePojisteniDruhy->ulozDruhPojisteni($pojisteniDruh);
                $this->pridejZpravu('Nový druh pojištění byl úspěšně přidán.');
                $this->presmeruj('pojistenci');
            }
        }else{
            $this->pridejZpravu('Pozor! Přidávat nové druhy pojištění může pouze admin! Požádejte jej o přidělení práv.');
            $this->presmeruj('pojistenci');
        }
    }
}