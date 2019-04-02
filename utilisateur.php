<?PHP
class Utilisateur{
    private $Nom;
    private $Mail;
    private $Password;
 public   function __construct($Nom,$Password,$Mail){
        $this->Password=$Password;
        $this->Nom=$Nom;
        $this->Mail=$Mail;
    }
    public    function getNom(){
        return $this->Nom;
    }

    public   function getMail()
    {
      return  $this->Mail;
            }
    public  function getPassword()
    {
       return $this->Password;
    }





}

?>