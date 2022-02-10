<?php 

declare(strict_types = 1);

class Room {
	private int $id;
    private string $name;
    private string $description;
    private int $duration;
    private bool $forbidden18yearOld;
    private string $open;
    private string $niveau;
	private int $min_player;
	private int $max_player;

    
    private string $_readme;
    
    public function __construct(
        string $p_name, 
        string $p_description,
        int $p_duration = 60,
        bool $p_18yo = false,
        string $p_niveau = "Normal",
		int $p_min_player = 2,
		int $p_max_player = 12)
    {
        $this->name = ucfirst(strtolower($p_name));
        $this->description = $p_description;
        $this->duration = $p_duration;
        $this->forbidden18yearOld = $p_18yo;
        $this->niveau = $p_niveau;
		$this->min_player = $p_min_player;
		$this->max_player = $p_max_player;
    }
    
    public function getName(): string
    {
        return ucfirst(strtolower($this->name));
    }
    public function setName(string $value)
    {
        $this->name = ucfirst(strtolower($value));
    }
    
    public function setOpen(string $value)
    {
        $this->open = $value;
    }
    
    public function setNiveau(string $value)
    {

        if($value == 'Difficile' ||
            $value == 'Normal' ||
            $value == 'Facile') {
            $this->niveau = htmlentities($value);
        } else {
            throw new Exception('Niveau inconnu');
        }
    }
    
    
    public function __toString()
    {
        return json_encode($this->toArray());
    }
	
	public function toArray()
	{
		return [
			'name' 				 => $this->name,
			'description' 		 => $this->description,
			'duration' 			 => $this->duration,
			'forbidden18yearOld' => $this->forbidden18yearOld,
			'niveau' 			 => $this->niveau,
			'min_player'		 => $this->min_player,
			'max_player' 		 => $this->max_player,
		];
	}
	
	public function insert()
	{
		$sql = "INSERT INTO `rooms` (`name`, `description`, `duration`, `forbidden18yearOld`, `niveau`, `min_player`, `max_player`) 
                 VALUES             ('" . $this->name . "', 'sddfsdf', '60',          '0',              'Normal',       '2',       '12');";
		
		$pdo
		echo $sql;
	}
    
}
