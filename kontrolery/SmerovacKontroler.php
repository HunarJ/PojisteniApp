<?php
class SmerovacKontroler extends Kontroler
{

    protected $kontroler;

    public function zpracuj($parametry)
    {
        $naparsovanaURL = $this->parsujURL($parametry[0]);
        //var_dump($naparsovanaURL);
        //exit;
        if (empty($naparsovanaURL[0])){
        $this->presmeruj('index.html'); //Sem přesměruje pokud není zadaná žádná URL
        }

        if(in_array('detail', $naparsovanaURL)){
            $tridaKontroleru = 'DetailKontroler';
        }elseif(in_array('pridani', $naparsovanaURL)){
            $tridaKontroleru = 'PridaniKontroler';
        }elseif(in_array('novePojisteni', $naparsovanaURL)){
            $tridaKontroleru = 'PojistenipojistenecKontroler';
        }elseif(in_array('registrace', $naparsovanaURL)){
            $tridaKontroleru = 'RegistraceKontroler';
        }elseif(in_array('editacePojistence', $naparsovanaURL)){
            $tridaKontroleru = 'EditacePojistenceKontroler';
        }elseif(in_array('editacePojisteni', $naparsovanaURL)){
            $tridaKontroleru = 'EditacePojisteniKontroler';
        }elseif(in_array('prihlaseni', $naparsovanaURL)){
            $tridaKontroleru = 'PrihlaseniKontroler';
        }elseif(in_array('odhlaseni', $naparsovanaURL)){
            $tridaKontroleru = 'OdhlaseniKontroler';
        }elseif(in_array('druhPojisteni', $naparsovanaURL)){
            $tridaKontroleru = 'PojisteniDruhyKontroler';
        }else{
            $tridaKontroleru = $this->pomlckyDoVelbloudiNotace(array_shift($naparsovanaURL)) . 'Kontroler';
        }
        
        if (file_exists('kontrolery/' . $tridaKontroleru . '.php')){
        $this->kontroler = new $tridaKontroleru;
        }else{
        $this->presmeruj('chyba');
        }

        $this->kontroler->zpracuj($naparsovanaURL);

        $this->data['titulek'] = $this->kontroler->hlavicka['titulek'];
		$this->data['popis'] = $this->kontroler->hlavicka['popis'];
		$this->data['klicova_slova'] = $this->kontroler->hlavicka['klicova_slova'];

        if(in_array('prihlaseni', $naparsovanaURL)){
            $this->pohled = 'rozlozeniPrihlaseni';
        }elseif(in_array('registrace', $naparsovanaURL)){
            $this->pohled = 'rozlozeniRegistrace';
        }elseif(in_array('odhlaseni', $naparsovanaURL)){
            $this->pohled = 'rozlozeniRegistrace';
        }else{
        $this->pohled = 'rozlozeni';
        }
        $this->data['zpravy'] = $this->vratZpravy();
    }

    private function parsujURL($url)
    {
        //parsuje URL na jednotlive segmenty-vrací je v poli
        $naparsovanaURL = parse_url($url);
        $naparsovanaURL["path"] = ltrim($naparsovanaURL["path"], "/");
        $naparsovanaURL["path"] = trim($naparsovanaURL["path"]);
        $rozdelenaCesta = explode("/", $naparsovanaURL["path"]);
        return $rozdelenaCesta;
    }

    //Spojí slova do jednoho celku a kazdemu novemu slovu dá na začátek velké písmeno (camelCasing)
    private function pomlckyDoVelbloudiNotace($text)
    {
        $veta = str_replace('-', ' ', $text);
        $veta = ucwords($veta);
        $veta = str_replace(' ', '', $veta);
        return $veta;
    }

}