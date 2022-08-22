<?php
class EditacePojistenceKontroler extends Kontroler{
    public function zpracuj($parametry)
    {
        $SpravceEditacePojistence = new SpravceEditacePojistence();
         //Ověří, jestli je uživatel přihlášený, jestli ne, tak přesměruje na přihlážení -> zabezpečení pro vstup na stránku pro neprihlášené uživatele
         $this->overPrihlaseni();
         // Hlavička požadavku
         header("pridani");
         // Hlavička stránky
         $this->hlavicka['titulek'] = 'Editace pojištěnce';
         // Nastavení šablony
         $this->pohled = 'editacePojistence';

         $pojistenecEditace = array(
            'pojistenec_id' => '',
            'jmeno' => '',
            'prijmeni' => '',
            'email' => '',
            'telefon' => '',
            'ulice' => '',
            'mesto' => '',
            'psc' => ''
         );

        $pojistenecId = $parametry[1];

        //Naplnění dat pro výpis v pohledu
        $pojistenecInfo = $SpravceEditacePojistence->vratPojistenceDetail($pojistenecId);
        $this->data['pojistenecInfo'] = $pojistenecInfo;

         
        //var_dump($pojistenecInfo);

        if($_POST){
            //Získání dat z $_POST
            $klice = array('jmeno', 'prijmeni', 'email', 'telefon', 'ulice', 'mesto', 'psc');
            $pojistenecEditace = array_intersect_key($_POST, array_flip($klice));
            //Uložení pojištěnce do databáze
            $SpravceEditacePojistence->editujPojistence($pojistenecEditace, $pojistenecId);
            $this->pridejZpravu("Pojištěnec byl úspěšně upraven.");
            }

    }
}